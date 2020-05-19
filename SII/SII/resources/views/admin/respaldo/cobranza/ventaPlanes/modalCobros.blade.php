<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$venta->idAlumnosCxC}}">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" 
				aria-label="Close">
                     <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Cobrar Venta</h4>
			</div>
			{{Form::Open(array('url'=>array('utp/cobro', $venta->idAlumnosCxC)))}}

            {{Form::token()}}

			<div class="modal-body">
				<div >
            		<div class="form-group">
		            	<label for="precio">Precio</label>
		            	<input type="text" name="precio" readonly="readonly" value="{{$venta->cantidadProgramada}}" class="form-control" placeholder="Precio...">
           			 </div>
            	</div>
            	<div class="col-lg-6 col-md-6 col-sm-6 ">
            		 <div class="form-group">
		            	<label for="codigoPlan">Código Plan</label>
		            	<input type="text" name="codigoPlan" class="form-control" value="{{$venta->clave}}" placeholder="Código Cuenta...">
            		</div>
            	</div>
            	<div class="col-lg-6 col-md-6 col-sm-6">
            		<div class="form-group">
		            	<label for="ingreso">Ingreso</label>
		            	<input type="text" required name="ingreso" class="form-control" value="{{old('ingreso')}}" placeholder="Ingreso...">
            		</div>
            	</div>
            	<div class="col-lg-4 col-md-4 col-sm-4 ">
            		 <div class="form-group">
		            	<label for="caja">Caja</label>
		            	<input type="text" name="caja" class="form-control" value="{{old('caja')}}" placeholder="Caja...">
            		</div>
            	</div>
            	<div class="col-lg-4 col-md-4 col-sm-4">
            		<div class="form-group">
		            	<label for="reciboCaja">Recibo Caja</label>
		            	<input type="text" required name="reciboCaja" class="form-control" value="{{old('reciboCaja')}}" placeholder="Ingreso...">
            		</div>
            	</div>
            	<div class="col-lg-4 col-md-4 col-sm-4 ">
            		 <div class="form-group">
		            	<label for="anio">Año</label>
		            	<input type="text" name="anio" class="form-control" value="{{old('anio')}}" placeholder="Año...">
            		</div>
            	</div>
            	<div class="col-lg-4 col-md-4 col-sm-4">
            		<div class="form-group">
		            	<label for="mes">Mes</label>
		            	<input type="text" required name="mes" class="form-control" value="{{old('mes')}}" placeholder="Mes...">
            		</div>
            	</div>
			</div>
			<div class="modal-footer">
				<a href="venta/concepto/create"><button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Realizar Cobro</button></a>
				<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-ban"></i> Cancelar</button>
			</div>
		</div>
	</div>
	{{Form::Close()}}
			
		</div>
	</div>

</div>