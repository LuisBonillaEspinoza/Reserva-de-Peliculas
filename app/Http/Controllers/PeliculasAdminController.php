<?php

namespace App\Http\Controllers;

use App\Models\Peliculas;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Categoria;
use App\Http\Requests\PeliculasRequest;
//Para validar
use Illuminate\Support\Facades\Auth;

class PeliculasAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::user()->rol_user == 1){
            return view('administrador.peliculas.index');
        }
        return view('user.peliculas.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
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
        if(Auth::user()->rol_user == 1){
            return view('administrador.peliculas.show',compact('peliculas'));
        }
        return view('user.peliculas.show',compact('peliculas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Peliculas $peliculas)
    {
        $categoria = Categoria::all();
        return view('administrador.peliculas.edit',compact('peliculas','categoria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PeliculasRequest $request,$id_pelicula)
    {
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
}
