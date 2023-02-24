@extends('navbar.index_admin')

@section('title','Lista de Categorias')

@section('contenido')
<div class="container mt-4">
    <div class="row">
      <div class="col-md-10">
        <div class="py-5">
          <h2>Listado de Categorias</h2>
        </div>
      </div>

      <div class="col-md-2">
        <div class="py-5">
          <a href="{{ route('categorias.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus mx-1"></i>Nueva Categoria</a>
        </div>
      </div>
    </div>

    @livewire('categorias-index')
</div>
@endsection

@section('footer')
    <footer class="container">
        <p class="float-end"><a href="#">Regrese al inicio</a></p>
        <p>&copy; Proyecto Peliculas 2023-2023 &middot; <a href="#">Privacidad</a> &middot; <a href="#">Terminos</a></p>
    </footer>
@endsection