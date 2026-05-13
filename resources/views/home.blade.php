@extends('layouts.app')

@section('content')
<div class="relative rounded-3xl overflow-hidden shadow-2xl mb-12">
    <div class="absolute inset-0 bg-gradient-to-r from-gray-900 to-transparent z-10"></div>
    <img src="https://images.unsplash.com/photo-1441984904996-e0b6ba687e04?auto=format&fit=crop&w=1600&q=80" alt="Hero" class="w-full h-[500px] object-cover">
    
    <div class="absolute inset-0 z-20 flex flex-col justify-center px-8 md:px-16 w-full md:w-2/3 lg:w-1/2">
        <span class="text-secondary font-bold tracking-wider uppercase mb-2">New Collection</span>
        <h1 class="text-4xl md:text-6xl font-extrabold text-white mb-6 leading-tight">Elevate Your<br>Everyday Style</h1>
        <p class="text-gray-200 text-lg mb-8 max-w-md">Discover the latest trends in fashion and explore our new arrivals of premium quality clothing.</p>
        <div>
            <a href="{{ route('shop') }}" class="bg-primary hover:bg-indigo-700 text-white font-semibold py-3 px-8 rounded-full transition duration-300 shadow-lg hover:shadow-xl inline-flex items-center">
                Shop Now <i class="fa-solid fa-arrow-right ml-2"></i>
            </a>
        </div>
    </div>
</div>

<div class="mb-12 text-center">
    <h2 class="text-3xl font-bold text-gray-800 dark:text-white mb-2">Why Choose Us</h2>
    <div class="w-16 h-1 bg-gradient-to-r from-primary to-secondary mx-auto rounded-full mb-8"></div>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="glass-card p-8 rounded-2xl">
            <div class="w-14 h-14 bg-indigo-100 text-primary rounded-full flex items-center justify-center text-2xl mx-auto mb-4">
                <i class="fa-solid fa-truck-fast"></i>
            </div>
            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Fast Delivery</h3>
            <p class="text-gray-600 dark:text-gray-300 text-sm">We provide fast and secure delivery for all your purchases.</p>
        </div>
        <div class="glass-card p-8 rounded-2xl">
            <div class="w-14 h-14 bg-pink-100 text-secondary rounded-full flex items-center justify-center text-2xl mx-auto mb-4">
                <i class="fa-solid fa-medal"></i>
            </div>
            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Premium Quality</h3>
            <p class="text-gray-600 dark:text-gray-300 text-sm">All our products are crafted from the finest materials.</p>
        </div>
        <div class="glass-card p-8 rounded-2xl">
            <div class="w-14 h-14 bg-purple-100 text-purple-600 rounded-full flex items-center justify-center text-2xl mx-auto mb-4">
                <i class="fa-solid fa-headset"></i>
            </div>
            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">24/7 Support</h3>
            <p class="text-gray-600 dark:text-gray-300 text-sm">Our customer support team is always here to help you.</p>
        </div>
    </div>
</div>
@endsection
