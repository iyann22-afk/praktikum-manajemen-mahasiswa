<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-2">Selamat datang, {{ Auth::user()->name }}!</h3>
                    <p class="mb-4">Role Anda: <span class="inline-block bg-{{ Auth::user()->role === 'admin' ? 'blue' : 'green' }}-100 text-{{ Auth::user()->role === 'admin' ? 'blue' : 'green' }}-800 text-sm font-medium px-3 py-1 rounded-full">{{ ucfirst(Auth::user()->role) }}</span></p>

                    @if(Auth::user()->role === 'admin')
                        <p class="text-gray-600">Anda memiliki akses penuh: melihat, menambah, mengubah, dan menghapus data mahasiswa.</p>
                    @else
                        <p class="text-gray-600">Anda hanya dapat melihat data mahasiswa.</p>
                    @endif

                    <div class="mt-6">
                        <a href="{{ route('mahasiswa.index') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                            Lihat Data Mahasiswa
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
