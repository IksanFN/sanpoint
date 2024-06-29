<?php

namespace Database\Seeders;

use App\Models\Jurusan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jurusans = [
            [
                'nama' => 'Rekayasa Perangkat Lunak',
                'kode' => 'RPL'
            ],
            [
                'nama' => 'Akutansi',
                'kode' => 'AK'
            ],
            [
                'nama' => 'Teknik Kendaraan Ringan Otomotif',
                'kode' => 'TKRO'
            ]
        ];

        foreach ($jurusans as $jurusan) {
            Jurusan::create($jurusan);
        }

    }
}
