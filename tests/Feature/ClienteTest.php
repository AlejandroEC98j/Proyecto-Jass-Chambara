<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Cliente;

class ClienteTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function un_usuario_autenticado_puede_ver_clientes()
    {
        $user = User::factory()->create();
        $this->actingAs($user); // Simula que el usuario ha iniciado sesión

        Cliente::factory()->count(3)->create();

        $response = $this->get('/clientes');
        $response->assertStatus(200);
    }
}