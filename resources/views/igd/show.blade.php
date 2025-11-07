@extends('layouts.app')

@section('title', 'Detail IGD')
@section('page-title', 'Detail IGD')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="bi bi-heart-pulse"></i> Detail Data Pasien IGD</h5>
        <div>
            <a href="{{ route('igd.edit', $id) }}" class="btn btn-warning btn-sm">
                <i class="bi bi-pencil"></i> Edit
            </a>
            <a href="{{ route('igd.index') }}" class="btn btn-secondary btn-sm">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">No. RM</label>
                <p class="form-control-plaintext">RM{{ str_pad((int)$id, 6, '0', STR_PAD_LEFT) }}</p>
            </div>
            
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Nama Pasien</label>
                <p class="form-control-plaintext">Pasien {{ $id }}</p>
            </div>
            
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Tanggal Masuk</label>
                <p class="form-control-plaintext">{{ date('d/m/Y') }}</p>
            </div>
            
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Jam Masuk</label>
                <p class="form-control-plaintext">{{ date('H:i') }}</p>
            </div>
            
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Diagnosa</label>
                <p class="form-control-plaintext">Diagnosa akan ditampilkan di sini</p>
            </div>
            
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Triage</label>
                <p>
                    <span class="badge bg-{{ ['danger', 'warning', 'success'][((int)$id-1) % 3] }}">
                        {{ ['Merah', 'Kuning', 'Hijau'][((int)$id-1) % 3] }}
                    </span>
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

