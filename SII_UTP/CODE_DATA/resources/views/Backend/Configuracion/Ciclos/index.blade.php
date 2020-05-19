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
    <h4 class="inline-block">Ciclos</h4>
	<a href="{{url('/admin/ciclos/createForm')}}" class="btn-neutral btn-secondary float-right">Nuevo</a>
  </div>
  <div class="card-body">
  	<div class="table-responsive">
      <table class="table">
		<thead>
			<th>Id</th>
			<th>Inicial</th>
			<th>Final</th>
			<th>Periodo</th>
			<th>Descripción</th>
			<th>Fecha Inicial</th>
			<th>Fecha Final</th>
			<th></th>
		</thead>
        @foreach ($ciclos as $ciclo)
			<tr>
				<td>{{ $ciclo->id}}</td>
				<td>{{ $ciclo->inicia}}</td>
				<td>{{ $ciclo->finaliza}}</td>
				<td>{{ $ciclo->periodo}}</td>
				<td>{{ $ciclo->descripcion}}</td>
				<td>{{ $ciclo->fecha_inicial}}</td>
				<td>{{ $ciclo->fecha_fin}}</td>
				<td>
					<button value="{{ Crypt::encrypt($ciclo->id)}}" onclick="modelDelete(this, `{{url('/admin/config-ciclo/delete')}}`, 'Imposible eliminar un ciclo que ha sido utilizado')" class="btn-neutral btn-danger">Eliminar</button>
					<a href="{{url('/admin/config-ciclo/updateForm/'.Crypt::encrypt($ciclo->id))}}"><button class="btn-neutral btn-secondary">Editar</button></a>
				</td>
			</tr>
		@endforeach
	  </table>
  </div>
  <div class="card-footer">
  	{{$ciclos->links()}}
  </div>
</div>
@endsection


			
