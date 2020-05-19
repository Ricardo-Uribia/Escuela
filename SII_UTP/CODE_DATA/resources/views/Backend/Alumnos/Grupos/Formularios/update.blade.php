@extends('layouts.admin')
@section('contenido')

@if($niveles == '[]' || $profesores == '[]')
	<h3 class="row">
		<span class="col-md-12">Revice si cuenta con registros en la siguientes tablas Carreras y Profesores para poder crear un nuevo grupo</span>
	</h3>
@else
<div class="row">	    
	<div class="col-md-12">          
	    @if(Session::has('error'))
	        <div class="alert alert-danger alert-dismissible" role="alert">
	            <p class="text-center">{{Session::get('error')}}</p>	            
	        </div>       
	        <br>
	    @endif
	</div>	

	<div class="col-md-2"></div>
	<div class="col-md-8">		
		<div class="card border-neutral">
			<div class="card-header text-center">    
			    <h3 class="inline-block">ACTUALIZAR GRUPO</h3>    
			    <a href="{{url('/admin/grupos')}}">      
			      <button class="btn-neutral sys-background-color float-right" style="margin-right: 10px">
			        REGRESAR
			      </button>    
			    </a> 
			</div>
			<div class="card-body">	
				<div class="row">		
					<div class="col-md-1"></div>
					<div class="col-md-10">						
						<form method="POST" action="{{route('form-update-grupo')}}"> 
						 	@csrf					 	
						 	<input type="hidden" name="grupo_id" value="{{$grupo->id}}">
							<div class="was-validated">
				              <div class="form-horizontal">
				              	<br>
							   	<h5>DATOS BÁSICOS DEL GRUPO</h5>	
							   	<hr>	                
								<div class="form-group">
									<label> Código del grupo</label>
									<input type="text" name="codigo" value="{{$grupo->codigo}}" class="form-control" placeholder="Ejemplo: TIC_1A" required onkeyup="javascript:this.value=this.value.toUpperCase();">
								</div>
								<div class="form-group">
					                <label>Tipo de grupo</label>
					                {{-- TUR_4-A --}}
					                <select class="form-control" name="tipo" required>
					                    <option value="">--Selecionar--</option>
					                    <option {{($grupo->tipo == "TR")? 'selected="selected"'  : NULL}} value="TR">TR-Tradicional (Todos los alumnos-Mismas las asignaturas)</option>
					                    <option {{($grupo->tipo == "MZC")? 'selected="selected"' : NULL}} value="MZC">ME-Mezclado (Una asignatura-alumnos de distintos grupos)</option>
					                </select>  
						        </div>
						        <div class="form-group row">						        	
									<div class="form-group col-md-6">
										<label> Cupo Máximo</label>
										<input type="number" name="cupo_maximo" value="{{$grupo->cupo_maximo}}" class="form-control" required>
									</div>
									<div class="form-group col-md-6">
							           	<label>Turno</label>
							            <select class="form-control" name="turno" required>
							                <option value="">--Selecionar--</option>
						                 	<option {{($grupo->turno == "Matutino")? 'selected="selected"'  : NULL}} value="M">
						                 		Matutino
						                 	</option>
						                  	<option {{($grupo->turno == "Vespertino")? 'selected="selected"'  : NULL}} value="V">
						                  		Vespertino
						                  	</option>
						                </select>  
							        </div>
						        </div>
							    
							    <h5>DATOS DE ALUMNOS PARA CONTROLAR</h5>
							    <hr>		                
								<div class="form-group">
									<label> Nivel </label>									
									<select class="form-control" name="nivel_id" id="nivel_id" onchange="getCarreras()" required>
										<option value="">--Seleccionar--</option>
										@foreach($niveles as $nivel)
										<option {{($grupo->carrera->nivel->id == $nivel->id )? 'selected="selected"'  : NULL}} value="{{$nivel->id}}">
											{{$nivel->nivel}}
										</option>
										@endforeach
									</select>
								</div>
								<div class="form-group">
									<label>Carrera</label>
									<select class="form-control" id="carrera_id" name="carrera_id" required>
									</select>
								</div>
								<div class="form-group row">	
									<div class="form-group col-md-6">
										<label> Cuatrimestre </label>
										<input type="number" name="cuatrimestre" class="form-control" value="{{$grupo->cuatrimestre}}" required>
									</div>
									<div class="form-group col-md-6">
										<label> Diferenciador del grupo </label>
										<input type="text" name="diferenciador" class="form-control" placeholder="p.e,A,B,UNICO,VERDE,etc." value="{{$grupo->diferenciador}}" required>									
									</div>
								</div>

								<h5>PROFESORES QUE ATENDERAN EL GRUPO</h5>	
								<hr>	               
						   		<div class="form-group">
					   				<label>Titular</label>
					   				<select class="form-control" name="profesor_id" required>
						                <option value="">--Seleccionar--</option>
										@foreach($profesores as $profesor)								
											<option {{($grupo->profesor_id == $profesor->id )? 'selected="selected"'  : NULL}} value="{{$profesor->id}}">
												{{$profesor->empleado->nombreCompleto().' /- '.
												'CLAVE: '.$profesor->clave.' /- '.
											   	' DEPTO: '.$profesor->empleado->departamento}}
											</option>										
										@endforeach  
					   				</select>
						        </div>						        
								<button type="submit" class="btn-neutral btn-success pull-right" id="btn_submit_id" disabled="disabled"> GUARDAR INFORMACIÓN </button>						
							  </div>
							</div>
						</form>								  	
					</div>
					<div class="col-md-1"></div>
				</div>  						
			</div>			
		</div>
	</div>
	<div class="col-md-2"></div>
