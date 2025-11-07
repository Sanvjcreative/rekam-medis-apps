@extends('layouts.app')

@section('title', 'IGD')
@section('page-title', 'IGD')

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
        <h5 class="mb-0"><i class="bi bi-heart-pulse"></i> Data IGD</h5>
        <a href="{{ route('igd.create') }}" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-circle"></i> Pasien Baru
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="igdTable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No. RM</th>
                        <th>Nama Pasien</th>
                        <th>Tanggal Masuk</th>
                        <th>Jam Masuk</th>
                        <th>Diagnosa</th>
                        <th>Triage</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($items as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->no_rm }}</td>
                        <td>{{ $item->nama_pasien }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal_masuk)->format('d/m/Y') }}</td>
                        <td>{{ $item->jam_masuk }}</td>
                        <td>{{ $item->diagnosa }}</td>
                        <td>
                            <span class="badge bg-{{ $item->triage === 'Merah' ? 'danger' : ($item->triage === 'Kuning' ? 'warning' : 'success') }}">
                                {{ $item->triage }}
                            </span>
                        </td>
                        <td>
                            <span class="badge bg-{{ $item->status === 'Dalam Perawatan' ? 'info' : 'success' }}">
                                {{ $item->status }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('igd.show', $item->id) }}" class="btn btn-sm btn-info" title="Detail">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="{{ route('igd.edit', $item->id) }}" class="btn btn-sm btn-warning" title="Edit">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <button type="button" class="btn btn-sm btn-danger" title="Hapus" 
                                    onclick="confirmDelete({{ $item->id }})">
                                <i class="bi bi-trash"></i>
                            </button>
                            <form id="delete-form-{{ $item->id }}" action="{{ route('igd.destroy', $item->id) }}" 
                                  method="POST" style="display: none;">
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
        $('#igdTable').DataTable({
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

