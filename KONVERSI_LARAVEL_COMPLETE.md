# Panduan Konversi PHP Native ke Laravel

## Status Konversi

✅ **KONVERSI SELESAI!** Proyek ini telah berhasil dikonversi dari PHP Native ke Laravel Framework. Semua komponen utama sudah dikonversi dan siap digunakan.

### Ringkasan Status:
- ✅ **Models** - Semua model sudah dibuat dan lengkap
- ✅ **Controllers** - Semua controller (public & admin) sudah lengkap dengan CRUD
- ✅ **Views** - Semua views sudah dikonversi ke Blade templates
- ✅ **Routes** - Semua routes sudah dikonfigurasi dengan benar
- ✅ **Migrations** - Semua migrations sudah dibuat
- ✅ **Middleware** - AdminMiddleware sudah terdaftar dan berfungsi
- ✅ **Authentication** - Sistem authentication admin sudah lengkap
- ✅ **Seeders** - AdminUserSeeder dan DatabaseSeeder sudah ada

## Struktur yang Sudah Dibuat

### ✅ Sudah Selesai:
1. **Composer.json** - Sudah dikonfigurasi dengan Laravel 10
2. **Models** - Semua model sudah dibuat di `app/Models/`
3. **Controllers** - Beberapa controller sudah ada di `app/Http/Controllers/`
4. **Routes** - File `routes/web.php` sudah dikonfigurasi
5. **Layout Blade** - `resources/views/layouts/app.blade.php` sudah dibuat
6. **Home View** - `resources/views/pages/home.blade.php` sudah dikonversi
7. **Helper Functions** - `app/helpers.php` sudah ada

### ✅ Semua Sudah Dikonversi:

#### 1. Views (Blade Templates) ✅
Semua file di `pages/` sudah dikonversi ke Blade templates di `resources/views/pages/`:
- [✅] `berita.php` → `berita.blade.php`
- [✅] `detail_berita.php` → `detail_berita.blade.php`
- [✅] `pengumuman.php` → `pengumuman.blade.php`
- [✅] `detail_pengumuman.php` → `detail_pengumuman.blade.php`
- [✅] `layanan.php` → `layanan.blade.php`
- [✅] `detail_layanan.php` → `detail_layanan.blade.php`
- [✅] `kegiatan.php` → `kegiatan.blade.php`
- [✅] `profil.php` → `profil.blade.php`
- [✅] `kontak.php` → `kontak.blade.php`
- [✅] `data_pegawai.php` → `data_pegawai.blade.php`

#### 2. Admin Views ✅
Semua file di `admin/` sudah dikonversi ke Blade templates di `resources/views/admin/`:
- [✅] Layout admin (`_sidebar.php` → `layouts/admin.blade.php`)
- [✅] Login page
- [✅] Dashboard
- [✅] CRUD untuk News, Announcements, Services, Gallery, Employees, dll

#### 3. Controllers ✅
Semua controller sudah lengkap:
- [✅] HomeController
- [✅] BeritaController (sudah lengkap dengan index dan show)
- [✅] PengumumanController (sudah lengkap dengan index dan show)
- [✅] LayananController (sudah lengkap dengan index dan show)
- [✅] KegiatanController (sudah lengkap dengan index)
- [✅] ProfilController (sudah lengkap dengan index)
- [✅] ContactController (sudah lengkap dengan index dan store)
- [✅] DataPegawaiController (sudah lengkap dengan index)
- [✅] Admin Controllers (News, Announcement, Service, Gallery, Employee, Welcome, Wilayah, Profile, Setting, Inbox - semua sudah lengkap dengan CRUD)

