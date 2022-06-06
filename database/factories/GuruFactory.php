<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class GuruFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama_guru' => $this->faker->name(),
            'nama_guru' => $this->faker->name(),
            'nik_guru' => $this->faker->numberBetween(11),
            'mata_pelajaran' => $this->faker->word(),
            'username' => $this->faker->userName(),
            'password' => $this->faker->password(),
            'user_id' => mt_rand(1,2),
        ];
    }
}
