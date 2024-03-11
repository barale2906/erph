<?php

namespace App\Models\Reuniones;

use App\Models\Ph\Unidad;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Resultado extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * Relación uno a muchos inversa.
     * Respuestas por pregunta
     */
    public function respuestas() :BelongsTo
    {
        return $this->belongsTo(Respuesta::class);
    }

    /**
     * Relación uno a muchos inversa.
     * asistentes por pregunta
     */
    public function quorums() :BelongsTo
    {
        return $this->belongsTo(Quorum::class);
    }

    /**
     * Relación uno a muchos inversa.
     * Respuestas por pregunta
     */
    public function unidads() :BelongsTo
    {
        return $this->belongsTo(Unidad::class);
    }

    /**
     * Relación uno a muchos inversa.
     * Respuestas a la pregunta
     */
    public function votacions() :BelongsTo
    {
        return $this->belongsTo(Votacion::class);
    }

}
