@extends ('layouts.admin')
@section ('principal')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Concepto Pago</h3>
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
		<form method="POST" action="{{url('/')}}/utp/conceptosPago/create">
                  
           
                  {{Form::token()}}

            <div class="row">
            	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            		<div class="form-group">
		            	<label for="nombre">Código Concepto</label>
		            	<input type="text" name="codigoConcepto" required value="{{old('codigoConcepto')}}" class="form-control" placeholder="Código Concepto...">
           			 </div>
            	</div>
            	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            		<div class="form-group">
            			<label for="Cuenta">Nivel</label>
            			<select name="idCuenta"  class="form-control selectpicker" data-live-search="true">
                                    <option value="">Selecciona</option>
            				@foreach($cuenta as $cuent)
            				<option value="{{$cuent->idCatCuentas}}">{{$cuent->cuenta}}</option>
            				@endforeach
            			</select>
            		</div>
            	</div>
            	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            		 <div class="form-group">
		            	<label for="codigo">Descripción</label>
		            	<input type="text" name="descripcion" class="form-control" value="{{old('descripcion')}}" placeholder="Descripcíón del concepto...">
            		</div>
            	</div>
            	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            		<div class="form-group">
		            	<label for="stock">Precio</label>
		            	<input type="text" required name="precio" class="form-control" value="{{old('precio')}}" placeholder="Precio del concepto...">
            		</div>
            	</div>
                  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="form-group">
                              <label for="impuesto">Impuesto</label>
                              <input type="text" required name="impuesto" class="form-control" value="{{old('impuesto')}}" placeholder="Impuesto del concepto...">
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