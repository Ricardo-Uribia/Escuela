@extends ('layouts.admin')
@section ('principal')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Conceptos de Cobros</h3>	
		<a href="{{url('')}}/utp/concepto/create"><button class="btn btn-success"><i class="fa fa-file"></i> Nuevo</button></a>
		<a href="{{url('/')}}/utp/venta/plan/create" ><button class="btn btn-danger"><i class="fa fa-chevron-left"></i> Regresar</button></a>
		<br><br>
		
	</div>
	<div class="col-lg-12">
			@include('admin.cobranza.conceptos.search')
		</div>
</div>

<br>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
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
				@if(empty($ven->conceptoCuenta))
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
				@endif
				@include('admin.cobranza.conceptos.modal')
				@endforeach
           	</table>    
	</div>
	{{$ventas->render()}}
</div>

@endsection