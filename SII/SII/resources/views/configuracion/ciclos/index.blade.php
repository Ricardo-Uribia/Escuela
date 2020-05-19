
<div class="row">
	<a href="{{url('/')}}/configuracion/ciclos/create"><button class="btn btn-success"><i class="fa fa-file"></i> Nuevo</button></a>
</div>
<br><br>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover" id="dataTableCiclos">
				<thead>
					<th>Id</th>
					<th>Inicial</th>
					<th>Final</th>
					<th>Periodo</th>
					<th>Descripci®Æn</th>
					<th>C®Ædigo Corto</th>
					<th>Fecha Inicial</th>
					<th>Fecha Final</th>
					<th></th>
				</thead>
               @foreach ($ciclos as $ciclo)
				<tr>
					<td>{{ $ciclo->idCiclo}}</td>
					<td>{{ $ciclo->inicial}}</td>
					<td>{{ $ciclo->final}}</td>
					<td>{{ $ciclo->periodo}}</td>
					<td>{{ $ciclo->descripcion}}</td>
					<td>{{ $ciclo->codigoCorto}}</td>
					<td>{{ $ciclo->fechaInicial}}</td>
					<td>{{ $ciclo->fechaFinal}}</td>
					<td>
						<a href="{{url('/')}}/configuracion/ciclos-update-{{$ciclo->idCiclo}}"><button class="btn btn-info"><i class="fa fa-info-circle"></i> Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$ciclo->idCiclo}}" data-toggle="modal"><button class="btn btn-danger"><i class="fa fa-trash"></i> Eliminar</button></a>
                         @include('configuracion.ciclos.modal')
					</td>
				</tr>
				
				@endforeach
			</table>
		</div>
		
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
             
				var lang_spain = {
		    "sProcessing":     "Procesando...",
		    "sLengthMenu":     "Mostrar _MENU_ registros",
		    "sZeroRecords":    "No se encontraron resultados",
		    "sEmptyTable":     "Ning√∫n dato disponible en esta tabla",
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
		        "sLast":     "√öltimo",
		        "sNext":     "Siguiente",
		        "sPrevious": "Anterior"
		    },
		    "oAria": {
		        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
		        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
		    }
	}
    $('#dataTableCiclos').DataTable({
    	 "language": lang_spain


    });
            });

</script>
