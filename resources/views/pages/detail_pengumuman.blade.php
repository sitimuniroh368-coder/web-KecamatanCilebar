@extends('layouts.app')

@section('content')
@php
    $imageUrl = $announcement->image_url ?? asset('img/kecamatan-cilebar.jpg');
@endphp

<article class="card news-detail">
    <figure class="news-detail__media">
        <img src="{{ $imageUrl }}" alt="{{ $announcement->title }}">
    </figure>
    <h2>{{ $announcement->title }}</h2>
    <p class="muted">
        <i class="fas fa-clock"></i> {{ $announcement->created_at?->translatedFormat('d M Y') }}
    </p>
    <div>{!! nl2br(e($announcement->content)) !!}</div>
</article>

<div class="detail-action-footer">
    <a class="btn btn-secondary" href="{{ route('pengumuman') }}" style="text-decoration: none;">
        <i class="fas fa-arrow-left"></i> Kembali ke Pengumuman
    </a>
</div>
@endsection

