@extends('layouts.app')

@section('title', 'Tambah Rawat Jalan')
@section('page-title', 'Tambah Rawat Jalan')

@push('styles')
<style>
    .form-label { font-weight: 600; color: #1e293b; }
    .required { color: red; }
</style>
@endpush

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="bi bi-person-walking"></i> Form Kunjungan Rawat Jalan Baru</h5>
        <a href="{{ route('rawat-jalan.index') }}" class="btn btn-secondary btn-sm">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('rawat-jalan.store') }}">
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
                    <label for="tanggal_kunjungan" class="form-label">Tanggal Kunjungan <span class="required">*</span></label>
                    <input type="date" class="form-control @error('tanggal_kunjungan') is-invalid @enderror" 
                           id="tanggal_kunjungan" name="tanggal_kunjungan" 
                           value="{{ old('tanggal_kunjungan', date('Y-m-d')) }}" required>
                    @error('tanggal_kunjungan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-md-6 mb-3">
                    <label for="poli" class="form-label">Poli <span class="required">*</span></label>
                    <select class="form-select @error('poli') is-invalid @enderror" id="poli" name="poli" required>
                        <option value="">Pilih Poli</option>
                        <option value="Umum" {{ old('poli') == 'Umum' ? 'selected' : '' }}>Poli Umum</option>
                        <option value="Anak" {{ old('poli') == 'Anak' ? 'selected' : '' }}>Poli Anak</option>
                        <option value="Gigi" {{ old('poli') == 'Gigi' ? 'selected' : '' }}>Poli Gigi</option>
                        <option value="Mata" {{ old('poli') == 'Mata' ? 'selected' : '' }}>Poli Mata</option>
                    </select>
                    @error('poli')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="dokter" class="form-label">Dokter <span class="required">*</span></label>
                    <select class="form-select @error('dokter') is-invalid @enderror" id="dokter" name="dokter" required>
                        <option value="">Pilih Dokter</option>
                        <option value="Dr. Ahmad" {{ old('dokter') == 'Dr. Ahmad' ? 'selected' : '' }}>Dr. Ahmad</option>
                        <option value="Dr. Siti" {{ old('dokter') == 'Dr. Siti' ? 'selected' : '' }}>Dr. Siti</option>
                        <option value="Dr. Budi" {{ old('dokter') == 'Dr. Budi' ? 'selected' : '' }}>Dr. Budi</option>
                        <option value="Dr. Dewi" {{ old('dokter') == 'Dr. Dewi' ? 'selected' : '' }}>Dr. Dewi</option>
                    </select>
                    @error('dokter')
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
            
            <div class="mb-3">
                <label for="keluhan" class="form-label">Keluhan</label>
                <textarea class="form-control @error('keluhan') is-invalid @enderror" 
                          id="keluhan" name="keluhan" rows="3">{{ old('keluhan') }}</textarea>
                @error('keluhan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('rawat-jalan.index') }}" class="btn btn-secondary">
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

