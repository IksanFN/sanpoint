<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\KategoriPelanggaran;
use App\Models\Pelanggaran;
use App\Models\Siswa;

class PelanggaranFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pelanggaran::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'siswa_id' => Siswa::factory(),
            'kategori_pelanggaran_id' => KategoriPelanggaran::factory(),
            'deskripsi' => $this->faker->text(),
        ];
    }
}
