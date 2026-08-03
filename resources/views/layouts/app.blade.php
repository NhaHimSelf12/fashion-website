<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fusion T-shirt</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        serif: ['Playfair Display', 'serif'],
                    },
                    colors: {
                        primary: '#18181b', // Zinc 900 (Almost black)
                        secondary: '#52525b', // Zinc 600
                        accent: '#a1a1aa', // Zinc 400
                    }
                }
            }
        }
    </script>
    <script>
        // Check local storage or system preference for dark mode
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }

        function toggleDarkMode() {
            document.documentElement.classList.toggle('dark');
            if (document.documentElement.classList.contains('dark')) {
                localStorage.theme = 'dark';
            } else {
                localStorage.theme = 'light';
            }
        }
    </script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #fdfdfd;
            min-height: 100vh;
        }

        .dark body {
            background-color: #09090b;
        }

        .glass-nav {
            background: rgba(253, 253, 253, 0.95);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        .dark .glass-nav {
            background: rgba(9, 9, 11, 0.95);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .glass-card {
            background: #ffffff;
            border: 1px solid rgba(0, 0, 0, 0.05);
            transition: all 0.4s ease;
        }

        .dark .glass-card {
            background: #18181b;
            border: 1px solid rgba(255, 255, 255, 0.05);
            color: #f4f4f5;
        }

        .product-img-wrapper {
            overflow: hidden;
            background-color: #f4f4f5;
        }

        .dark .product-img-wrapper {
            background-color: #27272a;
        }

        .product-img {
            transition: transform 0.8s cubic-bezier(0.25, 1, 0.5, 1);
        }

        .product-card {
            transition: all 0.4s ease;
            opacity: 0;
            transform: translateY(20px);
            animation: fadeUp 0.8s forwards;
        }

        .product-card:hover {
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.04);
        }

        .dark .product-card:hover {
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.4);
        }

        .product-card:hover .product-img {
            transform: scale(1.05);
        }

        /* Minimalist UI Elements */
        .btn-primary {
            background-color: #18181b;
            color: white;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #27272a;
        }

        .dark .btn-primary {
            background-color: #f4f4f5;
            color: #18181b;
        }

        .dark .btn-primary:hover {
            background-color: #e4e4e7;
        }

        @keyframes fadeUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        /* Hero Ken Burns zoom */
        .hero-bg img { animation: kenburns 18s ease-out infinite alternate; }
        @keyframes kenburns { from { transform: scale(1); } to { transform: scale(1.12); } }

        /* Hero staggered entrance */
        .hero-item { opacity: 0; transform: translateY(30px); animation: heroFade 1s cubic-bezier(0.25,1,0.5,1) forwards; animation-delay: var(--d, 0s); }
        @keyframes heroFade { to { opacity: 1; transform: translateY(0); } }

        /* Infinite marquee */
        .marquee-track { animation: marquee 30s linear infinite; }
        .marquee-track:hover { animation-play-state: paused; }
        @keyframes marquee { from { transform: translateX(0); } to { transform: translateX(-50%); } }

        /* Scroll reveal */
        .reveal { opacity: 0; transform: translateY(40px); transition: opacity .9s cubic-bezier(0.25,1,0.5,1), transform .9s cubic-bezier(0.25,1,0.5,1); transition-delay: var(--d, 0s); }
        .reveal.visible { opacity: 1; transform: translateY(0); }

        /* Newsletter dot pattern */
        .newsletter-pattern { background-image: radial-gradient(circle, #ffffff 1px, transparent 1px); background-size: 24px 24px; }

        @media (prefers-reduced-motion: reduce) {
          .hero-bg img, .marquee-track, .hero-item { animation-duration: 0.01s; animation-iteration-count: 1; }
          .reveal { transition: none; opacity: 1; transform: none; }
        }
    </style>
    <!-- Add Playfair Display for elegant headings -->
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&display=swap"
        rel="stylesheet">
</head>

<body class="text-gray-800 dark:text-gray-200 antialiased flex flex-col min-h-screen transition-colors duration-500">

    <!-- Navbar -->
    <nav class="glass-nav fixed w-full z-50 top-0 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20 items-center">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('home') }}"
                        class="text-2xl font-serif font-bold text-gray-900 dark:text-white tracking-wider uppercase">
                        Fusion T-shirt
                    </a>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:flex space-x-6 lg:space-x-10 items-center">
                    <a href="{{ route('home') }}"
                        class="relative group py-2 text-sm text-gray-900 dark:text-gray-200 font-medium tracking-wide uppercase transition-colors {{ request()->routeIs('home') ? 'border-b-2 border-primary dark:border-white' : 'border-b-2 border-transparent hover:border-gray-300 dark:hover:border-gray-600' }}">
                        Home
                    </a>

                    <a href="{{ route('shop') }}"
                        class="relative group py-2 text-sm text-gray-900 dark:text-gray-200 font-medium tracking-wide uppercase transition-colors {{ request()->routeIs('shop') ? 'border-b-2 border-primary dark:border-white' : 'border-b-2 border-transparent hover:border-gray-300 dark:hover:border-gray-600' }}">
                        Shop
                    </a>

                    <a href="{{ route('category') }}"
                        class="relative group py-2 text-sm text-gray-900 dark:text-gray-200 font-medium tracking-wide uppercase transition-colors {{ request()->routeIs('category') ? 'border-b-2 border-primary dark:border-white' : 'border-b-2 border-transparent hover:border-gray-300 dark:hover:border-gray-600' }}">
                        Collections
                    </a>

                    <a href="{{ route('cart') }}"
                        class="relative group py-2 text-sm text-gray-900 dark:text-gray-200 transition flex items-center {{ request()->routeIs('cart') ? 'border-b-2 border-primary dark:border-white' : 'border-b-2 border-transparent hover:border-gray-300 dark:hover:border-gray-600' }}">
                        <span class="relative z-10 flex items-center">
                            <i class="fa-solid fa-cart-shopping mr-2"></i>
                            <span class="hidden lg:inline uppercase tracking-wide">Cart</span>
                            @php $cartQty = array_sum(array_column(session('cart', []), 'quantity')); @endphp
                            @if($cartQty > 0)
                                <span
                                    class="absolute -top-3 -right-4 bg-gray-900 dark:bg-white text-white dark:text-gray-900 text-[10px] font-bold rounded-full h-4 w-4 flex items-center justify-center">
                                    {{ $cartQty }}
                                </span>
                            @endif
                        </span>
                    </a>

                    <!-- Dark Mode Toggle Button -->
                    <button onclick="toggleDarkMode()"
                        class="text-gray-700 dark:text-yellow-400 hover:text-primary dark:hover:text-yellow-300 transition-colors p-2 rounded-full hover:bg-gray-100 dark:hover:bg-gray-800 focus:outline-none">
                        <i class="fa-solid fa-moon dark:hidden text-xl"></i>
                        <i class="fa-solid fa-sun hidden dark:block text-xl"></i>
                    </button>

                    @guest
                        <a href="{{ route('login') }}"
                            class="text-gray-700 dark:text-gray-200 hover:text-gray-900 dark:hover:text-white transition text-sm font-medium uppercase tracking-wide px-2">Login</a>
                        <a href="{{ route('register') }}"
                            class="btn-primary px-6 py-2 rounded-sm text-sm font-medium uppercase tracking-wide">Register</a>
                    @else
                        @if(Auth::user()->role === 'admin')
                            <a href="{{ route('admin.dashboard') }}"
                                class="text-gray-700 dark:text-gray-200 hover:text-primary dark:hover:text-secondary transition font-medium px-4">Dashboard</a>
                        @endif

                        <div class="relative group py-2 pl-2">
                            <button
                                class="text-gray-700 hover:text-primary transition flex items-center focus:outline-none ring-2 ring-transparent group-hover:ring-primary rounded-full">
                                @if(Auth::user()->avatar)
                                    <img src="{{ asset(Auth::user()->avatar) }}"
                                        class="w-10 h-10 rounded-full object-cover border-2 border-transparent group-hover:border-primary transition-all"
                                        alt="Avatar">
                                @else
                                    <div
                                        class="w-10 h-10 rounded-full bg-gray-900 dark:bg-white flex items-center justify-center text-white dark:text-gray-900 font-bold text-lg">
                                        <i class="fa-solid fa-user"></i>
                                    </div>
                                @endif
                            </button>
                            <!-- Dropdown -->
                            <div class="absolute right-0 top-full w-48 pt-3 z-50 hidden group-hover:block">
                                <div
                                    class="bg-white dark:bg-gray-800 rounded-xl shadow-xl py-2 border border-gray-100 dark:border-gray-700 transform origin-top transition-all scale-100">
                                    <a href="{{ route('profile') }}"
                                        class="block px-4 py-2.5 text-sm text-gray-700 dark:text-gray-200 hover:bg-primary/5 hover:text-primary dark:hover:bg-gray-700 transition"><i
                                            class="fa-solid fa-user-pen w-6 text-center"></i> Profile</a>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit"
                                            class="block w-full text-left px-4 py-2.5 text-sm text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/20 transition"><i
                                                class="fa-solid fa-right-from-bracket w-6 text-center"></i> Logout</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endguest
                </div>

            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-grow pt-24 pb-28 md:pb-12 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto w-full">
        @if(session('success'))
            <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative shadow-sm"
                role="alert">
                <span class="block sm:inline"><i class="fa-solid fa-circle-check mr-2"></i>{{ session('success') }}</span>
            </div>
        @endif

        @if(session('error'))
            <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative shadow-sm"
                role="alert">
                <span class="block sm:inline"><i
                        class="fa-solid fa-circle-exclamation mr-2"></i>{{ session('error') }}</span>
            </div>
        @endif

        @yield('content')
    </main>

    <!-- Footer -->
    <footer
        class="bg-white dark:bg-[#09090b] border-t border-gray-100 dark:border-gray-800 mt-auto transition-colors duration-500">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="col-span-1 md:col-span-1">
                    <span
                        class="text-xl font-serif font-bold text-gray-900 dark:text-white tracking-widest uppercase mb-4 block">
                        ATELIER
                    </span>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-1 mb-6 leading-relaxed">
                        Curated fashion for the modern individual. Minimalist, premium, and responsibly sourced.
                    </p>
                </div>
                <div>
                    <h3 class="text-sm font-semibold text-gray-900 dark:text-white tracking-wider uppercase mb-4">Shop
                    </h3>
                    <ul class="space-y-3 text-sm text-gray-500 dark:text-gray-400">
                        <li><a href="{{ route('shop') }}"
                                class="hover:text-gray-900 dark:hover:text-white transition-colors">New Arrivals</a>
                        </li>
                        <li><a href="{{ route('category') }}"
                                class="hover:text-gray-900 dark:hover:text-white transition-colors">Collections</a></li>
                        <li><a href="#" class="hover:text-gray-900 dark:hover:text-white transition-colors">Best
                                Sellers</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-sm font-semibold text-gray-900 dark:text-white tracking-wider uppercase mb-4">
                        Support</h3>
                    <ul class="space-y-3 text-sm text-gray-500 dark:text-gray-400">
                        <li><a href="#" class="hover:text-gray-900 dark:hover:text-white transition-colors">FAQ</a></li>
                        <li><a href="#" class="hover:text-gray-900 dark:hover:text-white transition-colors">Shipping &
                                Returns</a></li>
                        <li><a href="#" class="hover:text-gray-900 dark:hover:text-white transition-colors">Contact
                                Us</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-sm font-semibold text-gray-900 dark:text-white tracking-wider uppercase mb-4">
                        Connect</h3>
                    <div class="flex space-x-6">
                        <a href="#" class="text-gray-400 hover:text-gray-900 dark:hover:text-white transition-colors"><i
                                class="fa-brands fa-instagram text-xl"></i></a>
                        <a href="#" class="text-gray-400 hover:text-gray-900 dark:hover:text-white transition-colors"><i
                                class="fa-brands fa-tiktok text-xl"></i></a>
                        <a href="#" class="text-gray-400 hover:text-gray-900 dark:hover:text-white transition-colors"><i
                                class="fa-brands fa-pinterest text-xl"></i></a>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-100 dark:border-gray-800 mt-12 pt-8 text-center text-xs text-gray-400">
                &copy; {{ date('Y') }} ATELIER Fashion. All rights reserved.
            </div>
        </div>
    </footer>

    <!-- Mobile Bottom Navigation -->
    <nav class="md:hidden fixed bottom-0 left-0 right-0 bg-white/95 dark:bg-[#09090b]/95 backdrop-blur-md border-t border-gray-100 dark:border-gray-800 z-[70] pb-safe shadow-[0_-4px_20px_rgba(0,0,0,0.05)] dark:shadow-[0_-4px_20px_rgba(255,255,255,0.02)]">
        <div class="flex justify-around items-center h-16 px-2">
            <a href="{{ route('home') }}" class="flex flex-col items-center justify-center w-full h-full text-gray-500 hover:text-primary dark:hover:text-white transition-colors {{ request()->routeIs('home') ? 'text-primary dark:text-white' : '' }}">
                <i class="fa-solid fa-house text-[22px] mb-1 {{ request()->routeIs('home') ? 'scale-110' : '' }} transition-transform"></i>
                <span class="text-[9px] font-semibold uppercase tracking-widest mt-0.5">Home</span>
            </a>
            
            <a href="{{ route('shop') }}" class="flex flex-col items-center justify-center w-full h-full text-gray-500 hover:text-primary dark:hover:text-white transition-colors {{ request()->routeIs('shop') ? 'text-primary dark:text-white' : '' }}">
                <i class="fa-solid fa-border-all text-[22px] mb-1 {{ request()->routeIs('shop') ? 'scale-110' : '' }} transition-transform"></i>
                <span class="text-[9px] font-semibold uppercase tracking-widest mt-0.5">Products</span>
            </a>
            
            <a href="{{ route('cart') }}" class="relative flex flex-col items-center justify-center w-full h-full text-gray-500 hover:text-primary dark:hover:text-white transition-colors {{ request()->routeIs('cart') ? 'text-primary dark:text-white' : '' }}">
                <div class="relative">
                    <i class="fa-solid fa-cart-shopping text-[22px] mb-1 {{ request()->routeIs('cart') ? 'scale-110' : '' }} transition-transform"></i>
                    @php $cartQty = array_sum(array_column(session('cart', []), 'quantity')); @endphp
                    @if($cartQty > 0)
                        <span class="absolute -top-1.5 -right-2.5 bg-gray-900 dark:bg-white text-white dark:text-gray-900 text-[10px] font-bold rounded-full h-4 w-4 flex items-center justify-center">{{ $cartQty }}</span>
                    @endif
                </div>
                <span class="text-[9px] font-semibold uppercase tracking-widest mt-0.5">Cart</span>
            </a>
            
            <a href="{{ route('category') }}" class="flex flex-col items-center justify-center w-full h-full text-gray-500 hover:text-primary dark:hover:text-white transition-colors {{ request()->routeIs('category') ? 'text-primary dark:text-white' : '' }}">
                <i class="fa-regular fa-heart text-[22px] mb-1 {{ request()->routeIs('category') ? 'scale-110 font-solid text-primary dark:text-white' : '' }} transition-transform"></i>
                <span class="text-[9px] font-semibold uppercase tracking-widest mt-0.5">Wishlist</span>
            </a>
            
            <a href="{{ Auth::check() ? route('profile') : route('login') }}" class="flex flex-col items-center justify-center w-full h-full text-gray-500 hover:text-primary dark:hover:text-white transition-colors {{ request()->routeIs('profile') || request()->routeIs('login') ? 'text-primary dark:text-white' : '' }}">
                <i class="fa-regular fa-user text-[22px] mb-1 {{ request()->routeIs('profile') || request()->routeIs('login') ? 'scale-110 font-solid text-primary dark:text-white' : '' }} transition-transform"></i>
                <span class="text-[9px] font-semibold uppercase tracking-widest mt-0.5">Profile</span>
            </a>
        </div>
    </nav>

    <script>

        // Scroll reveal
        const revealObserver = new IntersectionObserver((entries) => {
          entries.forEach(entry => {
            if (entry.isIntersecting) {
              entry.target.classList.add('visible');
              revealObserver.unobserve(entry.target);
            }
          });
        }, { threshold: 0.12 });
        document.querySelectorAll('.reveal').forEach(el => revealObserver.observe(el));

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
              el.textContent = Math.round(target * eased);
              if (progress < 1) requestAnimationFrame(tick);
            }
            requestAnimationFrame(tick);
            counterObserver.unobserve(el);
          });
        }, { threshold: 0.5 });
        document.querySelectorAll('.counter').forEach(el => counterObserver.observe(el));
    </script>
</body>

</html>