<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Mahasiswa
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('mahasiswa.update', $mahasiswa) }}" method="POST">
                    @csrf
                    @method('PUT')
                    @include('mahasiswa._form')
                    <div class="mt-4 flex gap-2">
                        <button type="submit"
                                class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">
                            Perbarui
                        </button>
                        <a href="{{ route('mahasiswa.index') }}"
                           class="bg-gray-200 text-gray-800 px-4 py-2 rounded hover:bg-gray-300">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>