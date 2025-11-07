@extends('layouts.app')

@section('title', 'Manajemen')
@section('page-title', 'Manajemen')

@section('content')
<div class="row">
    <div class="col-md-4 mb-4">
        <a href="{{ route('manajemen.petugas') }}" class="text-decoration-none">
            <div class="card text-center h-100">
                <div class="card-body">
                    <i class="bi bi-person-badge" style="font-size: 3rem; color: #14b8a6;"></i>
                    <h5 class="mt-3">Data Petugas</h5>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-4 mb-4">
        <a href="{{ route('manajemen.poli') }}" class="text-decoration-none">
            <div class="card text-center h-100">
                <div class="card-body">
                    <i class="bi bi-building" style="font-size: 3rem; color: #14b8a6;"></i>
                    <h5 class="mt-3">Data Poli</h5>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-4 mb-4">
        <a href="{{ route('manajemen.obat') }}" class="text-decoration-none">
            <div class="card text-center h-100">
                <div class="card-body">
                    <i class="bi bi-capsule" style="font-size: 3rem; color: #14b8a6;"></i>
                    <h5 class="mt-3">Data Obat</h5>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-4 mb-4">
        <a href="{{ route('manajemen.pasien') }}" class="text-decoration-none">
            <div class="card text-center h-100">
                <div class="card-body">
                    <i class="bi bi-people" style="font-size: 3rem; color: #14b8a6;"></i>
                    <h5 class="mt-3">Data Pasien</h5>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-4 mb-4">
        <a href="{{ route('manajemen.rekam-medis') }}" class="text-decoration-none">
            <div class="card text-center h-100">
                <div class="card-body">
                    <i class="bi bi-file-medical" style="font-size: 3rem; color: #14b8a6;"></i>
                    <h5 class="mt-3">Rekam Medis</h5>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-4 mb-4">
        <a href="{{ route('manajemen.laporan') }}" class="text-decoration-none">
            <div class="card text-center h-100">
                <div class="card-body">
                    <i class="bi bi-file-earmark-text" style="font-size: 3rem; color: #14b8a6;"></i>
                    <h5 class="mt-3">Laporan</h5>
                </div>
            </div>
        </a>
    </div>
</div>
@endsection

