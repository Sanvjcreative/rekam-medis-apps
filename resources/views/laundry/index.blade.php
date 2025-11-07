@extends('layouts.app')

@section('title', 'Laundry')
@section('page-title', 'Laundry')

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
        <h5 class="mb-0"><i class="bi bi-shop"></i> Data Laundry</h5>
        <a href="{{ route('laundry.create') }}" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-circle"></i> Cucian Baru
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="laundryTable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No. Laundry</th>
                        <th>Kamar</th>
                        <th>Jenis Cucian</th>
                        <th>Tanggal Masuk</th>
                        <th>Tanggal Selesai</th>
                        <th>Jumlah</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($items as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->kode_laundry }}</td>
                        <td>{{ $item->kamar }}</td>
                        <td>{{ $item->jenis }}</td>
                        <td>{{ date('d/m/Y', strtotime($item->tanggal_masuk)) }}</td>
                        <td>{{ $item->tanggal_keluar ? date('d/m/Y', strtotime($item->tanggal_keluar)) : '-' }}</td>
                        <td>{{ $item->jumlah }}</td>
                        <td>
                            <span class="badge bg-{{ $item->status === 'Cuci' ? 'warning' : ($item->status === 'Kering' ? 'info' : 'success') }}">
                                {{ $item->status }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('laundry.show', $item->id) }}" class="btn btn-sm btn-info" title="Detail">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="{{ route('laundry.edit', $item->id) }}" class="btn btn-sm btn-warning" title="Edit">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <button type="button" class="btn btn-sm btn-danger" title="Hapus" 
                                    onclick="confirmDelete({{ $item->id }})">
                                <i class="bi bi-trash"></i>
                            </button>
                            <form id="delete-form-{{ $item->id }}" action="{{ route('laundry.destroy', $item->id) }}" 
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
        $('#laundryTable').DataTable({
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

