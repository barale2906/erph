<?php

namespace App\Models\Reuniones;

use App\Models\Ph\Propiedad;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reunion extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];


    /**
     * Relación uno a muchos inversa.
     * Propiedad a la que pertenece la reunión
     */
    public function propiedad() :BelongsTo
    {
        return $this->belongsTo(Propiedad::class);
    }

    /**
     * Relación uno a muchos inversa.
     * Usuario que convoca
     */
    public function convoca() :BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
