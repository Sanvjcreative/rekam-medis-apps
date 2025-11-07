@extends('layouts.app')

@section('title', 'Detail Pemeriksaan Radiologi')
@section('page-title', 'Detail Pemeriksaan Radiologi')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="bi bi-radar"></i> Detail Pemeriksaan Radiologi</h5>
        <div>
            <a href="{{ route('radiologi.edit', $id) }}" class="btn btn-warning btn-sm">
                <i class="bi bi-pencil"></i> Edit
            </a>
            <a href="{{ route('radiologi.index') }}" class="btn btn-secondary btn-sm">
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
                <label class="form-label fw-bold">Jenis Pemeriksaan</label>
                <p class="form-control-plaintext">{{ ['X-Ray Thorax', 'USG Abdomen', 'CT Scan', 'MRI'][($id-1) % 4] }}</p>
            </div>
            
            <div class="col-md-12 mb-3">
                <label class="form-label fw-bold">Hasil</label>
                <p class="form-control-plaintext">Hasil pemeriksaan akan ditampilkan di sini</p>
            </div>
        </div>
    </div>
</div>
@endsection

