<?php

namespace Database\Seeders;

use App\Models\Paciente;
use Illuminate\Database\Seeder;

class PacienteSeeder extends Seeder
{

    public function run(){
        $qnt_pacientes = 10;

        Paciente::factory($qnt_pacientes)->create();
    }

}
