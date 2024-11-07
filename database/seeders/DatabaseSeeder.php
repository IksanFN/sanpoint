<?php

namespace Database\Seeders;

use App\Models\Siswa;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        $this->call([
            UserSeeder::class,
            TahunAjaranSeeder::class,
            JurusanSeeder::class,
            KategoriPelanggaranSeeder::class,
            KelasSeeder::class
        ]);
        Siswa::factory(1000)->create();
    }
}
