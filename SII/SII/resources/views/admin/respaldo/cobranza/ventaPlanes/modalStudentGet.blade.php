<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-get-student">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" 
				aria-label="Close">
                     <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Buscar Alumno</h4>
			</div>
		{!!Form::open(array('url'=>'utp/venta/plan/create', 'method'=>'GET', 'autocomplete'=>'off'))!!}
			{{Form::token()}}
			<div class="modal-body">
				<div class="form-group">
					<div class="input-group">
						<input type="text" id="buscarAlumno" class="form-control" placeholder="Buscar..." value="" name="searchText">
						<span class="input-group-btn">
							<button type="submit" id="buscar" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
						</span>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit"  class="btn btn-primary"><i class="fa fa-check-circle"></i> Aceptar</button>
				<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-ban"></i> Cancelar</button>
			</div>
		{{Form::Close()}}
		</div>
	</div>
</div>
