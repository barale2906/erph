<?php

namespace App\Models\Ph;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Administrador extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * Relación uno a muchos.
     * Propiedades que administra
     */
    public function propiedades() :BelongsTo
    {
        return $this->belongsTo(Propiedad::class);
    }

    /**
     * Relación uno a muchos.
     * Usuario que administra
     */
    public function administrador() :BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
