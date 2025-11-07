@extends('layouts.app')

@section('title', 'Detail Transaksi Kasir')
@section('page-title', 'Detail Transaksi Kasir')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="bi bi-cash-register"></i> Detail Transaksi Kasir</h5>
        <div>
            <a href="{{ route('kasir.edit', $id) }}" class="btn btn-warning btn-sm">
                <i class="bi bi-pencil"></i> Edit
            </a>
            <a href="{{ route('kasir.index') }}" class="btn btn-secondary btn-sm">
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
                <label class="form-label fw-bold">Total Tagihan</label>
                <p class="form-control-plaintext">Rp {{ number_format(500000 + ($id * 10000), 0, ',', '.') }}</p>
            </div>
            
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Bayar</label>
                <p class="form-control-plaintext">Rp {{ number_format(600000 + ($id * 10000), 0, ',', '.') }}</p>
            </div>
            
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Kembalian</label>
                <p class="form-control-plaintext">Rp {{ number_format(100000, 0, ',', '.') }}</p>
            </div>
        </div>
    </div>
</div>
@endsection

