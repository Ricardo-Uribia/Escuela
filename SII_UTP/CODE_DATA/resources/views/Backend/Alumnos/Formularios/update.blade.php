@extends('layouts.admin')
@section('contenido')
<div class="row">       
    <div class="col-md-12">                
        @if(Session::has('error'))
            <div class="alert alert-danger alert-dismissible" role="alert">
                <p class="text-center">{{Session::get('error')}}</p>
            </div>       
        @endif
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading text-center">
               <h4>Actualizar {{$tipo}} del alumno</h4>                  
            </div>
        </div>
    </div> 
</div>
<br>
@if(isset($contadores))
    {{-- No paso las validacinoes // no muestra formulario --}}
    <div class="tab-content">
        <div class="row">          
            <div class="col-md-12">
                <h4> 
                    Para poder crear un alumno debe primero seleccionar un 
                    <span class="text-danger">Ciclo.</span>
                    <br>
                    Luego debe asegurarse de que existan los datos suficientes o existan para registrar un alumno ya que estos son requeridos:
                    <br>
                    <span class="text-danger">
                        (cfgstatus= {{$contadores[0]}},
                         nivel= {{$contadores[1]}}, 
                         estados= {{$contadores[2]}}, 
                         escolaridades = {{$contadores[3]}}, 
                         actividades = {{$contadores[4]}})
                    </span> 
                </h4>
            </div>
        </div>
    </div>
@else

    @if($tipo == "info")
        @include('Backend.Alumnos.Formularios.Actualizaciones.Informacion')
    @else 
        {{-- //doctos --}}
        @include('Backend.Alumnos.Formularios.Actualizaciones.Documentos')
    @endif
@endif
@endsection
