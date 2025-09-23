@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Edit Pemesanan</h1>

    @if($errors->any())
    <div class="bg-red-200 text-red-800 px-4 py-2 rounded mb-4">
        <ul class="list-disc list-inside">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('pemesanans.update', $pemesanan->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block mb-1">Nama Pelanggan</label>
            <input type="text" name="nama_pelanggan" value="{{ old('nama_pelanggan', $pemesanan->nama_pelanggan) }}" class="border px-3 py-2 w-full rounded">
        </div>

        <div>
            <label class="block mb-1">Armada</label>
            <select name="armada_id" class="border px-3 py-2 w-full rounded">
                <option value="">-- Pilih Armada --</option>
                @foreach($armadas as $armada)
                <option value="{{ $armada->id }}" data-jenis="{{ $armada->jenis }}" {{ (old('armada_id', $pemesanan->armada_id) == $armada->id) ? 'selected' : '' }}>
                    {{ $armada->no_armada }}
                </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block mb-1">Jenis Kendaraan</label>
            <input type="text" id="jenis_kendaraan" name="jenis_kendaraan" value="{{ old('jenis_kendaraan', $pemesanan->jenis_kendaraan) }}" class="border px-3 py-2 w-full rounded" readonly>
        </div>

        <div>
            <label class="block mb-1">Tanggal Pemesanan</label>
            <input type="date" name="tgl_pemesanan" value="{{ old('tgl_pemesanan', $pemesanan->tgl_pemesanan->format('Y-m-d')) }}" class="border px-3 py-2 w-full rounded">
        </div>

        <div>
            <label class="block mb-1">Detail Barang</label>
            <textarea name="detail_barang" class="border px-3 py-2 w-full rounded" rows="4">{{ old('detail_barang', implode("\n", json_decode($pemesanan->detail_barang, true))) }}</textarea>
        </div>

        <div>
            <label class="block mb-1">Status</label>
            <select name="status" class="border px-3 py-2 w-full rounded">
                <option value="pending" {{ old('status', $pemesanan->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="proses" {{ old('status', $pemesanan->status) == 'proses' ? 'selected' : '' }}>Proses</option>
                <option value="sukses" {{ old('status', $pemesanan->status) == 'sukses' ? 'selected' : '' }}>Sukses</option>
            </select>
        </div>

        <div class="flex items-center space-x-3">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Update</button>
            <a href="{{ route('pemesanans.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Kembali</a>
        </div>
    </form>
</div>

<script>
    const armadaSelect = document.querySelector('select[name="armada_id"]');
    const jenisInput = document.getElementById('jenis_kendaraan');

    armadaSelect.addEventListener('change', function() {
        const selectedOption = this.options[this.selectedIndex];
        jenisInput.value = selectedOption.dataset.jenis || '';
    });

    window.addEventListener('DOMContentLoaded', () => {
        const selectedOption = armadaSelect.options[armadaSelect.selectedIndex];
        jenisInput.value = selectedOption.dataset.jenis || '';
    });
</script>
@endsection