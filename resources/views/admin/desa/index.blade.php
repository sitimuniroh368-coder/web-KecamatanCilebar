@extends('admin.layouts.app')

@section('title', 'Kelola Informasi Desa - Panel Admin')
@section('page-title', 'Kelola Informasi Desa')
@section('page-subtitle', 'Kelola data desa dan informasi terkait')

@section('content')
    <p><a class="btn" href="{{ route('admin.desa.create') }}">+ Tambah Desa</a></p>

    <table class="table">
        <thead>
            <tr>
                <th>Nama Desa</th>
                <th>Populasi</th>
                <th>Luas Area</th>
                <th>Kontak</th>
                <th style="width: 160px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($desas as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->population ? number_format($item->population, 0, ',', '.') : '-' }}</td>
                    <td>{{ $item->area ? number_format($item->area, 2, ',', '.') . ' km²' : '-' }}</td>
                    <td>{{ $item->contact_phone ?? '-' }}</td>
                    <td>
                        <div class="action-box">
                            <a class="btn-edit" href="{{ route('admin.desa.edit', $item) }}">Edit</a>
                            <form method="post" action="{{ route('admin.desa.destroy', $item) }}" class="inline-form" data-confirm="Hapus desa ini secara permanen?">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="muted">Belum ada data.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $desas->links() }}
@endsection
