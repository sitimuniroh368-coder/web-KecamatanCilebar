@extends('admin.layouts.app')

@section('title', 'Edit Pengumuman - Panel Admin')
@section('page-title', 'Edit Pengumuman')
@section('page-subtitle', 'Perbarui informasi resmi untuk masyarakat')

@section('content')
    <form method="post" action="{{ route('admin.announcements.update', $announcement) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <label for="title">Judul</label>
            <input type="text" id="title" name="title" value="{{ old('title', $announcement->title) }}" required>
        </div>

        <div class="row">
            <label for="image">Gambar</label>
            <input type="file" id="image" name="image" accept="image/*">
            <p class="input-help">Kosongkan jika tidak ingin mengubah gambar.</p>
            @if ($announcement->image_path)
                <div class="preview-image">
                    <img src="{{ asset('uploads/' . basename($announcement->image_path)) }}" alt="{{ $announcement->title }}" style="max-height: 160px;">
                </div>
            @endif
        </div>

        <div class="row">
            <label for="content">Konten</label>
            <textarea id="content" name="content" rows="10" required>{{ old('content', $announcement->content) }}</textarea>
        </div>

        <button class="btn" type="submit">Simpan Perubahan</button>
        <a class="btn btn-secondary" href="{{ route('admin.announcements.index') }}">Batal</a>
    </form>
@endsection

