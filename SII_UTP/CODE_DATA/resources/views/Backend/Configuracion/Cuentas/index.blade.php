@extends('layouts.admin')
@section('contenido')
@section('scripts')
  <script src="{{asset('/CODE_DATA/public/js/internal/swalDelete.js')}}"></script>
@endsection
@if(Session::has('success'))
	<div class="small-box bg-success">
		<div class="card-header">
			<center><p>{{Session::get('success')}}</p></center>
		</div>
	</div>
@endif
@if(Session::has('error'))
	<div class="small-box bg-danger">
		<div class="card-header">
			<center><p>{{Session::get('error')}}</p></center>
		</div>
	</div>
@endif
<div class="card border-neutral">
  <div class="card-header">
    <h4 class="inline-block">Cuentas</h4>
	<button data-toggle="modal" type="button" data-target="#modal-cuenta" class="btn-neutral btn-secondary float-right">Nuevo</button>
	@include('/Backend/Configuracion/Cuentas/Formularios/create')
  </div>
  <div class="card-body">
	  <div class="table-responsive">
	  	<table class="table">
			<thead>
				<th>Id</th>
				<th>Código</th>
				<th>Descripción</th>
				<th>Nivel</th>
				<th>Acumulativa</th>
				<th></th>
			</thead>
	        @foreach ($cuentas as $cuent)
			<tr>
				<td>{{ $cuent->id}}</td>
				<td>{{ $cuent->codigo}}</td>
				<td>{{ $cuent->descripcion}}</td>
				<td>{{ $cuent->nivel}}</td>
				<td>{{ $cuent->acumulativa}}</td>
				<td>
					<button class="btn-neutral btn-danger" value="{{Crypt::encrypt($cuent->id)}}" onclick="modelDelete(this, `{{url('/admin/config-cuenta/delete')}}`, 'Imposible eliminar esta cuenta ya ha sido asignado')">Eliminar</button>
					<a href="{{url('/admin/config-cuenta/updateForm/'.Crypt::encrypt($cuent->id))}}"><button class="btn-neutral btn-secondary"> Editar</button></a>
				</td>
			</tr>
			@endforeach
		</table>
	  </div>
	</div>
  <div class="card-footer">
  	{{$cuentas->links()}}
  </div>
</div>
@endsection
			
		
			
