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
        Schema::create('votacions', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('reunion_id');
            $table->foreign('reunion_id')->references('id')->on('reunions');

            $table->longText('pregunta')->comment('Preguntas de la reunión');
            $table->longText('observaciones')->nullable()->comment('Observaciones de respuesta o explicaciones la pregunta');
            $table->integer('status')->default(1)->comment('1 creada, 2 en respuesta, 3 cerrada, 4 anulada');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('votacions');
    }
};
