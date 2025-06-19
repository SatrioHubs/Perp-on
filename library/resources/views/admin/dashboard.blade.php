@extends('layouts.app')

@section('content')
<h1 class="mb-4">Dashboard Admin</h1>
<p>Selamat datang, {{ Auth::user()->name }}! Anda adalah administrator perpustakaan.</p>

<div class="row">
    <div class="col-md-6 mb-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Manajemen Buku</h5>
                <p class="card-text">Kelola daftar buku yang tersedia di perpustakaan.</p>
                <a href="{{ route('admin.books.index') }}" class="btn btn-primary">Lihat Buku</a>
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Daftar Peminjaman</h5>
                <p class="card-text">Lihat dan kelola status peminjaman buku oleh mahasiswa.</p>
                <a href="{{ route('admin.borrowings.index') }}" class="btn btn-primary">Lihat Peminjaman</a>
            </div>
        </div>
    </div>
</div>
@endsection