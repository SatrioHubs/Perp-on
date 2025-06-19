<h2>Riwayat Peminjaman</h2>
@foreach($riwayat as $item)
  <div>{{ $item->book->judul }} - Status: {{ $item->status }}</div>
  @if($item->status === 'dipinjam')
    <form method="POST" action="/mahasiswa/kembalikan/{{ $item->id }}">
      @csrf
      <button>Kembalikan</button>
    </form>
  @endif
@endforeach
