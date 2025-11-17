@extends('layouts.app')

@section('content')
<div class="container" style="padding: 40px 20px 60px;">
    <div class="pegawai-page-header">
        <h1 class="pegawai-page-title">Data Pegawai Kecamatan</h1>
        <p class="pegawai-page-subtitle">Struktur Organisasi &amp; Pegawai Kecamatan Cilebar</p>
    </div>

    @if ($groupedEmployees->isEmpty())
        <div class="card" style="text-align: center; padding: 40px;">
            <p class="muted">Data pegawai sedang dalam proses pembaruan.</p>
        </div>
    @else
        @foreach ($groupedEmployees as $division => $employees)
            @if ($division && $division !== 'Lainnya')
                <div class="pegawai-division-section">
                    <h2 class="pegawai-division-title">{{ $division }}</h2>
                </div>
            @endif

            <div class="pegawai-grid">
                @foreach ($employees as $employee)
                    <div class="pegawai-card">
                        <div class="pegawai-photo-wrapper">
                            @php
                                $photoFilename = $employee->photo_path ? basename($employee->photo_path) : null;
                                $photoPath = $photoFilename ? public_path('uploads/' . $photoFilename) : null;
                            @endphp

                            @if ($photoFilename && $photoPath && file_exists($photoPath))
                                <img src="{{ asset('uploads/' . $photoFilename) }}" alt="{{ $employee->name }}" class="pegawai-photo" />
                            @else
                                <div class="pegawai-photo-placeholder">
                                    <i class="fa-solid fa-user"></i>
                                </div>
                            @endif
                        </div>
                        <div class="pegawai-info">
                            <h3 class="pegawai-name">{{ $employee->name }}</h3>
                            <p class="pegawai-position">{{ $employee->position }}</p>
                            @if ($employee->phone || $employee->email)
                                <div class="pegawai-contact">
                                    @if ($employee->phone)
                                        <a href="tel:{{ preg_replace('/[^0-9]/', '', $employee->phone) }}" class="pegawai-contact-icon" title="Telepon">
                                            <i class="fa-solid fa-phone"></i>
                                        </a>
                                    @endif
                                    @if ($employee->email)
                                        <a href="mailto:{{ $employee->email }}" class="pegawai-contact-icon" title="Email">
                                            <i class="fa-solid fa-envelope"></i>
                                        </a>
                                    @endif
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    @endif
</div>
@endsection

