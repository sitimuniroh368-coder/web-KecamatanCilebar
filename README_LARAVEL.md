# Sistem Informasi Kecamatan Cilebar - Laravel

Aplikasi ini telah dikonversi dari PHP Native ke Laravel Framework.

## Instalasi

### 1. Install Dependencies
```bash
composer install
```

### 2. Setup Environment
```bash
cp .env.example .env
php artisan key:generate
```

Edit file `.env` dan sesuaikan konfigurasi database:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=cobain
DB_USERNAME=root
DB_PASSWORD=

APP_URL=http://localhost/cobain
```

### 3. Setup Database

**Opsi A: Import Schema yang Sudah Ada**
```bash
mysql -u root cobain < database/schema.sql
```

**Opsi B: Jalankan Migrations (jika sudah dibuat)**
```bash
php artisan migrate
```

### 4. Setup Storage Link
```bash
php artisan storage:link
```

### 5. Jalankan Aplikasi
```bash
php artisan serve
```

Akses aplikasi di: `http://localhost:8000`

## Struktur Proyek

```
cobain/
├── app/
│   ├── Http/
│   │   ├── Controllers/      # Controllers
│   │   └── Middleware/       # Middleware
│   ├── Models/               # Eloquent Models
│   └── helpers.php          # Helper functions
├── resources/
│   └── views/               # Blade templates
│       ├── layouts/         # Layout templates
│       ├── pages/           # Public pages
│       └── admin/           # Admin pages
├── routes/
│   └── web.php             # Web routes
├── public/                 # Public assets
│   ├── css/
│   ├── img/
│   ├── js/
│   └── uploads/
└── database/
    ├── migrations/         # Database migrations
    └── seeders/           # Database seeders
```

## Fitur

### Public Pages
- Beranda
- Profil
- Berita
- Pengumuman
- Layanan
- Kegiatan (Galeri)
- Data Pegawai
- Kontak

### Admin Panel
- Dashboard
- CRUD Berita
- CRUD Pengumuman
- CRUD Layanan
- CRUD Galeri
- CRUD Data Pegawai
- Pengaturan
- Kotak Masuk

## Default Login

- Username: `admin`
- Password: `admin123`

**PENTING**: Ganti password default setelah login pertama kali!

## Catatan Konversi

Aplikasi ini dikonversi dari PHP Native ke Laravel. Beberapa perubahan:

1. **Routing**: Menggunakan Laravel Route
2. **Views**: Menggunakan Blade templates
3. **Database**: Menggunakan Eloquent ORM
4. **Authentication**: Menggunakan Laravel Session
5. **Helpers**: Menggunakan Laravel helpers (asset, route, url)

## Troubleshooting

### Error: Class not found
```bash
composer dump-autoload
```

### Error: View not found
Pastikan file Blade ada di `resources/views/` dengan ekstensi `.blade.php`

### Error: Route not found
```bash
php artisan route:clear
php artisan route:cache
```

### Error: Permission denied (uploads)
Pastikan folder `public/uploads` dapat ditulisi:
```bash
chmod -R 775 public/uploads
```

## Development

### Clear Cache
```bash
php artisan cache:clear
php artisan config:clear
php artisan view:clear
php artisan route:clear
```

### Generate IDE Helper (Optional)
```bash
composer require --dev barryvdh/laravel-ide-helper
php artisan ide-helper:generate
```

## Production

### Optimize
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### Disable Debug
Set `APP_DEBUG=false` di `.env`

## Support

Untuk bantuan lebih lanjut, lihat dokumentasi Laravel: https://laravel.com/docs
