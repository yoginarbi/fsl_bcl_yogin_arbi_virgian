@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Edit Pengiriman</h1>

    @if($errors->any())
    <div class="bg-red-100 text-red-800 p-2 rounded mb-4">
        <ul>
            @foreach($errors->all() as $error)
            <li>- {{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('pengirimans.update', $pengiriman->id) }}" method="POST" class="bg-white p-6 rounded shadow-md">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block mb-1">No Pengiriman</label>
            <input type="text" name="no_pengiriman" class="w-full border px-3 py-2 rounded" value="{{ old('no_pengiriman', $pengiriman->no_pengiriman) }}">
        </div>

        <div class="mb-4">
            <label class="block mb-1">Tanggal Kirim</label>
            <input type="date" name="tgl_kirim" class="w-full border px-3 py-2 rounded" value="{{ old('tgl_kirim', $pengiriman->tgl_kirim->format('Y-m-d')) }}">
        </div>

        <div class="mb-4">
            <label class="block mb-1">Lokasi Asal</label>
            <input type="text" name="lokasi_asal" class="w-full border px-3 py-2 rounded" value="{{ old('lokasi_asal', $pengiriman->lokasi_asal) }}">
        </div>

        <div class="mb-4">
            <label class="block mb-1">Lokasi Tujuan</label>
            <input type="text" name="lokasi_tujuan" class="w-full border px-3 py-2 rounded" value="{{ old('lokasi_tujuan', $pengiriman->lokasi_tujuan) }}">
        </div>

        <div class="mb-4">
            <label class="block mb-1">Status</label>
            <input type="text" name="status" class="w-full border px-3 py-2 rounded" value="{{ old('status', $pengiriman->status) }}">
        </div>

        <div class="mb-4">
            <label class="block mb-1">Detail Barang</label>
            <textarea name="detail_barang" class="w-full border px-3 py-2 rounded">{{ old('detail_barang', $pengiriman->detail_barang) }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Armada</label>
            <select name="armada_id" class="w-full border px-3 py-2 rounded">
                <option value="">-- Pilih Armada --</option>
                @foreach($armadas as $armada)
                <option value="{{ $armada->id }}" @if($pengiriman->armada_id == $armada->id) selected @endif>{{ $armada->nama }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Update</button>
        <a href="{{ route('pengirimans.index') }}" class="ml-2 bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Batal</a>
    </form>
</div>
@endsection