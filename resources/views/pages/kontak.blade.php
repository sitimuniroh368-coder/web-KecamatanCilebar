@extends('layouts.app')

@php
    $address = $settings->address ?? 'Jl. Cilebar No. 270, Kecamatan Cilebar, Kabupaten Karawang, Jawa Barat 41384, Indonesia';
    $phoneNumber = $settings->phone;
    $emailAddr = $settings->email;
    $whatsappNumber = $settings->whatsapp;
    $igHandle = $settings->instagram;
    $fbHandle = $settings->facebook;
@endphp

@section('content')
<div class="container" style="padding: 40px 20px;">
    <h2 class="section-title">Kontak</h2>

    <div class="kontak-info-section">
        <div class="kontak-info-grid">
            @if ($address)
                <div class="kontak-info-item">
                    <div class="kontak-info-icon">
                        <i class="fa-solid fa-map-marker-alt"></i>
                    </div>
                    <div class="kontak-info-content">
                        <h3>Alamat</h3>
                        <p>{!! nl2br(e($address)) !!}</p>
                    </div>
                </div>
            @endif

            @if ($phoneNumber)
                <div class="kontak-info-item">
                    <div class="kontak-info-icon">
                        <i class="fa-solid fa-phone"></i>
                    </div>
                    <div class="kontak-info-content">
                        <h3>Telepon</h3>
                        <p><a href="tel:{{ preg_replace('/[^0-9]/', '', $phoneNumber) }}">{{ $phoneNumber }}</a></p>
                    </div>
                </div>
            @endif

            @if ($emailAddr)
                <div class="kontak-info-item">
                    <div class="kontak-info-icon">
                        <i class="fa-solid fa-envelope"></i>
                    </div>
                    <div class="kontak-info-content">
                        <h3>Email</h3>
                        <p><a href="mailto:{{ $emailAddr }}">{{ $emailAddr }}</a></p>
                    </div>
                </div>
            @endif

            @if ($whatsappNumber)
                <div class="kontak-info-item">
                    <div class="kontak-info-icon">
                        <i class="fa-brands fa-whatsapp"></i>
                    </div>
                    <div class="kontak-info-content">
                        <h3>WhatsApp</h3>
                        <p><a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $whatsappNumber) }}" target="_blank">{{ $whatsappNumber }}</a></p>
                    </div>
                </div>
            @endif

            @if ($igHandle)
                <div class="kontak-info-item">
                    <div class="kontak-info-icon">
                        <i class="fa-brands fa-instagram"></i>
                    </div>
                    <div class="kontak-info-content">
                        <h3>Instagram</h3>
                        <p>
                            <a href="https://instagram.com/{{ str_replace(['@', 'https://instagram.com/', 'https://www.instagram.com/'], '', $igHandle) }}" target="_blank">
                                {{ $igHandle }}
                            </a>
                        </p>
                    </div>
                </div>
            @endif

            @if ($fbHandle)
                <div class="kontak-info-item">
                    <div class="kontak-info-icon">
                        <i class="fa-brands fa-facebook"></i>
                    </div>
                    <div class="kontak-info-content">
                        <h3>Facebook</h3>
                        <p>
                            <a href="{{ \Illuminate\Support\Str::startsWith($fbHandle, ['http://', 'https://']) ? $fbHandle : 'https://facebook.com' . ltrim($fbHandle, '/') }}" target="_blank">
                                {{ $fbHandle }}
                            </a>
                        </p>
                    </div>
                </div>
            @endif
        </div>
    </div>

    @if ($whatsappNumber)
        <div class="sapa-camat-box">
            <div class="sapa-camat-header">
                <div class="sapa-camat-icon">
                    <i class="fa-brands fa-whatsapp"></i>
                </div>
                <div class="sapa-camat-title-section">
                    <h3 class="sapa-camat-title">Sapa Camat</h3>
                    <p class="sapa-camat-subtitle">Sampaikan aspirasi dan aduan langsung ke {{ $camatName }} melalui WhatsApp</p>
                </div>
            </div>
            <div class="sapa-camat-content">
                <p>Gunakan layanan "Sapa Camat" untuk menyampaikan aspirasi, saran, atau aduan Anda langsung kepada Camat melalui WhatsApp. Kami siap mendengarkan dan menindaklanjuti setiap masukan dari masyarakat.</p>
                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $whatsappNumber) }}?text=Halo%20{{ urlencode($camatName) }}%2C%20saya%20ingin%20menyampaikan%20aspirasi%2Faduan%3A" class="btn sapa-camat-btn" target="_blank">
                    <i class="fa-brands fa-whatsapp"></i> Kirim Pesan ke Camat
                </a>
            </div>
        </div>
    @endif

    <div class="card" style="margin-top: 40px;">
        <h3 style="margin-bottom: 20px;">Kirim Pesan</h3>
        @if (session('success'))
            <p class="success-message">{{ session('success') }}</p>
        @endif

        @if ($errors->any())
            <div class="muted">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="post" action="{{ route('kontak.store') }}">
            @csrf
            <div class="row">
                <label>Nama</label>
                <input type="text" name="name" value="{{ old('name') }}" required />
            </div>
            <div class="row">
                <label>Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required />
            </div>
            <div class="row">
                <label>Pesan</label>
                <textarea name="message" required>{{ old('message') }}</textarea>
            </div>
            <button class="btn" type="submit">Kirim</button>
        </form>
    </div>
</div>
@endsection

