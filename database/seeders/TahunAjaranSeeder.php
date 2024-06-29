<?php

namespace Database\Seeders;

use App\Models\TahunAjaran;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TahunAjaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tahunAjarans = [
            [
                'kode' => '2021/2022'
            ],
            [
                'kode' => '2022/2023'
            ],
            [
                'kode' => '2023/2024'
            ]
        ];

        foreach ($tahunAjarans as $tahunAjaran) {
            TahunAjaran::create($tahunAjaran);
        }

    }
}
