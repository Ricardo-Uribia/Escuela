<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-change-perfil-{{$usuario->id}}">

	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" 
				aria-label="Close">
                     <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Actualizar Perfil de Usuario</h4>
			</div>
			
            <form method="POST" action="{{url('/')}}/change/user-information-{{$usuario->id}}">
                  {{Form::token()}}

			<div class="modal-body">
				<div class="col-lg-6 col-md-6 col-sm-6">
            		<div class="form-group">
		            	<label for="codigoPlan">Nombre</label>
		            	<input type="text" name="name" required value="{{old('name')}}" class="form-control" placeholder="Nombre...">
           			 </div>
            	</div>
            	<div class="col-lg-6 col-md-6 col-sm-6">
            		 <div class="form-group">
		            	<label for="descripcion">Email</label>
		            	<input type="email" name="email" class="form-control" value="{{old('email')}}" placeholder="Email...">
            		</div>
            	</div>
            	<div class="col-lg-6 col-md-6 col-sm-6">
            		<div class="form-group">
		            	<label for="nivel">Contraseña</label>
		            	<input type="password" name="password" class="form-control" placeholder="*****">
            		</div>
            	</div>
            	<div class="col-lg-6 col-md-6 col-sm-6">
            		<div class="form-group">
		            	<label for="nivel">Repite la Contraseña</label>
		            	<input type="password" class="form-control" placeholder="*****">
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