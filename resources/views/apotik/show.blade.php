@extends('layouts.app')

@section('title', 'Detail Resep Apotik')
@section('page-title', 'Detail Resep Apotik')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="bi bi-capsule-pill"></i> Detail Resep Apotik</h5>
        <div>
            <a href="{{ route('apotik.edit', $id) }}" class="btn btn-warning btn-sm">
                <i class="bi bi-pencil"></i> Edit
            </a>
            <a href="{{ route('apotik.index') }}" class="btn btn-secondary btn-sm">
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
                <label class="form-label fw-bold">Nama Pasien</label>
                <p class="form-control-plaintext">Pasien {{ $id }}</p>
            </div>
            
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Tanggal</label>
                <p class="form-control-plaintext">{{ date('d/m/Y') }}</p>
            </div>
            
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Obat</label>
                <p class="form-control-plaintext">Obat {{ $id }}</p>
            </div>
            
            <div class="col-md-12 mb-3">
                <label class="form-label fw-bold">Jumlah</label>
                <p class="form-control-plaintext">10 Tablet</p>
            </div>
        </div>
    </div>
</div>
@endsection

