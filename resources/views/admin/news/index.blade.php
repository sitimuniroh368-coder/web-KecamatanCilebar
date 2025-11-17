@extends('admin.layouts.app')

@section('title', 'Kelola Berita - Panel Admin')
@section('page-title', 'Kelola Berita')
@section('page-subtitle', 'Publikasikan kabar terbaru untuk masyarakat')

@section('content')
    <p><a class="btn" href="{{ route('admin.news.create') }}">+ Tambah Berita</a></p>

    <table class="table">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Ringkasan</th>
                <th>Dibuat</th>
                <th style="width: 160px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($news as $item)
                <tr>
                    <td>{{ $item->title }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($item->summary, 80) }}</td>
                    <td>{{ $item->created_at?->format('d M Y H:i') ?? '-' }}</td>
                    <td>
                        <div class="action-box">
                            <a class="btn-edit" href="{{ route('admin.news.edit', $item) }}">Edit</a>
                            <form method="post" action="{{ route('admin.news.destroy', $item) }}" class="inline-form" data-confirm="Hapus berita ini secara permanen?">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="muted">Belum ada data.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $news->links() }}
@endsection

