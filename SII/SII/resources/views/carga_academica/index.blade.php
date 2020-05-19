@extends('layouts.admin')

@section('principal')
@if(session('status'))
  <div class="alert alert-success">
    {{ session('status') }}
  </div>
@endif
	<a href="{{ url ('/carga_academica/create') }}" class="btn btn-primary btn-md" >Crear Nueva Carga Academica</a><br><br>

	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Ciclo</th>
				<th>Inicial</th>
				<th>Final</th>
				<th>Periodo</th>
				<th>Grupo</th>
				<th>Profesor</th>
				<th>Plan</th>
				<th>Asignatura</th>
				<th>Nivel</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach($profesoresgrupos as $profesorgrupo)
			<tr>
			<td>{{$profesorgrupo->Ciclos->descripcion}}</td>
			<td>{{$profesorgrupo->Ciclos->inicial}}</td>
			<td>{{$profesorgrupo->Ciclos->final}}</td>
			<td>{{$profesorgrupo->Ciclos->periodo}}</td>
			<td>{{$profesorgrupo->Grupos->Codigo_Grupo}}</td>
			<td><?php echo $profesorgrupo->Profesores->Empleados->NombreEmpleado.' '.$profesorgrupo->Profesores->Empleados->txtPaterno.' '.$profesorgrupo->Profesores->Empleados->txtMaterno; ?></td>
			<td>{{$profesorgrupo->Planes->nombre_plan}}</td>
			<td>{{$profesorgrupo->Asignaturas->nombre_asignatura}}</td>
			<td>{{$profesorgrupo->Niveles->Identificador}}</td>
			<td>
				<form action="{{ url ('/eliminar/carga_academica') }}/{{$profesorgrupo->idProfesorGrupo}}" method="POST">
          			<input type="hidden" name="_token" value="{{ csrf_token() }}">
          			<button type="submit" class="btn btn-danger btn-sm" title="Delete Plan" onclick="return confirm(&quot;Desea eliminar esta carga academica?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
       			 </form>
       		</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	
@endsection