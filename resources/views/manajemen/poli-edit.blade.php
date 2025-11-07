@extends('layouts.app')

@section('title', 'Edit Poli')
@section('page-title', 'Manajemen - Edit Poli')

@push('styles')
<style>
    .form-label { font-weight: 600; color: #1e293b; }
    .required { color: red; }
</style>
@endpush

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="bi bi-building"></i> Form Edit Data Poli</h5>
        <a href="{{ route('manajemen.poli') }}" class="btn btn-secondary btn-sm">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('manajemen.poli.update', $id) }}">
            @csrf
            @method('PUT')
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="kode_poli" class="form-label">Kode Poli <span class="required">*</span></label>
                    <input type="text" class="form-control @error('kode_poli') is-invalid @enderror" 
                           id="kode_poli" name="kode_poli" value="{{ old('kode_poli') }}" required>
                    @error('kode_poli')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-md-6 mb-3">
                    <label for="nama_poli" class="form-label">Nama Poli <span class="required">*</span></label>
                    <input type="text" class="form-control @error('nama_poli') is-invalid @enderror" 
                           id="nama_poli" name="nama_poli" value="{{ old('nama_poli') }}" required>
                    @error('nama_poli')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="dokter" class="form-label">Dokter</label>
                    <input type="text" class="form-control @error('dokter') is-invalid @enderror" 
                           id="dokter" name="dokter" value="{{ old('dokter') }}">
                    @error('dokter')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-md-6 mb-3">
                    <label for="kapasitas" class="form-label">Kapasitas (pasien/hari)</label>
                    <input type="number" class="form-control @error('kapasitas') is-invalid @enderror" 
                           id="kapasitas" name="kapasitas" value="{{ old('kapasitas') }}" min="0">
                    @error('kapasitas')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('manajemen.poli') }}" class="btn btn-secondary">
                    <i class="bi bi-x-circle"></i> Batal
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> Update
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

