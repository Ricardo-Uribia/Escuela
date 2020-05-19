@extends('layouts.admin')
@section('principal')
	
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

<h3>Información buscada de cuentas con índice <strong> {{$searchText}}</strong></h3>
<div class="row">
	<a href="{{url('/')}}/configuracion"><button class="btn btn-danger"><i class="fa fa-undo"></i> Volver</button></a>

	<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
		@include('configuracion.cuenta.search')
		@include('configuracion.cuenta.modal')
	</div>
	<a href="" data-target="#modal-cuenta-1" data-toggle="modal"><button class="btn btn-success"><i class="fa fa-file"></i> Nuevo</button></a>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Código de la Cuenta</th>
					<th>Descripción</th>
					<th>Nivel</th>
				</thead>
               @foreach ($cuenta as $cuent)
				<tr>
					<td>{{ $cuent->idCatCuentas}}</td>
					<td>{{ $cuent->codigoCuenta}}</td>
					<td>{{ $cuent->descripcion}}</td>
					<td>{{ $cuent->nivel}}</td>
					<td>
						<a href="{{url('/')}}/configuracion-cuenta-edit-{{$cuent->idCatCuentas}}"><button class="btn btn-info"><i class="fa fa-info-circle"></i> Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$cuent->idCatCuentas}}" data-toggle="modal"><button class="btn btn-danger"><i class="fa fa-trash"></i> Eliminar</button></a>
					</td>
				</tr>
				@include('configuracion.cuenta.modalDelete')
				@endforeach
			</table>
		</div>
		{{$cuenta->render()}}
	</div>
</div>


@endsection