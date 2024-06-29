<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Prestasi;
use App\Models\Siswa;

class PrestasiFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Prestasi::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'siswa_id' => Siswa::factory(),
            'nama' => $this->faker->word(),
            'point' => $this->faker->numberBetween(-10000, 10000),
            'waktu' => $this->faker->date(),
        ];
    }
}
