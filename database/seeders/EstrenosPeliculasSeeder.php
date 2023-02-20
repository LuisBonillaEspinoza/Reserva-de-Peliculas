<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
//Para hacer mas facil el seeder
use Illuminate\Support\Facades\DB;

class EstrenosPeliculasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('estrenos')->insert([
            'nombre_estreno' => 'Si',
            'created_at' => now()
        ]);

        DB::table('estrenos')->insert([
            'nombre_estreno' => 'No',
            'created_at' => now()
        ]);
    }
}
