<?php

namespace Database\Seeders;

use App\Models\Ph\Unidad;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $un=Unidad::create([
            'propiedad_id'  =>1,
            'name'       => 'torre 3',
        ]);

        Unidad::create([
            'propiedad_id'  =>1,
            'name'       => 'Apartamento 506',
            'coeficiente'   =>0.25,
            'unidad_id'     =>$un->id,
        ]);
    }
}