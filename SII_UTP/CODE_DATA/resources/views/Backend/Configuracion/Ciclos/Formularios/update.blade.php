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
    <h4 class="inline-block">Editar Ciclo: <span class="badge badge-info">{{$ciclo->codigo_corto}}</span></h4>
    <a href="{{url('/admin/ciclos/index')}}" class="btn-neutral btn-secondary float-right">REGRESAR</a>
  </div>
  <div class="card-body">
    <form method="POST" action="{{url('/admin/config-ciclo/update/'.Crypt::encrypt($ciclo->id))}}">
         @csrf
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group was-validated">
                  <label for="inicial">Inicial</label>
                  <input required type="number" name="inicial" required value="{{$ciclo->inicia}}" class="form-control" placeholder="Año de Inicio...">
                     @error('inicial')
                       <span class="invalid-feedback" role="alert">
                         <strong style="color: red;">{{ $message }}</strong>
                        </span>
                     @enderror 
                 </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group was-validated">
                  <label for="final">Final</label>
                  <input required type="number"  name="final"  class="form-control" value="{{$ciclo->finaliza}}" placeholder="Año de Fin">
                    @error('final')
                       <span class="invalid-feedback" role="alert">
                         <strong style="color: red;">{{ $message }}</strong>
                        </span>
                    @enderror  
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 {{$errors->has('periodo') ? 'was-validated' : ''}}">
                <div class="form-group was-validated">
                  <label for="periodo">Periodo</label>
                  <input required type="text" name="periodo" class="form-control" value="{{$ciclo->periodo}}" placeholder="Periodo del ciclo...">
                      @error('periodo')
                       <span role="alert">
                         <strong style="color: red;">{{ $message }}</strong>
                        </span>
                     @enderror  
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group was-validated">
                  <label for="descripcion">Descripción</label>
                  <input required type="text"  name="descripcion" class="form-control" value="{{$ciclo->descripcion}}" placeholder="Descripción del ciclo...">
                     @error('descripcion')
                       <span class="invalid-feedback" role="alert">
                         <strong style="color: red;">{{ $message }}</strong>
                        </span>
                     @enderror
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group was-validated">
                  <label for="codigoCorto">Código Corto</label>
                  <input required type="text"  name="codigoCorto" class="form-control" value="{{$ciclo->codigo_corto}}" placeholder="Código Corto del Ciclo...">
                  @error('codigoCorto')
                    <span class="invalid-feedback" role="alert">
                      <strong style="color: red;">{{ $message }}</strong>
                      </span>
                  @enderror 
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group was-validated">
                    <label for="fechaInicial">Fecha Inicial</label>
                    <input required type="date" name="fechaInicial" required value="{{$ciclo->fecha_inicial}}" class="form-control" >
                    @error('fechaInicial')
                      <span class="invalid-feedback" role="alert">
                        <strong style="color: red;">{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group was-validated">
                  <label for="fechaFinal">Fecha Final</label>
                  <input required type="date"  name="fechaFinal"  class="form-control" value="{{$ciclo->fecha_fin}}">
                  @error('fechaFinal')
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