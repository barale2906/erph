<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('propiedads', function (Blueprint $table) {
            $table->id();
            $table->integer('nit')->unique()->comment('NIT del conjunto');
            $table->string('ruta')->nullable()->comment('logo del conjunto');
            $table->string('nombre')->comment('nombre del conjunto');
            $table->string('direccion')->comment('dirección del conjunto');
            $table->string('email')->comment('email del conjunto');
            $table->string('telefono')->comment('teléfono del conjunto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('propiedads');
    }
};
