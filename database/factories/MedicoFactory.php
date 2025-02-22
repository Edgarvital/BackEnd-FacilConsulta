<?php

namespace Database\Factories;

use App\Models\Medico;
use Illuminate\Database\Eloquent\Factories\Factory;

class MedicoFactory extends Factory
{
    protected $model = Medico::class;

    public function definition()
    {
        $especialidades = [
            'Cardiologista', 'Pediatra', 'Ortopedista', 'Neurologista', 'Dermatologista'
        ];

        return [
            'nome' => $this->faker->name(),
            'especialidade' => $this->faker->randomElement($especialidades),
            'cidade_id' => 1,
        ];
    }
}
