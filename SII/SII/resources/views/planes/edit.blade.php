@extends('layouts.admin')
@section('principal')

<div id="page-wrapper">

<div class="col-md-9">

	<h1>Registro de Planes</h1>
	
	

	<form method="post" action="{{ url ('update/plan') }}/{{$nuevoPlan->idPlanEst}}">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">

	
		<div class="form-group">
			<label> Clave de plan</label>
			<input type="text" name="clavePlan" class="form-control" placeholder="" value="{{ $nuevoPlan->clave_plan }}">
		</div>

		<div class="form-group">
			<label> Nombre de plan</label>
			<input type="text" name="nombrePlan" class="form-control" placeholder="" value="{{ $nuevoPlan->nombre_plan }}">
		</div>

		<div class="form-group">
			<label for="nivel"> Carrera </label>
			<select class="form-control" name="nivel">
			@foreach($nivel as $oconsulta)
			<option value="{{$oconsulta->idNivel}}"> <?php echo $oconsulta->Nivel." en ".$oconsulta->Descripcion_Nivel; ?></option>
			@endforeach
		    </select>
			
		</div>
		

		<div class="form-group">
			<label> Oficio de autorización</label>
			<input type="text" name="oficioAuto" class="form-control" placeholder="" value="{{ $nuevoPlan->oficio_auto }}">
		</div>

		<div class="form-group">
			<label> Calif. Mín. </label>
			<input type="text" name="califMin" class="form-control" placeholder="" value="{{ $nuevoPlan->calif_min }}">
		</div>

		<div class="form-group">
			<label> Calif. Max.</label>
			<input type="text" name="califMax" class="form-control" placeholder="" value="{{ $nuevoPlan->calif_max }}">
		</div>

		<div class="form-group">
			<label> Mín. Aprobatoria</label>
			<input type="text" name="aprobatoria" class="form-control" placeholder="" value="{{ $nuevoPlan->min_aprobatoria }}">
		</div>
		
			<fieldset class="fields2">
      
        <label>Calcular Promedio</label>
                 @if($nuevoPlan->Calc_Promedio=='No')
            <input type="radio" name="calcPromedio" value="No" checked> No 
            <input type="radio" name="calcPromedio" value="Si"> Si 
            @else
             <input type="radio" name="calcPromedio" value="No"> No 
            <input type="radio" name="calcPromedio" value="Si" checked> Si 
            @endif
                
            
</fieldset>		
		<button type="submit" class="btn btn-success pull-right">Actualizar</button>

		</form>
		</div>

</div>
</div>
	@endsection