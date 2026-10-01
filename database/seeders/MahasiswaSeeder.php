<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['nim'=>'2021001','nama'=>'Budi Santoso','program_studi'=>'Teknik Informatika','email'=>'budi@mahasiswa.com','angkatan'=>2021],
            ['nim'=>'2021002','nama'=>'Sari Dewi','program_studi'=>'Sistem Informasi','email'=>'sari@mahasiswa.com','angkatan'=>2021],
            ['nim'=>'2022001','nama'=>'Andi Pratama','program_studi'=>'Teknik Informatika','email'=>'andi@mahasiswa.com','angkatan'=>2022],
        ];

        foreach ($data as $item) {
            Mahasiswa::create($item);
        }
    }
}