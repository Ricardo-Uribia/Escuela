@extends('layouts.admin')
@section('principal')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3><a href="{{url('/')}}/configuracion"><button class="btn btn-danger"><i class="fa fa-undo"></i> Regresar</button></a> Crear Nuevo Ciclo</h3>
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
			{!!Form::open(array('url'=>'configuracion/ciclos', 'method'=>'POST','autocomplete'=>'off'))!!}
                  {{Form::token()}}

            <div class="row">
            	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            		<div class="form-group">
		            	<label for="inicial">Inicial</label>
		            	<input type="number" name="inicial" required value="{{old('inicial')}}" class="form-control" placeholder="Año de Inicio...">
           			 </div>
            	</div>
            	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            		<div class="form-group">
            			<label for="final">Final</label>
            			<input type="number"  name="final"  class="form-control" value="{{old('final')}}" placeholder="Año de Fin">
            		</div>
            	</div>
            	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            		 <div class="form-group">
		            	<label for="periodo">Periodo</label>
		            	<input type="text" name="periodo" class="form-control" value="{{old('periodo')}}" placeholder="Periodo del ciclo...">
            		</div>
            	</div>
            	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            		<div class="form-group">
		            	<label for="descripcion">Descripción</label>
		            	<input type="text"  name="descripcion" class="form-control" value="{{old('descripcion')}}" placeholder="Descripción del ciclo...">
            		</div>
            	</div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                              <label for="codigoCorto">Código Corto</label>
                              <input type="text"  name="codigoCorto" class="form-control" value="{{old('codigoCorto')}}" placeholder="Código Corto del Ciclo...">
                        </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                              <label for="fechaInicial">Fecha Inicial</label>
                              <input type="date" name="fechaInicial" required value="{{old('fechaInicial')}}" class="form-control" >
                         </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                              <label for="fechaFinal">Fecha Final</label>
                              <input type="date"  name="fechaFinal"  class="form-control" value="{{old('fechaFinal')}}">
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