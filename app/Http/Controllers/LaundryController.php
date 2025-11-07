<?php

namespace App\Http\Controllers;

use App\Models\Laundry;
use Illuminate\Http\Request;

class LaundryController extends Controller
{
    public function index()
    {
        $items = Laundry::latest()->paginate(10);
        return view('laundry.index', compact('items'));
    }

    public function create()
    {
        return view('laundry.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kamar' => 'required|string|max:50',
            'jenis' => 'required|string|max:255',
            'tanggal_masuk' => 'required|date',
            'jumlah' => 'required|integer',
            'petugas' => 'required|string|max:100',
            'catatan' => 'nullable|string',
            'status' => 'required|in:Cuci,Kering,Selesai'
        ]);

        $validated['kode_laundry'] = 'LDY' . date('Ymd') . str_pad(Laundry::count() + 1, 4, '0', STR_PAD_LEFT);
        Laundry::create($validated);

        return redirect()->route('laundry.index')
            ->with('success', 'Data laundry berhasil ditambahkan.');
    }

    public function show($id)
    {
        $item = Laundry::findOrFail($id);
        return view('laundry.show', compact('item'));
    }

    public function edit($id)
    {
        $item = Laundry::findOrFail($id);
        return view('laundry.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kamar' => 'required|string|max:50',
            'jenis' => 'required|string|max:255',
            'tanggal_masuk' => 'required|date',
            'tanggal_keluar' => 'nullable|date|after_or_equal:tanggal_masuk',
            'jumlah' => 'required|integer',
            'petugas' => 'required|string|max:100',
            'catatan' => 'nullable|string',
            'status' => 'required|in:Cuci,Kering,Selesai'
        ]);

        $item = Laundry::findOrFail($id);
        $item->update($validated);

        return redirect()->route('laundry.index')
            ->with('success', 'Data laundry berhasil diupdate.');
    }

    public function destroy($id)
    {
        $item = Laundry::findOrFail($id);
        $item->delete();

        return redirect()->route('laundry.index')
            ->with('success', 'Data laundry berhasil dihapus.');
    }
}
