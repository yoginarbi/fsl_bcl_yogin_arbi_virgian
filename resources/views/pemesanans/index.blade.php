@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Daftar Pemesanan</h1>

    <a href="{{ route('pemesanans.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 mb-4 inline-block">Tambah Pemesanan</a>

    @if(session('success'))
    <div class="bg-green-200 text-green-800 px-4 py-2 rounded mb-4">
        {{ session('success') }}
    </div>
    @endif

    <table class="min-w-full bg-white border border-gray-200">
        <thead class="bg-gray-100">
            <tr>
                <th class="border px-4 py-2">Nama Pelanggan</th>
                <th class="border px-4 py-2">Armada</th>
                <th class="border px-4 py-2">Jenis Kendaraan</th>
                <th class="border px-4 py-2">Tanggal Pemesanan</th>
                <th class="border px-4 py-2">Status</th>
                <th class="border px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pemesanans as $pemesan)
            <tr>
                <td class="border px-4 py-2">{{ $pemesan->nama_pelanggan }}</td>
                <td class="border px-4 py-2">{{ $pemesan->armada->no_armada ?? '-' }}</td>
                <td class="border px-4 py-2">{{ $pemesan->jenis_kendaraan }}</td>
                <td class="border px-4 py-2">{{ $pemesan->tgl_pemesanan->format('d-m-Y') }}</td>
                <td class="border px-4 py-2 capitalize">{{ $pemesan->status }}</td>
                <td class="border px-4 py-2">
                    <a href="{{ route('pemesanans.edit', $pemesan->id) }}" class="text-blue-500 hover:underline">Edit</a>
                    <form action="{{ route('pemesanans.destroy', $pemesan->id) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:underline ml-2" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection