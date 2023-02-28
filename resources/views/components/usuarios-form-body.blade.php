@csrf
<div class="row g-3">
  <div class="col-sm-6">
    <label for="firstName" class="form-label">Nombre</label>
    <input type="text" class="form-control {{ $errors->has('name_user') ? ' is-invalid' : '' }}" id="firstName" placeholder="" value="{{ $errors->has('name_user') ? '': old('name_user',$usuarios->name_user) }}" name="name_user">
    @if($errors->has('name_user'))
      <div class="invalid-feedback">
       {{ $errors->first('name_user') }}
      </div>
    @endif
  </div>

  <div class="col-sm-6">
    <label for="apema" class="form-label">Apellido Materno</label>
    <input type="text" class="form-control {{ $errors->has('apema_user') ? ' is-invalid' : '' }}" id="apema" placeholder="" value="{{ $errors->has('apema_user') ? '': old('apema_user',$usuarios->apema_user) }}" name="apema_user">
    @if($errors->has('apema_user'))
      <div class="invalid-feedback">
       {{ $errors->first('apema_user') }}
      </div>
    @endif
  </div>

  <div class="col-md-6">
    <label for="apepa" class="form-label">Apellido Paterno</label>
    <input type="text" class="form-control {{ $errors->has('apepa_user') ? ' is-invalid' : '' }}" id="apepa" value="{{ $errors->has('apepa_user') ? '': old('apepa_user',$usuarios->apepa_user) }}" name="apepa_user">
    @if($errors->has('apepa_user'))
      <div class="invalid-feedback">
       {{ $errors->first('apepa_user') }}
      </div>
    @endif
  </div>

  <div class="col-md-6">
    <label for="telefono" class="form-label">Telefono</label>
    <input type="text" class="form-control {{ $errors->has('telefono_user') ? ' is-invalid' : '' }}" id="telefono" placeholder="" name="telefono_user" value="{{ $errors->has('telefono_user') ? '': old('telefono_user',$usuarios->telefono_user) }}">
    @if($errors->has('telefono_user'))
      <div class="invalid-feedback">
       {{ $errors->first('telefono_user') }}
      </div>
    @endif
  </div>

  <div class="col-md-6">
    <label for="email" class="form-label">Correo Electronico</label>
    <input type="email" class="form-control {{ $errors->has('email_user') ? ' is-invalid' : '' }}" id="email" placeholder="you@example.com" name="email_user" value="{{ $errors->has('email_user') ? '': old('email_user',$usuarios->email_user) }}">
    @if($errors->has('email_user'))
      <div class="invalid-feedback">
       {{ $errors->first('email_user') }}
      </div>
    @endif
  </div>

  <div class="col-md-6">
    <label for="direccion" class="form-label">Direccion</label>
    <input type="text" class="form-control {{ $errors->has('direccion_user') ? ' is-invalid' : '' }}" id="direccion" placeholder="" name="direccion_user" value="{{ $errors->has('direccion_user') ? '': old('direccion_user',$usuarios->direccion_user) }}">
    @if($errors->has('direccion_user'))
      <div class="invalid-feedback">
       {{ $errors->first('direccion_user') }}
      </div>
    @endif
  </div>

<hr class="my-4">

<h4 class="mb-3">Datos del Usuario</h4>

<div class="col-md-6">
    <label for="username" class="form-label">Username</label>
    <input type="text" class="form-control {{ $errors->has('username_user') ? ' is-invalid' : '' }}" id="username" placeholder="" name="username_user" value="{{ $errors->has('username_user') ? '': old('username_user',$usuarios->username_user) }}">
    @if($errors->has('username_user'))
      <div class="invalid-feedback">
     {{ $errors->first('username_user') }}
      </div>
   @endif
</div>

<div class="col-md-6">
    <label for="password" class="form-label">Contraseña</label>
    <input type="password" class="form-control {{ $errors->has('password_user') ? ' is-invalid' : '' }}" id="password" placeholder="" name="password_user">
    @if($errors->has('password_user'))
      <div class="invalid-feedback">
    {{ $errors->first('password_user') }}
      </div>
 @endif
</div>

<div class="col-md-6">
    <label for="rol_usuario" class="form-label">Rol</label>
    <select class="form-select {{ $errors->has('rol_usuario') ? ' is-invalid' : '' }}" id="rol_usuario" name="rol_usuario">
        <option value="0">Elija un Rol</option>
        @foreach ($rol as $item)
            <option value="{{ $item->id }}" @selected(old('rol_usuario',$usuarios->rol_user) == $item->id)>{{ $item->nombre_rol }}</option>
        @endforeach
      </select>
        @if($errors->has('rol_usuario'))
            <div class="invalid-feedback">
                {{ $errors->first('rol_usuario') }}
            </div>
        @endif
  </div>
  
  <div class="col-md-12">

  </div>
  
  <div class="col-md-3">
      <a href="{{ route('usuarios.index') }}" class="btn btn-warning btn-lg" role="button"><i class="fa-solid fa-backward-step mx-2"></i>Atras</a>
  </div>

  <div class="col-md-6"></div>
  <div class="col-md-3">
      <button class="w-100 btn btn-success btn-lg" type="submit">Continuar</button>
  </div>