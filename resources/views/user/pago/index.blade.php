@extends('navbar.index_cliente')

@section('title','Carrito de Compras')

@section('contenido')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-6">
            <h1>Pago</h1>
            <h4>El total a pagar es : S/. {{ $total }}</h4>
            <div id="charge-error" class="alert alert-danger {{ !Session::has('error') ? 'hidden' : '' }}">
                {{ Session::get('error') }}
            </div>
            <form action="{{ route('pago.create') }}" method="POST" id="formulario_pago">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" id="name" required>
                    </div>

                    <div class="col-md-6">
                        <label for="direccion">Direccion</label>
                        <input type="text" class="form-control" id="direccion" required>
                    </div>

                    <div class="col-md-6">
                        <label for="card_nombre">Nombre de la Tarjeta</label>
                        <input type="text" class="form-control" id="card_nombre" required>
                    </div>

                    <div class="col-md-6">
                        <label for="card_numero">Numero de la Tarjeta</label>
                        <input type="text" class="form-control" id="card_numero" required>
                    </div>

                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="card_expiracion_mes">Mes de Expiracion</label>
                                    <input type="text" id="card_expiracion_mes" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="card_expiracion_anio">Año de Expiracion</label>
                                    <input type="text" id="card_expiracion_anio" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="card_cvc">CVC</label>
                            <input type="text" id="card_cvc" class="form-control" required>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success mt-2">Pagar</button>
            </form>
        </div>
    </div>
</div>
@endsection