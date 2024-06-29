<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Jurusan;
use App\Models\Kelas;

class KelasFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Kelas::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'jurusan_id' => Jurusan::factory(),
            'nama' => $this->faker->word(),
        ];
    }
}
