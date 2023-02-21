<!DOCTYPE html>
<html lang="esp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    
    {{-- Boostrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    {{-- Estilos --}}
    <link rel="stylesheet" href="{{ url('css/app.css') }}">

    {{-- Font Awesome --}}
    <script src="https://kit.fontawesome.com/73d7a66443.js" crossorigin="anonymous"></script>

    {{-- Estilos-Carrusel --}}
    <link rel="stylesheet" href="{{ url('css/carrusel.css') }}">
    
    @livewireScripts
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
          <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('welcome.index') }}">Pepito</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
              <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="{{ route('welcome.index') }}">Inicio</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" href="#">Estrenos</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active">Peliculas</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown">
                    Generos
                  </a>
                  <ul class="dropdown-menu">
                    @foreach ($categorias as $item)
                    <li><hr class="dropdown-divider"></li> 
                      <li><a class="dropdown-item" href="#">{{ $item->nombre_categoria }}</a></li>  
                    @endforeach
                  </ul>
                </li>
              </ul>
              {{-- Formulario de Busqueda de Productos
              <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
              </form> --}}
            </div>
            <div class="m-2">
              {{-- Si no inicio sesion --}}
              @guest
              <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-teim">
                  <a class="nav-link active" href="{{ route('login.index') }}">Iniciar Sesion/Registrarse</a>
                </li>
              </ul>
              @endguest
              @auth
                Aca va el contenido si inicio sesion
              @endauth
            </div>
          </div>
        </nav>
      </header>

      <main>
        @yield('contenido')
        @yield('footer')
      </main>
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>