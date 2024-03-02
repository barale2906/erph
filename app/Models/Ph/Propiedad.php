<?php

namespace App\Models\Ph;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Propiedad extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];
}
