@extends('layouts.app')

@section('content')
  <!-- Header -->
  <div class="mb-10 text-center reveal">
    <p class="text-xs font-medium uppercase tracking-[0.35em] text-gray-400 mb-2">Your Selection</p>
    <h1 class="font-serif text-4xl sm:text-5xl font-bold text-gray-900 dark:text-white">Shopping Cart.</h1>
  </div>

  @if(empty($cart))
    <div class="max-w-2xl mx-auto text-center py-20 reveal" style="--d:.1s">
        <i class="fa-solid fa-basket-shopping text-6xl text-gray-200 dark:text-gray-800 mb-6"></i>
        <h2 class="font-serif text-2xl font-bold text-gray-900 dark:text-white mb-4">Your Cart is Empty</h2>
        <p class="text-gray-500 dark:text-gray-400 font-light mb-8">Discover our latest collections and find something you love.</p>
        <a href="{{ route('shop') }}" class="inline-block btn-primary px-10 py-4 rounded-sm text-sm font-semibold uppercase tracking-widest hover:tracking-[0.25em] transition-all duration-300">
            Explore Shop
        </a>
    </div>
  @else
    <div class="flex flex-col lg:flex-row gap-12">
        <!-- Cart Items -->
        <div class="w-full lg:w-3/5 xl:w-2/3 reveal" style="--d:.1s">
            <div class="border-b border-gray-200 dark:border-gray-800 pb-4 mb-6 hidden sm:flex">
                <div class="w-3/5 text-xs font-semibold uppercase tracking-[0.2em] text-gray-400">Product</div>
                <div class="w-1/5 text-center text-xs font-semibold uppercase tracking-[0.2em] text-gray-400">Qty</div>
                <div class="w-1/5 text-right text-xs font-semibold uppercase tracking-[0.2em] text-gray-400">Total</div>
            </div>
            
            <div class="space-y-6">
                @foreach($cart as $id => $item)
                    <div class="flex flex-col sm:flex-row sm:items-center gap-4 sm:gap-6 border-b border-gray-100 dark:border-gray-800 pb-6 relative group">
                        <div class="w-full sm:w-3/5 flex items-center gap-4">
                            <div class="w-24 h-32 shrink-0 bg-gray-100 dark:bg-gray-800 overflow-hidden">
                                <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                            </div>
                            <div>
                                <h3 class="font-serif text-lg font-bold text-gray-900 dark:text-white mb-1">{{ $item['name'] }}</h3>
                                <p class="text-sm text-gray-500 dark:text-gray-400">${{ number_format($item['price'], 2) }}</p>
                            </div>
                        </div>
                        <div class="w-full sm:w-1/5 flex sm:justify-center items-center justify-between sm:justify-center">
                            <span class="sm:hidden text-xs uppercase tracking-widest text-gray-400">Quantity</span>
                            <span class="font-medium text-gray-900 dark:text-white">x{{ $item['quantity'] }}</span>
                        </div>
                        <div class="w-full sm:w-1/5 flex sm:justify-end items-center justify-between sm:justify-end">
                            <span class="sm:hidden text-xs uppercase tracking-widest text-gray-400">Total</span>
                            <span class="font-serif font-bold text-gray-900 dark:text-white text-lg">${{ number_format($item['price'] * $item['quantity'], 2) }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Checkout Form -->
        <div class="w-full lg:w-2/5 xl:w-1/3 reveal" style="--d:.2s">
            <div class="bg-gray-50 dark:bg-zinc-900 p-8 rounded-sm sticky top-28 border border-gray-100 dark:border-zinc-800">
                <h2 class="font-serif text-2xl font-bold text-gray-900 dark:text-white mb-6 uppercase tracking-wider border-b border-gray-200 dark:border-gray-700 pb-4">Summary</h2>

                <div class="flex justify-between mb-4 text-sm">
                    <span class="text-gray-500 dark:text-gray-400">Subtotal</span>
                    <span class="font-medium text-gray-900 dark:text-white">${{ number_format($total, 2) }}</span>
                </div>
                <div class="flex justify-between mb-6 text-sm border-b border-gray-200 dark:border-gray-700 pb-6">
                    <span class="text-gray-500 dark:text-gray-400">Shipping</span>
                    <span class="font-medium text-gray-900 dark:text-white uppercase tracking-widest text-xs">Complimentary</span>
                </div>
                <div class="flex justify-between mb-8 items-end">
                    <span class="text-sm font-semibold uppercase tracking-widest text-gray-900 dark:text-white">Total</span>
                    <span class="font-serif text-3xl font-bold text-gray-900 dark:text-white">${{ number_format($total, 2) }}</span>
                </div>

                <form action="{{ route('checkout') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="space-y-5 mb-8">
                        <div>
                            <label class="block text-xs font-semibold uppercase tracking-[0.2em] text-gray-500 dark:text-gray-400 mb-2" for="name">Full Name</label>
                            <input class="w-full bg-transparent border-0 border-b border-gray-300 dark:border-gray-700 px-0 py-2 text-gray-900 dark:text-white placeholder-gray-400 focus:ring-0 focus:border-gray-900 dark:focus:border-white transition-colors text-sm" id="name" name="name" type="text" required placeholder="John Doe">
                        </div>

                        <div>
                            <label class="block text-xs font-semibold uppercase tracking-[0.2em] text-gray-500 dark:text-gray-400 mb-2" for="phone">Phone Number</label>
                            <input class="w-full bg-transparent border-0 border-b border-gray-300 dark:border-gray-700 px-0 py-2 text-gray-900 dark:text-white placeholder-gray-400 focus:ring-0 focus:border-gray-900 dark:focus:border-white transition-colors text-sm" id="phone" name="phone" type="text" required placeholder="+855 12 345 678">
                        </div>

                        <div>
                            <label class="block text-xs font-semibold uppercase tracking-[0.2em] text-gray-500 dark:text-gray-400 mb-2" for="size">Preferred Size</label>
                            <select class="w-full bg-transparent border-0 border-b border-gray-300 dark:border-gray-700 px-0 py-2 text-gray-900 dark:text-white focus:ring-0 focus:border-gray-900 dark:focus:border-white transition-colors text-sm" id="size" name="size" required>
                                <option value="" disabled selected class="text-gray-900">Select Size</option>
                                <option value="S" class="text-gray-900">Small</option>
                                <option value="M" class="text-gray-900">Medium</option>
                                <option value="L" class="text-gray-900">Large</option>
                                <option value="XL" class="text-gray-900">Extra Large</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-semibold uppercase tracking-[0.2em] text-gray-500 dark:text-gray-400 mb-2" for="address">Shipping Address</label>
                            <textarea class="w-full bg-transparent border-0 border-b border-gray-300 dark:border-gray-700 px-0 py-2 text-gray-900 dark:text-white placeholder-gray-400 focus:ring-0 focus:border-gray-900 dark:focus:border-white transition-colors text-sm h-16 resize-none" id="address" name="address" required placeholder="123 Street Name, City"></textarea>
                        </div>
                    </div>

                    <!-- KHQR Payment Section -->
                    <div class="mb-8 bg-white dark:bg-black border border-gray-200 dark:border-gray-800 rounded-sm p-6 text-center">
                        <p class="text-xs font-semibold uppercase tracking-[0.2em] text-gray-900 dark:text-white mb-4">KHQR Payment</p>

                        <div class="flex justify-center mb-4">
                            <div class="p-2 bg-white rounded-sm shadow-sm border border-gray-100 dark:border-gray-800">
                                <img src="{{ asset('images/khqr.jpg') }}" alt="KHQR" class="w-40 h-auto" onerror="this.src='https://placehold.co/400x400/02478f/white?text=KHQR+DA+PANHA'">
                            </div>
                        </div>

                        <p class="text-sm font-bold text-gray-900 dark:text-white mb-1">DA PANHA</p>
                        <p class="text-xs text-gray-500 mb-6">Scan QR to pay</p>

                        <!-- Upload Receipt -->
                        <div class="text-left mb-5">
                            <label class="block text-[10px] font-semibold uppercase tracking-[0.1em] text-gray-500 dark:text-gray-400 mb-2" for="receipt">Upload Receipt *</label>
                            <input class="w-full text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-sm file:border-0 file:text-xs file:font-semibold file:uppercase file:tracking-widest file:bg-gray-100 file:text-gray-900 hover:file:bg-gray-200 dark:file:bg-zinc-800 dark:file:text-white dark:hover:file:bg-zinc-700 transition" id="receipt" name="receipt" type="file" accept="image/*" required onchange="checkCheckoutReady()">
                        </div>

                        <!-- Confirm Amount -->
                        <div class="text-left flex items-start mt-4">
                            <input type="checkbox" id="confirm_amount" name="confirm_amount" class="mt-0.5 mr-3 w-4 h-4 rounded-sm border-gray-300 dark:border-gray-600 bg-transparent text-gray-900 focus:ring-gray-900 dark:focus:ring-white" required onchange="checkCheckoutReady()">
                            <label for="confirm_amount" class="text-xs text-gray-600 dark:text-gray-400 leading-relaxed">
                                I confirm the exact transfer of <strong class="text-gray-900 dark:text-white font-serif italic text-sm">${{ number_format($total, 2) }}</strong>.
                            </label>
                        </div>
                    </div>

                    <button type="submit" id="place_order_btn" class="group w-full py-4 rounded-sm text-sm font-semibold uppercase tracking-[0.25em] flex items-center justify-center gap-3 transition-all duration-300 bg-gray-200 text-gray-400 dark:bg-zinc-800 dark:text-zinc-500 cursor-not-allowed" disabled>
                        Checkout
                        <i class="fa-solid fa-lock" id="btn_icon"></i>
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
                            btn.className = 'group w-full py-4 rounded-sm text-sm font-semibold uppercase tracking-[0.25em] flex items-center justify-center gap-3 transition-all duration-300 btn-primary hover:tracking-[0.35em]';
                            icon.className = 'fa-solid fa-arrow-right-long transition-transform duration-300 group-hover:translate-x-1';
                        } else {
                            btn.disabled = true;
                            btn.className = 'group w-full py-4 rounded-sm text-sm font-semibold uppercase tracking-[0.25em] flex items-center justify-center gap-3 transition-all duration-300 bg-gray-200 text-gray-400 dark:bg-zinc-800 dark:text-zinc-500 cursor-not-allowed';
                            icon.className = 'fa-solid fa-lock';
                        }
                    }
                </script>
            </div>
        </div>
    </div>
  @endif
@endsection