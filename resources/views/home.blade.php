@extends('layouts.app')

@section('content')
  <!-- ================= HERO ================= -->
  <section class="relative left-1/2 -ml-[50vw] w-screen -mt-24 h-screen min-h-[640px] overflow-hidden">
    <div class="absolute inset-0 hero-bg">
      <img src="https://images.unsplash.com/photo-1523381210434-271e8be1f52b?q=80&w=2070&auto=format&fit=crop" alt="Fusion T-shirt Collection" class="w-full h-full object-cover">
      <div class="absolute inset-0 bg-gradient-to-b from-black/60 via-black/40 to-black/70"></div>
    </div>
    <div class="relative z-10 h-full flex flex-col items-center justify-center text-center px-4">
      <p class="hero-item text-white/80 text-sm md:text-base tracking-[0.4em] uppercase mb-6" style="--d:.1s">New Collection 2026</p>
      <h1 class="hero-item font-serif text-5xl md:text-7xl lg:text-8xl font-bold text-white leading-tight mb-6" style="--d:.3s">Wear Your<br><span class="italic text-white/90">Statement</span></h1>
      <p class="hero-item text-white/70 max-w-xl text-base md:text-lg font-light mb-10" style="--d:.5s">Premium T-shirts crafted for the modern individual. Minimalist design, maximum comfort.</p>
      <div class="hero-item flex flex-col sm:flex-row gap-4" style="--d:.7s">
        <a href="{{ route('shop') }}" class="group bg-white text-gray-900 px-10 py-4 text-sm font-semibold uppercase tracking-widest hover:bg-gray-100 transition-all duration-300 hover:tracking-[0.25em]">Shop Now <i class="fa-solid fa-arrow-right ml-2 transition-transform duration-300 group-hover:translate-x-1"></i></a>
        <a href="{{ route('category') }}" class="border border-white/60 text-white px-10 py-4 text-sm font-semibold uppercase tracking-widest hover:bg-white/10 backdrop-blur-sm transition-all duration-300">Explore Collections</a>
      </div>
    </div>
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 z-10 text-white/60 animate-bounce">
      <i class="fa-solid fa-chevron-down text-xl"></i>
    </div>
  </section>

  <!-- ================= MARQUEE ================= -->
  <section class="relative left-1/2 -ml-[50vw] w-screen bg-gray-900 dark:bg-white text-white dark:text-gray-900 py-4 overflow-hidden">
    <div class="marquee-track flex whitespace-nowrap text-xs md:text-sm font-medium tracking-[0.3em] uppercase">
      <span class="mx-8">Free Shipping Over $50</span><span class="mx-8">✦</span>
      <span class="mx-8">Premium Organic Cotton</span><span class="mx-8">✦</span>
      <span class="mx-8">30-Day Easy Returns</span><span class="mx-8">✦</span>
      <span class="mx-8">Designed For Everyday</span><span class="mx-8">✦</span>
      <span class="mx-8">Fusion T-shirt</span><span class="mx-8">✦</span>
      <span class="mx-8">Free Shipping Over $50</span><span class="mx-8">✦</span>
      <span class="mx-8">Premium Organic Cotton</span><span class="mx-8">✦</span>
      <span class="mx-8">30-Day Easy Returns</span><span class="mx-8">✦</span>
      <span class="mx-8">Designed For Everyday</span><span class="mx-8">✦</span>
      <span class="mx-8">Fusion T-shirt</span><span class="mx-8">✦</span>
    </div>
  </section>

  <!-- ================= FEATURED CATEGORIES ================= -->
  <section id="collections" class="py-24 reveal">
    <div class="text-center mb-14">
      <p class="text-xs tracking-[0.35em] uppercase text-gray-400 mb-3">Curated For You</p>
      <h2 class="font-serif text-4xl md:text-5xl font-bold text-gray-900 dark:text-white">Shop by Collection</h2>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      <a href="{{ route('shop') }}?search=classic" class="group relative h-[480px] overflow-hidden reveal" style="--d:0s">
        <img src="https://images.unsplash.com/photo-1583743814966-8936f5b7be1a?q=80&w=1200&auto=format&fit=crop" alt="Classic Tees" class="w-full h-full object-cover transition-transform duration-[1.2s] ease-out group-hover:scale-110">
        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/10 to-transparent"></div>
        <div class="absolute bottom-0 left-0 right-0 p-8 translate-y-2 group-hover:translate-y-0 transition-transform duration-500">
          <h3 class="font-serif text-2xl font-bold text-white mb-2">Classic Tees</h3>
          <span class="inline-flex items-center text-white/80 text-xs uppercase tracking-[0.25em] opacity-0 group-hover:opacity-100 transition-opacity duration-500">Discover <i class="fa-solid fa-arrow-right ml-2"></i></span>
        </div>
      </a>
      <a href="{{ route('shop') }}?search=graphic" class="group relative h-[480px] overflow-hidden reveal" style="--d:.15s">
        <img src="https://images.unsplash.com/photo-1576566588028-4147f3842f27?q=80&w=1200&auto=format&fit=crop" alt="Graphic Tees" class="w-full h-full object-cover transition-transform duration-[1.2s] ease-out group-hover:scale-110">
        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/10 to-transparent"></div>
        <div class="absolute bottom-0 left-0 right-0 p-8 translate-y-2 group-hover:translate-y-0 transition-transform duration-500">
          <h3 class="font-serif text-2xl font-bold text-white mb-2">Graphic Tees</h3>
          <span class="inline-flex items-center text-white/80 text-xs uppercase tracking-[0.25em] opacity-0 group-hover:opacity-100 transition-opacity duration-500">Discover <i class="fa-solid fa-arrow-right ml-2"></i></span>
        </div>
      </a>
      <a href="{{ route('shop') }}?search=oversize" class="group relative h-[480px] overflow-hidden reveal" style="--d:.3s">
        <img src="https://images.unsplash.com/photo-1618354691373-d851c5c3a990?q=80&w=1200&auto=format&fit=crop" alt="Oversized Fit" class="w-full h-full object-cover transition-transform duration-[1.2s] ease-out group-hover:scale-110">
        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/10 to-transparent"></div>
        <div class="absolute bottom-0 left-0 right-0 p-8 translate-y-2 group-hover:translate-y-0 transition-transform duration-500">
          <h3 class="font-serif text-2xl font-bold text-white mb-2">Oversized Fit</h3>
          <span class="inline-flex items-center text-white/80 text-xs uppercase tracking-[0.25em] opacity-0 group-hover:opacity-100 transition-opacity duration-500">Discover <i class="fa-solid fa-arrow-right ml-2"></i></span>
        </div>
      </a>
    </div>
  </section>

  <!-- ================= NEW ARRIVALS ================= -->
  <section id="new-arrivals" class="py-24 border-t border-gray-100 dark:border-gray-800">
    <div class="flex flex-col md:flex-row md:items-end md:justify-between mb-14 reveal">
      <div>
        <p class="text-xs tracking-[0.35em] uppercase text-gray-400 mb-3">Just Dropped</p>
        <h2 class="font-serif text-4xl md:text-5xl font-bold text-gray-900 dark:text-white">New Arrivals</h2>
      </div>
      <a href="{{ route('shop') }}" class="group mt-6 md:mt-0 text-sm uppercase tracking-widest text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white transition-colors">View All <i class="fa-solid fa-arrow-right ml-2 transition-transform duration-300 group-hover:translate-x-1"></i></a>
    </div>
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6">
      @foreach($newArrivals as $product)
      <a href="{{ route('shop') }}" class="product-card glass-card group block reveal" style="--d:{{ ($loop->index % 4) * 0.1 }}s">
        <div class="product-img-wrapper relative aspect-[3/4]">
          <img src="{{ !empty($product->image) ? (str_starts_with($product->image, 'data:') || str_starts_with($product->image, 'http') ? $product->image : asset($product->image)) : 'https://ui-avatars.com/api/?name='.urlencode($product->name).'&background=random&color=fff&size=512' }}" alt="{{ $product->name }}" class="product-img w-full h-full object-cover {{ $product->stock <= 0 ? 'grayscale opacity-70' : '' }}" onerror="this.onerror=null;this.src='{{ asset('images/logo.jpg') }}';">
          @if($product->discount_percent > 0)
              <span class="absolute top-4 left-4 bg-red-600 text-white text-[10px] font-bold uppercase tracking-widest px-3 py-1.5 z-10 shadow-sm">-{{ $product->discount_percent }}%</span>
          @else
              <span class="absolute top-4 left-4 bg-gray-900 dark:bg-white text-white dark:text-gray-900 text-[10px] font-bold uppercase tracking-widest px-3 py-1.5 z-10">New</span>
          @endif
          <div class="absolute inset-x-4 bottom-4 opacity-0 translate-y-3 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500">
            @if($product->stock > 0)
                <span class="btn-primary block w-full text-center py-3 text-xs uppercase tracking-widest"><i class="fa-solid fa-cart-shopping mr-2"></i>Quick Add</span>
            @else
                <span class="bg-gray-200 text-gray-500 dark:bg-gray-800 dark:text-gray-500 block w-full text-center py-3 text-xs uppercase tracking-widest cursor-not-allowed">Out of Stock</span>
            @endif
          </div>
        </div>
        <div class="p-5 flex justify-between items-start gap-4">
          <div>
            <h3 class="text-sm font-medium text-gray-900 dark:text-white line-clamp-1 group-hover:underline underline-offset-4 decoration-1">{{ $product->name }}</h3>
          </div>
          <div class="text-right flex flex-col items-end">
            @if($product->discount_percent > 0)
                <span class="text-[10px] text-gray-400 line-through mb-0.5">${{ number_format($product->price, 2) }}</span>
                <span class="text-sm font-bold text-red-600 tracking-wide whitespace-nowrap">${{ number_format($product->price - ($product->price * $product->discount_percent / 100), 2) }}</span>
            @else
                <span class="text-sm font-medium text-gray-500 dark:text-gray-400 mt-1">${{ number_format($product->price, 2) }}</span>
            @endif
          </div>
        </div>
      </a>
      @endforeach
    </div>
  </section>

  <!-- ================= BRAND STORY + STATS ================= -->
  <section class="relative left-1/2 -ml-[50vw] w-screen bg-gray-50 dark:bg-zinc-900 py-24 transition-colors duration-500">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
      <div class="relative reveal">
        <img src="https://images.unsplash.com/photo-1489987707025-afc232f7ea0f?q=80&w=1200&auto=format&fit=crop" alt="Our Craft" class="w-full h-[520px] object-cover">
        <div class="absolute -bottom-6 -right-6 hidden md:block bg-gray-900 dark:bg-white text-white dark:text-gray-900 p-8 max-w-[220px]">
          <p class="font-serif text-3xl font-bold mb-1"><span class="counter" data-target="12">0</span>+</p>
          <p class="text-xs uppercase tracking-widest opacity-70">Years of Craft</p>
        </div>
      </div>
      <div class="reveal" style="--d:.2s">
        <p class="text-xs tracking-[0.35em] uppercase text-gray-400 mb-4">Our Philosophy</p>
        <h2 class="font-serif text-4xl md:text-5xl font-bold text-gray-900 dark:text-white leading-tight mb-6">Simplicity is the<br><span class="italic">ultimate sophistication</span></h2>
        <p class="text-gray-500 dark:text-gray-400 leading-relaxed mb-10">Every Fusion T-shirt begins with responsibly sourced organic cotton and ends with a piece designed to last. No noise, no excess — just timeless essentials engineered for everyday life.</p>
        <div class="grid grid-cols-3 gap-6 border-t border-gray-200 dark:border-gray-700 pt-8">
          <div>
            <p class="font-serif text-3xl font-bold text-gray-900 dark:text-white"><span class="counter" data-target="50">0</span>K+</p>
            <p class="text-xs uppercase tracking-widest text-gray-400 mt-1">Happy Customers</p>
          </div>
          <div>
            <p class="font-serif text-3xl font-bold text-gray-900 dark:text-white"><span class="counter" data-target="120">0</span>+</p>
            <p class="text-xs uppercase tracking-widest text-gray-400 mt-1">Unique Designs</p>
          </div>
          <div>
            <p class="font-serif text-3xl font-bold text-gray-900 dark:text-white"><span class="counter" data-target="98">0</span>%</p>
            <p class="text-xs uppercase tracking-widest text-gray-400 mt-1">5-Star Reviews</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ================= TESTIMONIALS ================= -->
  <section class="py-24">
    <div class="text-center mb-14 reveal">
      <p class="text-xs tracking-[0.35em] uppercase text-gray-400 mb-3">Testimonials</p>
      <h2 class="font-serif text-4xl md:text-5xl font-bold text-gray-900 dark:text-white">Loved Worldwide</h2>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      <div class="glass-card p-8 reveal hover:-translate-y-2 transition-transform duration-500" style="--d:0s">
        <div class="text-yellow-400 text-sm mb-4"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div>
        <p class="text-gray-600 dark:text-gray-300 leading-relaxed mb-6 italic">"The quality is unreal for the price. Softest tee I own — I came back and bought three more."</p>
        <p class="text-sm font-semibold text-gray-900 dark:text-white uppercase tracking-widest">— Sokha C.</p>
      </div>
      <div class="glass-card p-8 reveal hover:-translate-y-2 transition-transform duration-500" style="--d:.15s">
        <div class="text-yellow-400 text-sm mb-4"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div>
        <p class="text-gray-600 dark:text-gray-300 leading-relaxed mb-6 italic">"Minimal, clean, and it fits perfectly. The oversized collection is my new daily uniform."</p>
        <p class="text-sm font-semibold text-gray-900 dark:text-white uppercase tracking-widest">— Dara P.</p>
      </div>
      <div class="glass-card p-8 reveal hover:-translate-y-2 transition-transform duration-500" style="--d:.3s">
        <div class="text-yellow-400 text-sm mb-4"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div>
        <p class="text-gray-600 dark:text-gray-300 leading-relaxed mb-6 italic">"Fast shipping and beautiful packaging. This brand pays attention to every little detail."</p>
        <p class="text-sm font-semibold text-gray-900 dark:text-white uppercase tracking-widest">— Vanna M.</p>
      </div>
    </div>
  </section>

  <!-- ================= NEWSLETTER ================= -->
  <section class="relative left-1/2 -ml-[50vw] w-screen bg-gray-900 dark:bg-zinc-950 py-24 overflow-hidden">
    <div class="absolute inset-0 opacity-10 newsletter-pattern"></div>
    <div class="relative max-w-2xl mx-auto text-center px-4 reveal">
      <p class="text-xs tracking-[0.35em] uppercase text-white/50 mb-4">Stay in the Loop</p>
      <h2 class="font-serif text-4xl md:text-5xl font-bold text-white mb-6">Join the Fusion Club</h2>
      <p class="text-white/60 mb-10">Get 10% off your first order plus early access to new drops.</p>
      <form onsubmit="event.preventDefault(); this.querySelector('button').textContent='Subscribed ✓';" class="flex flex-col sm:flex-row gap-3 max-w-lg mx-auto">
        <input type="email" required placeholder="Enter your email" class="flex-1 bg-white/10 border border-white/20 text-white placeholder-white/40 px-6 py-4 text-sm focus:outline-none focus:border-white/60 transition-colors">
        <button type="submit" class="bg-white text-gray-900 px-8 py-4 text-sm font-semibold uppercase tracking-widest hover:bg-gray-200 transition-all duration-300">Subscribe</button>
      </form>
    </div>
  </section>
@endsection
