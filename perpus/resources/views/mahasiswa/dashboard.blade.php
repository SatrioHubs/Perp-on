<h2>Halo, {{ session('user')->name }}</h2>
<p>Daftar Buku:</p>

@if(session('success'))
    <p style="color:green;">{{ session('success') }}</p>
@endif

@if(session('error'))
    <p style="color:red;">{{ session('error') }}</p>
@endif

@foreach ($books as $book)
    <div style="border:1px solid #ccc; margin-bottom:10px; padding:10px;">
        <strong>{{ $book->title }}</strong> <br>
        Penulis: {{ $book->author }} <br>
        Stok: {{ $book->stock }} <br>

        @if ($book->stock > 0)
            <form method="POST" action="/mahasiswa/pinjam/{{ $book->id }}">
                @csrf
                <input type="number" name="duration_days" placeholder="Lama pinjam (hari)" min="1" required>
                <button type="submit">Pinjam Buku</button>
            </form>
        @else
            <p style="color:red;">Stok habis</p>
        @endif
    </div>
@endforeach

<a href="/logout">Logout</a>
