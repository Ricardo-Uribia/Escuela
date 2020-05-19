@extends('layouts.admin')
@section('principal')
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			
			<h3><center>Asignación Manual De Profesores</center></h3>

			@if(count($errors)>0)
			<div class="alert alert-danger">
				<ul>
					@foreach($errors->all()  as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif
		</div>
	</div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	
			<form role="form-signin" class="form-horizontal" id="" method="POST" action="" > 
 						{{csrf_field()}} 
    <br><br>
		<div class="form-group">
			<label> Ciclo Escolar </label>
			<input type="text" name="clavePlan" class="form-control" placeholder="" disabled value="{{$ciclo->descripcion}}">
		</div>

		<div class="form-group">
			<label> Seleccione un grupo</label>
			<input type="text" name="nombrePlan" class="form-control" placeholder="">
		</div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<div class="form-group">
    
			<center><label> Profesor y asignatura que impartirá</label></center>
		</div>

		<div class="form-group">
			<label> Profesor </label>
			<input type="text" name="nombrePlan" class="form-control" placeholder="" disabled value="{{$profesor->profesores[0]->ClaveProfesor}}">
		</div>

		<div class="form-group">
			<label> Asignatura a impartir  </label>
			<input type="text" name="oficioAuto" class="form-control" placeholder="">
		</div>

		

		<button type="submit" class="btn btn-success pull-right"> Asignar </button>

	</form>
	</div>

	
	@endsection