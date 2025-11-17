@extends('admin.layouts.app')

@section('title', 'Edit Layanan - Panel Admin')
@section('page-title', 'Edit Layanan')
@section('page-subtitle', 'Perbarui informasi layanan publik')

@section('content')
    <form method="post" action="{{ route('admin.services.update', $service) }}">
        @csrf
        @method('PUT')

        <div class="row">
            <label for="name">Nama Layanan</label>
            <input type="text" id="name" name="name" value="{{ old('name', $service->name) }}" required>
        </div>

        <div class="row">
            <label for="description">Deskripsi</label>
            <textarea id="description" name="description" rows="6" required>{{ old('description', $service->description) }}</textarea>
        </div>

        <div class="row">
            <label for="requirements">Persyaratan</label>
            <textarea id="requirements" name="requirements" rows="5">{{ old('requirements', $service->requirements) }}</textarea>
        </div>

        <div class="row">
            <label for="notes">Catatan</label>
            <textarea id="notes" name="notes" rows="4">{{ old('notes', $service->notes) }}</textarea>
        </div>

        <button class="btn" type="submit">Simpan Perubahan</button>
        <a class="btn btn-secondary" href="{{ route('admin.services.index') }}">Batal</a>
    </form>
@endsection

