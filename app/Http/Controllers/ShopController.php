<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ShopController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function shop(Request $request)
    {
        $query = Product::query();

        if ($request->has('search') && $request->search != '') {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $products = $query->get();
        return view('shop', ['products' => $products]);
    }

    public function category()
    {
        $categories = Category::with('products')->get();
        return view('category', ['categories' => $categories]);
    }

    public function showCategory(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $query = Product::where('category_id', $id);

        if ($request->has('search') && $request->search != '') {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $products = $query->get();
        return view('shop', ['products' => $products, 'categoryName' => $category->name]);
    }

    public function profile()
    {
        $user = Auth::user();
        return view('profile', ['user' => $user]);
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            $base64 = base64_encode(file_get_contents($image->path()));
            $mime = $image->getClientMimeType();
            $user->avatar = 'data:' . $mime . ';base64,' . $base64;
        }

        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }

    public function cart()
    {
        $cart = session()->get('cart', []);
        $total = array_reduce($cart, function ($carry, $item) {
            return $carry + ($item['price'] * $item['quantity']);
        }, 0);
        return view('cart', ['cart' => $cart, 'total' => $total]);
    }

    public function addToCart(Request $request)
    {
        $id = $request->input('product_id');
        $product = Product::find($id);

        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'name' => $product->name,
                'price' => $product->price,
                'image' => $product->image ?? 'https://via.placeholder.com/150',
                'quantity' => 1
            ];
        }

        session()->put('cart', $cart);

        if ($request->ajax() || $request->wantsJson()) {
            $cartQty = array_sum(array_column($cart, 'quantity'));
            return response()->json([
                'success' => true,
                'message' => 'Product added to cart successfully!',
                'cart_count' => $cartQty
            ]);
        }

        return redirect()->route('shop')->with('success', 'Product added to cart successfully!');
    }

    public function checkout(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'size' => 'required|string|in:S,M,L,XL',
            'address' => 'required|string',
            'receipt' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        $cart = session()->get('cart', []);
        
        if (empty($cart)) {
            return redirect()->route('shop')->with('error', 'Your cart is empty.');
        }

        $total = array_reduce($cart, function ($carry, $item) {
            return $carry + ($item['price'] * $item['quantity']);
        }, 0);

        $orderId = 'ORD-' . strtoupper(uniqid());

        // Save to Database
        $order = Order::create([
            'user_id' => Auth::id(),
            'order_number' => $orderId,
            'name' => $request->name,
            'phone' => $request->phone,
            'size' => $request->size,
            'address' => $request->address,
            'total' => $total,
            'status' => 'pending'
        ]);

        $itemsText = "";
        foreach ($cart as $id => $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $id,
                'quantity' => $item['quantity'],
                'price' => $item['price']
            ]);
            $itemsText .= "- {$item['name']} (x{$item['quantity']}) - $" . number_format($item['price'] * $item['quantity'], 2) . "\n";
        }

        $message = "🛍️ *New Order Received!*\n\n";
        $message .= "🛒 *Order ID:* {$orderId}\n";
        $message .= "👤 *Customer Name:* {$request->name}\n";
        $message .= "📞 *Phone:* {$request->phone}\n";
        $message .= "📏 *Size:* {$request->size}\n";
        $message .= "📍 *Address:* {$request->address}\n\n";
        $message .= "📝 *Order Items:*\n{$itemsText}\n";
        $message .= "💰 *Total Amount:* $" . number_format($total, 2);

        // Send to Telegram
        $token = env('TELEGRAM_BOT_TOKEN');
        $chatId = env('TELEGRAM_CHAT_ID');
        
        try {
            if ($request->hasFile('receipt')) {
                // If there's a payment receipt, send as Photo with caption
                $receiptPath = $request->file('receipt')->path();
                
                try {
                    $savedPath = $request->file('receipt')->store('receipts', 'public');
                    $order->update(['payment_receipt' => $savedPath]);
                } catch (\Exception $e) {
                    // Ignore local storage error on Vercel
                }
                
                Http::attach(
                    'photo', file_get_contents($receiptPath), 'receipt.jpg'
                )->post("https://api.telegram.org/bot{$token}/sendPhoto", [
                    'chat_id' => $chatId,
                    'caption' => $message,
                    'parse_mode' => 'Markdown'
                ]);
            } else {
                // Otherwise send as normal text message
                Http::post("https://api.telegram.org/bot{$token}/sendMessage", [
                    'chat_id' => $chatId,
                    'text' => $message,
                    'parse_mode' => 'Markdown'
                ]);
            }
        } catch (\Exception $e) {
            // Ignore error if Telegram fails
        }

        // Clear cart
        session()->forget('cart');

        // Store order details in session to show on success page
        session()->put('last_order', [
            'order_id' => $orderId,
            'name' => $request->name,
            'phone' => $request->phone,
            'size' => $request->size,
            'address' => $request->address,
            'total' => $total
        ]);

        return redirect()->route('success');
    }

    public function success()
    {
        $order = session()->get('last_order');
        
        if (!$order) {
            return redirect()->route('home');
        }

        return view('success', ['order' => $order]);
    }
}
