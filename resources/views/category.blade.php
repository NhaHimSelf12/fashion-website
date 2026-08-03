@extends('layouts.app')

@section('content')
  <!-- ================= PAGE BANNER ================= -->
  <section class="relative left-1/2 -ml-[50vw] w-screen -mt-24 h-[52vh] min-h-[420px] overflow-hidden">
    <div class="absolute inset-0 hero-bg">
      <img src="https://images.unsplash.com/photo-1490481651871-ab68de25d43d?q=80&w=2070&auto=format&fit=crop" alt="Collections" class="w-full h-full object-cover">
      <div class="absolute inset-0 bg-gradient-to-b from-black/60 via-black/40 to-black/70"></div>
    </div>
    <div class="relative z-10 h-full flex flex-col items-center justify-center text-center px-4">
      <p class="hero-item text-white/70 text-xs tracking-[0.4em] uppercase mb-4" style="--d:.1s">
        <a href="{{ route('home') }}" class="hover:text-white transition-colors">Home</a><span class="mx-3">/</span><span class="text-white">Collections</span>
      </p>
      <h1 class="hero-item font-serif text-5xl md:text-6xl lg:text-7xl font-bold text-white mb-5" style="--d:.3s">Collections</h1>
      <p class="hero-item text-white/70 max-w-xl text-base md:text-lg font-light" style="--d:.5s">Curated selections for every occasion. Explore our signature pieces crafted with uncompromising quality.</p>
    </div>
    <div class="absolute bottom-6 left-1/2 -translate-x-1/2 z-10 text-white/50 animate-bounce">
      <i class="fa-solid fa-chevron-down"></i>
    </div>
  </section>

  <!-- ================= EDITORIAL COLLECTION GRID ================= -->
  <section class="py-20">
    <div class="text-center mb-14 reveal">
      <p class="text-xs tracking-[0.35em] uppercase text-gray-400 mb-3">Signature Lines</p>
      <h2 class="font-serif text-4xl md:text-5xl font-bold text-gray-900 dark:text-white">Find Your Style</h2>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
      @forelse($categories as $category)
        <a href="{{ route('category.show', $category->id) }}" class="relative group cursor-pointer block overflow-hidden reveal {{ $loop->index === 0 ? 'md:col-span-2' : '' }} h-[420px] lg:h-[550px]" style="--d: {{ ($loop->index % 3) * 0.15 }}s">
          @if($category->image)
            <img src="{{ asset($category->image) }}" alt="{{ $category->name }}" class="w-full h-full object-cover transition-transform duration-[1.2s] ease-out group-hover:scale-110">
          @else
            <div class="w-full h-full bg-gray-200 dark:bg-gray-800 flex items-center justify-center transition-transform duration-[1.2s] ease-out group-hover:scale-110">
              <i class="fa-solid fa-image text-6xl text-gray-400"></i>
            </div>
          @endif
          <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent group-hover:from-black/80 transition-all duration-500"></div>
          <span class="absolute top-6 left-6 text-white/40 font-serif italic text-2xl">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
          <div class="absolute inset-x-0 bottom-0 p-8 flex flex-col items-start">
            <p class="text-white/60 text-[11px] uppercase tracking-[0.3em] mb-2 translate-y-2 group-hover:translate-y-0 transition-transform duration-500">Explore Collection</p>
            <h2 class="font-serif text-3xl lg:text-4xl font-bold text-white tracking-wide mb-4 translate-y-2 group-hover:translate-y-0 transition-transform duration-500">{{ $category->name }}</h2>
            <div class="overflow-hidden">
              <span class="block translate-y-full group-hover:translate-y-0 pb-1 border-b border-white text-white text-xs font-medium uppercase tracking-[0.25em] transition-transform duration-500 ease-out">Shop Now <i class="fa-solid fa-arrow-right ml-2"></i></span>
            </div>
          </div>
        </a>
      @empty
        <div class="col-span-1 md:col-span-2 lg:col-span-3 text-center py-20">
          <p class="text-gray-500 dark:text-gray-400 font-light text-lg">No collections found.</p>
        </div>
      @endforelse
    </div>
  </section>

  <!-- ================= BOTTOM CTA STRIP ================= -->
  <section class="relative left-1/2 -ml-[50vw] w-screen bg-gray-900 dark:bg-zinc-950 py-20 overflow-hidden">
    <div class="absolute inset-0 opacity-10 newsletter-pattern"></div>
    <div class="relative max-w-2xl mx-auto text-center px-4 reveal">
      <p class="text-xs tracking-[0.35em] uppercase text-white/50 mb-4">Looking For Something Specific?</p>
      <h2 class="font-serif text-3xl md:text-4xl font-bold text-white mb-8">Browse Every Piece In The Shop</h2>
      <a href="{{ route('shop') }}" class="inline-block bg-white text-gray-900 px-10 py-4 text-sm font-semibold uppercase tracking-widest hover:bg-gray-200 transition-all duration-300">Shop All <i class="fa-solid fa-arrow-right ml-2"></i></a>
    </div>
  </section>
@endsection