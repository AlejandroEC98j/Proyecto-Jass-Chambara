<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medidor extends Model
{
    use HasFactory;

    protected $table = 'medidores';

    protected $fillable = [
        'cliente_id',
        'numero_serie',
        'monto_a_pagar',
        'direccion',
        'estado'
    ];

    // Relación: Un medidor pertenece a un cliente
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}
