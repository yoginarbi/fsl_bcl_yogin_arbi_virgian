@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Tambah Pengiriman</h1>

    @if($errors->any())
    <div class="bg-red-100 text-red-800 p-2 rounded mb-4">
        <ul>
            @foreach($errors->all() as $error)
            <li>- {{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('pengirimans.store') }}" method="POST" class="bg-white p-6 rounded shadow-md">
        @csrf
        <div class="mb-4">
            <label class="block mb-1">No Pengiriman</label>
            <input type="text" name="no_pengiriman" class="w-full border px-3 py-2 rounded" value="{{ old('no_pengiriman') }}">
        </div>
        <div class="mb-4">
            <label class="block mb-1">Tanggal Kirim</label>
            <input type="date" name="tgl_kirim" class="w-full border px-3 py-2 rounded" value="{{ old('tgl_kirim') }}">
        </div>
        <div class="mb-4">
            <label class="block mb-1">Lokasi Asal</label>
            <input type="text" name="lokasi_asal" class="w-full border px-3 py-2 rounded" value="{{ old('lokasi_asal') }}">
        </div>
        <div class="mb-4">
            <label class="block mb-1">Lokasi Tujuan</label>
            <input type="text" name="lokasi_tujuan" class="w-full border px-3 py-2 rounded" value="{{ old('lokasi_tujuan') }}">
        </div>
        <div class="mb-4">
            <label class="block mb-1">Status</label>
            <input type="text" name="status" class="w-full border px-3 py-2 rounded" value="{{ old('status') }}">
        </div>
        <div class="mb-4">
            <label class="block mb-1">Pilih Pemesanan (Nama Pelanggan)</label>
            <select name="pemesanan_id" id="pemesanan_id" class="w-full border px-3 py-2 rounded">
                <option value="">-- Pilih Pemesanan --</option>
                @foreach($pemesanans as $pemesanan)
                <option value="{{ $pemesanan->id }}" data-armada="{{ $pemesanan->armada_id }}" data-detail="{{ $pemesanan->detail_barang }}">
                    {{ $pemesanan->nama_pelanggan }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label class="block mb-1">Armada</label>
            <select name="armada_id" id="armada_id" class="w-full border px-3 py-2 rounded" readonly>
                <option value="">-- Armada Akan Terisi Otomatis --</option>
            </select>
        </div>
        <div class="mb-4">
            <label class="block mb-1">Detail Barang</label>
            <textarea name="detail_barang" id="detail_barang" class="w-full border px-3 py-2 rounded" readonly></textarea>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Simpan</button>
    </form>
</div>

@endsection
@section('script')
<script>
    $('#pemesanan_id').change(function() {
    let selected = $(this).find(':selected');
    let armadaId = selected.data('armada');
    let detail = selected.data('detail');
    
    $('#armada_id').html(`<option value="${armadaId}">${armadaId}</option>`);
    $('#detail_barang').val(detail);
    });
</script>
@endsection