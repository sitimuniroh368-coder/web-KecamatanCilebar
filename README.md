# Sistem Informasi Kecamatan Cilebar (PHP Native)

Teknologi: PHP native (tanpa framework), MySQL, HTML, CSS, JavaScript.

## Persiapan
1. Buat database MySQL bernama `kec_cilebar` (atau ubah di `config/config.php`).
2. Import schema dari `database/schema.sql`.
3. Atur konfigurasi koneksi di `config/config.php` (DB_HOST, DB_NAME, DB_USER, DB_PASS, BASE_URL).
4. Pastikan folder `public/uploads` dapat ditulisi PHP.

Login admin default:
- Username: `admin`
- Password: `admin123`

## Struktur
- `index.php` router sederhana public.
- `config/` konfigurasi dan koneksi DB (PDO).
- `includes/` helper.
- `partials/` header/footer.
- `pages/` halaman publik.
- `admin/` panel admin (auth + CRUD konten).
- `public/` aset statis dan upload.

## Menjalankan
- Laragon/XAMPP: letakkan folder sebagai virtual host atau dalam `www/htdocs`.
- Akses public: `http://localhost/cobain/index.php`
- Admin: `http://localhost/cobain/admin/login.php`

## Fitur
- Publik: Berita, Pengumuman, Layanan, Profil, Kontak.
- Admin: Login/Logout, Dashboard, CRUD Berita, Pengumuman, Layanan, Galeri (upload), Profil, Kotak Masuk.

## Keamanan & Catatan
- Gunakan password kuat, segera ganti akun default.
- BASE_URL kosong berarti relatif dari root. Sesuaikan jika bukan di root.
- Maksimal ukuran upload diatur oleh `php.ini` (`upload_max_filesize`, `post_max_size`).
