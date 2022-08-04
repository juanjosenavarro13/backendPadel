<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class themeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => 'negro',
            'primary_color' => 'dark',
            'secondary_color' => 'dark',
            'tertiary_color' => 'light',
        ];
    }
}
