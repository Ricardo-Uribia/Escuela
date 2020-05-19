@extends('layouts.admin')
@section('principal')


<div id="page-wrapper">

<div class="col-md-9">

	<center><h1>Crear Nuevo Plan De Estudios</h1></center>

	<br><br>

	<div>
		
		<form role="form-signin" class="form-horizontal" id="" method="POST" action="" > 
 		{{csrf_field()}} 

		<div class="form-group">
			<label> Clave de plan</label>
			<input type="text" name="clavePlan" class="form-control" placeholder="">
		</div>

		<div class="form-group">
			<label> Nombre de plan</label>
			<input type="text" name="nombrePlan" class="form-control" placeholder="">
		</div>

			<div class="form-group">
			<label> Carrera </label>
			<select class="form-control" name="nivel">
				<option>Seleccione</option>
			 @foreach(App\Models\Niveles::all() as $nuevoPlan)
				<option value="{{ $nuevoPlan->id }}"><?php echo $nuevoPlan->Nivel." en ".$nuevoPlan->Descripcion_Nivel ?></option>
				@endforeach
			</select>
		</div>
		
		

		<div class="form-group">
			<label> Oficio de auto</label>
			<input type="text" name="oficioAuto" class="form-control" placeholder="">
		</div>

		<div class="form-group">
			<label> Calif. Mínima</label>
			<input type="text" name="califMin" class="form-control" placeholder="">
		</div>

		<div class="form-group">
			<label> Calif. Máxima</label>
			<input type="text" name="califMax" class="form-control" placeholder="">
		</div>

		<div class="form-group">
			<label> Mínima Aprobatoria</label>
			<input type="text" name="aprobatoria" class="form-control" placeholder="">
		</div>

		<fieldset class="fields2">
      
        <label>Calcular Promedio</label>
      
            <input type="radio" name="calcPromedio" value="No"> No 
            <input type="radio" name="calcPromedio" value="Si"> Si 
            
</fieldset> <br>

		<button type="submit" class="btn btn-success pull-right"> Guardar </button>

	</form>
	</div>

		</div>

</div>

	@endsection