<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Dashboard Mahasiswa</h2>
    </x-slot>

    <div class="py-4 max-w-7xl mx-auto">
        <h3 class="text-lg font-bold">Daftar Buku</h3>
        @foreach ($books as $book)
            <div class="border p-3 mb-2">
                <strong>{{ $book->judul }}</strong> oleh {{ $book->penulis }}<br>
                Stok: {{ $book->stok }}<br>
                @if($book->stok > 0)
                    <form action="{{ route('mahasiswa.pinjam', $book) }}" method="POST" class="mt-2">
                        @csrf
                        <input type="number" name="lama_pinjam" min="1" placeholder="Lama Pinjam (hari)" required />
                        <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded">Pinjam</button>
                    </form>
                @else
                    <p class="text-red-500 mt-2">Stok habis</p>
                @endif
            </div>
        @endforeach

        <h3 class="mt-6 text-lg font-bold">Riwayat Peminjaman</h3>
        <ul class="mt-2">
            @foreach ($borrowings as $borrow)
                <li>- {{ $borrow->book->judul }} ({{ $borrow->lama_pinjam }} hari)</li>
            @endforeach
        </ul>
    </div>
</x-app-layout>
