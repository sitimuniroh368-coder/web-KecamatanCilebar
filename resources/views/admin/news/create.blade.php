@extends('admin.layouts.app')

@section('title', 'Tambah Berita - Panel Admin')
@section('page-title', 'Tambah Berita')
@section('page-subtitle', 'Buat artikel baru untuk diinformasikan kepada warga')

@section('content')
    <form method="post" action="{{ route('admin.news.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <label for="title">Judul</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" required>
        </div>

        <div class="row">
            <label for="image">Gambar</label>
            <input type="file" id="image" name="image" accept="image/*">
            <p class="input-help">Format: jpg, jpeg, png, webp, gif. Maksimal 5 MB.</p>
        </div>

        <div class="row">
            <label for="summary">Ringkasan</label>
            <input type="text" id="summary" name="summary" value="{{ old('summary') }}" maxlength="300" required>
        </div>

        <div class="row">
            <label for="content">Konten</label>
            <textarea id="content" name="content" rows="10" required>{{ old('content') }}</textarea>
        </div>

        <button class="btn" type="submit">Simpan</button>
        <a class="btn btn-secondary" href="{{ route('admin.news.index') }}">Batal</a>
    </form>
@endsection

