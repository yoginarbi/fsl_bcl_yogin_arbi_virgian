@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">{{ isset($pemesan) ? 'Edit' : 'Tambah' }} Pemesanan</h1>

    @if($errors->any())
    <div class="bg-red-200 text-red-800 px-4 py-2 rounded mb-4">
        <ul class="list-disc list-inside">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ isset($pemesan) ? route('pemesanans.update', $pemesan->id) : route('pemesanans.store') }}" method="POST" class="space-y-4">
        @csrf
        @if(isset($pemesan))
        @method('PUT')
        @endif

        <div>
            <label class="block mb-1">Nama Pelanggan</label>
            <input type="text" name="nama_pelanggan" value="{{ old('nama_pelanggan', $pemesan->nama_pelanggan ?? '') }}" class="border px-3 py-2 w-full rounded">
        </div>

        <div>
            <label class="block mb-1">Armada</label>
            <select name="armada_id" class="border px-3 py-2 w-full rounded">
                <option value="">-- Pilih Armada --</option>
                @foreach($armadas as $armada)
                <option value="{{ $armada->id }}" data-jenis="{{ $armada->jenis }}" {{ (old('armada_id', $pemesan->armada_id ?? '') == $armada->id) ? 'selected' : '' }}>
                    {{ $armada->no_armada }}
                </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block mb-1">Jenis Kendaraan</label>
            <input type="text" id="jenis_kendaraan" name="jenis_kendaraan" value="{{ old('jenis_kendaraan', $pemesan->jenis_kendaraan ?? '') }}" class="border px-3 py-2 w-full rounded" readonly>
        </div>

        <div>
            <label class="block mb-1">Tanggal Pemesanan</label>
            <input type="date" name="tgl_pemesanan" value="{{ old('tgl_pemesanan', isset($pemesan) ? $pemesan->tgl_pemesanan->format('Y-m-d') : '') }}" class="border px-3 py-2 w-full rounded">
        </div>

        <div>
            <label class="block mb-1">Detail Barang (JSON Array)</label>
            <textarea name="detail_barang" class="border px-3 py-2 w-full rounded" rows="4">{{ old('detail_barang', $pemesan->detail_barang ?? '') }}</textarea>
        </div>

        <div>
            <label class="block mb-1">Status</label>
            <select name="status" class="border px-3 py-2 w-full rounded">
                <option value="pending" {{ old('status', $pemesan->status ?? '') == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="proses" {{ old('status', $pemesan->status ?? '') == 'proses' ? 'selected' : '' }}>Proses</option>
                <option value="sukses" {{ old('status', $pemesan->status ?? '') == 'sukses' ? 'selected' : '' }}>Sukses</option>
            </select>
        </div>

        <div class="flex items-center space-x-3">
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                {{ isset($pemesan) ? 'Update' : 'Simpan' }}
            </button>
            <a href="{{ route('pemesanans.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                Kembali
            </a>
        </div>
    </form>
</div>
<script>
    // Ambil elemen select armada dan input jenis kendaraan
        const armadaSelect = document.querySelector('select[name="armada_id"]');
        const jenisInput = document.getElementById('jenis_kendaraan');
    
        // Event ketika armada berubah
        armadaSelect.addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            jenisInput.value = selectedOption.dataset.jenis || '';
        });
    
        // Jika edit, isi otomatis saat page load
        window.addEventListener('DOMContentLoaded', () => {
            const selectedOption = armadaSelect.options[armadaSelect.selectedIndex];
            jenisInput.value = selectedOption.dataset.jenis || '';
        });
</script>
@endsection