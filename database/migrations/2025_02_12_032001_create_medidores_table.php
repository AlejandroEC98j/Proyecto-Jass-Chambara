<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('medidores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cliente_id')->nullable()->constrained('clientes')->onDelete('set null'); 
            $table->string('numero_serie')->unique();
            $table->decimal('lectura_actual', 8, 2);
            $table->string('direccion');
            $table->enum('estado', ['Activo', 'Inactivo'])->default('Activo'); // Agregar estado
            $table->timestamps();
        });        
    }

    public function down() {
        Schema::dropIfExists('medidores');
    }
};
