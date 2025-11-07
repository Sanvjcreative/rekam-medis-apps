@extends('layouts.app')

@section('title', 'Edit Storage')
@section('page-title', 'Edit Storage')

@push('styles')
<style>
    .form-label { font-weight: 600; color: #1e293b; }
    .required { color: red; }
</style>
@endpush

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="bi bi-box-seam"></i> Form Edit Barang Storage</h5>
        <a href="{{ route('storage.index') }}" class="btn btn-secondary btn-sm">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('storage.update', $id) }}">
            @csrf
            @method('PUT')
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="kode_barang" class="form-label">Kode Barang <span class="required">*</span></label>
                    <input type="text" class="form-control @error('kode_barang') is-invalid @enderror" 
                           id="kode_barang" name="kode_barang" value="{{ old('kode_barang') }}" required>
                    @error('kode_barang')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-md-6 mb-3">
                    <label for="nama_barang" class="form-label">Nama Barang <span class="required">*</span></label>
                    <input type="text" class="form-control @error('nama_barang') is-invalid @enderror" 
                           id="nama_barang" name="nama_barang" value="{{ old('nama_barang') }}" required>
                    @error('nama_barang')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="kategori" class="form-label">Kategori <span class="required">*</span></label>
                    <select class="form-select @error('kategori') is-invalid @enderror" id="kategori" name="kategori" required>
                        <option value="">Pilih Kategori</option>
                        <option value="Alat Medis" {{ old('kategori') == 'Alat Medis' ? 'selected' : '' }}>Alat Medis</option>
                        <option value="Bahan Habis Pakai" {{ old('kategori') == 'Bahan Habis Pakai' ? 'selected' : '' }}>Bahan Habis Pakai</option>
                        <option value="Obat" {{ old('kategori') == 'Obat' ? 'selected' : '' }}>Obat</option>
                    </select>
                    @error('kategori')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-md-6 mb-3">
                    <label for="satuan" class="form-label">Satuan <span class="required">*</span></label>
                    <select class="form-select @error('satuan') is-invalid @enderror" id="satuan" name="satuan" required>
                        <option value="">Pilih Satuan</option>
                        <option value="Pcs" {{ old('satuan') == 'Pcs' ? 'selected' : '' }}>Pcs</option>
                        <option value="Box" {{ old('satuan') == 'Box' ? 'selected' : '' }}>Box</option>
                        <option value="Botol" {{ old('satuan') == 'Botol' ? 'selected' : '' }}>Botol</option>
                        <option value="Lusin" {{ old('satuan') == 'Lusin' ? 'selected' : '' }}>Lusin</option>
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
            
            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('storage.index') }}" class="btn btn-secondary">
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

