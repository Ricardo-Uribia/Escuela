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
    <h4 class="inline-block">Editar Cuenta: <span class="badge badge-info"> {{$cuenta->codigo}}</span></h4>
    <a href="{{url('admin/cuentas/index')}}" class="btn-neutral btn-secondary float-right">REGRESAR</a>
  </div>
  <div class="card-body">
    <form action="{{url('/admin/config-cuenta/update/'.Crypt::encrypt($cuenta->id))}}" method="POST">
      @csrf
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group was-validated">
                  <label for="descripcion">Descripción</label>
                  <input required type="text" name="descripcion" required value="{{$cuenta->descripcion}}" class="form-control" placeholder="Descripción...">
                  @error('descripcion')
                       <span class="invalid-feedback" role="alert">
                         <strong style="color: red;">{{ $message }}</strong>
                        </span>
                  @enderror 
                 </div>
        </div>
      </div>
      <div class="row">
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                 <div class="form-group was-validated">
                  <label for="codigo">Código Cuenta</label>
                  <input required type="text" name="codigo" class="form-control" value="{{$cuenta->codigo}}" placeholder="Código Cuenta...">
                  @error('codigo')
                    <span class="invalid-feedback" role="alert">
                      <strong style="color: red;">{{ $message }}</strong>
                    </span>
                  @enderror 
              </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="form-group was-validated">
                  <label for="nivel">Nivel</label>
                  <input required type="text" required name="nivel" class="form-control" value="{{$cuenta->nivel}}" placeholder="Nivel...">
                  @error('nivel')
                    <span class="invalid-feedback" role="alert">
                      <strong style="color: red;">{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="form-group was-validated">
                  <label for="acumulativo">Acumalativo:</label>
                  <input required type="text" required name="acumulativa" class="form-control" value="{{$cuenta->acumulativa}}" placeholder="Acumalativo...">
                  @error('acumulativa')
                    <span class="invalid-feedback" role="alert">
                      <strong style="color: red;">{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
      </div>   
  </div>
  <div class="card-footer">
    <button class="btn btn-primary" type="submit">Guardar</button>
  </div>
  </form>
</div>
@endsection