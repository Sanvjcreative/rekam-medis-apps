@extends('layouts.app')

@section('title', 'Kasir')
@section('page-title', 'Kasir')

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
        <h5 class="mb-0"><i class="bi bi-cash-register"></i> Data Transaksi Kasir</h5>
        <a href="{{ route('kasir.create') }}" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-circle"></i> Transaksi Baru
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="kasirTable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No. Transaksi</th>
                        <th>No. RM</th>
                        <th>Nama Pasien</th>
                        <th>Tanggal</th>
                        <th>Total Tagihan</th>
                        <th>Bayar</th>
                        <th>Kembalian</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($items as $index => $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>TRX{{ str_pad($item->id, 6, '0', STR_PAD_LEFT) }}</td>
                        <td>{{ $item->no_rm }}</td>
                        <td>{{ $item->nama_pasien }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d/m/Y H:i') }}</td>
                        <td>Rp {{ number_format($item->total_tagihan, 0, ',', '.') }}</td>
                        <td>Rp {{ number_format($item->bayar, 0, ',', '.') }}</td>
                        <td>Rp {{ number_format($item->bayar - $item->total_tagihan, 0, ',', '.') }}</td>
                        <td>
                            <span class="badge bg-{{ $item->status === 'Lunas' ? 'success' : 'warning' }}">
                                {{ $item->status }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('kasir.show', $item->id) }}" class="btn btn-sm btn-info" title="Detail">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="{{ route('kasir.edit', $item->id) }}" class="btn btn-sm btn-warning" title="Edit">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <button type="button" class="btn btn-sm btn-danger" title="Hapus" 
                                    onclick="confirmDelete({{ $item->id }})">
                                <i class="bi bi-trash"></i>
                            </button>
                            <form id="delete-form-{{ $item->id }}" action="{{ route('kasir.destroy', $item->id) }}" 
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
        $('#kasirTable').DataTable({
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

