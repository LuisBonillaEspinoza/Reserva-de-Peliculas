<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Peliculas;

class PeliculasUpdateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'peliculas:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Actualizar estreno de la pelicula';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $peliculas = Peliculas::all();

        foreach($peliculas as $peli){
            $peli->estreno_pelicula = '2';
            $peli->save();
        }
        
    }
}
