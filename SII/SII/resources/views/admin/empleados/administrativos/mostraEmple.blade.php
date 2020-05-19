@extends ('layouts.admin')
@section ('principal')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Empleados</h3>
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
			<table class="table table-striped table-bordered table-condensed table-hover" id="dataTableEmple">
				<thead>
                    <tr bgcolor="#457dde">
                    <th>IdEmpleado</th><th>Foto</th><th>NombreEmpleado</th><th>PrimerApellido</th><th>SegundoApellido</th><th>FechaNac.</th><th>Cargo</th>
                      </tr>
                     </thead>
                     <tbody>
                     @foreach($empleado as $item)
                       <tr>
                                        <!--<td>{{ $loop->iteration }}</td>-->
                   <td>{{ $item->idEmpleado }}</td><td>{{ $item->foto }}</td><td>{{ $item->nombreEmpleado }}</td><td>{{ $item->txtPaterno }}</td><td>{{ $item->txtMaterno }}</td><td>{{ $item->fechaNacimiento }}</td><td>{{ $item->cargo }}</td>

					<td>
						<a href="{{url('/')}}/ver/empleado/{{$item->idEmpleado}}"><button class="btn btn-info"><i class="fa fa-info-circle"></i> Ver</button></a>
                         <a href="" data-target="#modal-delete-{{}}" data-toggle="modal"><button class="btn btn-danger"><i class="fa fa-trash"></i> Eliminar</button></a>
                         <a href="" data-target="#modal-Asignar" data-toggle="modal"><button class="btn btn-success"><i class="fa fa-file"></i> Convert</button></a>
									@include('admin.empleados.administrativos.modalAsignar')
									<br><br>

					</td>
					
				
				</tr>
				
				@endforeach
			</table>
		</div>

	</div>
</div>

@push('dataTableEmple')
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
    $('#dataTableEmple').DataTable({
    	 "language": lang_spain


    });
            });



		
</script>
@endpush

@endsection