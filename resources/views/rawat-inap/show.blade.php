@extends('layouts.app')

@section('title', 'Detail Rawat Inap')
@section('page-title', 'Detail Rawat Inap')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="bi bi-hospital"></i> Detail Rawat Inap</h5>
        <div>
            <a href="{{ route('rawat-inap.edit', $id) }}" class="btn btn-warning btn-sm">
                <i class="bi bi-pencil"></i> Edit
            </a>
            <a href="{{ route('rawat-inap.index') }}" class="btn btn-secondary btn-sm">
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
                <label class="form-label fw-bold">Tanggal Masuk</label>
                <p class="form-control-plaintext">{{ date('d/m/Y') }}</p>
            </div>
            
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Kamar</label>
                <p class="form-control-plaintext">{{ 100 + ($id % 50) }}</p>
            </div>
            
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Kelas</label>
                <p class="form-control-plaintext">{{ ['VIP', 'Kelas 1', 'Kelas 2', 'Kelas 3'][($id-1) % 4] }}</p>
            </div>
            
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Diagnosa</label>
                <p class="form-control-plaintext">Diagnosa akan ditampilkan di sini</p>
            </div>
        </div>
    </div>
</div>
@endsection

