@extends('layouts.admin')
@section('principal')

@if(session('status'))
<div class="alert alert-success">
  {{ session('status')}}
</div>
@endif

 <a href="{{ url ('registroevento') }}/{{$catalogoevento->idCatalogoEvento}}" title="View CatalogoEvento"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true">Ir al grupo para ver los participantes</i></button></a>
 
    <form method="GET" action="{{ url('/buscarAlumnosAE/'. $catalogoevento->idCatalogoEvento )}}" accept-charset="UTF-8" >
      
    <label for="buscarAlumnosAE">BUSCAR ALUMNO</label>
    <input name="buscarAlumnosAE" type="text" class="form-control" id="buscarAlumnoAE" placeholder="Ingresa la matrícula" value="{{request('Matricula')}}">
     <br>
    <button  type="submit" class="btn btn-primary btn-sm">BUSCAR</button>
    </form><br>



    <form method="POST" action="{{ url('/guardarAlumnosAE/'. $catalogoevento->idCatalogoEvento)}}">
      @csrf
     @foreach($listaAlumno as $actividades)
      @endforeach

      <div>
        <label for="idCatalogoEvento"><B>{{'Identificador de la villa'}}</B></label><br>
            <input class="col-md-4 control-label" type="number" id="idCatalogoEvento" value="{{ $catalogoevento->idCatalogoEvento}}" readonly="true"><br>
      </div>
            <input type="number" name="idCatalogoEvento" value="{{ $catalogoevento->idCatalogoEvento}}" style="display: none;">
        <br>

      <div>
          <label for="Nombres"><B>{{'Nombre'}}</B></label><br>

          <input class="col-md-4 control-label" type="text"  id="Nombres" value="{{ $actividades->Nombres}}" readonly="true"><br>
      </div>
      <input type="text" name="Nombres" value="{{ $actividades->id}}" style="display: none;">
   
      <br>
      <br>

      <div>
          <label for="idCiclo"><B>{{'Ciclo'}}</B></label><br>

          <input class="col-md-4 control-label" type="number"  id="idCiclo" value="{{ $catalogoevento->idCiclo}}" readonly="true"><br>
      </div>
      <input type="number" name="idCiclo" value="{{ $catalogoevento->idCiclo}}" style="display: none;">
   
      <br>
      <br>

      <div>
          <label for="idEvento"><B>{{'Evento'}}</B></label><br>

          <input class="col-md-4 control-label" type="number"  id="idEvento" value="{{ $catalogoevento->idEvento}}" readonly="true"><br>
      </div>
      <input type="number" name="idEvento" value="{{ $catalogoevento->idEvento}}" style="display: none;">
   
      <br>
      <br>
      <div class="form-group {{ $errors->has('descripcion') ? 'has-error' : ''}}">
            <label for="descripcion" class="col-md control-label">{{ 'Descripcion de actividades el cual has participado' }}</label><br>
          <div class="col-md-4">
            <input class="form-control" name="descripcion" type="text" id="descripcion" value="{{ $actividade->descripcion or ''}}" ><br>
              {!! $errors->first('descripcion', '<p class="help-block">:message</p>') !!}
          </div>
      </div>
      <br>

  </div><br>
    <td>
        <button  type="submit" class="btn btn-primary btn-sm" >Agregar</button>
     </td>
    <td>

     </form>

     

@endsection