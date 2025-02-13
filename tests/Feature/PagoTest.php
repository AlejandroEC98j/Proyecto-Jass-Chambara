<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Cliente;
use App\Models\Medidor;
use App\Models\Factura;
use App\Models\Pago;

class PagoTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function un_pago_puede_ser_realizado_para_una_factura()
    {
        $factura = Factura::factory()->create();
        $pago = Pago::factory()->create(['factura_id' => $factura->id]);

        $this->assertDatabaseHas('pagos', [
            'factura_id' => $factura->id,
            'monto_pagado' => $pago->monto_pagado
        ]);
    }
}