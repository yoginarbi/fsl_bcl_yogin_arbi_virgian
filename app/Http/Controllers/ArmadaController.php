<?php

namespace App\Http\Controllers;

use App\Models\Armada;
use Illuminate\Http\Request;

class ArmadaController extends Controller
{
    public function index()
    {
        $armadas = Armada::with(['pemesanans', 'pengirimans', 'checkins'])
            ->paginate(10);

        return view('armadas.index', compact('armadas'));
    }

    public function create()
    {
        return view('armadas.create');
    }

    /**
     * Simpan data armada baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'no_armada'    => 'required|string|unique:armadas,no_armada',
            'jenis'        => 'required|string',
            'kapasitas_kg' => 'required|integer|min:0',
            'tersedia'     => 'boolean',
        ]);

        $armada = Armada::create($validated);

        return redirect()->route('armadas.index')
            ->with('success', 'Armada berhasil ditambahkan.');
    }

    public function show(Armada $armada)
    {
        return view('armadas.show', compact('armada'));
    }

    public function update(Request $request, Armada $armada)
    {
        $validated = $request->validate([
            'no_armada'    => 'sometimes|required|string|unique:armadas,no_armada,' . $armada->id,
            'jenis'        => 'sometimes|required|string',
            'kapasitas_kg' => 'sometimes|required|integer|min:0',
            'tersedia'     => 'boolean',
        ]);

        $armada->update($validated);

        return redirect()->route('armadas.index')
            ->with('success', 'Armada berhasil diperbarui.');
    }

    public function destroy(Armada $armada)
    {
        $armada->delete();

        return redirect()->route('armadas.index')
            ->with('success', 'Armada berhasil dihapus.');
    }
}
