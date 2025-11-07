@extends('layouts.app')

@section('title', 'Detail Obat')
@section('page-title', 'Manajemen - Detail Obat')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="bi bi-capsule"></i> Detail Data Obat</h5>
        <div>
            <a href="{{ route('manajemen.obat.edit', $id) }}" class="btn btn-warning btn-sm">
                <i class="bi bi-pencil"></i> Edit
            </a>
            <a href="{{ route('manajemen.obat') }}" class="btn btn-secondary btn-sm">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Kode Obat</label>
                <p class="form-control-plaintext">OBT{{ str_pad($id, 4, '0', STR_PAD_LEFT) }}</p>
            </div>
            
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Nama Obat</label>
                <p class="form-control-plaintext">Obat {{ $id }}</p>
            </div>
            
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Kategori</label>
                <p class="form-control-plaintext">Antibiotik</p>
            </div>
            
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Satuan</label>
                <p class="form-control-plaintext">Tablet</p>
            </div>
            
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Stok</label>
                <p class="form-control-plaintext">100</p>
            </div>
            
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Harga</label>
                <p class="form-control-plaintext">Rp 50.000</p>
            </div>
            
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Tanggal Expired</label>
                <p class="form-control-plaintext">{{ date('d/m/Y', strtotime('+1 year')) }}</p>
            </div>
        </div>
    </div>
</div>
@endsection

