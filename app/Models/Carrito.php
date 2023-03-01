<?php

namespace App\Models;


class Carrito
{
    public $peliculas = null;
    public $total_cantidad = 0;
    public $total_precio = 0;

    public function __construct($oldCart){

        if($oldCart){
            $this->peliculas = $oldCart->peliculas;
            $this->total_cantidad = $oldCart->total_cantidad;
            $this->total_precio = $oldCart->total_precio;
        }
    }

    public function añadir($pelicula,$id){
        $guardado = ['cantidad' => 0, 'precio'=> $pelicula->precio_pelicula , 'pelicula' => $pelicula];

        if($this->peliculas){
            if(array_key_exists($id, $this->peliculas)){
                $guardado = $this->peliculas[$id];
            }
        }
        
        $guardado['cantidad']++;
        $guardado['precio'] = $pelicula->precio_pelicula * $guardado['cantidad'];
        $this->peliculas[$id] = $guardado;
        $this->total_cantidad++;
        $this->total_precio += $pelicula->precio_pelicula;
    }
}
