<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        if (Auth::user()->role !== 'admin') {
            return redirect('/');
        }

        $totalOrders = Order::count();
        $totalRevenue = Order::sum('total');
        $totalProducts = Product::count();
        $totalCategories = Category::count();
        $recentOrders = Order::with('user')->latest()->take(5)->get();

        return view('admin.dashboard', compact('totalOrders', 'totalRevenue', 'totalProducts', 'totalCategories', 'recentOrders'));
    }

    public function reports(Request $request)
    {
        if (Auth::user()->role !== 'admin') {
            return redirect('/');
        }

        $filter = $request->get('filter', 'daily'); // daily, monthly, yearly
        $query = Order::query();

        if ($filter === 'daily') {
            $query->whereDate('created_at', today());
        } elseif ($filter === 'monthly') {
            $query->whereMonth('created_at', now()->month)->whereYear('created_at', now()->year);
        } elseif ($filter === 'yearly') {
            $query->whereYear('created_at', now()->year);
        }

        $orders = $query->with('user')->get();
        $totalRevenue = $orders->sum('total');

        return view('admin.reports', compact('orders', 'totalRevenue', 'filter'));
    }

    public function printReport(Request $request)
    {
        if (Auth::user()->role !== 'admin') {
            return redirect('/');
        }

        $filter = $request->get('filter', 'daily');
        $query = Order::query();

        if ($filter === 'daily') {
            $query->whereDate('created_at', today());
        } elseif ($filter === 'monthly') {
            $query->whereMonth('created_at', now()->month)->whereYear('created_at', now()->year);
        } elseif ($filter === 'yearly') {
            $query->whereYear('created_at', now()->year);
        }

        $orders = $query->with('user')->get();
        $totalRevenue = $orders->sum('total');

        return view('admin.print_report', compact('orders', 'totalRevenue', 'filter'));
    }

    public function settings()
    {
        if (Auth::user()->role !== 'admin') {
            return redirect('/');
        }
        return view('admin.settings');
    }

    public function updateKhqr(Request $request)
    {
        if (Auth::user()->role !== 'admin') {
            return redirect('/');
        }

        $request->validate([
            'khqr_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        if ($request->hasFile('khqr_image')) {
            $request->file('khqr_image')->move(public_path('images'), 'khqr.jpg');
        }

        return redirect()->back()->with('success', 'KHQR Image updated successfully!');
    }
}
