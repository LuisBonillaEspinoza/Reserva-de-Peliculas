@extends('navbar.index_admin')

@section('title','Inicio')
 
@section('contenido')
<div class="container mt-4">
    <div class="row">
      <div class="col-md-10">
        <div class="py-5">
          <h2>Listado de Sesiones</h2>
        </div>
      </div>
    </div>

    <table class="table">
        <thead>
          <tr>
            <th scope="col">Usuario</th>
            <th scope="col">Agente</th>
            <th scope="col">IP</th>
            <th scope="col">Ultima Actividad</th>
          </tr>
        </thead>
        <tbody>
            @foreach($sessions as $session)
            <tr>
                <td>{{ $session->user_id }}</td>
                <td>{{ $session->user_agent }}</td>
                <td>{{ $session->ip_address }}</td>
                <td>{{ \Carbon\Carbon::createFromTimeStamp($session->last_activity)->diffForhumans() }}</td>
            </tr>
            @endforeach
        </tbody>
      </table>
</div>
@endsection
 