<?php

namespace App\Http\Controllers;

use App\Models\Storage;
use Illuminate\Http\Request;

class StorageController extends Controller
{
    public function index()
    {
        $items = Storage::latest()->paginate(10);
        return view('storage.index', compact('items'));
    }

    public function create()
    {
        return view('storage.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_barang' => 'required|string|max:50',
            'nama_barang' => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
            'stok' => 'required|numeric',
            'satuan' => 'required|string|max:50',
            'harga' => 'required|numeric',
        ]);

        Storage::create($validated);

        return redirect()->route('storage.index')
            ->with('success', 'Data storage berhasil ditambahkan.');
    }

    public function show($id)
    {
        $item = Storage::findOrFail($id);
        return view('storage.show', compact('item'));
    }

    public function edit($id)
    {
        $item = Storage::findOrFail($id);
        return view('storage.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kode_barang' => 'required|string|max:50',
            'nama_barang' => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
            'stok' => 'required|numeric',
            'satuan' => 'required|string|max:50',
            'harga' => 'required|numeric',
        ]);

        $item = Storage::findOrFail($id);
        $item->update($validated);

        return redirect()->route('storage.index')
            ->with('success', 'Data storage berhasil diupdate.');
    }

    public function destroy($id)
    {
        $item = Storage::findOrFail($id);
        $item->delete();

        return redirect()->route('storage.index')
            ->with('success', 'Data storage berhasil dihapus.');
    }
}
