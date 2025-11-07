@extends('layouts.app')

@section('title', 'Detail Laundry')
@section('page-title', 'Detail Laundry')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="bi bi-shop"></i> Detail Cucian Laundry</h5>
        <div>
            <a href="{{ route('laundry.edit', $id) }}" class="btn btn-warning btn-sm">
                <i class="bi bi-pencil"></i> Edit
            </a>
            <a href="{{ route('laundry.index') }}" class="btn btn-secondary btn-sm">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Kamar</label>
                <p class="form-control-plaintext">{{ 100 + ($id % 50) }}</p>
            </div>
            
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Jenis Cucian</label>
                <p class="form-control-plaintext">{{ ['Sprei', 'Selimut', 'Bantal', 'Sarung Bantal'][($id-1) % 4] }}</p>
            </div>
            
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Tanggal Masuk</label>
                <p class="form-control-plaintext">{{ date('d/m/Y') }}</p>
            </div>
            
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Jumlah</label>
                <p class="form-control-plaintext">{{ 2 + ($id % 3) }} Set</p>
            </div>
        </div>
    </div>
</div>
@endsection

