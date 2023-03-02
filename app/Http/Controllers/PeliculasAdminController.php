<?php

namespace App\Http\Controllers;

use App\Models\Peliculas;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Categoria;
use App\Models\Carrito;
use App\Http\Requests\PeliculasRequest;
//Para validar
use Illuminate\Support\Facades\Auth;
Use Session;

class PeliculasAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::check() && Auth::user()->rol_user == 1){
            return view('administrador.peliculas.index');
        }
        else if(!Auth::check()){
            return redirect()->route('peliculas.no-login');
        }
        return view('user.peliculas.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(Auth::check() && Auth::user()->rol_user == 2){
            return redirect()->route('login.index');
        }
        else if(!Auth::check()){
            return redirect()->route('peliculas.no-login');
        }

        $categoria = Categoria::all();
        return view('administrador.peliculas.create',compact('categoria'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PeliculasRequest $request)
    {
        
        $datos = $request->validated();

        $filename = time().'_'.$datos['file_pelicula']->getClientOriginalName();
        $filesize = $datos['file_pelicula']->getSize();
        $datos['file_pelicula']->storeAs('public/'.$filename);

        $peliculas = new Peliculas;
        $peliculas->nombre_pelicula = $datos['nombre_pelicula'];
        $peliculas->precio_pelicula = $datos['precio_pelicula'];
        $peliculas->descripcion_pelicula = $datos['descripcion_pelicula'];
        $peliculas->path_pelicula = $filesize;
        $peliculas->imagen_pelicula = $filename;
        $peliculas->estado_pelicula = '1';
        $peliculas->estreno_pelicula = '1';
        $peliculas->categoria_pelicula = $datos['categoria_pelicula'];

        $peliculas->save();

        return redirect()->route('peliculas.create')->with('success','Pelicula Registrada Correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Peliculas $peliculas)
    {
        if(Auth::check() && Auth::user()->rol_user == 1){
            return view('administrador.peliculas.show',compact('peliculas'));
        }
        else if(!Auth::check()){
            return redirect()->route('peliculas.no-login');
        }
        return view('user.peliculas.show',compact('peliculas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Peliculas $peliculas)
    {
        if(Auth::check() && Auth::user()->rol_user == 2){
            return redirect()->route('login.index');
        }
        else if(!Auth::check()){
            return redirect()->route('peliculas.no-login');
        }

        $categoria = Categoria::all();
        return view('administrador.peliculas.edit',compact('peliculas','categoria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PeliculasRequest $request,$id_pelicula)
    {
        if(Auth::check() && Auth::user()->rol_user == 2){
            return redirect()->route('login.index');
        }
        else if(!Auth::check()){
            return redirect()->route('login.index');
        }

        $categoria = Categoria::all();

        $datos = $request->validated();

        $peliculas = Peliculas::find($id_pelicula);

        $peliculas->nombre_pelicula = $datos['nombre_pelicula'];
        $peliculas->precio_pelicula = $datos['precio_pelicula'];
        $peliculas->descripcion_pelicula = $datos['descripcion_pelicula'];
        $peliculas->estado_pelicula = '1';
        $peliculas->estreno_pelicula = '1';
        $peliculas->categoria_pelicula = $datos['categoria_pelicula'];

        if($datos['file_pelicula']){

            $guardado = public_path().'/storage/'.$peliculas->imagen_pelicula;
            unlink($guardado);

            $filename = time().'_'.$datos['file_pelicula']->getClientOriginalName();
            $filesize = $datos['file_pelicula']->getSize();
            $datos['file_pelicula']->storeAs('public/'.$filename);

            $peliculas->path_pelicula = $filesize;
            $peliculas->imagen_pelicula = $filename;
    
        }

        $peliculas->save();

        return view('administrador.peliculas.edit',compact('peliculas','categoria'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Peliculas $peliculas): RedirectResponse
    {
        //
    }

    public function anadir_carrito($id_pelicula, Request $request){
        
        $peliculas = Peliculas::find($id_pelicula);
        $oldCart = Session::has('carrito') ? Session::get('carrito') : null;

        $carrito = new Carrito($oldCart);
        $carrito->añadir($peliculas,$id_pelicula);

        $request->session()->put('carrito',$carrito);
        return redirect()->route('peliculas.index');
    }

    public function carrito(){
        if(!Session::has('carrito')){
            return redirect()->route('peliculas.carrito_datos');
        }

        $oldCart = Session::get('carrito');
        $carrito = new Carrito($oldCart);
        
        $peliculas_carrito = $carrito->peliculas;
        $precio_carrito = $carrito->total_precio;
        return view('user.carrito.index',compact('precio_carrito','peliculas_carrito'));
    }

    public function pago(){
        if(!Session::has('carrito')){
            return redirect()->route('peliculas.carrito_datos');
        }

        $oldCart = Session::get('carrito');

        $carrito = new Carrito($oldCart);
        $total = $carrito->total_precio;
        return view('user.pago.index',compact('total'));
    }
}
