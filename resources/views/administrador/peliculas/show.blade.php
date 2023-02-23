@extends('navbar.index_admin')

@section('title','Datos de la Pelicula')

@section('contenido')
<div class="container mt-4">
    <div class="row">
      <div class="col-md-10">
        <div class="py-5">
          <h2>Datos de la Pelicula</h2>
        </div>
      </div>

      <div class="col-md-3">
        <h4>Nombre : </h4>
        <h4>Descripcion : </h4>
        <h4>Precio : </h4>
        <h4>Categoria : </h4>
        <h4>Estreno : </h4>
      </div>
      <div class="col-md-5">
        <h4><strong>{{ $peliculas->nombre_pelicula }}</strong></h4>
        <h4><strong>{{ $peliculas->descripcion_pelicula }}</strong></h4>
        <h4><strong>{{ $peliculas->precio_pelicula }}</strong></h4>
        <h4><strong>{{ $peliculas->categoria->nombre_categoria }}</strong></h4>
        <h4><strong>{{ $peliculas->estreno() }}</strong></h4>
      </div>

      <div class="col-md-4 m-3">
        <a href="{{ route('peliculas.index') }}" class="btn btn-warning btn-lg" role="button"><i class="fa-solid fa-backward-step mx-2"></i>Atras</a>
    </div>
    </div>
</div>
@endsection

@section('footer')
    <footer class="container">
        <p>&copy; Proyecto Peliculas 2023-2023 &middot; <a href="#">Privacidad</a> &middot; <a href="#">Terminos</a></p>
    </footer>
@endsection