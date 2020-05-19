@extends ('layouts.admin')
@section ('principal')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Empresas</h3>	
		<a href="{{url('')}}/configurar/empresa/create"><button class="btn btn-success"><i class="fa fa-file"></i> Nuevo</button></a>
		
		<br><br>
		
	</div>
	
</div>

<br>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover" id="dataTableEmpresa">
				<thead>
	
					<th>Nombre</th>
					<th>Domicilio</th>
					<th>Teléfono</th>
					<th>Email</th>
					<th>Numero de Convenio</th>
					<th>Opciones</th>
				</thead>

				@foreach ($empresa as $empre)
				<tr>
				
					<td>{{ $empre->nombreEmpresa}}</td>
					<td>{{ $empre->domicilio}}</td>
					<td>{{ $empre->telefono}}</td>
					<td>{{ $empre->email}}</td>
					<td>{{ $empre->numeroConvenio}}</td>
					<td>
						<a href="{{url('/')}}/configurar/empresa/edit-{{$empre->id}}"><button class="btn btn-primary"><i class="fa fa-edit" ></i> Editar</button></a>
                         <a href="" data-target="#modal-delete-empre-{{$empre->id}}" data-toggle="modal"><button class="btn btn-danger"><i class="fa fa-trash"></i> Anular</button></a>
					</td>
				</tr>
				@include('admin.empresa.modal')
				@endforeach
           	</table>    
	</div>
	
</div>
@push('dataTableEmpresa')
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
    $('#dataTableEmpresa').DataTable({
    	 "language": lang_spain


    });
            });



		
</script>
@endpush

@endsection