<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-cuenta-1">

	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" 
				aria-label="Close">
                     <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Agregar Cuenta Nueva </h4>
			</div>
			<form action="{{url('/')}}/configuracion/cuenta" method="POST">
            {{Form::token()}}

			<div class="modal-body">
				<div >
            		<div class="form-group">
		            	<label for="descripcion">Descripción</label>
		            	<input type="text" name="descripcion" required value="{{old('descripcion')}}" class="form-control" placeholder="Descripción...">
           			 </div>
            	</div>
            	<div class="row">
            	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 ">
            		 <div class="form-group">
		            	<label for="codigo">Código Cuenta</label>
		            	<input type="text" name="codigo" class="form-control" value="{{old('codigo')}}" placeholder="Código Cuenta...">
            		</div>
            	</div>
            	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            		<div class="form-group">
		            	<label for="nivel">Nivel</label>
		            	<input type="text" required name="nivel" class="form-control" value="{{old('nivel')}}" placeholder="Nivel...">
            		</div>
            	</div>
            	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            		<div class="form-group">
		            	<label for="acumulativo">Acumalativo:</label>
		            	<input type="text" required name="acumulativo" class="form-control" value="{{old('acumulativo')}}" placeholder="Acumalativo...">
            		</div>
            	</div>
            	</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-ban"></i> Cerrar</button>
				<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Confirmar</button>
			</div>
		</div>
	</div>
	</form>

</div>