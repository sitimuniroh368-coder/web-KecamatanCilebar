@extends('admin.layouts.app')

@section('title', 'Kelola Galeri - Panel Admin')
@section('page-title', 'Kelola Galeri')
@section('page-subtitle', 'Bagikan dokumentasi kegiatan pemerintahan')

@section('content')
    <p><a class="btn" href="{{ route('admin.gallery.create') }}">+ Tambah Foto</a></p>

    @if ($galleries->isEmpty())
        <p class="muted">Belum ada foto galeri.</p>
    @else
        <div class="admin-gallery-grid">
            @foreach ($galleries as $gallery)
                <div class="admin-gallery-card">
                    <img class="admin-gallery-thumb" src="{{ asset('uploads/' . basename($gallery->image_path)) }}" alt="{{ $gallery->title }}">
                    <div class="admin-gallery-meta">
                        <div>
                            <div class="admin-gallery-title">{{ $gallery->title }}</div>
                            <div class="admin-gallery-date">{{ $gallery->created_at?->format('d M Y') ?? '-' }}</div>
                        </div>
                        <div class="action-box">
                            <form method="post" action="{{ route('admin.gallery.destroy', $gallery) }}" class="inline-form" data-confirm="Hapus foto ini?">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{ $galleries->links() }}
    @endif
@endsection

