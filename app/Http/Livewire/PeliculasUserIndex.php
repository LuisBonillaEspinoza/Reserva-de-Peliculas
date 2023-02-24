<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Peliculas;
use Livewire\WithPagination;

class PeliculasUserIndex extends Component
{
    public $busqueda = '';

    use WithPagination;

    public $paginacion = 2;
    public $paginationTheme = 'bootstrap';

    protected $queryString = [
        'busqueda' => ['except' => ''],
    ];
    public function render()
    {
        $peliculas = $this->consulta();
        $peliculas = $peliculas->paginate($this->paginacion);
        
        $cantidad = $this->cantidad();

        if($peliculas->currentPage() > $peliculas->lastPage()){
            $this->resetPage();
            $peliculas = $this->consulta();
            $peliculas = $peliculas->paginate($this->paginacion);
        }
        $params = [
            'peliculas' => $peliculas,
            'cantidad' => $cantidad,
        ];

        return view('livewire.peliculas-user-index',$params);
    }

    public function consulta(){
        $query = Peliculas::orderBy('id','asc');
        if($this->busqueda != ''){
            $query->where('nombre_pelicula','LIKE','%'.$this->busqueda.'%');
        }
        return $query;
    }

    public function cantidad(){
        $query = Peliculas::count();
        return $query;
    }

}
