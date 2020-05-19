<!-- Modal -->
<div class="modal fade" id="modal-planes-create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header sys-background-color">
        <h5 class="modal-title" id="exampleModalLabel">Crear nuevo plan de pago</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <form method="POST" action="{{route('/admin/create/planpago')}}" id="formCreatePlan">
        @csrf
        <input type="hidden" name="ciclo_id" value="{{(Session::has('ciclos'))?Session::get('ciclos')->id:null}}">
      <div class="modal-body">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 was-validated">
				<div class="box box-primary">
					<div class="form-group {{$errors->has('codigo') ? 'has-error' : ''}}">
						<label for="codigo">Código</label>
						<input required placeholder="Código concepto..." id="codigo" type="text" class="form-control"  pattern=".{5,20}" name="codigo" value="{{old('codigo')}}" />
						@error('codigo')
		                    <span class="invalid-feedback" role="alert">
		                      <strong style="color: red;">{{ $message }}</strong>
		                    </span>
		                @enderror 
					</div>
				</div>
			</div>
			<div class="col-md-12 col-sm-12 col-xs-12 was-validated">
				<div class="box box-primary">
					<div class="form-group {{$errors->has('descripcion') ? 'has-error' : ''}}">
						<label for="descripcion">Descripción</label>
						<textarea required value="{{old('descripcion')}}"  id="descripcion" type="text" class="form-control" name="descripcion"></textarea>
						@error('descripcion')
	                    <span class="invalid-feedback" role="alert">
	                      <strong style="color: red;">{{ $message }}</strong>
	                    </span>
	               	 	@enderror
					</div>
				</div>
			</div>
          </div>
        </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-ban"></i> Cerrar</button>
          <button type="submit" id="btnGuardarPlan" class="btn btn-primary"><i class="fa fa-save"></i> Confirmar</button>
        </div>
      </form>
    </div>
  </div>
</div>