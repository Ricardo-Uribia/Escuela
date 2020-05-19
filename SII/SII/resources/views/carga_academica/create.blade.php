@extends('layouts.admin')
	@section('principal')

	<form method="POST" action="{{ url('/carga_academica') }}">
		@csrf
		<div class="row">
			<div class="col-sm-3">
				<label for="profesor">Seleccione un Profesor</label>
			</div>
			<div class="col-sm-6">
				<select class="form-control" name="profesor" required="">
					<option value="">Seleccione un profesor</option>
					@foreach($profesores as $profesor)
					<option value="{{$profesor->id}}">{{$profesor->ClaveProfesor}}</option>
					@endforeach
				</select>
			</div>
		</div><br>

		<div class="row">
			<div class="col-sm-3">
				<label for="nivel">Seleccione un nivel</label>
			</div>
			<div class="col-sm-6">
				<select class="form-control" name="nivel" id="nivel" required="">
					<option value="">Seleccione un nivel</option>
					@foreach($niveles as $nivel)
					<option value="{{$nivel->id}}">{{$nivel->Nivel.' en '.$nivel->Descripcion_Nivel}}</option>
					@endforeach
				</select>
			</div>
		</div><br>
		<div class="row">
			<div class="col-sm-3">
				<label for="grupo">Seleccione un Grupo</label>
			</div>
			<div class="col-sm-6">
				<select class="form-control" name="grupo" id="grupo" required="">
					<option value="">Seleccione un grupo</option>
					@foreach($grupos as $grupo)
					<option value="{{$grupo->id}}">{{$grupo->Codigo_Grupo}}</option>
					@endforeach
				</select>
			</div>
		</div><br>


		<div class="row">
			<div class="col-sm-3">
				<label for="plan">Seleccione un Plan</label>
			</div>
			<div class="col-sm-6">
				<select class="form-control" name="plan" id="plan" required="">
					<option value="">Seleccione un plan</option>
				</select>
			</div>
		</div><br>

		<div class="row">
			<div class="col-sm-3">
				<label for="asignatura">Seleccione una Asignatura</label>
			</div>
			<div class="col-sm-6">
				<select class="form-control" name="asignatura" id="asignatura" required="">
					<option value="">Seleccione una asignatura</option>
				</select>
			</div>
		</div><br>
		
		<button type="submit" class="btn btn-success btn-md pull-right">Guardar</button>
	</form>

	

	@endsection