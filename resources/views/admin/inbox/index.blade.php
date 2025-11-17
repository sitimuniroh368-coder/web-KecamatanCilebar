@extends('admin.layouts.app')

@section('title', 'Kotak Masuk - Panel Admin')
@section('page-title', 'Kotak Masuk')
@section('page-subtitle', 'Kelola pesan dan aspirasi dari masyarakat')

@section('content')
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Pesan</th>
                    <th>Diterima</th>
                    <th style="width: 120px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($messages as $message)
                    <tr>
                        <td>{{ $message->name }}</td>
                        <td><a href="mailto:{{ $message->email }}">{{ $message->email }}</a></td>
                        <td>{{ \Illuminate\Support\Str::limit($message->message, 120) }}</td>
                        <td>{{ $message->created_at?->format('d M Y H:i') ?? '-' }}</td>
                        <td>
                            <div class="action-box">
                                <form method="post" action="{{ route('admin.inbox.destroy', $message) }}" class="inline-form" data-confirm="Hapus pesan ini?">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-delete">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="muted">Belum ada pesan masuk.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{ $messages->links() }}
@endsection

