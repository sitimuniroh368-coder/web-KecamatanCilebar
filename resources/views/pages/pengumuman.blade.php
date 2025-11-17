@extends('layouts.app')

@section('content')
<h2 class="section-title">Pengumuman</h2>
<div class="cards">
    @if ($announcements->isEmpty())
        <div class="muted">Belum ada pengumuman.</div>
    @else
        @foreach ($announcements as $item)
            @php
                $imageUrl = $item->image_url ?? asset('img/kecamatan-cilebar.jpg');
            @endphp
            <div class="card announcement-card">
                <div class="announcement-card__media">
                    <img src="{{ $imageUrl }}" alt="{{ $item->title }}">
                </div>
                <div class="announcement-card__body">
                    <h3>{{ $item->title }}</h3>
                    <p class="muted">
                        <i class="fas fa-clock"></i> {{ $item->created_at?->translatedFormat('d M Y') }}
                    </p>
                    <p>{{ \Illuminate\Support\Str::limit(strip_tags($item->content), 180) }}</p>
                    <p style="margin-top: 15px;">
                        <a class="btn btn-secondary" href="{{ route('detail-pengumuman', $item->id) }}">
                            Baca Selengkapnya <i class="fas fa-arrow-right"></i>
                        </a>
                    </p>
                </div>
            </div>
        @endforeach
    @endif
</div>

<div class="pagination-wrapper">
    {{ $announcements->links() }}
</div>
@endsection

