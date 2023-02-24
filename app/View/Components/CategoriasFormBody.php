<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Categoria;

class CategoriasFormBody extends Component
{
    /**
     * Create a new component instance.
     */
    private $categorias;
    public function __construct($categorias = null)
    {
        if(is_null($categorias)){
            $categorias = Categoria::make([
                'nombre_pelicula' => ''
            ]);
        }
        $this->categorias = $categorias;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $param = [
            'categorias' => $this->categorias
        ];
        return view('components.categorias-form-body',$param);
    }
}
