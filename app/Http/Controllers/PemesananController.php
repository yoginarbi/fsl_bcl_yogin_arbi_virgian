<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Models\Armada;
use Illuminate\Http\Request;

class PemesananController extends Controller
{
    // Menampilkan semua pemesanan
    public function index()
    {
        $pemesanans = Pemesanan::with('armada')->latest()->get();
        return view('pemesanans.index', compact('pemesanans'));
    }

    // Form tambah pemesanan
    public function create()
    {
        $armadas = Armada::all();
        return view('pemesanans.create', compact('armadas'));
    }

    // Simpan pemesanan baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_pelanggan' => 'required|string|max:255',
            'armada_id' => 'required|exists:armadas,id',
            'jenis_kendaraan' => 'required|string|max:255',
            'tgl_pemesanan' => 'required|date',
            'detail_barang' => 'required|string',
            'status' => 'required|string|in:pending,proses,sukses',
        ]);

        // Konversi string menjadi JSON (misal, setiap baris menjadi array)
        $detailArray = array_map('trim', explode("\n", $validated['detail_barang']));
        $validated['detail_barang'] = json_encode($detailArray);

        Pemesanan::create($validated);

        return redirect()->route('pemesanans.index')->with('success', 'Pemesanan berhasil dibuat!');
    }

    // Form edit pemesanan
    public function edit(Pemesanan $pemesanan)
    {
        $armadas = Armada::all();
        return view('pemesanans.edit', compact('pemesanan', 'armadas'));
    }

    // Update pemesanan
    public function update(Request $request, Pemesanan $pemesanan)
    {
        $validated = $request->validate([
            'nama_pelanggan' => 'required|string|max:255',
            'armada_id' => 'required|exists:armadas,id',
            'jenis_kendaraan' => 'required|string|max:255',
            'tgl_pemesanan' => 'required|date',
            'detail_barang' => 'required|string',
            'status' => 'required|string|in:pending,proses,sukses',
        ]);

        // Konversi string menjadi JSON (misal, setiap baris menjadi array)
        $detailArray = array_map('trim', explode("\n", $validated['detail_barang']));
        $validated['detail_barang'] = json_encode($detailArray);

        $pemesanan->update($validated);

        return redirect()->route('pemesanans.index')->with('success', 'Pemesanan berhasil diperbarui!');
    }

    // Hapus pemesanan
    public function destroy(Pemesanan $pemesanan)
    {
        $pemesanan->delete();
        return redirect()->route('pemesanans.index')->with('success', 'Pemesanan berhasil dihapus!');
    }
}
