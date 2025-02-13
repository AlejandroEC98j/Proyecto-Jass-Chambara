<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Factura;
use App\Models\Cliente;

class FacturaFactory extends Factory
{
    protected $model = Factura::class;
    public function definition()
    {
        return [
            'cliente_id' => Cliente::factory(),
            'monto_total' => $this->faker->randomFloat(2, 10, 500),
            'estado' => $this->faker->randomElement(['pendiente', 'pagado', 'vencido']),
            'fecha_emision' => $this->faker->date(),
            'fecha_vencimiento' => $this->faker->date(),
        ];
    }
}