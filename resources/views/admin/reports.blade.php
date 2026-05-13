@extends('layouts.app')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold text-gray-800 dark:text-white">Sales Reports</h1>
    <a href="{{ route('admin.dashboard') }}" class="text-gray-500 dark:text-gray-400 hover:text-primary"><i class="fa-solid fa-arrow-left mr-1"></i> Back to Dashboard</a>
</div>

<div class="glass-card p-6 rounded-2xl mb-8">
    <form method="GET" action="{{ route('admin.reports') }}" class="flex flex-col sm:flex-row gap-4 items-end">
        <div class="w-full sm:w-1/3">
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Filter by Period</label>
            <select name="filter" class="w-full bg-white dark:bg-gray-700 text-gray-900 dark:text-white border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50 py-2 px-3 border" onchange="this.form.submit()">
                <option value="daily" {{ $filter == 'daily' ? 'selected' : '' }}>Daily (Today)</option>
                <option value="monthly" {{ $filter == 'monthly' ? 'selected' : '' }}>Monthly (This Month)</option>
                <option value="yearly" {{ $filter == 'yearly' ? 'selected' : '' }}>Yearly (This Year)</option>
            </select>
        </div>
        <div class="flex gap-2">
            <button type="submit" class="bg-primary hover:bg-indigo-700 text-white font-medium py-2 px-4 rounded-lg transition">Filter</button>
            <a href="{{ route('admin.reports.print', ['filter' => $filter]) }}" target="_blank" class="bg-gray-800 hover:bg-gray-900 text-white font-medium py-2 px-4 rounded-lg transition"><i class="fa-solid fa-print mr-1"></i> Print Report</a>
        </div>
    </form>
</div>

<div class="glass-card p-6 rounded-2xl">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold text-gray-800 dark:text-white">Order List - {{ ucfirst($filter) }}</h2>
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded-lg font-bold">
            Total Revenue: ${{ number_format($totalRevenue, 2) }}
        </div>
    </div>
    
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50 dark:bg-gray-800/50 border-b border-gray-200 dark:border-gray-700">
                    <th class="py-3 px-4 font-semibold text-gray-600 dark:text-gray-300 rounded-tl-lg">Order ID</th>
                    <th class="py-3 px-4 font-semibold text-gray-600 dark:text-gray-300">Customer Name</th>
                    <th class="py-3 px-4 font-semibold text-gray-600 dark:text-gray-300">Phone</th>
                    <th class="py-3 px-4 font-semibold text-gray-600 dark:text-gray-300">Date</th>
                    <th class="py-3 px-4 font-semibold text-gray-600 dark:text-gray-300">Status</th>
                    <th class="py-3 px-4 font-semibold text-gray-600 dark:text-gray-300 text-right rounded-tr-lg">Total</th>
                </tr>
            </thead>
            <tbody>
                @forelse($orders as $order)
                <tr class="border-b border-gray-100 dark:border-gray-700 hover:bg-gray-50 dark:bg-gray-800/50">
                    <td class="py-3 px-4 font-medium text-gray-800 dark:text-white">{{ $order->order_number }}</td>
                    <td class="py-3 px-4">{{ $order->name }}</td>
                    <td class="py-3 px-4">{{ $order->phone }}</td>
                    <td class="py-3 px-4">{{ $order->created_at->format('M d, Y H:i') }}</td>
                    <td class="py-3 px-4">
                        <span class="px-2 py-1 text-xs rounded-full {{ $order->status == 'pending' ? 'bg-yellow-100 text-yellow-800' : 'bg-green-100 text-green-800' }}">
                            {{ ucfirst($order->status) }}
                        </span>
                    </td>
                    <td class="py-3 px-4 font-bold text-primary text-right">${{ number_format($order->total, 2) }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="py-8 text-center text-gray-500 dark:text-gray-400">No orders found for this period.</td>
                </tr>
                @endforelse
            </tbody>
            @if($orders->count() > 0)
            <tfoot>
                <tr class="bg-gray-50 dark:bg-gray-800/50">
                    <td colspan="5" class="py-3 px-4 font-bold text-right">Total:</td>
                    <td class="py-3 px-4 font-bold text-primary text-right">${{ number_format($totalRevenue, 2) }}</td>
                </tr>
            </tfoot>
            @endif
        </table>
    </div>
</div>
@endsection
