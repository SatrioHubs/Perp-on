@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header">Dashboard Mahasiswa</div>
                <div class="card-body">
                    Selamat datang, {{ Auth::user()->name }}!<br>
                    Anda login sebagai <b>Mahasiswa</b>.
                </div>
            </div>
            <div class="card">
                <div class="card-header">Daftar Peminjaman Buku</div>
                <div class="card-body">
                    <a href="{{ route('mahasiswa.loans.create') }}" class="btn btn-primary mb-3">Pinjam Buku</a>
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
                            @foreach(\App\Models\Loan::with('book')->where('user_id', Auth::id())->get() as $loan)
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
