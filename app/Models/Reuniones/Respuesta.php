<?php

namespace App\Models\Reuniones;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Respuesta extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * Relación uno a muchos inversa.
     * Respuesta a las preguntas
     */
    public function votacion() :BelongsTo
    {
        return $this->belongsTo(Votacion::class);
    }

    /**
     * Relación uno a muchos.
     * REsultado de la votación
     */
    public function resultados() :HasMany
    {
        return $this->hasMany(Resultado::class);
    }
}
