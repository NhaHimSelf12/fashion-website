@extends('layouts.app')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold text-gray-800 dark:text-white">{{ isset($product) ? 'Edit Product' : 'Add New Product' }}</h1>
    <a href="{{ route('admin.products.index') }}" class="text-gray-500 dark:text-gray-400 hover:text-primary"><i class="fa-solid fa-arrow-left mr-1"></i> Back to Products</a>
</div>

<div class="glass-card p-8 rounded-2xl max-w-2xl mx-auto">
    <form action="{{ isset($product) ? route('admin.products.update', $product->id) : route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($product))
            @method('PUT')
        @endif

        <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-200 text-sm font-bold mb-2">Product Name</label>
            <input type="text" name="name" value="{{ isset($product) ? $product->name : old('name') }}" required class="w-full px-3 py-2 bg-white dark:bg-gray-700 text-gray-900 dark:text-white border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <div>
                <label class="block text-gray-700 dark:text-gray-200 text-sm font-bold mb-2">Category</label>
                <select name="category_id" class="w-full px-3 py-2 bg-white dark:bg-gray-700 text-gray-900 dark:text-white border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ (isset($product) && $product->category_id == $category->id) ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-gray-700 dark:text-gray-200 text-sm font-bold mb-2">Price ($)</label>
                <input type="number" step="0.01" name="price" value="{{ isset($product) ? $product->price : old('price') }}" required class="w-full px-3 py-2 bg-white dark:bg-gray-700 text-gray-900 dark:text-white border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <div>
                <label class="block text-gray-700 dark:text-gray-200 text-sm font-bold mb-2">Stock Quantity</label>
                <input type="number" name="stock" value="{{ isset($product) ? $product->stock : old('stock', 0) }}" required class="w-full px-3 py-2 bg-white dark:bg-gray-700 text-gray-900 dark:text-white border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
            </div>
            <div>
                <label class="block text-gray-700 dark:text-gray-200 text-sm font-bold mb-2">Discount Percentage (%)</label>
                <input type="number" name="discount_percent" min="0" max="100" value="{{ isset($product) ? $product->discount_percent : old('discount_percent', 0) }}" class="w-full px-3 py-2 bg-white dark:bg-gray-700 text-gray-900 dark:text-white border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
            </div>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-200 text-sm font-bold mb-2">Description</label>
            <textarea name="description" rows="4" class="w-full px-3 py-2 bg-white dark:bg-gray-700 text-gray-900 dark:text-white border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">{{ isset($product) ? $product->description : old('description') }}</textarea>
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 dark:text-gray-200 text-sm font-bold mb-2">Product Image</label>
            @if(isset($product) && $product->image)
                <div class="mb-2">
                    <img src="{{ str_starts_with($product->image, 'data:') ? $product->image : asset($product->image) }}" class="w-24 h-24 object-cover rounded shadow-sm">
                </div>
            @endif
            <input type="file" name="image_file" accept="image/*" class="w-full text-sm text-gray-500 dark:text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-primary file:text-white hover:file:bg-indigo-700 transition">
        </div>

        <div class="flex justify-end gap-2">
            <a href="{{ route('admin.products.index') }}" class="bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 text-gray-800 dark:text-white font-bold py-2 px-6 rounded-lg transition">Cancel</a>
            <button type="submit" class="bg-primary hover:bg-indigo-700 text-white font-bold py-2 px-6 rounded-lg transition">{{ isset($product) ? 'Update Product' : 'Save Product' }}</button>
        </div>
    </form>
</div>
@endsection
