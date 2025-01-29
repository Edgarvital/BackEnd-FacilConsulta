<?php

namespace Database\Factories;

use App\Models\Medico;
use App\Models\Paciente;
use Illuminate\Database\Eloquent\Factories\Factory;

class ConsultaFactory extends Factory
{
    public function definition(): array
    {
        return [
            'data' => $this->faker->dateTimeThisYear(),
            'medico_id' => Medico::factory(),
            'paciente_id' => Paciente::factory(),
        ];
    }
}
