@extends('navbar.index_admin')

@section('title','Nueva Categoria')

@section('contenido')
<div class="container">
    <div class="py-5 text-center">
        <h2>Registrar Categoria</h2>
        <p class="lead">Por favor rellene los siguientes campos</p>
      </div>
  
      <div class="row g-5">
        <div class="col-md-12 col-lg-12">
          <h4 class="mb-3">Datos de la Categoria</h4>
          <form method="POST" action="{{ route('categorias.store') }}">
            <x-categorias-form-body/>
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