<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-Asignar">

	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" 
				aria-label="Close">
                     <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title"><center><b>Crear Profesor</b></center></h4>
			</div>
			
            <form action="{{url('/')}}/mostrar" method="POST">
                  {{Form::token()}}

			<div class="modal-body">
				<div >
            		<div class="form-group">
		            	<label for="codigoPlan">Nombre</label>
		            	<input type="text" name="codigoPlan" required value="{{old('codigoPlan')}}" class="form-control" placeholder="Código...">
           			 </div>
            	</div>
            	
            	<div >
            		 <div class="form-group">
		            	<label for="descripcion">TipoProfesor</label>
		            	<input type="text" name="descripcion" class="form-control" value="{{old('descripcion')}}" placeholder="TipoProfesor...">
            		</div>
            	</div>
            	
            	
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-ban"></i> Cerrar</button>
				<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Crear Profesor</button>
			</div>
		</div>
	</div>
	</form>


</div>