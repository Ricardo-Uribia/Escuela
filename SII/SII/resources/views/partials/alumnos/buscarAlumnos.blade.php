 @extends('layouts.admin')
@section('principal')

 <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Alumnos</h1>
                </div>

                 <form>
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" id="email">
  </div>
</form>



<div class="form-group has-error has-feedback">
      <label class="col-sm-2 control-label" for="">Prueba</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="">
      </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
                <!-- /.col-lg-6 -->
               
                <!-- /.col-lg-6 -->
            </div>

<div class="row">
  <div class="col-xs-3">
    <div class="form-group">
      <select class="selectpicker form-control">
        <option>Mustard</option>
        <option>Ketchup</option>
        <option>Relish</option>
      </select>
    </div>
  </div>
</div>

  <div class="col-md-12">
    <form class="was-validated">
      <form class="form-horizontal">
        <div class="form-group">
          <label class="control-label col-xs-3"><B>Estatus:</B></label>
        </div>
        <br><br>
        <div class="col-md-4">
          <select class="custom-select mb-2 mr-sm-2 mb-sm-0" required id="">
            <option value="">Seleccione estatus</option>
            <option value="1">Aspirante</option>
            <option value="2">Nuevo ingreso</option>
            <option value="3">Regular</option>
            <option value="4">Reingreso</option>
            <option value="5">Condicionado</option>

          </select>
        </div>
      </form>
    </form>
  </div>

            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>

@endsection