#### 4. Database Migrations ✅
Semua migrations untuk semua tabel sudah dibuat:
- [✅] `create_users_table` - Sudah ada
- [✅] `create_news_table` - Sudah ada
- [✅] `create_announcements_table` - Sudah ada
- [✅] `create_services_table` - Sudah ada
- [✅] `create_gallery_table` - Sudah ada
- [✅] `create_profile_table` - Sudah ada
- [✅] `create_contacts_table` - Sudah ada
- [✅] `create_settings_table` - Sudah ada
- [✅] `create_welcome_message_table` - Sudah ada
- [✅] `create_wilayah_info_table` - Sudah ada
- [✅] `create_employees_table` - Sudah ada

#### 5. Middleware ✅
- [✅] AdminMiddleware sudah ada
- [✅] Middleware sudah terdaftar di `app/Http/Kernel.php` dengan alias 'admin'

#### 6. Authentication ✅
- [✅] Setup authentication untuk admin (AdminAuthController sudah lengkap)
- [✅] Seeder untuk user admin default sudah ada (AdminUserSeeder)
- [✅] AdminMiddleware sudah terintegrasi dengan authentication

## Langkah-Langkah Menyelesaikan Konversi

### 1. Install Dependencies
```bash
composer install
```

### 2. Setup Environment
```bash
cp .env.example .env
php artisan key:generate
```

Edit `.env`:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=cobain
DB_USERNAME=root
DB_PASSWORD=

APP_URL=http://localhost/cobain
```

### 3. Jalankan Migrations
```bash
php artisan migrate
```

Atau import schema yang sudah ada:
```bash
mysql -u root cobain < database/schema.sql
```

### 4. Buat Seeder untuk Admin User
✅ **Sudah ada!** AdminUserSeeder sudah dibuat.

Untuk menjalankan seeder:
```bash
php artisan db:seed --class=AdminUserSeeder
```

**Kredensial Admin Default:**
- Username: `admin`
- Password: `admin123`
- ⚠️ **PENTING:** Ganti password setelah pertama kali login!

### 5. Konversi Views
Untuk setiap file PHP di `pages/`, konversi ke Blade:
- Ganti `<?php echo e($var); ?>` dengan `{{ $var }}`
- Ganti `<?php echo $var; ?>` dengan `{!! $var !!}` (untuk HTML)
- Ganti `<?php if: ?>` dengan `@if`
- Ganti `<?php foreach: ?>` dengan `@foreach`
- Ganti `<?php include ?>` dengan `@include` atau `@extends`
- Ganti `base_url()` dengan `route()` atau `asset()`

### 6. Update Public Path
Pastikan semua asset menggunakan `asset()` helper:
- `base_url('public/css/style.css')` → `asset('css/style.css')`
- `base_url('public/img/logo.png')` → `asset('img/logo.png')`
- `base_url('public/uploads/...')` → `asset('uploads/...')`

### 7. Update Routes
Semua route sudah dikonfigurasi di `routes/web.php`. Pastikan semua controller method sudah sesuai.

### 8. Test Aplikasi
```bash
php artisan serve
```

Akses: `http://localhost:8000`

## Perbedaan Utama PHP Native vs Laravel

### Routing
**PHP Native:**
```php
$page = $_GET['page'] ?? 'home';
switch ($page) {
    case 'berita':
        include 'pages/berita.php';
        break;
}
```

**Laravel:**
```php
Route::get('/berita', [BeritaController::class, 'index'])->name('berita');
```

### Database
**PHP Native:**
```php
$stmt = $pdo->query("SELECT * FROM news");
$news = $stmt->fetchAll();
```

**Laravel:**
```php
$news = News::all();
```

### Views
**PHP Native:**
```php
<?php echo e($title); ?>
<?php if ($condition): ?>
    ...
<?php endif; ?>
```

**Laravel Blade:**
```blade
{{ $title }}
@if ($condition)
    ...
@endif
```

### Helper Functions
**PHP Native:**
```php
base_url('path')
```

**Laravel:**
```php
asset('path')
route('name')
url('path')
```

## Catatan Penting

