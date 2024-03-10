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
        Schema::create('reunions', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('convoca_id');
            $table->foreign('convoca_id')->references('id')->on('users');

            $table->unsignedBigInteger('propiedad_id');
            $table->foreign('propiedad_id')->references('id')->on('propiedads');

            $table->date('fecha')->comment('Fecha de la reunión');
            $table->string('lugar')->comment('Donde');
            $table->string('tipo')->comment('Asamblea, Reunión consejo, Contador, Otros');
            $table->time('hora')->comment('Hora de la reunión');
            $table->string('ruta')->nullable()->comment('Ruta del aviso');
            $table->integer('status')->default(0)->comment('0 Convocada, 1 activa, 2 finalizada, 3 Anulada');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reunions');
    }
};
