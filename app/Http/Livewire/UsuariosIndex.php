<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;

class UsuariosIndex extends Component
{
    public $busqueda = '';

    use WithPagination;

    public $paginacion = 2;
    public $paginationTheme = 'bootstrap';

    protected $queryString = [
        'busqueda' => ['except' => '']
    ];

    public function render()
    {
        $usuarios = $this->consulta();
        $usuarios = $usuarios->paginate($this->paginacion);
        
        $cantidad = $this->cantidad();

        if($usuarios->currentPage() > $usuarios->lastPage()){
            $this->resetPage();
            $usuarios = $this->consulta();
            $usuarios = $usuarios->paginate($this->paginacion);
        }
        $params = [
            'usuarios' => $usuarios,
            'cantidad' => $cantidad,
        ];

        return view('livewire.usuarios-index',$params);
    }

    public function consulta(){
        $query = User::orderBy('id','asc');
        if($this->busqueda != ''){
            $query->where('username_user','LIKE','%'.$this->busqueda.'%');
        }
        return $query;
    }

    public function cantidad(){
        $query = User::count();
        return $query;
    }
}
