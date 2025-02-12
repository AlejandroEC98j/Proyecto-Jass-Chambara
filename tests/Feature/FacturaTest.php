<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Factura;

class FacturaTest extends TestCase
{
    use RefreshDatabase; // Limpia la base de datos después de cada prueba

    /** @test */
    public function un_usuario_autenticado_puede_ver_facturas()
    {
        $user = User::factory()->create();
        $this->actingAs($user); // Simula que el usuario ha iniciado sesión

        $factura = Factura::factory()->create();

        $response = $this->get('/facturas');

        $response->assertStatus(200); // Código HTTP correcto
        $response->assertSee($factura->monto); // Verifica que aparece en la vista
    }
}
