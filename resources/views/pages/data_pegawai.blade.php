@extends('layouts.app')

@section('content')
<div class="container" style="padding: 40px 20px 60px;">
    <div class="desa-page-header">
        <h1 class="desa-page-title">Informasi Desa</h1>
        <p class="desa-page-subtitle">Data Desa, Statistik Kependudukan &amp; Profil Wilayah Kecamatan Cilebar</p>
    </div>

    <!-- Statistik Umum Kecamatan -->
    <div class="desa-stats-grid">
        <div class="desa-stat-card">
            <div class="stat-icon">
                <i class="fa-solid fa-houses"></i>
            </div>
            <div class="stat-content">
                <h4>Jumlah Desa</h4>
                <p class="stat-value">10 Desa</p>
            </div>
        </div>
        <div class="desa-stat-card">
            <div class="stat-icon">
                <i class="fa-solid fa-people-group"></i>
            </div>
            <div class="stat-content">
                <h4>Total Penduduk</h4>
                <p class="stat-value">~35.000 Jiwa</p>
            </div>
        </div>
        <div class="desa-stat-card">
            <div class="stat-icon">
                <i class="fa-solid fa-map"></i>
            </div>
            <div class="stat-content">
                <h4>Luas Wilayah</h4>
                <p class="stat-value">45,2 km²</p>
            </div>
        </div>
        <div class="desa-stat-card">
            <div class="stat-icon">
                <i class="fa-solid fa-home"></i>
            </div>
            <div class="stat-content">
                <h4>Kepala Desa</h4>
                <p class="stat-value">10 Kepala Desa</p>
            </div>
        </div>
    </div>

    <!-- Daftar Desa -->
    <section class="desa-section">
        <h2 class="desa-section-title">Daftar Desa Kecamatan Cilebar</h2>
        <div class="desa-list">
            @php
                $villages = [
                    ['name' => 'Kertamukti', 'slug' => 'kertamukti', 'population' => '3.500', 'area' => '4.2 km²'],
                    ['name' => 'Cikande', 'slug' => 'cikande', 'population' => '3.200', 'area' => '4.0 km²'],
                    ['name' => 'Mekarpohaci', 'slug' => 'mekarpohaci', 'population' => '3.100', 'area' => '4.5 km²'],
                    ['name' => 'Rawasari', 'slug' => 'rawasari', 'population' => '3.800', 'area' => '4.8 km²'],
                    ['name' => 'Kosambibatu', 'slug' => 'kosambibatu', 'population' => '3.400', 'area' => '4.1 km²'],
                    ['name' => 'Pusakajaya Utara', 'slug' => 'pusakajaya-utara', 'population' => '2.800', 'area' => '3.9 km²'],
                    ['name' => 'Pusakajaya Selatan', 'slug' => 'pusakajaya-selatan', 'population' => '2.900', 'area' => '4.0 km²'],
                    ['name' => 'Sukaratu', 'slug' => 'sukaratu', 'population' => '3.600', 'area' => '4.3 km²'],
                    ['name' => 'Tanjungsari', 'slug' => 'tanjungsari', 'population' => '2.400', 'area' => '3.8 km²'],
                    ['name' => 'Ciptamargi', 'slug' => 'ciptamargi', 'population' => '2.700', 'area' => '3.6 km²']
                ];
            @endphp
            @forelse ($villages as $village)
                <a href="{{ route('desa.show', $village['slug']) }}" class="desa-card-link">
                    <div class="desa-card">
                        <div class="desa-card-header">
                            <h3 class="desa-card-title">
                                <i class="fa-solid fa-map-pin"></i>
                                {{ $village['name'] }}
                            </h3>
                        </div>
                        <div class="desa-card-body">
                            <div class="desa-info-row">
                                <span class="info-label">
                                    <i class="fa-solid fa-people-group"></i>
                                    Penduduk
                                </span>
                                <span class="info-value">{{ $village['population'] }} Jiwa</span>
                            </div>
                            <div class="desa-info-row">
                                <span class="info-label">
                                    <i class="fa-solid fa-ruler"></i>
                                    Luas Wilayah
                                </span>
                                <span class="info-value">{{ $village['area'] }}</span>
                            </div>
                        </div>
                        <div class="desa-card-footer">
                            <span class="view-detail">
                                Lihat Detail
                                <i class="fa-solid fa-arrow-right"></i>
                            </span>
                        </div>
                    </div>
                </a>
            @empty
                <div class="card" style="text-align: center; padding: 40px;">
                    <p class="muted">Data desa sedang dalam proses pembaruan.</p>
                </div>
            @endforelse
        </div>
    </section>

    <!-- Informasi Wilayah -->
    <section class="desa-section">
        <h2 class="desa-section-title">Karakteristik Wilayah</h2>
        <div class="desa-characteristics">
            <div class="char-item">
                <div class="char-icon">
                    <i class="fa-solid fa-leaf"></i>
                </div>
                <h4>Sektor Utama</h4>
                <p>Pertanian padi, perikanan tambak, dan UMKM lokal</p>
            </div>
            <div class="char-item">
                <div class="char-icon">
                    <i class="fa-solid fa-water"></i>
                </div>
                <h4>Kondisi Geografis</h4>
                <p>Topografi datar dengan lahan sawah dan tambak</p>
            </div>
            <div class="char-item">
                <div class="char-icon">
                    <i class="fa-solid fa-cloud-sun"></i>
                </div>
                <h4>Iklim</h4>
                <p>Tropis dengan curah hujan 2.000-2.500 mm/tahun</p>
            </div>
            <div class="char-item">
                <div class="char-icon">
                    <i class="fa-solid fa-road"></i>
                </div>
                <h4>Aksesibilitas</h4>
                <p>Tersedia jalan desa dan saluran irigasi teknis</p>
            </div>
        </div>
    </section>
</div>
@endsection

