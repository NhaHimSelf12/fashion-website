@extends('layouts.app')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <h1 class="text-3xl font-bold text-gray-800 dark:text-white">Settings</h1>
        <p class="text-gray-500 dark:text-gray-400 mt-1">Manage your shop configurations</p>
    </div>
    <a href="{{ route('admin.dashboard') }}" class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:bg-gray-800/50 text-gray-700 dark:text-gray-200 border border-gray-200 dark:border-gray-700 py-2 px-4 rounded-xl shadow-sm transition flex items-center">
        <i class="fa-solid fa-arrow-left mr-2"></i> Back to Dashboard
    </a>
</div>

<div class="glass-card rounded-3xl shadow-sm p-8 max-w-2xl mx-auto mt-8">
    <h2 class="text-xl font-bold text-gray-800 dark:text-white mb-6 border-b border-gray-200 dark:border-gray-700 pb-4">Payment Settings (KHQR)</h2>
    
    <form action="{{ route('admin.settings.updateKhqr') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="mb-6">
            <label class="block text-gray-700 dark:text-gray-200 font-bold mb-2">Current KHQR Image</label>
            <div class="p-4 border border-gray-200 dark:border-gray-700 rounded-xl bg-gray-50 dark:bg-gray-800/50 inline-block">
                <img src="{{ asset('images/khqr.jpg') }}?v={{ time() }}" alt="Current KHQR" class="w-48 h-auto rounded shadow-sm" onerror="this.src='https://placehold.co/400x400/02478f/white?text=No+KHQR+Found'">
            </div>
        </div>

        <div class="mb-8">
            <label class="block text-gray-700 dark:text-gray-200 font-bold mb-2" for="khqr_image">Upload New KHQR Image</label>
            <p class="text-sm text-gray-500 dark:text-gray-400 mb-3">Upload your Acleda KHQR image here. It will replace the current one shown to customers during checkout.</p>
            <input class="w-full text-sm text-gray-500 dark:text-gray-400 file:mr-4 file:py-3 file:px-6 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-primary file:text-white hover:file:bg-indigo-700 transition cursor-pointer" id="khqr_image" name="khqr_image" type="file" accept="image/*" required>
        </div>

        <button type="submit" class="bg-primary hover:bg-indigo-700 text-white font-bold py-3 px-8 rounded-xl shadow-lg hover:shadow-xl transition flex items-center w-full justify-center">
            <i class="fa-solid fa-save mr-2"></i> Save KHQR Image
        </button>
    </form>
</div>
@endsection
