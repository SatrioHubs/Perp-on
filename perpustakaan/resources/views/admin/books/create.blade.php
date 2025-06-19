<x-app-layout>
    <x-slot name="header">Tambah Buku</x-slot>

    <form method="POST" action="{{ route('books.store') }}" class="max-w-xl mx-auto py-4">
        @csrf
        <input name="judul" placeholder="Judul" class="block w-full mb-2" required />
        <input name="penulis" placeholder="Penulis" class="block w-full mb-2" required />
        <input name="stok" type="number" placeholder="Stok" class="block w-full mb-2" required />
        <button class="bg-blue-500 text-white px-4 py-2">Simpan</button>
    </form>
</x-app-layout>
