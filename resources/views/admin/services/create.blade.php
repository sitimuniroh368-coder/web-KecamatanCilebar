@extends('admin.layouts.app')

@section('title', 'Tambah Layanan - Panel Admin')
@section('page-title', 'Tambah Layanan')
@section('page-subtitle', 'Lengkapi detail layanan publik untuk warga')

@section('content')
    <form method="post" action="{{ route('admin.services.store') }}">
        @csrf

        <div class="row">
            <label for="name">Nama Layanan</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required>
        </div>

        <div class="row">
            <label for="description">Deskripsi</label>
            <textarea id="description" name="description" rows="6" required>{{ old('description') }}</textarea>
        </div>

        <div class="row">
            <label for="requirements">Persyaratan</label>
            <textarea id="requirements" name="requirements" rows="5">{{ old('requirements') }}</textarea>
            <p class="input-help">Isi dengan daftar persyaratan atau biarkan kosong jika tidak ada.</p>
        </div>

        <div class="row">
            <label for="notes">Catatan</label>
            <textarea id="notes" name="notes" rows="4">{{ old('notes') }}</textarea>
        </div>

        <button class="btn" type="submit">Simpan</button>
        <a class="btn btn-secondary" href="{{ route('admin.services.index') }}">Batal</a>
    </form>
@endsection

