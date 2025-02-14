<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Medidor;

class MedidorTest extends TestCase
{
    // Utiliza el trait RefreshDatabase para reiniciar la base de datos después de cada prueba
    use RefreshDatabase;

    /**
     * @test
     * Esta prueba verifica que se puede crear un medidor y que los datos se almacenan correctamente en la base de datos.
     */
    public function puede_crear_un_medidor()
    {
        // Crea un nuevo medidor utilizando una fábrica
        $medidor = Medidor::factory()->create();

        // Verifica que la base de datos contiene un registro con los datos del medidor creado
        $this->assertDatabaseHas('medidores', [
            'id' => $medidor->id,
            'numero_serie' => $medidor->numero_serie,
        ]);
    }
}