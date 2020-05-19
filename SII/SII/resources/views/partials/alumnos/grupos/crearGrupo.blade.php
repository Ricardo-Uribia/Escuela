@extends('layouts.admin')
@section('principal')


<div id="page-wrapper">

<div class="col-md-9">

	<center><h1>Crear Nuevo Grupo</h1></center>

	<br><br>

	   <div class="input-group-addon">
                        <span class=""><b>Datos Básicos Del Grupo</b></span>
                    </div><br>
	<div>
		
			<form role="form-signin" class="form-horizontal" id="" method="POST" action="" > 
 						{{csrf_field()}} 

		

		<div class="form-group">
			<label> Código del grupo</label>
			<input type="text" name="codGrupo" class="form-control" placeholder="">
		</div>

		 <div class="form-group">
                                <label>Tipo de grupo</label>
                                <select class="form-control" name="tipoGrupo" value="">
                                    <option value="">Seleciona</option>
                                    <option value="Tradicional">TR-Tradicional (Todos los alumnos-Mismas las asignaturas)</option>
                                    <option value="Mezclado">ME-Mezclado (Una asignatura-alumnos de distintos grupos)</option>
                                </select>  
           </div>

		<div class="form-group">
			<label> Cupo Máximo</label>
			<input type="text" name="cupoMax" class="form-control" placeholder="">
		</div>

		 <div class="form-group">
           				<label>Turno</label>
                        <select class="form-control" name="turno" value="">
                             <option value="">Seleciona</option>
                              <option value="Matutino">MA-Matutino</option>
                              <option value="Vespertino">VE-Vespertino</option>
                                </select>  
           </div>

	<div class="input-group-addon">
          <span class=""><b>Datos de los Alumnos que se controlaran</b></span>
      </div><br>

<!--Hacer que llame a las carreras -->

		<div class="form-group">
			<label> Carrera </label>
			<select class="form-control" name="nivel">
				<option>Seleccione</option>
				@foreach($nivel as $niv)
				<option value="{{ $niv->id }}">{{ $niv->Identificador }}</option>
				@endforeach
			</select>
		</div>

		<div class="form-group">
			<label> Cuatrimestre </label>
			<input type="text" name="cuatri" class="form-control" placeholder="">
		</div>

		<div class="form-group">
			<label> Diferenciador del grupo </label>
			<input type="text" name="difGrupo" class="form-control" placeholder="">
			 <p>p.e,A,B,UNICO,VERDE,etc.</p>
		</div>

		<div class="input-group-addon">
          <span class=""><b>Profesores que atenderan el grupo</b></span>
      </div><br>

      <!--Hacer que llame a los profesores-->

   <div class="form-group">
           				<label>Titular</label>
                        <select class="form-control" name="titular" value="">
                             <option value="">Seleciona</option>
                             @foreach($profe as $prof)
                              <option value="{{$prof->id}}">{{$prof->NombreEmpleado}}</option>
                              @endforeach
                                </select>  
           </div>



		<button type="submit" class="btn btn-success pull-right"> Guardar </button>

	</form>
	</div>

		</div>

</div>

	@endsection