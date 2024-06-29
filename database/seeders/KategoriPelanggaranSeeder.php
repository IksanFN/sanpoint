<?php

namespace Database\Seeders;

use App\Models\KategoriPelanggaran;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriPelanggaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kategoriPelanggarans = [
            [
                'nama' => 'Merokok',
                'point' => 15,
            ],
            [
                'nama' => 'Bolos',
                'point' => 10,
            ],
            [
                'nama' => 'Perkelahian',
                'point' => 20
            ]
        ];

        foreach ($kategoriPelanggarans as $kategoriPelanggaran) {
            KategoriPelanggaran::create($kategoriPelanggaran);
        }

    }
}
