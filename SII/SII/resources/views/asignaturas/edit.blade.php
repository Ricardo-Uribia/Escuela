@extends('layouts.admin')
@section('principal')


<div id="page-wrapper">

<div class="col-md-9">

	<h1>REGISTRO DE ASIGNATURAS</h1>
	
	

	<form method="post" action="{{ url ('asignaturas') }}/{{$asignatura->idPlanEst}}">
		
		<input type="hidden" name="_token" value="{{ csrf_token() }}">

	
		<div class="form-group">
			<label> Clave de asignatura</label>
			<input type="text" name="claveAsig" class="form-control" placeholder="" value="{{ $asignatura->clave_asignatura }}">
		</div>

		<div class="form-group">
			<label> Nombre de asignatura</label>
			<input type="text" name="nombreAsig" class="form-control" placeholder="" value="{{ $asignatura->nombre_asignatura }}">
		</div>

		<div class="form-group">
			<label> Nombre corto </label>
			<input type="text" name="nombreCorto" class="form-control" placeholder="" value="{{ $asignatura->nombre_corto }}">
		</div>

		<div class="form-group">
			<label> Descripción</label>
			<input type="text" name="descrip" class="form-control" placeholder="" value="{{ $asignatura->descripcion }}">
		</div>

		<div class="form-group">
			<label> Cuatrimestre </label>
			<input type="text" name="cuatri" class="form-control" placeholder="" value="{{ $asignatura->cuatrimestre }}">
		</div>

		<div class="form-group">
			<label> Horas de teoría</label>
			<input type="text" name="hteoria" class="form-control" placeholder="" value="{{ $asignatura->horas_teoricas }}">
		</div>

		<div class="form-group">
			<label> Horas de práctica</label>
			<input type="text" name="hpractica" class="form-control" placeholder="" value="{{ $asignatura->horas_practicas }}">
		</div>

			<div class="form-group">
			<label> Área de conocimiento</label>
			<input type="text" name="area" class="form-control" placeholder="" value="{{ $asignatura->area_conocimiento }}">
		</div>

      <div>
   <fieldset class="fields2">
     
                 @if($asignatura->tipo_asignatura=='Oficial')
            <input type="radio" name="tipoAsig" value="Oficial" checked> Asignatura Oficial
            <input type="radio" name="tipoAsig" value="Opcional"> Asignatura Opcional
            @else
            <input type="radio" name="tipoAsig" value="Oficial"> Asignatura Oficial
            <input type="radio" name="tipoAsig" value="Opcional" checked> Asignatura Opcional
            @endif
            
</fieldset> <br>
</div>



<fieldset class="fields2">
      
        <label>Contabiliza Promedio</label>
        @if($asignatura->conta_promedio=='No')
            <input type="radio" name="contaProm" value="No" checked> No 
            <input type="radio" name="contaProm" value="Si"> Si 
            @else
            <input type="radio" name="contaProm" value="No"> No 
            <input type="radio" name="contaProm" value="Si" checked> Si 
        @endif
            
</fieldset> <br>	

		<button type="submit" class="btn btn-success pull-right">Actualizar</button>

		</form>
		</div>

</div>

	@endsection