@extends('admin.layouts.app')

@section('title', 'Kelola Layanan - Panel Admin')
@section('page-title', 'Kelola Layanan')
@section('page-subtitle', 'Perbarui daftar layanan publik yang tersedia')

@section('content')
    <p><a class="btn" href="{{ route('admin.services.create') }}">+ Tambah Layanan</a></p>

    <table class="table">
        <thead>
            <tr>
                <th>Nama Layanan</th>
                <th>Persyaratan</th>
                <th style="width: 160px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($services as $service)
                <tr>
                    <td>{{ $service->name }}</td>
                    <td>{{ $service->requirements ? \Illuminate\Support\Str::limit(strip_tags($service->requirements), 80) : '-' }}</td>
                    <td>
                        <div class="action-box">
                            <a class="btn-edit" href="{{ route('admin.services.edit', $service) }}">Edit</a>
                            <form method="post" action="{{ route('admin.services.destroy', $service) }}" class="inline-form" data-confirm="Hapus layanan ini?">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="muted">Belum ada data.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $services->links() }}
@endsection

