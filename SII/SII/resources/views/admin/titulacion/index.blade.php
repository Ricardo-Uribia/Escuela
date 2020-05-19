@extends('layouts.admin')
@section('principal')
	<h1>Titulación</h1>
	
		<a href="{{url('/')}}/configurar/modalidades"><button class="btn btn-success"><i class="fa fa-file"></i> Modalidades</button></a>
		<br><br>
	@include('admin.titulacion.search')
	<table class="table table-striped table-bordered table-condensed table-hover">
		<thead>
			<tr>
				<td>Numero de Alumno</td>
				<td>Nombre</td>
				<td>Matrícula</td>
				<td>Status</td>
				<td>Opciones</td>
			</tr>
		</thead>
		<tbody>
		@foreach($alumnos as $alum)
			@if($alum->Status == 'E')
			<tr>
				<td>{{$alum->id}}</td>
				<td>{{$alum->Nombres}}</td>
				<td>{{$alum->matricula}}</td>
				<td>{{$alum->Status}}</td>
				<td><a href="alumno/{{$alum->id}}"><button class="btn btn-info"><i class="fa fa-info-star"></i> Empeza Trámite</button></a></td>
			</tr>
			@endif
		@endforeach
		</tbody>
	</table>
	{{$alumnos->render()}}
	
@endsection