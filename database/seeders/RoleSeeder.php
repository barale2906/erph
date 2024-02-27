<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Superusuario=Role::create(['name'=>'Superusuario']);
        $Operaciones=Role::create(['name'=>'Operaciones']);
        $AuxiliarGen=Role::create(['name'=>'AuxiliarGen']);
        $Administrador=Role::create(['name'=>'Administrador']);
        $AuxiliarPH=Role::create(['name'=>'AuxiliarPH']);
        $Consejero=Role::create(['name'=>'Consejero']);
        $Contador=Role::create(['name'=>'Contador']);
        $RevisorFiscal=Role::create(['name'=>'RevisorFiscal']);
        $ServiciosGen=Role::create(['name'=>'ServiciosGen']);
        $Guardas=Role::create(['name'=>'Guardas']);
        $Mantenimiento=Role::create(['name'=>'Mantenimiento']);
        $Copropietario=Role::create(['name'=>'Copropietario']);
        $Residente=Role::create(['name'=>'Residente']);


        Permission::create([
                        'name'=>'Configuracion',
                        'descripcion'=>'Ingreso al menú Configuración',
                        'modulo'=>'configuracion'
                    ])->syncRoles([$Superusuario,$Operaciones]);


        Permission::create([
                        'name'=>'co_users',
                        'descripcion'=>'ver usuarios',
                        'modulo'=>'configuracion'
                        ])->syncRoles([$Superusuario]);
        Permission::create([
                            'name'=>'co_userCrear',
                            'descripcion'=>'crear Usuario',
                            'modulo'=>'configuracion'
                            ])->syncRoles([$Superusuario,$Operaciones]);
        Permission::create([
                            'name'=>'co_userEditar',
                            'descripcion'=>'editar usuario',
                            'modulo'=>'configuracion'
                            ])->syncRoles([$Superusuario,$Operaciones]);
        Permission::create([
                            'name'=>'co_userInactivar',
                            'descripcion'=>'inactivar usuario',
                            'modulo'=>'configuracion'
                            ])->syncRoles([$Superusuario,$Operaciones]);


        Permission::create([
                            'name'=>'co_rols',
                            'descripcion'=>'ver roles',
                            'modulo'=>'configuracion'
                            ])->syncRoles([$Superusuario]);
        Permission::create([
                            'name'=>'co_rolCrear',
                            'descripcion'=>'crear roles',
                            'modulo'=>'configuracion'
                            ])->syncRoles([$Superusuario]);
        Permission::create([
                            'name'=>'co_rolEditar',
                            'descripcion'=>'editar roles',
                            'modulo'=>'configuracion'
                            ])->syncRoles([$Superusuario]);
        Permission::create([
                            'name'=>'co_rolInactivar',
                            'descripcion'=>'inactivar roles',
                            'modulo'=>'configuracion'
                            ])->syncRoles([$Superusuario]);
    }
}
