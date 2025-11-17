@extends('layouts.app')

@section('content')
<article class="card news-detail">
    <h2>{{ $newsItem->title }}</h2>
    <p class="muted">
        <i class="fas fa-clock"></i> {{ $newsItem->created_at?->translatedFormat('d M Y') }}
        <span style="margin: 0 8px;">-</span>
        <i class="fas fa-folder"></i> Berita
    </p>
    @if ($newsItem->image_path)
        <img class="news-detail-thumb" src="{{ asset('uploads/' . basename($newsItem->image_path)) }}" alt="{{ $newsItem->title }}" loading="lazy" />
    @endif
    <div>{!! nl2br(e($newsItem->content)) !!}</div>
</article>

<div class="detail-action-footer">
    <a class="btn btn-secondary" href="{{ route('berita') }}" style="text-decoration: none;">
        <i class="fas fa-arrow-left"></i> Kembali ke Berita
    </a>
</div>
@endsection