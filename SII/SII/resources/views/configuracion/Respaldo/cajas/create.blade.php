@extends('layouts.admin')
@section('principal')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3><a href="{{url('/')}}/configuracion"><button class="btn btn-danger"><i class="fa fa-undo"></i> Regresar</button></a> Crear Nueva Caja</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif
		</div>
	</div>
			{!!Form::open(array('url'=>'configuracion/cajas/create', 'method'=>'POST','autocomplete'=>'off'))!!}
                  {{Form::token()}}

           <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                              <label for="nombre">Descripción</label>
                              <input type="text" name="descripcion"  value="" class="form-control">
                         </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                              <label for="Cuenta">Status</label>
                              <input type="text" name="status"  value="" class="form-control">
                        </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                         <div class="form-group">
                              <label for="codigo">Consecutivo</label>
                              <input type="text" name="consecutivo" class="form-control" value="" >
                        </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                              <label for="descripcion">Usuario Asignado</label>
                              <select class="form-control" name="username">
                                    <option value="">Selecciona</option>
                                    @foreach($users as $user)
                                    <option value="{{$user->id}}">{{$user->NombreEmpleado}}</option>
                                    @endforeach
                              </select>
                        </div>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                              <label for="codigoCorto">Cuenta</label>
                              <select name="idCuenta" id="idCuenta" class="form-control selectpicker" data-live-search="true">
                                    <option value="">Selecciona</option>
                                    @foreach($cuenta as $ciclo) 
                                      <option value="{{$ciclo->idCatCuentas}}">{{$ciclo->descripcion}}</option> 
                                    @endforeach             
                              </select>
                        </div>
                  </div>
            	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            		<div class="form-group">
		            	<button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Guardar</button>
		            	<button class="btn btn-danger" type="reset"><i class="fa fa-ban"></i> Cancelar</button>
		            </div>
            	</div>
            </div>   

			{!!Form::close()!!}		
@endsection