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
        Schema::create('quorums', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('reunion_id');
            $table->foreign('reunion_id')->references('id')->on('reunions');

            $table->unsignedBigInteger('registra_id');
            $table->foreign('registra_id')->references('id')->on('users');

            $table->unsignedBigInteger('unidad_id');
            $table->foreign('unidad_id')->references('id')->on('unidads');

            $table->integer('asistio')->default(0)->comment('0 No Asisitio 1, Asistio, Registra si asistio o no');
            $table->double('coeficiente')->nullable()->comment('Coeficiente de la copropiedad');
            $table->string('codigo')->nullable()->comment('Código de barras');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quorums');
    }
};
