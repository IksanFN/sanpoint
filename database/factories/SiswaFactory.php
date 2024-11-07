<?php

namespace Database\Factories;

use App\Enums\JenisKelamin;
use App\Enums\StatusSiswa;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Jurusan;
use App\Models\Kela;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\TahunAjaran;

class SiswaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Siswa::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'jurusan_id' => rand(1,2),
            'kelas_id' => rand(1, 2),
            'tahun_ajaran_id' => rand(1, 2),
            'nisn' => $this->faker->word(),
            'nama' => $this->faker->word(),
            'email' => $this->faker->unique()->safeEmail(),
            'nomor_hp' => $this->faker->word(),
            'jenis_kelamin' => JenisKelamin::LAKI_LAKI,
            'status' => StatusSiswa::AKTIF,
            'alamat' => $this->faker->text(),
        ];
    }
}
