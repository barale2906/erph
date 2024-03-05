<?php

namespace App\Models\Reuniones;

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
    public function reuniones() :BelongsTo
    {
        return $this->belongsTo(Respuesta::class);
    }

}
