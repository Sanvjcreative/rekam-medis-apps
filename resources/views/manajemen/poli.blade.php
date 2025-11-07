@extends('layouts.app')

@section('title', 'Data Poli')
@section('page-title', 'Manajemen - Data Poli')

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
        <h5 class="mb-0"><i class="bi bi-building"></i> Data Poli</h5>
        <a href="{{ route('manajemen.poli.create') }}" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-circle"></i> Poli Baru
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="poliTable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Poli</th>
                        <th>Nama Poli</th>
                        <th>Dokter</th>
                        <th>Kapasitas</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($items as $index => $row)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row->kode_poli }}</td>
                        <td>{{ $row->nama_poli }}</td>
                        <td>{{ $row->dokter ?? '-' }}</td>
                        <td>{{ $row->kapasitas ?? '-' }}</td>
                        <td>
                            <span class="badge bg-{{ $row->status === 'Aktif' ? 'success' : 'secondary' }}">{{ $row->status }}</span>
                        </td>
                        <td>
                            <a href="{{ route('manajemen.poli.show', $row->id) }}" class="btn btn-sm btn-info" title="Detail">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="{{ route('manajemen.poli.edit', $row->id) }}" class="btn btn-sm btn-warning" title="Edit">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <button type="button" class="btn btn-sm btn-danger" title="Hapus" onclick="confirmDelete({{ $row->id }})">
                                <i class="bi bi-trash"></i>
                            </button>
                            <form id="delete-form-{{ $row->id }}" action="{{ route('manajemen.poli.destroy', $row->id) }}" method="POST" style="display: none;">
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
        $('#poliTable').DataTable({
            dom: 'Bfrtip',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
            language: { url: 'https://cdn.datatables.net/plug-ins/1.13.7/i18n/id.json' },
            order: [[0, 'asc']],
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

