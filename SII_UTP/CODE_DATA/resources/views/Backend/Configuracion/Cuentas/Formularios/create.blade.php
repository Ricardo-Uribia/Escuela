<div class="modal fade" id="modal-cuenta" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header sys-background-color">
        <h5 class="modal-title " id="exampleModalLongTitle">Agregar Cuenta Nueva</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{route('form-cuenta')}}">
      <div class="modal-body">
          @csrf
          <div class="modal-body">
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
                  <label for="acumulativa">Acumalativo:</label>
                    <input type="text" required name="acumulativa" class="form-control" value="{{old('acumulativo')}}" placeholder="Acumalativo...">
                </div>
              </div>
            </div>
            <div >
              <div class="form-group">
                <label for="descripcion">Descripción</label>
                <input type="text" name="descripcion" required value="{{old('descripcion')}}" class="form-control" placeholder="Descripción...">
              </div>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Confirmar</button>
      </div>
      </form>
    </div>
  </div>
</div>