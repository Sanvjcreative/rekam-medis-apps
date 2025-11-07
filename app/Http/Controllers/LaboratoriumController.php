<?php

namespace App\Http\Controllers;

use App\Models\Laboratorium;
use Illuminate\Http\Request;

class LaboratoriumController extends Controller
{
    public function index()
    {
        $items = Laboratorium::latest()->paginate(10);
        return view('laboratorium.index', compact('items'));
    }

    public function create()
    {
        return view('laboratorium.create');
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

        Laboratorium::create($validated);

        return redirect()->route('laboratorium.index')
            ->with('success', 'Pemeriksaan laboratorium berhasil ditambahkan.');
    }

    public function show($id)
    {
        $item = Laboratorium::findOrFail($id);
        return view('laboratorium.show', compact('item'));
    }

    public function edit($id)
    {
        $item = Laboratorium::findOrFail($id);
        return view('laboratorium.edit', compact('item'));
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

        $item = Laboratorium::findOrFail($id);
        $item->update($validated);

        return redirect()->route('laboratorium.index')
            ->with('success', 'Pemeriksaan laboratorium berhasil diupdate.');
    }

    public function destroy($id)
    {
        $item = Laboratorium::findOrFail($id);
        $item->delete();

        return redirect()->route('laboratorium.index')
            ->with('success', 'Pemeriksaan laboratorium berhasil dihapus.');
    }
}
