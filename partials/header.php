<?php
require_once __DIR__ . '/../includes/functions.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title><?php echo e(APP_NAME); ?></title>
    <?php $cssVersion = @filemtime(__DIR__ . '/../public/css/style.css') ?: time(); ?>
    <link rel="stylesheet" href="<?php echo e(base_url('public/css/style.css')); ?>?v=<?php echo $cssVersion; ?>" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="icon" href="<?php echo e(base_url('public/favicon.ico')); ?>" />
</head>
<body>
	<div class="top-bar"></div>
	<header class="site-header">
		<div class="container header-content">
			<div class="branding">
				<div class="logo-circle">
					<img class="logo" src="<?php echo e(base_url('public/img/logo kecamatan.png')); ?>" alt="Logo Kabupaten Karawang" />
				</div>
				<div>
					<div class="brand-text">Pemerintah Kab. Karawang</div>
					<div class="brand-title">Kecamatan Cilebar</div>
				</div>
			</div>
			<nav class="site-nav">
				<a href="<?php echo e(base_url('index.php')); ?>">Beranda</a>
				<a href="<?php echo e(base_url('index.php?page=profil')); ?>">Profil</a>
				<a href="<?php echo e(base_url('index.php?page=berita')); ?>">Berita</a>
				<a href="<?php echo e(base_url('index.php?page=layanan')); ?>">Layanan</a>
				<a href="<?php echo e(base_url('index.php?page=kegiatan')); ?>">Kegiatan</a>
				<a href="<?php echo e(base_url('index.php?page=pengumuman')); ?>">Informasi</a>
				<a href="<?php echo e(base_url('index.php?page=data-pegawai')); ?>">Data Pegawai</a>
				<a href="<?php echo e(base_url('index.php?page=kontak')); ?>">Kontak</a>
			</nav>
		</div>
	</header>
	<main class="site-main">

