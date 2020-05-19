@extends('layouts.admin')
@section('contenido')
@if(Session::has('error'))
  <div class="small-box bg-danger">
    <div class="card-header">
      <center><p>{{Session::get('error')}}</p></center>
    </div>
  </div>
@endif
<div class="card border-neutral">
  <div class="card-header">
    <h4 class="inline-block">Crear nueva caja</h4>
    <a href="{{url('admin/ciclos/index')}}" class="btn-neutral btn-secondary float-right">REGRESAR</a>
  </div>
  <div class="card-body">
      <form method="POST" action="{{route('form-caja')}}">
       @csrf
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group was-validated was-validated">
              <label for="descripcion">Descripción</label>
              <input required type="text" name="descripcion" required value="{{old('descripcion')}}" class="form-control" placeholder="Descripción...">
              @error('descripcion')
                <span class="invalid-feedback" role="alert">
                  <strong style="color: red;">{{ $message }}</strong>
                  </span>
              @enderror           
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group was-validated">
              <label for="estatus">Estátus</label>
              <select required class="form-control" name="estatus" required>
                <option value="">--Selecciona--</option>
                <option value="1">Activo</option>
                  <option value="0">Inactivo</option>
              </select>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="form-group was-validated">
              <label for="consecutivo">Consecutivo</label>
              <input required type="number" name="consecutivo" class="form-control" value="{{old('consecutivo')}}" placeholder="No folio...">
                @error('consecutivo')
                <span class="invalid-feedback" role="alert">
                  <strong style="color: red;">{{ $message }}</strong>
                  </span>
              @enderror  
          </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group was-validated">
              <label for="usuarioAsign">Usuario Asignado</label>
              <select required class="form-control selectpicker" data-live-search="true" name="userAsig">
                <option value="">Selecciona</option>
                  @foreach($emplados as $emple)
                    <option value="{{$emple->id}}">{{$emple->nombres}}</option>
                  @endforeach
              </select>
              @error('userAsig')
                <span class="invalid-feedback" role="alert">
                  <strong style="color: red;">{{ $message }}</strong>
                  </span>
              @enderror  
            </div>
          </div>
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="form-group was-validated">
                <label for="cuenta">Cuenta</label>
                  <select required class="form-control selectpicker" data-live-search="true" name="cuenta">
                    <option value="">Selecciona</option>
                      @foreach($cuentas as $cuenta)
                        <option value="{{$cuenta->id}}">{{$cuenta->descripcion}}</option>
                      @endforeach
                  </select>
                  @error('cuenta')
                    <span class="invalid-feedback" role="alert">
                      <strong style="color: red;">{{ $message }}</strong>
                    </span>
                  @enderror 
              </div>
          </div>
        </div>   
  </div>
  <div class="card-footer">
      <button class="btn btn-primary" type="submit"> Guardar</button>
      <button class="btn btn-danger" type="reset"> Cancelar</button>
  </div>
  </form>  
</div>
@endsection
      
    















