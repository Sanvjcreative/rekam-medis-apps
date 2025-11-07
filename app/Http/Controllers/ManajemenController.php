<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Poli;
use App\Models\Petugas;
use App\Models\Pasien;
use App\Models\Obat;
use App\Models\RekamMedis;

class ManajemenController extends Controller
{
    public function index()
    {
        return view('manajemen.index');
    }
    
    public function petugas()
    {
        $items = Petugas::orderBy('id', 'desc')->get();
        return view('manajemen.petugas', compact('items'));
    }
    
    public function petugasCreate()
    {
        return view('manajemen.petugas-create');
    }
    
    public function petugasStore(Request $request)
    {
        $validated = $request->validate([
            'nip' => 'required|string|max:50',
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'jabatan' => 'required|string|max:100',
            'poli' => 'nullable|string|max:100',
            'no_hp' => 'nullable|string|max:20',
            'alamat' => 'nullable|string',
        ]);

        Petugas::create([
            'nip' => $validated['nip'],
            'nama' => $validated['nama'],
            'email' => $validated['email'],
            'jabatan' => $validated['jabatan'],
            'poli' => $validated['poli'] ?? null,
            'no_hp' => $validated['no_hp'] ?? null,
            'alamat' => $validated['alamat'] ?? null,
            'status' => 'Aktif',
        ]);

        return redirect()->route('manajemen.petugas')
            ->with('success', 'Data petugas berhasil ditambahkan.');
    }

    public function petugasShow($id)
    {
        $item = Petugas::findOrFail((int)$id);
        return view('manajemen.petugas-show', compact('item'));
    }

    public function petugasEdit($id)
    {
        $item = Petugas::findOrFail((int)$id);
        return view('manajemen.petugas-edit', compact('item'));
    }

    public function petugasUpdate(Request $request, $id)
    {
        $validated = $request->validate([
            'nip' => 'required|string|max:50',
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'jabatan' => 'required|string|max:100',
            'poli' => 'nullable|string|max:100',
            'no_hp' => 'nullable|string|max:20',
            'alamat' => 'nullable|string',
        ]);

        $item = Petugas::findOrFail((int)$id);
        $item->update([
            'nip' => $validated['nip'],
            'nama' => $validated['nama'],
            'email' => $validated['email'],
            'jabatan' => $validated['jabatan'],
            'poli' => $validated['poli'] ?? null,
            'no_hp' => $validated['no_hp'] ?? null,
            'alamat' => $validated['alamat'] ?? null,
        ]);

        return redirect()->route('manajemen.petugas')
            ->with('success', 'Data petugas berhasil diupdate.');
    }

    public function petugasDestroy($id)
    {
        $item = Petugas::findOrFail((int)$id);
        $item->delete();

        return redirect()->route('manajemen.petugas')
            ->with('success', 'Data petugas berhasil dihapus.');
    }
    
    public function poli()
    {
        // Ambil semua data poli (kecil dataset). Jika dataset besar, ganti ke pagination atau server-side DataTables.
        $items = Poli::orderBy('id', 'desc')->get();
        return view('manajemen.poli', compact('items'));
    }
    
    public function poliCreate()
    {
        return view('manajemen.poli-create');
    }
    
    public function poliStore(Request $request)
    {
        $validated = $request->validate([
            'kode_poli' => 'required|string|max:50',
            'nama_poli' => 'required|string|max:255',
            'dokter' => 'nullable|string|max:255',
            'kapasitas' => 'nullable|numeric',
        ]);
        Poli::create([
            'kode_poli' => $validated['kode_poli'],
            'nama_poli' => $validated['nama_poli'],
            'dokter' => $validated['dokter'] ?? null,
            'kapasitas' => $validated['kapasitas'] ?? null,
            'status' => 'Aktif',
        ]);

        return redirect()->route('manajemen.poli')
            ->with('success', 'Data poli berhasil ditambahkan.');
    }

    public function poliShow($id)
    {
        $item = Poli::findOrFail((int)$id);
        return view('manajemen.poli-show', compact('item'));
    }

    public function poliEdit($id)
    {
        $item = Poli::findOrFail((int)$id);
        return view('manajemen.poli-edit', compact('item'));
    }

    public function poliUpdate(Request $request, $id)
    {
        $validated = $request->validate([
            'kode_poli' => 'required|string|max:50',
            'nama_poli' => 'required|string|max:255',
            'dokter' => 'nullable|string|max:255',
            'kapasitas' => 'nullable|numeric',
        ]);
        $item = Poli::findOrFail((int)$id);
        $item->update([
            'kode_poli' => $validated['kode_poli'],
            'nama_poli' => $validated['nama_poli'],
            'dokter' => $validated['dokter'] ?? null,
            'kapasitas' => $validated['kapasitas'] ?? null,
        ]);

        return redirect()->route('manajemen.poli')
            ->with('success', 'Data poli berhasil diupdate.');
    }

    public function poliDestroy($id)
    {
        $item = Poli::findOrFail((int)$id);
        $item->delete();

        return redirect()->route('manajemen.poli')
            ->with('success', 'Data poli berhasil dihapus.');
    }
    
    public function obat()
    {
        $items = Obat::orderBy('id', 'desc')->get();
        return view('manajemen.obat', compact('items'));
    }
    
