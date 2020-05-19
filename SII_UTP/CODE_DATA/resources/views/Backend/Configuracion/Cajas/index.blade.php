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
    <h4 class="inline-block">Cajas</h4>
	<a href="{{url('/admin/cajas/createForm')}}" class="btn-neutral btn-secondary float-right">Nuevo</a>
  </div>
  <div class="card-body">
  	<div class="table-responsive">
		<table class="table" id="dataTablesCaja">
			<thead>
				<th>Id</th>
				<th>Descripción</th>
				<th>Status</th>
				<th>Consecutivo</th>
				<th></th>
			</thead>
	        @foreach ($cajas as $caja)
				<tr>
					<td>{{ $caja->id}}</td>
					<td>{{ $caja->descripcion}}</td>
					<td>{{ $caja->status}}</td>
					<td>{{ $caja->consecutivo}}</td>
					<td>
						<button value="{{ Crypt::encrypt($caja->id)}}" onclick="modelDelete(this, `{{url('/admin/config-caja/delete')}}`, 'La caja ya ha sido asignada')" class="btn-neutral btn-danger">Eliminar</button>
						<a href="{{url('/admin/config-caja/updateForm/'.Crypt::encrypt($caja->id))}}"><button class="btn-neutral btn-secondary">Editar</button></a> 
					</td>
				</tr>
			@endforeach
		</table>
  	</div>
  </div>
  <div class="card-footer">
  	{{$cajas->links()}}
  </div>
</div>
@endsection
			
		