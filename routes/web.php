<?php

use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Halaman welcome (default Laravel)
Route::get('/', function () {
    return view('welcome');
});

// Route Profile (WAJIB ADA - dari Breeze)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Mahasiswa - semua user login boleh lihat
Route::middleware(['auth'])->group(function () {
    Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
});

// Mahasiswa - hanya admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/mahasiswa/create',            [MahasiswaController::class, 'create'])->name('mahasiswa.create');
    Route::post('/mahasiswa',                  [MahasiswaController::class, 'store'])->name('mahasiswa.store');
    Route::get('/mahasiswa/{mahasiswa}/edit',  [MahasiswaController::class, 'edit'])->name('mahasiswa.edit');
    Route::put('/mahasiswa/{mahasiswa}',       [MahasiswaController::class, 'update'])->name('mahasiswa.update');
    Route::delete('/mahasiswa/{mahasiswa}',    [MahasiswaController::class, 'destroy'])->name('mahasiswa.destroy');
});

// Auth routes dari Breeze (login, register, logout, dll)
require __DIR__.'/auth.php';