@csrf
<div class="row g-3">
  <div class="col-sm-12">
    <label for="name_categoria" class="form-label">Nombre</label>
    <input type="text" class="form-control {{ $errors->has('nombre_categoria') ? ' is-invalid' : '' }}" id="name_categoria" placeholder="" value="{{ $errors->has('nombre_categoria') ? '': old('nombre_categoria',$categorias->nombre_categoria) }}" name="nombre_categoria">
    @if($errors->has('nombre_categoria'))
      <div class="invalid-feedback">
       {{ $errors->first('nombre_categoria') }}
      </div>
    @endif
  </div>

<div class="col-md-3">
    <a href="{{ route('categorias.index') }}" class="btn btn-warning btn-lg" role="button"><i class="fa-solid fa-backward-step mx-2"></i>Atras</a>
</div>

<div class="col-md-6"></div>
<div class="col-md-3">
    <button class="w-100 btn btn-success btn-lg" type="submit">Guardar</button>
</div>