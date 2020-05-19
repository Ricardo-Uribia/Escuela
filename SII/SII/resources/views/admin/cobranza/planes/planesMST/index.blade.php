@extends ('layouts.admin')
@section ('principal')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Configuración de Planes de Pago</h3>
	</div>
	
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
	<a href="" data-target="#modal-plan-1" data-toggle="modal"><button class="btn btn-success"><i class="fa fa-file"></i> Nuevo PLAN</button></a>
	@include('admin.cobranza.planes.planesMST.modali')	
	</div>
	<br>
	
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>Error al crear plan {{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif
		</div>
</div>
<br>
<br>

	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover" id="dataTablePlanesMST">
				<thead>
					<th>Id</th>
					<th>Código del Plan</th>
					<th>Descripción</th>
					<th>Ciclo</th>
					<th>Opciones</th>
					
				</thead>
               @foreach ($plan as $pl)
				<tr>
					<td>{{ $pl->idPlanesPagoMST}}</td>
					<td>{{ $pl->codigoPlan}}</td>
					<td>{{ $pl->descripcion}}</td>
					<td>{{ $pl->ciclo }}</td>
					
					
					<td>
						<a href="{{url('/')}}/utp/planes-edit-{{$pl->idPlanesPagoMST}}/ciclo-{{$pl->idCiclo}}"><button class="btn btn-info"><i class="fa fa-info-circle"></i> Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$pl->idPlanesPagoMST}}" data-toggle="modal"><button class="btn btn-danger"><i class="fa fa-trash"></i> Eliminar</button></a>
                         @include('admin.cobranza.planes.planesMST.modal')
					</td>
				</tr>
				
				@endforeach
			</table>
		</div>

	</div>
</div>

@push('dataTablePlanesMST')
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
    $('#dataTablePlanesMST').DataTable({
    	 "language": lang_spain


    });
            });



		
</script>
@endpush

@endsection