@extends ('layouts.admin')
@section ('principal')


<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Planes de Pago</h3>
		<a href="" data-target="#modal-plan-1" data-toggle="modal"><button class="btn btn-success"><i class="fa fa-file"></i> Nuevo</button></a>
		<a href="{{url('/')}}/configurar/planes"><button class="btn btn-success"><i class="fa fa-file"></i> Configurar Plan</button></a>
		@include('admin.cobranza.planes.modal')
		<br><br>
	
	</div>
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

	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover" id="dataTablePlanesPago">
				<thead>
					<th>Id</th>
					<th>Código del Plan</th>
					<th>Fecha de Inicio</th>
					<th>Fecha Fin</th>
					<th>Cantidad</th>
					<th>Ciclo</th>
					<th>Opciones</th>
				</thead>
				 @foreach ($plan as $pl)
				<tr>
					<td>{{ $pl->idPlanesPago}}</td>
					<td>{{ $pl->codigoPlan}}</td>
					<td>{{ $pl->fechaInicio}}</td>
					<td>{{ $pl->fechaFin}}</td>
					<td>$. {{$pl->precio}}</td>
					<td>{{ $pl->ciclo}}</td>

					<td>
						<a href="{{url('/')}}/utp/planes/show-{{$pl->idPlanesPago}}"><button class="btn btn-info"><i class="fa fa-info-circle"></i> Ver</button></a>
                         <a href="" data-target="#modal-delete-{{$pl->idPlanesPago}}" data-toggle="modal"><button class="btn btn-danger"><i class="fa fa-trash"></i> Eliminar</button></a>
					</td>
				</tr>
				@include('admin.cobranza.planes.modalDelite')
				@endforeach
			</table>
		</div>

	</div>
</div>


@push('filtroCiclo')
<script>
		$(document).ready(function(){
             /*   $.ajax({
		          	url:'../utp/filter-planesPago/',
		          	type:'GET',
		          	dataType:'json',
		          	data: {
          			},
        			success:function(data){
			          	$('#contenidoPlanesPago').html('');
			           	$.each(data, function(idx, opt) {
			           		


			           			$('#contenidoPlanesPago').append("<tr>"
			           			+"<td>" +opt.idPlanesPago+ "</td>"
					    		+"<td>" +opt.codigoPlan+ "</td>"
					    		+"<td>"+opt.fechaInicio+"</td>"
					    		+"<td>"+opt.fechaFin+"</td>"
					    		+"<td>"+opt.precio+"</td>"
					    		+"<td>"+opt.ciclo+"</td>"
					    		+"<td><a href='../edit/profesor/" +opt.idPlanesPago+ "'<button class='btn btn-info'>Editar</button></a>"
					    		+" "+"<a href='../delete/profe/" +opt.idPlanesPago+ "'<button class='btn btn-danger'>Eliminar</button></a></td></tr>");

			           		

					    	     		
				        });
        			}
				});*/

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
    $('#dataTablePlanesPago').DataTable({
    	 "language": lang_spain


    });
            });



		
</script>
@endpush

@endsection