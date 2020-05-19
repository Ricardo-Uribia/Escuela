@extends('layouts.admin')
@section('principal')


<div id="page-wrapper">

<div class="col-md-9">

	<h1>Registro de Usuarios</h1>
	<h4><a href="{{ route('lista.index') }}">Listar alumnos </a></h4>
	<hr>

	<form method="post" action="{{ url ('/lista') }}/{{ $alumnos->id }}">
		<input name="_method" type="hidden" value="PUT">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">

		<div class="form-group">
			<label>Matricula</label>
			<input type="text" name="matricula" class="form-control" placeholder="Matricula" value="{{ $alumnos->Matricula }}">
		</div>

		<div class="form-group">
			<label>Nivel</label>
			<input type="text" name="nivel" class="form-control" placeholder="Nivel" value="{{ $alumnos->Nivel }}">
		</div>

		

		<div class="form-group">
			<label>Status</label>
			<input type="text" name="status" class="form-control" placeholder="Status" value="{{ $alumnos->Status }}">
		</div>

		<div class="form-group">
			<label>Grupo</label>
			<input type="text" name="grupo" class="form-control" placeholder="Grupo" value="{{ $alumnos->Grupo }}">
		</div>

		
		
		<button type="submit" class="btn btn-success">Actualizar</button>

		</form>
		</div>

</div>

	@endsection