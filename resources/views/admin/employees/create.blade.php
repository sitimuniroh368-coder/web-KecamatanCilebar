@extends('admin.layouts.app')

@section('title', 'Tambah Data Pegawai - Panel Admin')
@section('page-title', 'Tambah Data Pegawai')
@section('page-subtitle', 'Lengkapi informasi pegawai kecamatan')

@section('content')
    <form method="post" action="{{ route('admin.employees.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <label for="name">Nama Lengkap</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required>
        </div>

        <div class="row">
            <label for="position">Jabatan</label>
            <input type="text" id="position" name="position" value="{{ old('position') }}" required>
        </div>

        <div class="row">
            <label for="division">Bidang/Bagian</label>
            <input type="text" id="division" name="division" value="{{ old('division') }}">
        </div>

        <div class="row">
            <label for="display_order">Urutan Tampilan</label>
            <input type="number" id="display_order" name="display_order" value="{{ old('display_order', 0) }}" min="0">
        </div>

        <div class="row">
            <label for="phone">Telepon</label>
            <input type="text" id="phone" name="phone" value="{{ old('phone') }}">
        </div>

        <div class="row">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}">
        </div>

        <div class="row">
            <label for="photo">Foto</label>
            <input type="file" id="photo" name="photo" accept="image/*">
            <p class="input-help">Format: jpg, jpeg, png, webp, gif. Maksimal 5 MB.</p>
        </div>

        <button class="btn" type="submit">Simpan</button>
        <a class="btn btn-secondary" href="{{ route('admin.employees.index') }}">Batal</a>
    </form>
@endsection

