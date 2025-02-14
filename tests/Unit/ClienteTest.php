<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Cliente;

class ClienteTest extends TestCase
{
    // Utiliza el trait RefreshDatabase para reiniciar la base de datos después de cada prueba
    use RefreshDatabase;

    /**
     * @test
     * Esta prueba verifica que se puede crear un cliente y que los datos se almacenan correctamente en la base de datos.
     */
    public function puede_crear_un_cliente()
    {
        // Crea un nuevo cliente utilizando una fábrica
        $cliente = Cliente::factory()->create();

        // Verifica que la base de datos contiene un registro con los datos del cliente creado
        $this->assertDatabaseHas('clientes', [
            'id' => $cliente->id,
            'nombre' => $cliente->nombre,
        ]);
    }
}