<div>
    <div class="row">
        <div class="col-md-12">
            <label for="buscar_pelicula" class="form-label">Ingrese el Nombre de Usuario</label>
            <input type="text" name="" id="buscar_pelicula" placeholder="Buscar" class="form-control" wire:model="busqueda">
        </div>
    </div>

    <table class="table table-striped mt-4 table-bordered mb-0">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido Materno</th>
            <th scope="col">Apellido Paterno</th>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col">Rol</th>
            <th scope="col">Estado</th>
            <th scope="col" class="text-center opciones">Acciones</th>
        </tr>
        </thead>
        <tbody class="table-group-divider">
            {{-- <th scope="row">1</th> --}}
            @if ($cantidad == 0)
                <td colspan="3" class="text-center">No existen registros</td>
            @endif
            @foreach ($usuarios as $user)
            <tr>
                <th scope="row">{{ $user->id }}</th>
                <td>{{ $user->name_user }}</td>
                <td>{{ $user->apema_user }}</td>
                <td>{{ $user->apepa_user }}</td>
                <td>{{ $user->username_user }}</td>
                <td>{{ $user->email_user }}</td>
                <td>{{ $user->roles->nombre_rol }}</td>
                <td>
                    <form action="{{ route('usuarios.estado',$user) }}" method="POST">
                        @method('put')
                        @csrf
                        <button type="submit" class="btn {{ $user->estado_user==1 ? 'btn-primary' : 'btn-warning' }}">{{ $user->estados->nombre_estado }}</button>
                    </form>
                </td>
                <td class="text-center">
                    <div class="btn-group" role="group" aria-label="Basic outlined example">
                        <a href="{{ route('usuarios.edit',$user->id) }}" class="btn btn-outline-primary">Modificar Usuario</a>
                        {{-- <a href="{{ route() }}"class="btnbtn-outline-primary">EliminarCategoria</a> --}}
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <hr>
    {{ $usuarios->links() }}
</div>