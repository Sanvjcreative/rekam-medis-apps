@extends('layouts.app')

@section('title', 'Pendaftaran')
@section('page-title', 'Pendaftaran')

@push('styles')
<style>
    .dataTables_wrapper .dataTables_filter {
        float: right;
        text-align: right;
    }
    .dataTables_wrapper .dataTables_length { float: left; }
    .table th { background-color: #f8f9fa; font-weight: 600; }
</style>
@endpush

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="bi bi-person-plus"></i> Data Pendaftaran</h5>
        <a href="{{ route('pendaftaran.create') }}" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-circle"></i> Pendaftaran Baru
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="pendaftaranTable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No. RM</th>
                        <th>Nama Pasien</th>
                        <th>Tanggal Daftar</th>
                        <th>Poli</th>
                        <th>Dokter</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Data akan diisi oleh DataTables (server-side AJAX) --}}
                </tbody>
            </table>
        </div>
        <div class="mt-3" style="display:none;">
            {{-- Pagination Laravel disembunyikan saat menggunakan DataTables server-side --}}
            {{ $items->links() }}
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        var table = $('#pendaftaranTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ route('pendaftaran.data') }}',
                type: 'GET'
            },
            dom: 'Bfrtip',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
            language: { url: 'https://cdn.datatables.net/plug-ins/1.13.7/i18n/id.json' },
            columns: [
                { data: null, orderable: false, searchable: false, render: function(data, type, row, meta) { return meta.row + meta.settings._iDisplayStart + 1; } },
                { data: 'no_rm' },
                { data: 'nama_pasien' },
                { data: 'tanggal_daftar' },
                { data: 'poli' },
                { data: 'dokter' },
                { data: 'status', orderable: false, searchable: false },
                { data: 'aksi', orderable: false, searchable: false }
            ],
            order: [[0, 'desc']],
            pageLength: 25
        });

        // Jika Anda ingin refresh tabel manual setelah aksi, panggil table.ajax.reload();
    });

    // Handler untuk delete via AJAX (delegated)
    $(document).on('click', '.btn-delete', function(e) {
        e.preventDefault();
        var url = $(this).data('url');
        if (!url) return;
        if (!confirm('Apakah Anda yakin ingin menghapus data ini?')) return;

        fetch(url, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'X-Requested-With': 'XMLHttpRequest'
            }
        }).then(function(resp) {
            if (!resp.ok) throw new Error('Network response was not ok');
            return resp.json().catch(function() { return { success: true }; });
        }).then(function(data) {
            // reload datatable
            $('#pendaftaranTable').DataTable().ajax.reload(null, false);
            alert('Data berhasil dihapus.');
        }).catch(function(err) {
            console.error(err);
            alert('Terjadi kesalahan saat menghapus data.');
        });
    });

    // Konfirmasi hapus universal untuk halaman pendaftaran
    function confirmDelete(id) {
        if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
            var f = document.getElementById('delete-form-' + id);
            if (f) { f.submit(); }
        }
    }
</script>
@endpush

