@extends('layouts.app')

@section('content')
<h1 class="mb-4">Daftar Buku (Admin)</h1>
<a href="{{ route('admin.books.create') }}" class="btn btn-success mb-3">Tambah Buku Baru</a>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Penulis</th>
            <th>ISBN</th>
            <th>Genre</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($books as $book)
            <tr>
                <td>{{ $book->id }}</td>
                <td>{{ $book->title }}</td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->isbn }}</td>
                <td>{{ $book->genre ?? '-' }}</td>
                <td>{{ $book->stock }}</td>
                <td>
                    <a href="{{ route('admin.books.show', $book->id) }}" class="btn btn-info btn-sm">Lihat</a>
                    <a href="{{ route('admin.books.edit', $book->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.books.destroy', $book->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus buku ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7" class="text-center">Tidak ada buku.</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection