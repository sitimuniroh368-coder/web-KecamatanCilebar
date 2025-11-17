# Instalasi Laravel - Sistem Informasi Kecamatan Cilebar

## ⚠️ PENTING: Ini adalah konversi dari PHP Native ke Laravel

Aplikasi ini sedang dalam proses konversi. Beberapa bagian sudah dikonversi, beberapa masih perlu dikonversi.

## Langkah Instalasi

### 1. Install Composer Dependencies
```bash
composer install
```

### 2. Setup Environment
```bash
cp .env.example .env
php artisan key:generate
```

### 3. Konfigurasi Database di .env
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=cobain
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Update User Model
Pastikan tabel `users` memiliki kolom `is_admin` (boolean):
```sql
ALTER TABLE users ADD COLUMN is_admin TINYINT(1) DEFAULT 0;
UPDATE users SET is_admin = 1 WHERE username = 'admin';
```

### 5. Jalankan Aplikasi
```bash
php artisan serve
```

Atau akses via web server (Laragon/XAMPP) di: `http://localhost/cobain`

## Status Konversi

### ✅ Sudah Selesai:
- ✅ Struktur Laravel dasar
- ✅ Models (User, News, Announcement, Service, Gallery, Employee, Contact, Setting, WelcomeMessage, Profile, WilayahInfo)
- ✅ Routing (routes/web.php)
- ✅ Middleware (Admin, Auth, CSRF, dll)
- ✅ Beberapa Controller (Home, Contact, DataPegawai, AdminAuth)
- ✅ File konfigurasi (app, database, auth, session, filesystems)

### ⏳ Masih Perlu Dikonversi:
- ⏳ **Views** - Semua file di `pages/` perlu dikonversi ke Blade di `resources/views/`
- ⏳ **Admin Controllers** - NewsController, AnnouncementController, ServiceController, GalleryController, EmployeeController, dll
- ⏳ **Helper Functions** - Update semua `base_url()` dan `e()` di views
- ⏳ **File Upload** - Konversi logic upload ke Laravel Storage

## Struktur Views yang Perlu Dibuat

```
resources/views/
  layouts/
    app.blade.php (dari partials/header.php + footer.php)
  home.blade.php
  berita.blade.php
  detail_berita.blade.php
  pengumuman.blade.php
  detail_pengumuman.blade.php
  layanan.blade.php
  detail_layanan.blade.php
  kegiatan.blade.php
  profil.blade.php
  kontak.blade.php
  data_pegawai.blade.php
  admin/
    login.blade.php
    index.blade.php
    _sidebar.blade.php
    news/
      index.blade.php
      create.blade.php
      edit.blade.php
    ... (dan seterusnya)
```

## Perubahan Syntax yang Perlu Dilakukan

### 1. Base URL
**Sebelum (PHP Native):**
```php
<?php echo e(base_url('public/img/logo.png')); ?>
```

**Sesudah (Laravel Blade):**
```blade
{{ asset('img/logo.png') }}
```

### 2. CSRF Token
**Sebelum:**
```php
<input type="hidden" name="csrf_token" value="<?php echo e(csrf_token()); ?>" />
```

**Sesudah:**
```blade
@csrf
```

### 3. Routes
**Sebelum:**
```php
<a href="<?php echo e(base_url('index.php?page=berita')); ?>">Berita</a>
```

**Sesudah:**
```blade
<a href="{{ route('berita') }}">Berita</a>
```

### 4. Include Files
**Sebelum:**
```php
<?php include __DIR__ . '/partials/header.php'; ?>
```

**Sesudah:**
```blade
@extends('layouts.app')
```

### 5. Loops
**Sebelum:**
```php
<?php foreach ($news as $item): ?>
    <h3><?php echo e($item['title']); ?></h3>
<?php endforeach; ?>
```

**Sesudah:**
```blade
@foreach($news as $item)
    <h3>{{ $item->title }}</h3>
@endforeach
```

## Controller yang Masih Perlu Dibuat

1. **BeritaController** - index(), show()
2. **PengumumanController** - index(), show()
3. **LayananController** - index(), show()
4. **KegiatanController** - index()
5. **ProfilController** - index()
6. **Admin Controllers:**
   - NewsController - index(), create(), store(), edit(), update(), destroy()
   - AnnouncementController - index(), create(), store(), edit(), update(), destroy()
   - ServiceController - index(), create(), store(), edit(), update(), destroy()
   - GalleryController - index(), create(), store(), destroy()
   - EmployeeController - index(), create(), store(), edit(), update(), destroy()
   - WelcomeController - edit(), update()
   - WilayahController - edit(), update()
   - ProfileController - edit(), update()
   - SettingController - edit(), update()
   - InboxController - index()

## Catatan

1. **Database tetap sama** - Tidak perlu migration jika database sudah ada
2. **Assets tetap di public/** - CSS, JS, images tetap di folder public
3. **Upload folder** - Tetap di `public/uploads/`
4. **Tampilan tetap sama** - Hanya syntax yang berubah

## Testing

Setelah konversi selesai, test:
- ✅ Halaman public bisa diakses
- ✅ Admin login berfungsi
- ✅ CRUD berfungsi
- ✅ File upload berfungsi
- ✅ Form submission berfungsi

## Bantuan

Lihat file `KONVERSI_LARAVEL.md` untuk panduan lengkap konversi.

