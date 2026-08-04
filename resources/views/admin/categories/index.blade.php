@extends('layouts.app')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold text-gray-800 dark:text-white">Manage Categories</h1>
    <a href="{{ route('admin.dashboard') }}" class="text-gray-500 dark:text-gray-400 hover:text-primary"><i class="fa-solid fa-arrow-left mr-1"></i> Back to Dashboard</a>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-8">
    <!-- Category Form -->
    <div class="md:col-span-1">
        <div class="glass-card p-6 rounded-2xl sticky top-24">
            <h2 class="text-xl font-bold mb-4">{{ isset($category) ? 'Edit Category' : 'Add New Category' }}</h2>
            <form action="{{ isset($category) ? route('admin.categories.update', $category->id) : route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if(isset($category))
                    @method('PUT')
                @endif
                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-200 text-sm font-bold mb-2">Category Name</label>
                    <input type="text" name="name" value="{{ isset($category) ? $category->name : old('name') }}" required class="w-full px-3 py-2 bg-white dark:bg-gray-700 text-gray-900 dark:text-white border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-200 text-sm font-bold mb-2">Category Image</label>
                    @if(isset($category) && $category->image)
                        <div class="mb-2">
                            <img src="{{ str_starts_with($category->image, 'data:') ? $category->image : asset($category->image) }}" alt="{{ $category->name }}" class="w-24 h-24 object-cover rounded-lg shadow-sm">
                        </div>
                    @endif
                    <input type="file" name="image" accept="image/*" class="w-full px-3 py-2 bg-white dark:bg-gray-700 text-gray-900 dark:text-white border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Recommended size: 400x400px. Max 2MB.</p>
                </div>
                <button type="submit" class="w-full bg-primary hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-lg transition">{{ isset($category) ? 'Update' : 'Save Category' }}</button>
            </form>
            @if(isset($category))
            <div class="mt-4 text-center">
                <a href="{{ route('admin.categories.index') }}" class="text-gray-500 dark:text-gray-400 hover:text-gray-800 dark:text-white text-sm">Cancel Edit</a>
            </div>
            @endif
        </div>
    </div>

    <!-- Category List -->
    <div class="md:col-span-2">
        <div class="glass-card p-6 rounded-2xl">
            <h2 class="text-xl font-bold mb-4">Category List</h2>
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 dark:bg-gray-800/50 border-b border-gray-200 dark:border-gray-700">
                        <th class="py-3 px-4 font-semibold text-gray-600 dark:text-gray-300 rounded-tl-lg">ID</th>
                        <th class="py-3 px-4 font-semibold text-gray-600 dark:text-gray-300">Image</th>
                        <th class="py-3 px-4 font-semibold text-gray-600 dark:text-gray-300">Name</th>
                        <th class="py-3 px-4 font-semibold text-gray-600 dark:text-gray-300 text-right rounded-tr-lg">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $cat)
                    <tr class="border-b border-gray-100 dark:border-gray-700 hover:bg-gray-50 dark:bg-gray-800/50">
                        <td class="py-3 px-4">{{ $cat->id }}</td>
                        <td class="py-3 px-4">
                            @if($cat->image)
                                <img src="{{ str_starts_with($cat->image, 'data:') ? $cat->image : asset($cat->image) }}" alt="{{ $cat->name }}" class="w-12 h-12 object-cover rounded-lg shadow-sm">
                            @else
                                <div class="w-12 h-12 bg-gray-200 dark:bg-gray-700 rounded-lg flex items-center justify-center text-gray-400 dark:text-gray-500">
                                    <i class="fa-solid fa-image"></i>
                                </div>
                            @endif
                        </td>
                        <td class="py-3 px-4 font-medium">{{ $cat->name }}</td>
                        <td class="py-3 px-4 text-right flex justify-end gap-2 items-center">
                            <a href="{{ route('admin.categories.edit', $cat->id) }}" class="bg-yellow-100 text-yellow-600 hover:bg-yellow-200 p-2 rounded-lg transition"><i class="fa-solid fa-pen-to-square"></i></a>
                            <form action="{{ route('admin.categories.destroy', $cat->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-100 text-red-600 hover:bg-red-200 p-2 rounded-lg transition"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="py-4 text-center text-gray-500 dark:text-gray-400">No categories found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
