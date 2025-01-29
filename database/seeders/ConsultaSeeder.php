<?php

namespace Database\Seeders;

use App\Models\Consulta;
use App\Models\Medico;
use App\Models\Paciente;
use Illuminate\Database\Seeder;

class ConsultaSeeder extends Seeder
{

    public function run(){
        $qnt_consultas = 10;

        for ($i = 0; $i < $qnt_consultas; $i++) {
            $pacienteId = Paciente::inRandomOrder()->first()->id;
            $medicoId = Medico::inRandomOrder()->first()->id;
            Consulta::factory()->state([
                'paciente_id' => $pacienteId,
                'medico_id' => $medicoId,
            ])->create();
        }
    }

}
