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
        Schema::create('administradors', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedBigInteger('propiedad_id');
            $table->foreign('propiedad_id')->references('id')->on('propiedads');

            $table->string('name')->comment('nombre del administrador');
            $table->date('inicia')->comment('Desde cuando inicia a administrar');
            $table->string('cel')->comment('Telefóno del administrador');
            $table->string('rutares')->nullable()->comment('ruta de la resolución de la alcaldia');
            $table->string('rutahv')->nullable()->comment('Ruta de la hoja de vida');
            $table->longText('observaciones')->comment('anotaciones al administrador');
            $table->integer('status')->default(0)->comment('0 activo, 1 inactivo');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('administradors');
    }
};
