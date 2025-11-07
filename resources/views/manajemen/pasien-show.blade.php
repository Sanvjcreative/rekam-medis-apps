@extends('layouts.app')

@section('title', 'Detail Pasien')
@section('page-title', 'Manajemen - Detail Pasien')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="bi bi-people"></i> Detail Data Pasien</h5>
        <div>
            <a href="{{ route('manajemen.pasien.edit', $id) }}" class="btn btn-warning btn-sm">
                <i class="bi bi-pencil"></i> Edit
            </a>
            <a href="{{ route('manajemen.pasien') }}" class="btn btn-secondary btn-sm">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">No. RM</label>
                <p class="form-control-plaintext">RM{{ str_pad($id, 6, '0', STR_PAD_LEFT) }}</p>
            </div>
            
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">NIK</label>
                <p class="form-control-plaintext">320101010101{{ str_pad($id, 4, '0', STR_PAD_LEFT) }}</p>
            </div>
            
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Nama</label>
                <p class="form-control-plaintext">Pasien {{ $id }}</p>
            </div>
            
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Tanggal Lahir</label>
                <p class="form-control-plaintext">{{ date('d/m/Y', strtotime('-' . ($id * 365) . ' days')) }}</p>
            </div>
            
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Jenis Kelamin</label>
                <p class="form-control-plaintext">{{ $id % 2 == 0 ? 'Perempuan' : 'Laki-laki' }}</p>
            </div>
            
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">No. HP</label>
                <p class="form-control-plaintext">08123456789{{ $id }}</p>
            </div>
            
            <div class="col-md-12 mb-3">
                <label class="form-label fw-bold">Alamat</label>
                <p class="form-control-plaintext">Alamat pasien akan ditampilkan di sini</p>
            </div>
        </div>
    </div>
</div>
@endsection

