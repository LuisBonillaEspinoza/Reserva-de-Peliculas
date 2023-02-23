<div>
    <div class="row">
        <div class="col-md-12">
            <label for="buscar_pelicula" class="form-label">Ingrese el Nombre de la Pelicula</label>
            <input type="text" name="" id="buscar_pelicula" placeholder="Buscar" class="form-control" wire:model="busqueda">
        </div>
    </div>

    <table class="table table-striped mt-4 table-bordered mb-0">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Precio</th>
            <th scope="col">Categoria</th>
            <th scope="col">Estreno</th>
            <th scope="col">Poster</th>
            <th scope="col" class="text-center opciones">Acciones</th>
        </tr>
        </thead>
        <tbody class="table-group-divider">
            {{-- <th scope="row">1</th> --}}
            @if ($cantidad == 0)
                <td colspan="8" class="text-center">No existen registros</td>
            @endif
            @foreach ($peliculas as $peli)
            <tr>
                <th scope="row">{{ $peli->id }}</th>
                <td>{{ $peli->nombre_pelicula }}</td>
                <td>{{ $peli->descripcion_pelicula }}</td>
                <td>{{ $peli->precio_pelicula }}</td>
                <td>{{ $peli->categoria->nombre_categoria }}</td>
                <td>{{ $peli->estreno() }}</td>
                <td><img src='storage/{{ $peli->imagen_pelicula }}' name="{{$peli->imagen_pelicula}}" style="width:90px;height:90px;"></td>
                <td class="text-center">
                    <div class="btn-group" role="group" aria-label="Basic outlined example">
                        <a href="{{ route('peliculas.show',$peli->id) }}" class="btn btn-outline-primary">Ver Pelicula</a>
                        <a href="" class="btn btn-outline-primary">Modificar Pelicula</a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <hr>
    {{ $peliculas->links() }}
</div>