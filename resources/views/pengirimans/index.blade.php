@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Daftar Pengiriman</h1>

    @if(session('success'))
    <div class="bg-green-100 text-green-800 p-2 rounded mb-4">
        {{ session('success') }}
    </div>
    @endif

    <a href="{{ route('pengirimans.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Tambah Pengiriman</a>

    <table class="min-w-full mt-4 bg-white border">
        <thead>
            <tr class="bg-gray-200">
                <th class="px-4 py-2 border">No</th>
                <th class="px-4 py-2 border">No Pengiriman</th>
                <th class="px-4 py-2 border">Tanggal Kirim</th>
                <th class="px-4 py-2 border">Armada</th>
                <th class="px-4 py-2 border">Status</th>
                <th class="px-4 py-2 border">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pengirimans as $item)
            <tr class="text-center border">
                <td class="px-4 py-2 border">{{ $loop->iteration }}</td>
                <td class="px-4 py-2 border">{{ $item->no_pengiriman }}</td>
                <td class="px-4 py-2 border">{{ $item->tgl_kirim->format('d-m-Y') }}</td>
                <td class="px-4 py-2 border">{{ $item->armada->nama ?? '-' }}</td>
                <td class="px-4 py-2 border">{{ $item->status }}</td>
                <td class="px-4 py-2 border">
                    <a href="{{ route('pengiriman.show', $item->id) }}" class="bg-green-500 text-white px-2 py-1 rounded hover:bg-green-600">Detail</a>
                    <a href="{{ route('pengiriman.edit', $item->id) }}" class="bg-yellow-500 text-white px-2 py-1 rounded hover:bg-yellow-600">Edit</a>

                    <form action="{{ route('pengiriman.destroy', $item->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus pengiriman ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection