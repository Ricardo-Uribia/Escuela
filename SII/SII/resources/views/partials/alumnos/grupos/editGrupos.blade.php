@extends('layouts.admin')
@section('principal')


<div id="page-wrapper">

<div class="col-md-9">

	<center><h1>Editar Grupo</h1></center>

	<br><br>

	   <div class="input-group-addon">
                        <span class=""><b>Datos Básicos Del Grupo</b></span>
                    </div><br>
	<div>
		
			<form role="form-signin" class="form-horizontal" id="" method="POST" action="" > 
 						{{csrf_field()}} 

	<div class="col-md-12">
      <div class="was-validated">
      <div class="form-horizontal">
          <div class="form-group">
          <label for="cicloEsc" class="control-label col-xs-3">{{' Ciclo escolar'}}</label>
          <div class="col-auto">
       <select name="cicloEsc" class="custom-select mb-2 mr-sm-2 mb-sm-0"  required>
           <div class="form-group" {{$errors->has('cicloEsc')?'has-error':''}}">
            @foreach(App\Models\Ciclo::all() as $ci)
                <option value="{!!$ci->codigoCorto!!}">{{$ci->codigoCorto}}</option>
                @endforeach
      </select>

		<div class="form-group">
			<label> Código del grupo</label>
			<input type="text" name="codGrupo" class="form-control" placeholder="" value="{{ $nuevoGrupo->Codigo_Grupo }}">
		</div>

		 <div class="form-group">
                                <label>Tipo de grupo</label>
                                <select class="form-control" name="tipoGrupo" value="">
                                    <option value="">Seleciona</option>
                                    @if($nuevoGrupo->Tipo_Grupo=='Tradicional')
                                    <option value="Tradicional" selected>TR-Tradicional (Todos los alumnos-Mismas las asignaturas)</option>
                                     @elseif($nuevoGrupo->Tipo_Grupo=='Mezclado')
                                    <option value="Mezclado" selected>ME-Mezclado (Una asignatura-alumnos de distintos grupos)</option>
                                     @endif
                                </select>  
           </div>

          

		<div class="form-group">
			<label> Cupo Máximo</label>
			<input type="text" name="cupoMax" class="form-control" placeholder="" value="{{ $nuevoGrupo->Cupo_Maximo }}">
		</div>

		 <div class="form-group">
           				<label>Turno</label>
                        <select class="form-control" name="turno" value="">
                             <option value="">Seleciona</option>
                             @if($nuevoGrupo->Turno=='Matutino')
                              <option value="Matutino" selected>MA-Matutino</option>
                              @elseif($nuevoGrupo->Turno=='Vespertino')
                              <option value="Vespertino" selected>VE-Vespertino</option>
                              @endif
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
			<input type="text" name="cuatri" class="form-control" placeholder="" value="{{ $nuevoGrupo->Cuatrimestre }}">
		</div>

		<div class="form-group">
			<label> Diferenciador del grupo </label>
			<input type="text" name="difGrupo" class="form-control" placeholder="" value="{{ $nuevoGrupo->Diferenciador_Grupo }}">
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



		<button type="submit" class="btn btn-info pull-right"> Guardar </button>

	</form>
	</div>

		</div>

</div>

	@endsection