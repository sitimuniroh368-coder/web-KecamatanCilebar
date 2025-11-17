<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AnnouncementController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\InboxController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\WelcomeController;
use App\Http\Controllers\Admin\WilayahController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DataPegawaiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\ProfilController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/berita', [BeritaController::class, 'index'])->name('berita');
Route::get('/detail-berita/{id}', [BeritaController::class, 'show'])->name('detail-berita');
Route::get('/pengumuman', [PengumumanController::class, 'index'])->name('pengumuman');
Route::get('/detail-pengumuman/{id}', [PengumumanController::class, 'show'])->name('detail-pengumuman');
Route::get('/layanan', [LayananController::class, 'index'])->name('layanan');
Route::get('/detail-layanan/{id}', [LayananController::class, 'show'])->name('detail-layanan');
Route::get('/kegiatan', [KegiatanController::class, 'index'])->name('kegiatan');
Route::get('/profil', [ProfilController::class, 'index'])->name('profil');
Route::get('/kontak', [ContactController::class, 'index'])->name('kontak');
Route::post('/kontak', [ContactController::class, 'store'])->name('kontak.store');
Route::get('/data-pegawai', [DataPegawaiController::class, 'index'])->name('data-pegawai');

// Admin Auth Routes
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login.post');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

    Route::middleware(['admin'])->group(function () {
        Route::get('/', [AdminAuthController::class, 'dashboard'])->name('admin.dashboard');

        Route::resource('news', NewsController::class)->names('admin.news')->except(['show']);
        Route::resource('announcements', AnnouncementController::class)->names('admin.announcements')->except(['show']);
        Route::resource('services', ServiceController::class)->names('admin.services')->except(['show']);
        Route::resource('gallery', GalleryController::class)->names('admin.gallery')->only(['index', 'create', 'store', 'destroy']);
        Route::resource('employees', EmployeeController::class)->names('admin.employees')->except(['show']);

        Route::get('/welcome', [WelcomeController::class, 'edit'])->name('admin.welcome');
        Route::post('/welcome', [WelcomeController::class, 'update'])->name('admin.welcome.update');

        Route::get('/wilayah', [WilayahController::class, 'edit'])->name('admin.wilayah');
        Route::post('/wilayah', [WilayahController::class, 'update'])->name('admin.wilayah.update');

        Route::get('/profile', [ProfileController::class, 'edit'])->name('admin.profile');
        Route::post('/profile', [ProfileController::class, 'update'])->name('admin.profile.update');

        Route::get('/settings', [SettingController::class, 'edit'])->name('admin.settings');
        Route::post('/settings', [SettingController::class, 'update'])->name('admin.settings.update');

        Route::get('/inbox', [InboxController::class, 'index'])->name('admin.inbox.index');
        Route::delete('/inbox/{contact}', [InboxController::class, 'destroy'])->name('admin.inbox.destroy');
    });
});

