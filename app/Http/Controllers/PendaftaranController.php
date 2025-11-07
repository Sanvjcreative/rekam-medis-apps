<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftaran;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PendaftaranController extends Controller
{
    public function index()
    {
        $items = Pendaftaran::latest()->paginate(25);
        return view('pendaftaran.index', compact('items'));
    }

    public function create()
    {
        return view('pendaftaran.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'no_rm' => 'required|string|max:20',
            'nama_pasien' => 'required|string|max:255',
            'tanggal_daftar' => 'required|date',
            'poli' => 'required|string|max:100',
            'dokter' => 'required|string|max:255',
            'keluhan' => 'nullable|string',
        ]);

        $validated['status'] = $request->input('status', 'Dalam Antrian');
        Pendaftaran::create($validated);
        
        if (auth()->check() && auth()->user()->hasRole('pasien')) {
            return redirect()->route('pasien.pendaftaran')
                ->with('success', 'Pendaftaran Anda telah dikirim.');
        }

        return redirect()->route('pendaftaran.index')
            ->with('success', 'Data pendaftaran berhasil ditambahkan.');
    }

    public function show($id)
    {
        $id = (int) $id;
        $item = Pendaftaran::findOrFail($id);
        return view('pendaftaran.show', compact('item', 'id'));
    }

    public function edit($id)
    {
        $id = (int) $id;
        $item = Pendaftaran::findOrFail($id);
        return view('pendaftaran.edit', compact('item', 'id'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'no_rm' => 'required|string|max:20',
            'nama_pasien' => 'required|string|max:255',
            'tanggal_daftar' => 'required|date',
            'poli' => 'required|string|max:100',
            'dokter' => 'required|string|max:255',
            'keluhan' => 'nullable|string',
            'status' => 'nullable|string',
        ]);

        $item = Pendaftaran::findOrFail((int)$id);
        $item->update($validated);
        
        return redirect()->route('pendaftaran.index')
            ->with('success', 'Data pendaftaran berhasil diupdate.');
    }

    public function destroy(Request $request, $id)
    {
        $item = Pendaftaran::findOrFail((int)$id);
        $item->delete();

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json(['success' => true]);
        }

        return redirect()->route('pendaftaran.index')
            ->with('success', 'Data pendaftaran berhasil dihapus.');
    }

    /**
     * Return JSON for DataTables server-side processing
     */
    public function data(Request $request)
    {
        $columns = [
            0 => 'id',
            1 => 'no_rm',
            2 => 'nama_pasien',
            3 => 'tanggal_daftar',
            4 => 'poli',
            5 => 'dokter',
            6 => 'status',
        ];

        $draw = intval($request->input('draw'));
        $start = intval($request->input('start'));
        $length = intval($request->input('length', 25));
        $search = $request->input('search.value');

        $query = Pendaftaran::query();

        $recordsTotal = Pendaftaran::count();

        if (!empty($search)) {
            $query->where(function($q) use ($search) {
                $q->where('no_rm', 'like', "%{$search}%")
                  ->orWhere('nama_pasien', 'like', "%{$search}%")
                  ->orWhere('poli', 'like', "%{$search}%")
                  ->orWhere('dokter', 'like', "%{$search}%")
                  ->orWhere('status', 'like', "%{$search}%");
            });
        }

        $recordsFiltered = $query->count();

        // Ordering
        if ($request->has('order')) {
            $order = $request->input('order')[0];
            $colIdx = intval($order['column']);
            $dir = $order['dir'] === 'asc' ? 'asc' : 'desc';
            $colName = $columns[$colIdx] ?? 'id';
            $query->orderBy($colName, $dir);
        } else {
            $query->orderBy('id', 'desc');
        }

        $data = $query->skip($start)->take($length)->get();

        $rows = [];
        foreach ($data as $item) {
            $statusColor = ['Selesai'=>'success','Dalam Antrian'=>'warning','Proses'=>'info'][$item->status] ?? 'secondary';

            $aksi = '';
            $aksi .= '<a href="' . route('pendaftaran.show', $item->id) . '" class="btn btn-sm btn-info" title="Detail"><i class="bi bi-eye"></i></a> ';
            $aksi .= '<a href="' . route('pendaftaran.edit', $item->id) . '" class="btn btn-sm btn-warning" title="Edit"><i class="bi bi-pencil"></i></a> ';
             // Delete button will be handled by client-side AJAX
             $deleteUrl = route('pendaftaran.destroy', $item->id);
             $aksi .= '<button class="btn btn-sm btn-danger btn-delete" data-url="' . $deleteUrl . '" title="Hapus"><i class="bi bi-trash"></i></button>';

            $rows[] = [
                'id' => $item->id,
                'no_rm' => $item->no_rm,
                'nama_pasien' => $item->nama_pasien,
                'tanggal_daftar' => optional($item->tanggal_daftar) ? \Carbon\Carbon::parse($item->tanggal_daftar)->format('d/m/Y') : '',
                'poli' => $item->poli,
                'dokter' => $item->dokter,
                'status' => '<span class="badge bg-' . $statusColor . '">' . e($item->status) . '</span>',
                'aksi' => $aksi,
            ];
        }

        return response()->json([
            'draw' => $draw,
            'recordsTotal' => $recordsTotal,
            'recordsFiltered' => $recordsFiltered,
            'data' => $rows,
        ]);
    }
}
