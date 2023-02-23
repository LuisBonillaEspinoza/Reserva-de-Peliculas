@csrf
<div class="row g-3">
  <div class="col-sm-6">
    <label for="name_pelicula" class="form-label">Nombre</label>
    <input type="text" class="form-control {{ $errors->has('nombre_pelicula') ? ' is-invalid' : '' }}" id="name_pelicula" placeholder="" value="{{ $errors->has('nombre_pelicula') ? '': old('nombre_pelicula') }}" name="nombre_pelicula">
    @if($errors->has('nombre_pelicula'))
      <div class="invalid-feedback">
       {{ $errors->first('nombre_pelicula') }}
      </div>
    @endif
  </div>

  <div class="col-sm-6">
    <label for="descrip_pelicula" class="form-label">Descripcion</label>
    <input type="text" class="form-control {{ $errors->has('descripcion_pelicula') ? ' is-invalid' : '' }}" id="descrip_pelicula" placeholder="" value="{{ $errors->has('descripcion_pelicula') ? '': old('descripcion_pelicula') }}" name="descripcion_pelicula">
    @if($errors->has('descripcion_pelicula'))
      <div class="invalid-feedback">
       {{ $errors->first('descripcion_pelicula') }}
      </div>
    @endif
  </div>

  <div class="col-md-6">
    <label for="pre_pelicula" class="form-label">Precio</label>
    <input type="text" class="form-control {{ $errors->has('precio_pelicula') ? ' is-invalid' : '' }}" id="pre_pelicula" value="{{ $errors->has('precio_pelicula') ? '': old('precio_pelicula') }}" name="precio_pelicula">
    @if($errors->has('precio_pelicula'))
      <div class="invalid-feedback">
       {{ $errors->first('precio_pelicula') }}
      </div>
    @endif
  </div>

  <div class="col-md-6">
    <label for="cat_pelicula" class="form-label">Categoria</label>
    <select class="form-select" id="cat_pelicula" name="categoria_pelicula">
        <option value="0">Elija una categoria</option>
        @foreach ($categorias as $cat)
            <option value="{{ $cat->id }}" @selected(old('categoria_pelicula'))>{{ $cat->nombre_categoria }}</option>
        @endforeach
      </select>
        @if($errors->has('categoria_pelicula'))
            <div class="invalid-feedback">
                {{ $errors->first('categoria_pelicula') }}
            </div>
        @endif
  </div>

  <div class="col-md-12">
    <label for="peli_file" class="form-label">Imagen</label>
    <input class="form-control {{ $errors->has('file_pelicula') ? ' is-invalid' : '' }}" type="file" id="peli_file" name="file_pelicula" value="{{ $errors->has('file_pelicula') ? '': old('file_pelicular') }}">  
    @if($errors->has('file_pelicula'))
      <div class="invalid-feedback">
        {{ $errors->first('file_pelicula') }}
      </div>
    @endif
  </div>

<div class="col-md-3">
    <a href="{{ route('peliculas.index') }}" class="btn btn-warning btn-lg" role="button"><i class="fa-solid fa-backward-step mx-2"></i>Atras</a>
</div>

<div class="col-md-6"></div>
<div class="col-md-3">
    <button class="w-100 btn btn-success btn-lg" type="submit">Registrar</button>
</div>