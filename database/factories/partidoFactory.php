<?php

namespace Database\Factories;

use App\Models\Pista;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

class partidoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'fecha' => $this->faker->dateTimeBetween('-1 weeks', '+1 weeks'),
            'pista_id' => Pista::all()->random()->id,
            'id_jugador1' => Usuario::all()->random()->id,
            'id_jugador2' => Usuario::all()->random()->id,
            'id_jugador3' => Usuario::all()->random()->id,
            'id_jugador4' => Usuario::all()->random()->id,
            'resultado' => $this->faker->randomDigit() . ':' . $this->faker->randomDigit(),
        ];
    }
}
