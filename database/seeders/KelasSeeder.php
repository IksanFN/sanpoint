<?php

namespace Database\Seeders;

use App\Models\Kelas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seederKelas = [
            [
                'nama' => 'XI RPL 1',
                'jurusan_id' => 1,
            ],
            [
                'nama' => 'X TKRO 1',
                'jurusan_id' => 3,
            ]
        ];

        foreach ($seederKelas as $kelas) {
            Kelas::create($kelas);
        }
    }
}
