@extends('layouts.admin')
@section('contenido')
@if(Session::has('success'))
    <div class="small-box bg-success">
        <div class="card-header">
            <center><p>{{Session::get('success')}}</p></center>
        </div>
    </div>
@endif
@if(Session::has('error'))
    <div class="small-box bg-danger">
        <div class="card-header">
            <center><p>{{Session::get('error')}}</p></center>
        </div>
    </div>
@endif
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        @if($usuarioEmpleado->foto != "")
                        <img src="{{asset('CODE_DATA/public/storage/'.$usuarioEmpleado->foto)}}" class="profile-user-img img-fluid img-circle" alt="Foto de empleado" width="150px" height="150px">
                        @else
                        <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="profile-user-img img-fluid img-circle" alt="Foto de empleado">
                        <h6>Se recomienda subir una foto...</h6> 
                        @endif
                    </div>
                    <h3 class="profile-username text-center">{{$usuario->name}}</h3>
                   <p class="text-muted text-center">{{$usuarioEmpleado->cargo}}</p> 
                </div>
            </div>
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Sobre mi</h3>
                </div>
                <div class="card-body">
                    <strong><i class="fa fa-book mr-1"></i>Nivel de Estudios</strong>
                    <p class="text-muted">{{$usuarioEmpleado->nivel_estudios}}</p>
                    <hr>
                    <strong><i class="fa fa-map-marker mr-1"></i>Domicilio</strong>
                    <p class="text-muted">{{$usuarioEmpleado->domicilio}}</p>
                    <hr>
                    <strong><i class="fa fa-file mr-1"></i>Notas</strong>
                    <p class="text-muted">{{$usuarioEmpleado->notas_descripcion}}</p>
                </div>
            </div>
        </div>  
        <div class="col-md-9">
            <div class="card">
                <div class="card-header p-2">
                    <a href="{{url('/admin/administrar/usuario')}}" class="btn-neutral btn-secondary float-right">ADMINISTRAR USUARIOS</a>
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#activity">Empleado</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#settings">Editar Perfil</a></li>
                    </ul>

                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="activity">
                            <div class="timeline timeline-inverse">
                                <div>
                                <div class="timeline-item">
                                    <h3 class="timeline-header border-0">Nombre: {{$usuarioEmpleado->nombres ." ".$usuarioEmpleado->paterno." ". $usuarioEmpleado->materno}}</h3>
                                </div>
                                </div>
                                <div>
                                <div class="timeline-item">
                                    <h3 class="timeline-header border-0">Fecha Nacimiento: {{$usuarioEmpleado->fecha_nacimiento}}</h3>
                                </div>
                                </div>
                                <div>
                                <div class="timeline-item">
                                    <h3 class="timeline-header border-0">Numero de Empleado: {{$usuarioEmpleado->num_empleado}}</h3>
                                </div>
                                </div>
                                <div>
                                <div class="timeline-item">
                                    <h3 class="timeline-header border-0">Fecha de ingreso: {{$usuarioEmpleado->fecha_ingreso}}</h3>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane " id="settings">
                            <form class="form-horizontal" action="{{url('/admin/edit_profile/')}}" method="post" id="registrationForm">
                                @csrf
                                <input type="hidden" name="empleado_id" value="{{$usuarioEmpleado->id}}"> 
                                <input type="hidden" name="user_id" value="{{$usuarioEmpleado->user_id}}"> 
                                <div class="form-group row">
                                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10 was-validated">
                                        <input type="email" name="email" class="form-control edit_perfil" required id="email" value="{{$usuarioEmpleado->email}}" readonly>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                          <strong style="color: red;">{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label for="password" class="col-sm-2 col-form-label">Contraseña</label>
                                    <div class="col-sm-10 was-validated">
                                        <input type="password" required name="password" class="form-control edit_perfil" id="password" placeholder="*******" readonly/>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                          <strong style="color: red;">{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password" class="col-sm-2 col-form-label">Confirmar contraseña</label>
                                    <div class="col-sm-10 was-validated">
                                         <input placeholder="Confirmar contraseña" id="password-confirm" required type="password" class="form-control edit_perfil" name="password_confirmation" required readonly autocomplete="new-password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                          <strong style="color: red;">{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row" >
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" hidden class="btn btn-success" id="btnAceptar">Aceptar</button>
                                        <input class="btn btn-danger" id="habilitarCampos" type="button" value="Editar Perfil">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



  <div class="col-sm-10">
        <div class="panel-body">
    @if(Session::has('mensaje'))
      <div class="alert alert-success">
        {{Session::get('mensaje')}}
      </div>
    @endif
  </div>
    </div> 

@section('scripts')
<script>
    const btnHabilitar = document.getElementById('habilitarCampos');
    const habilitarInput = document.getElementsByClassName('edit_perfil');
    const btnAceptar = document.getElementById('btnAceptar');
    const checkboxAcep = document.getElementById('checkboxAcep');

    btnHabilitar.addEventListener("click", function(evt) {
        for (var i = 0; i < habilitarInput.length; i++) {
            if (habilitarInput[i].hasAttribute('readonly')) {
                habilitarInput[i].removeAttribute('readonly')
                btnHabilitar.setAttribute('value','Cancelar') 
                btnAceptar.removeAttribute('hidden')   
            }else{
                habilitarInput[i].setAttribute('readonly', 'readonly')
                btnHabilitar.setAttribute('value','Editar Perfil')  
                btnAceptar.setAttribute('hidden', 'hidden') 
            }
        } 
    });
</script>
@endsection
@endsection
