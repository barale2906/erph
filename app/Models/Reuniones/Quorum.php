<?php

namespace App\Models\Reuniones;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Quorum extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * Relación uno a muchos inversa.
     * Asistentes a la respectiva reunión
     */
    public function reunion() :BelongsTo
    {
        return $this->belongsTo(Reunion::class);
    }

    /**
     * Relación uno a muchos inversa.
     * Usuario que registra el ingreso
     */
    public function registra() :BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
