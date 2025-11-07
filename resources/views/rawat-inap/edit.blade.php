@extends('layouts.app')

@section('title', 'Edit Rawat Inap')
@section('page-title', 'Edit Rawat Inap')

@push('styles')
<style>
    .form-label { font-weight: 600; color: #1e293b; }
    .required { color: red; }
</style>
@endpush

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="bi bi-hospital"></i> Form Edit Rawat Inap</h5>
        <a href="{{ route('rawat-inap.index') }}" class="btn btn-secondary btn-sm">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('rawat-inap.update', $id) }}">
            @csrf
            @method('PUT')
            
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
                    <label for="kamar" class="form-label">Kamar <span class="required">*</span></label>
                    <input type="text" class="form-control @error('kamar') is-invalid @enderror" 
                           id="kamar" name="kamar" value="{{ old('kamar') }}" placeholder="Contoh: 101" required>
                    @error('kamar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="kelas" class="form-label">Kelas <span class="required">*</span></label>
                    <select class="form-select @error('kelas') is-invalid @enderror" id="kelas" name="kelas" required>
                        <option value="">Pilih Kelas</option>
                        <option value="VIP" {{ old('kelas') == 'VIP' ? 'selected' : '' }}>VIP</option>
                        <option value="Kelas 1" {{ old('kelas') == 'Kelas 1' ? 'selected' : '' }}>Kelas 1</option>
                        <option value="Kelas 2" {{ old('kelas') == 'Kelas 2' ? 'selected' : '' }}>Kelas 2</option>
                        <option value="Kelas 3" {{ old('kelas') == 'Kelas 3' ? 'selected' : '' }}>Kelas 3</option>
                    </select>
                    @error('kelas')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-md-6 mb-3">
                    <label for="diagnosa" class="form-label">Diagnosa</label>
                    <input type="text" class="form-control @error('diagnosa') is-invalid @enderror" 
                           id="diagnosa" name="diagnosa" value="{{ old('diagnosa') }}">
                    @error('diagnosa')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('rawat-inap.index') }}" class="btn btn-secondary">
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

