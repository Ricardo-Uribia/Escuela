@extends('layouts.admin')
@section('principal')

<div id="page-wrapper">

<div class="col-md-9">
                        

                           

	<h1>Registro</h1>
	<h4><a href="{{ route('lista.index') }}">Listar alumnos</a></h4>
	<hr>

	<form method="post" action="{{ url ('/lista') }} ">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">

		<div class="form-group">
			<label> Matricula</label>
			<input type="text" name="matricula" class="form-control" placeholder="Matricula">
		</div>

		<div class="form-group">
			<label> Nivel</label>
			<input type="text" name="nivel" class="form-control" placeholder="Nivel">
		</div>

		<div class="form-group">
			<label> Nombre</label>
			<input type="text" name="nombre" class="form-control" placeholder="Nombre">
		</div>

		<div class="form-group">
			<label> Genero</label>
			<input type="text" name="genero" class="form-control" placeholder="Genero">
		</div>

		<div class="form-group">
			<label> Status</label>
			<input type="text" name="status" class="form-control" placeholder="Status">
		</div>

		<div class="form-group">
			<label> Grupo</label>
			<input type="text" name="grupo" class="form-control" placeholder="Grupo">
		</div>

		

		<button type="submit" class="btn btn-default"> Registrar </button>

	</form>

	
	</div>



</div>
	@endsection