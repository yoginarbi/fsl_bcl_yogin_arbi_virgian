@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-6">Tambah Armada Baru</h1>

<form action="{{ route('armadas.store') }}" method="POST" class="bg-white p-6 shadow rounded-lg space-y-4">
    @csrf

    <div>
        <label class="block font-semibold">No Armada</label>
        <input type="text" name="no_armada" class="w-full border rounded px-3 py-2" required>
    </div>

    <div>
        <label class="block font-semibold">Jenis</label>
        <input type="text" name="jenis" class="w-full border rounded px-3 py-2" required>
    </div>

    <div>
        <label class="block font-semibold">Kapasitas (kg)</label>
        <input type="number" name="kapasitas_kg" class="w-full border rounded px-3 py-2" required>
    </div>

    <div>
        <label class="block font-semibold">Tersedia?</label>
        <select name="tersedia" class="w-full border rounded px-3 py-2">
            <option value="1">Ya</option>
            <option value="0">Tidak</option>
        </select>
    </div>

    <div class="flex items-center space-x-3">
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Simpan
        </button>

        <a href="{{ route('armadas.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
            Kembali
        </a>
    </div>
</form>
@endsection