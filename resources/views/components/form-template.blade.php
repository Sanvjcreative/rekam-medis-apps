{{-- Template Form yang bisa digunakan untuk semua menu --}}
@props([
    'title' => 'Form',
    'route' => '#',
    'backRoute' => '#',
    'fields' => []
])

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">{{ $title }}</h5>
        <a href="{{ $backRoute }}" class="btn btn-secondary btn-sm">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ $route }}">
            @csrf
            {{ $slot }}
            
            <div class="d-flex justify-content-end gap-2 mt-4">
                <a href="{{ $backRoute }}" class="btn btn-secondary">
                    <i class="bi bi-x-circle"></i> Batal
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> Simpan
                </button>
            </div>
        </form>
    </div>
</div>

