@extends('navbar.index_admin')

@section('title','Nueva Pelicula')

@section('contenido')
<div class="container">
    <div class="py-5 text-center">
        <h2>Registrar Pelicula</h2>
        <p class="lead">Por favor rellene los siguientes campos</p>
      </div>
  
      <div class="row g-5">
        <div class="col-md-12 col-lg-12">
          <h4 class="mb-3">Datos de la Pelicula</h4>
          <form method="POST" action="{{ route('peliculas.store') }}" enctype="multipart/form-data">
            <x-peliculas-form-body :categorias="$categoria"/>
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