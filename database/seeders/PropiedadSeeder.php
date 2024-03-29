<?php

namespace Database\Seeders;

use App\Models\Ph\Propiedad;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PropiedadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Propiedad::create([
            'nit'       => '901505407',
            'nombre'    => 'conjunto cerrado alameda del otoño – propiedad horizontal',
            'direccion' => 'calle 71 a sur # 83 b - 85',
            'email'     => 'conjuntocerradoalamedaph@gmail.com',
            'telefono'  =>'321 273 1985'
        ]);

        Propiedad::create([
            'nit'       => '900988543',
            'nombre'    => 'conjunto residencial parque flamencos ii',
            'direccion' => 'calle 77 sur # 81 - 80',
            'email'     => 'parquesflamencos2021@gmail.com',
            'telefono'  => '321 273 3333'
        ]);

    }
}
