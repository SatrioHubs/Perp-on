@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header">Dashboard Admin</div>
                <div class="card-body">
                    Selamat datang, {{ Auth::user()->name }}!<br>
                    Anda login sebagai <b>Admin</b>.
                </div>
            </div>
            <div class="card">
                <div class="card-header">Daftar Buku</div>
                <div class="card-body">
                    <a href="{{ route('admin.books.create') }}" class="btn btn-primary mb-3">Tambah Buku</a>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Judul</th>
                                <th>Penulis</th>
                                <th>Stok</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(\App\Models\Book::all() as $book)
                            <tr>
                                <td>{{ $book->title }}</td>
                                <td>{{ $book->author }}</td>
                                <td>{{ $book->stock }}</td>
                                <td>
                                    <a href="{{ route('admin.books.edit', $book->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('admin.books.destroy', $book->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
