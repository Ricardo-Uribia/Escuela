<div class="modal fade" id="modal_create_nivel" tabindex="-1" role="dialog" aria-labelledby="Crear Nivel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header sys-background-color">
        <h5 class="modal-title" id="exampleModalLongTitle">Crear Nivel</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('form-nivel')}}" method="POST">
        @csrf
        <div class="modal-body">
          <div class="was-validated">
            <div class="form-horizontal">
              <div class="form-group">
                <label for="inicial">Clave o Identificador</label>
                <input required type="text" name="clave" required value="{{old('clave')}}" class="form-control" placeholder="Clave o Identificador">
              </div>
              <div class="form-group">
                <label for="nivel">Nivel</label>
                <input required type="text"  name="nivel" class="form-control" value="{{old('nivel')}}" placeholder="Nivel">
              </div>
              <div class="form-group">
                <label for="abr_nivel">Abrebiatura de nivel</label>
                <input required type="text" name="abr_nivel" required value="{{old('abr_nivel')}}" class="form-control" placeholder="Nivel Abreviado">
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </form>
    </div>
  </div>
</div>