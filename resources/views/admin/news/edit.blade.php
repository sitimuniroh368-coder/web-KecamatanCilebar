@extends('admin.layouts.app')

@section('title', 'Edit Berita - Panel Admin')
@section('page-title', 'Edit Berita')
@section('page-subtitle', 'Perbarui konten artikel untuk masyarakat')

@section('content')
    <form method="post" action="{{ route('admin.news.update', $news) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <label for="title">Judul</label>
            <input type="text" id="title" name="title" value="{{ old('title', $news->title) }}" required>
        </div>

        <div class="row">
            <label for="image">Gambar</label>
            <input type="file" id="image" name="image" accept="image/*">
            <p class="input-help">Kosongkan jika tidak ingin mengubah gambar.</p>
            @if ($news->image_path)
                <div class="preview-image">
                    <img src="{{ asset('uploads/' . basename($news->image_path)) }}" alt="{{ $news->title }}" style="max-height: 160px;">
                </div>
            @endif
        </div>

        <div class="row">
            <label for="summary">Ringkasan</label>
            <input type="text" id="summary" name="summary" value="{{ old('summary', $news->summary) }}" maxlength="300" required>
        </div>

        <div class="row">
            <label for="content">Konten</label>
            <textarea id="content" name="content" rows="10" required>{{ old('content', $news->content) }}</textarea>
        </div>

        <button class="btn" type="submit">Simpan Perubahan</button>
        <a class="btn btn-secondary" href="{{ route('admin.news.index') }}">Batal</a>
    </form>
@endsection

