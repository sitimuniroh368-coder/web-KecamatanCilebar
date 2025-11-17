@extends('admin.layouts.app')

@section('title', 'Sambutan Camat - Panel Admin')
@section('page-title', 'Sambutan Camat')
@section('page-subtitle', 'Atur pesan sambutan dan informasi pimpinan')

@section('content')
    <form method="post" action="{{ route('admin.welcome.update') }}" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <label for="camat_name">Nama Camat</label>
            <input type="text" id="camat_name" name="camat_name" value="{{ old('camat_name', $welcome->camat_name) }}" required>
        </div>

        <div class="row">
            <label for="message">Pesan Sambutan</label>
            <textarea id="message" name="message" rows="8" required>{{ old('message', $welcome->message) }}</textarea>
        </div>

        <div class="row">
            <label for="sekretaris_name">Nama Sekretaris</label>
            <input type="text" id="sekretaris_name" name="sekretaris_name" value="{{ old('sekretaris_name', $welcome->sekretaris_name) }}">
        </div>

        <div class="row">
            <label for="camat_photo">Foto Camat</label>
            <input type="file" id="camat_photo" name="camat_photo" accept="image/*">
            <p class="input-help">Kosongkan bila tidak mengubah foto.</p>
            @if ($welcome->camat_photo)
                <div class="preview-image">
                    <img src="{{ asset('uploads/' . basename($welcome->camat_photo)) }}" alt="{{ $welcome->camat_name }}" style="max-height: 160px;">
                </div>
            @endif
        </div>

        <div class="row">
            <label for="sekretaris_photo">Foto Sekretaris</label>
            <input type="file" id="sekretaris_photo" name="sekretaris_photo" accept="image/*">
            @if ($welcome->sekretaris_photo)
                <div class="preview-image">
                    <img src="{{ asset('uploads/' . basename($welcome->sekretaris_photo)) }}" alt="{{ $welcome->sekretaris_name }}" style="max-height: 160px;">
                </div>
            @endif
        </div>

        <button class="btn" type="submit">Simpan</button>
    </form>
@endsection

