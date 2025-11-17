# Panduan Konversi PHP Native ke Laravel

## Status Konversi

### ✅ Sudah Dikonversi:
1. ✅ Struktur dasar Laravel (composer.json, routes, middleware)
2. ✅ Models untuk semua tabel
3. ✅ Routing (routes/web.php)
4. ✅ Middleware (Admin, Auth, CSRF, dll)
5. ✅ Beberapa Controller dasar (Home, Contact, DataPegawai, AdminAuth)

### ⏳ Perlu Dikonversi:
1. ⏳ Semua Views (dari `pages/` ke `resources/views/`)
2. ⏳ Admin Controllers untuk CRUD (News, Announcement, Service, Gallery, Employee, dll)
3. ⏳ Helper functions di views
4. ⏳ File upload handling
5. ⏳ Database migrations (opsional, karena DB sudah ada)

## Langkah Instalasi

1. **Install Composer Dependencies**
   ```bash
   composer install
   ```

2. **Setup Environment**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

3. **Update .env**
   - Set `APP_URL=http://localhost/cobain`
   - Set database credentials
   - Set `APP_TIMEZONE=Asia/Jakarta`

4. **Jalankan Aplikasi**
   ```bash
   php artisan serve
   ```

## Konversi Views

Views perlu dikonversi dari PHP native ke Blade syntax:

### Perubahan yang Perlu Dilakukan:

1. **Base URL**
   - Native: `<?php echo e(base_url('public/img/logo.png')); ?>`
   - Laravel: `{{ asset('img/logo.png') }}`

2. **CSRF Token**
   - Native: `<input type="hidden" name="csrf_token" value="<?php echo e(csrf_token()); ?>" />`
   - Laravel: `@csrf`

3. **Route URLs**
   - Native: `<?php echo e(base_url('index.php?page=berita')); ?>`
   - Laravel: `{{ route('berita') }}`

4. **Include Files**
   - Native: `<?php include __DIR__ . '/partials/header.php'; ?>`
   - Laravel: `@include('partials.header')`

5. **Loops & Conditions**
   - Native: `<?php foreach ($items as $item): ?>`
   - Laravel: `@foreach($items as $item)`

## Struktur Folder yang Perlu Dibuat

```
resources/
  views/
    layouts/
      app.blade.php (dari partials/header.php + footer.php)
    home.blade.php (dari pages/home.php)
    berita.blade.php (dari pages/berita.php)
    detail_berita.blade.php (dari pages/detail_berita.php)
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
      news/
        index.blade.php
        create.blade.php
        edit.blade.php
      announcements/
        index.blade.php
        create.blade.php
        edit.blade.php
      ... (dan seterusnya)
```

## Controller yang Perlu Dibuat

1. **BeritaController** - untuk halaman berita
2. **PengumumanController** - untuk halaman pengumuman
3. **LayananController** - untuk halaman layanan
4. **KegiatanController** - untuk halaman kegiatan
5. **ProfilController** - untuk halaman profil
6. **Admin Controllers:**
   - NewsController (CRUD)
   - AnnouncementController (CRUD)
   - ServiceController (CRUD)
   - GalleryController (CRUD)
   - EmployeeController (CRUD)
   - WelcomeController
   - WilayahController
   - ProfileController
   - SettingController
   - InboxController

## Helper Functions

File `app/helpers.php` sudah dibuat dengan fungsi:
- `base_url()` - untuk URL
- `e()` - untuk escape HTML

Jika perlu lebih banyak helper, tambahkan di file ini dan register di `composer.json`:
```json
"autoload": {
    "files": [
        "app/helpers.php"
    ]
}
```

## File Upload

Untuk file upload, gunakan:
```php
$request->file('photo')->store('uploads', 'public');
```

Atau gunakan Storage facade:
```php
use Illuminate\Support\Facades\Storage;

$path = $request->file('photo')->storeAs('uploads', $filename, 'public');
```

## Authentication

Laravel Auth sudah disetup. User model perlu field `is_admin` untuk membedakan admin.

## Catatan Penting

1. **Database tetap sama** - tidak perlu migration jika DB sudah ada
2. **Assets tetap di public/** - CSS, JS, images tetap di folder public
3. **Tampilan tetap sama** - hanya syntax yang berubah, tampilan tetap
4. **Upload folder** - tetap di `public/uploads/`

## Testing

Setelah konversi, test:
1. ✅ Halaman public bisa diakses
2. ✅ Admin login berfungsi
3. ✅ CRUD berfungsi
4. ✅ File upload berfungsi
5. ✅ Form submission berfungsi

