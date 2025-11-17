@extends('admin.layouts.app')

@section('title', 'Profil Instansi - Panel Admin')
@section('page-title', 'Profil Instansi')
@section('page-subtitle', 'Perbarui informasi profil Kecamatan Cilebar')

@section('content')
    <form method="post" action="{{ route('admin.profile.update') }}">
        @csrf

        <div class="row">
            <label for="content">Konten Profil</label>
            <textarea id="content" name="content" rows="12" required>{{ old('content', $profile->content) }}</textarea>
            <p class="input-help">Isi dengan sejarah, visi misi, struktur organisasi, dan informasi lain.</p>
        </div>

        <button class="btn" type="submit">Simpan</button>
    </form>
@endsection

