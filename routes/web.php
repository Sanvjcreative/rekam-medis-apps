<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\IGDController;
use App\Http\Controllers\RawatJalanController;
use App\Http\Controllers\RawatInapController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\ApotikController;
use App\Http\Controllers\LaboratoriumController;
use App\Http\Controllers\RadiologiController;
use App\Http\Controllers\GiziController;
use App\Http\Controllers\StorageController;
use App\Http\Controllers\ManajemenController;
use App\Http\Controllers\LaundryController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Menu untuk Admin & Petugas
    Route::middleware('role:admin|petugas')->group(function () {
        Route::get('/pendaftaran/create', [PendaftaranController::class, 'create'])->name('pendaftaran.create');
    // Endpoint untuk DataTables (server-side)
    Route::get('/pendaftaran/data', [PendaftaranController::class, 'data'])->name('pendaftaran.data');
        Route::post('/pendaftaran', [PendaftaranController::class, 'store'])->name('pendaftaran.store');
        Route::get('/pendaftaran/{pendaftaran}/edit', [PendaftaranController::class, 'edit'])->name('pendaftaran.edit');
        Route::resource('pendaftaran', PendaftaranController::class)->except(['create', 'store', 'edit'])->names([
            'index' => 'pendaftaran.index',
            'show' => 'pendaftaran.show',
            'update' => 'pendaftaran.update',
            'destroy' => 'pendaftaran.destroy',
        ]);
        
        Route::get('/igd/create', [IGDController::class, 'create'])->name('igd.create');
        Route::post('/igd', [IGDController::class, 'store'])->name('igd.store');
        Route::get('/igd/{igd}/edit', [IGDController::class, 'edit'])->name('igd.edit');
        Route::resource('igd', IGDController::class)->except(['create', 'store', 'edit'])->names([
            'index' => 'igd.index',
            'show' => 'igd.show',
            'update' => 'igd.update',
            'destroy' => 'igd.destroy',
        ]);
        
        Route::get('/rawat-jalan/create', [RawatJalanController::class, 'create'])->name('rawat-jalan.create');
        Route::post('/rawat-jalan', [RawatJalanController::class, 'store'])->name('rawat-jalan.store');
        Route::get('/rawat-jalan/{rawat_jalan}/edit', [RawatJalanController::class, 'edit'])->name('rawat-jalan.edit');
        Route::resource('rawat-jalan', RawatJalanController::class)->except(['create', 'store', 'edit'])->names([
            'index' => 'rawat-jalan.index',
            'show' => 'rawat-jalan.show',
            'update' => 'rawat-jalan.update',
            'destroy' => 'rawat-jalan.destroy',
        ]);
        
        Route::get('/rawat-inap/create', [RawatInapController::class, 'create'])->name('rawat-inap.create');
        Route::post('/rawat-inap', [RawatInapController::class, 'store'])->name('rawat-inap.store');
        Route::get('/rawat-inap/{rawat_inap}/edit', [RawatInapController::class, 'edit'])->name('rawat-inap.edit');
        Route::resource('rawat-inap', RawatInapController::class)->except(['create', 'store', 'edit'])->names([
            'index' => 'rawat-inap.index',
            'show' => 'rawat-inap.show',
            'update' => 'rawat-inap.update',
            'destroy' => 'rawat-inap.destroy',
        ]);
        
        Route::get('/kasir/create', [KasirController::class, 'create'])->name('kasir.create');
        Route::post('/kasir', [KasirController::class, 'store'])->name('kasir.store');
        Route::get('/kasir/{kasir}/edit', [KasirController::class, 'edit'])->name('kasir.edit');
        Route::resource('kasir', KasirController::class)->except(['create', 'store', 'edit'])->names([
            'index' => 'kasir.index',
            'show' => 'kasir.show',
            'update' => 'kasir.update',
            'destroy' => 'kasir.destroy',
        ]);
        
        Route::get('/apotik/create', [ApotikController::class, 'create'])->name('apotik.create');
        Route::post('/apotik', [ApotikController::class, 'store'])->name('apotik.store');
        Route::get('/apotik/{apotik}/edit', [ApotikController::class, 'edit'])->name('apotik.edit');
        Route::resource('apotik', ApotikController::class)->except(['create', 'store', 'edit'])->names([
            'index' => 'apotik.index',
            'show' => 'apotik.show',
            'update' => 'apotik.update',
            'destroy' => 'apotik.destroy',
        ]);
        
        Route::get('/laboratorium/create', [LaboratoriumController::class, 'create'])->name('laboratorium.create');
        Route::post('/laboratorium', [LaboratoriumController::class, 'store'])->name('laboratorium.store');
        Route::get('/laboratorium/{laboratorium}/edit', [LaboratoriumController::class, 'edit'])->name('laboratorium.edit');
        Route::resource('laboratorium', LaboratoriumController::class)->except(['create', 'store', 'edit'])->names([
            'index' => 'laboratorium.index',
            'show' => 'laboratorium.show',
            'update' => 'laboratorium.update',
            'destroy' => 'laboratorium.destroy',
        ]);
        
        Route::get('/radiologi/create', [RadiologiController::class, 'create'])->name('radiologi.create');
        Route::post('/radiologi', [RadiologiController::class, 'store'])->name('radiologi.store');
        Route::get('/radiologi/{radiologi}/edit', [RadiologiController::class, 'edit'])->name('radiologi.edit');
        Route::resource('radiologi', RadiologiController::class)->except(['create', 'store', 'edit'])->names([
            'index' => 'radiologi.index',
            'show' => 'radiologi.show',
            'update' => 'radiologi.update',
            'destroy' => 'radiologi.destroy',
        ]);
        
        Route::get('/gizi/create', [GiziController::class, 'create'])->name('gizi.create');
        Route::post('/gizi', [GiziController::class, 'store'])->name('gizi.store');
        Route::get('/gizi/{gizi}/edit', [GiziController::class, 'edit'])->name('gizi.edit');
        Route::resource('gizi', GiziController::class)->except(['create', 'store', 'edit'])->names([
            'index' => 'gizi.index',
            'show' => 'gizi.show',
            'update' => 'gizi.update',
            'destroy' => 'gizi.destroy',
        ]);
    });
    
    // Menu untuk Admin saja
    Route::middleware('role:admin')->group(function () {
        Route::get('/storage/create', [StorageController::class, 'create'])->name('storage.create');
        Route::post('/storage', [StorageController::class, 'store'])->name('storage.store');
        Route::get('/storage/{storage}/edit', [StorageController::class, 'edit'])->name('storage.edit');
        Route::resource('storage', StorageController::class)->except(['create', 'store', 'edit'])->names([
            'index' => 'storage.index',
            'show' => 'storage.show',
            'update' => 'storage.update',
            'destroy' => 'storage.destroy',
        ]);
        
        Route::get('/laundry/create', [LaundryController::class, 'create'])->name('laundry.create');
        Route::post('/laundry', [LaundryController::class, 'store'])->name('laundry.store');
        Route::get('/laundry/{laundry}/edit', [LaundryController::class, 'edit'])->name('laundry.edit');
        Route::resource('laundry', LaundryController::class)->except(['create', 'store', 'edit'])->names([
            'index' => 'laundry.index',
            'show' => 'laundry.show',
            'update' => 'laundry.update',
            'destroy' => 'laundry.destroy',
        ]);
        
        // Manajemen
        Route::prefix('manajemen')->name('manajemen.')->group(function () {
            Route::get('/', [ManajemenController::class, 'index'])->name('index');
            
            // Petugas
            Route::get('/petugas', [ManajemenController::class, 'petugas'])->name('petugas');
            Route::get('/petugas/create', [ManajemenController::class, 'petugasCreate'])->name('petugas.create');
            Route::post('/petugas', [ManajemenController::class, 'petugasStore'])->name('petugas.store');
            Route::get('/petugas/{id}', [ManajemenController::class, 'petugasShow'])->name('petugas.show');
            Route::get('/petugas/{id}/edit', [ManajemenController::class, 'petugasEdit'])->name('petugas.edit');
            Route::put('/petugas/{id}', [ManajemenController::class, 'petugasUpdate'])->name('petugas.update');
            Route::delete('/petugas/{id}', [ManajemenController::class, 'petugasDestroy'])->name('petugas.destroy');
            
            // Poli
            Route::get('/poli', [ManajemenController::class, 'poli'])->name('poli');
            Route::get('/poli/create', [ManajemenController::class, 'poliCreate'])->name('poli.create');
            Route::post('/poli', [ManajemenController::class, 'poliStore'])->name('poli.store');
            Route::get('/poli/{id}', [ManajemenController::class, 'poliShow'])->name('poli.show');
            Route::get('/poli/{id}/edit', [ManajemenController::class, 'poliEdit'])->name('poli.edit');
            Route::put('/poli/{id}', [ManajemenController::class, 'poliUpdate'])->name('poli.update');
            Route::delete('/poli/{id}', [ManajemenController::class, 'poliDestroy'])->name('poli.destroy');
            
            // Obat
            Route::get('/obat', [ManajemenController::class, 'obat'])->name('obat');
            Route::get('/obat/create', [ManajemenController::class, 'obatCreate'])->name('obat.create');
            Route::post('/obat', [ManajemenController::class, 'obatStore'])->name('obat.store');
            Route::get('/obat/{id}', [ManajemenController::class, 'obatShow'])->name('obat.show');
            Route::get('/obat/{id}/edit', [ManajemenController::class, 'obatEdit'])->name('obat.edit');
            Route::put('/obat/{id}', [ManajemenController::class, 'obatUpdate'])->name('obat.update');
            Route::delete('/obat/{id}', [ManajemenController::class, 'obatDestroy'])->name('obat.destroy');
            
            // Pasien
            Route::get('/pasien', [ManajemenController::class, 'pasien'])->name('pasien');
            Route::get('/pasien/create', [ManajemenController::class, 'pasienCreate'])->name('pasien.create');
            Route::post('/pasien', [ManajemenController::class, 'pasienStore'])->name('pasien.store');
            Route::get('/pasien/{id}', [ManajemenController::class, 'pasienShow'])->name('pasien.show');
            Route::get('/pasien/{id}/edit', [ManajemenController::class, 'pasienEdit'])->name('pasien.edit');
            Route::put('/pasien/{id}', [ManajemenController::class, 'pasienUpdate'])->name('pasien.update');
            Route::delete('/pasien/{id}', [ManajemenController::class, 'pasienDestroy'])->name('pasien.destroy');
            Route::get('/rekam-medis', [ManajemenController::class, 'rekamMedis'])->name('rekam-medis');
            Route::get('/laporan', [ManajemenController::class, 'laporan'])->name('laporan');
        });
    });

    // Menu untuk Pasien
    Route::middleware('role:pasien')->group(function () {
        Route::get('/pasien/pendaftaran', function () {
            return view('pasien.pendaftaran');
        })->name('pasien.pendaftaran');

        // Submit pendaftaran oleh pasien
        Route::post('/pasien/pendaftaran', [PendaftaranController::class, 'store'])->name('pasien.pendaftaran.store');

        Route::get('/pasien/riwayat', function () {
            return view('pasien.riwayat');
        })->name('pasien.riwayat');

        Route::get('/pasien/rekam-medis', function () {
            return view('pasien.rekam-medis');
        })->name('pasien.rekam-medis');
    });
});
