# Fitur Admin Informasi Desa

## Deskripsi
Fitur ini memungkinkan admin untuk mengelola data desa (CRUD - Create, Read, Update, Delete) melalui panel admin. Admin dapat menambah, mengedit, menghapus, dan melihat daftar desa dengan informasi lengkap.

## Komponen yang Dibuat

### 1. Controller Admin
- **File**: `app/Http/Controllers/Admin/DesaController.php`
- **Fungsi**:
  - `index()` - Menampilkan daftar semua desa dengan pagination
  - `create()` - Menampilkan form tambah desa
  - `store()` - Menyimpan data desa baru
  - `edit()` - Menampilkan form edit desa
  - `update()` - Mengupdate data desa
  - `destroy()` - Menghapus data desa
- **Fitur Tambahan**:
  - Upload gambar dengan validasi tipe dan ukuran
  - Auto-generate slug dari nama desa
  - Support JSON untuk data statistik
  - Manajemen file upload di folder `public/uploads`

### 2. Model
- **File**: `app/Models/Desa.php`
- **Update**: Menambahkan fillable fields baru:
  - `image` - Gambar desa
  - `contact_person` - Nama kontak
  - `contact_phone` - Nomor telepon kontak
  - `contact_email` - Email kontak
  - `latitude` - Koordinat GPS latitude
  - `longitude` - Koordinat GPS longitude

### 3. Views Admin

#### Index Page (`resources/views/admin/desa/index.blade.php`)
- Menampilkan tabel daftar desa
- Kolom: Nama, Populasi, Luas Area, Kontak
- Tombol: Edit dan Hapus
- Pagination otomatis

#### Create Page (`resources/views/admin/desa/create.blade.php`)
- Form untuk menambah desa baru
- Fields:
  - Nama Desa (required)
  - Slug URL (auto-generated)
  - Gambar desa
  - Deskripsi (required)
  - Jumlah Penduduk
  - Luas Area (km²)
  - Nama Kontak
  - Nomor Telepon Kontak
  - Email Kontak
  - Latitude & Longitude (GPS)
  - Statistik (JSON format)

#### Edit Page (`resources/views/admin/desa/edit.blade.php`)
- Form untuk edit data desa yang sudah ada
- Sama dengan create page
- Preview gambar jika sudah ada
- Validasi form yang sama

### 4. Database
- **Migration**: `database/alter_desa_table.sql`
- **Kolom Baru**:
  ```
  image (varchar 255)
  contact_person (varchar 100)
  contact_phone (varchar 20)
  contact_email (varchar 100)
  latitude (decimal 10,8)
  longitude (decimal 11,8)
  ```

### 5. Routes
- **File**: `routes/web.php`
- **Routes**:
  ```
  GET    /admin/desa              -> admin.desa.index
  GET    /admin/desa/create       -> admin.desa.create
  POST   /admin/desa              -> admin.desa.store
  GET    /admin/desa/{desa}/edit  -> admin.desa.edit
  PUT    /admin/desa/{desa}       -> admin.desa.update
  DELETE /admin/desa/{desa}       -> admin.desa.destroy
  ```

### 6. Navigation & Dashboard
- **Sidebar Menu**: Menambahkan link "Informasi Desa" ke admin sidebar
- **Dashboard**: 
  - Menambahkan card statistik "Informasi Desa"
  - Menambahkan quick action "Kelola Desa"
  - Update AdminAuthController untuk menghitung jumlah desa

## Validasi Data
- Nama Desa: required, string max 100
- Slug: optional (auto-generate jika kosong)
- Deskripsi: required, string
- Gambar: optional, jpg/jpeg/png/webp/gif, max 5MB
- Kontak: optional, format tervalidasi
- Koordinat GPS: optional, numeric
- Statistik: optional, JSON format

## Penggunaan

### Akses Admin Panel
1. Login ke admin panel
2. Klik menu "Informasi Desa" di sidebar
3. Operasi yang tersedia:
   - **Lihat Daftar**: Tampil otomatis di halaman index
   - **Tambah Desa**: Klik "+ Tambah Desa"
   - **Edit Desa**: Klik tombol "Edit" di baris desa
   - **Hapus Desa**: Klik tombol "Hapus" (confirm diperlukan)

### Contoh Menambah Desa Baru
1. Klik "+ Tambah Desa"
2. Isi form:
   - Nama: "Desa Baru"
   - Deskripsi: "Deskripsi lengkap desa"
   - Populasi: 5000
   - Luas Area: 5.5
   - Gambar: Upload file gambar (opsional)
   - Contact: Isi data kontak (opsional)
3. Klik "Simpan"

## Integrasi dengan Frontend
Data desa yang dikelola di admin akan otomatis:
- Tampil di halaman publik "Informasi Desa" (`/data-pegawai`)
- Bisa diakses di detail desa (`/desa/{slug}`)
- Statistik dan informasi lainnya akan terupdate otomatis

## File yang Diubah
1. `app/Http/Controllers/Admin/AdminAuthController.php` - Tambah Desa count
2. `app/Models/Desa.php` - Tambah fillable fields
3. `routes/web.php` - Tambah DesaController import & resource route
4. `resources/views/admin/dashboard.blade.php` - Tambah card & quick action
5. `resources/views/admin/partials/sidebar.blade.php` - Tambah menu item

## File yang Dibuat
1. `app/Http/Controllers/Admin/DesaController.php` (baru)
2. `resources/views/admin/desa/index.blade.php` (baru)
3. `resources/views/admin/desa/create.blade.php` (baru)
4. `resources/views/admin/desa/edit.blade.php` (baru)
5. `database/alter_desa_table.sql` (baru)

## Testing Checklist
- [ ] Admin bisa login
- [ ] Menu "Informasi Desa" ada di sidebar
- [ ] Klik menu menampilkan daftar desa
- [ ] Tombol "+ Tambah Desa" berfungsi
- [ ] Form tambah desa lengkap dan validasi jalan
- [ ] Upload gambar berhasil
- [ ] Tombol edit berfungsi
- [ ] Tombol hapus berfungsi (dengan confirm)
- [ ] Pagination berfungsi untuk daftar lebih dari 15 item
- [ ] Dashboard menampilkan count desa yang benar
- [ ] Data di frontend otomatis terupdate setelah perubahan admin
