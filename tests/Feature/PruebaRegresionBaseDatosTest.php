<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class PruebaRegresionBaseDatosTest extends TestCase
{
    public function test_estructura_tablas_mysql()
    {
        // Verificar que las tablas existen
        $this->assertTrue(Schema::hasTable('clientes'));
        $this->assertTrue(Schema::hasTable('medidores'));
        $this->assertTrue(Schema::hasTable('facturas'));
        $this->assertTrue(Schema::hasTable('pagos'));

        // Verificar columnas clave en la tabla clientes
        $this->assertTrue(Schema::hasColumn('clientes', 'nombre'));
        $this->assertTrue(Schema::hasColumn('clientes', 'direccion'));
        $this->assertTrue(Schema::hasColumn('clientes', 'telefono'));
        $this->assertTrue(Schema::hasColumn('clientes', 'tipo_contrato'));

        // Verificar columnas clave en la tabla medidores
        $this->assertTrue(Schema::hasColumn('medidores', 'numero_serie'));
        $this->assertTrue(Schema::hasColumn('medidores', 'cliente_id'));

        // Verificar columnas clave en la tabla facturas
        $this->assertTrue(Schema::hasColumn('facturas', 'cliente_id'));
        $this->assertTrue(Schema::hasColumn('facturas', 'monto_total'));
        $this->assertTrue(Schema::hasColumn('facturas', 'fecha_emision'));

        // Verificar columnas clave en la tabla pagos
        $this->assertTrue(Schema::hasColumn('pagos', 'factura_id'));
        $this->assertTrue(Schema::hasColumn('pagos', 'monto_pagado'));
        $this->assertTrue(Schema::hasColumn('pagos', 'fecha_pago'));
    }
}
