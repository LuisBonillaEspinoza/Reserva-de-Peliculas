<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
//Para hacer mas facil el seeder
use Illuminate\Support\Facades\DB;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categorias')->insert([
            'nombre_categoria' => 'Accion',
            'created_at' => now()
        ]);

        DB::table('categorias')->insert([
            'nombre_categoria' => 'Aventura',
            'created_at' => now()
        ]);

        DB::table('categorias')->insert([
            'nombre_categoria' => 'Ciencia Ficcion',
            'created_at' => now()
        ]);

        DB::table('categorias')->insert([
            'nombre_categoria' => 'Comedia',
            'created_at' => now()
        ]);

        DB::table('categorias')->insert([
            'nombre_categoria' => 'Drama',
            'created_at' => now()
        ]);

        DB::table('categorias')->insert([
            'nombre_categoria' => 'Fantasia',
            'created_at' => now()
        ]);

        DB::table('categorias')->insert([
            'nombre_categoria' => 'Musical',
            'created_at' => now()
        ]);

        DB::table('categorias')->insert([
            'nombre_categoria' => 'Suspenso',
            'created_at' => now()
        ]);

        DB::table('categorias')->insert([
            'nombre_categoria' => 'Terror',
            'created_at' => now()
        ]);
    }
}
