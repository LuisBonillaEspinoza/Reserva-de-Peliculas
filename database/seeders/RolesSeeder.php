<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
//Para hacer mas facil el seeder
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            'nombre_rol' => 'Administrador',
            'created_at' => now()
        ]);

        DB::table('roles')->insert([
            'nombre_rol' => 'Cliente',
            'created_at' => now()
        ]);
    }
}
