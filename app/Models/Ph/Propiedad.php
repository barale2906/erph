<?php

namespace App\Models\Ph;

use App\Models\Reuniones\Reunion;
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
    public function unidades() :HasMany
    {
        return $this->hasMany(Unidad::class);
    }

    /**
     * Relación uno a muchos.
     * Administrador por conjunto
     */
    public function administradores() :HasMany
    {
        return $this->hasMany(Administrador::class);
    }

    /**
     * Relación uno a muchos.
     * Reuniones del conjunto
     */
    public function reuniones() :HasMany
    {
        return $this->hasMany(Reunion::class);
    }
}
