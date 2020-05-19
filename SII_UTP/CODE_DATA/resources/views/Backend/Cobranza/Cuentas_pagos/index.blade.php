@extends('layouts/admin')
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
<div class="card border-neutral">
	<div class="card-header">
		<h3 class="inline-block">Lista de conceptos de pago</h3>
		<a href="{{url('/admin/create/concepto/pago')}}" class="btn-neutral btn-secondary float-right">Nuevo concepto de cobro</a>
	</div>
	<div class="table-responsive">
		<div class="card-body">
		<table class="table">
			<thead>
				<th>ID</th>
				<th>Código</th>
				<th>Descripción</th>
				<th>Opciones</th>
			</thead>
			<tbody>
				@foreach($conceptos as $key => $concepto)
				<tr>
					<td>{{$key+1}}</td>
					<td>{{$concepto->producto->codigo}}</td>
					<td>{{$concepto->producto->descripcion}}</td>
					<td>
						<form style="display: inline-block;" action="{{url('/admin/config/concepto')}}" method="POST">
							@csrf
							<input type="hidden" name="concepto_id" value="{{$concepto->id}}">
							<button class="btn-neutral"> Ver</button>
						</form>
						@if($concepto->producto->alumnocxcs->count() > 0)
								<small class="inline-block text-danger">Concepto Asignado</small>
						@else
							<button onclick="modelDelete(this, `{{url('/admin/config/delete/concepto')}}`, `{{$concepto->id}}`, 'Imposible eliminar, se ha asignado este concepto.')"  id="btnDeleteConcept" class="btn-neutral btn-danger" value="{{$concepto->id}}"> Eliminar</button>
						@endif
					</td>	
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	</div>
	<div class="card-footer clearfix">
		{{$conceptos->links()}}
	</div>
</div>
@endsection