@extends('layouts.app')

@section('content')
<h1 class="mb-4">Edit Buku: {{ $book->title }}</h1>

<form action="{{ route('admin.books.update', $book->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="title" class="form-label">Judul</label>
        <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $book->title) }}" required>
    </div>
    <div class="mb-3">
        <label for="author" class="form-label">Penulis</label>
        <input type="text" class="form-control" id="author" name="author" value="{{ old('author', $book->author) }}" required>
    </div>
    <div class="mb-3">
        <label for="isbn" class="form-label">no_seri</label>
        <input type="text" class="form-control" id="isbn" name="isbn" value="{{ old('isbn', $book->isbn) }}" required>
    </div>
    <div class="mb-3">
        <label for="genre" class="form-label">Genre</label>
        <input type="text" class="form-control" id="genre" name="genre" value="{{ old('genre', $book->genre) }}">
    </div>
    <div class="mb-3">
        <label for="stock" class="form-label">Stok</label>
        <input type="number" class="form-control" id="stock" name="stock" value="{{ old('stock', $book->stock) }}" required min="0">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Deskripsi</label>
        <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $book->description) }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Perbarui Buku</button>
    <a href="{{ route('admin.books.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection