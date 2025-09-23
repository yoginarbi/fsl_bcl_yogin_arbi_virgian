@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Detail Pengiriman</h1>

    <div class="bg-white p-6 rounded shadow-md">
        <p><strong>No Pengiriman:</strong> {{ $pengiriman->no_pengiriman }}</p>
        <p><strong>Tanggal Kirim:</strong> {{ $pengiriman->tgl_kirim->format('d-m-Y') }}</p>
        <p><strong>Lokasi Asal:</strong> {{ $pengiriman->lokasi_asal }}</p>
        <p><strong>Lokasi Tujuan:</strong> {{ $pengiriman->lokasi_tujuan }}</p>
        <p><strong>Status:</strong> {{ $pengiriman->status }}</p>
        <p><strong>Detail Barang:</strong> {{ $pengiriman->detail_barang }}</p>
        <p><strong>Armada:</strong> {{ $pengiriman->armada->nama ?? '-' }}</p>

        <a href="{{ route('pengirimans.index') }}" class="mt-4 inline-block bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Kembali</a>
    </div>
</div>
@endsection