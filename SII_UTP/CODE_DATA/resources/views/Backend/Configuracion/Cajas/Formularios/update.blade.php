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
    <h4 class="inline-block">Editar Caja: <span class="badge badge-info">{{$caja->descripcion}}</span></h4>
    <a href="{{url('admin/ciclos/index')}}" class="btn-neutral btn-secondary float-right">REGRESAR</a>
  </div>
  <div class="card-body">
  <form method="POST" action="{{url('/admin/config-caja/update/'.Crypt::encrypt($caja->id))}}">
       @csrf
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group was-validated">
                  <label for="descripcion">Descripción</label>
                  <input type="text" name="descripcion" required value="{{$caja->descripcion}}" class="form-control" placeholder="Descripción...">
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
                    @if($caja->status == '1')
                      <option value="1" selected>Activo</option>
                      <option value="0">Inactivo</option>
                    @elseif($caja->status == '0')
                      <option value="1" >Activo</option>
                      <option value="0" selected>Inactivo</option>
                    @endif
                  </select>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                 <div class="form-group was-validated">
                  <label for="consecutivo">Consecutivo</label>
                  <input required type="number" name="consecutivo" class="form-control" value="{{$caja->consecutivo}}" placeholder="No folio...">
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
                    <option value="0">Selecciona</option>
                      @foreach($emplados as $emple)
                        @if($caja->empleado_id == $emple->id)
                          <option selected value="{{$emple->id}}">{{$emple->nombres}}</option>
                        @else
                          <option  value="{{$emple->id}}">{{$emple->nombres}}</option>
                        @endif
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
                                    <option value="0">Selecciona</option>
                                    @foreach($cuentas as $cuenta)
                                        @if($caja->cuenta_id == $cuenta->id)
                                          <option selected value="{{$cuenta->id}}">{{$cuenta->descripcion}}</option>
                                        @else
                                          <option  value="{{$cuenta->id}}">{{$cuenta->descripcion}}</option>
                                        @endif
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
  </div>
  </form>  
</div>
@endsection
      
    















