<div class="row">
	<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
		@include('configuracion.cajas.search')
	</div>
	<a href="{{url('/')}}/configuracion/nueva/caja"><button class="btn btn-success"><i class="fa fa-file"></i> Nuevo</button></a>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Descripción</th>
					<th>Status</th>
					<th>Consecutivo</th>
					<th>Cuenta</th>
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
		{{$cajas->render()}}
	</div>
</div>
