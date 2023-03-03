<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Resumen de la Compra</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h3>{{ $titulo }}</h3>
        <p>{{ $body }}</p>
        
        <h4>Resumen de la compra</h4>
        <h4>El monto total a pagar fue S/. {{ $total_carrito }}</h4>

        <hr class="my-2">

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
                    <td scope="row">{{ $pelicula['pelicula']['id'] }}</td>
                    <td>{{ $pelicula['pelicula']['nombre_pelicula'] }}</td>
                    <td>{{ $pelicula['cantidad'] }}</td>
                    <td>{{ $pelicula['precio'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>