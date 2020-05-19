@extends('layouts.admin')
@section('estilos')
<style>
  .table-sys tr td{
    vertical-align:middle;
    text-align: center;
  }
</style>
@endsection
@section('contenido')

<div class="row">
  <div class="col-md-12">          
      @if(Session::has('success'))
          <div class="alert alert-success alert-dismissible" role="alert">
              <p class="text-center">{{Session::get('success')}}</p>              
          </div>       
          <br>
      @endif
      @if(Session::has('error'))
          <div class="alert alert-danger alert-dismissible" role="alert">
              <p class="text-center">{{Session::get('error')}}</p>              
          </div>       
          <br>
      @endif
  </div>  
</div>

{{-- Información del grupo --}}
<div class="card border-neutral">  
  <div class="card-header">        
    <h4 class="inline-block" style="padding-left: 10px">Detalles de grupo: <span class="badge badge-info">{{$grupo->codigo}}</span></h4>
    <a href="{{url('/admin/grupos')}}" >
      <button class="btn-neutral sys-background-color float-right" style="margin-right: 10px">REGRESAR</button>          
    </a>              
  </div>
  <div class="card-body p-0">
    <div class="row">
      <div class="col-md-6">
        <ul>
          <li>Tipo: 
            @php
              $tipo = $grupo->tipo;
              if ($tipo == "TR") {
                echo "Tradicional (Todos los alumnos-Mismas las asignaturas)";
              }else if($tipo == "MZC"){
                echo "Mezclado (Una asignatura-alumnos de distintos grupos)";
              }else{
                echo "Error";
              }
            @endphp            
          </li>  
          <li>Turno: {{$grupo->turno}}</li>
          <li>Carrera: {{$grupo->carrera->descripcion}} </li>
          <li>Diferenciador: {{$grupo->carrera->nivel->identificador}} </li>
        </ul>
      </div>
      <div class="col-md-6">
        <ul>
          <li>Profesor: {{$grupo->profesor->empleado->nombreCompleto()}}</li>          
          <li>Cuatrimestre: {{$grupo->cuatrimestre}}</li>
          <li>Cupo Maximo: {{$grupo->cupo_maximo}}</li>
          <li>Ciclo: {{Session::get('ciclos')->descripcion}} </li>
        </ul>
      </div>
    </div>
  </div>
</div>

<br>

{{-- Tabla de alumnos que pertenecen al grupo --}}
<div class="card border-neutral">  
  <div class="card-header">        
    <h4 class="inline-block" style="padding-left: 10px">Alumnos</h4>        
    <a href="#">
      <button class="btn-neutral sys-background-color float-right" disabled="disabled" style="margin-right: 10px">AGREGAR ALUMNO</button>          
    </a>              
  </div>
  <div class="card-body p-0">
    <div class="row">
      <div class="col-md-12">
        <div class="table-responsive">
          <table class="table table-bordered table-sys">      
            <tr align="center">
              <th style="width: 10px">#</th>
              <th style="width: 10%">Foto</th>
              <th style="width: 10%">Matricula/Folio</th>
              <th>Nombres</th>              
              <th>Opciones</th>  
            </tr> 
            @foreach($alumnos as $key => $alumno)           
              <tr>
                <td>{{$key+1}}</td>
                <td>                                  
                  @if($alumno->fotografia != null)
                    <img src="{{asset("CODE_DATA/storage".App\Services\Internal\DocumentStatements::$PATH_ALUMN_IMG)."/".$alumno->fotografia}}" class="rounded img-fluid">
                  @else
                    <small>No cuenta con fotografia</small>
                  @endif
                </td>
                <td>{{$alumno->folio->folio}}</td>
                <td>{{$alumno->getNombreCompleto()}}</td>                
                <td class="" style="width: 250px">
                
                  <form action="{{url('/admin/grupos/updateForm')}}" method="POST" class="inline-block">
                    @csrf
                    <input type="hidden" name="grupo_id" value="{{$grupo->id}}">
                    <button type="submit" class="btn-neutral btn-secondary" disabled="disabled" title="Editar información del grupo">Editar info</button>
                  </form>
                  <form action="" method="POST" class="inline-block ">
                    @csrf
                    <input type="hidden" name="grupo_id" value="{{$grupo->id}}">              
                    <button type="submit" disabled="disabled" class="btn-neutral btn-danger" title="Eliminar grupo de la base de datos">Quitar</button>
                  </form>
                </td>
              </tr>    
            @endforeach        
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="card-footer">{{$alumnos->links()}}</div>
</div>

    


@endsection