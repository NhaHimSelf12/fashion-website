@extends('layouts.app')

@section('content')
    <div class="mb-8 text-center">
        <h1 class="text-3xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-primary to-secondary">Categories
        </h1>
        <p class="text-gray-500 mt-2">Explore our wide range of fashion categories.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($categories as $category)
            <a href="{{ route('category.show', $category->id) }}"
                class="relative rounded-2xl overflow-hidden h-64 group cursor-pointer block">
                @if($category->image)
                    <img src="{{ asset($category->image) }}" alt="{{ $category->name }}"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                @else
                    <div
                        class="w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 group-hover:scale-105 transition-transform duration-500">
                        <i class="fa-solid fa-image text-4xl"></i>
                    </div>
                @endif
                <div
                    class="absolute inset-0 bg-black bg-opacity-40 flex flex-col items-center justify-center group-hover:bg-opacity-50 transition-all duration-300">
                    <h2 class="text-3xl font-bold text-white tracking-widest uppercase">{{ $category->name }}</h2>
                    <span
                        class="mt-2 px-4 py-1 bg-primary text-white text-sm font-semibold rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        {{ $category->products->count() }} Products
                    </span>
                </div>
            </a>
        @empty
            <div class="col-span-full text-center py-10">
                <p class="text-gray-500">No categories available at the moment.</p>
            </div>
        @endforelse
    </div>
@endsection