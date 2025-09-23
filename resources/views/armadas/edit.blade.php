@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-6">Edit Armada</h1>

<form action="{{ route('armadas.update', $armada) }}" method="POST" class="bg-white p-6 shadow rounded-lg space-y-4">
    @csrf
    @method('PUT')

    <div>
        <label class="block font-semibold">No Armada</label>
        <input type="text" name="no_armada" value="{{ $armada->no_armada }}" class="w-full border rounded px-3 py-2" required>
    </div>

    <div>
        <label class="block font-semibold">Jenis</label>
        <input type="text" name="jenis" value="{{ $armada->jenis }}" class="w-full border rounded px-3 py-2" required>
    </div>

    <div>
        <label class="block font-semibold">Kapasitas (kg)</label>
        <input type="number" name="kapasitas_kg" value="{{ $armada->kapasitas_kg }}" class="w-full border rounded px-3 py-2" required>
    </div>

    <div>
        <label class="block font-semibold">Tersedia?</label>
        <select name="tersedia" class="w-full border rounded px-3 py-2">
            <option value="1" {{ $armada->tersedia ? 'selected' : '' }}>Ya</option>
            <option value="0" {{ !$armada->tersedia ? 'selected' : '' }}>Tidak</option>
        </select>
    </div>

    <div class="flex items-center space-x-3">
        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Update</button>
        <a href="{{ route('armadas.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
            Kembali
        </a>
    </div>
</form>
@endsection