@extends ('layouts.admin')
@section ('principal')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Conceptos de Cobros</h3>	
		<a href="{{url('')}}/utp/concepto/create"><button class="btn btn-success"><i class="fa fa-file"></i> Nuevo</button></a>
		<a href="{{url('/')}}/utp/venta/plan/create" ><button class="btn btn-danger"><i class="fa fa-chevron-left"></i> Regresar</button></a>
		<br><br>
		
	</div>
	
</div>

<br>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover" id="conceptosPago">
				<thead>
	
					<th>Alumno</th>
					<th>Ciclo</th>
					<th>Estatus del Alumno</th>
					<th>Cuenta</th>
					<th>Cantidad Programada</th>
					<th>Pagado</th>
					<th>Opciones</th>
				</thead>

				@foreach ($ventas as $ven)
				<tr>
					<td>{{ $ven->nombre}}</td>
					<td>{{ $ven->descripcion}}</td>
					<td>{{ $ven->Status}}</td>
					<td>{{ $ven->idCuenta}}</td>
					<td>{{ $ven->cantidadProgramada}}</td>
					<td>{{ $ven->pagado}}</td>
					<td>
						<a href="{{url('/')}}/utp/show/detalle-venta-{{$ven->idAlumnosCxC}}"><button class="btn btn-primary"><i class="fa fa-info-circle"></i> Detalles</button></a>
                         <a href="" data-target="#modal-delete-{{$ven->idAlumnosCxC}}" data-toggle="modal"><button class="btn btn-danger"><i class="fa fa-trash"></i> Anular</button></a>
					</td>
				</tr>

				@include('admin.cobranza.conceptos.modal')
				@endforeach
           	</table>    
	</div>
	
</div>
@push('datatablesconceptosPago')
<script type="text/javascript">
	$(document).ready( function () {

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
    $('#conceptosPago').DataTable({
    	 "language": lang_spain


    });
    	 
});

</script>
@endpush
@endsection