@extends('layouts.app')

@section('content')
<div class="mb-6">
    <h1 class="text-3xl font-bold text-gray-800 dark:text-white">Admin Dashboard</h1>
</div>

<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
    <div class="glass-card p-6 rounded-2xl flex items-center shadow-sm">
        <div class="p-4 bg-indigo-100 text-indigo-600 rounded-full mr-4">
            <i class="fa-solid fa-cart-shopping text-2xl"></i>
        </div>
        <div>
            <p class="text-gray-500 dark:text-gray-400 text-sm font-semibold uppercase">Total Orders</p>
            <p class="text-2xl font-bold text-gray-800 dark:text-white">{{ $totalOrders }}</p>
        </div>
    </div>
    
    <div class="glass-card p-6 rounded-2xl flex items-center shadow-sm">
        <div class="p-4 bg-green-100 text-green-600 rounded-full mr-4">
            <i class="fa-solid fa-dollar-sign text-2xl"></i>
        </div>
        <div>
            <p class="text-gray-500 dark:text-gray-400 text-sm font-semibold uppercase">Total Revenue</p>
            <p class="text-2xl font-bold text-gray-800 dark:text-white">${{ number_format($totalRevenue, 2) }}</p>
        </div>
    </div>

    <div class="glass-card p-6 rounded-2xl flex items-center shadow-sm">
        <div class="p-4 bg-blue-100 text-blue-600 rounded-full mr-4">
            <i class="fa-solid fa-shirt text-2xl"></i>
        </div>
        <div>
            <p class="text-gray-500 dark:text-gray-400 text-sm font-semibold uppercase">Products</p>
            <p class="text-2xl font-bold text-gray-800 dark:text-white">{{ $totalProducts }}</p>
        </div>
    </div>

    <div class="glass-card p-6 rounded-2xl flex items-center shadow-sm">
        <div class="p-4 bg-yellow-100 text-yellow-600 rounded-full mr-4">
            <i class="fa-solid fa-tags text-2xl"></i>
        </div>
        <div>
            <p class="text-gray-500 dark:text-gray-400 text-sm font-semibold uppercase">Categories</p>
            <p class="text-2xl font-bold text-gray-800 dark:text-white">{{ $totalCategories }}</p>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <div class="lg:col-span-2 glass-card p-6 rounded-2xl">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-bold text-gray-800 dark:text-white">Recent Orders</h2>
            <a href="{{ route('admin.reports') }}" class="text-primary text-sm font-semibold hover:underline">View All</a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-gray-200 dark:border-gray-700">
                        <th class="py-3 px-4 font-semibold text-gray-600 dark:text-gray-300">Order ID</th>
                        <th class="py-3 px-4 font-semibold text-gray-600 dark:text-gray-300">Customer</th>
                        <th class="py-3 px-4 font-semibold text-gray-600 dark:text-gray-300">Date</th>
                        <th class="py-3 px-4 font-semibold text-gray-600 dark:text-gray-300">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentOrders as $order)
                    <tr class="border-b border-gray-100 dark:border-gray-700 hover:bg-gray-50 dark:bg-gray-800/50">
                        <td class="py-3 px-4 font-medium text-gray-800 dark:text-white">{{ $order->order_number }}</td>
                        <td class="py-3 px-4">{{ $order->name }}</td>
                        <td class="py-3 px-4">{{ $order->created_at->format('M d, Y') }}</td>
                        <td class="py-3 px-4 font-bold text-primary">${{ number_format($order->total, 2) }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="py-4 text-center text-gray-500 dark:text-gray-400">No orders found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    
    <div class="glass-card p-6 rounded-2xl flex flex-col justify-between">
        <div>
            <h2 class="text-xl font-bold text-gray-800 dark:text-white mb-4">Quick Actions</h2>
            <div class="space-y-3">
                <a href="{{ route('admin.products.index') }}" class="flex items-center p-3 rounded-xl border border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:bg-gray-800/50 transition">
                    <div class="w-10 h-10 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center mr-3">
                        <i class="fa-solid fa-shirt"></i>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-800 dark:text-white">Manage Products</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">Add, edit, or delete products</p>
                    </div>
                </a>
                
                <a href="{{ route('admin.categories.index') }}" class="flex items-center p-3 rounded-xl border border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:bg-gray-800/50 transition">
                    <div class="w-10 h-10 rounded-full bg-yellow-100 text-yellow-600 flex items-center justify-center mr-3">
                        <i class="fa-solid fa-tags"></i>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-800 dark:text-white">Manage Categories</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">Organize your shop</p>
                    </div>
                </a>
                
                <a href="{{ route('admin.reports') }}" class="flex items-center p-3 rounded-xl border border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:bg-gray-800/50 transition">
                    <div class="w-10 h-10 rounded-full bg-green-100 text-green-600 flex items-center justify-center mr-3">
                        <i class="fa-solid fa-chart-line"></i>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-800 dark:text-white">Sales Reports</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">View and print daily/monthly reports</p>
                    </div>
                </a>

                <a href="{{ route('admin.settings') }}" class="flex items-center p-3 rounded-xl border border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:bg-gray-800/50 transition">
                    <div class="w-10 h-10 rounded-full bg-purple-100 text-purple-600 flex items-center justify-center mr-3">
                        <i class="fa-solid fa-cog"></i>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-800 dark:text-white">Settings</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">Manage KHQR Payment Image</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
