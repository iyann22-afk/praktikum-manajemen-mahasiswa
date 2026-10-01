{{-- NIM --}}
<div class="mb-4">
    <label class="block text-sm font-medium text-gray-700">NIM</label>
    <input type="text" name="nim" value="{{ old('nim', $mahasiswa->nim ?? '') }}"
           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm @error('nim') border-red-500 @enderror">
    @error('nim') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
</div>

{{-- Nama --}}
<div class="mb-4">
    <label class="block text-sm font-medium text-gray-700">Nama</label>
    <input type="text" name="nama" value="{{ old('nama', $mahasiswa->nama ?? '') }}"
           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm @error('nama') border-red-500 @enderror">
    @error('nama') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
</div>

{{-- Program Studi --}}
<div class="mb-4">
    <label class="block text-sm font-medium text-gray-700">Program Studi</label>
    <input type="text" name="program_studi" value="{{ old('program_studi', $mahasiswa->program_studi ?? '') }}"
           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
    @error('program_studi') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
</div>

{{-- Email --}}
<div class="mb-4">
    <label class="block text-sm font-medium text-gray-700">Email</label>
    <input type="email" name="email" value="{{ old('email', $mahasiswa->email ?? '') }}"
           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
    @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
</div>

{{-- Angkatan --}}
<div class="mb-4">
    <label class="block text-sm font-medium text-gray-700">Angkatan</label>
    <input type="number" name="angkatan" value="{{ old('angkatan', $mahasiswa->angkatan ?? '') }}"
           min="2000" max="2099"
           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
    @error('angkatan') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
</div>