<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Pago;

class PagoTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function puede_crear_un_pago()
    {
        $pago = Pago::factory()->create();

        $this->assertDatabaseHas('pagos', [
            'id' => $pago->id,
            'monto_pagado' => $pago->monto_pagado,
        ]);
    }
}