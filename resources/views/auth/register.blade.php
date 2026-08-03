@extends('layouts.app')

@section('content')
  <div class="min-h-[75vh] flex items-center justify-center">
    <div class="w-full max-w-md py-8">

      <!-- Header (centered) -->
      <div class="text-center">
        <p class="hero-item text-xs font-medium uppercase tracking-[0.35em] text-gray-400 mb-3" style="--d:.1s">Join Us</p>
        <h1 class="hero-item font-serif text-4xl sm:text-5xl font-bold text-gray-900 dark:text-white mb-3" style="--d:.2s">Create Account.</h1>
        <p class="hero-item text-gray-500 dark:text-gray-400 font-light mb-10" style="--d:.3s">Start your wardrobe journey — members get early access to new drops.</p>
      </div>

      <form method="POST" action="{{ route('register') }}" class="hero-item" style="--d:.4s">
        @csrf
        <div class="mb-8">
          <label for="name" class="block text-xs font-semibold uppercase tracking-[0.2em] text-gray-500 dark:text-gray-400 mb-2">Full Name</label>
          <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus placeholder="Your full name" class="w-full bg-transparent border-0 border-b border-gray-300 dark:border-gray-700 px-0 py-3 text-gray-900 dark:text-white placeholder-gray-300 dark:placeholder-gray-600 focus:outline-none focus:ring-0 focus:border-gray-900 dark:focus:border-white transition-colors duration-300">
          @error('name')
              <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
          @enderror
        </div>
        <div class="mb-8">
          <label for="email" class="block text-xs font-semibold uppercase tracking-[0.2em] text-gray-500 dark:text-gray-400 mb-2">Email Address</label>
          <input id="email" type="email" name="email" value="{{ old('email') }}" required placeholder="you@example.com" class="w-full bg-transparent border-0 border-b border-gray-300 dark:border-gray-700 px-0 py-3 text-gray-900 dark:text-white placeholder-gray-300 dark:placeholder-gray-600 focus:outline-none focus:ring-0 focus:border-gray-900 dark:focus:border-white transition-colors duration-300">
          @error('email')
              <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
          @enderror
        </div>
        <div class="mb-8">
          <label for="password" class="block text-xs font-semibold uppercase tracking-[0.2em] text-gray-500 dark:text-gray-400 mb-2">Password</label>
          <div class="relative">
            <input id="password" type="password" name="password" required placeholder="••••••••" class="w-full bg-transparent border-0 border-b border-gray-300 dark:border-gray-700 px-0 py-3 pr-10 text-gray-900 dark:text-white placeholder-gray-300 dark:placeholder-gray-600 focus:outline-none focus:ring-0 focus:border-gray-900 dark:focus:border-white transition-colors duration-300">
            <button type="button" onclick="togglePassword('password', 'password-eye')" tabindex="-1" class="absolute right-0 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-900 dark:hover:text-white transition-colors p-2" aria-label="Show password">
              <i id="password-eye" class="fa-solid fa-eye"></i>
            </button>
          </div>
          @error('password')
              <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
          @enderror
        </div>
        <div class="mb-10">
          <label for="password_confirmation" class="block text-xs font-semibold uppercase tracking-[0.2em] text-gray-500 dark:text-gray-400 mb-2">Confirm Password</label>
          <div class="relative">
            <input id="password_confirmation" type="password" name="password_confirmation" required placeholder="••••••••" class="w-full bg-transparent border-0 border-b border-gray-300 dark:border-gray-700 px-0 py-3 pr-10 text-gray-900 dark:text-white placeholder-gray-300 dark:placeholder-gray-600 focus:outline-none focus:ring-0 focus:border-gray-900 dark:focus:border-white transition-colors duration-300">
            <button type="button" onclick="togglePassword('password_confirmation', 'password-confirm-eye')" tabindex="-1" class="absolute right-0 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-900 dark:hover:text-white transition-colors p-2" aria-label="Show password">
              <i id="password-confirm-eye" class="fa-solid fa-eye"></i>
            </button>
          </div>
        </div>
        <button type="submit" class="btn-primary group w-full py-4 rounded-sm text-sm font-semibold uppercase tracking-[0.25em] flex items-center justify-center gap-3 hover:tracking-[0.35em] transition-all duration-300">
          Sign Up
          <i class="fa-solid fa-arrow-right-long transition-transform duration-300 group-hover:translate-x-1"></i>
        </button>
        <div class="relative flex items-center justify-center my-8">
          <div class="w-full border-t border-gray-200 dark:border-gray-800"></div>
          <span class="absolute px-4 bg-[#fdfdfd] dark:bg-[#09090b] text-gray-400 text-xs uppercase tracking-[0.25em] transition-colors duration-500">or</span>
        </div>
        <a href="{{ Route::has('auth.google') ? route('auth.google') : '#' }}" class="w-full flex items-center justify-center gap-3 border border-gray-300 dark:border-gray-700 text-gray-700 dark:text-gray-200 hover:border-gray-900 dark:hover:border-white hover:shadow-lg py-4 rounded-sm text-sm font-medium uppercase tracking-[0.2em] transition-all duration-300">
          <svg width="18" height="18" viewBox="0 0 48 48"><path fill="#FFC107" d="M43.611 20.083H42V20H24v8h11.303c-1.649 4.657-6.08 8-11.303 8c-6.627 0-12-5.373-12-12s5.373-12 12-12c3.059 0 5.842 1.154 7.961 3.039l5.657-5.657C34.046 6.053 29.268 4 24 4C12.955 4 4 12.955 4 24s8.955 20 20 20s20-8.955 20-20c0-1.341-.138-2.65-.389-3.917z"/><path fill="#FF3D00" d="m6.306 14.691l6.571 4.819C14.655 15.108 18.961 12 24 12c3.059 0 5.842 1.154 7.961 3.039l5.657-5.657C34.046 6.053 29.268 4 24 4C16.318 4 9.656 8.337 6.306 14.691z"/><path fill="#4CAF50" d="M24 44c5.166 0 9.86-1.977 13.409-5.192l-6.19-5.238A11.91 11.91 0 0 1 24 36c-5.222 0-9.654-3.343-11.13-8l-6.56 5.045C9.646 39.52 16.317 44 24 44z"/><path fill="#1976D2" d="M43.611 20.083H42V20H24v8h11.303a12.04 12.04 0 0 1-4.087 5.571l.003-.002l6.19 5.238C36.971 39.205 44 34 44 24c0-1.341-.138-2.65-.389-3.917z"/></svg>
          Sign up with Google
        </a>
        <p class="text-center text-sm text-gray-500 dark:text-gray-400 mt-10">
          Already have an account?
          <a href="{{ route('login') }}" class="text-gray-900 dark:text-white font-semibold underline underline-offset-4 decoration-gray-300 hover:decoration-gray-900 dark:hover:decoration-white transition-all">Login here</a>
        </p>
      </form>
    </div>
  </div>

<script>
function togglePassword(inputId, eyeId) {
  const input = document.getElementById(inputId);
  const eye = document.getElementById(eyeId);
  const show = input.type === 'password';
  input.type = show ? 'text' : 'password';
  eye.classList.toggle('fa-eye', !show);
  eye.classList.toggle('fa-eye-slash', show);
}
</script>
@endsection
