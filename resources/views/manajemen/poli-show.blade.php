@extends('layouts.app')

@section('title', 'Detail Poli')
@section('page-title', 'Manajemen - Detail Poli')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="bi bi-building"></i> Detail Data Poli</h5>
        <div>
            <a href="{{ route('manajemen.poli.edit', $id) }}" class="btn btn-warning btn-sm">
                <i class="bi bi-pencil"></i> Edit
            </a>
            <a href="{{ route('manajemen.poli') }}" class="btn btn-secondary btn-sm">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Kode Poli</label>
                <p class="form-control-plaintext">POLI{{ str_pad($id, 3, '0', STR_PAD_LEFT) }}</p>
            </div>
            
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Nama Poli</label>
                <p class="form-control-plaintext">Poli {{ ['Umum', 'Anak', 'Gigi', 'Mata'][($id-1) % 4] }}</p>
            </div>
            
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Dokter</label>
                <p class="form-control-plaintext">Dr. Ahmad</p>
            </div>
            
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Kapasitas</label>
                <p class="form-control-plaintext">50 pasien/hari</p>
            </div>
        </div>
    </div>
</div>
@endsection

