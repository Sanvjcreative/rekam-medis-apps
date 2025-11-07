<?php

namespace App\Http\Controllers;

use App\Models\Radiologi;
use Illuminate\Http\Request;

class RadiologiController extends Controller
{
    public function index()
    {
        $items = Radiologi::latest()->paginate(10);
        return view('radiologi.index', compact('items'));
    }

    public function create()
    {
        return view('radiologi.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'no_rm' => 'required|string|max:20',
            'nama_pasien' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'jenis_pemeriksaan' => 'required|string|max:255',
            'hasil' => 'nullable|string',
        ]);

        Radiologi::create($validated);

        return redirect()->route('radiologi.index')
            ->with('success', 'Pemeriksaan radiologi berhasil ditambahkan.');
    }

    public function show($id)
    {
        $item = Radiologi::findOrFail($id);
        return view('radiologi.show', compact('item'));
    }

    public function edit($id)
    {
        $item = Radiologi::findOrFail($id);
        return view('radiologi.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'no_rm' => 'required|string|max:20',
            'nama_pasien' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'jenis_pemeriksaan' => 'required|string|max:255',
            'hasil' => 'nullable|string',
        ]);

        $item = Radiologi::findOrFail($id);
        $item->update($validated);

        return redirect()->route('radiologi.index')
            ->with('success', 'Pemeriksaan radiologi berhasil diupdate.');
    }

    public function destroy($id)
    {
        $item = Radiologi::findOrFail($id);
        $item->delete();

        return redirect()->route('radiologi.index')
            ->with('success', 'Pemeriksaan radiologi berhasil dihapus.');
    }
}
