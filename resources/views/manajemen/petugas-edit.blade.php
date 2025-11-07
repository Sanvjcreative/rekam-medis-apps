@extends('layouts.app')

@section('title', 'Edit Petugas')
@section('page-title', 'Manajemen - Edit Petugas')

@push('styles')
<style>
    .form-label { font-weight: 600; color: #1e293b; }
    .required { color: red; }
</style>
@endpush

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="bi bi-person-badge"></i> Form Edit Data Petugas</h5>
        <a href="{{ route('manajemen.petugas') }}" class="btn btn-secondary btn-sm">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('manajemen.petugas.update', $id) }}">
            @csrf
            @method('PUT')
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="nip" class="form-label">NIP <span class="required">*</span></label>
                    <input type="text" class="form-control @error('nip') is-invalid @enderror" 
                           id="nip" name="nip" value="{{ old('nip') }}" required>
                    @error('nip')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-md-6 mb-3">
                    <label for="nama" class="form-label">Nama <span class="required">*</span></label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" 
                           id="nama" name="nama" value="{{ old('nama') }}" required>
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="email" class="form-label">Email <span class="required">*</span></label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" 
                           id="email" name="email" value="{{ old('email') }}" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-md-6 mb-3">
                    <label for="jabatan" class="form-label">Jabatan <span class="required">*</span></label>
                    <select class="form-select @error('jabatan') is-invalid @enderror" id="jabatan" name="jabatan" required>
                        <option value="">Pilih Jabatan</option>
                        <option value="Dokter" {{ old('jabatan') == 'Dokter' ? 'selected' : '' }}>Dokter</option>
                        <option value="Perawat" {{ old('jabatan') == 'Perawat' ? 'selected' : '' }}>Perawat</option>
                        <option value="Apoteker" {{ old('jabatan') == 'Apoteker' ? 'selected' : '' }}>Apoteker</option>
                        <option value="Admin" {{ old('jabatan') == 'Admin' ? 'selected' : '' }}>Admin</option>
                    </select>
                    @error('jabatan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="poli" class="form-label">Poli</label>
                    <select class="form-select" id="poli" name="poli">
                        <option value="">Pilih Poli</option>
                        <option value="Umum" {{ old('poli') == 'Umum' ? 'selected' : '' }}>Poli Umum</option>
                        <option value="Anak" {{ old('poli') == 'Anak' ? 'selected' : '' }}>Poli Anak</option>
                        <option value="Gigi" {{ old('poli') == 'Gigi' ? 'selected' : '' }}>Poli Gigi</option>
                        <option value="Mata" {{ old('poli') == 'Mata' ? 'selected' : '' }}>Poli Mata</option>
                    </select>
                </div>
                
                <div class="col-md-6 mb-3">
                    <label for="no_hp" class="form-label">No. HP</label>
                    <input type="text" class="form-control @error('no_hp') is-invalid @enderror" 
                           id="no_hp" name="no_hp" value="{{ old('no_hp') }}">
                    @error('no_hp')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control @error('alamat') is-invalid @enderror" 
                          id="alamat" name="alamat" rows="3">{{ old('alamat') }}</textarea>
                @error('alamat')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('manajemen.petugas') }}" class="btn btn-secondary">
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

