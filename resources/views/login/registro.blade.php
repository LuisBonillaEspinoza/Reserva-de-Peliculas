<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro</title>

    {{-- Font Awesome --}}
    <script src="https://kit.fontawesome.com/73d7a66443.js" crossorigin="anonymous"></script>

    {{-- Boostrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    {{-- Estilos --}}
    <link rel="stylesheet" href="{{ url('css/registro.css') }}">

</head>
<body class="bg-light">
    <div class="container">
        <main>
          <div class="py-5 text-center">
            <img class="d-block mx-auto mb-4" src="{{ url('imagenes/registro.png') }}" alt="" width="100" height="100">
            <h2>Registro</h2>
            <p class="lead">Por favor rellene los siguientes campos</p>
          </div>
      
          <div class="row g-5">
            <div class="col-md-12 col-lg-12">
              <h4 class="mb-3">Datos de la Persona</h4>
              <form method="POST" action="{{ route('registro.store') }}">
                @csrf
                <div class="row g-3">
                  <div class="col-sm-6">
                    <label for="firstName" class="form-label">Nombre</label>
                    <input type="text" class="form-control {{ $errors->has('name_user') ? ' is-invalid' : '' }}" id="firstName" placeholder="" value="{{ $errors->has('name_user') ? '': old('name_user') }}" name="name_user">
                    @if($errors->has('name_user'))
                      <div class="invalid-feedback">
                       {{ $errors->first('name_user') }}
                      </div>
                    @endif
                  </div>
      
                  <div class="col-sm-6">
                    <label for="apema" class="form-label">Apellido Materno</label>
                    <input type="text" class="form-control {{ $errors->has('apema_user') ? ' is-invalid' : '' }}" id="apema" placeholder="" value="{{ $errors->has('apema_user') ? '': old('apema_user') }}" name="apema_user">
                    @if($errors->has('apema_user'))
                      <div class="invalid-feedback">
                       {{ $errors->first('apema_user') }}
                      </div>
                    @endif
                  </div>
        
                  <div class="col-md-6">
                    <label for="apepa" class="form-label">Apellido Paterno</label>
                    <input type="text" class="form-control {{ $errors->has('apepa_user') ? ' is-invalid' : '' }}" id="apepa" value="{{ $errors->has('apepa_user') ? '': old('apepa_user') }}" name="apepa_user">
                    @if($errors->has('apepa_user'))
                      <div class="invalid-feedback">
                       {{ $errors->first('apepa_user') }}
                      </div>
                    @endif
                  </div>

                  <div class="col-md-6">
                    <label for="telefono" class="form-label">Telefono</label>
                    <input type="text" class="form-control {{ $errors->has('telefono_user') ? ' is-invalid' : '' }}" id="telefono" placeholder="" name="telefono_user" value="{{ $errors->has('telefono_user') ? '': old('telefono_user') }}">
                    @if($errors->has('telefono_user'))
                      <div class="invalid-feedback">
                       {{ $errors->first('telefono_user') }}
                      </div>
                    @endif
                  </div>

                  <div class="col-md-6">
                    <label for="email" class="form-label">Correo Electronico</label>
                    <input type="email" class="form-control {{ $errors->has('email_user') ? ' is-invalid' : '' }}" id="email" placeholder="you@example.com" name="email_user" value="{{ $errors->has('email_user') ? '': old('email_user') }}">
                    @if($errors->has('email_user'))
                      <div class="invalid-feedback">
                       {{ $errors->first('email_user') }}
                      </div>
                    @endif
                  </div>

                  <div class="col-md-6">
                    <label for="direccion" class="form-label">Direccion</label>
                    <input type="text" class="form-control {{ $errors->has('direccion_user') ? ' is-invalid' : '' }}" id="direccion" placeholder="" name="direccion_user" value="{{ $errors->has('direccion_user') ? '': old('direccion_user') }}">
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
                    <input type="text" class="form-control {{ $errors->has('username_user') ? ' is-invalid' : '' }}" id="username" placeholder="" name="username_user" value="{{ $errors->has('username_user') ? '': old('username_user') }}">
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

                <div class="col-md-12">
                  @if ($message = Session::get('success'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ $message }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                  @endif 
                </div>
                
                <div class="col-md-3">
                    <a href="{{ route('login.index') }}" class="btn btn-warning btn-lg" role="button"><i class="fa-solid fa-backward-step mx-2"></i>Atras</a>
                </div>

                <div class="col-md-6"></div>
                <div class="col-md-3">
                    <button class="w-100 btn btn-success btn-lg" type="submit">Continuar</button>
                </div>
              </form>
            </div>
          </div>
        </main>
        <div class="m-2">

        </div>
      </div>
</body>
</html>