@extends('layouts.app')

@section('title', 'Pendaftaran Pasien')
@section('page-title', 'Pendaftaran Pasien')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="bi bi-person-plus"></i> Pendaftaran Pasien</h5>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('pasien.pendaftaran.store') }}">
            @csrf
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="no_rm" class="form-label">No. RM <span class="required" style="color:red">*</span></label>
                    <input type="text" class="form-control @error('no_rm') is-invalid @enderror" 
                           id="no_rm" name="no_rm" value="{{ old('no_rm') }}" 
                           placeholder="Masukkan No. RM" required>
                    @error('no_rm')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-md-6 mb-3">
                    <label for="nama_pasien" class="form-label">Nama Pasien <span class="required" style="color:red">*</span></label>
                    <input type="text" class="form-control @error('nama_pasien') is-invalid @enderror" 
                           id="nama_pasien" name="nama_pasien" value="{{ old('nama_pasien', auth()->user()->name) }}" 
                           placeholder="Masukkan Nama Pasien" required>
                    @error('nama_pasien')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="tanggal_daftar" class="form-label">Tanggal Daftar <span class="required" style="color:red">*</span></label>
                    <input type="date" class="form-control @error('tanggal_daftar') is-invalid @enderror" 
                           id="tanggal_daftar" name="tanggal_daftar" value="{{ old('tanggal_daftar', date('Y-m-d')) }}" required>
                    @error('tanggal_daftar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-md-6 mb-3">
                    <label for="poli" class="form-label">Poli <span class="required" style="color:red">*</span></label>
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
                    <label for="dokter" class="form-label">Dokter <span class="required" style="color:red">*</span></label>
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
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select" id="status" name="status">
                        <option value="Dalam Antrian" {{ old('status', 'Dalam Antrian') == 'Dalam Antrian' ? 'selected' : '' }}>Dalam Antrian</option>
                        <option value="Proses" {{ old('status') == 'Proses' ? 'selected' : '' }}>Proses</option>
                        <option value="Selesai" {{ old('status') == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                    </select>
                </div>
            </div>
            
            <div class="mb-3">
                <label for="keluhan" class="form-label">Keluhan</label>
                <textarea class="form-control @error('keluhan') is-invalid @enderror" 
                          id="keluhan" name="keluhan" rows="3" 
                          placeholder="Masukkan keluhan Anda">{{ old('keluhan') }}</textarea>
                @error('keluhan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="d-flex justify-content-end gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-send"></i> Kirim Pendaftaran
                </button>
            </div>
        </form>
    </div>
</div>
@endsection


