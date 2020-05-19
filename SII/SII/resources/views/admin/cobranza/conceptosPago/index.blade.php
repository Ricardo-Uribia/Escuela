@extends ('layouts.admin')
@section ('principal')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Lista de Conceptos de Pago <a href="{{url('/')}}/utp/conceptosPago/create"><button class="btn btn-success"><i class="fa fa-file"></i> Nuevo</button></a>
		<a href="{{url('/')}}/configuracion"><button class="btn btn-success"><i class="fa fa-file"></i> Nueva Cuenta</button></a></h3>
		
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Concepto Pago</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>Error al crear cuenta {{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif
		</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover" id="dataTableConceptoPago">
				<thead>
					<th>Id</th>
					<th>Código del Concepto</th>
					<th>Descripción</th>
					<th>Precio</th>
					<th>Impuesto</th>
					<th>Cuenta</th>
					<th></th>
				</thead>
				 @foreach ($concepto as $consep)
				<tr>
					<td>{{ $consep->idConceptosPagos}}</td>
					<td>{{ $consep->codigoConcepto}}</td>
					<td>{{ $consep->descripcion}}</td>
					<td>$. {{ $consep->precio}}</td>
					<td>$. {{ $consep->impuesto}}</td>
					<td>{{ $consep->codigoCuenta}}</td>
					<td>
						<a href="{{url('/')}}/utp/conceptosPago-edit-{{$consep->idConceptosPagos}}"><button class="btn btn-info"><i class="fa fa-info-circle"></i> Editar</button></a>
                         <!--<a href="" data-target="#modal-delete-{{$consep->idConceptosPagos}}" data-toggle="modal"><button class="btn btn-danger"><i class="fa fa-trash"></i> Eliminar</button></a>-->
                         
                         <!--<a href="{{url('/')}}/utp/conceptosPago-destroy-{id}{{$consep->idConceptosPagos}}">
                             <button class="btn btn-primary"><i class="fa fa-info"></i> delecte</button></a>-->
                             
                        <form action="{{ url('utp/conceptosPago/destroy/') }}/{{ $consep->idConceptosPagos }}" method="POST" onclick="return confirm('Seguro que quieres eliminar este empleado')"> 

                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button type="submit" class="btn btn-danger fa fa.fa-trash-o">Eliminar</button>   
                         </form>
                         
                        
					</td>
				</tr>
				
				@endforeach
			</table>
		</div>
	
	</div>
</div>

@push('dataTableConceptoPago')
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
    $('#dataTableConceptoPago').DataTable({
    	 "language": lang_spain


    });
            });



		
</script>
@endpush

@endsection