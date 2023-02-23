<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Peliculas;
// use App\Models\Categoria;

class PeliculasFormBody extends Component
{
    /**
     * Create a new component instance.
     */
    private $peliculas;
    private $categorias;
    public function __construct($peliculas = null,$categorias = null)
    {
        if(is_null($peliculas)){
            $peliculas = Peliculas::make([
                'categoria_pelicula' => 0
            ]);
        }
        $this->peliculas = $peliculas;
        $this->categorias = $categorias;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $param = [
            'peliculas' => $this->peliculas,
            'categorias' => $this->categorias
        ];
        return view('components.peliculas-form-body',$param);
    }
}
