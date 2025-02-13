<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Medidor;

class MedidorTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function puede_crear_un_medidor()
    {
        $medidor = Medidor::factory()->create();

        $this->assertDatabaseHas('medidores', [
            'id' => $medidor->id,
            'numero_serie' => $medidor->numero_serie,
        ]);
    }
}