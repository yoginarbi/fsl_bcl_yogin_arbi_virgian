@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="bg-gradient-to-r from-blue-600 to-blue-800 text-white py-20">
    <div class="container mx-auto px-6 text-center">
        <h1 class="text-4xl md:text-6xl font-bold mb-6">Solusi Logistik Terpercaya untuk Bisnis Anda</h1>
        <p class="text-xl mb-8 max-w-3xl mx-auto">Kami menyediakan layanan pengiriman cepat, aman, dan terpercaya dengan jangkauan nasional dan internasional.</p>
        <div class="flex flex-col md:flex-row justify-center gap-4">
            <a href="#services" class="bg-white text-blue-700 font-semibold py-3 px-8 rounded-lg hover:bg-blue-50 transition duration-300">Layanan Kami</a>
            <a href="#tracking" class="bg-transparent border-2 border-white text-white font-semibold py-3 px-8 rounded-lg hover:bg-white hover:text-blue-700 transition duration-300">Lacak Pengiriman</a>
        </div>
    </div>
</section>

<!-- Tracking Section -->
<section id="tracking" class="py-16 bg-white">
    <div class="container mx-auto px-6">
        <div class="max-w-2xl mx-auto bg-gray-50 p-8 rounded-xl shadow-md">
            <h2 class="text-3xl font-bold text-center mb-6">Lacak Pengiriman Anda</h2>
            <p class="text-center text-gray-600 mb-8">Masukkan nomor resi untuk mengetahui status pengiriman Anda</p>
            <form class="flex flex-col md:flex-row gap-4">
                <input type="text" placeholder="Masukkan nomor resi" class="flex-grow p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                <button type="submit" class="bg-blue-600 text-white font-semibold py-3 px-8 rounded-lg hover:bg-blue-700 transition duration-300">Lacak</button>
            </form>
        </div>
    </div>
</section>

<!-- Services Section -->
<section id="services" class="py-16 bg-gray-50">
    <div class="container mx-auto px-6">
        <h2 class="text-3xl font-bold text-center mb-4">Layanan Kami</h2>
        <p class="text-center text-gray-600 mb-12 max-w-3xl mx-auto">Kami menawarkan berbagai solusi logistik yang dapat disesuaikan dengan kebutuhan bisnis Anda</p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Service 1 -->
            <div class="bg-white p-8 rounded-xl shadow-md hover:shadow-lg transition duration-300">
                <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mb-6">
                    <span class="text-2xl">🚚</span>
                </div>
                <h3 class="text-xl font-bold mb-4">Pengiriman Darat</h3>
                <p class="text-gray-600">Layanan pengiriman via darat dengan jangkauan seluruh Indonesia, cepat dan terjangkau.</p>
            </div>

            <!-- Service 2 -->
            <div class="bg-white p-8 rounded-xl shadow-md hover:shadow-lg transition duration-300">
                <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mb-6">
                    <span class="text-2xl">✈️</span>
                </div>
                <h3 class="text-xl font-bold mb-4">Pengiriman Udara</h3>
                <p class="text-gray-600">Pengiriman ekspres via udara untuk kebutuhan yang mendesak dengan jaminan kecepatan.</p>
            </div>

            <!-- Service 3 -->
            <div class="bg-white p-8 rounded-xl shadow-md hover:shadow-lg transition duration-300">
                <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mb-6">
                    <span class="text-2xl">📦</span>
                </div>
                <h3 class="text-xl font-bold mb-4">Logistik E-commerce</h3>
                <p class="text-gray-600">Solusi logistik terintegrasi untuk bisnis e-commerce dengan sistem tracking real-time.</p>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-6">
        <h2 class="text-3xl font-bold text-center mb-4">Mengapa Memilih Kami?</h2>
        <p class="text-center text-gray-600 mb-12 max-w-3xl mx-auto">Kami berkomitmen memberikan pengalaman logistik terbaik untuk pelanggan</p>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="text-center">
                <div class="bg-blue-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-3xl">⏱️</span>
                </div>
                <h3 class="text-lg font-bold mb-2">Cepat</h3>
                <p class="text-gray-600">Waktu pengiriman yang optimal dengan jaminan tepat waktu</p>
            </div>

            <div class="text-center">
                <div class="bg-blue-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-3xl">🔒</span>
                </div>
                <h3 class="text-lg font-bold mb-2">Aman</h3>
                <p class="text-gray-600">Barang Anda dijamin sampai dengan kondisi terbaik</p>
            </div>

            <div class="text-center">
                <div class="bg-blue-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-3xl">💰</span>
                </div>
                <h3 class="text-lg font-bold mb-2">Terjangkau</h3>
                <p class="text-gray-600">Harga kompetitif dengan kualitas layanan terbaik</p>
            </div>

            <div class="text-center">
                <div class="bg-blue-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-3xl">📱</span>
                </div>
                <h3 class="text-lg font-bold mb-2">Real-time Tracking</h3>
                <p class="text-gray-600">Pantau perjalanan barang Anda kapan saja dan di mana saja</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-16 bg-gradient-to-r from-blue-600 to-blue-800 text-white">
    <div class="container mx-auto px-6 text-center">
        <h2 class="text-3xl font-bold mb-6">Siap Mengirim Barang Anda?</h2>
        <p class="text-xl mb-8 max-w-3xl mx-auto">Daftar sekarang dan dapatkan penawaran khusus untuk pengiriman pertama Anda</p>
        <a href="#" class="bg-white text-blue-700 font-semibold py-3 px-8 rounded-lg hover:bg-blue-50 transition duration-300">Daftar Sekarang</a>
    </div>
</section>

<!-- Footer -->
<footer class="bg-gray-800 text-white py-12">
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div>
                <h3 class="text-xl font-bold mb-4">🚚 Armada</h3>
                <p class="text-gray-400">Solusi logistik terpercaya untuk bisnis Anda dengan layanan pengiriman cepat dan aman.</p>
            </div>

            <div>
                <h4 class="text-lg font-bold mb-4">Tautan Cepat</h4>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Beranda</a></li>
                    <li><a href="#services" class="text-gray-400 hover:text-white transition duration-300">Layanan</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Tentang Kami</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Kontak</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-lg font-bold mb-4">Layanan</h4>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Pengiriman Darat</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Pengiriman Udara</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Logistik E-commerce</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Lacak Pengiriman</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-lg font-bold mb-4">Kontak</h4>
                <ul class="space-y-2 text-gray-400">
                    <li>📞 (021) 1234-5678</li>
                    <li>✉️ info@armada.com</li>
                    <li>📍 Jl. Ikan Dorang No.24, Perak Bar., Kec. Krembangan, Surabaya, Jawa Timur 60177</li>
                </ul>
            </div>
        </div>

        <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
            <p>&copy; 2023 Armada Logistics. All rights reserved.</p>
        </div>
    </div>
</footer>
@endsection