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
        Schema::create('unidads', function (Blueprint $table) {

            $table->id();

            $table->unsignedBigInteger('propiedad_id');
            $table->foreign('propiedad_id')->references('id')->on('propiedads');

            $table->string('name')->comment('Identificación de la torre, apto, interior etc');
            $table->string('responsable')->nullable()->comment('Persona a cargo de la unidad');
            $table->double('coeficiente')->nullable()->comment('Coeficiente dentro de la copropiedad');
            $table->integer('unidad_id')->nullable()->comment('id de la unidad a la cual pertenece');
            $table->boolean('mora')->default(false)->comment('false al día, true en mora');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unidads');
    }
};