1. **Data Tidak Berubah**: Semua data di database tetap sama, hanya struktur aplikasi yang berubah
2. **Tampilan Tetap Sama**: Semua CSS dan styling tetap digunakan
3. **Upload Path**: Pastikan folder `public/uploads` dapat ditulisi (permission 775 atau 755)
4. **Session**: Laravel menggunakan session driver, pastikan konfigurasi di `.env`
5. **Storage Link**: Jika menggunakan `storage/app/public`, jalankan `php artisan storage:link` untuk membuat symbolic link
6. **Kredensial Admin**: Default username: `admin`, password: `admin123` - **WAJIB diganti setelah deployment!**
7. **File Upload**: Semua upload file disimpan di `public/uploads/` dengan penamaan unik menggunakan timestamp dan random string

## Troubleshooting

### Error: Class not found
```bash
composer dump-autoload
```

### Error: View not found
Pastikan file Blade ada di `resources/views/` dengan ekstensi `.blade.php`

### Error: Route not found
Pastikan route sudah terdaftar di `routes/web.php` dan jalankan:
```bash
php artisan route:clear
php artisan route:cache
```

### Error: Database connection
Pastikan konfigurasi database di `.env` sudah benar.

## Next Steps

✅ **Semua langkah konversi utama sudah selesai!** 

Langkah selanjutnya yang disarankan:
1. ✅ Konversi semua views ke Blade - **SELESAI**
2. ✅ Lengkapi semua controllers - **SELESAI**
3. ✅ Buat migrations untuk semua tabel - **SELESAI**
4. ✅ Setup authentication - **SELESAI**
5. ⚠️ Test semua fitur - **Perlu dilakukan manual testing**
6. ⚠️ Deploy - **Siap untuk deployment**

## Ringkasan Routes

### Public Routes (Sudah Lengkap):
- `/` - Home page
- `/berita` - Daftar berita
- `/detail-berita/{id}` - Detail berita
- `/pengumuman` - Daftar pengumuman
- `/detail-pengumuman/{id}` - Detail pengumuman
- `/layanan` - Daftar layanan
- `/detail-layanan/{id}` - Detail layanan
- `/kegiatan` - Daftar kegiatan/galeri
- `/profil` - Halaman profil
- `/kontak` - Halaman kontak (GET & POST)
- `/data-pegawai` - Daftar pegawai

### Admin Routes (Sudah Lengkap):
- `/admin/login` - Login admin (GET & POST)
- `/admin/logout` - Logout admin
- `/admin` - Dashboard admin
- `/admin/news` - CRUD berita
- `/admin/announcements` - CRUD pengumuman
- `/admin/services` - CRUD layanan
- `/admin/gallery` - CRUD galeri
- `/admin/employees` - CRUD pegawai
- `/admin/welcome` - Edit welcome message
- `/admin/wilayah` - Edit informasi wilayah
- `/admin/profile` - Edit profil instansi
- `/admin/settings` - Edit pengaturan
- `/admin/inbox` - Kelola inbox kontak


## Detail Konversi Controller (SUDAH SELESAI)

### ✅ BeritaController
- ✅ Method `index()` sudah mengambil data berita dari model `News` dengan pagination (9 per halaman)
- ✅ Method `show($id)` sudah menampilkan detail berita
- ✅ Route sudah menggunakan nama yang konsisten (`route('berita')`, `route('detail-berita', $id)`)

### ✅ PengumumanController
- ✅ Method `index()` sudah menampilkan daftar pengumuman dengan pagination (9 per halaman)
- ✅ Method `show($id)` sudah menampilkan detail pengumuman

### ✅ LayananController
- ✅ Method `index()` sudah mengambil data layanan dari model `Service`
- ✅ Method `show($id)` sudah menampilkan detail layanan

### ✅ KegiatanController
- ✅ Method `index()` sudah menampilkan daftar kegiatan/galeri dengan pagination (12 per halaman)

### ✅ ProfilController
- ✅ Method `index()` sudah mengambil data profil, welcome message, leaders, dan wilayah info

