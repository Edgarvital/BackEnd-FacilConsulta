<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Medico;
use App\Models\Cidade;

class MedicoSeeder extends Seeder
{
    public function run()
    {
        $qnt_medicos = 5;

        for ($i = 0; $i < $qnt_medicos; $i++) {
            $cidadeId = Cidade::inRandomOrder()->first()->id;

            Medico::factory()->state([
                'cidade_id' => $cidadeId,
            ])->create();
        }
    }
}
