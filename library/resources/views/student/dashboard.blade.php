@extends('layouts.app')

@section('content')
<h1 class="mb-4">Dashboard Mahasiswa</h1>
<p>Selamat datang, {{ Auth::user()->name }}! Anda adalah mahasiswa perpustakaan.</p>

<div class="row">
    <div class="col-md-6 mb-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Daftar Buku Tersedia</h5>
                <p class="card-text">Jelajahi buku yang dapat Anda pinjam.</p>
                <a href="{{ route('student.books.index') }}" class="btn btn-primary">Lihat Buku</a>
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Peminjaman Saya</h5>
                <p class="card-text">Lihat buku-buku yang sedang Anda pinjam dan riwayat peminjaman.</p>
                <a href="{{ route('student.borrowings.index') }}" class="btn btn-primary">Lihat Peminjaman</a>
            </div>
        </div>
    </div>
</div>
@endsection