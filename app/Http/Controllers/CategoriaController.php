<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Peliculas;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
//Para validar
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CategoriasRequest;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Categoria::all();
        $peliculas = Peliculas::where('estreno_pelicula','1')->orderBy('id')->get();
        $peliculas_datos = Peliculas::where('estreno_pelicula','1')->orderBy('id')->take(3)->get();
        if(Auth::user()->rol_user == 1){
            return view('administrador.admin');
        }
        return view('user.welcome')->with('categorias',$categorias)->with('peliculas',$peliculas)->with('peliculas_datos',$peliculas_datos);
    }

    public function index_2(){
        return view('administrador.categoria.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('administrador.categoria.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoriasRequest $request)
    {
        $datos = $request->validated();
        
        $categorias = new Categoria;
        $categorias->nombre_categoria = $datos['nombre_categoria'];

        $categorias->save();

        return redirect()->route('categorias.create')->with('success','Categoria Registrada Correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Categoria $categoria): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categoria $categorias)
    {
        return view('administrador.categoria.edit',compact('categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoriasRequest $request, $id_categoria)
    {
        $datos = $request->validated();

        $categorias = Categoria::find($id_categoria);

        $categorias->nombre_categoria = $datos['nombre_categoria'];

        $categorias->save();

        return redirect()->route('categorias.edit',compact('categorias'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categoria $categoria): RedirectResponse
    {
        //
    }
}
