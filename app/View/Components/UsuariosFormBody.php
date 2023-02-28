<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\User;

class UsuariosFormBody extends Component
{
    /**
     * Create a new component instance.
     */
    private $usuarios;
    private $rol;
    public function __construct($usuarios = null, $rol = null)
    {
        if(is_null($usuarios)){
            $usuarios = User::make([
                'rol_user' => ''
            ]);
        }
        $this->usuarios = $usuarios;
        $this->rol = $rol;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $param = [
            'usuarios' => $this->usuarios,
            'rol' => $this->rol
        ];
        return view('components.usuarios-form-body',$param);
    }
}
