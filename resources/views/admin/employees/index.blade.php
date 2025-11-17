@extends('admin.layouts.app')

@section('title', 'Kelola Data Pegawai - Panel Admin')
@section('page-title', 'Kelola Data Pegawai')
@section('page-subtitle', 'Perbarui struktur organisasi dan pegawai kecamatan')

@section('content')
    <div class="admin-actions" style="margin-bottom: 30px;">
        <a class="btn" href="{{ route('admin.employees.create') }}">+ Tambah Pegawai</a>
    </div>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>Bidang</th>
                    <th>Urutan</th>
                    <th style="width: 180px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($employees as $employee)
                    <tr>
                        <td>{{ $employee->name }}</td>
                        <td>{{ $employee->position }}</td>
                        <td>{{ $employee->division ?? '-' }}</td>
                        <td>{{ $employee->display_order ?? '-' }}</td>
                        <td>
                            <div class="action-box">
                                <a class="btn-edit" href="{{ route('admin.employees.edit', $employee) }}">Edit</a>
                                <form method="post" action="{{ route('admin.employees.destroy', $employee) }}" class="inline-form" data-confirm="Hapus data pegawai ini?">
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
    </div>

    {{ $employees->links() }}
@endsection