    public function obatCreate()
    {
        return view('manajemen.obat-create');
    }
    
    public function obatStore(Request $request)
    {
        $validated = $request->validate([
            'kode_obat' => 'required|string|max:50',
            'nama_obat' => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
            'stok' => 'required|numeric',
            'satuan' => 'required|string|max:50',
            'harga' => 'required|numeric',
            'expired' => 'nullable|date',
        ]);

        Obat::create([
            'kode_obat' => $validated['kode_obat'],
            'nama_obat' => $validated['nama_obat'],
            'kategori' => $validated['kategori'],
            'stok' => $validated['stok'],
            'satuan' => $validated['satuan'],
            'harga' => $validated['harga'],
            'expired' => $validated['expired'] ?? null,
            'status' => 'Tersedia',
        ]);

        return redirect()->route('manajemen.obat')
            ->with('success', 'Data obat berhasil ditambahkan.');
    }

    public function obatShow($id)
    {
        $item = Obat::findOrFail((int)$id);
        return view('manajemen.obat-show', compact('item'));
    }

    public function obatEdit($id)
    {
        $item = Obat::findOrFail((int)$id);
        return view('manajemen.obat-edit', compact('item'));
    }

    public function obatUpdate(Request $request, $id)
    {
        $validated = $request->validate([
            'kode_obat' => 'required|string|max:50',
            'nama_obat' => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
            'stok' => 'required|numeric',
            'satuan' => 'required|string|max:50',
            'harga' => 'required|numeric',
            'expired' => 'nullable|date',
        ]);

        $item = Obat::findOrFail((int)$id);
        $item->update([
            'kode_obat' => $validated['kode_obat'],
            'nama_obat' => $validated['nama_obat'],
            'kategori' => $validated['kategori'],
            'stok' => $validated['stok'],
            'satuan' => $validated['satuan'],
            'harga' => $validated['harga'],
            'expired' => $validated['expired'] ?? null,
        ]);

        return redirect()->route('manajemen.obat')
            ->with('success', 'Data obat berhasil diupdate.');
    }

    public function obatDestroy($id)
    {
        $item = Obat::findOrFail((int)$id);
        $item->delete();

        return redirect()->route('manajemen.obat')
            ->with('success', 'Data obat berhasil dihapus.');
    }
    
    public function pasien()
    {
        $items = Pasien::orderBy('id', 'desc')->get();
        return view('manajemen.pasien', compact('items'));
    }
    
    public function pasienCreate()
    {
        return view('manajemen.pasien-create');
    }
    
    public function pasienStore(Request $request)
    {
        $validated = $request->validate([
            'no_rm' => 'required|string|max:20',
            'nik' => 'required|string|max:20',
            'nama' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|string|in:Laki-laki,Perempuan',
            'alamat' => 'nullable|string',
            'no_hp' => 'nullable|string|max:20',
        ]);

        Pasien::create([
            'no_rm' => $validated['no_rm'],
            'nik' => $validated['nik'],
            'nama' => $validated['nama'],
            'tanggal_lahir' => $validated['tanggal_lahir'],
            'jenis_kelamin' => $validated['jenis_kelamin'],
            'alamat' => $validated['alamat'] ?? null,
            'no_hp' => $validated['no_hp'] ?? null,
            'status' => 'Aktif',
        ]);

        return redirect()->route('manajemen.pasien')
            ->with('success', 'Data pasien berhasil ditambahkan.');
    }

    public function pasienShow($id)
    {
        $item = Pasien::findOrFail((int)$id);
        return view('manajemen.pasien-show', compact('item'));
    }

    public function pasienEdit($id)
    {
        $item = Pasien::findOrFail((int)$id);
        return view('manajemen.pasien-edit', compact('item'));
    }

    public function pasienUpdate(Request $request, $id)
    {
        $validated = $request->validate([
            'no_rm' => 'required|string|max:20',
            'nik' => 'required|string|max:20',
            'nama' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|string|in:Laki-laki,Perempuan',
            'alamat' => 'nullable|string',
            'no_hp' => 'nullable|string|max:20',
        ]);

        $item = Pasien::findOrFail((int)$id);
        $item->update([
            'no_rm' => $validated['no_rm'],
            'nik' => $validated['nik'],
            'nama' => $validated['nama'],
            'tanggal_lahir' => $validated['tanggal_lahir'],
            'jenis_kelamin' => $validated['jenis_kelamin'],
            'alamat' => $validated['alamat'] ?? null,
            'no_hp' => $validated['no_hp'] ?? null,
        ]);

        return redirect()->route('manajemen.pasien')
            ->with('success', 'Data pasien berhasil diupdate.');
    }

    public function pasienDestroy($id)
    {
        $item = Pasien::findOrFail((int)$id);
        $item->delete();

        return redirect()->route('manajemen.pasien')
            ->with('success', 'Data pasien berhasil dihapus.');
    }
    
    public function rekamMedis()
    {
        $items = RekamMedis::orderBy('id', 'desc')->get();
        return view('manajemen.rekam-medis', compact('items'));
    }
    
    public function laporan()
    {
        return view('manajemen.laporan');
    }
}
