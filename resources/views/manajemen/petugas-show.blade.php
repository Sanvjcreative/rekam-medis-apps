@extends('layouts.app')

@section('title', 'Detail Petugas')
@section('page-title', 'Manajemen - Detail Petugas')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="bi bi-person-badge"></i> Detail Data Petugas</h5>
        <div>
            <a href="{{ route('manajemen.petugas.edit', $id) }}" class="btn btn-warning btn-sm">
                <i class="bi bi-pencil"></i> Edit
            </a>
            <a href="{{ route('manajemen.petugas') }}" class="btn btn-secondary btn-sm">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">NIP</label>
                <p class="form-control-plaintext">NIP{{ str_pad($id, 6, '0', STR_PAD_LEFT) }}</p>
            </div>
            
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Nama</label>
                <p class="form-control-plaintext">Petugas {{ $id }}</p>
            </div>
            
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Email</label>
                <p class="form-control-plaintext">petugas{{ $id }}@rekammedis.com</p>
            </div>
            
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Jabatan</label>
                <p class="form-control-plaintext">Dokter</p>
            </div>
            
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Poli</label>
                <p class="form-control-plaintext">Poli Umum</p>
            </div>
            
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">No. HP</label>
                <p class="form-control-plaintext">08123456789{{ $id }}</p>
            </div>
            
            <div class="col-md-12 mb-3">
                <label class="form-label fw-bold">Alamat</label>
                <p class="form-control-plaintext">Alamat petugas akan ditampilkan di sini</p>
            </div>
        </div>
    </div>
</div>
@endsection

