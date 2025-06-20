@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Peminjaman Buku</h2>
    <a href="{{ route('mahasiswa.loans.create') }}" class="btn btn-primary mb-3">Pinjam Buku</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Judul Buku</th>
                <th>Lama Pinjam (hari)</th>
                <th>Tanggal Pinjam</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($loans as $loan)
            <tr>
                <td>{{ $loan->book->title ?? '-' }}</td>
                <td>{{ $loan->duration }}</td>
                <td>{{ $loan->borrowed_at }}</td>
                <td>
                    <form action="{{ route('mahasiswa.loans.destroy', $loan->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Kembalikan buku ini?')">Kembalikan</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('mahasiswa.loans.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
