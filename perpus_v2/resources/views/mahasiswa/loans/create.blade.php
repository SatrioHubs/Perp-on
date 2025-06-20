@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Pinjam Buku</h2>
    <form action="{{ route('mahasiswa.loans.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Buku</label>
            <select name="book_id" class="form-control" required>
                <option value="">-- Pilih Buku --</option>
                @foreach($books as $book)
                    <option value="{{ $book->id }}">{{ $book->title }} (Stok: {{ $book->stock }})</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Lama Pinjam (hari)</label>
            <input type="number" name="duration" class="form-control" min="1" required>
        </div>
        <button type="submit" class="btn btn-primary">Pinjam</button>
        <a href="{{ route('mahasiswa.dashboard') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
