@extends('layouts.admin')

@section('principal')

<form >
  <legend>Reporte Final de Calificaciones</legend>
  <div class="row">
    <div class="col-sm-9">
     <select class="form-control" name="profesorgrupo" required="value">
      <option value="">Seleccione un asignatura...</option>
      @foreach($profesoresgrupos as $profesorgrupo)
      <option value="{!!$profesorgrupo->idProfesorGrupo!!}" 
        @if(!empty($profesor_grupo))
          @if($profesor_grupo==$profesorgrupo->idProfesorGrupo)
            selected
          @endif
        @endif
        ><?php echo $profesorgrupo->Asignaturas->nombre_asignatura." ( ".$profesorgrupo->Grupos->Codigo_Grupo." / ".$profesorgrupo->Profesores->Empleados->NombreEmpleado." )"; ?></option>
     
      @endforeach 
    </select> 
    </div>
    <div class="col-sm-3">
      <button class="btn btn-primary">Buscar</button>
    </div>
  </div>
</form><br><br>


@if(!empty($profesor_grupo))
  @include('calificaciones.momento.tabla_boletafinal')
@endif

@endsection