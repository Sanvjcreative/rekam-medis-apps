@extends('layouts.app')

@section('title', 'Detail Storage')
@section('page-title', 'Detail Storage')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="bi bi-box-seam"></i> Detail Barang Storage</h5>
        <div>
            <a href="{{ route('storage.edit', $id) }}" class="btn btn-warning btn-sm">
                <i class="bi bi-pencil"></i> Edit
            </a>
            <a href="{{ route('storage.index') }}" class="btn btn-secondary btn-sm">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Kode Barang</label>
                <p class="form-control-plaintext">BRG{{ str_pad($id, 4, '0', STR_PAD_LEFT) }}</p>
            </div>
            
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Nama Barang</label>
                <p class="form-control-plaintext">Barang {{ $id }}</p>
            </div>
            
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Kategori</label>
                <p class="form-control-plaintext">{{ ['Alat Medis', 'Bahan Habis Pakai', 'Obat'][($id-1) % 3] }}</p>
            </div>
            
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Satuan</label>
                <p class="form-control-plaintext">{{ ['Pcs', 'Box', 'Botol', 'Lusin'][($id-1) % 4] }}</p>
            </div>
            
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Stok</label>
                <p class="form-control-plaintext">{{ 100 + ($id * 10) }}</p>
            </div>
            
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Harga</label>
                <p class="form-control-plaintext">Rp {{ number_format(50000 + ($id * 5000), 0, ',', '.') }}</p>
            </div>
        </div>
    </div>
</div>
@endsection

