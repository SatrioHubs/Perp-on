<h2>Daftar Buku</h2>
<a href="/admin/books/create">+ Tambah Buku</a>

@if(session('success'))
    <p style="color:green;">{{ session('success') }}</p>
@endif

<table border="1">
    <tr>
        <th>Judul</th>
        <th>Penulis</th>
        <th>Stok</th>
        <th>Aksi</th>
    </tr>
    @foreach ($books as $book)
    <tr>
        <td>{{ $book->title }}</td>
        <td>{{ $book->author }}</td>
        <td>{{ $book->stock }}</td>
        <td>
            <a href="/admin/books/{{ $book->id }}/edit">Edit</a> |
            <form method="POST" action="/admin/books/{{ $book->id }}" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Hapus buku ini?')">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
