@extends('layouts.admin')
@section('principal')

@if(session('status'))
<div class="alert alert-success">
  {{ session('status')}}
</div>
@endif

<a href="{{ url('/registro_villa')}}/{{ $catalogo_villa->idcatalogo_villas }}" title="ver villa"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i>Ver alumnos de la villa</button></a><br><br>

    <form method="GET" action="{{ url('/buscarAlumnoRick/'. $catalogo_villa->idcatalogo_villas )}}" accept-charset="UTF-8" >
      
    <label for="buscarAlumnoRick">BUSCAR ALUMNO</label>
    <input name="buscarAlumnoRick" type="text" class="form-control" id="buscarAlumnoRick" placeholder="Ingresa la matrícula" value="{{request('Matricula')}}">
     <br>
    <button  type="submit" class="btn btn-primary btn-sm">BUSCAR</button>
    </form><br>

    <form method="POST" action="{{ url('/buscarAlumnoRick/'. $catalogo_villa->idcatalogo_villas )}}">
      @csrf
     @foreach($listaAlumno as $alumnos_villa)
      @endforeach

      <div>
          <label for="id"><B>{{'ID'}}</B></label><br>

          <input class="col-md-4 control-label" type="text" id="id"value="{{ $alumnos_villa->id}}" readonly="true"><br>
      </div>
      <input type="number" name="id" value="{{ $alumnos_villa->id}}" style="display: none;">
      <br>

      <div>
          <label for="Nombres"><B>{{'Nombre'}}</B></label><br>

          <input class="col-md-4 control-label" type="text" id="Nombres"value="{{ $alumnos_villa->Nombres}}" readonly="true"><br>
      </div>
      <input type="text" name="Nombres" value="{{ $alumnos_villa->Nombres}}" style="display: none;">
      <br>

      <!--div>
          <label for="Matricula"><B>{{'Matricula'}}</B></label><br>

          <input class="col-md-4 control-label" type="text" id="Matricula"value="{{ $alumnos_villa->Matricula}}" readonly="true"><br>
      </div>
      <input type="text" name="Matricula" value="{{ $alumnos_villa->Matricula}}" style="display: none;">
      <br-->

      <!--div>
          <label for="Carrera"><B>{{'Carrera'}}</B></label><br>

          <input class="col-md-4 control-label" type="text" id="Carrera"value="{{ $alumnos_villa->Carrera}}" readonly="true"><br>
      </div>
      <input type="text" name="Carrera" value="{{ $alumnos_villa->Carrera}}" style="display: none;">
      <br-->
    
      <!--div>
          <label for="Genero"><B>{{'Genero'}}</B></label><br>

          <input class="col-md-4 control-label" type="text" id="Genero"value="{{ $alumnos_villa->Genero}}" readonly="true"><br>
      </div>
      <input type="text" name="Genero" value="{{ $alumnos_villa->Genero}}" style="display: none;">
      <br-->


      <div>
          <label for="idCiclo"><B>{{'Ciclo'}}</B></label><br>
          
          <input class="col-md-4 control-label" type="text" readonly="true" id="idCiclo"value="{{ $catalogo_villa->Ciclo->descripcion}}"><br>
      </div>
      <input type="number" name="idCiclo" value="{{ $catalogo_villa->idCiclo}}" style="display: none;">
      <br>

      <div>
          <label for="idcatalogo_villas"><B>{{'Catalogo villa'}}</B></label><br>
          
          <input class="col-md-4 control-label" type="text" readonly="true" id="idcatalogo_villas"value="{{ $catalogo_villa->idcatalogo_villas}}"><br>
      </div>
      <input type="number" name="idcatalogo_villas" value="{{ $catalogo_villa->idcatalogo_villas}}" style="display: none;">

      <br>

      <div>
          <label for="grupo"><B>{{'Grupo'}}</B></label><br>
          
          <input class="col-md-4 control-label" type="text" readonly="true" id="grupo"value="{{ $catalogo_villa->grupos_villa->nombreVilla}}"><br>
      </div>
      <input type="number" name="idgrupo" value="{{ $catalogo_villa->idgrupos_villas}}" style="display: none;">

    
      <br>
  <div>
    <label for="fecha_ingreso" class="col-md control-label">{{ 'Fecha de ingreso' }}</label><br>
    <div class="col-md-4">
        <input class="form-control" name="fecha_ingreso" type="date" id="fecha_ingreso" value="{{ $alumnos_villa->fecha_ingreso or ''}}" ><br>
        {!! $errors->first('fecha_ingreso', '<p class="help-block">:message</p>') !!}
    </div>
  </div>

     <br>
     <br>
     <br>
  <div>
    <label for="costo_viaje" class="col-md control-label">{{ 'Costo de viaje' }}</label><br>
    <div class="col-md-4">
        <!--input class="form-control" name="costo_viaje" type="text" id="costo_viaje" value="{{ $alumnos_villa->costo_viaje or ''}}" ><br-->
        <select class="form-control" name="costo_viaje">
            <option value="Selecciona">Selecciona</option>
            <option value="$25 Pesos">$25 pesos</option>
            <option value="$50 pesos">$50 pesos</option>
            <option value="$75 pesos">$75 pesos</option>
            <option value="$100 pesos">$100 pesos</option>
            <option value="$125 Pesos">$125 pesos</option>
            <option value="$150 pesos">$150 pesos</option>
            <option value="$175 pesos">$175 pesos</option>
            <option value="$200 pesos">$200 pesos</option>
            <option value="$225 Pesos">$225 pesos</option>
            <option value="$250 pesos">$250 pesos</option>
            <option value="$275 pesos">$275 pesos</option>
            <option value="$300 pesos">$300 pesos</option>
            <option value="$325 Pesos">$325 pesos</option>
            <option value="$350 pesos">$350 pesos</option>
            <option value="$375 pesos">$375 pesos</option>
            <option value="$400 pesos">$400 pesos</option>
            <option value="$425 Pesos">$425 pesos</option>
            <option value="$450 pesos">$450 pesos</option>
            <option value="$475 pesos">$475 pesos</option>
            <option value="$500 pesos">$500 pesos</option>
        </select>

        {!! $errors->first('costo_viaje', '<p class="help-block">:message</p>') !!}
    </div>
  </div>


     <br>
     <br>
     <br>
  <div>
    <label for="tiempo_viaje" class="col-md control-label">{{ 'Tiempo de viaje' }}</label><br>
    <div class="col-md-4">
        <!--input class="form-control" name="tiempo_viaje" type="text" id="tiempo_viaje" value="{{ $alumnos_villa->tiempo_viaje or ''}}" ><br-->
            <select class="form-control" name="tiempo_viaje">
                <option value="Selecciona">Selecciona</option>
                <option value="1 Hora">1 Hora</option>
                <option value="1 Hora 15 minutos">1 Hora 15 minutos</option>
                <option value="1 Hora 30 minutos">1 Hora 30 minutos</option>
                <option value="1 Hora 45 minutos">1 Hora 45 minutos</option>
                <option value="2 Horas">2 Horas</option>
                <option value="2 Hora 15 minutos">2 Hora 15 minutos</option>
                <option value="2 Hora 30 minutos">2 Hora 30 minutos</option>
                <option value="2 Hora 45 minutos">2 Hora 45 minutos</option>
                <option value="3 Horas">3 Horas</option>
                <option value="3 Hora 15 minutos">3 Hora 15 minutos</option>
                <option value="3 Hora 30 minutos">3 Hora 30 minutos</option>
                <option value="3 Hora 45 minutos">3 Hora 45 minutos</option>
                <option value="4 Horas">4 Horas</option>
                <option value="4 Hora 15 minutos">4 Hora 15 minutos</option>
                <option value="4 Hora 30 minutos">4 Hora 30 minutos</option>
                <option value="4 Hora 45 minutos">4 Hora 45 minutos</option>
            </select>

        {!! $errors->first('tiempo_viaje', '<p class="help-block">:message</p>') !!}
    </div>
  </div>

     <br>
     <br>
     <br>
  <div>
    <label for="observaciones_villa" class="col-md control-label">{{ 'Observaciones' }}</label><br>
    <div class="col-md-8">
        <input class="form-control" name="observaciones_villa" type="text" id="observaciones_villa" value="{{ $alumnos_villa->observaciones_villa or ''}}" ><br>
        {!! $errors->first('observaciones_villa', '<p class="help-block">:message</p>') !!}
    </div>
  </div>
          

    <br>
    <br>    


  </div><br>
  
      <td>
        <button  type="submit" class="btn btn-primary btn-sm" >Agregar</button>
     </td>
     
    <td>
        


     </form>
@endsection