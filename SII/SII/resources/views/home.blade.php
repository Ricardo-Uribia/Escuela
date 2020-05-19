@extends('layouts.admin')

@section('principal')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <center>
                <h4 class="card-header">
                    Bienvenido al sistema {{Auth::user()->name }}
                </h4>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    Has Iniciado Sesión!
                </div>
            </center>
        </div>
        <div class="col-md-12">
            <hr  class="hr-1">
        </div>
    </div>
</div>


 <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="content">
                            <center>
                                @if(empty($usuario->empleados[0]->foto))
                                    <h3 id="msg" class="alert alert-success">Foto de Perfil</h3>
                                <img style="width: 50%; height: 50%" src="" width="100%"/>
                                @else
                                <h3 id="msg" class="alert alert-success">Foto de Perfil</h3>
                                <img style="width: 50%; height: 50%" src="{{asset('/img')}}/{{$usuario->empleados[0]->foto}}" width="100%"/>
                                @endif
                            </center>
                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="card">
                        <div class="content">
                            
                            <input type="hidden" value="" id="id"/>
                            <input type="hidden" value="{{csrf_token()}}" id="token"/>
                            <label>Nombre de Usuario</label>
                            <input type="text" id="pro_name" value="{{$usuario->name .' '. $usuario->empleados[0]->txtPaterno .' '. $usuario->empleados[0]->txtMaterno}}" class="form-control" disabled />
                            <br>

                            <label>Correo Electronico</label>
                            <input type="text" id="pro_code" value="{{$usuario->email}}" class="form-control" disabled />
                            <br>

                            <label>Domicilio</label>
                            <input type="text" id="pro_price" value="{{$usuario->empleados[0]->domicilio}}" class="form-control" disabled />
                            <br>

                            <label>Departamento</label>
                            <input type="text" name="" value="{{$usuario->empleados[0]->departamento}}" class="form-control" disabled>
                            <br>

                            <!--<a href="" data-target="#modal-change-perfil-{{$usuario->id}}" data-toggle="modal"><button class="btn btn-success btn-fill">Cambiar Información de Perfil</button></a>
                            @include('modalChangePerfil')-->
                            @if($usuario->role == '1' )
                            @if($usuario->empleados[0]->tipo == '2')
                            <a href="{{url('/')}}/edit/profesor/{{$usuario->empleados[0]->id}}"><button class="btn btn-success btn-fill">Cambiar Información de Empleado</button></a>
                            @else
                            <a href="{{url('/')}}/edit/empleado/{{$usuario->empleados[0]->id}}"><button class="btn btn-success btn-fill">Cambiar Información de Empleado</button></a>
                            @endif
                            
                            
                            <a href="{{url('/')}}/Administrar/Usuarios"><button class="btn btn-success btn-fill">Administrar Usuarios</button></a>
                            @endif
                            <div class="footer">
                                <p>Sistema Integral de Información de la Universidad Tecnológica del Poniente</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<style type="text/css">       
   hr.hr-1{
    border-bottom: 2px solid #9E122F;
    width: 100%;
    }
</style>

      
@endsection
