@extends('layouts.app')

@section('content')
<div class="mb-8 flex flex-col md:flex-row justify-between items-start md:items-end gap-4">
    <div>
        <h1 class="text-3xl font-bold text-gray-800 dark:text-white">
            {{ isset($categoryName) ? $categoryName . ' Collection' : 'Shop Collection' }}
        </h1>
        <p class="text-gray-500 dark:text-gray-300 mt-1">Browse our latest {{ isset($categoryName) ? strtolower($categoryName) : 'clothing' }} items and add them to your cart.</p>
    </div>
    
    <!-- Search Form -->
    <form action="{{ url()->current() }}" method="GET" class="w-full md:w-auto flex relative group">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search products..." class="w-full md:w-64 pl-11 pr-4 py-2.5 rounded-xl border border-gray-200 dark:border-gray-700 bg-white/50 dark:bg-gray-800/50 backdrop-blur-md text-gray-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all shadow-sm group-hover:shadow-md">
        <i class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400 group-focus-within:text-primary transition-colors"></i>
        @if(request('search'))
            <a href="{{ url()->current() }}" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-red-500 transition-colors">
                <i class="fa-solid fa-xmark"></i>
            </a>
        @endif
        <button type="submit" class="hidden">Search</button>
    </form>
</div>

@if($products->isEmpty())
    <div class="col-span-full text-center py-16">
        <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-gray-100 dark:bg-gray-800 mb-6">
            <i class="fa-solid fa-magnifying-glass text-3xl text-gray-400"></i>
        </div>
        <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-2">No products found</h2>
        <p class="text-gray-500 dark:text-gray-400 mb-6">We couldn't find any products matching "{{ request('search') }}"</p>
        <a href="{{ url()->current() }}" class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-xl text-white bg-primary hover:bg-opacity-90 transition-all shadow-lg hover:shadow-xl hover:-translate-y-1">
            Clear Search
        </a>
    </div>
@else
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($products as $product)
        <div class="glass-card rounded-2xl overflow-hidden product-card flex flex-col h-full" style="animation-delay: {{ $loop->index * 0.1 }}s">
            <div class="h-64 product-img-wrapper relative">
                <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" class="w-full h-full object-cover product-img">
                <div class="absolute top-4 right-4 bg-white dark:bg-gray-800 px-3 py-1 rounded-full text-sm font-bold text-primary shadow">
                    ${{ number_format($product['price'], 2) }}
                </div>
            </div>
            <div class="p-6 flex-grow flex flex-col">
                <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-2">{{ $product['name'] }}</h3>
                <p class="text-gray-500 dark:text-gray-300 text-sm mb-4 flex-grow">{{ $product['desc'] }}</p>
                
                <form action="{{ route('cart.add') }}" method="POST" class="mt-auto">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product['id'] }}">
                    <button type="submit" class="w-full bg-gray-900 hover:bg-primary text-white font-medium py-3 rounded-xl transition duration-300 flex items-center justify-center group transform hover:-translate-y-1 hover:shadow-lg">
                        <i class="fa-solid fa-cart-plus mr-2 group-hover:scale-110 transition-transform"></i> Add to Cart
                    </button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
@endif
@endsection
