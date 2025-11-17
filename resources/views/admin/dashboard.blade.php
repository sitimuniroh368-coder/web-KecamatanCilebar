@extends('admin.layouts.app')

@section('title', 'Dashboard - Panel Admin')
@section('page-title', 'Dashboard')
@section('page-subtitle', 'Ringkasan cepat aktivitas dan konten terbaru')

@section('content')
    @php
        $statCards = [
            [
                'title' => 'Berita',
                'value' => $newsCount,
                'desc' => 'Artikel informatif untuk warga',
                'icon' => 'fa-solid fa-newspaper',
                'accent' => 'accent-news',
            ],
            [
                'title' => 'Pengumuman',
                'value' => $announcementCount,
                'desc' => 'Informasi resmi terkini',
                'icon' => 'fa-solid fa-bullhorn',
                'accent' => 'accent-announcement',
            ],
            [
                'title' => 'Layanan',
                'value' => $serviceCount,
                'desc' => 'Layanan publik yang tersedia',
                'icon' => 'fa-solid fa-handshake',
                'accent' => 'accent-service',
            ],
            [
                'title' => 'Informasi Desa',
                'value' => $desaCount,
                'desc' => 'Data desa dan wilayah',
                'icon' => 'fa-solid fa-map',
                'accent' => 'accent-desa',
            ],
            [
                'title' => 'Kotak Masuk',
                'value' => $inboxCount,
                'desc' => 'Pesan dari masyarakat',
                'icon' => 'fa-regular fa-envelope',
                'accent' => 'accent-inbox',
            ],
        ];

        $quickActions = [
            [
                'label' => 'Tambah Berita',
                'desc' => 'Publikasikan kabar terbaru',
                'route' => route('admin.news.create'),
                'icon' => 'fa-solid fa-pen-to-square',
            ],
            [
                'label' => 'Pengumuman Baru',
                'desc' => 'Sampaikan informasi penting',
                'route' => route('admin.announcements.create'),
                'icon' => 'fa-solid fa-bullhorn',
            ],
            [
                'label' => 'Tambah Layanan',
                'desc' => 'Perbarui daftar pelayanan',
                'route' => route('admin.services.create'),
                'icon' => 'fa-solid fa-plus',
            ],
            [
                'label' => 'Kelola Desa',
                'desc' => 'Perbarui informasi desa',
                'route' => route('admin.desa.index'),
                'icon' => 'fa-solid fa-map',
            ],
            [
                'label' => 'Upload Galeri',
                'desc' => 'Bagikan dokumentasi kegiatan',
                'route' => route('admin.gallery.create'),
                'icon' => 'fa-solid fa-image',
            ],
        ];
    @endphp

    <div class="admin-stat-grid">
        @foreach ($statCards as $card)
            <div class="admin-stat-card">
                <span class="stat-icon {{ $card['accent'] }}">
                    <i class="{{ $card['icon'] }}"></i>
                </span>
                <h3>{{ $card['title'] }}</h3>
                <strong>{{ $card['value'] }}</strong>
                <span>{{ $card['desc'] }}</span>
            </div>
        @endforeach
    </div>

    <div class="admin-panel" style="margin-top: 32px;">
        <h2>Tindakan Cepat</h2>
        <div class="admin-quick-actions">
            @foreach ($quickActions as $action)
                <a class="admin-quick-link" href="{{ $action['route'] }}">
                    <span class="quick-icon">
                        <i class="{{ $action['icon'] }}"></i>
                    </span>
                    <div>
                        <strong>{{ $action['label'] }}</strong>
                        <span>{{ $action['desc'] }}</span>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection

