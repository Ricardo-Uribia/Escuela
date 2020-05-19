@extends('layouts.admin')
@section('contenido')
@if(Session::has('error'))
	<div class="small-box bg-danger">
		<div class="card-header">
			<center><p>{{Session::get('error')}}</p></center>
		</div>
	</div>
@endif
<div class="card border-neutral">
	<div class="card-header">
	    <h4 class="inline-block">Carga de documentos</h4>
		<a href="{{url('admin/edit-empleado-form/'.$empleado->id)}}" class="btn-neutral btn-secondary float-right">REGRESAR</a>    
	</div>
	<div class="card-body"> 
		@if($empleado->foto != "")
		<div class="row">
			<div class="col-md-6">
				<img  src="{{asset('CODE_DATA/public/storage/'.$empleado->foto)}}" class="avatar img-thumbnail" alt="avatar" width="100px" height="100px">
				<p style="display:inline-block; position: absolute;left: 150px">
					<strong>Nombre:</strong> {{$empleado->nombres ." ".$empleado->paterno." ".$empleado->materno}}<br>
					<strong>Área o departamento:</strong> {{$empleado->departamento}}<br>
					<strong>Puesto:</strong> {{$empleado->cargo}}
				</p>
			</div>
		</div>
		@endif
		<br>
		<form method="POST" action="{{url('/upload/document')}}" enctype="multipart/form-data">
			@csrf
			<input type="hidden" name="empleado_id" value="{{$empleado->id}}">
		<div class="was-validated">
			<div class="form-horizontal">
				<div class="form-group">
						<label for="maestria">¿Estudio maestria?</label>
						<br>
						@if($empleado->maestria == "true")
						    <input type="radio" id="maestria_true" onclick="show_form_dom(true, 'maestria')" id="maestria" name="maestria" checked value="true">SI
						   	<input type="radio" onclick="show_form_dom(false, 'maestria')" name="maestria" value="false" >NO
						@else 
						   	<input type="radio" onclick="show_form_dom(true, 'maestria')" name="maestria"  value="true">SI
						  	<input type="radio" onclick="show_form_dom(false, 'maestria')" name="maestria" checked value="false" >NO
						@endif
				</div>
				<div class="form-group row" hidden="hidden" id="estudioMaestria">
					<div class="form-group col-md-2">
						<label for="maestria">Maestría en:</label>
				        <input type="text" placeholder="Maestria..." class="form-control"  name="nombre_maestria" value="{{$empleado->maestria}}">
					</div>
					<div class="form-group col-md-3">
						<label for="institucion_maestria">Institución Educativa</label>
		                <input type="text" class="form-control" placeholder="Inst. Educativa.."  name="institucion_maestria" value="{{$empleado->institucion_maestria}}">
					</div>
					<div class="form-group col-md-3">
						<label for="titulo_maestria">Titulado </label>
	                    @if($empleado->docto_cedula_maestria != "")
	                        <input type="text" disabled class="form-control" value="Recepcionado">
	                    @else
	                       	<input type="file" id="docto1"  name="docto_estudio[]">
	                    @endif
					</div>
					<div class="form-group col-md-3">
						<label for="cedula_maestria">Cédula </label>
		                @if($empleado->docto_cedula_maestria != "")
	                        <input type="text" disabled class="form-control" value="Recepcionado">
	                    @else
	                       	<input type="file" id="docto2"   name="docto_estudio[]">
	                    @endif
					</div>
				</div>
				<div class="form-group">
					<label for="doctorado">¿Doctorado?</label>
					<br>
					@if($empleado->doctorado == "true")
						<input type="radio" id="docto_true" onclick="show_form_dom(true, 'doctorado')" name="doctorado" checked value="true">SI
						<input type="radio" onclick="show_form_dom(false, 'doctorado')" name="doctorado" value="false" >NO
					@else
						<input type="radio" onclick="show_form_dom(true, 'doctorado')" name="doctorado"  value="true">SI
						<input type="radio" onclick="show_form_dom(false, 'doctorado')" name="doctorado" checked value="false" >NO
					@endif
				</div>
				<div class="form-group row" hidden="hidden" id="estudioDoctorado">
					<div class="form-group col-md-2">
						<label for="nombre_doctorado">Doctorado en:</label>
				        <input type="text" class="form-control" placeholder="Doctorado en..."  name="nombre_doctorado" value="{{$empleado->nombre_doctorado }}">
					</div>
					<div class="form-group col-md-3">
						<label for="institucion_doctorado">Institucion de Educativa</label>
		                <input type="text" class="form-control"  placeholder="Inst. Doctorado" name="institucion_doctorado" value="{{$empleado->institucion_doctorado }}">
					</div>
					<div class="form-group col-md-3">
						<label for="titulo_doctorado">Titulado </label>
	                    @if($empleado->docto_titulo_doctorado != "")
	                    	<input type="text" disabled class="form-control" value="Recepcionado">
	                    @else
	                        <input type="file" id="docto3"   name="docto_estudio[]">
	                    @endif
					</div>
					<div class="form-group col-md-3">
						<label for="cedula_doctorado">Cédula </label>
		                @if($empleado->docto_cedula_doctorado != "")
	                    	<input type="text" disabled class="form-control" value="Recepcionado">
	                    @else
	                        <input type="file" id="docto4"  name="docto_estudio[]">
	                    @endif
					</div>
				</div>
				<div class="form-group">
					<label for="post_doctorado">¿Estudio Post Doctorado?</label>
					<br>
					@if($empleado->doctorado == "true")
						<input type="radio" id="post_docto_true" name="post_doctorado" onclick="show_form_dom(true, 'postDoctorado')" checked value="true">SI
						<input type="radio"  name="post_doctorado" onclick="show_form_dom(false, 'postDoctorado')" value="false" >NO
					@else
						<input type="radio" name="post_doctorado" onclick="show_form_dom(true, 'postDoctorado')"  value="true">SI
						<input type="radio" name="post_doctorado" onclick="show_form_dom(false, 'postDoctorado')" checked value="false" >NO
					@endif
				</div>
				<div class="form-group row" hidden="hidden" id="estudioPostDoctorado">
					<div class="form-group col-md-2">
						<label for="nombre_post_doctorado">PostDoctorado en:</label>
				        <input type="text" placeholder="PostDoctorado en..." class="form-control"  name="nombre_post_doctorado" value="{{$empleado->nombre_post_doctorado}}">
					</div>
					<div class="form-group col-md-3">
						<label for="institucion_post_doctorado">Institucion de Educativa</label>
		                <input placeholder="Inst. postDoctorado" type="text" class="form-control"  name="institucion_post_doctorado" value="{{$empleado->institucion_post_doctorado}}">
					</div>
					<div class="form-group col-md-3">
						<label for="titulo_post_doctorado">Titulado </label>
	                    @if($empleado->docto_titulo_post_doctorado != "")
	                    	<input type="text" disabled class="form-control" value="Recepcionado">
	                    @else
	                        <input type="file" id="docto5"  name="docto_estudio[]">
	                    @endif
					</div>
					<div class="form-group col-md-3">
						<label for="cedula_post_doctorado">Cédula </label>
		                @if($empleado->docto_cedula_post_doctorado != "")
	                    	<input type="text" disabled class="form-control" value="Recepcionado">
	                    @else
	                        <input type="file" id="docto6"  name="docto_estudio[]">
	                    @endif
					</div>
				</div>
			</div>
			<button type="submit" id="btnEnviar" disabled class="btn-neutral btn-success pull-right">GUARDAR</button>
		</div>
		</form>
	</div>
</div>
<script>
	var isCheckePost = document.getElementById('post_docto_true').checked;
	var isCheckedDoct = document.getElementById('docto_true').checked;
	var isCheckedMaestr = document.getElementById('maestria_true').checked;

	
	const hiddenInputDoc1 = document.getElementById('docto1');
	const hiddenInputDoc2 = document.getElementById('docto2');
	const hiddenInputDoc3 = document.getElementById('docto3');
	const hiddenInputDoc4 = document.getElementById('docto4');
	const hiddenInputDoc5 = document.getElementById('docto5');
	const hiddenInputDoc6 = document.getElementById('docto6');

	if (isCheckePost) {
		show_form_dom(true,'postDoctorado');
	}
	 if(isCheckedDoct){
		show_form_dom(true,'doctorado');
	}
	 if(isCheckedMaestr){
		show_form_dom(true,'maestria');
	}


	function show_form_dom(res, campo){ 
		const btnEnviar 	  = document.getElementById('btnEnviar'); 
	 	switch(campo){
	 		case 'maestria':
	 			if (res) {
	 				estudioMaestria.removeAttribute('hidden');
	 				btnEnviar.removeAttribute('disabled');
	 			}else{
	 				estudioMaestria.setAttribute('hidden', 'hidden');
	 				btnEnviar.setAttribute('disabled', 'disabled');
	 			}
	 		break;
	 		case 'doctorado':
	 			if (res) {
	 				estudioDoctorado.removeAttribute('hidden');
	 				btnEnviar.removeAttribute('disabled');
	 			}else{
	 				estudioDoctorado.setAttribute('hidden', 'hidden');
	 				btnEnviar.setAttribute('disabled', 'disabled');
	 			}
	 		break;
	 		case 'postDoctorado':
	 			if (res) {
	 				estudioPostDoctorado.removeAttribute('hidden');
	 				btnEnviar.removeAttribute('disabled');
	 			}else{
	 				estudioPostDoctorado.setAttribute('hidden', 'hidden');
	 				btnEnviar.setAttribute('disabled', 'disabled');
	 			}
	 		break;
	 	}    
    } 

    function show_input_profesor(evt) {
      	if(evt.value != 0){
      		if (evt.value == 2 || evt.value ==3) {
      			clave_profesor.removeAttribute('hidden');
      		}else{
      			clave_profesor.setAttribute('hidden', 'hidden')
      		}
      	}
      }  
</script>


@endsection