<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes'; // Esto es opcional si Laravel ya usa este nombre
    protected $fillable = ['nombre', 'direccion', 'telefono', 'correo', 'tipo_contrato'];

    public function medidor()
    {
        return $this->hasOne(Medidor::class, 'cliente_id');
    }

    public function facturas()
    {
        return $this->hasMany(Factura::class, 'cliente_id');
    }
}
