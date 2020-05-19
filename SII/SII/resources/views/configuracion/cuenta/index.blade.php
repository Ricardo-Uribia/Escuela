
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif
		</div>
	</div>
<div class="row">
	
		@include('configuracion.cuenta.modal')
	
	<a href="" data-target="#modal-cuenta-1" data-toggle="modal"><button class="btn btn-success"><i class="fa fa-file"></i> Nuevo</button></a>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover" id="dataTableCuenta">
				<thead>
					<th>Id</th>
					<th>Código de la Cuenta</th>
					<th>Descripción</th>
					<th>Nivel</th>
					<th></th>
				</thead>
               @foreach ($cuenta as $cuent)
				<tr>
					<td>{{ $cuent->idCatCuentas}}</td>
					<td>{{ $cuent->codigoCuenta}}</td>
					<td>{{ $cuent->descripcion}}</td>
					<td>{{ $cuent->nivel}}</td>
					<td>
						<a href="{{url('/')}}/configuracion-cuenta-edit-{{$cuent->idCatCuentas}}"><button class="btn btn-info"><i class="fa fa-info-circle"></i> Editar</button></a>
                         <a href="" data-target="#modal-delete-cuenta-{{$cuent->idCatCuentas}}" data-toggle="modal"><button class="btn btn-danger"><i class="fa fa-trash"></i> Eliminar</button></a>
                         @include('configuracion.cuenta.modalDelete')
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
    $('#dataTableCuenta').DataTable({
       "language": lang_spain


    });
            });



    
</script>