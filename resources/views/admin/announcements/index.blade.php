@extends('admin.layouts.app')

@section('title', 'Kelola Pengumuman - Panel Admin')
@section('page-title', 'Kelola Pengumuman')
@section('page-subtitle', 'Sampaikan informasi resmi terkini')

@section('content')
    <p><a class="btn" href="{{ route('admin.announcements.create') }}">+ Tambah Pengumuman</a></p>

    <table class="table">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Dibuat</th>
                <th style="width: 160px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($announcements as $announcement)
                <tr>
                    <td>{{ $announcement->title }}</td>
                    <td>{{ $announcement->created_at?->format('d M Y H:i') ?? '-' }}</td>
                    <td>
                        <div class="action-box">
                            <a class="btn-edit" href="{{ route('admin.announcements.edit', $announcement) }}">Edit</a>
                            <form method="post" action="{{ route('admin.announcements.destroy', $announcement) }}" class="inline-form" data-confirm="Hapus pengumuman ini?">
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

    {{ $announcements->links() }}
@endsection

