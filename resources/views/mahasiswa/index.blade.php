<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Daftar Mahasiswa
            </h2>
            {{-- Tombol Tambah hanya tampil di UI jika admin, tapi TETAP diproteksi di route --}}
            @if(auth()->user()->role === 'admin')
                <a href="{{ route('mahasiswa.create') }}"
                   class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    + Tambah Mahasiswa
                </a>
            @endif
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Flash message --}}
            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <table class="w-full table-auto border-collapse">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border px-4 py-2 text-left">NIM</th>
                                <th class="border px-4 py-2 text-left">Nama</th>
                                <th class="border px-4 py-2 text-left">Program Studi</th>
                                <th class="border px-4 py-2 text-left">Email</th>
                                <th class="border px-4 py-2 text-left">Angkatan</th>
                                @if(auth()->user()->role === 'admin')
                                    <th class="border px-4 py-2 text-center">Aksi</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($mahasiswas as $m)
                                <tr class="hover:bg-gray-50">
                                    <td class="border px-4 py-2">{{ $m->nim }}</td>
                                    <td class="border px-4 py-2">{{ $m->nama }}</td>
                                    <td class="border px-4 py-2">{{ $m->program_studi }}</td>
                                    <td class="border px-4 py-2">{{ $m->email }}</td>
                                    <td class="border px-4 py-2">{{ $m->angkatan }}</td>
                                    @if(auth()->user()->role === 'admin')
                                        <td class="border px-4 py-2 text-center">
                                            <a href="{{ route('mahasiswa.edit', $m) }}"
                                               class="text-yellow-600 hover:underline mr-2">Edit</a>
                                            <form action="{{ route('mahasiswa.destroy', $m) }}"
                                                  method="POST" class="inline"
                                                  onsubmit="return confirm('Yakin hapus data ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:underline">
                                                    Hapus
                                                </button>
                                            </form>
                                        </td>
                                    @endif
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="border px-4 py-4 text-center text-gray-500">
                                        Belum ada data mahasiswa.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>