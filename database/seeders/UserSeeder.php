<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Ing Alexander Barajas V',
            'email' => 'alexanderbarajas@gmail.com',
            'password'=>bcrypt('79844910'),
            'rol_id'=>1,
            'ph_id'=>1,
        ])->assignRole('Superusuario');

        User::factory()->create([
            'name' => 'Ing. Diego Alejandro Barajas',
            'email' => 'diego@gislasas.com',
            'password'=>bcrypt('1233491472'),
            'rol_id'=>1,
            'ph_id'=>1,
        ])->assignRole('Superusuario');

        User::factory()->create([
            'name' => 'Daniela Barajas',
            'email' => 'daniela@gislasas.com',
            'password'=>bcrypt('1030535862'),
            'rol_id'=>1,
            'ph_id'=>1,
        ])->assignRole('Superusuario');

        User::factory()->create([
            'name' => 'Jackson Farfán',
            'email' => 'administrador@alameda.com',
            'password'=>bcrypt('administradoralameda'),
            'rol_id'=>4,
            'ph_id'=>1,
        ])->assignRole('Administrador');
    }
}
