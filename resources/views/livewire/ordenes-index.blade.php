<div>
    <table class="table table-striped mt-4 table-bordered mb-0">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Producto</th>
            <th scope="col">Precio</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Precio Bruto</th>
        </tr>
        </thead>
        <tbody class="table-group-divider">
            {{-- <th scope="row">1</th> --}}
            @if ($cantidad == 0)
                <td colspan="8" class="text-center">No existen registros</td>
            @endif
            @foreach ($ordenes as $order)
            <tr>
                <th scope="row">{{ $order->id_pelicula }}</th>
                <td>{{ $order->nombre_detalle }}</td>
                <td>{{ $order->precio_detalle }}</td>
                <td>{{ $order->cantidad_detalle }}</td>
                <td>{{ $order->bruto_detalle }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <hr>
    {{ $ordenes->links() }}
</div>