</div>
{{-- _token para ir a buscar las carreras que le pertenecen a un nivel --}}
@csrf

@endif
@endsection
@section('scripts')

	<script defer>
		const BLOCK        = true;
		const NOT_BLOCK    = false;		
		const sel_carreras = document.getElementById('carrera_id');
		const btn_submit   = document.getElementById('btn_submit_id');
		getCarreras();

		function getCarreras(){						
			let nivel= document.getElementById('nivel_id');
			if (nivel.value != '') {
				load("{{url('/admin/grupos/getCarrerasFromNivel')}}", nivel);			
			}else{
				cleanElement(sel_carreras);
				blockButton(BLOCK);	
			}
		}

		function load(url, element)
	    {
         	beforeSend();
			const POST_  = new XMLHttpRequest();
			let formdata = new FormData();      	         

			formdata.append('_token', document.getElementsByName('_token')[0].value); 
			formdata.append(element.name, element.value);       

			POST_.open('POST', url);
			POST_.onload = function() {
				if (this.status >= 200 && this.status < 400) {	 					
					let response = JSON.parse(this.response);
					if (parseInt(response.state) == 200) {		        	
						innerHtmlSelect(response.data, sel_carreras,element.value);
						blockButton(NOT_BLOCK);
					}else{
						alert(response.data);
						cleanElement(sel_carreras);
						blockButton(BLOCK);
					}	            
				} else {              
					alert('Ups.. algo salió mal revise su conexión a internet, vuelva a intentar o contactese con el administrador.');
					cleanElement(sel_carreras);
					blockButton(BLOCK);
				}
			};
			POST_.onerror = function() {
			   alert('Ups.. algo salió mal revise su conexión a internet, vuelva a intentar o contactese con el administrador.');
				cleanElement(sel_carreras);
				blockButton(BLOCK);
			};
			POST_.send(formdata);
    	}


    	function innerHtmlSelect(data, element, findInFor){
    		let options = '<option value="">--Seleccionar--</option>';
    		for (var i = 0; i < data.length; i++) {    			
    			selected= findInFor == data[i].nivel_id ? 'selected="selected"' : null;    			
          		options += '<option '+selected+' value="'+data[i].id+'">'+data[i].descripcion+'</option>';        			
    		}
    		element.innerHTML = options;
    	}


     	function beforeSend(){     		
        	sel_carreras.innerHTML = '<option value="">Recuperando carreras. (Espere)..</option>';
      	}


      	function cleanElement(element){
        	element.innerHTML = '';           	        
      	}

        function blockButton(block){
        	if (block) {        		;
        		btn_submit_id.setAttribute('disabled','disabled');
        	}else{        		
        		btn_submit_id.removeAttribute('disabled');
        	}
        }

	</script>
@endsection