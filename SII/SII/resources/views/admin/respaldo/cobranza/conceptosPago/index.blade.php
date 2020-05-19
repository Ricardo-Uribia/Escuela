@extends ('layouts.admin')
@section ('principal')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Conceptos de Pago <a href="{{url('/')}}/utp/conceptosPago/create"><button class="btn btn-success"><i class="fa fa-file"></i> Nuevo</button></a>
		<a href="{{url('/')}}/configuracion"><button class="btn btn-success"><i class="fa fa-file"></i> Nueva Cuenta</button></a></h3>
		@include('admin.cobranza.conceptosPago.search')
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Consepto Pago</h3>
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
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Código del Concepto</th>
					<th>Descripción</th>
					<th>Precio</th>
					<th>Impuesto</th>
					<th>Cuenta</th>
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
                         <a href="" data-target="#modal-delete-{{$consep->idConceptosPagos}}" data-toggle="modal"><button class="btn btn-danger"><i class="fa fa-trash"></i> Eliminar</button></a>
					</td>
				</tr>
				@include('admin.cobranza.conceptosPago.modal')
				@endforeach
			</table>
		</div>
		{{$concepto->render()}}
	</div>
</div>

@endsection