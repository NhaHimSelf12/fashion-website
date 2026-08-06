@extends('layouts.app')

@section('content')
  <!-- ================= PAGE BANNER ================= -->
  <section class="relative left-1/2 -ml-[50vw] w-screen -mt-24 h-[52vh] min-h-[420px] overflow-hidden">
    <div class="absolute inset-0 hero-bg">
      <img src="https://images.unsplash.com/photo-1441986300917-64674bd600d8?q=80&w=2070&auto=format&fit=crop" alt="All Collections" class="w-full h-full object-cover">
      <div class="absolute inset-0 bg-gradient-to-b from-black/60 via-black/40 to-black/70"></div>
    </div>
    <div class="relative z-10 h-full flex flex-col items-center justify-center text-center px-4">
      <p class="hero-item text-white/70 text-xs tracking-[0.4em] uppercase mb-4" style="--d:.1s">
        <a href="{{ route('home') }}" class="hover:text-white transition-colors">Home</a><span class="mx-3">/</span><span class="text-white">Shop</span>
      </p>
      <h1 class="hero-item font-serif text-5xl md:text-6xl lg:text-7xl font-bold text-white mb-4" style="--d:.3s">
        {{ isset($categoryName) ? $categoryName : 'All Collections' }}
      </h1>
      <p class="hero-item text-white/60 text-sm uppercase tracking-[0.3em]" style="--d:.5s">{{ $products->count() }} Pieces — Curated For You</p>
    </div>
    <div class="absolute bottom-6 left-1/2 -translate-x-1/2 z-10 text-white/50 animate-bounce">
      <i class="fa-solid fa-chevron-down"></i>
    </div>
  </section>

  <!-- ================= TOOLBAR: SEARCH ================= -->
  <div class="py-10 flex flex-col md:flex-row justify-between items-start md:items-center gap-6 border-b border-gray-100 dark:border-gray-800 reveal">
    <div class="flex items-center gap-3 text-xs uppercase tracking-[0.25em] text-gray-400">
      <i class="fa-solid fa-sliders"></i>
      <span>Refine Your Search</span>
    </div>
    <form action="{{ url()->current() }}" method="GET" class="w-full md:w-auto relative group/search">
      <input type="text" name="search" value="{{ request('search') }}" placeholder="Search collection..." class="w-full md:w-80 pl-0 pr-10 py-3 border-0 border-b border-gray-300 dark:border-gray-700 bg-transparent text-gray-900 dark:text-white focus:outline-none focus:ring-0 focus:border-gray-900 dark:focus:border-white transition-colors placeholder-gray-400 rounded-none text-sm tracking-wide">
      <i class="fa-solid fa-magnifying-glass absolute right-2 top-1/2 -translate-y-1/2 text-gray-400"></i>
      @if(request('search'))
          <a href="{{ url()->current() }}" class="absolute right-8 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-900 dark:hover:text-white transition-colors">
              <i class="fa-solid fa-xmark"></i>
          </a>
      @endif
      <span class="absolute bottom-0 left-0 h-px w-0 bg-gray-900 dark:bg-white transition-all duration-500 group-focus-within/search:w-full"></span>
      <button type="submit" class="hidden">Search</button>
    </form>
  </div>

  <!-- ================= PRODUCT GRID ================= -->
  @if($products->isEmpty())
      <div class="py-24 text-center">
          <h2 class="text-2xl font-serif font-bold text-gray-900 dark:text-white mb-4">No results found</h2>
          <p class="text-gray-500 dark:text-gray-400 mb-8 font-light max-w-md mx-auto">We couldn't find any pieces matching "{{ request('search') }}". Please try a different search term or browse our collections.</p>
          <a href="{{ url()->current() }}" class="inline-block border border-gray-900 dark:border-white text-gray-900 dark:text-white hover:bg-gray-900 hover:text-white dark:hover:bg-white dark:hover:text-gray-900 px-8 py-3 text-sm font-medium uppercase tracking-widest transition-colors duration-300">
              Clear Search
          </a>
      </div>
  @else
      <div class="py-16 grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-x-4 sm:gap-x-6 gap-y-10 sm:gap-y-14">
          @foreach($products as $product)
          <div class="group relative reveal" style="--d: {{ ($loop->index % 4) * 0.1 }}s">
            <div class="product-img-wrapper relative aspect-[3/4] mb-5 overflow-hidden">
              <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" class="product-img w-full h-full object-cover {{ $product['stock'] == 0 ? 'opacity-70 grayscale' : '' }}">
              <div class="absolute top-4 left-4 flex flex-col gap-2 z-10">
                <span class="bg-gray-900 dark:bg-white text-white dark:text-gray-900 text-[10px] font-bold uppercase tracking-widest px-3 py-1.5 shadow-sm">New</span>
                @if($product['discount_percent'] > 0)
                  <span class="bg-red-600 text-white text-[10px] font-bold uppercase tracking-widest px-3 py-1.5 shadow-sm">-{{ $product['discount_percent'] }}% OFF</span>
                @endif
              </div>
              <button type="button" class="absolute top-4 right-4 w-10 h-10 bg-white/90 dark:bg-gray-900/90 backdrop-blur-sm text-gray-900 dark:text-white flex items-center justify-center opacity-0 -translate-y-2 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-300 hover:bg-gray-900 hover:text-white dark:hover:bg-white dark:hover:text-gray-900 z-10" aria-label="Add to wishlist">
                <i class="fa-regular fa-heart"></i>
              </button>
              <div class="absolute inset-x-4 bottom-4 translate-y-3 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-500 ease-out z-20">
                <form action="{{ route('cart.add') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product['id'] }}">
                    @if($product['stock'] > 0)
                      <button type="submit" class="w-full bg-white text-gray-900 hover:bg-gray-900 hover:text-white dark:bg-gray-900 dark:text-white dark:hover:bg-white dark:hover:text-gray-900 font-medium py-3.5 text-xs uppercase tracking-[0.2em] transition-colors duration-300 flex items-center justify-center shadow-lg">
                        <i class="fa-solid fa-cart-shopping mr-2"></i> Add to Cart
                      </button>
                    @else
                      <button type="button" disabled class="w-full bg-gray-200 text-gray-500 dark:bg-gray-800 dark:text-gray-500 font-medium py-3.5 text-xs uppercase tracking-[0.2em] cursor-not-allowed flex items-center justify-center shadow-lg">
                        <i class="fa-solid fa-ban mr-2"></i> Out of Stock
                      </button>
                    @endif
                </form>
              </div>
            </div>
            <div class="flex justify-between items-start gap-4">
              <div class="flex-1">
                <h3 class="text-sm font-semibold text-gray-900 dark:text-white mb-1 group-hover:underline underline-offset-4 decoration-1">{{ $product['name'] }}</h3>
                <div class="flex items-center gap-1 mb-1">
                  <div class="flex text-yellow-400 text-[10px]">
                    @for($i = 1; $i <= 5; $i++)
                      @if($i <= $product['rating'])
                        <i class="fa-solid fa-star"></i>
                      @elseif($i - 0.5 <= $product['rating'])
                        <i class="fa-solid fa-star-half-stroke"></i>
                      @else
                        <i class="fa-regular fa-star text-gray-300 dark:text-gray-600"></i>
                      @endif
                    @endfor
                  </div>
                  <span class="text-[10px] text-gray-500">({{ number_format($product['rating'], 1) }})</span>
                </div>
                <p class="text-gray-500 dark:text-gray-400 text-xs font-light line-clamp-1 max-w-[200px]">{{ $product['description'] ?? 'Premium quality essential' }}</p>
              </div>
              <div class="text-right flex flex-col items-end justify-start">
                @if($product['discount_percent'] > 0)
                  <span class="text-[10px] text-gray-400 line-through mb-0.5">${{ number_format($product['price'], 2) }}</span>
                  <span class="text-sm font-bold text-red-600 tracking-wide whitespace-nowrap">${{ number_format($product['price'] * (1 - $product['discount_percent'] / 100), 2) }}</span>
                @else
                  <span class="text-sm font-medium text-gray-900 dark:text-white tracking-wide whitespace-nowrap">${{ number_format($product['price'], 2) }}</span>
                @endif
              </div>
            </div>
          </div>
          @endforeach
      </div>
  @endif

  <!-- ================= BOTTOM CTA STRIP ================= -->
  <section class="relative left-1/2 -ml-[50vw] w-screen bg-gray-900 dark:bg-zinc-950 py-20 overflow-hidden">
    <div class="absolute inset-0 opacity-10 newsletter-pattern"></div>
    <div class="relative max-w-2xl mx-auto text-center px-4 reveal">
      <p class="text-xs tracking-[0.35em] uppercase text-white/50 mb-4">Can't Decide?</p>
      <h2 class="font-serif text-3xl md:text-4xl font-bold text-white mb-8">Explore Our Signature Collections</h2>
      <a href="{{ route('category') }}" class="inline-block bg-white text-gray-900 px-10 py-4 text-sm font-semibold uppercase tracking-widest hover:bg-gray-200 transition-all duration-300">View Collections <i class="fa-solid fa-arrow-right ml-2"></i></a>
    </div>
  </section>
@endsection
