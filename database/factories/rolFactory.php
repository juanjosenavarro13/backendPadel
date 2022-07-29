<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class rolFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->name(),
            'nivel' => $this->faker->numberBetween(1, 10),
        ];
    }
}
