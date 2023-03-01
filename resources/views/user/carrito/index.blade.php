@extends('navbar.index_cliente')

@section('title','Carrito de Compras')

@section('contenido')
<div class="container mt-4">
    <div class="row">
      <div class="col-md-10">
        <div class="py-5">
          <h2>Carrito de Compras</h2>
        </div>
      </div>

    </div>

    <div class="row">
        @if (Session::has('carrito'))
        <table class="table table-striped mt-4 table-bordered mb-0">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Precio</th>
            </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($peliculas_carrito as $pelicula)
                <tr>
                    <th scope="row">{{ $pelicula['pelicula']['id'] }}</th>
                    <th>{{ $pelicula['pelicula']['nombre_pelicula'] }}</th>
                    <th>{{ $pelicula['cantidad'] }}</th>
                    <th>{{ $pelicula['precio'] }}</th>
                </tr>
                @endforeach
            </tbody>
        </table>
        <hr class="mt-3">
    </div>

        <div class="row">
            <div class="col-md-1">
                <h4>Total :</h4>
            </div>
            <div class="col-md-6">
                <h4>{{ $precio_carrito }}</h4>
            </div>
            <div class="col-md-4">
                <button class="w-100 btn btn-success btn-lg" type="submit">Pagar</button>
            </div>
        </div>

        @else
        <div class="col-md-12">
            <h1>No Hay Peliculas Registradas</h1>
        </div>
        @endif
        <div class="m-3"></div>
</div>
@endsection

@section('footer')
    <footer class="container">
        <p class="float-end"><a href="#">Regrese al inicio</a></p>
        <p>&copy; Proyecto Peliculas 2023-2023 &middot; <a href="#">Privacidad</a> &middot; <a href="#">Terminos</a></p>
    </footer>
@endsection