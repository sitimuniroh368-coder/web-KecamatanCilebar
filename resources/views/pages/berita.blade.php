@extends('layouts.app')

@section('content')
<h2 class="section-title">Berita</h2>
<div class="cards">
    @if ($news->isEmpty())
        <div class="muted">Belum ada berita.</div>
    @else
        @foreach ($news as $item)
            <div class="card news-card">
                @if ($item->image_path)
                    <img class="news-card-thumb" src="{{ asset('uploads/' . basename($item->image_path)) }}" alt="{{ $item->title }}" loading="lazy" />
                @endif
                <h3>{{ $item->title }}</h3>
                <p class="muted">
                    <i class="fas fa-clock"></i> {{ $item->created_at?->translatedFormat('d M Y') }}
                    <span style="margin: 0 8px;">-</span>
                    <i class="fas fa-folder"></i> Berita
                </p>
                <p>{{ $item->summary }}</p>
                <p style="margin-top: 15px;">
                    <a class="btn btn-secondary" href="{{ route('detail-berita', $item->id) }}">
                        Baca Selengkapnya <i class="fas fa-arrow-right"></i>
                    </a>
                </p>
            </div>
        @endforeach
    @endif
</div>

<div class="pagination-wrapper">
    {{ $news->links() }}
</div>
@endsection