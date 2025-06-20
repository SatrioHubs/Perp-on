@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Buku</h2>
    <form action="{{ route('admin.books.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Penulis</label>
            <input type="text" name="author" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Stok</label>
            <input type="number" name="stock" class="form-control" min="0" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.books.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
