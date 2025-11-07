@extends('layouts.app')

@section('title', 'Tambah Laundry')
@section('page-title', 'Tambah Laundry')

@push('styles')
<style>
    .form-label { font-weight: 600; color: #1e293b; }
    .required { color: red; }
</style>
@endpush

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="bi bi-shop"></i> Form Cucian Laundry Baru</h5>
        <a href="{{ route('laundry.index') }}" class="btn btn-secondary btn-sm">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('laundry.store') }}">
            @csrf
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="kamar" class="form-label">Kamar <span class="required">*</span></label>
                    <input type="text" class="form-control @error('kamar') is-invalid @enderror" 
                           id="kamar" name="kamar" value="{{ old('kamar') }}" 
                           placeholder="Contoh: 101" required>
                    @error('kamar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-md-6 mb-3">
                    <label for="jenis_cucian" class="form-label">Jenis Cucian <span class="required">*</span></label>
                    <select class="form-select @error('jenis_cucian') is-invalid @enderror" 
                            id="jenis_cucian" name="jenis_cucian" required>
                        <option value="">Pilih Jenis Cucian</option>
                        <option value="Sprei" {{ old('jenis_cucian') == 'Sprei' ? 'selected' : '' }}>Sprei</option>
                        <option value="Selimut" {{ old('jenis_cucian') == 'Selimut' ? 'selected' : '' }}>Selimut</option>
                        <option value="Bantal" {{ old('jenis_cucian') == 'Bantal' ? 'selected' : '' }}>Bantal</option>
                        <option value="Sarung Bantal" {{ old('jenis_cucian') == 'Sarung Bantal' ? 'selected' : '' }}>Sarung Bantal</option>
                    </select>
                    @error('jenis_cucian')
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
                    <label for="jumlah" class="form-label">Jumlah <span class="required">*</span></label>
                    <input type="text" class="form-control @error('jumlah') is-invalid @enderror" 
                           id="jumlah" name="jumlah" value="{{ old('jumlah') }}" 
                           placeholder="Contoh: 2 Set" required>
                    @error('jumlah')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('laundry.index') }}" class="btn btn-secondary">
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

