<?php

namespace App\Http\Controllers;

use App\Models\IGD;
use Illuminate\Http\Request;

class IGDController extends Controller
{
    public function index()
    {
        $items = IGD::latest()->paginate(10);
        return view('igd.index', compact('items'));
    }

    public function create()
    {
        return view('igd.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'no_rm' => 'required|string|max:20',
            'nama_pasien' => 'required|string|max:255',
            'tanggal_masuk' => 'required|date',
            'jam_masuk' => 'required|string',
            'diagnosa' => 'required|string|max:255',
            'triage' => 'required|string|in:Merah,Kuning,Hijau',
            'keluhan' => 'nullable|string',
        ]);

        IGD::create($validated);

        return redirect()->route('igd.index')
            ->with('success', 'Data IGD berhasil ditambahkan.');
    }

    public function show($id)
    {
        $item = IGD::findOrFail($id);
        return view('igd.show', compact('item'));
    }

    public function edit($id)
    {
        $item = IGD::findOrFail($id);
        return view('igd.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'no_rm' => 'required|string|max:20',
            'nama_pasien' => 'required|string|max:255',
            'tanggal_masuk' => 'required|date',
            'jam_masuk' => 'required|string',
            'diagnosa' => 'required|string|max:255',
            'triage' => 'required|string|in:Merah,Kuning,Hijau',
            'keluhan' => 'nullable|string',
        ]);

        $item = IGD::findOrFail($id);
        $item->update($validated);

        return redirect()->route('igd.index')
            ->with('success', 'Data IGD berhasil diupdate.');
    }

    public function destroy($id)
    {
        $item = IGD::findOrFail($id);
        $item->delete();

        return redirect()->route('igd.index')
            ->with('success', 'Data IGD berhasil dihapus.');
    }
}
