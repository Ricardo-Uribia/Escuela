@extends('layouts.admin')
@section('principal')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			
			<h3>Editar Concepto Pago: <span class="label label-info">{{$modalidad->codigoConcepto}}</span></h3>

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


		<form action="{{url('')}}/configurar/modalidad/update-{{$modalidad->id}}" method="POST" enctype="multipart/form-data">
			{{Form::token()}}
			 <div class="row">
            	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            		<div class="form-group">
		            	<label for="nombre">Código de la Modalidad</label>
		            	<input type="text" name="codigoMod" required value="{{$modalidad->codigoMod}}" class="form-control" placeholder="Código Modalidad...">
           			 </div>
            	</div>
            	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            		<div class="form-group">
            			<label for="Cuenta">Carrera</label>
            			<select name="niveles_id"  class="form-control selectpicker" data-live-search="true">
                                    <option value="">Selecciona</option>
            				@foreach($niv as $carrera)
            				<option value="{{$carrera->id}}">{{$carrera->nombreNivel}}</option>
            				@endforeach
            			</select>
            		</div>
            	</div>
            	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            		 <div class="form-group">
		            	<label for="codigo">Descripción</label>
		            	<input type="text" name="description" class="form-control" value="{{$modalidad->description}}" placeholder="Descripción de la modalidad...">
            		</div>
            	</div>
            	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            		<div class="form-group">
		            	<label for="stock">Nombre Documento Recepcional</label>
		            	<input type="file" required name="nombreDoctoRecept" class="form-control" value="{{$modalidad->nombreDoctoRecept}}" >
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