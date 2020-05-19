@extends('layouts.admin')
@section('principal')


<div id="page-wrapper">

<div class="col-md-9">

	<center><h1>Creacion de Kardex</h1></center>

	<br><br>

	<div>
		
			<form role="form-signin" class="form-horizontal" id="" method="POST" action="" > 
 						{{csrf_field()}} 

		<div class="form-group">
			<label> Seleccione el nivel para el cual desea crear el kardex </label>
			<select class="form-control" name="carrera">
				<option>Seleccione</option>
				@foreach($nivel as $niv)
				<option value="{{ $niv->id }}">{{ $niv->Identificador }}</option>
				@endforeach
			</select>
		</div>


                <div class="form-group">
			<label> Seleccione una plan de estudios </label>
			<select class="form-control" name="plan" id="planes_est">
				<option>Seleccione</option>
				@foreach($planes as $plan)
				<option value="{{ $plan->id }}">{{ $plan->Nombre_Plan }}</option>
				@endforeach
			</select>
		</div>
		
	<div class="form-group">
			<label> Seleccione una asignatura </label>
			<select class="form-control" name="asignatura" id="asignatura">
				<option>Seleccione</option>
			
			
			</select>
		</div>
		
		
		
		
		
		 <div class="form-group">
			<label> Seleccione el grupo para el cual desea crear el kardex </label>
			<select class="form-control" name="grup" id="grupo">
				<option>Seleccione</option>
				@foreach($grupo as $grup)
				<option value="{{ $grup->id }}">{{ $grup->Codigo_Grupo }}</option>
				@endforeach
			</select>
		</div>
		
		
		
<div class="table-responsive">

  <table class="table" >
      <thead>
          <th>Nombre</th>
          
          
      </thead>

      <tbody id="grupo_kardex">
      <tr>
            <td></td>
		
	
   </tr>
</tbody>
		
      </table>
   
  </div>
		

		<button type="submit" class="btn btn-success pull-right"> Crear </button>

	</form>
	</div>

		</div>

</div>

@push('kardex')
<script>
$("#planes_est").change(function (event) {
	$.get("../../kardex/" + event.target.value + "", function(response, state){
		console.log(response);
		$("#asignatura").empty();
		for ( i = 0; i<response.length; i++) {
			$("#asignatura").append("<option value='"+ response[i].id +"' > "  + response[i].Nombre_Asignatura + "</option>");
		}
	});
});

</script>

<script>
$("#grupo").change(function (event) {
	$.get("../../gruposkardex/" + event.target.value + "", function(response, state){
		console.log(response);
		$("#grupo_kardex").empty();
		for ( i = 0; i<response.length; i++) {
			$("#grupo_kardex").append("<tr><td><input type='hidden' name='id_Alumno[]' value="+ response[i].alumno_id +">"+ response[i].Nombres +"</td></tr>");
			
		}
	});
});

</script>
@endpush
	@endsection