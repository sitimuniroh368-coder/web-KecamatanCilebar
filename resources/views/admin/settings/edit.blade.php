@extends('admin.layouts.app')

@section('title', 'Pengaturan Kontak - Panel Admin')
@section('page-title', 'Pengaturan Kontak')
@section('page-subtitle', 'Lengkapi informasi kontak resmi Kecamatan Cilebar')

@section('content')
    <form method="post" action="{{ route('admin.settings.update') }}">
        @csrf

        <div class="row">
            <label for="address">Alamat</label>
            <textarea id="address" name="address" rows="3">{{ old('address', $setting->address) }}</textarea>
        </div>

        <div class="row">
            <label for="phone">Telepon</label>
            <input type="text" id="phone" name="phone" value="{{ old('phone', $setting->phone) }}">
        </div>

        <div class="row">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email', $setting->email) }}">
        </div>

        <div class="row">
            <label for="whatsapp">WhatsApp</label>
            <input type="text" id="whatsapp" name="whatsapp" value="{{ old('whatsapp', $setting->whatsapp) }}">
        </div>

        <div class="row">
            <label for="instagram">Instagram</label>
            <input type="text" id="instagram" name="instagram" value="{{ old('instagram', $setting->instagram) }}">
        </div>

        <div class="row">
            <label for="facebook">Facebook</label>
            <input type="text" id="facebook" name="facebook" value="{{ old('facebook', $setting->facebook) }}">
        </div>

        <button class="btn" type="submit">Simpan Pengaturan</button>
    </form>
@endsection

