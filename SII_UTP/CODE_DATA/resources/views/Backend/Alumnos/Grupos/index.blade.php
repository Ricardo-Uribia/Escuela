@extends('layouts.admin')
@section('contenido')


<div class="row">
  <div class="col-md-12">          
      @if(Session::has('success'))
          <div class="alert alert-success alert-dismissible" role="alert">
              <p class="text-center">{{Session::get('success')}}</p>              
          </div>       
          <br>
      @endif
  </div>  
</div>

<div class="card border-neutral">  
  <div class="card-header">        
    <h4 class="inline-block" style="padding-left: 10px">Grupos</h4>
    <span style="padding-left: 10px" class="inline-block">
      {{Session::has('ciclos') ? NULL : 'Mostrando todos los grupos'}}
    </span>   
      @if(Session::has('ciclos'))
        <a href="{{url('/admin/grupos/createForm')}}" >
          <button class="btn-neutral sys-background-color float-right" style="margin-right: 10px">NUEVO GRUPO</button>          
        </a>        
      @endif    
  </div>
  <div class="card-body p-0">
    <div class="table-responsive">
      <table class="table table-striped table-bordered">      
        <tr align="center">
          <th>#</th>
          <th>Nivel</th>
          <th>Cuatrimestre</th>
          <th>Codigo</th>           {{-- Codigo grupo  --}}
          <th>Cupo Max</th>      
          <th>dif</th>
          <th>Turno</th>
          <th>Prof Titular</th>
          <th>Opciones</th> 
        </tr>
        @foreach($grupos as $key => $grupo)
        <tr>
          <td>{{$key+1}}</td>
          <td>{{$grupo->carrera->nivel->identificador}}</td>
    			<td>{{$grupo->cuatrimestre}}</td>
    			<td>{{$grupo->codigo}}</td>      			
    			<td>{{$grupo->cupo_maximo}}</td>
    			<td>{{$grupo->diferenciador}}</td>
          <td>{{$grupo->turno}}</td>
          <td>{{$grupo->profesor->empleado->nombreCompleto()}}</td>
          <td class="{{Session::has('ciclos') ? NULL : 'disabledContent'}}" style="width: 250px">
            
            <a href="{{url('/admin/grupos/details-pub').'/'.Crypt::encrypt("?¡'a3a_".$grupo->id."_**_".$grupo->codigo)}}" title="Ver detalles del grupo y alumnos del grupo">
              <button type="button" class="btn-neutral" >Ver</button>                  
            </a>  
            <form action="{{url('/admin/grupos/updateForm')}}" method="POST" class="inline-block">
              @csrf
              <input type="hidden" name="grupo_id" value="{{$grupo->id}}">
              <button type="submit" class="btn-neutral btn-secondary" title="Editar información del grupo">Editar</button>
            </form>
            @if($grupo->alumnos->count() > 0)
              <small class="inline-block text-danger">Tiene alumnos</small>
            @else
            <form action="" method="POST" class="inline-block">
              @csrf
              <input type="hidden" name="grupo_id" value="{{$grupo->id}}">              
              <button type="submit" class="btn-neutral btn-danger" title="Eliminar grupo de la base de datos">Eliminar</button>
            </form>            
            @endif
          </td>
        </tr>
        @endforeach
      </table>
    </div>
  </div>
</div>
@endsection