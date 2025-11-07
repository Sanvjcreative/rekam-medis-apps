<?php

namespace App\Http\Controllers;

use App\Models\Gizi;
use Illuminate\Http\Request;

class GiziController extends Controller
{
    public function index()
    {
        $items = Gizi::latest()->paginate(10);
        return view('gizi.index', compact('items'));
    }

    public function create()
    {
        return view('gizi.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'no_rm' => 'required|string|max:20',
            'nama_pasien' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'jenis_diet' => 'required|string|max:255',
            'kalori' => 'required|numeric',
        ]);

        Gizi::create($validated);

        return redirect()->route('gizi.index')
            ->with('success', 'Diet gizi berhasil ditambahkan.');
    }

    public function show($id)
    {
        $item = Gizi::findOrFail($id);
        return view('gizi.show', compact('item'));
    }

    public function edit($id)
    {
        $item = Gizi::findOrFail($id);
        return view('gizi.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'no_rm' => 'required|string|max:20',
            'nama_pasien' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'jenis_diet' => 'required|string|max:255',
            'kalori' => 'required|numeric',
        ]);

        $item = Gizi::findOrFail($id);
        $item->update($validated);

        return redirect()->route('gizi.index')
            ->with('success', 'Diet gizi berhasil diupdate.');
    }

    public function destroy($id)
    {
        $item = Gizi::findOrFail($id);
        $item->delete();

        return redirect()->route('gizi.index')
            ->with('success', 'Diet gizi berhasil dihapus.');
    }
}
