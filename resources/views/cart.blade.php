@extends('layouts.app')

@section('content')
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800 dark:text-white">Shopping Cart</h1>
        <p class="text-gray-500 dark:text-gray-300 mt-1">Review your items and complete your purchase.</p>
    </div>

    @if(empty($cart))
        <div class="glass-card rounded-3xl p-12 text-center">
            <div
                class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6 text-gray-400 text-4xl">
                <i class="fa-solid fa-basket-shopping"></i>
            </div>
            <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-2">Your cart is empty</h2>
            <p class="text-gray-500 dark:text-gray-300 mb-8">Looks like you haven't added any items to your cart yet.</p>
            <a href="{{ route('shop') }}"
                class="bg-primary hover:bg-indigo-700 text-white font-medium py-3 px-8 rounded-full transition duration-300 shadow">
                Continue Shopping
            </a>
        </div>
    @else
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Cart Items -->
            <div class="w-full lg:w-2/3">
                <div class="glass-card rounded-3xl overflow-hidden">
                    <div class="p-6 sm:p-8">
                        <table class="w-full text-left">
                            <thead>
                                <tr class="text-gray-400 border-b border-gray-200">
                                    <th class="pb-4 font-medium uppercase text-sm">Product</th>
                                    <th class="pb-4 font-medium uppercase text-sm hidden sm:table-cell">Price</th>
                                    <th class="pb-4 font-medium uppercase text-sm">Quantity</th>
                                    <th class="pb-4 font-medium uppercase text-sm text-right">Total</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @foreach($cart as $id => $item)
                                    <tr>
                                        <td class="py-6 flex items-center">
                                            <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}"
                                                class="w-16 h-16 sm:w-20 sm:h-20 rounded-xl object-cover shadow-sm mr-4">
                                            <div>
                                                <h3 class="font-bold text-gray-800 dark:text-white">{{ $item['name'] }}</h3>
                                                <p class="text-gray-500 dark:text-gray-400 text-sm sm:hidden">${{ number_format($item['price'], 2) }}
                                                </p>
                                            </div>
                                        </td>
                                        <td class="py-6 hidden sm:table-cell font-medium text-gray-600">
                                            ${{ number_format($item['price'], 2) }}
                                        </td>
                                        <td class="py-6 font-medium text-gray-600">
                                            x{{ $item['quantity'] }}
                                        </td>
                                        <td class="py-6 font-bold text-gray-800 text-right">
                                            ${{ number_format($item['price'] * $item['quantity'], 2) }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Checkout Form -->
            <div class="w-full lg:w-1/3">
                <div class="glass-card rounded-3xl p-6 sm:p-8 sticky top-28">
                    <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-6 border-b border-gray-200 dark:border-gray-700 pb-4">Order Summary</h2>

                    <div class="flex justify-between mb-4 text-gray-600">
                        <span>Subtotal</span>
                        <span class="font-medium">${{ number_format($total, 2) }}</span>
                    </div>
                    <div class="flex justify-between mb-6 text-gray-600 border-b border-gray-200 pb-6">
                        <span>Shipping</span>
                        <span class="font-medium text-green-500">Free</span>
                    </div>
                    <div class="flex justify-between mb-8">
                        <span class="text-lg font-bold text-gray-800 dark:text-white">Total</span>
                        <span class="text-2xl font-extrabold text-primary">${{ number_format($total, 2) }}</span>
                    </div>

                    <form action="{{ route('checkout') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                                Full Name
                            </label>
                            <input
                                class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-primary focus:ring-2 focus:ring-indigo-200 outline-none transition bg-white dark:bg-gray-700 text-gray-900 dark:text-white dark:border-gray-600 bg-opacity-50 dark:bg-opacity-100"
                                id="name" name="name" type="text" required placeholder="John Doe">
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="phone">
                                Phone Number
                            </label>
                            <input
                                class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-primary focus:ring-2 focus:ring-indigo-200 outline-none transition bg-white dark:bg-gray-700 text-gray-900 dark:text-white dark:border-gray-600 bg-opacity-50 dark:bg-opacity-100"
                                id="phone" name="phone" type="text" required placeholder="+1 234 567 8900">
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="size">
                                Preferred Size
                            </label>
                            <select
                                class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-primary focus:ring-2 focus:ring-indigo-200 outline-none transition bg-white dark:bg-gray-700 text-gray-900 dark:text-white dark:border-gray-600 bg-opacity-50 dark:bg-opacity-100"
                                id="size" name="size" required>
                                <option value="" disabled selected>Select Size</option>
                                <option value="S">Small (S)</option>
                                <option value="M">Medium (M)</option>
                                <option value="L">Large (L)</option>
                                <option value="XL">Extra Large (XL)</option>
                            </select>
                        </div>

                        <div class="mb-6">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="address">
                                Shipping Address
                            </label>
                            <textarea
                                class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-primary focus:ring-2 focus:ring-indigo-200 outline-none transition bg-white dark:bg-gray-700 text-gray-900 dark:text-white dark:border-gray-600 bg-opacity-50 dark:bg-opacity-100 h-24 resize-none"
                                id="address" name="address" required placeholder="123 Street Name, City, Country"></textarea>
                        </div>

                        <!-- KHQR Payment Section -->
                        <div class="mb-8 border border-gray-200 rounded-2xl p-5 bg-white shadow-sm text-center">
                            <div class="flex items-center justify-center space-x-2 mb-4">
                                <span class="text-gray-800 dark:text-white font-bold text-lg">KHQR Payment</span>
                            </div>

                            <div class="flex justify-center mb-3">
                                <!-- User should place their image at public/images/khqr.jpg -->
                                <div class="p-2 bg-white rounded-xl shadow-sm border border-gray-100">
                                    <img src="{{ asset('images/khqr.jpg') }}" alt="KHQR Acleda" class="w-48 h-auto rounded-lg"
                                        onerror="this.src='https://placehold.co/400x400/02478f/white?text=KHQR+DA+PANHA'">
                                </div>
                            </div>

                            <p class="text-sm font-bold text-gray-800 mb-1">DA PANHA</p>
                            <p class="text-xs text-gray-500 mb-4">Scan the QR code with your banking app to pay</p>

                            <!-- Upload Receipt -->
                            <div class="text-left mb-4">
                                <label class="block text-gray-700 text-xs font-bold mb-2" for="receipt">
                                    Upload Payment Receipt <span class="text-red-500">*</span>
                                </label>
                                <input
                                    class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-primary hover:file:bg-indigo-100 transition"
                                    id="receipt" name="receipt" type="file" accept="image/*" required
                                    onchange="checkCheckoutReady()">
                            </div>

                            <!-- Confirm Amount -->
                            <div class="text-left flex items-start">
                                <input type="checkbox" id="confirm_amount" name="confirm_amount"
                                    class="mt-1 mr-2 rounded border-gray-300 text-primary focus:ring-primary" required
                                    onchange="checkCheckoutReady()">
                                <label for="confirm_amount" class="text-sm text-gray-700">
                                    I confirm that I have transferred exactly <strong
                                        class="text-primary">${{ number_format($total, 2) }}</strong>.
                                </label>
                            </div>
                        </div>

                        <button type="submit" id="place_order_btn"
                            class="w-full bg-gray-400 cursor-not-allowed text-white font-bold py-4 rounded-xl transition duration-300 shadow flex items-center justify-center group"
                            disabled>
                            Place Order <i class="fa-solid fa-lock ml-2" id="btn_icon"></i>
                        </button>
                    </form>

                    <script>
                        function checkCheckoutReady() {
                            const receipt = document.getElementById('receipt').files.length > 0;
                            const confirmed = document.getElementById('confirm_amount').checked;
                            const btn = document.getElementById('place_order_btn');
                            const icon = document.getElementById('btn_icon');

                            if (receipt && confirmed) {
                                btn.disabled = false;
                                btn.classList.remove('bg-gray-400', 'cursor-not-allowed');
                                btn.classList.add('bg-primary', 'hover:bg-indigo-700', 'shadow-lg', 'hover:shadow-xl');
                                icon.classList.replace('fa-lock', 'fa-arrow-right');
                                icon.classList.add('group-hover:translate-x-1', 'transition-transform');
                            } else {
                                btn.disabled = true;
                                btn.classList.add('bg-gray-400', 'cursor-not-allowed');
                                btn.classList.remove('bg-primary', 'hover:bg-indigo-700', 'shadow-lg', 'hover:shadow-xl');
                                icon.classList.replace('fa-arrow-right', 'fa-lock');
                                icon.classList.remove('group-hover:translate-x-1', 'transition-transform');
                            }
                        }
                    </script>
                </div>
            </div>
        </div>
    @endif
@endsection