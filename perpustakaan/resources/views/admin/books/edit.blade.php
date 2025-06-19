<x-app-layout>
    <x-slot name="header">Edit Buku</x-slot>

    <form method="POST" action="{{ route('books.update', $book) }}" class="max-w-xl mx-auto py-4">
        @csrf @method('PUT')
        <input name="judul" value="{{ $book->judul }}" class="block w-full mb-2" required />
        <input name="penulis" value="{{ $book->penulis }}" class="block w-full mb-2" required />
        <input name="stok" type="number" value="{{ $book->stok }}" class="block w-full mb-2" required />
        <button class="bg-blue-500 text-white px-4 py-2">Update</button>
    </form>
</x-app-layout>
