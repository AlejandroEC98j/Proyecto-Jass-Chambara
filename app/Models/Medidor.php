<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medidor extends Model
{
    use HasFactory;

    protected $table = 'medidores'; // IMPORTANTE: Confirma el nombre correcto de la tabla
}

