@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto mt-8 mb-16">
    <div class="glass-card rounded-3xl overflow-hidden p-8 sm:p-12 text-center transform transition-all duration-500 hover:shadow-2xl">
        <div class="w-24 h-24 bg-green-100 dark:bg-green-900/30 text-green-500 rounded-full flex items-center justify-center mx-auto mb-6 text-5xl shadow-inner animate-bounce-in opacity-0">
            <i class="fa-solid fa-check"></i>
        </div>
        
        <h1 class="text-3xl sm:text-4xl font-extrabold text-gray-800 dark:text-white mb-4 animate-fade-up" style="animation-delay: 0.2s; opacity: 0;">Your Payment Success!</h1>
        <p class="text-gray-500 dark:text-gray-400 text-lg mb-8 animate-fade-up" style="animation-delay: 0.4s; opacity: 0;">Thank you for your purchase. Your order has been processed successfully and an alert has been sent via Telegram.</p>
        
        <div class="bg-white dark:bg-gray-800/60 bg-opacity-60 rounded-2xl p-6 sm:p-8 text-left mb-8 border border-gray-100 dark:border-gray-700 animate-fade-up" style="animation-delay: 0.6s; opacity: 0;">
            <h2 class="text-xl font-bold text-gray-800 dark:text-white mb-6 border-b border-gray-200 dark:border-gray-700 pb-4">Order Details</h2>
            
            <div class="space-y-4">
                <div class="flex justify-between items-start">
                    <span class="text-gray-500 dark:text-gray-400 w-1/3">Order ID</span>
                    <span class="font-bold text-gray-800 dark:text-white w-2/3 text-right">{{ $order['order_id'] }}</span>
                </div>
                
                <div class="flex justify-between items-start">
                    <span class="text-gray-500 dark:text-gray-400 w-1/3">Name</span>
                    <span class="font-bold text-gray-800 dark:text-white w-2/3 text-right">{{ $order['name'] }}</span>
                </div>
                
                <div class="flex justify-between items-start">
                    <span class="text-gray-500 dark:text-gray-400 w-1/3">Phone</span>
                    <span class="font-bold text-gray-800 dark:text-white w-2/3 text-right">{{ $order['phone'] }}</span>
                </div>
                
                <div class="flex justify-between items-start">
                    <span class="text-gray-500 dark:text-gray-400 w-1/3">Size</span>
                    <span class="font-bold text-gray-800 dark:text-white w-2/3 text-right">{{ $order['size'] }}</span>
                </div>
                
                <div class="flex justify-between items-start">
                    <span class="text-gray-500 dark:text-gray-400 w-1/3">Shipping Address</span>
                    <span class="font-bold text-gray-800 dark:text-white w-2/3 text-right">{{ $order['address'] }}</span>
                </div>
                
                <div class="flex justify-between items-start pt-4 mt-4 border-t border-gray-200 dark:border-gray-700">
                    <span class="text-gray-800 dark:text-white font-bold w-1/3">Total Amount</span>
                    <span class="font-extrabold text-primary text-xl w-2/3 text-right">${{ number_format($order['total'], 2) }}</span>
                </div>
            </div>
        </div>
        
        <a href="{{ route('home') }}" class="bg-primary hover:bg-indigo-700 text-white font-bold py-4 px-8 rounded-xl transition duration-300 shadow-lg hover:shadow-xl inline-block w-full sm:w-auto animate-fade-up" style="animation-delay: 0.8s; opacity: 0;">
            <i class="fa-solid fa-house mr-2"></i> Return to Home
        </a>
    </div>
</div>

<style>
    @keyframes bounce-in {
        0% { transform: scale(0.3); opacity: 0; }
        50% { transform: scale(1.05); opacity: 1; }
        70% { transform: scale(0.9); }
        100% { transform: scale(1); opacity: 1; }
    }
    
    @keyframes fade-up {
        0% { transform: translateY(20px); opacity: 0; }
        100% { transform: translateY(0); opacity: 1; }
    }
    
    .animate-bounce-in {
        animation: bounce-in 0.8s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards;
    }
    
    .animate-fade-up {
        animation: fade-up 0.8s ease-out forwards;
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Wait a bit for the entrance animation
        setTimeout(function() {
            // Big burst
            confetti({
                particleCount: 150,
                spread: 70,
                origin: { y: 0.6 },
                colors: ['#4F46E5', '#ec4899', '#10B981']
            });
            
            // Continuous side cannons for a bit
            var duration = 2 * 1000;
            var end = Date.now() + duration;

            (function frame() {
                confetti({
                    particleCount: 2,
                    angle: 60,
                    spread: 55,
                    origin: { x: 0 },
                    colors: ['#4F46E5', '#ec4899', '#10B981']
                });
                confetti({
                    particleCount: 2,
                    angle: 120,
                    spread: 55,
                    origin: { x: 1 },
                    colors: ['#4F46E5', '#ec4899', '#10B981']
                });

                if (Date.now() < end) {
                    requestAnimationFrame(frame);
                }
            }());
        }, 300);
    });
</script>
@endsection
