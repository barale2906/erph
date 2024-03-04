<?php

namespace App\Models\Reuniones;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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


}
