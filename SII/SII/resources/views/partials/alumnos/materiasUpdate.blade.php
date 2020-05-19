@extends('layouts.admin')
@section('principal')


<div id="page-wrapper">

<div class="col-md-9">

	<center><h1>ASIGNATURA</h1></center>

	<br><br>

	<div>
		
			<form role="form-signin" class="form-horizontal" id="" method="POST" action="" > 
 						{{csrf_field()}} 

		<div class="form-group">
			<label> Clave de asignatura</label>
			<input type="text" name="claveAsig" class="form-control" placeholder="hola" value="{{ $mat->Clave_Asignatura }}">
		</div>

		<div class="form-group">
			<label> Nombre de asignatura</label>
			<input type="text" name="nombreAsig" class="form-control" placeholder="" value="{{ $mat->Nombre_Asignatura }}">
		</div>

		<div class="form-group">
			<label> Nombre corto </label>
			<input type="text" name="nombreCorto" class="form-control" placeholder="" value="{{ $mat->Nombre_Corto }}">
		</div>

		<div class="form-group">
			<label> Descripción</label>
			<input type="text" name="descrip" class="form-control" placeholder="" value="{{ $mat->Descripcion }}">
		</div>

		<div class="form-group">
			<label> Cuatrimestre </label>
			<input type="text" name="cuatri" class="form-control" placeholder="" value="{{ $mat->Cuatrimestre }}">
		</div>

		<div class="form-group">
			<label> Horas de teoría</label>
			<input type="text" name="hteoria" class="form-control" placeholder="" value="{{ $mat->Horas_Teoria }}">
		</div>

		<div class="form-group">
			<label> Horas de práctica</label>
			<input type="text" name="hpractica" class="form-control" placeholder="" value="{{ $mat->Horas_Practica }}">
		</div>

			<div class="form-group">
			<label> Área de conocimiento</label>
			<input type="text" name="area" class="form-control" placeholder="" value="{{ $mat->Area_Conocimiento }}">
		</div>

      <div>
   <fieldset class="fields2">
     
   					 @if($mat->Tipo_Asignatura=='Oficial')
            <input type="radio" name="tipoAsig" value="Oficial" checked> Asignatura Oficial
            <input type="radio" name="tipoAsig" value="Opcional"> Asignatura Opcional
            		 @elseif($mat->Tipo_Asignatura=='Opcional')
            <input type="radio" name="tipoAsig" value="Oficial"> Asignatura Oficial
            <input type="radio" name="tipoAsig" value="Opcional" checked> Asignatura Opcional
            		@endif
            
</fieldset> <br>


</div>

<fieldset class="fields2">
      
        <label>Contabiliza Promedio</label>

        			 @if($mat->Conta_Promedio=='No')
            <input type="radio" name="contaProm" value="No" checked> No 
            <input type="radio" name="contaProm" value="Si"> Si 
            		 @elseif($mat->Conta_Promedio=='Si')
            <input type="radio" name="contaProm" value="No"> No 
            <input type="radio" name="contaProm" value="Si" checked> Si 
            		@endif
            
</fieldset> <br>

	<br>

		<button type="submit" class="btn btn-success pull-right"> Guardar </button>

	</form>
	</div>

		</div>

</div>

	@endsection