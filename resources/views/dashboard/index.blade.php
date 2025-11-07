@extends('layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@push('styles')
<style>
    .menu-card {
        background: #ffffff;
        border-radius: 16px;
        padding: 1.5rem 1.25rem;
        text-align: center;
        transition: all 0.25s ease;
        cursor: pointer;
        border: 2px solid transparent;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        box-shadow: 0 10px 24px rgba(2,6,23,.06);
        gap: .75rem;
    }
    
    .menu-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        border-color: #2563eb;
    }
    
    .icon-wrap {
        width: 64px;
        height: 64px;
        border-radius: 16px;
        display: grid;
        place-items: center;
        color: #fff;
        box-shadow: 0 12px 24px rgba(2,6,23,.08);
    }
    .icon-wrap i { font-size: 1.75rem; }
    .mc-indigo { background: linear-gradient(135deg,#6366f1,#4f46e5); }
    .mc-rose { background: linear-gradient(135deg,#f43f5e,#e11d48); }
    .mc-amber { background: linear-gradient(135deg,#f59e0b,#d97706); }
    .mc-emerald { background: linear-gradient(135deg,#10b981,#059669); }
    .mc-sky { background: linear-gradient(135deg,#0ea5e9,#0284c7); }
    .mc-violet { background: linear-gradient(135deg,#8b5cf6,#7c3aed); }
    .mc-pink { background: linear-gradient(135deg,#ec4899,#db2777); }
    .mc-slate { background: linear-gradient(135deg,#334155,#0f172a); }
    
    .menu-card h5 {
        margin: 0;
        font-weight: 600;
        color: #1e293b;
    }
    
    .stat-card {
        text-align: center;
        padding: 1rem;
        cursor: pointer;
        transition: all 0.3s;
        border-radius: 8px;
    }
    
    .stat-card:hover {
        background-color: #f1f5f9;
    }
    
    .stat-card i { font-size: 1.25rem; }
    .stat-icon {
        width: 38px; height: 38px; border-radius: 10px; display:grid; place-items:center; color:#fff;
        box-shadow: 0 8px 18px rgba(2,6,23,.08);
    }
    .si-emerald{background:#10b981}
    .si-indigo{background:#6366f1}
    .si-rose{background:#f43f5e}
    .si-amber{background:#f59e0b}
    .si-sky{background:#0ea5e9}
    .si-violet{background:#8b5cf6}
    
    .stat-card span {
        display: block;
        font-size: 0.9rem;
        color: #64748b;
        margin-top: 0.5rem;
    }
    
    .sync-info {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-bottom: 2rem;
    }
</style>
@endpush

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 mb-0"><strong>Dashboard</strong></h1>
    <div class="sync-info">
        <button class="btn btn-sm btn-primary">
            <i class="bi bi-arrow-repeat"></i> Sync
        </button>
        <span class="text-muted">Tersinkronisasi {{ now()->diffForHumans() }}</span>
    </div>
</div>

{{-- Menu Cards Grid --}}
<div class="row g-4 mb-5">
    @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('petugas'))
    {{-- Pendaftaran --}}
    <div class="col-md-3 col-sm-6">
        <a href="{{ route('pendaftaran.index') }}" class="text-decoration-none">
            <div class="menu-card">
                <div class="icon-wrap mc-indigo"><i class="bi bi-person-plus-fill"></i></div>
                <h5>Pendaftaran</h5>
            </div>
        </a>
    </div>
    
    {{-- IGD --}}
    <div class="col-md-3 col-sm-6">
        <a href="{{ route('igd.index') }}" class="text-decoration-none">
            <div class="menu-card">
                <div class="icon-wrap mc-rose"><i class="bi bi-heart-pulse-fill"></i></div>
                <h5>IGD</h5>
            </div>
        </a>
    </div>
    
    {{-- Rawat Jalan --}}
    <div class="col-md-3 col-sm-6">
        <a href="{{ route('rawat-jalan.index') }}" class="text-decoration-none">
            <div class="menu-card">
                <div class="icon-wrap mc-emerald"><i class="bi bi-person-walking"></i></div>
                <h5>Rawat Jalan</h5>
            </div>
        </a>
    </div>
    
    {{-- Rawat Inap --}}
    <div class="col-md-3 col-sm-6">
        <a href="{{ route('rawat-inap.index') }}" class="text-decoration-none">
            <div class="menu-card">
                <div class="icon-wrap mc-amber"><i class="bi bi-hospital-fill"></i></div>
                <h5>Rawat Inap</h5>
            </div>
        </a>
    </div>
    
    {{-- Kasir --}}
    <div class="col-md-3 col-sm-6">
        <a href="{{ route('kasir.index') }}" class="text-decoration-none">
            <div class="menu-card">
                <div class="icon-wrap mc-sky"><i class="bi bi-cash-stack"></i></div>
                <h5>Kasir</h5>
            </div>
        </a>
    </div>
    
    {{-- Apotik --}}
    <div class="col-md-3 col-sm-6">
        <a href="{{ route('apotik.index') }}" class="text-decoration-none">
            <div class="menu-card">
                <div class="icon-wrap mc-violet"><i class="bi bi-capsule-pill"></i></div>
                <h5>Apotik</h5>
            </div>
        </a>
    </div>
    
    {{-- Laboratorium --}}
    <div class="col-md-3 col-sm-6">
        <a href="{{ route('laboratorium.index') }}" class="text-decoration-none">
            <div class="menu-card">
                <div class="icon-wrap mc-indigo"><i class="bi bi-droplet"></i></div>
                <h5>Laboratorium</h5>
            </div>
        </a>
    </div>
    
    {{-- Radiologi --}}
    <div class="col-md-3 col-sm-6">
        <a href="{{ route('radiologi.index') }}" class="text-decoration-none">
            <div class="menu-card">
                <div class="icon-wrap mc-pink"><i class="bi bi-radar"></i></div>
                <h5>Radiologi</h5>
            </div>
        </a>
    </div>
    
    {{-- Gizi --}}
    <div class="col-md-3 col-sm-6">
        <a href="{{ route('gizi.index') }}" class="text-decoration-none">
            <div class="menu-card">
                <div class="icon-wrap mc-amber"><i class="bi bi-egg-fried"></i></div>
                <h5>Gizi</h5>
            </div>
        </a>
    </div>
    @endif
    
    @if(auth()->user()->hasRole('admin'))
    {{-- Storage --}}
    <div class="col-md-3 col-sm-6">
        <a href="{{ route('storage.index') }}" class="text-decoration-none">
            <div class="menu-card">
                <div class="icon-wrap mc-slate"><i class="bi bi-box-seam"></i></div>
                <h5>Storage</h5>
            </div>
        </a>
    </div>
    
    {{-- Manajemen --}}
    <div class="col-md-3 col-sm-6">
        <a href="{{ route('manajemen.index') }}" class="text-decoration-none">
            <div class="menu-card">
                <div class="icon-wrap mc-emerald"><i class="bi bi-people-fill"></i></div>
                <h5>Manajemen</h5>
            </div>
        </a>
    </div>
    
    {{-- Laundry --}}
    <div class="col-md-3 col-sm-6">
        <a href="{{ route('laundry.index') }}" class="text-decoration-none">
            <div class="menu-card">
                <div class="icon-wrap mc-sky"><i class="bi bi-shop"></i></div>
                <h5>Laundry</h5>
            </div>
        </a>
    </div>
    @endif
    
    @if(auth()->user()->hasRole('pasien'))
    {{-- Menu untuk Pasien --}}
    <div class="col-md-3 col-sm-6">
        <a href="#" class="text-decoration-none">
            <div class="menu-card">
                <div class="icon-wrap mc-indigo"><i class="bi bi-person-plus-fill"></i></div>
                <h5>Pendaftaran</h5>
            </div>
        </a>
    </div>
    
    <div class="col-md-3 col-sm-6">
        <a href="#" class="text-decoration-none">
            <div class="menu-card">
                <div class="icon-wrap mc-amber"><i class="bi bi-clock-history"></i></div>
                <h5>Riwayat Pemeriksaan</h5>
            </div>
        </a>
    </div>
    
    <div class="col-md-3 col-sm-6">
        <a href="#" class="text-decoration-none">
            <div class="menu-card">
                <div class="icon-wrap mc-violet"><i class="bi bi-file-medical"></i></div>
                <h5>Rekam Medis Saya</h5>
            </div>
        </a>
    </div>
    @endif
</div>

{{-- Statistik Sistem --}}
@if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('petugas'))
<div class="card mt-4">
    <div class="card-header">
        <h5 class="mb-0"><strong>Statistik Sistem</strong></h5>
    </div>
    <div class="card-body">
        <div class="row g-3">
            <div class="col-md-2 col-sm-4 col-6">
                <div class="stat-card d-flex flex-column align-items-center">
                    <div class="stat-icon si-emerald"><i class="bi bi-person-walking"></i></div>
                    <span>Pasien</span>
                </div>
            </div>
            <div class="col-md-2 col-sm-4 col-6">
                <div class="stat-card d-flex flex-column align-items-center">
                    <div class="stat-icon si-sky"><i class="bi bi-car-front"></i></div>
                    <span>Rawat Jalan</span>
                </div>
            </div>
            <div class="col-md-2 col-sm-4 col-6">
                <div class="stat-card d-flex flex-column align-items-center">
                    <div class="stat-icon si-rose"><i class="bi bi-heart-pulse"></i></div>
                    <span>Emergency</span>
                </div>
            </div>
            <div class="col-md-2 col-sm-4 col-6">
                <div class="stat-card d-flex flex-column align-items-center">
                    <div class="stat-icon si-amber"><i class="bi bi-hospital"></i></div>
                    <span>Rawat Inap</span>
                </div>
            </div>
            <div class="col-md-2 col-sm-4 col-6">
                <div class="stat-card d-flex flex-column align-items-center">
                    <div class="stat-icon si-indigo"><i class="bi bi-radar"></i></div>
                    <span>Radiologi</span>
                </div>
            </div>
            <div class="col-md-2 col-sm-4 col-6">
                <div class="stat-card d-flex flex-column align-items-center">
                    <div class="stat-icon si-violet"><i class="bi bi-droplet"></i></div>
                    <span>Laboratorium</span>
                </div>
            </div>
            @if(auth()->user()->hasRole('admin'))
            <div class="col-md-2 col-sm-4 col-6">
                <div class="stat-card d-flex flex-column align-items-center">
                    <div class="stat-icon si-emerald"><i class="bi bi-people"></i></div>
                    <span>Management</span>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endif
@endsection

