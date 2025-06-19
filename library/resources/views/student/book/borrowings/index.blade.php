@extends('layouts.app')

@section('content')
<h1 class="mb-4">Peminjaman Saya (Mahasiswa)</h1>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>ID Peminjaman</th>
            <th>Judul Buku</th>
            <th>Tanggal Pinjam</th>
            <th>Batas Kembali</th>
            <th>Tanggal Kembali</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @forelse($borrowings as $borrowing)
            <tr>
                <td>{{ $borrowing->id }}</td>
                <td>{{ $borrowing->book->title }}</td>
                <td>{{ $borrowing->borrowed_date->format('d M Y') }}</td>
                <td>{{ $borrowing->due_date->format('d M Y') }}</td>
                <td>{{ $borrowing->returned_date ? $borrowing->returned_date->format('d M Y') : '-' }}</td>
                <td>
                    @if($borrowing->status == 'borrowed')
                        <span class="badge bg-warning">Dipinjam</span>
                    @elseif($borrowing->status == 'returned')
                        <span class="badge bg-success">Dikembalikan</span>
                    @elseif($borrowing->status == 'overdue')
                        <span class="badge bg-danger">Terlambat</span>
                    @else
                        <span class="badge bg-secondary">{{ $borrowing->status }}</span>
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center">Anda belum memiliki riwayat peminjaman buku.</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection