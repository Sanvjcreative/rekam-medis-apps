@extends('layouts.app')

@section('title', 'Tambah Transaksi Kasir')
@section('page-title', 'Tambah Transaksi Kasir')

@push('styles')
<style>
    .form-label { font-weight: 600; color: #1e293b; }
    .required { color: red; }
</style>
@endpush

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="bi bi-cash-register"></i> Form Transaksi Kasir Baru</h5>
        <a href="{{ route('kasir.index') }}" class="btn btn-secondary btn-sm">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('kasir.store') }}">
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
                    <label for="tanggal" class="form-label">Tanggal <span class="required">*</span></label>
                    <input type="date" class="form-control @error('tanggal') is-invalid @enderror" 
                           id="tanggal" name="tanggal" 
                           value="{{ old('tanggal', date('Y-m-d')) }}" required>
                    @error('tanggal')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-md-6 mb-3">
                    <label for="total_tagihan" class="form-label">Total Tagihan <span class="required">*</span></label>
                    <input type="number" class="form-control @error('total_tagihan') is-invalid @enderror" 
                           id="total_tagihan" name="total_tagihan" value="{{ old('total_tagihan') }}" 
                           step="0.01" min="0" required>
                    @error('total_tagihan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="bayar" class="form-label">Bayar <span class="required">*</span></label>
                    <input type="number" class="form-control @error('bayar') is-invalid @enderror" 
                           id="bayar" name="bayar" value="{{ old('bayar') }}" 
                           step="0.01" min="0" required>
                    @error('bayar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-md-6 mb-3">
                    <label class="form-label">Kembalian</label>
                    <input type="text" class="form-control" id="kembalian" readonly 
                           value="0" style="background-color: #f8f9fa;">
                </div>
            </div>
            
            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('kasir.index') }}" class="btn btn-secondary">
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

@push('scripts')
<script>
    document.getElementById('bayar').addEventListener('input', function() {
        const total = parseFloat(document.getElementById('total_tagihan').value) || 0;
        const bayar = parseFloat(this.value) || 0;
        const kembalian = Math.max(0, bayar - total);
        document.getElementById('kembalian').value = kembalian.toLocaleString('id-ID');
    });
</script>
@endpush

