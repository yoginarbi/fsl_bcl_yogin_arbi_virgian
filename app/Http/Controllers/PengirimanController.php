<?php

namespace App\Http\Controllers;

use App\Models\Armada;
use App\Models\Pemesanan;
use App\Models\Pengiriman;
use Illuminate\Http\Request;

class PengirimanController extends Controller
{
    // Tampilkan semua pengiriman
    public function index()
    {
        $pengirimans = Pengiriman::with('armada')->latest()->get();
        return view('pengirimans.index', compact('pengirimans'));
    }

    // Tampilkan form tambah pengiriman
    public function create()
    {
        $pemesanans = Pemesanan::with('armada')->get(); // ambil data pesanan
        return view('pengirimans.create', compact('pemesanans'));
    }

    // Simpan pengiriman baru
    public function store(Request $request)
    {
        $request->validate([
            'pemesanan_id' => 'required|exists:pemesanans,id',
            'tgl_kirim' => 'required|date',
            'lokasi_asal' => 'required|string',
            'lokasi_tujuan' => 'required|string',
            'status' => 'required|string',
        ]);

        $pemesanan = Pemesanan::findOrFail($request->pemesanan_id);

        Pengiriman::create([
            'no_pengiriman' => $request->no_pengiriman,
            'pemesanan_id' => $pemesanan->id,
            'nama_pelanggan' => $pemesanan->nama_pelanggan,
            'tgl_kirim' => $request->tgl_kirim,
            'lokasi_asal' => $request->lokasi_asal,
            'lokasi_tujuan' => $request->lokasi_tujuan,
            'status' => $request->status,
            'detail_barang' => $pemesanan->detail_barang,
            'armada_id' => $pemesanan->armada_id,
        ]);

        return redirect()->route('pengirimans.index')->with('success', 'Pengiriman berhasil ditambahkan.');
    }

    // Tampilkan detail pengiriman
    public function show(Pengiriman $pengiriman)
    {
        return view('pengirimans.show', compact('pengiriman'));
    }

    public function edit(Pengiriman $pengiriman)
    {
        $armadas = Armada::all();
        return view('pengirimans.edit', compact('pengiriman', 'armadas'));
    }

    // Update pengiriman
    public function update(Request $request, Pengiriman $pengiriman)
    {
        $request->validate([
            'no_pengiriman' => 'required|unique:pengirimans,no_pengiriman,' . $pengiriman->id,
            'tgl_kirim' => 'required|date',
            'lokasi_asal' => 'required|string',
            'lokasi_tujuan' => 'required|string',
            'status' => 'required|string',
            'detail_barang' => 'required|string',
            'armada_id' => 'required|exists:armadas,id',
        ]);

        $pengiriman->update($request->all());

        return redirect()->route('pengirimans.index')->with('success', 'Pengiriman berhasil diupdate.');
    }

    // Hapus pengiriman
    public function destroy(Pengiriman $pengiriman)
    {
        $pengiriman->delete();
        return redirect()->route('pengirimans.index')->with('success', 'Pengiriman berhasil dihapus.');
    }
}
