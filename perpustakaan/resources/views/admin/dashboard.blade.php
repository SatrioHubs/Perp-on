<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Admin Dashboard</h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto">
        <a href="{{ route('books.index') }}" class="text-blue-600 underline">Kelola Buku</a>
    </div>
</x-app-layout>
