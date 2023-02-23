<?php

namespace App\Http\Controllers;

use App\Models\Peliculas;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Categoria;
use App\Http\Requests\PeliculasRequest;

class PeliculasAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('administrador.peliculas.index');
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
        return view('administrador.peliculas.show',compact('peliculas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Peliculas $peliculas): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Peliculas $peliculas): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Peliculas $peliculas): RedirectResponse
    {
        //
    }
}
