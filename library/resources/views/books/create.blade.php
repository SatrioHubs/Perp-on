@extends('layouts.app')

@section('content')
<h1 class="mb-4">Tambah Buku Baru</h1>

<form action="{{ route('admin.books.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="title" class="form-label">Judul</label>
        <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
    </div>
    <div class="mb-3">
        <label for="author" class="form-label">Penulis</label>
        <input type="text" class="form-control" id="author" name="author" value="{{ old('author') }}" required>
    </div>
    <div class="mb-3">
        <label for="isbn" class="form-label">no_seri</label>
        <input type="text" class="form-control" id="isbn" name="isbn" value="{{ old('isbn') }}" required>
    </div>
    <div class="mb-3">
        <label for="genre" class="form-label">Genre</label>
        <input type="text" class="form-control" id="genre" name="genre" value="{{ old('genre') }}">
    </div>
    <div class="mb-3">
        <label for="stock" class="form-label">Stok</label>
        <input type="number" class="form-control" id="stock" name="stock" value="{{ old('stock', 0) }}" required min="0">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Deskripsi</label>
        <textarea class="form-control" id="description" name="description" rows="3">{{ old('description') }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Simpan Buku</button>
    <a href="{{ route('admin.books.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection