<div>
    <div class="row">
        <div class="col-md-12">
            <label for="buscar_pelicula" class="form-label">Ingrese el Nombre de la Categoria</label>
            <input type="text" name="" id="buscar_pelicula" placeholder="Buscar" class="form-control" wire:model="busqueda">
        </div>
    </div>

    <table class="table table-striped mt-4 table-bordered mb-0">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col" class="text-center opciones">Acciones</th>
        </tr>
        </thead>
        <tbody class="table-group-divider">
            {{-- <th scope="row">1</th> --}}
            @if ($cantidad == 0)
                <td colspan="3" class="text-center">No existen registros</td>
            @endif
            @foreach ($categorias as $cate)
            <tr>
                <th scope="row">{{ $cate->id }}</th>
                <td>{{ $cate->nombre_categoria }}</td>
                <td class="text-center">
                    <div class="btn-group" role="group" aria-label="Basic outlined example">
                        <a href="{{ route('categorias.edit',$cate->id) }}" class="btn btn-outline-primary">Modificar Categoria</a>
                        {{-- <a href="{{ route() }}"class="btnbtn-outline-primary">EliminarCategoria</a> --}}
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <hr>
    {{ $categorias->links() }}
</div>