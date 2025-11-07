# Update Controller dengan Create & Store Methods

File ini berisi method create() dan store() yang perlu ditambahkan ke setiap controller.

## RawatInapController
```php
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

    return redirect()->route('rawat-inap.index')
        ->with('success', 'Data rawat inap berhasil ditambahkan.');
}
```

## KasirController
```php
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

    return redirect()->route('kasir.index')
        ->with('success', 'Transaksi kasir berhasil ditambahkan.');
}
```

## ApotikController
```php
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

    return redirect()->route('apotik.index')
        ->with('success', 'Resep apotik berhasil ditambahkan.');
}
```

## LaboratoriumController
```php
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

    return redirect()->route('laboratorium.index')
        ->with('success', 'Pemeriksaan laboratorium berhasil ditambahkan.');
}
```

## RadiologiController
```php
public function create()
{
    return view('radiologi.create');
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

    return redirect()->route('radiologi.index')
        ->with('success', 'Pemeriksaan radiologi berhasil ditambahkan.');
}
```

## GiziController
```php
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

    return redirect()->route('gizi.index')
        ->with('success', 'Diet gizi berhasil ditambahkan.');
}
```

## StorageController
```php
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

    return redirect()->route('storage.index')
        ->with('success', 'Data storage berhasil ditambahkan.');
}
```

## LaundryController
```php
public function create()
{
    return view('laundry.create');
}

public function store(Request $request)
{
    $validated = $request->validate([
        'kamar' => 'required|string|max:50',
        'jenis_cucian' => 'required|string|max:255',
        'tanggal_masuk' => 'required|date',
        'jumlah' => 'required|string|max:100',
    ]);

    return redirect()->route('laundry.index')
        ->with('success', 'Data laundry berhasil ditambahkan.');
}
```

