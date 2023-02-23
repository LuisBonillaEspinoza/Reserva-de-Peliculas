@extends('navbar.index_admin')

@section('title','Modificar Pelicula')

@section('contenido')
<div class="container">
    <div class="py-5 text-center">
        <h2>Modificar Pelicula</h2>
        <p class="lead">Si desea modificar, rellene los siguientes datos</p>
      </div>
  
      <div class="row g-5">
        <div class="col-md-12 col-lg-12">
          <h4 class="mb-3">Datos de la Pelicula</h4>
          <form method="POST" action="{{ route('peliculas.update',$peliculas) }}" enctype="multipart/form-data">
            @method('put')
            <x-peliculas-form-body :peliculas="$peliculas" :categorias="$categoria"/>
          </form>
        </div>
      </div>
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