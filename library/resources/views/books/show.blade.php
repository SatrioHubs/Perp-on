@extends('layouts.app')

@section('content')
<h1 class="mb-4">Detail Buku: {{ $book->title }}</h1>

<div class="card">
    <div class="card-body">
        <h5 class="card-title">{{ $book->title }}</h5>
        <p class="card-text"><strong>Penulis:</strong> {{ $book->author }}</p>
        <p class="card-text"><strong>ISBN:</strong> {{ $book->isbn }}</p>
        <p class="card-text"><strong>Genre:</strong> {{ $book->genre ?? '-' }}</p>
        <p class="card-text"><strong>Stok:</strong> {{ $book->stock }}</p>
        <p class="card-text"><strong>Deskripsi:</strong> {{ $book->description ?? '-' }}</p>
        <a href="{{ route('admin.books.edit', $book->id) }}" class="btn btn-warning">Edit</a>
        <a href="{{ route('admin.books.index') }}" class="btn btn-secondary">Kembali ke Daftar Buku</a>
    </div>
</div>
@endsection