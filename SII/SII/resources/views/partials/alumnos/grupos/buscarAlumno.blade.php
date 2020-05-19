@extends('layouts.admin')
@section('principal')

@if(session('status'))
<div class="alert alert-success">
  {{ session('status')}}
</div>
@endif

    <form method="GET" action="{{ url('/buscarAlumno/'.$grupo->id)}}" accept-charset="UTF-8" >
      
    <label for="buscarAlumno">BUSCAR ALUMNO</label>
    <input name="buscarAlumno" type="text" class="form-control" id="buscarAlumno" placeholder="Ingresa la matrícula" value="{{request('Matricula')}}">
     <br>
    <button  type="submit" class="btn btn-primary btn-sm">BUSCAR</button>
    </form><br><br>

    <form method="POST" action="{{ url('/buscarAlumno/'.$grupo->id)}}">
      @csrf
     @foreach($listaAlumno as $oalumno)
    
      @endforeach

      <div>
          <label for="Nombres"><B>{{'Nombres'}}</B></label>

          <input type="text" readonly="true" id="Nombres"value="{{ $oalumno->Nombres}}"><br>
      </div>
      <input type="text" name="idalumno" value="{{ $oalumno->id}}" style="display: none;">

      <div>
          <label for="Apellidos"><B>{{'Apellidos'}}</B></label>
          
          <input type="text" readonly="true" id="Apellidos" value="{{ $oalumno->Paterno}} {{ $oalumno->Materno }}"><br>
      </div>

      <div >
          <label for="Matricula"><B>{{'Matricula'}}</B></label>
          
          <input type="text" readonly="true" id="Matricula"value="{{ $oalumno->Matricula}}"><br>
      </div>

      <div>
          <label for="Carrera"><B>{{'Carrera'}}</B></label>
          
          <input type="text" readonly="true" id="Carrera"value="{{ $oalumno->Carrera}}"><br>
      </div>

      <div>
          <label for="Carrera"><B>{{'Grupo'}}</B></label>
          
          <input type="text" readonly="true" id="Carrera"value="{{ $grupo->Codigo_Grupo}}"><br>
      </div>

  </div><br>
  
      <td>
        <button  type="submit" class="btn btn-primary btn-sm" >Agregar</button>
     </td>
     
    <td>
        
        <td>
            <a  href="{{ url ('/lista/alumnos/grupos/'.$grupo->id)}}" class="btn btn-danger"  aria-hidden="true"><i class="fa fa-chevron-left"></i>Regresar</a>
      </td>

     </form>
     

@endsection