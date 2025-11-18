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

        <div class="row">
            <label for="tugas_fungsi">Tugas & Fungsi</label>
            <textarea id="tugas_fungsi" name="tugas_fungsi" rows="8">{{ old('tugas_fungsi', $profile->tugas_fungsi) }}</textarea>
            <p class="input-help">Deskripsikan tugas dan fungsi Kecamatan Cilebar.</p>
        </div>

        <div class="row">
            <label for="sejarah">Sejarah Kecamatan</label>
            <textarea id="sejarah" name="sejarah" rows="8">{{ old('sejarah', $profile->sejarah) }}</textarea>
            <p class="input-help">Sejarah singkat Kecamatan Cilebar (opsional).</p>
        </div>

        <div class="row">
            <label for="visi">Visi</label>
            <textarea id="visi" name="visi" rows="6">{{ old('visi', $profile->visi) }}</textarea>
            <p class="input-help">Visi kecamatan (opsional).</p>
        </div>

        <div class="row">
            <label for="misi">Misi</label>
            <textarea id="misi" name="misi" rows="6">{{ old('misi', $profile->misi) }}</textarea>
            <p class="input-help">Misi kecamatan (pisahkan poin dengan enter).</p>
        </div>

        <button class="btn" type="submit">Simpan</button>
    </form>
@endsection

