<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CidadeFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nome' => $this->faker->city(),
            'estado' => $this->faker->stateAbbr(),
        ];
    }
}
