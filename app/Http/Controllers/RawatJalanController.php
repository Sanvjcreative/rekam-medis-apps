<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RawatJalan;

class RawatJalanController extends Controller
{
    public function index()
    {
        $items = RawatJalan::orderBy('id', 'desc')->get();
        return view('rawat-jalan.index', compact('items'));
    }

    public function create()
    {
        return view('rawat-jalan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'no_rm' => 'required|string|max:20',
            'nama_pasien' => 'required|string|max:255',
            'tanggal_kunjungan' => 'required|date',
            'poli' => 'required|string|max:100',
            'dokter' => 'required|string|max:255',
            'diagnosa' => 'nullable|string',
            'keluhan' => 'nullable|string',
        ]);

        RawatJalan::create([
            'no_rm' => $validated['no_rm'],
            'nama_pasien' => $validated['nama_pasien'],
            'tanggal_kunjungan' => $validated['tanggal_kunjungan'],
            'poli' => $validated['poli'],
            'dokter' => $validated['dokter'],
            'diagnosa' => $validated['diagnosa'] ?? null,
            'status' => 'Selesai',
        ]);

        return redirect()->route('rawat-jalan.index')
            ->with('success', 'Data rawat jalan berhasil ditambahkan.');
    }

    public function show($id)
    {
        $item = RawatJalan::findOrFail((int)$id);
        return view('rawat-jalan.show', compact('item'));
    }

    public function edit($id)
    {
        $item = RawatJalan::findOrFail((int)$id);
        return view('rawat-jalan.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'no_rm' => 'required|string|max:20',
            'nama_pasien' => 'required|string|max:255',
            'tanggal_kunjungan' => 'required|date',
            'poli' => 'required|string|max:100',
            'dokter' => 'required|string|max:255',
            'diagnosa' => 'nullable|string',
            'keluhan' => 'nullable|string',
        ]);

        $item = RawatJalan::findOrFail((int)$id);
        $item->update([
            'no_rm' => $validated['no_rm'],
            'nama_pasien' => $validated['nama_pasien'],
            'tanggal_kunjungan' => $validated['tanggal_kunjungan'],
            'poli' => $validated['poli'],
            'dokter' => $validated['dokter'],
            'diagnosa' => $validated['diagnosa'] ?? null,
        ]);

        return redirect()->route('rawat-jalan.index')
            ->with('success', 'Data rawat jalan berhasil diupdate.');
    }

    public function destroy($id)
    {
        $item = RawatJalan::findOrFail((int)$id);
        $item->delete();

        return redirect()->route('rawat-jalan.index')
            ->with('success', 'Data rawat jalan berhasil dihapus.');
    }
}
