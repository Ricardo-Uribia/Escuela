<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-servico-social-delete-{{$empreAlum->id}}">

	<form action="{{url('/')}}/utp/borrar-servicio-social/{{$empreAlum->id}}/{{$idAlumno->id}}" method="GET">
		
		{{Form::token()}}
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" 
				aria-label="Close">
                     <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Eliminar Modalidad</h4>
			</div>
			<div class="modal-body">
				<p>Confirme si desea Eliminar la modalidad seleccionada</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-ban"></i> Cerrar</button>
				<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Confirmar</button>
			</div>
		</div>
	</div>
	</form>

</div>