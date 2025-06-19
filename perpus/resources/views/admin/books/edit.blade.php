<h2>Edit Buku</h2>
<form method="POST" action="/admin/books/{{ $book->id }}">
    @csrf
    @method('PUT')
    <input name="title" value="{{ $book->title }}" required><br>
    <input name="author" value="{{ $book->author }}" required><br>
    <input name="stock" type="number" value="{{ $book->stock }}" required><br>
    <button type="submit">Update</button>
</form>
<a href="/admin/books">Kembali</a>
