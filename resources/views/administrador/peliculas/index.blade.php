@extends('navbar.index_admin')

@section('title','Lista de Peliculas')

@section('contenido')
<div class="container mt-4">
    <div class="row">
      <div class="col-md-10">
        <div class="py-5">
          <h2>Listado de Peliculas</h2>
        </div>
      </div>
{{-- FALTA AGREGAR EL BUSCAR, Y ESTE SE PONE EN EL LIVEWIRE --}}
      <div class="col-md-2">
        <div class="py-5">
          <a href="{{ route('peliculas.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus mx-1"></i>Nueva Pelicula</a>
        </div>
      </div>
    </div>

    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nombre</th>
          <th scope="col">Descripcion</th>
          <th scope="col">Precio</th>
          <th scope="col">Categoria</th>
          <th scope="col">Estreno</th>
          <th scope="col">Poster</th>
          <th scope="col">Acciones</th>
        </tr>
      </thead>
        <tbody class="table-group-divider">
            {{-- <th scope="row">1</th> --}}
            @if ($cantidad == 0)
                <td colspan="8" class="text-center">No existen registros</td>
            @endif
            @foreach ($peliculas as $peli)
            <tr>
              <th scope="row">{{ $peli->id }}</th>
              <td>{{ $peli->nombre_pelicula }}</td>
              <td>{{ $peli->descripcion_pelicula }}</td>
              <td>{{ $peli->precio_pelicula }}</td>
              <td>{{ $peli->categoria->nombre_categoria }}</td>
              <td>{{ $peli->estreno() }}</td>
              <td><img src='storage/{{ $peli->imagen_pelicula }}' name="{{$peli->imagen_pelicula}}" style="width:90px;height:90px;"></td>
            </tr>
            @endforeach
        </tbody>
          </table>
</div>
@endsection

@section('footer')
    <footer class="container">
        <p class="float-end"><a href="#">Regrese al inicio</a></p>
        <p>&copy; Proyecto Peliculas 2023-2023 &middot; <a href="#">Privacidad</a> &middot; <a href="#">Terminos</a></p>
    </footer>
@endsection