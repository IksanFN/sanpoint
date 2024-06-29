<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Jurusan;
use App\Models\Kela;
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
            'jurusan_id' => Jurusan::factory(),
            'kelas_id' => Kela::factory(),
            'tahun_ajaran_id' => TahunAjaran::factory(),
            'nisn' => $this->faker->word(),
            'nama' => $this->faker->word(),
            'email' => $this->faker->safeEmail(),
            'nomor_hp' => $this->faker->word(),
            'jenis_kelamin' => $this->faker->word(),
            'status' => $this->faker->word(),
            'alamat' => $this->faker->text(),
        ];
    }
}
