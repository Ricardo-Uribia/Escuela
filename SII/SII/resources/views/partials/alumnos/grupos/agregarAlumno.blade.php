@extends('layouts.admin')
@section('principal')

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  Agregar Alumno
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="exampleModalCenterTitle">Agregar Alumnos</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      	      @push('alumnosDataTable')
<script>
    $(document).ready(function(){
             
        var lang_spain = {
        "sProcessing":     "Procesando...",
        "sLengthMenu":     "Mostrar _MENU_ registros",
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ning煤n dato disponible en esta tabla",
        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sSearch":         "Buscar:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst":    "Primero",
            "sLast":     "脷ltimo",
            "sNext":     "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
  }
    $('#alumnosDataTable').DataTable({
       "language": lang_spain


    });
            });



    
</script>

@endpush

       <div class="form-group">
			<label>Alumno</label>
			<input type="text" name="id" class="form-control" placeholder="" >
		</div>

		<div class="form-group">
			<label>Matricula</label>
			<input type="text" name="id" class="form-control" placeholder="" >
		</div>

		<div class="form-group">
			<label>Status</label>
			<input type="text" name="id" class="form-control" placeholder="" >
		</div>

		<div class="form-group">
			<label>Carrera</label>
			<input type="text" name="id" class="form-control" placeholder="" >
		</div>

		<div class="form-group">
			<label>Cuatrimestre</label>
			<input type="text" name="id" class="form-control" placeholder="" >
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary"> Agregar </button>
      </div>
    </div>
  </div>
</div>
@endsection