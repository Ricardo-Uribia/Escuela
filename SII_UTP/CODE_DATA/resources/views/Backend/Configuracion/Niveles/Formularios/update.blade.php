@extends('layouts.admin')
@section('contenido')
@if(Session::has('error'))
  <div class="small-box bg-danger">
    <div class="card-header">
      <center><p>{{Session::get('error')}}</p></center>
    </div>
  </div>
@endif
<div class="row">
  <div class="col-2"></div>
  <div class="col-8">
    <div class="card border-neutral">
  <div class="card-header">
    <h4 class="inline-block">Actualizar Carrera: <span class="badge badge-info"> {{$carrera->identificador_carrera}}</span> </h4>
    <a href="{{url('admin/niveles/index')}}" class="btn-neutral btn-secondary float-right">REGRESAR</a>
  </div>
  <div class="card-body">
      <form method="POST" action="{{url('/admin/config-carrera/update/'.Crypt::encrypt($carrera->id))}}">
      @csrf
      <div class="was-validated">
        <div class="form-horizontal">
          <div class="form-group row">
            <div class="form-group col-6">
              <label for="inicial">Clave o Identificador</label>
              <input required type="text" name="clave" required value="{{$carrera->identificador_carrera}}" class="form-control" placeholder="Clave o Identificador">
            </div>
            <div class="form-group col-6">
              <label for="status">Estatús</label>
              <select class="form-control" name="status" required>
                <option value="">--SELECCIONA--</option>
                @if($carrera->status == '1')
                <option value="1" selected>Activo</option>
                <option value="0">Inactivo</option>
                @elseif($carrera->status == '0')
                <option value="1">Activo</option>
                <option value="0" selected>Inactivo</option>
                @endif
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="final">Descripción del nivel</label>
            <input required type="text"  name="descripcion"  class="form-control" value="{{$carrera->descripcion}}" placeholder="Descripción">
          </div>
          <div class="form-group row">
            <div class="form-group col-6">
              <label for="inicial">Nivel</label>
              <select required class="form-control" name="nivel_id">
                <option value="">--Selecciona--</option>  
                @foreach($niveles as $nivel)
                  @if($nivel->id == $carrera->nivel_id)
                    <option value="{{$nivel->id}}" selected>{{$nivel->identificador}}</option>
                  @else
                  <option value="{{$nivel->id}}">{{$nivel->identificador}}</option>
                  @endif
                @endforeach
              </select>
            </div>
            <div class="form-group col-6">
              <label for="acuerdo">Acuerdo de creación o Incorparación</label>
              <input type="text" name="acuerdo" class="form-control" value="{{$carrera->acuerdo_creacion}}" placeholder="Acuerdo o Incorparación">
            </div>
          </div>
          <div class="form-group row">
            <div class="form-group col-4">
              <label for="fecha">Fecha</label>
              <input  type="date"  name="fecha" class="form-control" value="{{$carrera->fecha}}">
            </div>
            <div class="form-group col-4">
              <label for="fechaInicial">Fecha Inicio</label>
              <input  type="date"  name="fechaInicial" class="form-control" value="{{$carrera->fecha_inicio}}">
            </div>
            <div class="form-group col-4">
              <label for="fechaFinal">Fecha Fin</label>
              <input type="date"  name="fechaFinal" class="form-control" value="{{$carrera->fecha_fin}}">  
            </div>
          </div>
        </div>
        <button class="btn-neutral btn-success float-right" type="submit">GUARDAR</button>
      </div>
      </form>    
  </div>
</div>
  </div>
</div>
@endsection