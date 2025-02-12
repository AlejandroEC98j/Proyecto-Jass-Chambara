<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;
    protected $fillable = ['factura_id', 'fecha_pago', 'monto_pagado'];

    public function factura()
    {
        return $this->belongsTo(Factura::class);
    }
}
