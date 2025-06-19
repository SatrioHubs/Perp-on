@extends('layouts.app')

@section('content')
<h1 class="mb-4">Daftar Peminjaman (Admin)</h1>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Pengguna</th>
            <th>Buku</th>
            <th>Tanggal Pinjam</th>
            <th>Batas Kembali</th>
            <th>Tanggal Kembali</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($borrowings as $borrowing)
            <tr>
                <td>{{ $borrowing->id }}</td>
                <td>{{ $borrowing->user->name }}</td>
                <td>{{ $borrowing->book->title }}</td>
                <td>{{ $borrowing->borrowed_date->format('d M Y') }}</td>
                <td>{{ $borrowing->due_date->format('d M Y') }}</td>
                <td>{{ $borrowing->returned_date ? $borrowing->returned_date->format('d M Y') : '-' }}</td>
                <td>
                    @if($borrowing->status == 'borrowed')
                        <span class="badge bg-warning">Dipinjam</span>
                    @elseif($borrowing->status == 'returned')
                        <span class="badge bg-success">Dikembalikan</span>
                    @else
                        <span class="badge bg-secondary">{{ $borrowing->status }}</span>
                    @endif
                </td>
                <td>
                    @if($borrowing->status == 'borrowed')
                        <form action="{{ route('admin.borrowings.return', $borrowing->id) }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('Tandai buku ini sudah dikembalikan?')">Tandai Dikembalikan</button>
                        </form>
                    @else
                        -
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="8" class="text-center">Tidak ada peminjaman.</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection