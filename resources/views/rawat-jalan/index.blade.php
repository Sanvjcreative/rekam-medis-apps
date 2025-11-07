@extends('layouts.app')

@section('title', 'Rawat Jalan')
@section('page-title', 'Rawat Jalan')

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
        <h5 class="mb-0"><i class="bi bi-person-walking"></i> Data Rawat Jalan</h5>
        <a href="{{ route('rawat-jalan.create') }}" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-circle"></i> Kunjungan Baru
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="rawatJalanTable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No. RM</th>
                        <th>Nama Pasien</th>
                        <th>Tanggal Kunjungan</th>
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
                        <td>{{ optional($row->tanggal_kunjungan)->format('d/m/Y') ?? '-' }}</td>
                        <td>{{ $row->poli ?? '-' }}</td>
                        <td>{{ $row->dokter ?? '-' }}</td>
                        <td>{{ Str::limit($row->diagnosa ?? '-', 50) }}</td>
                        <td>
                            <span class="badge bg-{{ $row->status === 'Selesai' ? 'success' : 'warning' }}">{{ $row->status }}</span>
                        </td>
                        <td>
                            <a href="{{ route('rawat-jalan.show', $row->id) }}" class="btn btn-sm btn-info" title="Detail">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="{{ route('rawat-jalan.edit', $row->id) }}" class="btn btn-sm btn-warning" title="Edit">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <button type="button" class="btn btn-sm btn-danger" title="Hapus" onclick="confirmDelete({{ $row->id }})">
                                <i class="bi bi-trash"></i>
                            </button>
                            <form id="delete-form-{{ $row->id }}" action="{{ route('rawat-jalan.destroy', $row->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
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
        $('#rawatJalanTable').DataTable({
            dom: 'Bfrtip',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
            language: { url: 'https://cdn.datatables.net/plug-ins/1.13.7/i18n/id.json' },
            order: [[0, 'desc']],
            pageLength: 25
        });
    });
    
    function confirmDelete(id) {
        if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
            document.getElementById('delete-form-' + id).submit();
        }
    }
</script>
@endpush

