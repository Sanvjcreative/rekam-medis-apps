<?php

namespace App\Http\Controllers;

use App\Models\Apotik;
use Illuminate\Http\Request;

class ApotikController extends Controller
{
    public function index()
    {
        $items = Apotik::latest()->paginate(10);
        return view('apotik.index', compact('items'));
    }

    public function create()
    {
        return view('apotik.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'no_rm' => 'required|string|max:20',
            'nama_pasien' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'obat' => 'required|string|max:255',
            'jumlah' => 'required|string|max:100',
        ]);

        Apotik::create($validated);

        return redirect()->route('apotik.index')
            ->with('success', 'Resep apotik berhasil ditambahkan.');
    }

    public function show($id)
    {
        $item = Apotik::findOrFail($id);
        return view('apotik.show', compact('item'));
    }

    public function edit($id)
    {
        $item = Apotik::findOrFail($id);
        return view('apotik.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'no_rm' => 'required|string|max:20',
            'nama_pasien' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'obat' => 'required|string|max:255',
            'jumlah' => 'required|string|max:100',
        ]);

        $item = Apotik::findOrFail($id);
        $item->update($validated);

        return redirect()->route('apotik.index')
            ->with('success', 'Resep apotik berhasil diupdate.');
    }

    public function destroy($id)
    {
        $item = Apotik::findOrFail($id);
        $item->delete();

        return redirect()->route('apotik.index')
            ->with('success', 'Resep apotik berhasil dihapus.');
    }
}
