
<div class="row">
	<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
		@include('configuracion.ciclos.search')
	</div>
	<a href="{{url('/')}}/configuracion/ciclos/create"><button class="btn btn-success"><i class="fa fa-file"></i> Nuevo</button></a>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Inicial</th>
					<th>Final</th>
					<th>Periodo</th>
					<th>Descripción</th>
					<th>Código Corto</th>
					<th>Fecha Inicial</th>
					<th>Fecha Final</th>
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
		{{$ciclos->render()}}
	</div>
</div>

