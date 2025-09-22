<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Armada>
 */
class ArmadaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'no_armada'    => 'ARM-' . strtoupper($this->faker->bothify('??###')),
            'jenis'        => $this->faker->randomElement(['Truk Box', 'Pickup', 'Container', 'Wingbox']),
            'kapasitas_kg' => $this->faker->numberBetween(1000, 20000),
            'tersedia'     => $this->faker->boolean(80),
        ];
    }
}
