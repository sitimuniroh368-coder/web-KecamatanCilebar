@extends('admin.layouts.app')

@section('title', 'Edit Data Pegawai - Panel Admin')
@section('page-title', 'Edit Data Pegawai')
@section('page-subtitle', 'Perbarui informasi pegawai kecamatan')

@section('content')
    <form method="post" action="{{ route('admin.employees.update', $employee) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <label for="name">Nama Lengkap</label>
            <input type="text" id="name" name="name" value="{{ old('name', $employee->name) }}" required>
        </div>

        <div class="row">
            <label for="position">Jabatan</label>
            <input type="text" id="position" name="position" value="{{ old('position', $employee->position) }}" required>
        </div>

        <div class="row">
            <label for="division">Bidang/Bagian</label>
            <input type="text" id="division" name="division" value="{{ old('division', $employee->division) }}">
        </div>

        <div class="row">
            <label for="display_order">Urutan Tampilan</label>
            <input type="number" id="display_order" name="display_order" value="{{ old('display_order', $employee->display_order) }}" min="0">
        </div>

        <div class="row">
            <label for="phone">Telepon</label>
            <input type="text" id="phone" name="phone" value="{{ old('phone', $employee->phone) }}">
        </div>

        <div class="row">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email', $employee->email) }}">
        </div>

        <div class="row">
            <label for="photo">Foto</label>
            <input type="file" id="photo" name="photo" accept="image/*">
            <p class="input-help">Kosongkan jika tidak ingin mengubah foto.</p>
            @if ($employee->photo_path)
                <div class="preview-image">
                    <img src="{{ asset('uploads/' . basename($employee->photo_path)) }}" alt="{{ $employee->name }}" style="max-height: 160px;">
                </div>
            @endif
        </div>

        <button class="btn" type="submit">Simpan Perubahan</button>
        <a class="btn btn-secondary" href="{{ route('admin.employees.index') }}">Batal</a>
    </form>
@endsection

