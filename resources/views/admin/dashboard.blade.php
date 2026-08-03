@extends('layouts.app')

@section('content')
  <!-- Header -->
  <div class="mb-10">
    <p class="hero-item text-xs font-medium uppercase tracking-[0.35em] text-gray-400 mb-2" style="--d:.05s">Overview</p>
    <div class="hero-item flex flex-col sm:flex-row sm:items-end sm:justify-between gap-2" style="--d:.15s">
      <h1 class="font-serif text-4xl sm:text-5xl font-bold text-gray-900 dark:text-white">Admin Dashboard.</h1>
      <p class="text-sm text-gray-400 dark:text-gray-500 uppercase tracking-[0.2em]">{{ date('l — M d, Y') }}</p>
    </div>
  </div>

  <!-- Stat cards -->
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10" id="stats">
      <div class="glass-card group p-6 hover:-translate-y-1 hover:shadow-xl transition-all duration-500" style="--d:0s">
        <div class="flex items-start justify-between mb-8">
          <p class="text-xs font-semibold uppercase tracking-[0.2em] text-gray-400 dark:text-gray-500 pt-2">Total Orders</p>
          <span class="w-11 h-11 rounded-full border border-gray-200 dark:border-gray-700 flex items-center justify-center text-gray-400 group-hover:bg-gray-900 group-hover:border-gray-900 group-hover:text-white dark:group-hover:bg-white dark:group-hover:border-white dark:group-hover:text-gray-900 transition-all duration-500">
            <i class="fa-solid fa-cart-shopping"></i>
          </span>
        </div>
        <p class="font-serif text-4xl font-bold text-gray-900 dark:text-white"><span class="counter" data-target="{{ $totalOrders }}">0</span></p>
      </div>
      
      <div class="glass-card group p-6 hover:-translate-y-1 hover:shadow-xl transition-all duration-500" style="--d:0.1s">
        <div class="flex items-start justify-between mb-8">
          <p class="text-xs font-semibold uppercase tracking-[0.2em] text-gray-400 dark:text-gray-500 pt-2">Total Revenue</p>
          <span class="w-11 h-11 rounded-full border border-gray-200 dark:border-gray-700 flex items-center justify-center text-gray-400 group-hover:bg-gray-900 group-hover:border-gray-900 group-hover:text-white dark:group-hover:bg-white dark:group-hover:border-white dark:group-hover:text-gray-900 transition-all duration-500">
            <i class="fa-solid fa-dollar-sign"></i>
          </span>
        </div>
        <p class="font-serif text-4xl font-bold text-gray-900 dark:text-white">$<span class="counter" data-target="{{ $totalRevenue }}">0</span></p>
      </div>

      <div class="glass-card group p-6 hover:-translate-y-1 hover:shadow-xl transition-all duration-500" style="--d:0.2s">
        <div class="flex items-start justify-between mb-8">
          <p class="text-xs font-semibold uppercase tracking-[0.2em] text-gray-400 dark:text-gray-500 pt-2">Products</p>
          <span class="w-11 h-11 rounded-full border border-gray-200 dark:border-gray-700 flex items-center justify-center text-gray-400 group-hover:bg-gray-900 group-hover:border-gray-900 group-hover:text-white dark:group-hover:bg-white dark:group-hover:border-white dark:group-hover:text-gray-900 transition-all duration-500">
            <i class="fa-solid fa-shirt"></i>
          </span>
        </div>
        <p class="font-serif text-4xl font-bold text-gray-900 dark:text-white"><span class="counter" data-target="{{ $totalProducts }}">0</span></p>
      </div>

      <div class="glass-card group p-6 hover:-translate-y-1 hover:shadow-xl transition-all duration-500" style="--d:0.3s">
        <div class="flex items-start justify-between mb-8">
          <p class="text-xs font-semibold uppercase tracking-[0.2em] text-gray-400 dark:text-gray-500 pt-2">Categories</p>
          <span class="w-11 h-11 rounded-full border border-gray-200 dark:border-gray-700 flex items-center justify-center text-gray-400 group-hover:bg-gray-900 group-hover:border-gray-900 group-hover:text-white dark:group-hover:bg-white dark:group-hover:border-white dark:group-hover:text-gray-900 transition-all duration-500">
            <i class="fa-solid fa-tags"></i>
          </span>
        </div>
        <p class="font-serif text-4xl font-bold text-gray-900 dark:text-white"><span class="counter" data-target="{{ $totalCategories }}">0</span></p>
      </div>
  </div>

  <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Recent Orders -->
    <div class="lg:col-span-2 glass-card p-8" style="--d:.1s">
      <div class="flex justify-between items-center mb-6">
        <div>
          <p class="text-xs font-medium uppercase tracking-[0.3em] text-gray-400 mb-1">Latest Activity</p>
          <h2 class="font-serif text-2xl font-bold text-gray-900 dark:text-white">Recent Orders</h2>
        </div>
        <a href="{{ route('admin.reports') }}" class="group text-xs font-semibold uppercase tracking-[0.2em] text-gray-900 dark:text-white flex items-center gap-2">
          <span class="border-b border-gray-300 group-hover:border-gray-900 dark:group-hover:border-white pb-0.5 transition-colors">View All</span>
          <i class="fa-solid fa-arrow-right-long transition-transform duration-300 group-hover:translate-x-1"></i>
        </a>
      </div>
      <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
          <thead>
            <tr class="border-b border-gray-200 dark:border-gray-800">
              <th class="py-3 px-4 text-xs font-semibold uppercase tracking-[0.2em] text-gray-400 dark:text-gray-500">Order ID</th>
              <th class="py-3 px-4 text-xs font-semibold uppercase tracking-[0.2em] text-gray-400 dark:text-gray-500">Customer</th>
              <th class="py-3 px-4 text-xs font-semibold uppercase tracking-[0.2em] text-gray-400 dark:text-gray-500">Date</th>
              <th class="py-3 px-4 text-xs font-semibold uppercase tracking-[0.2em] text-gray-400 dark:text-gray-500 text-right">Total</th>
            </tr>
          </thead>
          <tbody id="orders">
            @forelse($recentOrders as $order)
                <tr class="border-b border-gray-100 dark:border-gray-800 hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors duration-300">
                    <td class="py-4 px-4 font-medium text-gray-900 dark:text-white">{{ $order->order_number }}</td>
                    <td class="py-4 px-4 text-gray-600 dark:text-gray-300">{{ $order->name }}</td>
                    <td class="py-4 px-4 text-sm text-gray-400 dark:text-gray-500">{{ $order->created_at->format('M d, Y') }}</td>
                    <td class="py-4 px-4 font-serif font-bold text-gray-900 dark:text-white text-right">${{ number_format($order->total, 2) }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="py-8 text-center text-gray-500 dark:text-gray-400 font-light text-sm uppercase tracking-widest">No orders found.</td>
                </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>

    <!-- Quick Actions -->
    <div class="glass-card p-8" style="--d:.2s">
      <p class="text-xs font-medium uppercase tracking-[0.3em] text-gray-400 mb-1">Shortcuts</p>
      <h2 class="font-serif text-2xl font-bold text-gray-900 dark:text-white mb-6">Quick Actions</h2>
      <div class="space-y-3" id="actions">
          <a href="{{ route('admin.products.index') }}" class="group flex items-center p-4 border border-gray-200 dark:border-gray-800 hover:border-gray-900 dark:hover:border-white hover:shadow-lg transition-all duration-300">
            <div class="w-11 h-11 shrink-0 border border-gray-200 dark:border-gray-700 flex items-center justify-center mr-4 text-gray-400 group-hover:bg-gray-900 group-hover:border-gray-900 group-hover:text-white dark:group-hover:bg-white dark:group-hover:border-white dark:group-hover:text-gray-900 transition-all duration-300">
              <i class="fa-solid fa-shirt"></i>
            </div>
            <div class="flex-1">
              <p class="font-semibold text-gray-900 dark:text-white text-sm uppercase tracking-wide">Manage Products</p>
              <p class="text-xs text-gray-400 dark:text-gray-500 mt-0.5">Add, edit, or delete products</p>
            </div>
            <i class="fa-solid fa-arrow-right-long text-gray-300 dark:text-gray-600 group-hover:text-gray-900 dark:group-hover:text-white transition-all duration-300 group-hover:translate-x-1"></i>
          </a>
          
          <a href="{{ route('admin.categories.index') }}" class="group flex items-center p-4 border border-gray-200 dark:border-gray-800 hover:border-gray-900 dark:hover:border-white hover:shadow-lg transition-all duration-300">
            <div class="w-11 h-11 shrink-0 border border-gray-200 dark:border-gray-700 flex items-center justify-center mr-4 text-gray-400 group-hover:bg-gray-900 group-hover:border-gray-900 group-hover:text-white dark:group-hover:bg-white dark:group-hover:border-white dark:group-hover:text-gray-900 transition-all duration-300">
              <i class="fa-solid fa-tags"></i>
            </div>
            <div class="flex-1">
              <p class="font-semibold text-gray-900 dark:text-white text-sm uppercase tracking-wide">Manage Categories</p>
              <p class="text-xs text-gray-400 dark:text-gray-500 mt-0.5">Organize your shop</p>
            </div>
            <i class="fa-solid fa-arrow-right-long text-gray-300 dark:text-gray-600 group-hover:text-gray-900 dark:group-hover:text-white transition-all duration-300 group-hover:translate-x-1"></i>
          </a>

          <a href="{{ route('admin.reports') }}" class="group flex items-center p-4 border border-gray-200 dark:border-gray-800 hover:border-gray-900 dark:hover:border-white hover:shadow-lg transition-all duration-300">
            <div class="w-11 h-11 shrink-0 border border-gray-200 dark:border-gray-700 flex items-center justify-center mr-4 text-gray-400 group-hover:bg-gray-900 group-hover:border-gray-900 group-hover:text-white dark:group-hover:bg-white dark:group-hover:border-white dark:group-hover:text-gray-900 transition-all duration-300">
              <i class="fa-solid fa-chart-line"></i>
            </div>
            <div class="flex-1">
              <p class="font-semibold text-gray-900 dark:text-white text-sm uppercase tracking-wide">Sales Reports</p>
              <p class="text-xs text-gray-400 dark:text-gray-500 mt-0.5">View and print daily/monthly reports</p>
            </div>
            <i class="fa-solid fa-arrow-right-long text-gray-300 dark:text-gray-600 group-hover:text-gray-900 dark:group-hover:text-white transition-all duration-300 group-hover:translate-x-1"></i>
          </a>

          <a href="{{ route('admin.settings') }}" class="group flex items-center p-4 border border-gray-200 dark:border-gray-800 hover:border-gray-900 dark:hover:border-white hover:shadow-lg transition-all duration-300">
            <div class="w-11 h-11 shrink-0 border border-gray-200 dark:border-gray-700 flex items-center justify-center mr-4 text-gray-400 group-hover:bg-gray-900 group-hover:border-gray-900 group-hover:text-white dark:group-hover:bg-white dark:group-hover:border-white dark:group-hover:text-gray-900 transition-all duration-300">
              <i class="fa-solid fa-cog"></i>
            </div>
            <div class="flex-1">
              <p class="font-semibold text-gray-900 dark:text-white text-sm uppercase tracking-wide">Settings</p>
              <p class="text-xs text-gray-400 dark:text-gray-500 mt-0.5">Manage KHQR Payment Image</p>
            </div>
            <i class="fa-solid fa-arrow-right-long text-gray-300 dark:text-gray-600 group-hover:text-gray-900 dark:group-hover:text-white transition-all duration-300 group-hover:translate-x-1"></i>
          </a>
      </div>
    </div>
  </div>

<script>
// Animated counters
const counterObserver = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (!entry.isIntersecting) return;
    const el = entry.target;
    const target = +el.dataset.target;
    const duration = 1600;
    const startTime = performance.now();
    function tick(now) {
      const progress = Math.min((now - startTime) / duration, 1);
      const eased = 1 - Math.pow(1 - progress, 3);
      
      let val = Math.round(target * eased);
      el.textContent = val.toLocaleString();
      
      if (progress < 1) requestAnimationFrame(tick);
    }
    requestAnimationFrame(tick);
    counterObserver.unobserve(el);
  });
}, { threshold: 0.5 });
document.querySelectorAll('.counter').forEach(el => counterObserver.observe(el));
</script>
@endsection
