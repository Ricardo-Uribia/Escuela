@extends ('layouts.admin')
@section ('principal')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Lista de Modalidad</h3>	
		<a href="{{url('')}}/configurar/modalidad/create"><button class="btn btn-success"><i class="fa fa-file"></i> Nuevo</button></a>
		<a href="{{url('/')}}/utp/titulacion/alumnos" ><button class="btn btn-danger"><i class="fa fa-chevron-left"></i> Regresar</button></a>
		<br><br>
		
	</div>

</div>

<br>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover" id="dataTableModalidad">
				<thead>
	
					<th>No de Modalidad</th>
					<th>Descripción</th>
					<th>Código de Modalidad</th>
					<th>Nombre Documento Recepcional</th>
					<th>Identificador</th>
					<th>Opciones</th>
				</thead>

				@foreach ($modalidad as $mod)
				<tr>
				
					<td>{{ $mod->id}}</td>
					<td>{{ $mod->description}}</td>
					<td>{{ $mod->codigoMod}}</td>
					<td>{{ $mod->nombreDoctoRecept}}</td>
					<td>{{ $mod->Identificador}}</td>
					<td>
						<a href="{{url('/')}}/configurar/modalidad/edit-{{$mod->id}}"><button class="btn btn-primary"><i class="fa fa-info-circle"></i> Detalles</button></a>
                         <a href="" data-target="#modal-delete-modalidad-{{$mod->id}}" data-toggle="modal"><button class="btn btn-danger"><i class="fa fa-trash"></i> Anular</button></a>
					</td>
				</tr>
				@include('admin.modalidad.modal')
				@endforeach
           	</table>    
	</div>

</div>
@push('dataTableModalidad')
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
    $('#dataTableModalidad').DataTable({
    	 "language": lang_spain


    });
            });



		
</script>
@endpush

@endsection