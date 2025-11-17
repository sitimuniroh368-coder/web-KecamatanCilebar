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

    $borderColor = '#64748b';
    $nameLower = strtolower($service->name);
    foreach ($borderColors as $key => $color) {
        if (str_contains($nameLower, $key)) {
            $borderColor = $color;
            break;
        }
    }
@endphp

@section('content')
<div class="container" style="padding: 40px 20px 60px;">
    <a href="{{ route('layanan') }}" class="layanan-back-btn">
        <i class="fa-solid fa-arrow-left"></i> Kembali ke Daftar Layanan
    </a>

    <div class="layanan-detail-header" style="border-left: 5px solid {{ $borderColor }};">
        <h1 class="layanan-detail-title">{{ $service->name }}</h1>
        @if ($service->description)
            <p class="layanan-detail-subtitle">{!! nl2br(e($service->description)) !!}</p>
        @endif
    </div>

    <div class="layanan-detail-section">
        <h2 class="layanan-detail-section-title">Persyaratan</h2>
        @if ($service->requirements)
            <div class="layanan-detail-content">
                {!! nl2br(e($service->requirements)) !!}
            </div>
        @else
            <div class="layanan-detail-content layanan-no-content">
                <p>Persyaratan untuk layanan ini sedang dalam proses pembaruan. Silakan hubungi admin untuk informasi lebih lanjut.</p>
            </div>
        @endif
    </div>

    @if ($service->notes)
        <div class="layanan-detail-section layanan-notes-section">
            <div class="layanan-notes-header">
                <i class="fa-solid fa-circle-exclamation"></i>
                <h2 class="layanan-detail-section-title">Catatan Penting</h2>
            </div>
            <div class="layanan-detail-content layanan-notes-content">
                {!! nl2br(e($service->notes)) !!}
            </div>
        </div>
    @endif

    <div class="layanan-detail-actions">
        <a href="{{ route('kontak') }}" class="btn layanan-contact-btn">
            <i class="fa-solid fa-phone"></i> Hubungi Kami
        </a>
    </div>
</div>
@endsection

