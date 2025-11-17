<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>{{ config('app.name', 'Sistem Informasi Kecamatan Cilebar') }}</title>
	@php
		$cssVersion = file_exists(public_path('css/style.css')) ? filemtime(public_path('css/style.css')) : time();
	@endphp
	<link rel="stylesheet" href="{{ asset('css/style.css') }}?v={{ $cssVersion }}" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="icon" href="{{ asset('favicon.ico') }}" />
</head>
<body>
	<div class="top-bar"></div>
	<header class="site-header">
		<div class="container header-content">
			<div class="branding">
				<div class="logo-circle">
					<img class="logo" src="{{ asset('img/logo kecamatan.png') }}" alt="Logo Kabupaten Karawang" />
				</div>
				<div>
					<div class="brand-text">Pemerintah Kab. Karawang</div>
					<div class="brand-title">Kecamatan Cilebar</div>
				</div>
			</div>
			<nav class="site-nav">
				<a href="{{ route('home') }}">Beranda</a>
				<a href="{{ route('profil') }}">Profil</a>
				<a href="{{ route('berita') }}">Berita</a>
				<a href="{{ route('layanan') }}">Layanan</a>
				<a href="{{ route('kegiatan') }}">Kegiatan</a>
				<a href="{{ route('pengumuman') }}">Informasi</a>
				<a href="{{ route('data-pegawai') }}">Data Pegawai</a>
				<a href="{{ route('kontak') }}">Kontak</a>
			</nav>
		</div>
	</header>
	<main class="site-main">
		@yield('content')
	</main>
	
	@php
		$settings = \App\Models\Setting::first();
		$address = $settings->address ?? 'Jl. Cilebar No. 195, Kertamulya, Cilebar, Kabupaten Karawang, Jawa Barat 41351, Indonesia';
		$phoneNumber = $settings->phone ?? '085716174604';
		$emailAddr = $settings->email ?? 'kec.cilebar.id';
		$igHandle = $settings->instagram ?? '@KEC.CILEBAR';
		$fbHandle = $settings->facebook ?? '/kec.cilebar';
		$newsFooter = \App\Models\News::orderBy('created_at', 'desc')->limit(5)->get();
	@endphp
	<footer class="site-footer">
		<div class="container">
			<div class="footer-content">
				<div class="footer-brand">
					<h3>KECAMATAN CILEBAR</h3>
					<h4>KABUPATEN KARAWANG</h4>
					<div class="footer-address"><i class="fa-solid fa-location-dot"></i><span>{{ $address }}</span></div>
				</div>
				<div class="footer-news">
					<h4>Jam Layanan Kecamatan</h4>
					<ul class="footer-service-hours">
						<li>
							<span class="day-label">Senin - Kamis</span>
							<span class="hour-label">07:30 - 15:30 WIB</span>
						</li>
						<li>
							<span class="day-label">Jumat</span>
							<span class="hour-label">07:30 - 16:00 WIB</span>
						</li>
						<li>
							<span class="day-label">Sabtu - Minggu</span>
							<span class="hour-label">Tutup</span>
						</li>
					</ul>
				</div>
				<div class="footer-social">
					<a href="tel:{{ preg_replace('/[^0-9]/', '', $phoneNumber) }}" class="social-item">
						<span class="social-icon"><i class="fa-solid fa-phone"></i></span>
						<span>{{ $phoneNumber }}</span>
					</a>
					<a href="mailto:{{ $emailAddr }}" class="social-item">
						<span class="social-icon"><i class="fa-solid fa-envelope"></i></span>
						<span>{{ $emailAddr }}</span>
					</a>
					<a href="https://instagram.com/{{ str_replace(['@', 'https://instagram.com/', 'https://www.instagram.com/'], '', $igHandle) }}" class="social-item" target="_blank">
						<span class="social-icon"><i class="fa-brands fa-instagram"></i></span>
						<span>{{ $igHandle }}</span>
					</a>
					<a href="{{ strpos($fbHandle, 'http') === 0 ? $fbHandle : 'https://facebook.com' . ltrim($fbHandle, '/') }}" class="social-item" target="_blank">
						<span class="social-icon"><i class="fa-brands fa-facebook"></i></span>
						<span>{{ $fbHandle }}</span>
					</a>
				</div>
			</div>
			<div class="footer-bottom">
				<p>
					&copy; {{ date('Y') }} {{ config('app.name') }}. Semua hak dilindungi.
					<span class="sep">|</span>
					<a href="{{ route('admin.login') }}">Admin</a>
				</p>
			</div>
		</div>
	</footer>
	<script src="{{ asset('js/main.js') }}"></script>
</body>
</html>

