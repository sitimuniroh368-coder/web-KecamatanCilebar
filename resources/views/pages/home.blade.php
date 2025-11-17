@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="hero-section">
	<div class="hero-overlay"></div>
	<div class="hero-content">
		<img class="hero-logo" src="{{ asset('img/logo kecamatan.png') }}" alt="Logo Kecamatan Cilebar" />
		<h1 class="hero-title">KECAMATAN CILEBAR</h1>
		<p class="hero-tagline">Selamat Datang di Website Resmi Kecamatan Cilebar Kabupaten Karawang</p>
	</div>
</section>

<div class="container" style="padding: 0 20px;">

	<!-- Kata Sambutan Section -->
	<section class="section">
		<h2 class="section-title">Kata Sambutan</h2>
		<p class="section-subtitle">Camat Cilebar</p>
		<div class="welcome-box">
			<div class="welcome-content">
				<div class="welcome-text">
					@if ($welcome)
						{!! nl2br(e($welcome->message)) !!}
					@else
						<p>Assalamu'alaikum warahmatullahi wabarakatuh,</p>
						<p>Saya ucapkan terima kasih kepada semua pihak yang telah membantu dalam pembuatan website resmi Kecamatan Cilebar. Dengan adanya website ini, masyarakat dapat lebih mudah mengakses informasi dan layanan publik secara cepat dan transparan.</p>
						<p>Mari kita manfaatkan website ini dengan baik sebagai alat komunikasi dan pelayanan publik untuk kemajuan bersama. Semoga Kecamatan Cilebar terus berkembang dan memberikan manfaat bagi seluruh warga.</p>
						<p>Wassalamu'alaikum warahmatullahi wabarakatuh,</p>
					@endif
				</div>
			</div>
		</div>
	</section>

	<!-- Leaders Section (Camat & Sekretaris) -->
	@if ($welcome && ($welcome->sekretaris_name || $welcome->camat_name))
	<section class="section" style="margin: 40px 0;">
		<div class="leaders-section">
			@if ($welcome->camat_name)
			<div class="leader-card">
				@php
					$camatCardPath = null;
					if ($welcome->camat_photo) {
						$camatCardPath = 'uploads/' . basename($welcome->camat_photo);
					} else {
						$camatCardPath = 'img/camat-foto.jpeg';
					}
				@endphp
				@if (file_exists(public_path($camatCardPath)))
					<img class="leader-photo" src="{{ asset($camatCardPath) }}" alt="Camat" />
				@else
					<div class="leader-photo" style="background: #22c55e; display: flex; align-items: center; justify-content: center; color: white; font-size: 36px;">👤</div>
				@endif
				<div class="leader-name">{{ $welcome->camat_name }}</div>
				<div class="muted">Camat Cilebar</div>
			</div>
			@endif
			@if ($welcome->sekretaris_name)
			<div class="leader-card">
				@php
					$sekretarisCardPath = null;
					if ($welcome->sekretaris_photo) {
						$sekretarisCardPath = 'uploads/' . basename($welcome->sekretaris_photo);
					}
				@endphp
				@if ($sekretarisCardPath && file_exists(public_path($sekretarisCardPath)))
					<img class="leader-photo" src="{{ asset($sekretarisCardPath) }}" alt="Sekretaris" />
				@else
					<div class="leader-photo" style="background: #22c55e; display: flex; align-items: center; justify-content: center; color: white; font-size: 36px;">👤</div>
				@endif
				<div class="leader-name">{{ $welcome->sekretaris_name }}</div>
				<div class="muted">Sekretaris Cilebar</div>
			</div>
			@endif
		</div>
	</section>
	@endif

	<!-- Kondisi Wilayah Section -->
	<section class="section">
		<h2 class="section-title">Kondisi Wilayah Kecamatan Cilebar</h2>
		<div class="wilayah-box">
			<div class="wilayah-content">
				<div class="wilayah-text">
					@if ($wilayah)
						{!! nl2br(e($wilayah->content)) !!}
					@else
						<p>Kecamatan Cilebar merupakan salah satu kecamatan di Kabupaten Karawang  yang berada di bagian utara dengan kontur dataran rendah pantai. Kecamatan  Cilebar adalah hasil dari pemekaran 3 kecamatan induk yaitu Kecamatan Pedes,  Rawamerta dan Tempuran. Kantor kecamatan ini berada di Desa Kertamukti dan  memiliki jarak tempuh ke pusat pemerintahan kabupaten sejauh 37 km. Kecamatan  Cilebar terdiri atas 10 desa yaitu Sukaratu, Ciptamargi, Tanjungsari, Mekarpohaci,  Kertamukti, Cikande, Rawasari, Kosambibatu, Pusakajaya Selatan dan Pusakajaya  Utara.</p>
					@endif
				</div>
				@if ($wilayah && $wilayah->map_iframe)
					<div class="wilayah-map">
						{!! $wilayah->map_iframe !!}
					</div>
				@else
					<iframe class="wilayah-map" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d253889.97198623535!2d107.409075!3d-6.126556!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e697d8d564dc99b%3A0xc2661e75fca38827!2sKec.%20Cilebar%2C%20Karawang%2C%20Jawa%20Barat%2C%20Indonesia!5e0!3m2!1sid!2sus!4v1761791716317!5m2!1sid!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
				@endif
			</div>
		</div>
	</section>

	<!-- Berita Section -->
	<section class="section">
		<h2 class="section-title">BERITA CILEBAR</h2>
		<div class="news-panel">
		@if (count($news) === 0)
			<div class="news-grid">
				<article class="news-card">
					<img class="news-image" src="{{ asset('img/tanam-padi.jpg') }}" alt="Berita contoh" />
					<div class="news-body">
						<h3 class="news-title">Contoh Judul Berita 1</h3>
						<p class="news-summary">Tampilan kartu berita akan muncul seperti ini ketika data berita tersedia. Anda bisa menambahkan berita dari halaman admin.</p>
						<a href="#" class="news-link">Baca Selengkapnya →</a>
					</div>
				</article>
				<article class="news-card">
					<img class="news-image" src="{{ asset('img/tanam-padi.jpg') }}" alt="Berita contoh" />
					<div class="news-body">
						<h3 class="news-title">Contoh Judul Berita 2</h3>
						<p class="news-summary">Ini hanya placeholder. Setelah ada data, kartu akan otomatis terisi judul, ringkasan, dan gambar berita.</p>
						<a href="#" class="news-link">Baca Selengkapnya →</a>
					</div>
				</article>
				<article class="news-card">
					<img class="news-image" src="{{ asset('img/tanam-padi.jpg') }}" alt="Berita contoh" />
					<div class="news-body">
						<h3 class="news-title">Contoh Judul Berita 3</h3>
						<p class="news-summary">Placeholder ini memastikan desain terlihat meski belum ada konten berita yang masuk.</p>
						<a href="#" class="news-link">Baca Selengkapnya →</a>
					</div>
				</article>
			</div>
		@else
		<div class="news-grid">
			@foreach ($news as $n)
			<article class="news-card">
				@if ($n->image_path)
					<img class="news-image" src="{{ asset('uploads/' . basename($n->image_path)) }}" alt="{{ $n->title }}" />
				@else
					<div class="news-image" style="background: linear-gradient(135deg, #dcfce7, #86efac);"></div>
				@endif
				<div class="news-body">
					<h3 class="news-title">{{ $n->title }}</h3>
					<p class="news-summary">{{ $n->summary }}</p>
					<a href="{{ route('detail-berita', $n->id) }}" class="news-link">Baca Selengkapnya →</a>
				</div>
			</article>
			@endforeach
		</div>
		@endif
		</div>
	</section>

</div>
@endsection

