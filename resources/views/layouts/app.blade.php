<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Rekam Medis')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css">
    <style>
        :root {
            --primary-color: #2563eb;
            --sidebar-width: 250px;
            --sidebar-bg: #1e293b;
            --sidebar-hover: #334155;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6fb;
            color: #0f172a;
        }
        
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: var(--sidebar-width);
            background-color: var(--sidebar-bg);
            color: white;
            padding: 0;
            z-index: 1000;
            overflow-y: auto;
            transition: all 0.3s;
        }
        
        .sidebar-header {
            padding: 1.5rem;
            background-color: #0f172a;
            border-bottom: 1px solid #334155;
        }
        
        .sidebar-header h4 {
            margin: 0;
            color: white;
            font-weight: 600;
        }
        
        .sidebar-menu {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .sidebar-menu li {
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .sidebar-menu a {
            display: flex;
            align-items: center;
            padding: 1rem 1.5rem;
            color: #cbd5e1;
            text-decoration: none;
            transition: all 0.3s;
        }
        
        .sidebar-menu a:hover {
            background-color: var(--sidebar-hover);
            color: white;
            padding-left: 2rem;
        }
        
        .sidebar-menu a.menu-toggle:hover {
            padding-left: 1.5rem;
        }
        
        .sidebar-submenu a:hover {
            background-color: var(--sidebar-hover);
            color: white;
            padding-left: 3.5rem;
        }
        
        .sidebar-menu a.active {
            background-color: var(--primary-color);
            color: white;
        }
        
        .sidebar-menu a i {
            margin-right: 0.75rem;
            width: 20px;
            font-size: 1.1rem;
        }
        
        .sidebar-menu a .bi-chevron-down {
            margin-left: auto;
            margin-right: 0;
            transition: transform 0.3s;
        }
        
        .sidebar-menu a[aria-expanded="true"] .bi-chevron-down {
            transform: rotate(180deg);
        }
        
        .sidebar-submenu {
            list-style: none;
            padding: 0;
            margin: 0;
            background-color: rgba(0, 0, 0, 0.2);
            display: none;
        }
        
        .sidebar-submenu.show {
            display: block;
        }
        
        .sidebar-submenu li {
            border-bottom: none;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .sidebar-submenu a {
            padding-left: 3rem;
            font-size: 0.9rem;
        }
        
        .main-content {
            margin-left: var(--sidebar-width);
            padding: 2rem;
            min-height: 100vh;
            background: linear-gradient(180deg, #f7f9ff 0%, #f4f6fb 100%);
        }
        
        .topbar {
            background-color: transparent;
            padding: 0 0 1.5rem 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .topbar-shell {
            background: #ffffff;
            border-radius: 16px;
            padding: 1rem 1.25rem;
            width: 100%;
            box-shadow: 0 10px 30px rgba(2, 6, 23, 0.06);
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 1rem;
        }

        .search-input {
            display: flex;
            align-items: center;
            gap: .75rem;
            background: #f3f6ff;
            border-radius: 12px;
            padding: .65rem .9rem;
            width: 42%;
        }
        .search-input input {
            border: none;
            background: transparent;
            outline: none;
            width: 100%;
        }

        .toolbar-actions {
            display: flex;
            align-items: center;
            gap: .75rem;
        }
        .btn-soft {
            background: #eef2ff;
            color: #4f46e5;
            border: none;
        }
        .btn-soft:hover { background: #e0e7ff; }
        
        .user-menu {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        
        .card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(2, 6, 23, 0.06);
            margin-bottom: 1.5rem;
        }
        
        .card-header {
            background-color: white;
            border-bottom: 1px solid #eef2ff;
            padding: 1.25rem;
            font-weight: 600;
        }

        /* Utility: colorful tiles (for future use) */
        .tile {
            border: none;
            color: #fff;
            border-radius: 16px;
            padding: 1.25rem;
            box-shadow: 0 12px 24px rgba(2, 6, 23, 0.08);
        }
        .tile-red { background: #f05454; }
        .tile-indigo { background: #6366f1; }
        .tile-amber { background: #f59e0b; }
        
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }
            
            .sidebar.show {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0;
            }
        }
    </style>
    @stack('styles')
</head>
<body>
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <h4><i class="bi bi-hospital"></i> Rekam Medis</h4>
        </div>
        <ul class="sidebar-menu">
            <li>
                <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <i class="bi bi-speedometer2"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            
            {{-- Manajemen (Admin Only) - Posisi setelah Dashboard --}}
            @if(auth()->user()->hasRole('admin'))
            <li>
                <a href="{{ route('manajemen.index') }}" class="menu-toggle {{ request()->routeIs('manajemen.*') ? 'active' : '' }}" data-toggle="manajemen" aria-expanded="false">
                    <i class="bi bi-people"></i>
                    <span>Manajemen</span>
                    <i class="bi bi-chevron-down"></i>
                </a>
                <ul class="sidebar-submenu" id="submenu-manajemen">
                    <li><a href="{{ route('manajemen.petugas') }}">Data Petugas</a></li>
                    <li><a href="{{ route('manajemen.poli') }}">Data Poli</a></li>
                    <li><a href="{{ route('manajemen.obat') }}">Data Obat</a></li>
                    <li><a href="{{ route('manajemen.pasien') }}">Data Pasien</a></li>
                    <li><a href="{{ route('manajemen.rekam-medis') }}">Rekam Medis</a></li>
                    <li><a href="{{ route('manajemen.laporan') }}">Laporan</a></li>
                </ul>
            </li>
            @endif
            
            {{-- Pendaftaran (Admin & Petugas) --}}
            @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('petugas'))
            <li>
                <a href="{{ route('pendaftaran.index') }}" class="{{ request()->routeIs('pendaftaran.*') ? 'active' : '' }}">
                    <i class="bi bi-person-plus"></i>
                    <span>Pendaftaran</span>
                </a>
            </li>
            
            {{-- IGD (Admin & Petugas) --}}
            <li>
                <a href="{{ route('igd.index') }}" class="{{ request()->routeIs('igd.*') ? 'active' : '' }}">
                    <i class="bi bi-heart-pulse"></i>
                    <span>IGD</span>
                </a>
            </li>
            
            {{-- Rawat Jalan (Admin & Petugas) --}}
            <li>
                <a href="{{ route('rawat-jalan.index') }}" class="{{ request()->routeIs('rawat-jalan.*') ? 'active' : '' }}">
                    <i class="bi bi-person-walking"></i>
                    <span>Rawat Jalan</span>
                </a>
            </li>
            
            {{-- Rawat Inap (Admin & Petugas) --}}
            <li>
                <a href="{{ route('rawat-inap.index') }}" class="{{ request()->routeIs('rawat-inap.*') ? 'active' : '' }}">
                    <i class="bi bi-hospital"></i>
                    <span>Rawat Inap</span>
                </a>
            </li>
            
            {{-- Kasir (Admin & Petugas) --}}
            <li>
                <a href="{{ route('kasir.index') }}" class="{{ request()->routeIs('kasir.*') ? 'active' : '' }}">
                    <i class="bi bi-cash-stack"></i>
                    <span>Kasir</span>
                </a>
            </li>
            
            {{-- Apotik (Admin & Petugas) --}}
            <li>
                <a href="{{ route('apotik.index') }}" class="{{ request()->routeIs('apotik.*') ? 'active' : '' }}">
                    <i class="bi bi-capsule-pill"></i>
                    <span>Apotik</span>
                </a>
            </li>
            
            {{-- Laboratorium (Admin & Petugas) --}}
            <li>
                <a href="{{ route('laboratorium.index') }}" class="{{ request()->routeIs('laboratorium.*') ? 'active' : '' }}">
                    <i class="bi bi-droplet"></i>
                    <span>Laboratorium</span>
                </a>
            </li>
            
            {{-- Radiologi (Admin & Petugas) --}}
            <li>
                <a href="{{ route('radiologi.index') }}" class="{{ request()->routeIs('radiologi.*') ? 'active' : '' }}">
                    <i class="bi bi-radar"></i>
                    <span>Radiologi</span>
                </a>
            </li>
            
            {{-- Gizi (Admin & Petugas) --}}
            <li>
                <a href="{{ route('gizi.index') }}" class="{{ request()->routeIs('gizi.*') ? 'active' : '' }}">
                    <i class="bi bi-egg-fried"></i>
                    <span>Gizi</span>
                </a>
            </li>
            @endif
            
            {{-- Storage (Admin Only) --}}
            @if(auth()->user()->hasRole('admin'))
            <li>
                <a href="{{ route('storage.index') }}" class="{{ request()->routeIs('storage.*') ? 'active' : '' }}">
                    <i class="bi bi-box-seam"></i>
                    <span>Storage</span>
                </a>
            </li>
            
            {{-- Laundry (Admin Only) --}}
            <li>
                <a href="{{ route('laundry.index') }}" class="{{ request()->routeIs('laundry.*') ? 'active' : '' }}">
                    <i class="bi bi-shop"></i>
                    <span>Laundry</span>
                </a>
            </li>
            @endif
            
            {{-- Menu untuk Pasien --}}
            @if(auth()->user()->hasRole('pasien'))
            <li>
                <a href="{{ route('pasien.pendaftaran') }}" class="{{ request()->routeIs('pasien.pendaftaran') ? 'active' : '' }}">
                    <i class="bi bi-person-plus"></i>
                    <span>Pendaftaran</span>
                </a>
            </li>
            <li>
                <a href="{{ route('pasien.riwayat') }}" class="{{ request()->routeIs('pasien.riwayat') ? 'active' : '' }}">
                    <i class="bi bi-clock-history"></i>
                    <span>Riwayat Pemeriksaan</span>
                </a>
            </li>
            <li>
                <a href="{{ route('pasien.rekam-medis') }}" class="{{ request()->routeIs('pasien.rekam-medis') ? 'active' : '' }}">
                    <i class="bi bi-file-medical"></i>
                    <span>Rekam Medis Saya</span>
                </a>
            </li>
            @endif
        </ul>
    </div>
    
    <div class="main-content">
        <div class="topbar">
            <div class="topbar-shell">
                <div class="d-flex align-items-center gap-2">
                    <button class="btn btn-sm btn-soft d-md-none" id="sidebarToggle"><i class="bi bi-list"></i></button>
                    <h5 class="mb-0 d-none d-md-inline">@yield('page-title', 'Dashboard')</h5>
                </div>

                <div class="search-input d-none d-md-flex">
                    <i class="bi bi-search"></i>
                    <input type="text" placeholder="Search" aria-label="Search">
                </div>

                <div class="toolbar-actions">
                    <button class="btn btn-soft btn-sm"><i class="bi bi-grid-3x3-gap"></i></button>
                    <button class="btn btn-soft btn-sm"><i class="bi bi-bell"></i></button>
                    <div class="user-menu">
                        <span class="text-muted">
                            <i class="bi bi-person-circle"></i>
                            {{ auth()->user()->name }}
                            <span class="badge bg-primary ms-2">{{ auth()->user()->roles->first()->name ?? 'User' }}</span>
                        </span>
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-outline-danger ms-2">
                                <i class="bi bi-box-arrow-right"></i> Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif
        
        @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif
        
        @yield('content')
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
    <script>
        document.getElementById('sidebarToggle')?.addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('show');
        });
        
        // Toggle submenu
        document.querySelectorAll('.menu-toggle').forEach(function(toggle) {
            toggle.addEventListener('click', function(e) {
                e.preventDefault();
                const submenuId = 'submenu-' + this.getAttribute('data-toggle');
                const submenu = document.getElementById(submenuId);
                const isExpanded = this.getAttribute('aria-expanded') === 'true';
                
                // Close all submenus
                document.querySelectorAll('.sidebar-submenu').forEach(function(menu) {
                    menu.classList.remove('show');
                });
                document.querySelectorAll('.menu-toggle').forEach(function(btn) {
                    btn.setAttribute('aria-expanded', 'false');
                });
                
                // Toggle current submenu
                if (!isExpanded) {
                    submenu.classList.add('show');
                    this.setAttribute('aria-expanded', 'true');
                }
            });
        });

        // Global SweetAlert helpers
        window.confirmDelete = function(id) {
            Swal.fire({
                title: 'Hapus data ini?',
                text: 'Tindakan ini tidak dapat dibatalkan.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc3545',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, hapus',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    const form = document.getElementById('delete-form-' + id);
                    if (form) form.submit();
                }
            });
        }

        @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: @json(session('success')),
            confirmButtonColor: '#2563eb'
        });
        @endif

        @if(session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Terjadi Kesalahan',
            text: @json(session('error')),
            confirmButtonColor: '#ef4444'
        });
        @endif
    </script>
    @stack('scripts')
</body>
</html>

