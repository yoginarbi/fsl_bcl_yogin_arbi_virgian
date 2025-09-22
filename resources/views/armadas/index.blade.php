@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-6">Daftar Armada</h1>

@if(session('success'))
<div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">
    {{ session('success') }}
</div>
@endif

<div class="bg-white shadow rounded-lg overflow-hidden">
    <table class="min-w-full border">
        <thead class="bg-gray-200">
            <tr>
                <th class="px-4 py-2 text-left">No Armada</th>
                <th class="px-4 py-2 text-left">Jenis</th>
                <th class="px-4 py-2 text-center">Kapasitas (kg)</th>
                <th class="px-4 py-2 text-center">Tersedia</th>
                <th class="px-4 py-2 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($armadas as $armada)
            <tr class="border-t hover:bg-gray-50">
                <td class="px-4 py-2">{{ $armada->no_armada }}</td>
                <td class="px-4 py-2">{{ $armada->jenis }}</td>
                <td class="px-4 py-2 text-center">{{ $armada->kapasitas_kg }}</td>
                <td class="px-4 py-2 text-center">
                    @if($armada->tersedia)
                    <span class="px-2 py-1 bg-green-100 text-green-700 rounded">Ya</span>
                    @else
                    <span class="px-2 py-1 bg-red-100 text-red-700 rounded">Tidak</span>
                    @endif
                </td>
                <td class="px-4 py-2 text-center flex justify-center space-x-2">
                    <a href="{{ route('armadas.edit', $armada) }}" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">Edit</a>
                    <form action="{{ route('armadas.destroy', $armada) }}" method="POST" onsubmit="return confirm('Yakin hapus armada ini?')">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center py-4 text-gray-500">Belum ada data armada</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-4">
    {{ $armadas->links() }}
</div>
@endsection