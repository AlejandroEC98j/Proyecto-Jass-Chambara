<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Factura;

class FacturaTest extends TestCase
{
    // Utiliza el trait RefreshDatabase para reiniciar la base de datos después de cada prueba
    use RefreshDatabase;

    /**
     * @test
     * Esta prueba verifica que se puede crear una factura y que los datos se almacenan correctamente en la base de datos.
     */
    public function puede_crear_una_factura()
    {
        // Crea una nueva factura utilizando una fábrica
        $factura = Factura::factory()->create();

        // Verifica que la base de datos contiene un registro con los datos de la factura creada
        $this->assertDatabaseHas('facturas', [
            'id' => $factura->id,
            'monto_total' => $factura->monto_total,
        ]);
    }
}