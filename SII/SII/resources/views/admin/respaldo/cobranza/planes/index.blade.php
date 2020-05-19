@extends ('layouts.admin')
@section ('principal')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Planes de Pago</h3>
		<a href="" data-target="#modal-plan-1" data-toggle="modal"><button class="btn btn-success"><i class="fa fa-file"></i> Nuevo</button></a>
		<a href="{{url('/')}}/configurar/planes"><button class="btn btn-success"><i class="fa fa-file"></i> Configurar Plan</button></a>
		@include('admin.cobranza.planes.modal')
		<br><br>
		@include('admin.cobranza.planes.search')
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
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Código del Plan</th>
					<th>Fecha de Inicio</th>
					<th>Fecha Fin</th>
					<th>Cantidad</th>
					<th>Inicial</th>
					<th>Final</th>
					<th>Periodo</th>
				</thead>
               @foreach ($plan as $pl)
				<tr>
					<td>{{ $pl->idPlanesPago}}</td>
					<td>{{ $pl->codigoPlan}}</td>
					<td>{{ $pl->fechaInicio}}</td>
					<td>{{ $pl->fechaFin}}</td>
					<td>$. {{$pl->precio}}</td>
					<td>{{ $pl->inicial}}</td>
					<td>{{ $pl->final}}</td>
					<td>{{ $pl->periodo}}</td>
					<td>
						<a href="{{url('/')}}/utp/planes/show-{{$pl->idPlanesPago}}"><button class="btn btn-info"><i class="fa fa-info-circle"></i> Ver</button></a>
                         <a href="" data-target="#modal-delete-{{$pl->idPlanesPago}}" data-toggle="modal"><button class="btn btn-danger"><i class="fa fa-trash"></i> Eliminar</button></a>
					</td>
				</tr>
				@include('admin.cobranza.planes.modalDelite')
				@endforeach
			</table>
		</div>
		{{$plan->render()}}
	</div>
</div>

@endsection