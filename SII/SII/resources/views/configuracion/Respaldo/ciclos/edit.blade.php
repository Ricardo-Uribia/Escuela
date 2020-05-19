@extends('layouts.admin')
@section('principal')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			
			<h3>Editar Ciclo: <span class="label label-info">{{$ciclos->codigoCorto}}</span> </h3>

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

            <form action="{{url('/')}}/configuracion/ciclos-update-{{$ciclos->idCiclo}}" method="POST">
			{{Form::token()}}
			<div class="row">
            	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            		<div class="form-group">
		            	<label for="nombre">Inicial</label>
		            	<input type="number" name="inicial" readonly="readonly" value="{{$ciclos->inicial}}" class="form-control">
           			 </div>
            	</div>
            	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            		<div class="form-group">
            			<label for="Cuenta">Final</label>
            			<input type="number" name="final" readonly="readonly" value="{{$ciclos->final}}" class="form-control">
            		</div>
            	</div>
            	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            		 <div class="form-group">
		            	<label for="codigo">Periodo</label>
		            	<input type="text" name="periodo" class="form-control" value="{{$ciclos->periodo}}" readonly="readonly" >
            		</div>
            	</div>
            	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            		<div class="form-group">
		            	<label for="descripcion">Descripción</label>
		            	<input type="text"  name="descripcion" class="form-control" value="{{$ciclos->descripcion}}" >
            		</div>
            	</div>
            	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            		<div class="form-group">
		            	<label for="codigoCorto">Código Ciclo</label>
		            	<input type="text"  name="codigoCorto" class="form-control" value="{{$ciclos->codigoCorto}}" >
            		</div>
            	</div>
            	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            		<div class="form-group">
		            	<label for="fechaInicial">Fecha Inicial</label>
		            	<input type="date" name="fechaInicial" value="{{$ciclos->fechaInicial}}" class="form-control">
           			 </div>
            	</div>
            	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            		<div class="form-group">
            			<label for="fechaFinal">Fecha Final</label>
            			<input type="date" name="fechaFinal" value="{{$ciclos->fechaFinal}}" class="form-control">
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