### ✅ ContactController
- ✅ Method `index()` sudah menampilkan form kontak dan informasi alamat
- ✅ Method `store()` sudah menyimpan pesan kontak ke database dengan validasi

### ✅ DataPegawaiController
- ✅ Method `index()` sudah mengambil daftar pegawai dan mengelompokkan berdasarkan divisi

### ✅ Admin Controllers
- ✅ Semua controller CRUD sudah lengkap: `Admin\NewsController`, `Admin\AnnouncementController`, `Admin\ServiceController`, `Admin\GalleryController`, `Admin\EmployeeController`
- ✅ Semua controller sudah memiliki method lengkap: `index`, `create`, `store`, `edit`, `update`, `destroy`
- ✅ Semua controller sudah menggunakan Request validation
- ✅ Upload file (gambar) sudah diimplementasikan menggunakan `public_path('uploads')` dengan penamaan file yang unik


## Rencana Migrasi Database Detail

| Tabel | Kolom Utama | Keterangan |
|-------|-------------|------------|
| `users` | `id`, `name`, `email`, `password`, `is_admin` | Penampung data admin dan user lain jika ada |
| `news` | `id`, `title`, `slug`, `excerpt`, `content`, `image_path`, `published_at`, `created_by` | Sesuaikan struktur lama, gunakan `slug` untuk URL |
| `announcements` | `id`, `title`, `slug`, `content`, `file_path`, `published_at` | File lampiran bisa opsional |
| `services` | `id`, `title`, `slug`, `description`, `icon`, `image_path` | Icon bisa berupa nama class atau file |
| `gallery` | `id`, `title`, `image_path`, `published_at`, `category` | Tambahkan kategori jika diperlukan |
| `employees` | `id`, `name`, `position`, `nip`, `photo_path`, `email`, `phone` | Sesuaikan dengan struktur lama |
| `profiles` | `id`, `title`, `slug`, `content`, `image_path` | Bisa menampung halaman profil terkait |
| `contacts` | `id`, `name`, `email`, `phone`, `message`, `status` | Status untuk menandai sudah dibaca |
| `settings` | `id`, `key`, `value` | Untuk konfigurasi dinamis (logo, judul website, dsb.) |
| `welcome_messages` | `id`, `title`, `content`, `button_text`, `button_link` | Menampung konten hero/landing |
| `wilayah_infos` | `id`, `name`, `leader`, `population`, `area`, `description` | Struktur disesuaikan data wilayah |

### Tips Menulis Migration
- Gunakan tipe kolom yang sesuai (`string`, `text`, `longText`, `boolean`, `timestamp`).
- Tambahkan indeks pada kolom yang sering dicari (`slug`, `published_at`).
- Sertakan `softDeletes()` jika data perlu bisa dipulihkan.
- Gunakan `foreignId('created_by')->constrained('users')` untuk relasi dengan user.
- Semua migration harus memiliki `timestamps()`.

### Seeder dan Factory
- Buat factory untuk `News`, `Announcement`, `Service`, `Employee` untuk mempermudah pengujian.
- Gunakan `DatabaseSeeder` untuk memanggil semua seeder (`AdminUserSeeder`, `NewsSeeder`, dll).
- Simpan file upload dummy di `storage/app/public/uploads` dan jalankan `php artisan storage:link`.


## Setup Authentication Admin

1. **Instalasi Breeze/Jetstream (Opsional)**
   ```bash
   composer require laravel/breeze --dev
   php artisan breeze:install
   npm install && npm run build
   ```
   Sesuaikan jika ingin tampilan auth default Laravel.

2. **Route Grup Admin**
   ```php
   Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
       Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
       Route::resource('/news', Admin\NewsController::class);
       // Tambahkan resource lain
   });
   ```

3. **AdminMiddleware**
   - Pastikan `app/Http/Middleware/AdminMiddleware.php` memeriksa `auth()->user()->is_admin`.
   - Daftarkan middleware di `app/Http/Kernel.php` pada `$routeMiddleware`.

