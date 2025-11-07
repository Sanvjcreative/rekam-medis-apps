@extends('layouts.app')

@section('title', 'Detail Diet Gizi')
@section('page-title', 'Detail Diet Gizi')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="bi bi-egg-fried"></i> Detail Diet Gizi</h5>
        <div>
            <a href="{{ route('gizi.edit', $id) }}" class="btn btn-warning btn-sm">
                <i class="bi bi-pencil"></i> Edit
            </a>
            <a href="{{ route('gizi.index') }}" class="btn btn-secondary btn-sm">
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
                <label class="form-label fw-bold">Jenis Diet</label>
                <p class="form-control-plaintext">{{ ['Diet Rendah Garam', 'Diet Rendah Gula', 'Diet Rendah Lemak', 'Diet Normal'][($id-1) % 4] }}</p>
            </div>
            
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Kalori</label>
                <p class="form-control-plaintext">{{ 2000 + ($id * 100) }} kkal</p>
            </div>
        </div>
    </div>
</div>
@endsection

