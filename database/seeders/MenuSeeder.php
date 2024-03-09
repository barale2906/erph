<?php

namespace Database\Seeders;

use App\Models\Configuracion\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $m1=Menu::create([
            'name'              => 'CONFIGURACIÓN',
            'identificaRuta'    => 'configuracion.*',
            'permiso'           => 'Configuracion',
            'icono'             => 'fa-solid fa-screwdriver-wrench'
        ]);

        Menu::create([
                    'permiso'           => 'co_users',
                    'ruta'              => 'configuracion.users',
                    'identificaRuta'    => 'configuracion.users',
                    'name'              => 'Usuarios',
                    'icono'             => 'fa-solid fa-users text-gray-500',
                    'menu_id'           => $m1->id
                ]);

        Menu::create([
                    'permiso'           => 'co_rols',
                    'ruta'              => 'configuracion.roles',
                    'identificaRuta'    => 'configuracion.roles',
                    'name'              => 'Roles',
                    'icono'             => 'fa-solid fa-wand-sparkles text-gray-500',
                    'menu_id'           => $m1->id
                ]);

        $m2=Menu::create([
                    'name'              => 'PROPIEDAD',
                    'identificaRuta'    => 'ph.*',
                    'permiso'           => 'ph',
                    'icono'             => 'fa-solid fa-building-flag'
                ]);

        Menu::create([
                    'permiso'           => 'ph_coprop',
                    'ruta'              => 'ph.coprops',
                    'identificaRuta'    => 'ph.coprops',
                    'name'              => 'Propiedades',
                    'icono'             => 'fa-solid fa-house text-gray-500',
                    'menu_id'           => $m2->id
                ]);

        Menu::create([
                    'permiso'           => 'ph_unid',
                    'ruta'              => 'ph.unidades',
                    'identificaRuta'    => 'ph.unidades',
                    'name'              => 'Unidades',
                    'icono'             => 'fa-solid fa-house-user text-gray-500',
                    'menu_id'           => $m2->id
                ]);

        Menu::create([
                    'permiso'           => 'ph_admin',
                    'ruta'              => 'ph.administradores',
                    'identificaRuta'    => 'ph.administradores',
                    'name'              => 'Administradores',
                    'icono'             => 'fa-solid fa-user-tie text-gray-500',
                    'menu_id'           => $m2->id
                ]);

        $m3=Menu::create([
                    'name'              => 'REUNIÓN',
                    'identificaRuta'    => 'reunion.*',
                    'permiso'           => 'reunion',
                    'icono'             => 'fa-solid fa-people-roof'
                ]);

        Menu::create([
                    'permiso'           => 'reu_reunion',
                    'ruta'              => 'reunion.reunion',
                    'identificaRuta'    => 'reunion.reunion',
                    'name'              => 'Reuniones',
                    'icono'             => 'fa-solid fa-people-line text-gray-500',
                    'menu_id'           => $m3->id
                ]);

        Menu::create([
                    'permiso'           => 'reu_votacion',
                    'ruta'              => 'reunion.votacion',
                    'identificaRuta'    => 'reunion.votacion',
                    'name'              => 'Votaciones',
                    'icono'             => 'fa-solid fa-check-to-slot text-gray-500',
                    'menu_id'           => $m3->id
                ]);

        Menu::create([
                    'permiso'           => 'reu_barras',
                    'ruta'              => 'reunion.barras',
                    'identificaRuta'    => 'reunion.barras',
                    'name'              => 'Códigos de Barras',
                    'icono'             => 'fa-solid fa-barcode text-gray-500',
                    'menu_id'           => $m3->id
                ]);
    }
}
