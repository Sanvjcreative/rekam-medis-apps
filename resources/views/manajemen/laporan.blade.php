@extends('layouts.app')

@section('title', 'Laporan')
@section('page-title', 'Manajemen - Laporan')

@push('styles')
<style>
    .dataTables_wrapper .dataTables_filter { float: right; }
    .dataTables_wrapper .dataTables_length { float: left; }
    .table th { background-color: #f8f9fa; font-weight: 600; }
</style>
@endpush

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="bi bi-file-earmark-text"></i> Data Laporan</h5>
        <a href="#" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-circle"></i> Generate Laporan
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="laporanTable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Jenis Laporan</th>
                        <th>Periode</th>
                        <th>Tanggal Dibuat</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $jenisLaporan = ['Laporan Harian', 'Laporan Bulanan', 'Laporan Tahunan', 'Laporan Pasien', 'Laporan Keuangan'];
                    @endphp
                    @foreach($jenisLaporan as $index => $jenis)
                    @for($j = 1; $j <= 4; $j++)
                    <tr>
                        <td>{{ ($index * 4) + $j }}</td>
                        <td>{{ $jenis }}</td>
                        <td>{{ now()->subMonths($j)->format('M Y') }}</td>
                        <td>{{ now()->subDays(rand(1, 30))->format('d/m/Y H:i') }}</td>
                        <td>
                            <span class="badge bg-{{ ['success', 'warning'][rand(0, 1)] }}">
                                {{ ['Selesai', 'Proses'][rand(0, 1)] }}
                            </span>
                        </td>
                        <td>
                            <button class="btn btn-sm btn-info" title="Detail"><i class="bi bi-eye"></i></button>
                            <button class="btn btn-sm btn-primary" title="Download"><i class="bi bi-download"></i></button>
                        </td>
                    </tr>
                    @endfor
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#laporanTable').DataTable({
            dom: 'Bfrtip',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
            language: { url: 'https://cdn.datatables.net/plug-ins/1.13.7/i18n/id.json' },
            order: [[0, 'desc']],
            pageLength: 25
        });
    });
</script>
@endpush

