@extends('layouts.app')

@section('title', 'Edit Pemeriksaan Radiologi')
@section('page-title', 'Edit Pemeriksaan Radiologi')

@push('styles')
<style>
    .form-label { font-weight: 600; color: #1e293b; }
    .required { color: red; }
</style>
@endpush

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="bi bi-radar"></i> Form Edit Pemeriksaan Radiologi</h5>
        <a href="{{ route('radiologi.index') }}" class="btn btn-secondary btn-sm">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('radiologi.update', $id) }}">
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
                    <label for="jenis_pemeriksaan" class="form-label">Jenis Pemeriksaan <span class="required">*</span></label>
                    <select class="form-select @error('jenis_pemeriksaan') is-invalid @enderror" 
                            id="jenis_pemeriksaan" name="jenis_pemeriksaan" required>
                        <option value="">Pilih Jenis Pemeriksaan</option>
                        <option value="X-Ray Thorax" {{ old('jenis_pemeriksaan') == 'X-Ray Thorax' ? 'selected' : '' }}>X-Ray Thorax</option>
                        <option value="USG Abdomen" {{ old('jenis_pemeriksaan') == 'USG Abdomen' ? 'selected' : '' }}>USG Abdomen</option>
                        <option value="CT Scan" {{ old('jenis_pemeriksaan') == 'CT Scan' ? 'selected' : '' }}>CT Scan</option>
                        <option value="MRI" {{ old('jenis_pemeriksaan') == 'MRI' ? 'selected' : '' }}>MRI</option>
                    </select>
                    @error('jenis_pemeriksaan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class="mb-3">
                <label for="hasil" class="form-label">Hasil</label>
                <textarea class="form-control @error('hasil') is-invalid @enderror" 
                          id="hasil" name="hasil" rows="3">{{ old('hasil') }}</textarea>
                @error('hasil')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('radiologi.index') }}" class="btn btn-secondary">
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

