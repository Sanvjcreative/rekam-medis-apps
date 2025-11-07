@extends('layouts.app')

@section('title', 'Tambah IGD')
@section('page-title', 'Tambah IGD')

@push('styles')
<style>
    .form-label { font-weight: 600; color: #1e293b; }
    .required { color: red; }
</style>
@endpush

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="bi bi-heart-pulse"></i> Form Pasien IGD Baru</h5>
        <a href="{{ route('igd.index') }}" class="btn btn-secondary btn-sm">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('igd.store') }}">
            @csrf
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="no_rm" class="form-label">No. RM <span class="required">*</span></label>
                    <input type="text" class="form-control @error('no_rm') is-invalid @enderror" 
                           id="no_rm" name="no_rm" value="{{ old('no_rm') }}" required>
                    @error('no_rm')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-md-6 mb-3">
                    <label for="nama_pasien" class="form-label">Nama Pasien <span class="required">*</span></label>
                    <input type="text" class="form-control @error('nama_pasien') is-invalid @enderror" 
                           id="nama_pasien" name="nama_pasien" value="{{ old('nama_pasien') }}" required>
                    @error('nama_pasien')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="tanggal_masuk" class="form-label">Tanggal Masuk <span class="required">*</span></label>
                    <input type="date" class="form-control @error('tanggal_masuk') is-invalid @enderror" 
                           id="tanggal_masuk" name="tanggal_masuk" 
                           value="{{ old('tanggal_masuk', date('Y-m-d')) }}" required>
                    @error('tanggal_masuk')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-md-6 mb-3">
                    <label for="jam_masuk" class="form-label">Jam Masuk <span class="required">*</span></label>
                    <input type="time" class="form-control @error('jam_masuk') is-invalid @enderror" 
                           id="jam_masuk" name="jam_masuk" 
                           value="{{ old('jam_masuk', date('H:i')) }}" required>
                    @error('jam_masuk')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="diagnosa" class="form-label">Diagnosa <span class="required">*</span></label>
                    <input type="text" class="form-control @error('diagnosa') is-invalid @enderror" 
                           id="diagnosa" name="diagnosa" value="{{ old('diagnosa') }}" required>
                    @error('diagnosa')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-md-6 mb-3">
                    <label for="triage" class="form-label">Triage <span class="required">*</span></label>
                    <select class="form-select @error('triage') is-invalid @enderror" id="triage" name="triage" required>
                        <option value="">Pilih Triage</option>
                        <option value="Merah" {{ old('triage') == 'Merah' ? 'selected' : '' }}>Merah (Kritis)</option>
                        <option value="Kuning" {{ old('triage') == 'Kuning' ? 'selected' : '' }}>Kuning (Urgent)</option>
                        <option value="Hijau" {{ old('triage') == 'Hijau' ? 'selected' : '' }}>Hijau (Non-Urgent)</option>
                    </select>
                    @error('triage')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class="mb-3">
                <label for="keluhan" class="form-label">Keluhan</label>
                <textarea class="form-control @error('keluhan') is-invalid @enderror" 
                          id="keluhan" name="keluhan" rows="3">{{ old('keluhan') }}</textarea>
                @error('keluhan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('igd.index') }}" class="btn btn-secondary">
                    <i class="bi bi-x-circle"></i> Batal
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

