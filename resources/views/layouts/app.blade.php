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
                    },
                    colors: {
                        primary: '#4F46E5', // Indigo 600
                        secondary: '#ec4899', // Pink 500
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
            background: linear-gradient(-45deg, #fdfbfb, #ebedee, #fdfbfb, #e0c3fc);
            background: linear-gradient(-45deg, #ff9a9e, #fecfef, #a1c4fd, #c2e9fb);
            background-size: 400% 400%;
            animation: gradientBG 15s ease infinite;
            min-height: 100vh;
        }

        .dark body {
            background: linear-gradient(-45deg, #0f172a, #1e293b, #0f172a, #334155);
            background-size: 400% 400%;
            animation: gradientBG 15s ease infinite;
        }

        @keyframes gradientBG {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        .glass-nav {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.5);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.05);
        }

        .dark .glass-nav {
            background: rgba(15, 23, 42, 0.8);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.2);
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.6);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        }

        .dark .glass-card {
            background: rgba(30, 41, 59, 0.7);
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            color: #f1f5f9;
        }

        .product-img-wrapper {
            overflow: hidden;
        }

        .product-img {
            transition: transform 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
        }

        .product-card {
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            opacity: 0;
            transform: translateY(30px);
            animation: fadeUp 0.8s forwards;
        }

        .product-card:hover {
            transform: translateY(-12px) scale(1.02);
            box-shadow: 0 20px 40px rgba(79, 70, 229, 0.2);
            border-color: rgba(236, 72, 153, 0.4);
        }

        .dark .product-card:hover {
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.5);
            border-color: rgba(236, 72, 153, 0.6);
        }

        .product-card:hover .product-img {
            transform: scale(1.1);
        }

        @keyframes fadeUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body class="text-gray-800 dark:text-gray-200 antialiased flex flex-col min-h-screen transition-colors duration-500">

    <!-- Navbar -->
    <nav class="glass-nav fixed w-full z-50 top-0 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20 items-center">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('home') }}"
                        class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-primary to-secondary">
                        <i class="fa-solid fa-shirt mr-2"></i>Fashion T-shirt
                    </a>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:flex space-x-2 lg:space-x-4 items-center">
                    <a href="{{ route('home') }}"
                        class="relative group px-4 py-2 text-gray-700 dark:text-gray-200 font-medium transition-colors">
                        <span
                            class="relative z-10 group-hover:text-primary dark:group-hover:text-secondary transition-colors {{ request()->routeIs('home') ? 'text-primary dark:text-secondary font-bold' : '' }}">Home</span>
                        <span
                            class="absolute inset-x-0 bottom-0 h-1 bg-gradient-to-r from-primary to-secondary transform scale-x-0 group-hover:scale-x-100 transition-transform origin-left duration-300 rounded-full {{ request()->routeIs('home') ? 'scale-x-100' : '' }}"></span>
                        <span
                            class="absolute inset-0 bg-primary/5 dark:bg-white/5 rounded-xl transform scale-0 group-hover:scale-100 transition-transform duration-300 -z-10 {{ request()->routeIs('home') ? 'scale-100 opacity-100' : '' }}"></span>
                    </a>

                    <a href="{{ route('shop') }}"
                        class="relative group px-4 py-2 text-gray-700 dark:text-gray-200 font-medium transition-colors">
                        <span
                            class="relative z-10 group-hover:text-primary dark:group-hover:text-secondary transition-colors {{ request()->routeIs('shop') ? 'text-primary dark:text-secondary font-bold' : '' }}">Shop</span>
                        <span
                            class="absolute inset-x-0 bottom-0 h-1 bg-gradient-to-r from-primary to-secondary transform scale-x-0 group-hover:scale-x-100 transition-transform origin-left duration-300 rounded-full {{ request()->routeIs('shop') ? 'scale-x-100' : '' }}"></span>
                        <span
                            class="absolute inset-0 bg-primary/5 dark:bg-white/5 rounded-xl transform scale-0 group-hover:scale-100 transition-transform duration-300 -z-10 {{ request()->routeIs('shop') ? 'scale-100 opacity-100' : '' }}"></span>
                    </a>

                    <a href="{{ route('category') }}"
                        class="relative group px-4 py-2 text-gray-700 dark:text-gray-200 font-medium transition-colors">
                        <span
                            class="relative z-10 group-hover:text-primary dark:group-hover:text-secondary transition-colors {{ request()->routeIs('category') ? 'text-primary dark:text-secondary font-bold' : '' }}">Category</span>
                        <span
                            class="absolute inset-x-0 bottom-0 h-1 bg-gradient-to-r from-primary to-secondary transform scale-x-0 group-hover:scale-x-100 transition-transform origin-left duration-300 rounded-full {{ request()->routeIs('category') ? 'scale-x-100' : '' }}"></span>
                        <span
                            class="absolute inset-0 bg-primary/5 dark:bg-white/5 rounded-xl transform scale-0 group-hover:scale-100 transition-transform duration-300 -z-10 {{ request()->routeIs('category') ? 'scale-100 opacity-100' : '' }}"></span>
                    </a>

                    <a href="{{ route('cart') }}"
                        class="relative group px-4 py-2 text-gray-700 dark:text-gray-200 transition flex items-center">
                        <span
                            class="relative z-10 flex items-center group-hover:text-primary dark:group-hover:text-secondary transition-colors {{ request()->routeIs('cart') ? 'text-primary dark:text-secondary font-bold' : '' }}">
                            <i class="fa-solid fa-cart-shopping text-xl mr-1"></i>
                            <span class="hidden lg:inline">Cart</span>
                            @php $cartQty = array_sum(array_column(session('cart', []), 'quantity')); @endphp
                            @if($cartQty > 0)
                                <span
                                    class="absolute -top-3 -right-3 bg-secondary text-white text-xs font-bold rounded-full h-5 w-5 flex items-center justify-center group-hover:scale-110 transition-transform">
                                    {{ $cartQty }}
                                </span>
                            @endif
                        </span>
                        <span
                            class="absolute inset-x-0 bottom-0 h-1 bg-gradient-to-r from-primary to-secondary transform scale-x-0 group-hover:scale-x-100 transition-transform origin-left duration-300 rounded-full {{ request()->routeIs('cart') ? 'scale-x-100' : '' }}"></span>
                        <span
                            class="absolute inset-0 bg-primary/5 dark:bg-white/5 rounded-xl transform scale-0 group-hover:scale-100 transition-transform duration-300 -z-10 {{ request()->routeIs('cart') ? 'scale-100 opacity-100' : '' }}"></span>
                    </a>

                    <!-- Dark Mode Toggle Button -->
                    <button onclick="toggleDarkMode()"
                        class="text-gray-700 dark:text-yellow-400 hover:text-primary dark:hover:text-yellow-300 transition-colors p-2 rounded-full hover:bg-gray-100 dark:hover:bg-gray-800 focus:outline-none">
                        <i class="fa-solid fa-moon dark:hidden text-xl"></i>
                        <i class="fa-solid fa-sun hidden dark:block text-xl"></i>
                    </button>

                    @guest
                        <a href="{{ route('login') }}"
                            class="text-gray-700 dark:text-gray-200 hover:text-primary dark:hover:text-secondary transition font-medium px-4">Login</a>
                        <a href="{{ route('register') }}"
                            class="bg-gradient-to-r from-primary to-secondary text-white px-5 py-2.5 rounded-xl hover:shadow-lg hover:shadow-primary/30 transition transform hover:-translate-y-0.5">Register</a>
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
                                        class="w-10 h-10 rounded-full bg-gradient-to-r from-primary to-secondary flex items-center justify-center text-white font-bold text-lg">
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

                <!-- Mobile menu button -->
                <div class="md:hidden flex items-center">
                    <button id="mobile-menu-button" class="text-gray-700 hover:text-primary focus:outline-none">
                        <i class="fa-solid fa-bars text-2xl"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-white/90 dark:bg-gray-900/90 backdrop-blur-md border-t border-gray-100 dark:border-gray-800">
            <div class="px-4 pt-2 pb-4 space-y-2">
                <a href="{{ route('home') }}" class="block px-4 py-2.5 rounded-xl text-base font-medium text-gray-700 dark:text-gray-200 hover:bg-primary/5 hover:text-primary dark:hover:bg-gray-800 transition {{ request()->routeIs('home') ? 'bg-primary/5 text-primary font-bold' : '' }}">Home</a>
                <a href="{{ route('shop') }}" class="block px-4 py-2.5 rounded-xl text-base font-medium text-gray-700 dark:text-gray-200 hover:bg-primary/5 hover:text-primary dark:hover:bg-gray-800 transition {{ request()->routeIs('shop') ? 'bg-primary/5 text-primary font-bold' : '' }}">Shop</a>
                <a href="{{ route('category') }}" class="block px-4 py-2.5 rounded-xl text-base font-medium text-gray-700 dark:text-gray-200 hover:bg-primary/5 hover:text-primary dark:hover:bg-gray-800 transition {{ request()->routeIs('category') ? 'bg-primary/5 text-primary font-bold' : '' }}">Category</a>
                <a href="{{ route('cart') }}" class="block px-4 py-2.5 rounded-xl text-base font-medium text-gray-700 dark:text-gray-200 hover:bg-primary/5 hover:text-primary dark:hover:bg-gray-800 transition {{ request()->routeIs('cart') ? 'bg-primary/5 text-primary font-bold' : '' }}">Cart</a>
                @guest
                    <div class="border-t border-gray-100 dark:border-gray-800 my-2 pt-2"></div>
                    <a href="{{ route('login') }}" class="block px-4 py-2.5 rounded-xl text-base font-medium text-gray-700 dark:text-gray-200 hover:bg-primary/5 hover:text-primary dark:hover:bg-gray-800 transition">Login</a>
                    <a href="{{ route('register') }}" class="block px-4 py-2.5 rounded-xl text-base font-medium bg-gradient-to-r from-primary to-secondary text-white hover:shadow-lg transition">Register</a>
                @else
                    <div class="border-t border-gray-100 dark:border-gray-800 my-2 pt-2"></div>
                    <a href="{{ route('profile') }}" class="block px-4 py-2.5 rounded-xl text-base font-medium text-gray-700 dark:text-gray-200 hover:bg-primary/5 hover:text-primary dark:hover:bg-gray-800 transition"><i class="fa-solid fa-user-pen mr-2"></i>Profile</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="block w-full text-left px-4 py-2.5 rounded-xl text-base font-medium text-red-600 hover:bg-red-50 dark:hover:bg-red-900/20 transition"><i class="fa-solid fa-right-from-bracket mr-2"></i>Logout</button>
                    </form>
                @endguest
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-grow pt-24 pb-12 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto w-full">
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
        class="bg-white/80 dark:bg-gray-900/80 backdrop-blur-md border-t border-gray-200 dark:border-gray-800 mt-auto transition-colors duration-500">
        <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row justify-between items-center">
            <div class="mb-4 md:mb-0">
                <span
                    class="text-xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-primary to-secondary">
                    <i class="fa-solid fa-shirt mr-2"></i>Fashion T-shirt
                </span>
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Premium Clothing For Everyone.</p>
            </div>
            <div class="flex space-x-6">
                <a href="#" class="text-gray-400 hover:text-primary dark:hover:text-primary transition-colors"><i
                        class="fa-brands fa-facebook text-xl"></i></a>
                <a href="#" class="text-gray-400 hover:text-secondary dark:hover:text-secondary transition-colors"><i
                        class="fa-brands fa-instagram text-xl"></i></a>
                <a href="#" class="text-gray-400 hover:text-blue-400 dark:hover:text-blue-400 transition-colors"><i
                        class="fa-brands fa-twitter text-xl"></i></a>
            </div>
        </div>
    </footer>

    <script>
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>
</body>

</html>