<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Manajemen Armada' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-800">
    <!-- Navigation Bar -->
    <nav class="fixed top-0 left-0 w-full z-50 bg-gradient-to-r from-blue-600 to-blue-800 text-white shadow-lg">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-3">
                <!-- Logo -->
                <a href="{{ url('/') }}" class="flex items-center space-x-2">
                    <span class="text-2xl">🚚</span>
                    <span class="font-bold text-xl">Armada Logistics</span>
                </a>

                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-1">
                    <a href="{{ route('armadas.index') }}" class="px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-300 font-medium flex items-center">
                        <span class="mr-2">📋</span> Armada
                    </a>
                    <a href="{{ route('pengirimans.index') }}" class="px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-300 font-medium flex items-center">
                        <span class="mr-2">🚛</span> Pengiriman
                    </a>
                    <a href="{{ route('pemesanans.index') }}" class="px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-300 font-medium flex items-center">
                        <span class="mr-2">📦</span> Pemesanan
                    </a>
                    <a href="#" class="px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-300 font-medium flex items-center">
                        <span class="mr-2">✅</span> Checkin
                    </a>
                </div>

                <!-- User Menu / Login -->
                <div class="hidden md:flex items-center space-x-4">
                    <a href="#" class="text-white hover:text-blue-200 transition duration-300">Login</a>
                    <a href="#" class="bg-white text-blue-700 px-4 py-2 rounded-lg font-medium hover:bg-blue-100 transition duration-300">Daftar</a>
                </div>

                <!-- Mobile Menu Button -->
                <button id="mobile-menu-button" class="md:hidden flex items-center text-white p-2">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>

            <!-- Mobile Menu -->
            <div id="mobile-menu" class="hidden md:hidden py-4 border-t border-blue-500">
                <a href="{{ route('armadas.index') }}" class="block py-3 px-4 hover:bg-blue-700 rounded-lg transition duration-300 font-medium flex items-center">
                    <span class="mr-3">📋</span> Armada
                </a>
                <a href="{{ route('pengirimans.index') }}" class="block py-3 px-4 hover:bg-blue-700 rounded-lg transition duration-300 font-medium flex items-center">
                    <span class="mr-3">🚛</span> Pengiriman
                </a>
                <a href="{{ route('pemesanans.index') }}" class="block py-3 px-4 hover:bg-blue-700 rounded-lg transition duration-300 font-medium flex items-center">
                    <span class="mr-3">📦</span> Pemesanan
                </a>
                <a href="#" class="block py-3 px-4 hover:bg-blue-700 rounded-lg transition duration-300 font-medium flex items-center">
                    <span class="mr-3">✅</span> Checkin
                </a>

                <div class="mt-4 pt-4 border-t border-blue-500 space-y-3">
                    <!-- Login Full Width -->
                    <a href="#" class="block w-full text-center py-3 px-4 hover:bg-blue-700 rounded-lg transition duration-300 font-medium">
                        Login
                    </a>

                    <!-- Daftar Full Width -->
                    <a href="#" class="block w-full text-center bg-white text-blue-700 py-3 px-4 rounded-lg font-medium hover:bg-blue-100 transition duration-300">
                        Daftar
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <main class="container mx-auto pb-6 pt-20">
        @yield('content')
    </main>

    <script>
        // Script untuk menu mobile
            document.addEventListener('DOMContentLoaded', function() {
                const mobileMenuButton = document.getElementById('mobile-menu-button');
                const mobileMenu = document.getElementById('mobile-menu');
                
                if (mobileMenuButton && mobileMenu) {
                    mobileMenuButton.addEventListener('click', function() {
                        mobileMenu.classList.toggle('hidden');
                    });
                }
            });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @yield('script')
</body>

</html>