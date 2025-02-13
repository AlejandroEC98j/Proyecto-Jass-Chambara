<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Cliente;
use App\Models\Medidor;
use App\Models\Factura;
use App\Models\Pago;

class MedidorTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function un_usuario_puede_asignar_un_medidor_a_un_cliente()
    {
        $cliente = Cliente::factory()->create();
        $medidor = Medidor::factory()->create(['cliente_id' => $cliente->id]);

        $this->assertDatabaseHas('medidores', [
            'cliente_id' => $cliente->id,
            'numero_serie' => $medidor->numero_serie
        ]);
    }
}