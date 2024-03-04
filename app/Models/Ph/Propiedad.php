<?php

namespace App\Models\Ph;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Propiedad extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * Relación uno a muchos.
     * Unidades que le pertenecen
     */
    public function unidad() :HasMany
    {
        return $this->hasMany(Unidad::class);
    }
}
