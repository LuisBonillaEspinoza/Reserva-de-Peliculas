<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Categoria;
use Livewire\WithPagination;

class CategoriasIndex extends Component
{

    public $busqueda;

    use WithPagination;

    public $paginacion = 5;
    public $paginationTheme = 'bootstrap';

    protected $queryString = [
        'busqueda' => ['except' => ''],
    ];

    public function render()
    {
        $categorias = $this->consulta();
        $categorias = $categorias->paginate($this->paginacion);

        $cantidad = $this->cantidad();
        
        if($categorias->currentPage() > $categorias->lastPage()){
            $this->resetPage();
            $categorias = $this->consulta();
            $categorias = $categorias->paginate($this->paginacion);
        }
        $params = [
            'categorias' => $categorias,
            'cantidad' => $cantidad
        ];
        return view('livewire.categorias-index',$params);
    }

    public function consulta(){
        $query = Categoria::orderBy('id','asc');
        if($this->busqueda != ''){
            $query->where('nombre_categoria','LIKE','%'.$this->busqueda.'%');
        }
        return $query;
    }

    public function cantidad(){
        $query = Categoria::count();
        return $query;
    }
}
