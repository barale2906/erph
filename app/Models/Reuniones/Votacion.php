<?php

namespace App\Models\Reuniones;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Votacion extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * Relación uno a muchos inversa.
     * Votaci´n para la reunión
     */
    public function reuniones() :BelongsTo
    {
        return $this->belongsTo(Reunion::class);
    }

    /**
     * Relación uno a muchos.
     * Respuestas a las preguntas
     */
    public function respuestas() :HasMany
    {
        return $this->hasMany(Respuesta::class);
    }

    /**
     * Relación uno a muchos.
     * Resultados de las preguntas
     */
    public function resultados() :HasMany
    {
        return $this->hasMany(Resultado::class);
    }



}
