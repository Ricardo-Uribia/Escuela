@extends ('layouts.admin')
@section ('principal')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Configuracioón de Planes de Pago</h3>
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
					<th>Descripción</th>
					<th>Inicial</th>
					<th>Final</th>
					<th>Periodo</th>
				</thead>
               @foreach ($plan as $pl)
				<tr>
					<td>{{ $pl->idPlanesPagoMST}}</td>
					<td>{{ $pl->codigoPlan}}</td>
					<td>{{ $pl->descripcion}}</td>
					<td>{{ $pl->inicial }}</td>
					<td>{{$pl->final}}</td>
					<td>{{$pl->periodo}}</td>
					
					<td>
						<a href="{{url('/')}}/utp/planes-edit-{{$pl->idPlanesPagoMST}}/ciclo-{{$pl->idCiclo}}"><button class="btn btn-info"><i class="fa fa-info-circle"></i> Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$pl->idPlanesPagoMST}}" data-toggle="modal"><button class="btn btn-danger"><i class="fa fa-trash"></i> Eliminar</button></a>
					</td>
				</tr>
				
				@endforeach
			</table>
		</div>
		{{$plan->render()}}
	</div>
</div>

@endsection