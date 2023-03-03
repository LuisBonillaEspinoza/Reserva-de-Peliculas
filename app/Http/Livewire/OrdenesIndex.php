<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\DetalleOrden;
use App\Models\Ordenes;
use Livewire\WithPagination;

class OrdenesIndex extends Component
{

    use WithPagination;

    public $paginacion = 3;
    public $paginationTheme = 'bootstrap';
    
    public function render()
    {
        $ordenes = $this->consulta();
        $ordenes = $ordenes->paginate($this->paginacion);

        $cantidad = $this->cantidad();
        
        if($ordenes->currentPage() > $ordenes->lastPage()){
            $this->resetPage();
            $ordenes = $this->consulta();
            $ordenes = $ordenes->paginate($this->paginacion);
        }
        $params = [
            'ordenes' => $ordenes,
            'cantidad' => $cantidad
        ];
        return view('livewire.ordenes-index',$params);
    }

    public function consulta(){
        $ordenes = DetalleOrden::orderBy('id_pelicula','asc');
        return $ordenes;
    }

    public function cantidad(){
        $query = DetalleOrden::count();
        return $query;
    }
}
