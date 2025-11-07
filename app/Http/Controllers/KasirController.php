<?php

namespace App\Http\Controllers;

use App\Models\Kasir;
use Illuminate\Http\Request;

class KasirController extends Controller
{
    public function index()
    {
        $items = Kasir::latest()->paginate(10);
        return view('kasir.index', compact('items'));
    }

    public function create()
    {
        return view('kasir.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'no_rm' => 'required|string|max:20',
            'nama_pasien' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'total_tagihan' => 'required|numeric',
            'bayar' => 'required|numeric',
        ]);

        Kasir::create($validated);

        return redirect()->route('kasir.index')
            ->with('success', 'Transaksi kasir berhasil ditambahkan.');
    }

    public function show($id)
    {
        $item = Kasir::findOrFail($id);
        return view('kasir.show', compact('item'));
    }

    public function edit($id)
    {
        $item = Kasir::findOrFail($id);
        return view('kasir.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'no_rm' => 'required|string|max:20',
            'nama_pasien' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'total_tagihan' => 'required|numeric',
            'bayar' => 'required|numeric',
        ]);

        $item = Kasir::findOrFail($id);
        $item->update($validated);

        return redirect()->route('kasir.index')
            ->with('success', 'Transaksi kasir berhasil diupdate.');
    }

    public function destroy($id)
    {
        $item = Kasir::findOrFail($id);
        $item->delete();

        return redirect()->route('kasir.index')
            ->with('success', 'Transaksi kasir berhasil dihapus.');
    }
}
