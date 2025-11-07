@extends('layouts.app')

@section('title', 'Tambah Obat')
@section('page-title', 'Manajemen - Tambah Obat')

@push('styles')
<style>
    .form-label { font-weight: 600; color: #1e293b; }
    .required { color: red; }
</style>
@endpush

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="bi bi-capsule"></i> Form Data Obat Baru</h5>
        <a href="{{ route('manajemen.obat') }}" class="btn btn-secondary btn-sm">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('manajemen.obat.store') }}">
            @csrf
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="kode_obat" class="form-label">Kode Obat <span class="required">*</span></label>
                    <input type="text" class="form-control @error('kode_obat') is-invalid @enderror" 
                           id="kode_obat" name="kode_obat" value="{{ old('kode_obat') }}" required>
                    @error('kode_obat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-md-6 mb-3">
                    <label for="nama_obat" class="form-label">Nama Obat <span class="required">*</span></label>
                    <input type="text" class="form-control @error('nama_obat') is-invalid @enderror" 
                           id="nama_obat" name="nama_obat" value="{{ old('nama_obat') }}" required>
                    @error('nama_obat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="kategori" class="form-label">Kategori <span class="required">*</span></label>
                    <select class="form-select @error('kategori') is-invalid @enderror" id="kategori" name="kategori" required>
                        <option value="">Pilih Kategori</option>
                        <option value="Antibiotik" {{ old('kategori') == 'Antibiotik' ? 'selected' : '' }}>Antibiotik</option>
                        <option value="Analgesik" {{ old('kategori') == 'Analgesik' ? 'selected' : '' }}>Analgesik</option>
                        <option value="Vitamin" {{ old('kategori') == 'Vitamin' ? 'selected' : '' }}>Vitamin</option>
                        <option value="Antihistamin" {{ old('kategori') == 'Antihistamin' ? 'selected' : '' }}>Antihistamin</option>
                    </select>
                    @error('kategori')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-md-6 mb-3">
                    <label for="satuan" class="form-label">Satuan <span class="required">*</span></label>
                    <select class="form-select @error('satuan') is-invalid @enderror" id="satuan" name="satuan" required>
                        <option value="">Pilih Satuan</option>
                        <option value="Tablet" {{ old('satuan') == 'Tablet' ? 'selected' : '' }}>Tablet</option>
                        <option value="Kapsul" {{ old('satuan') == 'Kapsul' ? 'selected' : '' }}>Kapsul</option>
                        <option value="Botol" {{ old('satuan') == 'Botol' ? 'selected' : '' }}>Botol</option>
                    </select>
                    @error('satuan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="stok" class="form-label">Stok <span class="required">*</span></label>
                    <input type="number" class="form-control @error('stok') is-invalid @enderror" 
                           id="stok" name="stok" value="{{ old('stok') }}" min="0" required>
                    @error('stok')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-md-6 mb-3">
                    <label for="harga" class="form-label">Harga <span class="required">*</span></label>
                    <input type="number" class="form-control @error('harga') is-invalid @enderror" 
                           id="harga" name="harga" value="{{ old('harga') }}" 
                           step="0.01" min="0" required>
                    @error('harga')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class="mb-3">
                <label for="expired" class="form-label">Tanggal Expired</label>
                <input type="date" class="form-control @error('expired') is-invalid @enderror" 
                       id="expired" name="expired" value="{{ old('expired') }}">
                @error('expired')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('manajemen.obat') }}" class="btn btn-secondary">
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

