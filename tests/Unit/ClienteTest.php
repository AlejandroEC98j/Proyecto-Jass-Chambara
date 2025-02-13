<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Cliente;

class ClienteTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function puede_crear_un_cliente()
    {
        $cliente = Cliente::factory()->create();

        $this->assertDatabaseHas('clientes', [
            'id' => $cliente->id,
            'nombre' => $cliente->nombre,
        ]);
    }
}