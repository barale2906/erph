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
        Schema::create('resultados', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('respuesta_id');
            $table->foreign('respuesta_id')->references('id')->on('respuestas');

            $table->unsignedBigInteger('votacion_id');
            $table->foreign('votacion_id')->references('id')->on('votacions');

            $table->unsignedBigInteger('unidad_id');
            $table->foreign('unidad_id')->references('id')->on('unidads');

            $table->unsignedBigInteger('quorum_id');
            $table->foreign('quorum_id')->references('id')->on('quorums');

            $table->double('coeficiente')->comment('Coeficiente de la copropiedad');
            $table->double('codigo')->nullable()->comment('Código de barras');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resultados');
    }
};
