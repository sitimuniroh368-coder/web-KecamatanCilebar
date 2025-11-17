@extends('admin.layouts.app')

@section('title', 'Tambah Foto Galeri - Panel Admin')
@section('page-title', 'Tambah Foto Galeri')
@section('page-subtitle', 'Unggah dokumentasi kegiatan terbaru')

@section('content')
    <form method="post" action="{{ route('admin.gallery.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <label for="title">Judul Foto</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" required>
        </div>

        <div class="row">
            <label for="image">File Foto</label>
            <input type="file" id="image" name="image" accept="image/*" required>
            <p class="input-help">Format: jpg, jpeg, png, webp, gif. Maksimal 5 MB.</p>
        </div>

        <button class="btn" type="submit">Simpan</button>
        <a class="btn btn-secondary" href="{{ route('admin.gallery.index') }}">Batal</a>
    </form>
@endsection

