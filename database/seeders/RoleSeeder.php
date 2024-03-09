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


        Permission::create([
                                'name'=>'ph',
                                'descripcion'=>'Ingreso al menú Propiedad Horizontal',
                                'modulo'=>'propiedad'
                            ])->syncRoles([$Superusuario,$Operaciones]);

        Permission::create([
                            'name'=>'ph_coprop',
                            'descripcion'=>'ver copropiedades',
                            'modulo'=>'propiedad'
                            ])->syncRoles([$Superusuario,$Operaciones]);

        Permission::create([
                            'name'=>'ph_copropCrear',
                            'descripcion'=>'crear copropiedades',
                            'modulo'=>'propiedad'
                            ])->syncRoles([$Superusuario]);
        Permission::create([
                            'name'=>'ph_copropEditar',
                            'descripcion'=>'editar copropiedades',
                            'modulo'=>'propiedad'
                            ])->syncRoles([$Superusuario]);
        Permission::create([
                            'name'=>'ph_copropInactivar',
                            'descripcion'=>'inactivar copropiedades',
                            'modulo'=>'propiedad'
                            ])->syncRoles([$Superusuario]);


        Permission::create([
                            'name'=>'ph_unid',
                            'descripcion'=>'ver unidades',
                            'modulo'=>'propiedad'
                            ])->syncRoles([$Superusuario,$Operaciones]);

        Permission::create([
                            'name'=>'ph_unidCrear',
                            'descripcion'=>'crear unidades',
                            'modulo'=>'propiedad'
                            ])->syncRoles([$Superusuario]);
        Permission::create([
                            'name'=>'ph_unidEditar',
                            'descripcion'=>'editar unidades',
                            'modulo'=>'propiedad'
                            ])->syncRoles([$Superusuario]);
        Permission::create([
                            'name'=>'ph_unidInactivar',
                            'descripcion'=>'inactivar unidades',
                            'modulo'=>'propiedad'
                            ])->syncRoles([$Superusuario]);


        Permission::create([
                            'name'=>'ph_admin',
                            'descripcion'=>'ver administradores',
                            'modulo'=>'propiedad'
                            ])->syncRoles([$Superusuario,$Operaciones,$Consejero,$Residente,$Guardas,$Administrador,$Mantenimiento,$Copropietario,$RevisorFiscal,$Contador,$ServiciosGen,$AuxiliarGen,$AuxiliarPH]);

        Permission::create([
                            'name'=>'ph_adminCrear',
                            'descripcion'=>'crear administradores',
                            'modulo'=>'propiedad'
                            ])->syncRoles([$Superusuario,$Operaciones,$Consejero]);
        Permission::create([
                            'name'=>'ph_adminEditar',
                            'descripcion'=>'editar administradores',
                            'modulo'=>'propiedad'
                            ])->syncRoles([$Superusuario,$Operaciones,$Consejero]);
        Permission::create([
                            'name'=>'ph_adminInactivar',
                            'descripcion'=>'inactivar administradores',
                            'modulo'=>'propiedad'
                            ])->syncRoles([$Superusuario,$Operaciones,$Consejero]);


        Permission::create([
                            'name'=>'reunion',
                            'descripcion'=>'Ingreso al menú Reuniones',
                            'modulo'=>'reunion'
                        ])->syncRoles([$Superusuario,$Operaciones,$Consejero,$Residente,$Guardas,$Administrador,$Mantenimiento,$Copropietario,$RevisorFiscal,$Contador,$ServiciosGen,$AuxiliarGen,$AuxiliarPH]);

        Permission::create([
                            'name'=>'reu_reunion',
                            'descripcion'=>'ver reuniones',
                            'modulo'=>'reunion'
                            ])->syncRoles([$Superusuario,$Operaciones,$Consejero,$Residente,$Guardas,$Administrador,$Mantenimiento,$Copropietario,$RevisorFiscal,$Contador,$ServiciosGen,$AuxiliarGen,$AuxiliarPH]);

        Permission::create([
                            'name'=>'reu_reunionCrear',
                            'descripcion'=>'crear reunión',
                            'modulo'=>'reunion'
                            ])->syncRoles([$Superusuario,$Operaciones,$Consejero,$Administrador]);
        Permission::create([
                            'name'=>'reu_reunionEditar',
                            'descripcion'=>'editar reunión',
                            'modulo'=>'reunion'
                            ])->syncRoles([$Superusuario,$Operaciones,$Consejero,$Administrador]);
        Permission::create([
                            'name'=>'reu_reunionInactivar',
                            'descripcion'=>'inactivar reunión',
                            'modulo'=>'reunion'
                            ])->syncRoles([$Superusuario,$Operaciones,$Administrador,$Consejero]);


        Permission::create([
                            'name'=>'reu_votacion',
                            'descripcion'=>'ver votaciones',
                            'modulo'=>'reunion'
                            ])->syncRoles([$Superusuario,$Operaciones,$Consejero,$Residente,$Administrador,$Copropietario,$AuxiliarGen,$AuxiliarPH]);

        Permission::create([
                            'name'=>'reu_votacionCrear',
                            'descripcion'=>'crear reunión',
                            'modulo'=>'reunion'
                            ])->syncRoles([$Superusuario,$Operaciones,$Consejero,$Administrador]);
        Permission::create([
                            'name'=>'reu_votacionEditar',
                            'descripcion'=>'editar reunión',
                            'modulo'=>'reunion'
                            ])->syncRoles([$Superusuario,$Operaciones,$Consejero,$Administrador]);
        Permission::create([
                            'name'=>'reu_votacionInactivar',
                            'descripcion'=>'inactivar reunión',
                            'modulo'=>'reunion'
                            ])->syncRoles([$Superusuario,$Operaciones]);

        Permission::create([
                            'name'=>'reu_votar',
                            'descripcion'=>'Registrar Voto',
                            'modulo'=>'reunion'
                            ])->syncRoles([$Superusuario,$Operaciones,$Copropietario,$Consejero,$Administrador]);

        Permission::create([
                            'name'=>'reu_barras',
                            'descripcion'=>'Generar e imprimir códigos de barras',
                            'modulo'=>'reunion'
                            ])->syncRoles([$Superusuario,$Operaciones]);
    }
}
