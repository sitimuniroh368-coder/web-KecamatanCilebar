@extends('admin.layouts.guest')

@section('title', 'Masuk Dashboard Admin')

@section('content')
    <div class="admin-login-shell">
        <div class="admin-login-form">
            <div class="admin-login-brand">
                <div class="logo-circle">KC</div>
                <div class="admin-login-title">
                    <h2>Masuk ke Dashboard</h2>
                    <p>Kelola informasi Kecamatan Cilebar dengan lebih mudah</p>
                </div>
            </div>

            @if(session('error'))
                <p class="auth-alert">{{ session('error') }}</p>
            @endif

            @if ($errors->any())
                <div class="auth-alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="post" action="{{ route('admin.login.post') }}">
                @csrf
                <div class="row">
                    <label>Username</label>
                    <input type="text" name="username" value="{{ old('username') }}" required autofocus>
                </div>
                <div class="row">
                    <label>Password</label>
                    <input type="password" name="password" required>
                </div>
                <div class="row" style="display:flex;align-items:center;gap:8px;">
                    <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label for="remember" style="margin:0;">Ingat saya</label>
                </div>
                <button class="btn" type="submit">Masuk</button>
            </form>
            <p class="auth-note">Akun default: <strong>admin</strong> / <strong>admin123</strong> (ubah melalui pengaturan).</p>
        </div>
        <div class="admin-login-visual">
            <img src="{{ asset('img/kecamatan-cilebar.jpg') }}" alt="Panorama Kecamatan Cilebar">
            <div class="admin-login-overlay">
                <h3>Selamat Datang di Kecamatan Cilebar</h3>
                <p>Panel administrasi terpusat untuk mengelola berita, layanan, dan pelaporan warga secara profesional.</p>
            </div>
        </div>
    </div>
@endsection

