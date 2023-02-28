@extends('navbar.index_admin')

@section('title','Lista de Usuarios')

@section('contenido')
<div class="container mt-4">
    <div class="row">
      <div class="col-md-10">
        <div class="py-5">
          <h2>Listado de Usuarios</h2>
        </div>
      </div>

      <div class="col-md-2">
        <div class="py-5">
          <a href="{{ route('usuarios.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus mx-1"></i>Nuevo Usuario</a>
        </div>
      </div>
    </div>

    @livewire('usuarios-index')

    <div class="row">
        <div class="col-md-12">
          @if ($message = Session::get('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ $message }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif 
        </div>
      </div>
</div>
@endsection

@section('footer')
    <footer class="container">
        <p class="float-end"><a href="#">Regrese al inicio</a></p>
        <p>&copy; Proyecto Peliculas 2023-2023 &middot; <a href="#">Privacidad</a> &middot; <a href="#">Terminos</a></p>
    </footer>