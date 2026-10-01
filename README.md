# Sistem Manajemen Data Mahasiswa Berbasis Role

Aplikasi web berbasis Laravel untuk mengelola data mahasiswa. Aplikasi ini dilengkapi dengan sistem autentikasi dan manajemen hak akses (role-based access control) untuk dua tipe pengguna: **Admin** dan **User**.

## 🌟 Fitur Aplikasi

1. **Autentikasi Pengguna (Laravel Breeze)**
   - Registrasi akun (dengan pilihan role Admin/User)
   - Login & Logout
   - Manajemen Profil (Edit nama, email, ubah password, hapus akun)
2. **Manajemen Role (Otorisasi Middleware)**
   - **Admin**: Memiliki akses penuh (Melihat, Menambah, Mengubah, dan Menghapus data mahasiswa).
   - **User**: Akses terbatas (Hanya dapat melihat data mahasiswa).
   - Route protection: Akses langsung ke URL admin oleh User akan diblokir (403 Forbidden).
3. **CRUD Data Mahasiswa**
   - Menampilkan daftar mahasiswa.
   - Tambah data (NIM, Nama, Program Studi, Email, Angkatan).
   - Edit data mahasiswa.
   - Hapus data mahasiswa.
   - Validasi ketat (NIM unik, Email unik, Angkatan valid 2000-2099).

## 💻 Kebutuhan Sistem

Pastikan sistem Anda telah terinstal:
- **PHP** >= 8.2 (Disarankan PHP 8.5)
- **Composer** (Dependency manager untuk PHP)
- **Node.js & NPM** (Untuk kompilasi asset frontend)
- **MySQL / MariaDB** (Database server)
- **Git** (Version control)

## 🚀 Cara Menjalankan Project (Instalasi)

Ikuti langkah-langkah berikut untuk menjalankan aplikasi di komputer lokal Anda:

### 1. Clone Repository
Buka terminal/command prompt dan jalankan perintah:
```bash
git clone <URL_GITHUB_REPO_ANDA>
cd praktikum-manajemen-mahasiswa
```
*(Catatan: Ganti `<URL_GITHUB_REPO_ANDA>` dengan URL repository Anda).*

### 2. Install Dependensi PHP (Composer)
Instal semua package Laravel yang dibutuhkan:
```bash
composer install
```

### 3. Install Dependensi Frontend (NPM)
Instal dan build package frontend (Tailwind CSS, Alpine.js):
```bash
npm install
npm run build
```

### 4. Konfigurasi Environment (`.env`)
Salin file `.env.example` menjadi `.env`:
```bash
cp .env.example .env
```
*(Pengguna Windows CMD dapat menggunakan: `copy .env.example .env`)*

Buka file `.env` di text editor, lalu sesuaikan konfigurasi database. Secara default menggunakan MySQL:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=praktikum_manajemen_mahasiswa
DB_USERNAME=root
DB_PASSWORD=
```
**Penting:** Pastikan Anda sudah membuat database kosong dengan nama `praktikum_manajemen_mahasiswa` di phpMyAdmin / MySQL klien Anda sebelum lanjut ke langkah berikutnya.

### 5. Generate Application Key
Buat APP_KEY unik untuk keamanan aplikasi:
```bash
php artisan key:generate
```

### 6. Migrasi dan Seeding Database
Jalankan migrasi untuk membuat tabel beserta data awal (seeder):
```bash
php artisan migrate --seed
```
*Proses ini akan membuat tabel users, mahasiswas, serta membuat akun dummy untuk pengujian.*

### 7. Jalankan Local Development Server
Jalankan server bawaan Laravel:
```bash
php artisan serve
```

Aplikasi sekarang dapat diakses melalui browser di alamat: **`http://localhost:8000`**

---

## 🔑 Akun Pengujian (Seeder)

Anda tidak perlu mendaftar dari awal. Gunakan akun berikut untuk menguji sistem role:

**1. Akun Admin (Akses Penuh)**
- **Email:** `admin@praktikum.com`
- **Password:** `password123`

**2. Akun User (Hanya Baca/View)**
- **Email:** `user@praktikum.com`
- **Password:** `password123`

## 🛠️ Teknologi yang Digunakan
- **Framework:** Laravel 13
- **Autentikasi:** Laravel Breeze (Blade)
- **Styling:** Tailwind CSS
- **Database:** MySQL
