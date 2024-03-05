<?php

namespace App\Models\Ph;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Unidad extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * Relación uno a muchos inversa.
     * A que propiedad pertenece
     */
    public function propiedad():BelongsTo
    {
        return $this->BelongsTo(Propiedad::class);
    }

    /**
     * Relación uno a muchos.
     * unidades y sus componentes como interior -> apto
     */

    public function unidads():HasMany
    {
        return $this->hasMany(Unidad::class);
    }

    public function subunidads():HasMany
    {
        return $this->hasMany(Unidad::class)->with('unidads');
    }
}
