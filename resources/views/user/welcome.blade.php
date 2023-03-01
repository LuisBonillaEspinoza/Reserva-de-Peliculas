@extends('navbar.index_cliente')

@section('title','Inicio')

@section('contenido')
<div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      @foreach ($peliculas as $item)
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}" aria-current="true" aria-label="Slide 1"></button>
      @endforeach
      {{-- <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button> --}}
    </div>
    <div class="carousel-inner">
      @foreach ($peliculas as $item )
      <div class="carousel-item {{ $loop->first ? 'active'  : ''}}">
        <img class="bd-placeholder-img" src ="/storage/{{ $item->imagen_pelicula }}" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
        <div class="container">
          <div class="carousel-caption text-start">
            <h1>{{ $item->nombre_pelicula }}</h1>
            <p>{{ $item->descripcion_pelicula }}</p>
            <p><a class="btn btn-lg btn-primary" href="{{ route('peliculas.show',$item->id) }}">Ver Datos de la Pelicula</a></p>
          </div>
        </div>
      </div>
      @endforeach
      {{-- <div class="carousel-item">
        <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></svg>
        <div class="container">
          <div class="carousel-caption">
            <h1>Another example headline.</h1>
            <p>Some representative placeholder content for the second slide of the carousel.</p>
            <p><a class="btn btn-lg btn-primary" href="#">Learn more</a></p>
          </div>
        </div>
      </div> --}}
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>


  <!-- Marketing messaging and featurettes
  ================================================== -->
  <!-- Wrap the rest of the page in another container to center all the content. -->

  <div class="container marketing">

    <!-- Three columns of text below the carousel -->
    <div class="row">
      @foreach ($peliculas_datos as $item)
      <div class="col-lg-4">
        <img class="bd-placeholder-img rounded-circle" src ="/storage/{{ $item->imagen_pelicula }}" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title>
        <h2 class="fw-normal">{{ $item->nombre_pelicula }}</h2>
        <p>{{ $item->descripcion_pelicula }}</p>
        <p><a class="btn btn-secondary" href="{{ route('peliculas.show',$item->id) }}">Ver Detalles</a></p>
      </div><!-- /.col-lg-4 -->
      @endforeach
      {{-- <div class="col-lg-4">
        <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>
        <h2 class="fw-normal">Heading</h2>
        <p>Some representative placeholder content for the three columns of text below the carousel. This is the first column.</p>
        <p><a class="btn btn-secondary" href="#">View details &raquo;</a></p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
        <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>
        <h2 class="fw-normal">Heading</h2>
        <p>Another exciting bit of representative placeholder content. This time, we've moved on to the second column.</p>
        <p><a class="btn btn-secondary" href="#">View details &raquo;</a></p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
        <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>
        <h2 class="fw-normal">Heading</h2>
        <p>And lastly this, the third column of representative placeholder content.</p>
        <p><a class="btn btn-secondary" href="#">View details &raquo;</a></p>
      </div><!-- /.col-lg-4 --> --}}
    </div><!-- /.row -->


    <!-- START THE FEATURETTES -->

    <hr class="featurette-divider">

      @foreach ($peliculas_datos as $item)
      <div class="row featurette">
        <div class="col-md-7 {{ $loop->index%2 != 0  ? 'order-md-2' : '' }}">
          <h2 class="featurette-heading fw-normal lh-1">Disfruten la nueva pelicula <span class="text-muted">{{ $item->nombre_pelicula }}</span></h2>
          <p class="lead">{{ $item->descripcion_pelicula }}</p>
        </div>
        <div class="col-md-5 {{ $loop->index%2 != 0 ? 'order-md-1' : '' }}">
          <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" src ="/storage/{{ $item->imagen_pelicula }}" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false">
        </div>
      </div>
    <hr class="featurette-divider">
      @endforeach
    {{-- <div class="row featurette">
      <div class="col-md-7 order-md-2">
        <h2 class="featurette-heading fw-normal lh-1">Oh yeah, it’s that good. <span class="text-muted">See for yourself.</span></h2>
        <p class="lead">Another featurette? Of course. More placeholder content here to give you an idea of how this layout would work with some actual real-world content in place.</p>
      </div>
      <div class="col-md-5 order-md-1">
        <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"/><text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text></svg>
      </div>
    </div>--}}

  </div><!-- /.container -->

    @section('footer')
    <footer class="container">
        <p class="float-end"><a href="#">Regrese al inicio</a></p>
        <p>&copy; Proyecto Peliculas 2023-2023 &middot; <a href="#">Privacidad</a> &middot; <a href="#">Terminos</a></p>
    </footer>
    @endsection
@endsection