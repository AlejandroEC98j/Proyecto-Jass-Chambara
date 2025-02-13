<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Factura;

class FacturaTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function puede_crear_una_factura()
    {
        $factura = Factura::factory()->create();

        $this->assertDatabaseHas('facturas', [
            'id' => $factura->id,
            'monto_total' => $factura->monto_total,
        ]);
    }
}