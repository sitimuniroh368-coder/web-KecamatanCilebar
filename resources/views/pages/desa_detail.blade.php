@extends('layouts.app')

@section('content')
<div class="container" style="padding: 40px 20px 60px;">
    <!-- Header Desa -->
    <div class="desa-detail-header">
        <div class="desa-header-content">
            <h1 class="desa-detail-title">{{ $desa->name }}</h1>
            <p class="desa-detail-description">{{ $desa->description }}</p>
        </div>
        <div class="desa-header-stats">
            <div class="header-stat">
                <i class="fa-solid fa-people-group"></i>
                <div>
                    <span class="stat-label">Penduduk</span>
                    <p class="stat-number">{{ number_format($desa->population) }}</p>
                </div>
            </div>
            <div class="header-stat">
                <i class="fa-solid fa-map"></i>
                <div>
                    <span class="stat-label">Luas</span>
                    <p class="stat-number">{{ $desa->area }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content Grid -->
    <div class="desa-detail-grid">
        <!-- Kontak Desa -->
        <section class="desa-detail-section">
            <h2 class="section-title">
                <i class="fa-solid fa-phone"></i>
                Kontak Desa
            </h2>
            <div class="contact-box">
                <div class="contact-item">
                    <h4>Kepala Desa</h4>
                    <p class="contact-name">{{ $desa->head_name }}</p>
                    @if($desa->head_phone)
                        <a href="tel:{{ preg_replace('/[^0-9]/', '', $desa->head_phone) }}" class="contact-link">
                            <i class="fa-solid fa-phone"></i> {{ $desa->head_phone }}
                        </a>
                    @endif
                    @if($desa->head_email)
                        <a href="mailto:{{ $desa->head_email }}" class="contact-link">
                            <i class="fa-solid fa-envelope"></i> {{ $desa->head_email }}
                        </a>
                    @endif
                </div>
                <div class="contact-item">
                    <h4>Kantor Desa</h4>
                    @if($desa->village_office_phone)
                        <a href="tel:{{ preg_replace('/[^0-9]/', '', $desa->village_office_phone) }}" class="contact-link">
                            <i class="fa-solid fa-phone"></i> {{ $desa->village_office_phone }}
                        </a>
                    @endif
                    @if($desa->village_office_email)
                        <a href="mailto:{{ $desa->village_office_email }}" class="contact-link">
                            <i class="fa-solid fa-envelope"></i> {{ $desa->village_office_email }}
                        </a>
                    @endif
                </div>
            </div>
        </section>

        <!-- Statistik Kependudukan -->
        @if($desa->statistics)
            <section class="desa-detail-section">
                <h2 class="section-title">
                    <i class="fa-solid fa-chart-bar"></i>
                    Statistik Kependudukan
                </h2>
                <div class="stats-content">
                    <div class="stat-row">
                        <span class="stat-label">Jumlah KK (Kepala Keluarga)</span>
                        <span class="stat-value">{{ $desa->statistics['households'] ?? '-' }}</span>
                    </div>
                    <div class="stat-row">
                        <span class="stat-label">Laki-laki</span>
                        <span class="stat-value">{{ number_format($desa->statistics['men'] ?? 0) }}</span>
                    </div>
                    <div class="stat-row">
                        <span class="stat-label">Perempuan</span>
                        <span class="stat-value">{{ number_format($desa->statistics['women'] ?? 0) }}</span>
                    </div>
                </div>
            </section>

            <!-- Pendidikan -->
            <section class="desa-detail-section">
                <h2 class="section-title">
                    <i class="fa-solid fa-book"></i>
                    Tingkat Pendidikan
                </h2>
                <div class="education-grid">
                    @if(isset($desa->statistics['education']))
                        @foreach($desa->statistics['education'] as $level => $count)
                            <div class="education-item">
                                <span class="edu-level">{{ $level }}</span>
                                <p class="edu-count">{{ $count }} Orang</p>
                            </div>
                        @endforeach
                    @endif
                </div>
            </section>

            <!-- Pekerjaan -->
            <section class="desa-detail-section">
                <h2 class="section-title">
                    <i class="fa-solid fa-briefcase"></i>
                    Mata Pencaharian
                </h2>
                <div class="occupation-grid">
                    @if(isset($desa->statistics['occupation']))
                        @foreach($desa->statistics['occupation'] as $job => $count)
                            <div class="occupation-item">
                                <span class="job-name">{{ $job }}</span>
                                <p class="job-count">{{ $count }} Orang</p>
                            </div>
                        @endforeach
                    @endif
                </div>
            </section>
        @endif

        <!-- Peta Wilayah -->
        <section class="desa-detail-section full-width">
            <h2 class="section-title">
                <i class="fa-solid fa-map"></i>
                Peta Wilayah Desa
            </h2>
            @if($desa->map_iframe)
                <div class="map-container">
                    {!! $desa->map_iframe !!}
                </div>
            @else
                <div style="text-align: center; padding: 40px; background: #f8fafc; border-radius: 12px;">
                    <p class="muted">Peta wilayah sedang dalam proses pembaruan.</p>
                </div>
            @endif
        </section>
    </div>
        <!-- Statistik Singkat -->
    <section class="desa-detail-summary">
        <h2 class="section-title">Ringkasan Data Desa</h2>
        <div class="summary-grid">
            <div class="summary-card">
                <div class="summary-icon">
                    <i class="fa-solid fa-person"></i>
                </div>
                <h4>Total Penduduk</h4>
                <p>{{ number_format($desa->population) }} Jiwa</p>
            </div>
            <div class="summary-card">
                <div class="summary-icon">
                    <i class="fa-solid fa-home"></i>
                </div>
                <h4>Rumah Tangga</h4>
                <p>{{ $desa->statistics['households'] ?? '-' }} KK</p>
            </div>
            <div class="summary-card">
                <div class="summary-icon">
                    <i class="fa-solid fa-map-location-dot"></i>
                </div>
                <h4>Luas Wilayah</h4>
                <p>{{ $desa->area }}</p>
            </div>
            <div class="summary-card">
                <div class="summary-icon">
                    <i class="fa-solid fa-people-group"></i>
                </div>
                <h4>Kepadatan</h4>
                <p>{{ round($desa->population / floatval(str_replace(' km²', '', $desa->area))) }} / km²</p>
            </div>
        </div>
    </section>

    <!-- Back Button (moved below summary) -->
    <div class="desa-detail-back" style="margin-top:18px;">
        <a href="{{ route('pages.data_pegawai') }}" class="back-link">
            <i class="fa-solid fa-arrow-left"></i>
            Kembali ke Daftar Desa
        </a>
    </div>
</div>
@endsection
