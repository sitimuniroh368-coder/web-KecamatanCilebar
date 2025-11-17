@extends('admin.layouts.app')

@section('title', 'Edit Desa - Panel Admin')
@section('page-title', 'Edit Desa')
@section('page-subtitle', 'Perbarui data desa')

@section('content')
    <form method="post" action="{{ route('admin.desa.update', $desa) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <label for="name">Nama Desa <span style="color: red;">*</span></label>
            <input type="text" id="name" name="name" value="{{ old('name', $desa->name) }}" required>
        </div>

        <div class="row">
            <label for="slug">Slug (URL)</label>
            <input type="text" id="slug" name="slug" value="{{ old('slug', $desa->slug) }}" placeholder="Auto-generated jika kosong">
            <p class="input-help">Biarkan kosong untuk auto-generate dari nama desa.</p>
        </div>

        <div class="row">
            <label for="image">Gambar</label>
            <input type="file" id="image" name="image" accept="image/*">
            <p class="input-help">Kosongkan jika tidak ingin mengubah gambar.</p>
            @if ($desa->image)
                <div class="preview-image">
                    <img src="{{ asset('uploads/' . basename($desa->image)) }}" alt="{{ $desa->name }}" style="max-height: 160px;">
                </div>
            @endif
        </div>

        <div class="row">
            <label for="description">Deskripsi <span style="color: red;">*</span></label>
            <textarea id="description" name="description" rows="6" required>{{ old('description', $desa->description) }}</textarea>
        </div>

        <div class="row">
            <label for="population">Jumlah Penduduk</label>
            <input type="number" id="population" name="population" value="{{ old('population', $desa->population) }}" min="0">
        </div>

        <div class="row">
            <label for="area">Luas Area (km²)</label>
            <input type="number" id="area" name="area" value="{{ old('area', $desa->area) }}" min="0" step="0.01">
        </div>

        <div class="row">
            <label for="contact_person">Nama Kontak</label>
            <input type="text" id="contact_person" name="contact_person" value="{{ old('contact_person', $desa->contact_person) }}">
        </div>

        <div class="row">
            <label for="contact_phone">Nomor Telepon Kontak</label>
            <input type="tel" id="contact_phone" name="contact_phone" value="{{ old('contact_phone', $desa->contact_phone) }}">
        </div>

        <div class="row">
            <label for="contact_email">Email Kontak</label>
            <input type="email" id="contact_email" name="contact_email" value="{{ old('contact_email', $desa->contact_email) }}">
        </div>

        <div class="row">
            <label for="latitude">Latitude (GPS)</label>
            <input type="number" id="latitude" name="latitude" value="{{ old('latitude', $desa->latitude) }}" step="0.0001">
        </div>

        <div class="row">
            <label for="longitude">Longitude (GPS)</label>
            <input type="number" id="longitude" name="longitude" value="{{ old('longitude', $desa->longitude) }}" step="0.0001">
        </div>

        <div class="row">
            <label for="statistics">Statistik (JSON)</label>
            <textarea id="statistics" name="statistics" rows="6" placeholder='{"pendidikan": {...}, "pekerjaan": {...}, ...}'>{{ old('statistics', $desa->statistics ? json_encode($desa->statistics) : '') }}</textarea>
            <p class="input-help">Opsional. Format JSON untuk data statistik lengkap.</p>
        </div>

        <button class="btn" type="submit">Simpan Perubahan</button>
        <a class="btn btn-secondary" href="{{ route('admin.desa.index') }}">Batal</a>
    </form>
@endsection
