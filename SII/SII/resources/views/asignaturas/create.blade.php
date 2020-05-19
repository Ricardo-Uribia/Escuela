@extends('layouts.admin')
@section('principal')


<div id="page-wrapper">

<div class="col-md-12">

	<center><h1>Crear Nueva Asignatura para plan </h1></center>
	<br><br>
	

	<div>
		
		<form role="form-signin" class="form-horizontal" id="" method="POST" action="{{ url ('crear/asignatura') }}/{{$plan->idPlanEst}}" > 
 		
		
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="form-group">
			<label> Clave de asignatura</label>
			<input type="text" name="claveAsig" class="form-control" placeholder="">
		</div>

		<div class="form-group">
			<label> Nombre de asignatura</label>
			<input type="text" name="nombreAsig" class="form-control" placeholder="">
		</div>

		<div class="form-group">
			<label> Nombre corto </label>
			<input type="text" name="nombreCorto" class="form-control" placeholder="">
		</div>

		<div class="form-group">
			<label> Descripción</label>
			<input type="text" name="descrip" class="form-control" placeholder="">
		</div>

		<div class="form-group">
			<label> Cuatrimestre </label>
			<input type="text" name="cuatri" class="form-control" placeholder="">
		</div>

		<div class="form-group">
			<label> Horas de teoría</label>
			<input type="text" name="hteoria" class="form-control" placeholder="">
		</div>

		<div class="form-group">
			<label> Horas de práctica</label>
			<input type="text" name="hpractica" class="form-control" placeholder="">
		</div>

			<div class="form-group">
			<label> Área de conocimiento</label>
			<input type="text" name="area" class="form-control" placeholder="">
		</div>

      <div>
   <fieldset class="fields2">
     

            <input type="radio" name="tipoAsig" value="Oficial"> Asignatura Oficial
            <input type="radio" name="tipoAsig" value="Opcional"> Asignatura Opcional
            
</fieldset> <br>
</div>

<fieldset class="fields2">
      
        <label>Contabiliza Promedio</label>
      
            <input type="radio" name="contaProm" value="No"> No 
            <input type="radio" name="contaProm" value="Si"> Si 
            
</fieldset> <br>

	<br>

		<button type="submit" class="btn btn-success pull-right"> Guardar </button>

	</form>
	</div>

		</div>

</div>

	@endsection