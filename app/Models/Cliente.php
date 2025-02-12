<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'direccion', 'telefono', 'correo', 'tipo_contrato'];

    public function medidor()
    {
        return $this->hasOne(Medidor::class);
    }

    public function facturas()
    {
        return $this->hasMany(Factura::class);
    }
}
