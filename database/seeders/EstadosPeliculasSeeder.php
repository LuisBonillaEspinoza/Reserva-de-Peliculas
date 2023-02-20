<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
//Para hacer mas facil el seeder
use Illuminate\Support\Facades\DB;

class EstadosPeliculasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('estadospeliculas')->insert([
            'nombre_estado' => 'Disponible',
            'created_at' => now()
        ]);

        DB::table('estadospeliculas')->insert([
            'nombre_estado' => 'No Disponible',
            'created_at' => now()
        ]);
    }
}
