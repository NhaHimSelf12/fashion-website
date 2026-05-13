@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">
    <div class="md:col-span-1">
        <div class="glass-card rounded-3xl overflow-hidden">
            <div class="h-32 bg-gradient-to-r from-primary to-secondary relative">
                <div class="absolute -bottom-16 left-1/2 transform -translate-x-1/2">
                    <div class="w-32 h-32 rounded-full border-4 border-white bg-white overflow-hidden shadow-lg">
                        @if($user->avatar)
                            <img src="{{ asset($user->avatar) }}" alt="Profile" class="w-full h-full object-cover">
                        @else
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=random&size=128" alt="Profile" class="w-full h-full object-cover">
                        @endif
                    </div>
                </div>
            </div>
            
            <div class="pt-20 pb-8 px-8 text-center">
                <h1 class="text-2xl font-bold text-gray-800 dark:text-white">{{ $user->name }}</h1>
                <p class="text-gray-500 dark:text-gray-400 mt-1">{{ $user->email }}</p>
                <span class="inline-block mt-2 px-3 py-1 bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 text-xs font-bold rounded-full uppercase">{{ $user->role }}</span>
            </div>
        </div>
    </div>

    <div class="md:col-span-2">
        <div class="glass-card rounded-3xl p-8">
            <h2 class="text-2xl font-bold mb-6">Edit Profile</h2>
            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-200 text-sm font-bold mb-2">Profile Image</label>
                    <input type="file" name="avatar" accept="image/*" class="w-full text-sm text-gray-500 dark:text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-primary file:text-white hover:file:bg-indigo-700 transition">
                    @error('avatar')<p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>@enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-200 text-sm font-bold mb-2">Full Name</label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}" required class="w-full px-3 py-2 bg-white dark:bg-gray-700 text-gray-900 dark:text-white border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                    @error('name')<p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>@enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-200 text-sm font-bold mb-2">Email Address</label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}" required class="w-full px-3 py-2 bg-white dark:bg-gray-700 text-gray-900 dark:text-white border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                    @error('email')<p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>@enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-200 text-sm font-bold mb-2">New Password (leave blank to keep current)</label>
                    <input type="password" name="password" class="w-full px-3 py-2 bg-white dark:bg-gray-700 text-gray-900 dark:text-white border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                    @error('password')<p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>@enderror
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 dark:text-gray-200 text-sm font-bold mb-2">Confirm New Password</label>
                    <input type="password" name="password_confirmation" class="w-full px-3 py-2 bg-white dark:bg-gray-700 text-gray-900 dark:text-white border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                </div>

                <button type="submit" class="w-full bg-gradient-to-r from-primary to-secondary hover:from-indigo-700 hover:to-pink-600 text-white font-bold py-3 px-4 rounded-lg focus:outline-none focus:shadow-outline transition-all transform hover:scale-[1.02]">
                    Update Profile
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
