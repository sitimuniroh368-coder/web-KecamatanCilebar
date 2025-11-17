@extends('layouts.app')

@php
    $borderColors = [
        'ktp' => '#22c55e',
        'kk' => '#f97316',
        'akta lahir' => '#ef4444',
        'akta kematian' => '#3b82f6',
        'nikah' => '#eab308',
        'pindah' => '#a855f7',
        'skck' => '#06b6d4',
        'sapa camat' => '#84cc16',
        'agenda kecamatan' => '#16a34a',
    ];

    $resolveColor = function (string $name) use ($borderColors) {
        $nameLower = strtolower(trim($name));
        foreach ($borderColors as $key => $color) {
            if (str_contains($nameLower, $key)) {
                return $color;
            }
        }

        return '#64748b';
    };
@endphp

@section('content')
<section class="layanan-hero-section">
    <div class="layanan-hero-overlay"></div>
    <div class="layanan-hero-content">
        <h1 class="layanan-hero-title">LAYANAN ONLINE</h1>
        <p class="layanan-hero-subtitle">Selamat Datang di Website Resmi Kecamatan Cilebar</p>
        <p class="layanan-hero-location">Kabupaten Karawang</p>
    </div>
</section>

<div class="container" style="padding: 60px 20px;">
    <div class="layanan-services-grid">
        @if ($services->isEmpty())
            @php
                $defaults = [
                    ['id' => 1, 'name' => 'KTP', 'description' => 'Layanan Pembuatan dan Perpanjangan KTP', 'color' => '#22c55e'],
                    ['id' => 2, 'name' => 'KK', 'description' => 'Layanan Kartu Keluarga Untuk Penduduk', 'color' => '#f97316'],
                    ['id' => 3, 'name' => 'Akta Lahir', 'description' => 'Pengurusan Dokumen Kelahiran', 'color' => '#ef4444'],
                    ['id' => 4, 'name' => 'Akta Kematian', 'description' => 'Pengurusan Dokumen Kematian', 'color' => '#3b82f6'],
                    ['id' => 5, 'name' => 'Nikah', 'description' => 'Layanan Pengurusan Dokumen Pernikahan', 'color' => '#eab308'],
                    ['id' => 6, 'name' => 'Pindah', 'description' => 'Layanan Surat Pindah Kependudukan', 'color' => '#a855f7'],
                    ['id' => 7, 'name' => 'SKCK', 'description' => 'Surat Keterangan Catatan Kepolisian', 'color' => '#06b6d4'],
                    ['id' => 8, 'name' => 'Sapa Camat', 'description' => 'Sampaikan Aspirasi dan Aduan Langsung ke Camat', 'color' => '#84cc16'],
                    ['id' => 9, 'name' => 'Agenda Kecamatan', 'description' => 'Jadwal dan Kegiatan Kecamatan Cilebar', 'color' => '#16a34a'],
                ];
            @endphp
            @foreach ($defaults as $default)
                <a href="#" class="layanan-service-card-link" style="border-top: 4px solid {{ $default['color'] }};">
                    <div class="layanan-service-card">
                        <h3 class="layanan-service-title">{{ $default['name'] }}</h3>
                        <p class="layanan-service-desc">{{ $default['description'] }}</p>
                        <span class="layanan-service-arrow">→</span>
                    </div>
                </a>
            @endforeach
        @else
            @foreach ($services as $service)
                <a href="{{ route('detail-layanan', $service->id) }}" class="layanan-service-card-link" style="border-top: 4px solid {{ $resolveColor($service->name) }};">
                    <div class="layanan-service-card">
                        <h3 class="layanan-service-title">{{ $service->name }}</h3>
                        <p class="layanan-service-desc">{!! nl2br(e($service->description)) !!}</p>
                        <span class="layanan-service-arrow">→</span>
                    </div>
                </a>
            @endforeach
        @endif
    </div>
</div>
@endsection