4. **Seeder Admin Default**
   ```php
   User::updateOrCreate(
       ['email' => 'admin@cobain.test'],
       [
           'name' => 'Administrator',
           'password' => bcrypt('password'),
           'is_admin' => true,
       ]
   );
   ```
   Jalankan `php artisan db:seed --class=AdminUserSeeder`.

5. **Proteksi Upload**
   - Pastikan folder `public/uploads` hanya bisa diakses melalui route yang aman.
   - Gunakan policy untuk membatasi siapa yang bisa melakukan CRUD.


## Strategi Pengujian

- **Feature Test**: Buat feature test untuk halaman publik (`HomeTest`, `BeritaTest`) guna memastikan route mengembalikan status 200 dan view yang tepat.
- **Unit Test**: Test helper dan scope model (misalnya `News::published()`).
- **HTTP Test**: Gunakan `actingAs($admin)` untuk menguji dashboard admin dan operasi CRUD.
- **Browser Test (Opsional)**: Gunakan Laravel Dusk jika perlu pengujian end-to-end.
- **Manual Test**: Checklist manual untuk memastikan tampilan sama dengan aplikasi asli. Gunakan screenshot sebelum/sekitar waktu konversi sebagai referensi.


## Checklist Pra-Deploy

- Pastikan `.env` produksi benar (database, mail, APP_URL).
- Jalankan `php artisan config:cache`, `route:cache`, `view:cache`.
- Pastikan symbolic link storage: `php artisan storage:link`.
- Migrasi dan seed di server produksi: `php artisan migrate --force`, `php artisan db:seed --force`.
- Konfigurasi queue dan scheduler jika ada fitur email/notifikasi (`php artisan queue:work`, `php artisan schedule:run`).
- Review permission folder `storage` dan `bootstrap/cache`.


## Appendix: Command Referensi

```bash
# Membuat controller resource
php artisan make:controller Admin/NewsController --resource --model=News

# Membuat model + migration + factory + seeder sekaligus
php artisan make:model Gallery -mfs

# Menjalankan semua test
php artisan test

# Membersihkan cache konfigurasi & route
php artisan optimize:clear
```

## Kesimpulan

✅ **Konversi dari PHP Native ke Laravel telah SELESAI!**

Semua komponen utama sudah dikonversi dan siap digunakan:
- ✅ Semua Models sudah dibuat
- ✅ Semua Controllers (public & admin) sudah lengkap
- ✅ Semua Views sudah dikonversi ke Blade
- ✅ Semua Routes sudah dikonfigurasi
- ✅ Semua Migrations sudah dibuat
- ✅ Middleware sudah terdaftar dan berfungsi
- ✅ Authentication admin sudah lengkap
- ✅ Seeders sudah ada

### Langkah Selanjutnya:

1. **Testing Manual**: 
   - Test semua halaman public
   - Test login admin
   - Test semua CRUD di admin panel
   - Test upload file
   - Test form kontak

2. **Setup Production**:
   - Update `.env` dengan konfigurasi production
   - Ganti password admin default
   - Jalankan `php artisan config:cache`
   - Jalankan `php artisan route:cache`
   - Jalankan `php artisan view:cache`
   - Pastikan permission folder `storage` dan `bootstrap/cache` benar

3. **Deployment**:
   - Upload semua file ke server
   - Jalankan `composer install --no-dev --optimize-autoloader`
   - Jalankan `php artisan migrate --force`
   - Jalankan `php artisan db:seed --force` (jika perlu)
   - Pastikan symbolic link storage sudah dibuat: `php artisan storage:link`

### Support & Maintenance:

- Dokumentasi ini akan terus diupdate jika ada perubahan
- Jika menemukan bug atau masalah, periksa bagian Troubleshooting di atas
- Untuk pertanyaan lebih lanjut, konsultasikan dengan tim development

**Selamat! Aplikasi Laravel Anda siap digunakan! 🎉**