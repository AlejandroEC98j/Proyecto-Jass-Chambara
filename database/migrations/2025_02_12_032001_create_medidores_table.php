<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('medidores', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cliente_id');
            $table->string('numero_serie')->unique();
            $table->decimal('lectura_actual', 8, 2)->default(0);
            $table->decimal('lectura_anterior', 8, 2)->default(0);
            $table->timestamps();
    
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');
        });
    }    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medidores');
    }
};
