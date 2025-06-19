<h2>Tambah Buku</h2>
<form method="POST" action="/admin/books">
    @csrf
    <input name="title" placeholder="Judul" required><br>
    <input name="author" placeholder="Penulis" required><br>
    <input name="stock" placeholder="Stok" type="number" required><br>
    <button type="submit">Simpan</button>
</form>
<a href="/admin/books">Kembali</a>
