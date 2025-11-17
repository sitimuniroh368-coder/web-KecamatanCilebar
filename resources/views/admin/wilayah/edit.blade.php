@extends('admin.layouts.app')

@section('title', 'Informasi Wilayah - Panel Admin')
@section('page-title', 'Informasi Wilayah')
@section('page-subtitle', 'Perbarui profil wilayah dan peta Kecamatan Cilebar')

@section('content')
    <form method="post" action="{{ route('admin.wilayah.update') }}">
        @csrf

        <div class="row">
            <label for="content">Deskripsi Wilayah</label>
            <textarea id="content" name="content" rows="10" required>{{ old('content', $wilayah->content) }}</textarea>
        </div>

        <div class="row">
            <label for="map_iframe">Embed Peta (Iframe)</label>
            <textarea id="map_iframe" name="map_iframe" rows="4">{{ old('map_iframe', $wilayah->map_iframe) }}</textarea>
            <p class="input-help">Tempel kode iframe dari Google Maps atau biarkan kosong.</p>
        </div>

        <button class="btn" type="submit">Simpan</button>
    </form>
@endsection

