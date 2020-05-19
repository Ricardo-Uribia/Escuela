@extends('layouts.admin')
@section('principal')
	<h1>Titulaci¨®n</h1>
	@include('admin.titulacion.search')
	<table>
		<thead>
			<tr>
				<td>Alumnos</td>
			</tr>
		</thead>
		<tbody>
		@foreach($alumnos as $alum)
			<tr>
				<th><a href="alumno/{{$alum->id}}">{{$alum->Nombres}}</a></th>
			</tr>
		@endforeach
		</tbody>
	</table>
	
@endsection