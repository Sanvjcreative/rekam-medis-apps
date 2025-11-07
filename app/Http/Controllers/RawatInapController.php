<?php

namespace App\Http\Controllers;

use App\Models\RawatInap;
use Illuminate\Http\Request;

class RawatInapController extends Controller
{
    public function index()
    {
        $items = RawatInap::latest()->paginate(10);
        return view('rawat-inap.index', compact('items'));
    }

    public function create()
    {
        return view('rawat-inap.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'no_rm' => 'required|string|max:20',
            'nama_pasien' => 'required|string|max:255',
            'tanggal_masuk' => 'required|date',
            'kamar' => 'required|string|max:50',
            'kelas' => 'required|string|max:50',
            'diagnosa' => 'nullable|string',
        ]);

        RawatInap::create($validated);

        return redirect()->route('rawat-inap.index')
            ->with('success', 'Data rawat inap berhasil ditambahkan.');
    }

    public function show($id)
    {
        $item = RawatInap::findOrFail($id);
        return view('rawat-inap.show', compact('item'));
    }

    public function edit($id)
    {
        $item = RawatInap::findOrFail($id);
        return view('rawat-inap.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'no_rm' => 'required|string|max:20',
            'nama_pasien' => 'required|string|max:255',
            'tanggal_masuk' => 'required|date',
            'kamar' => 'required|string|max:50',
            'kelas' => 'required|string|max:50',
            'diagnosa' => 'nullable|string',
        ]);

        $item = RawatInap::findOrFail($id);
        $item->update($validated);

        return redirect()->route('rawat-inap.index')
            ->with('success', 'Data rawat inap berhasil diupdate.');
    }

    public function destroy($id)
    {
        $item = RawatInap::findOrFail($id);
        $item->delete();
        
        return redirect()->route('rawat-inap.index')
            ->with('success', 'Data rawat inap berhasil dihapus.');
    }
}
