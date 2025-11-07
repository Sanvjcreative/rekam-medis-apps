@extends('layouts.app')

@section('title', 'Edit Diet Gizi')
@section('page-title', 'Edit Diet Gizi')

@push('styles')
<style>
    .form-label { font-weight: 600; color: #1e293b; }
    .required { color: red; }
</style>
@endpush

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="bi bi-egg-fried"></i> Form Edit Diet Gizi</h5>
        <a href="{{ route('gizi.index') }}" class="btn btn-secondary btn-sm">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('gizi.update', $id) }}">
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
                    <label for="tanggal" class="form-label">Tanggal <span class="required">*</span></label>
                    <input type="date" class="form-control @error('tanggal') is-invalid @enderror" 
                           id="tanggal" name="tanggal" 
                           value="{{ old('tanggal', date('Y-m-d')) }}" required>
                    @error('tanggal')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-md-6 mb-3">
                    <label for="jenis_diet" class="form-label">Jenis Diet <span class="required">*</span></label>
                    <select class="form-select @error('jenis_diet') is-invalid @enderror" 
                            id="jenis_diet" name="jenis_diet" required>
                        <option value="">Pilih Jenis Diet</option>
                        <option value="Diet Rendah Garam" {{ old('jenis_diet') == 'Diet Rendah Garam' ? 'selected' : '' }}>Diet Rendah Garam</option>
                        <option value="Diet Rendah Gula" {{ old('jenis_diet') == 'Diet Rendah Gula' ? 'selected' : '' }}>Diet Rendah Gula</option>
                        <option value="Diet Rendah Lemak" {{ old('jenis_diet') == 'Diet Rendah Lemak' ? 'selected' : '' }}>Diet Rendah Lemak</option>
                        <option value="Diet Normal" {{ old('jenis_diet') == 'Diet Normal' ? 'selected' : '' }}>Diet Normal</option>
                    </select>
                    @error('jenis_diet')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class="mb-3">
                <label for="kalori" class="form-label">Kalori (kkal) <span class="required">*</span></label>
                <input type="number" class="form-control @error('kalori') is-invalid @enderror" 
                       id="kalori" name="kalori" value="{{ old('kalori') }}" 
                       min="0" step="1" required>
                @error('kalori')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('gizi.index') }}" class="btn btn-secondary">
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

