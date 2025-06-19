@extends('layouts.app')

@section('content')
<h1 class="mb-4">Daftar Buku Tersedia (Mahasiswa)</h1>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Penulis</th>
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
                <td>{{ $book->genre ?? '-' }}</td>
                <td>{{ $book->stock }}</td>
                <td>
                    @if($book->stock > 0)
                        <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#borrowModal{{ $book->id }}">
                            Pinjam
                        </button>

                        <div class="modal fade" id="borrowModal{{ $book->id }}" tabindex="-1" aria-labelledby="borrowModalLabel{{ $book->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{ route('student.books.borrow', $book->id) }}" method="POST">
                                        @csrf
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="borrowModalLabel{{ $book->id }}">Pinjam Buku: {{ $book->title }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Penulis: {{ $book->author }}</p>
                                            <p>Stok Tersedia: {{ $book->stock }}</p>
                                            <div class="mb-3">
                                                <label for="duration" class="form-label">Lama Peminjaman (hari):</label>
                                                <input type="number" class="form-control" id="duration" name="duration" min="1" max="30" value="7" required>
                                                <small class="form-text text-muted">Maksimal 30 hari.</small>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary">Konfirmasi Peminjaman</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @else
                        <span class="badge bg-danger">Stok Habis</span>
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center">Tidak ada buku yang tersedia untuk dipinjam saat ini.</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection