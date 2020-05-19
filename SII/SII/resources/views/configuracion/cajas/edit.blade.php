@extends('layouts.admin')
@section('principal')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			
			<h3>Editar Caja: <span class="label label-info">{{$caja->descripcion}}</span> </h3>

			@if(count($errors)>0)
			<div class="alert alert-danger">
				<ul>
					@foreach($errors->all()  as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif
		</div>
	</div>

            <form action="{{url('/')}}/configuracion/caja-update-{{$caja->id}}" method="POST">
			{{Form::token()}}
			<div class="row">
            	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            		<div class="form-group">
		            	<label for="nombre">Descripción</label>
		            	<input type="text" name="descripcion"  value="{{$caja->descripcion}}" class="form-control">
           			 </div>
            	</div>
            	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            		<div class="form-group">
            			<label for="Cuenta">Status</label>
            			<input type="text" name="status"  value="{{$caja->status}}" class="form-control">
            		</div>
            	</div>
            	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            		 <div class="form-group">
		            	<label for="codigo">Consecutivo</label>
		            	<input type="text" name="consecutivo" class="form-control" value="{{$caja->consecutivo}}" >
            		</div>
            	</div>
            	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            		<div class="form-group">
		            	<label for="descripcion">Usuario Asignado</label>
		            	<select class="form-control" name="username">
		            		<option>Selecciona</option>
		            		@foreach($empleados as $emple)
		            			@if($emple->id == $caja->empleado->id )
		            			<option value="{{$emple->id}}" selected>{{$emple->NombreEmpleado}}</option>
		            			@else
		            			<option value="{{$emple->id}}" >{{$emple->NombreEmpleado}}</option>
		            			@endif
		            		@endforeach
		            	</select>
            		</div>
            	</div>
            	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            		<div class="form-group">
		            	<label for="codigoCorto">Cuenta</label>
		            	<input type="text"   class="form-control" value="{{$cuenta=$caja->cuenta->descripcion}}" disabled>
		            	<input type="hidden" name="idCuenta" value="{{$cuenta=$caja->cuenta->idCatCuentas}}">
            		</div>
            	</div>

            	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            		<div class="form-group">
		            	<button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Guardar</button>
		            	<button class="btn btn-danger" type="reset" data-dismiss="modal"><i class="fa fa-ban"></i> Cancelar</button>
		            </div>
            	</div>
            </div>   

		</form>
@endsection