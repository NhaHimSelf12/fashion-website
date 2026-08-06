@extends('layouts.app')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold text-gray-800 dark:text-white">Manage Products (Clothes)</h1>
    <div>
        <a href="{{ route('admin.dashboard') }}" class="text-gray-500 dark:text-gray-400 hover:text-primary mr-4"><i class="fa-solid fa-arrow-left mr-1"></i> Dashboard</a>
        <a href="{{ route('admin.products.create') }}" class="bg-primary hover:bg-indigo-700 text-white font-medium py-2 px-4 rounded-lg transition"><i class="fa-solid fa-plus mr-1"></i> Add Product</a>
    </div>
</div>

<div class="glass-card p-6 rounded-2xl">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50 dark:bg-gray-800/50 border-b border-gray-200 dark:border-gray-700">
                    <th class="py-3 px-4 font-semibold text-gray-600 dark:text-gray-300 rounded-tl-lg">Image</th>
                    <th class="py-3 px-4 font-semibold text-gray-600 dark:text-gray-300">Name</th>
                    <th class="py-3 px-4 font-semibold text-gray-600 dark:text-gray-300">Category</th>
                    <th class="py-3 px-4 font-semibold text-gray-600 dark:text-gray-300">Price</th>
                    <th class="py-3 px-4 font-semibold text-gray-600 dark:text-gray-300">Stock</th>
                    <th class="py-3 px-4 font-semibold text-gray-600 dark:text-gray-300">Discount</th>
                    <th class="py-3 px-4 font-semibold text-gray-600 dark:text-gray-300 text-right rounded-tr-lg">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $product)
                <tr class="border-b border-gray-100 dark:border-gray-700 hover:bg-gray-50 dark:bg-gray-800/50">
                    <td class="py-3 px-4">
                        <img src="{{ !empty($product->image) ? (str_starts_with($product->image, 'data:') ? route('image.product', $product->id) : (str_starts_with($product->image, 'http') ? $product->image : asset($product->image))) : asset('images/logo.jpg') }}" class="w-12 h-12 object-cover rounded shadow-sm" onerror="this.onerror=null;this.src='{{ asset('images/logo.jpg') }}';">
                    </td>
                    <td class="py-3 px-4 font-medium">{{ $product->name }}</td>
                    <td class="py-3 px-4">{{ $product->category ? $product->category->name : 'N/A' }}</td>
                    <td class="py-3 px-4 font-bold text-primary">${{ number_format($product->price, 2) }}</td>
                    <td class="py-3 px-4">
                        <span class="px-2 py-1 text-xs rounded-full {{ $product->stock > 10 ? 'bg-green-100 text-green-700' : ($product->stock > 0 ? 'bg-yellow-100 text-yellow-700' : 'bg-red-100 text-red-700') }}">
                            {{ $product->stock }}
                        </span>
                    </td>
                    <td class="py-3 px-4">
                        @if($product->discount_percent > 0)
                            <span class="px-2 py-1 text-xs bg-red-100 text-red-700 rounded-full font-bold">-{{ $product->discount_percent }}%</span>
                        @else
                            <span class="text-gray-400 text-sm">-</span>
                        @endif
                    </td>
                    <td class="py-3 px-4 text-right flex justify-end gap-2 items-center h-full">
                        <a href="{{ route('admin.products.edit', $product->id) }}" class="bg-yellow-100 text-yellow-600 hover:bg-yellow-200 p-2 rounded-lg transition"><i class="fa-solid fa-pen-to-square"></i></a>
                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-100 text-red-600 hover:bg-red-200 p-2 rounded-lg transition"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="py-8 text-center text-gray-500 dark:text-gray-400">No products found. Add your first piece of clothing!</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
