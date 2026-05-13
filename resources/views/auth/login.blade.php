@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center min-h-[70vh]">
    <div class="glass-card w-full max-w-md p-8 rounded-2xl">
        <h2 class="text-3xl font-bold text-center mb-6 bg-clip-text text-transparent bg-gradient-to-r from-primary to-secondary">Welcome Back</h2>
        
        <form method="POST" action="{{ route('login') }}">
            @csrf
            
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                    Email Address
                </label>
                <input class="w-full px-3 py-2 bg-white dark:bg-gray-700 text-gray-900 dark:text-white border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all" id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
                @error('email')
                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                    Password
                </label>
                <input class="w-full px-3 py-2 bg-white dark:bg-gray-700 text-gray-900 dark:text-white border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all" id="password" type="password" name="password" required>
            </div>
            
            <div class="flex items-center justify-between mb-6">
                <button class="w-full bg-gradient-to-r from-primary to-secondary hover:from-indigo-700 hover:to-pink-600 text-white font-bold py-3 px-4 rounded-lg focus:outline-none focus:shadow-outline transition-all transform hover:scale-[1.02]" type="submit">
                    Sign In
                </button>
            </div>
            
            <div class="text-center text-sm text-gray-600">
                Don't have an account? <a href="{{ route('register') }}" class="text-primary hover:text-secondary font-semibold transition-colors">Register here</a>
            </div>
        </form>
    </div>
</div>
@endsection
