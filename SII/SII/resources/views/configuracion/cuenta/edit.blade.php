@extends('layouts.admin')
@section('principal')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			
			<h3>Editar Cuenta: <span class="label label-info"> {{$nivel->codigoCuenta}}</span></h3>

			@if(count($errors)>0)
			<div class="alert alert-danger">
				<ul>
					@foreach($errors->all()  as $error)
					<li>Error al actualizar cuenta {{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif
		</div>
	</div>


			<form action="{{url('/')}}/configuracion-cuenta-edit-{{$nivel->idCatCuentas}}" method="POST">
			{{Form::token()}}
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            		<div class="form-group">
		            	<label for="descripcion">Descripción</label>
		            	<input type="text" name="descripcion" required value="{{$nivel->descripcion}}" class="form-control" placeholder="Descripción...">
           			 </div>
            	</div>
            </div>
            <div class="row">
            	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            		 <div class="form-group">
		            	<label for="codigo">Código Cuenta</label>
		            	<input type="text" name="codigo" class="form-control" value="{{$nivel->codigoCuenta}}" placeholder="Código Cuenta...">
            		</div>
            	</div>
            	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            		<div class="form-group">
		            	<label for="nivel">Nivel</label>
		            	<input type="text" required name="nivel" class="form-control" value="{{$nivel->nivel}}" placeholder="Nivel...">
            		</div>
            	</div>
            	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            		<div class="form-group">
		            	<label for="acumulativo">Acumalativo:</label>
		            	<input type="text" required name="acumulativo" class="form-control" value="{{$nivel->acumulativa}}" placeholder="Acumalativo...">
            		</div>
            	</div>
            	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            		<div class="form-group">
		            	<button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Guardar</button>
		            	<button class="btn btn-danger" type="reset"><i class="fa fa-ban"></i> Cancelar</button>
		            </div>
            	</div>
            </div>   

			</form>
@endsection