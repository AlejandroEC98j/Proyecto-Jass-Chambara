<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Pago;

class PagoTest extends TestCase
{
    // Utiliza el trait RefreshDatabase para reiniciar la base de datos después de cada prueba
    use RefreshDatabase;

    /**
     * @test
     * Esta prueba verifica que se puede crear un pago y que los datos se almacenan correctamente en la base de datos.
     */
    public function puede_crear_un_pago()
    {
        // Crea un nuevo pago utilizando una fábrica
        $pago = Pago::factory()->create();

        // Verifica que la base de datos contiene un registro con los datos del pago creado
        $this->assertDatabaseHas('pagos', [
            'id' => $pago->id,
            'monto_pagado' => $pago->monto_pagado,
        ]);
    }
}