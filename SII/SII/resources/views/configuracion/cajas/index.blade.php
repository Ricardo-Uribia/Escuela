<div class="row">
	
	<a href="{{url('/')}}/configuracion/nueva/caja"><button class="btn btn-success"><i class="fa fa-file"></i> Nuevo</button></a>
</div>
<br><br>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover" id="dataTablesCaja">
				<thead>
					<th>Id</th>
					<th>Descripción</th>
					<th>Status</th>
					<th>Consecutivo</th>
					<th>Cuenta</th>
					<th></th>
				</thead>
              	@foreach ($cajas as $caja)
				<tr>
					<td>{{ $caja->id}}</td>
					<td>{{ $caja->descripcion}}</td>
					<td>{{ $caja->status}}</td>
					<td>{{ $caja->consecutivo}}</td>
					<td>{{ $caja->cuenta}}</td>
					<td>
						<a href="{{url('/')}}/editar/caja-{{$caja->id}}"><button class="btn btn-info"><i class="fa fa-info-circle"></i> Editar</button></a>
                         <a href="" data-target="#modal-delete-caja-{{$caja->id}}" data-toggle="modal"><button class="btn btn-danger"><i class="fa fa-trash"></i> Eliminar</button></a>
                         @include('configuracion.cajas.modal')
					</td>
				</tr>
				
				@endforeach
			</table>
		</div>
		
	</div>
</div>
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
    $('#dataTablesCaja').DataTable({
       "language": lang_spain


    });
            });



    
</script>