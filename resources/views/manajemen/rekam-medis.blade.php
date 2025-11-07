@extends('layouts.app')

@section('title', 'Rekam Medis')
@section('page-title', 'Manajemen - Rekam Medis')

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
        <h5 class="mb-0"><i class="bi bi-file-medical"></i> Data Rekam Medis</h5>
        <a href="#" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-circle"></i> Rekam Medis Baru
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="rekamMedisTable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No. RM</th>
                        <th>Nama Pasien</th>
                        <th>Tanggal</th>
                        <th>Poli</th>
                        <th>Dokter</th>
                        <th>Diagnosa</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($items as $row)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row->no_rm ?? '-' }}</td>
                        <td>{{ $row->nama_pasien ?? '-' }}</td>
                        <td>{{ optional($row->tanggal)->format('d/m/Y') ?? '-' }}</td>
                        <td>{{ $row->poli ?? '-' }}</td>
                        <td>{{ $row->dokter ?? '-' }}</td>
                        <td>{{ Str::limit($row->diagnosa ?? '-', 50) }}</td>
                        <td>
                            <span class="badge bg-{{ $row->status === 'Selesai' ? 'success' : 'secondary' }}">{{ $row->status }}</span>
                        </td>
                        <td>
                            <a href="#" class="btn btn-sm btn-info" title="Detail"><i class="bi bi-eye"></i></a>
                            <a href="#" class="btn btn-sm btn-primary" title="Cetak"><i class="bi bi-printer"></i></a>
                        </td>
                    </tr>
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
        $('#rekamMedisTable').DataTable({
            dom: 'Bfrtip',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
            language: { url: 'https://cdn.datatables.net/plug-ins/1.13.7/i18n/id.json' },
            order: [[0, 'desc']],
            pageLength: 25
        });
    });
</script>
@endpush

