<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
//Para hacer mas facil el seeder
use Illuminate\Support\Facades\DB;

class EstadosUsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('estadosusuarios')->insert([
            'nombre_estado' => 'Activo',
            'created_at' => now()
        ]);

        DB::table('estadosusuarios')->insert([
            'nombre_estado' => 'Inactivo',
            'created_at' => now()
        ]);
    }
}
