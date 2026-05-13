<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Report - Fusion T-shirt</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @media print {
            body { font-family: Arial, sans-serif; }
            .no-print { display: none; }
        }
    </style>
</head>
<body class="bg-white text-gray-900 p-8 max-w-4xl mx-auto">
    <div class="flex justify-between items-center mb-8 pb-4 border-b-2 border-gray-200">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Fusion T-shirt</h1>
            <p class="text-gray-500">Sales Report</p>
        </div>
        <div class="text-right">
            <p class="font-bold text-xl">Report Period: {{ ucfirst($filter) }}</p>
            <p class="text-gray-500">Generated on: {{ now()->format('M d, Y H:i') }}</p>
        </div>
    </div>

    <div class="mb-8">
        <div class="bg-gray-100 p-4 rounded-lg inline-block">
            <p class="text-gray-600 text-sm font-semibold uppercase">Total Revenue</p>
            <p class="text-3xl font-bold text-gray-800">${{ number_format($totalRevenue, 2) }}</p>
        </div>
    </div>

    <table class="w-full text-left border-collapse mb-8">
        <thead>
            <tr class="bg-gray-100 border-y-2 border-gray-300">
                <th class="py-3 px-4 font-bold">Order ID</th>
                <th class="py-3 px-4 font-bold">Customer Name</th>
                <th class="py-3 px-4 font-bold">Date</th>
                <th class="py-3 px-4 font-bold text-right">Total</th>
            </tr>
        </thead>
        <tbody>
            @forelse($orders as $order)
            <tr class="border-b border-gray-200">
                <td class="py-2 px-4">{{ $order->order_number }}</td>
                <td class="py-2 px-4">{{ $order->name }}</td>
                <td class="py-2 px-4">{{ $order->created_at->format('M d, Y H:i') }}</td>
                <td class="py-2 px-4 text-right">${{ number_format($order->total, 2) }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="py-4 text-center text-gray-500">No orders found.</td>
            </tr>
            @endforelse
        </tbody>
        @if($orders->count() > 0)
        <tfoot>
            <tr class="border-t border-gray-800">
                <td colspan="3" class="py-3 px-4 font-bold text-right">Grand Total:</td>
                <td class="py-3 px-4 font-bold text-right">${{ number_format($totalRevenue, 2) }}</td>
            </tr>
        </tfoot>
        @endif
    </table>

    <div class="text-center no-print mt-12">
        <button onclick="window.print()" class="bg-blue-600 text-white px-6 py-2 rounded-lg font-bold hover:bg-blue-700">
            Print Document
        </button>
        <button onclick="window.close()" class="bg-gray-200 text-gray-800 px-6 py-2 rounded-lg font-bold hover:bg-gray-300 ml-4">
            Close Window
        </button>
    </div>
    
    <script>
        window.onload = function() {
            setTimeout(function() {
                window.print();
            }, 500);
        }
    </script>
</body>
</html>
