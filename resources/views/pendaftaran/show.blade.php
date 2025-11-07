@extends('layouts.app')

@section('title', 'Detail Pendaftaran')
@section('page-title', 'Detail Pendaftaran')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="bi bi-eye"></i> Detail Data Pendaftaran</h5>
        <div>
            <a href="{{ route('pendaftaran.edit', $id) }}" class="btn btn-warning btn-sm">
                <i class="bi bi-pencil"></i> Edit
            </a>
            <a href="{{ route('pendaftaran.index') }}" class="btn btn-secondary btn-sm">
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
                <label class="form-label fw-bold">Tanggal Daftar</label>
                <p class="form-control-plaintext">{{ now()->format('d/m/Y') }}</p>
            </div>
            
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Poli</label>
                <p class="form-control-plaintext">Poli Umum</p>
            </div>
            
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Dokter</label>
                <p class="form-control-plaintext">Dr. Ahmad</p>
            </div>
            
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Status</label>
                <p>
                    <span class="badge bg-success">Selesai</span>
                </p>
            </div>
            
            <div class="col-md-12 mb-3">
                <label class="form-label fw-bold">Keluhan</label>
                <p class="form-control-plaintext">Keluhan pasien akan ditampilkan di sini</p>
            </div>
        </div>
    </div>
</div>
@endsection

