@extends('layouts.admin')

@section('principal')
                
<div id="page-wrapper">

<div class="col-md-9">

    <h1>Asignaci贸n de grupos</h1>
</div>
</div>
<br><br>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">

  <table class="table table-striped table-bordered table-condensed table-hover" id="dataTableProfeGrupo">
      <thead>
        <tr>
          <td>Foto</td>
          <td>Nombre</td>
          <td>Clave de profesor</td>
          <td>Departamento</td>
          <td>Nivel de estudios</td>
        
        
        </tr>
      </thead>
      <tbody>
       	@foreach ($empleado as $emple)
				<tr>
				
					<td><img style="width: 100px; height: 100px"  class="img-thumbnail" src="{{url('/')}}/img/{{$emple->foto}}"></img></td>
					<td>{{ $emple->NombreEmpleado}}</td>
					<td>{{ $emple->ClaveProfesor}}</td>
					<td>{{ $emple->departamento}}</td>
					<td>
						<a href="{{url('/')}}/profesor-{{$emple->id}}/grupos"><button class="btn btn-primary"><i class="fa fa-info-circle"></i> Asignar</button></a>
                        <a href="{{url('/')}}/profesores/grupos-{{$emple->id}}"><button class="btn btn-success"><i class="fa fa-info-circle"></i> Ver</button></a>
					</td>
				</tr>
			
				@endforeach
</tbody>

      </table>
   
  </div>



        </div>

</div>

@push('dataTableProfeGrupo')
<script>
		$(document).ready(function(){
             
				var lang_spain = {
		    "sProcessing":     "Procesando...",
		    "sLengthMenu":     "Mostrar _MENU_ registros",
		    "sZeroRecords":    "No se encontraron resultados",
		    "sEmptyTable":     "Ningún dato disponible en esta tabla",
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
		        "sLast":     "Último",
		        "sNext":     "Siguiente",
		        "sPrevious": "Anterior"
		    },
		    "oAria": {
		        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
		        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
		    }
	}
    $('#dataTableProfeGrupo').DataTable({
    	 "language": lang_spain


    });
            });



		
</script>
@endpush
@endsection