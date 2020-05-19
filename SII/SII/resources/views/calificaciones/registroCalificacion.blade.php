@extends('layouts.admin')
@section('principal')

@if(session('status'))
  <div class="alert alert-success">
    {{ session('status') }}
  </div>
@endif
<form method="POST" action="{{ url('registro/calif/profesores') }}" >
   @csrf
  <div class="row">
    <div class="col-sm-3">
      <h5><b>Registro de calificaciones</b></h5>
    </div>
    <div class="col-sm-4">
    <select class="form-control" name="Asignatura" required="value">
      <option >Seleccione un asignatura...</option>
      @foreach($profesorgrupo as $oprofesorgrupo)
      <option value="{!!$oprofesorgrupo->idProfesorGrupo!!}" 
        @if(!empty($asignacion))
          @if($asignacion==$oprofesorgrupo->idProfesorGrupo)
            selected
          @endif
        @endif
        ><?php echo $oprofesorgrupo->Asignaturas->nombre_asignatura." ( ".$oprofesorgrupo->Grupos->Codigo_Grupo." / ".$oprofesorgrupo->Profesores->Empleados->NombreEmpleado." )"; ?></option>
     
      @endforeach 
    </select>
    </div>
    <div class="col-sm-3">
    <select class="form-control" name="momento" required="value">
      <option value="">Seleccione un momento</option>
      @foreach($momento as $omomento)
      <option value="{!!$omomento->idMomento!!}" 
        @if(!empty($idMomento))
          @if($idMomento==$omomento->idMomento)
            selected
          @endif
        @endif
        >{{$omomento->momento}}</option>
      @endforeach
    </select>
    </div>
    <div class="col-sm-2">
     <input type="submit" class="btn btn-primary btn-md" value="Buscar">
    </div>
  </div>
  </form><br>
 

@if(!empty($idMomento))
    @if($idMomento == '1')
      @include('calificaciones.momento.primer_parcial')
    @elseif($idMomento == '2')
      @include('calificaciones.momento.segundo_parcial')
    @elseif($idMomento == '3')
      @include('calificaciones.momento.tercer_parcial')
    @elseif($idMomento == '4')
      @include('calificaciones.momento.asesoria_1')
    @elseif($idMomento == '5')
      @include('calificaciones.momento.asesoria_2')
    @elseif($idMomento == '6')
      @include('calificaciones.momento.ordinario')
    @elseif($idMomento == '7')
      <h2>Recuperativo </h2>
    @elseif($idMomento == '8')
      <h1>Especial </h1>
    @elseif($idMomento) == '9')
      <h1>Final</h1>
@endif
@endif

<!--script type="text/javascript">
  
    totalsesiones = parseInt(document.primero.totalsesiones.value);
    sesiones = document.primero.sesiones.value;
    porcentajesesiones = (sesiones*100)/totalsesiones;

    console.log(porcentajesesiones);

    porcentaje = document.primero.porcentaje.value = "hahaahah";
</script-->


<!--script type="text/javascript">
function getval(sel){
  alert(sel.value);
}  
</script-->



@endsection