@extends('layouts.app')

@section('content')
<h2 class="section-title">Galeri Kegiatan</h2>
<div class="gallery-grid">
    @if ($galleries->isEmpty())
        <div class="muted">Belum ada kegiatan.</div>
    @else
        @foreach ($galleries as $item)
            <div class="gallery-card">
                @if ($item->image_path)
                    <img src="{{ asset('uploads/' . basename($item->image_path)) }}" alt="{{ $item->title }}" class="gallery-image" loading="lazy" />
                @endif
                <div class="gallery-info" style="padding: 16px;">
                    <h3>{{ $item->title }}</h3>
                    <p class="muted">
                        <i class="fas fa-calendar"></i> {{ $item->created_at?->translatedFormat('d M Y') }}
                    </p>
                </div>
            </div>
        @endforeach
    @endif
</div>

<div class="pagination-wrapper">
    {{ $galleries->links() }}
</div>
@endsection

