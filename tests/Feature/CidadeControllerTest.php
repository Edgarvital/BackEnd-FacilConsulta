<?php

use App\Models\Cidade;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CidadeControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_unauthenticated_user_can_access_cidades_route(): void
    {
        Cidade::factory()->count(5)->create();

        $response = $this->getJson('/api/cidades');

        $response->assertStatus(200);
    }

    public function test_cidades_route_with_parameter(): void
    {
        $cidade = Cidade::factory()->create([
            'nome' => 'São Paulo',
        ]);

        $response = $this->getJson('/api/cidades?nome=' . $cidade->nome);

        $response->assertStatus(200);

        $response->assertJsonFragment(['nome' => $cidade->nome]);
    }
}
