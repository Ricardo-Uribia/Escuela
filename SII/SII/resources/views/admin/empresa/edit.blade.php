@extends('layouts.admin')
@section('principal')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			
			<h3>Editar Emrpesa: <span class="label label-info">{{$empresa->nombreEmpresa}}</span></h3>

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


		<form action="{{url('/')}}/configurar/empresa/update-{{$empresa->id}}" method="POST">
			{{Form::token()}}
			<div class="row">
            	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            		<div class="form-group">
		            	<label for="nombre">Servicio Social</label>
		            	<select class="form-control" name="servicioSocial">
                                    <option value="">Selecciona</option>
                                    <option value="N">No</option>
                                    <option value="S">Si</option>    
                              </select>
           			 </div>
            	</div>
                  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="form-group">
                              <label for="nombre">Institución Educativa</label>
                              <select class="form-control" name="institucionEduca">
                                    <option value="">Selecciona</option>
                                    <option value="N">No</option>
                                    <option value="S">Si</option>      
                              </select>
                         </div>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="form-group">
                              <label for="nombre">Proveedor</label>
                              <select class="form-control" name="proveedor">
                                    <option value="">Selecciona</option>
                                    <option value="N">No</option>
                                    <option value="S">Si</option>      
                              </select>
                         </div>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="form-group">
                              <label for="nombre">Bolsa de Trabajo</label>
                              <select class="form-control" name="bolsaTrabajo">
                                    <option value="">Selecciona</option>
                                    <option value="N">No</option>
                                    <option value="S">Si</option>      
                              </select>
                         </div>
                  </div>
            	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            		<div class="form-group">
            			<label for="Cuenta">Nombre de la empresa</label>
            			<input type="text" name="nombreEmpresa" class="form-control" value="{{$empresa->nombreEmpresa}}" placeholder="Nombre de la empresa...">
            		</div>
            	</div>
            	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            		 <div class="form-group">
		            	<label for="codigo">RFC</label>
		            	<input type="text" name="rfc" class="form-control" value="{{$empresa->rfc}}" placeholder="RFC...">
            		</div>
            	</div>
            	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            		<div class="form-group">
		            	<label for="stock">Domicilio</label>
		            	<input type="text" required name="domicilio" class="form-control" value="{{$empresa->domicilio}}" >
            		</div>
            	</div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                         <div class="form-group">
                              <label for="codigo">Entidad</label>
                              <input type="text" name="entidad" class="form-control" value="{{$empresa->entidad}}" placeholder="Entidad...">
                        </div>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="form-group">
                              <label for="stock">Ciudad</label>
                              <input type="text" required name="ciudad" class="form-control" value="{{$empresa->ciudad}}" >
                        </div>
                  </div>
                 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                         <div class="form-group">
                              <label for="codigo">Código Postal</label>
                              <input type="text" name="cp" class="form-control" value="{{$empresa->cp}}" placeholder="Código Postal...">
                        </div>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="form-group">
                              <label for="stock">Colonia</label>
                              <input type="text" required name="colonia" class="form-control" value="{{$empresa->colonia}}" >
                        </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                         <div class="form-group">
                              <label for="codigo">Status</label>
                              <input type="text" name="status" class="form-control" value="{{$empresa->status}}" placeholder="Status...">
                        </div>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="form-group">
                              <label for="stock">Numero de Convenio</label>
                              <input type="int" required name="numeroConvenio" class="form-control" value="{{$empresa->numeroConvenio}}" >
                        </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                         <div class="form-group">
                              <label for="codigo">Telefono</label>
                              <input type="text" name="telefono" class="form-control" value="{{$empresa->telefono}}" placeholder="Telefono...">
                        </div>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="form-group">
                              <label for="stock">Email</label>
                              <input type="email" required name="email" class="form-control" value="{{$empresa->email}}" >
                        </div>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="form-group">
                              <label for="stock">Área Enlace</label>
                              <input type="text" required name="AreaEnlace" class="form-control" value="{{$empresa->AreaEnlace}}" >
                        </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                         <div class="form-group">
                              <label for="codigo">Coordinado Enlace</label>
                              <input type="text" name="enlaceCoordinador" class="form-control" value="{{$empresa->enlaceCoordinador}}" placeholder="Coordinado Enlace...">
                        </div>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="form-group">
                              <label for="stock">Puesto del Enlace Coordinador</label>
                              <input type="text" required name="enlaceCoordinadorPuesto" class="form-control" value="{{$empresa->enlaceCoordinadorPuesto}}" >
                        </div>
                  </div>
                   <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="form-group">
                              <label for="stock">Fecha de Convenio</label>
                              <input type="date" required name="fechaConvenio" class="form-control" value="{{$empresa->fechaConvenio}}" >
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