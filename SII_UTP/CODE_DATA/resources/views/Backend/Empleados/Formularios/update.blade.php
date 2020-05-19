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
	    <h4 class="inline-block">Edición de registro de empleado</h4>
		<a href="{{url('/admin/list-empleados')}}" class="btn-neutral btn-secondary float-right">REGRESAR</a>    
	</div>

	<div class="card-body"> 
		@if($empleado->foto != "")
		<div class="row">
			<div class="col-md-6">
				<img  src="{{asset("CODE_DATA/storage".App\Services\Internal\DocumentStatements::$PATH_EMPLE_IMG)."/".$empleado->foto}}" class="rounded img-fluid" alt="avatar" width="100px" height="100px">
				<p style="display:inline-block; position: absolute;left: 150px">
					<strong>Nombre:</strong> {{$empleado->nombres ." ".$empleado->paterno." ".$empleado->materno}}<br>
					<strong>Área o departamento:</strong> {{$empleado->departamento}}<br>
					<strong>Puesto:</strong> {{$empleado->cargo}}
				</p>
			</div>
			<div class="col-md-6">
				<form action="{{url('/admin/document-empleado/'.$empleado->id)}}" method="POST">
					@csrf
					<input type="submit" value="DOCUMENTOS" class="btn-neutral btn-secondary float-right">
				</form>
			</div>
		</div>
		@endif
		<br>

		<div class="card card-primary card-outline card-outline-tabs">
            <div class="card-header p-0 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="data-basic-tab" data-toggle="pill" href="#data-basic" role="tab" aria-controls="data-basic" aria-selected="true">Datos básicos</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="data-laboral-tab" data-toggle="pill" href="#data-laboral" role="tab" aria-controls="data-laboral" aria-selected="false">Datos laborales</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="estudios-otros-tab" data-toggle="pill" href="#estudios-otros" role="tab" aria-controls="estudios-otros" aria-selected="false">Estudios</a>
                  </li>
                </ul>
            </div>
            <form method="POST" action="{{url('/admin/edit-empleado/')}}" enctype="multipart/form-data" id="form-empleado">
  	      	@csrf
  	      	<input type="hidden" name="id" value="{{$empleado->id}}">
            <div class="card-body">
                <div class="tab-content" id="custom-tabs-three-tabContent">
                  	<div class="tab-pane fade show active" id="data-basic" role="tabpanel" aria-labelledby="data-basic-tab">
	                    <div class="row">
	                     	<div class="col-md-12">
		                        <div id="sidebar">
		                            <div class="input-group">
				                       	<span class="input-group-addon"><STRONG>Identidad</STRONG></span>  
				                    </div>
				                    <br> 
		                        </div>
		                    </div>
		                	<div class="col-md-4">
	  	                        <div class="form-group">
	  	                            <label for="foto">Subir o cambiar foto</label>
	  	                        	<input class="form-control" type="file"  name="foto" value="{{old('foto')}}" >
	  	                        </div>
	  	                    </div>
	  	                    <div class="col-md-4">
	  	                        <div class="form-group">
	  	                            <label for="nombres">Nombres</label>
	  	                    	    <input type="text" required name="nombres" class="form-control" value="{{$empleado->nombres}}">
	  	                        </div>
	  	                    </div>
	  	                    <div class="col-md-2">
	  	                        <div class="form-group">
	  	                            <label for="paterno">Apellido Paterno</label>
	  	                            <input type="text" name="paterno" class="form-control" value="{{$empleado->paterno}}">
	  	                        </div>
	  	                    </div>
	  	                    <div class="col-md-2">
	  	                    	<div class="form-group">
	  	                            <label for="materno">Apellido Materno</label>
	  	                            <input type="text" required name="materno" class="form-control" value="{{$empleado->materno}}">
	  	                        </div>
	  	                    </div>
	  	                    <div class="col-lg-4">
	  	                        <div class="form-group">
	  	                            <label for="clave_ciudadana">Curp</label>
	  	                            <input type="text" class="form-control" name="clave_ciudadana" value="{{$empleado->clave_ciudadana}}">  
	  	                        </div>
	  	                    </div>
	  	                    <div class="col-lg-4">
	  	                        <div class="form-group">
	  	                            <label for="estado_civil">Estado Civil</label>
	  	                            <select name="estado_civil" value="" class="form-control">
	  	                               	@if($empleado->estado_civil == 'S')
	  		                               	<option value="0">--Seleciona--</option>
	  		                                <option value="S" selected>Soltero(a)</option>
	  		                                <option value="C">Casado(a)</option>
	  		                                <option value="U">Unión Libre</option>
	  		                                <option value="D">Divorciado(a)</option>
	  		                                <option value="V">Viudo(a)</option>
	  		                            @endif
	  	                            </select>     
	  	                         </div>
	  	                    </div>
	  	                    <div class="col-lg-4">
	  	                        <div class="form-group">
	  	                            <label for="fecha_nacimiento">Fecha de Nacimiento</label>
	  	                            <input type="date" class="form-control" name="fecha_nacimiento" value="{{$empleado->fecha_nacimiento}}">  
	  	                        </div>
	  	                    </div>
	  	                    <div class="col-lg-3">
	  	                        <div class="form-group">
	  	                            <label for="genero">Genero</label>
	  	                            <select class="form-control" name="genero">
	  	                            @if($empleado->genero == 'M')
	  		                           	<option value="0">--Selecciona--</option>
	  		                            <option value="M" selected>Masculino</option>
	  		                            <option value="F">Femenino</option>  
	  		                        @else     
	  		                            <option value="0">--Selecciona--</option>
	  		                             <option value="M">Masculino</option>
	  		                             <option value="F" selected>Femenino</option> 
	  		                        @endif         
	  	                            </select>
	  	                        </div>
	  	                    </div>
	  						<div class="col-lg-3">
	  	                        <div class="form-group">
	  	                            <label for="estado_nacimiento_id">Estado de nacimiento</label>
	  	                            <select name="estado_nacimiento_id" id="estado_nacimiento_id" class="form-control" >
	  	                               	<option value="">--Selecciona--</option>
	  	                                @foreach($estados as $estado)
	  	                                   	@if($estado->id == $empleado->estado_nacimiento_id)
	  	                                	<option selected value="{{$estado->id}}">{{$estado->nom_ent}}</option>	
	  	                                    @else
	  	                                	<option value="{{$estado->id}}">{{$estado->nom_ent}}</option>	
	  	                                    @endif
	  	                                @endforeach
	  	                            </select>  
	  	                        </div>
	  	                    </div>
	  	                    <div class="col-md-3">
	  	                            <div class="form-group">
	  	                        	    <label for="municipio_nacimiento">Municipio Nacimiento</label>
	  	                                <input type="text" id="municipio_nacimiento" name="municipio_nacimiento"  value="{{$empleado->municipio_nacimiento}}" class="form-control"> 
	  	                            </div>
	  	                    </div>
	  	                    <div class="col-md-12">
	  	                            <div class="input-group">
	  	                            	<span class="input-group-addon"><STRONG>Domicilio & Localización:</STRONG></span>  
	  	                            </div>
	  	                    </div>
	  	                    <div class="col-lg-4">
	  	                            <div class="form-group">
	  	                                <label for="telefono">Télefono</label>
	  	                                <input type="number" class="form-control" name="telefono" value="{{$empleado->telefono}}">
	  	                            </div>
	  	                    </div>
	  	                    <div class="col-lg-4">
	  	                            <div class="form-group">
	  	                                <label for="celular">Celular</label>
	  	                                <input type="number" class="form-control" name="celular" value="{{$empleado->celular}}">
	  	                            </div>
	  	                    </div>
	  	                    <div class="col-lg-4">
	  	                        	<div class="form-group">
	  	                                <label for="email">Email</label>
	  	                            	<input type="email" readonly  name="email" class="form-control" value="{{$empleado->email}}">
	  	                            </div>
	  	                    </div>
	  	                    <div class="col-lg-3">
	  	                            <div class="form-group {{$errors->has('estado_id_actual') ? 'has-error' : ''}}">
	  	                                <label for="estadoActual">Estado</label>
	  	                                <select name="estado_id_actual" id="estado_actusl" class="form-control" >
	  	                                	<option value="0">--Selecciona--</option>
	  	                                	@foreach($estados as $estado)
	  	                                		@if($estado->id == $empleado->estado_id_actual)
	  	                                    	<option selected value="{{$estado->id}}">{{$estado->nom_ent}}</option>	
	  	                                    	@else
	  	                                    	<option value="{{$estado->id}}">{{$estado->nom_ent}}</option>	
	  	                                    	@endif
	  	                                    @endforeach
	  
	  	                                </select>  
	  	                            </div>
	  	                    </div> 
	  						<div class="col-lg-3">
	  	                            <div class="form-group ">
	  	                   	            <label for="municipioActual">Municipio</label>
	  	     							<input type="text" name="municipio_actual"  value="{{$empleado->municipio_actual}}" class="form-control">
	  	                            </div>
	  	                    </div>
	  	                    <div class="col-lg-3">
	  	                            <div class="form-group">
	  	                                <label for="domicilio">Domicilio</label>
	  	                                <input type="text" name="domicilio"  value="{{$empleado->domicilio}}" class="form-control">
	  	                            </div>	
	  	                    </div>
	  	                    <div class="col-lg-3">
	  	                            <div class="form-group">
	  	                                <label for="notas">Notas</label>
	  	                                <textarea name="notas_descripcion" class="form-control">{{$empleado->notas_descripcion}}</textarea>
	  	                            </div>
	  	                    </div>
	                    </div>
                  	</div>
	                <div class="tab-pane fade" id="data-laboral" role="tabpanel" aria-labelledby="data-laboral-tab">
	                	<div class="row">
	                    	<div class="col-md-12">
  		                        <div id="sidebar">
  		                            <div class="input-group">
  		                       			<span class="input-group-addon"><STRONG>Datos Laborares</STRONG></span>
  		                      		</div>
  		                      		<br> 
  		                        </div>
  		                    </div>
  		                    <div class="col-lg-3">
  		                        <div class="form-group">
  		                    	    <label for="num_empleado">No. Empleado</label>
  		                        	<input type="text" name="num_empleado"   placeholder="No. Empleado..." class="form-control" value="{{$empleado->num_empleado}}" >
  		                        </div>
  		                    </div>
  		                    <div class="col-lg-3">
  		                        <div class="form-group">
  		                            <label for="sueldo">Sueldo</label>
  		                            <input type="text" placeholder="Sueldo..." class="form-control" name="sueldo" value="{{$empleado->sueldo}}">
  		                        </div>
  		                    </div>
  		                    <div class="col-lg-3">
  		                        <div class="form-group {{$errors->has('sueldo') ? 'has-error' : ''}}">
  		                            <label for="sueldo">Tipo de empleado</label>
  		                            <select class="form-control" name="tipo"  onchange ="show_input_profesor(this)">
  		                            	<option value="">--Selecciona--</option>
  		                            	 @if($empleado->tipo == '1')
  		                                	<option value="1" selected>Administrativo</option>
  			                            	<option value="2">Profesor</option>
  			                            	<option value="3">Administrativo y Profesor</option>
  	                                    @elseif($empleado->tipo == '2')
  		                                    <option value="1">Administrativo</option>
  			                            	<option value="2" selected>Profesor</option>
  			                            	<option value="3">Administrativo y Profesor</option>
  			                            @elseif($empleado->tipo == '3')
  			                            	<option value="1">Administrativo</option>
  			                            	<option value="2" >Profesor</option>
  			                            	<option value="3" selected>Administrativo y Profesor</option>
  			                            @else
  			                            	<option value="1">Administrativo</option>
  			                            	<option value="2" >Profesor</option>
  			                            	<option value="3">Administrativo y Profesor</option>
  		                                @endif
  		                            </select>
  		                        </div>
  		                    </div>
  		                    @if($empleado->Profesor()->first() != "")
  		                    <div class="col-lg-3" id="clave_profesor" >
  		                        <div class="form-group">
  		                            <label for="clave_profesor">Clave profesor</label>
  		                            <input type="text" class="form-control" name="clave_profesor" value="{{$empleado->Profesor()->first()->clave}}">
  		                        </div>
  		                    </div>
  		                   @else
  							<div class="col-lg-3" id="clave_profesor" hidden="hidden">
  		                        <div class="form-group">
  		                            <label for="clave_profesor">Clave profesor</label>
  		                            <input type="text" class="form-control" name="clave_profesor" value="">
  		                        </div>
  		                    </div>
  		                   @endif
  		                   	<div class="col-md-12">
  	                            <div class="input-group">
  	                                <span class="input-group-addon"><STRONG>Ingreso Laboral:</STRONG></span>  
  	                            </div><br>
  	                        </div>
  							<div class="col-md-4">
  	                            <div class="form-group">
  	                                <label for="status_actual">Estatus</label>
  	                                <select class="form-control" name="status_actual" value="StatusActual" >
  	                                    <option value="0">Seleciona</option>
  	                                    @if($empleado->status_actual == 'A')
  		                                	<option value="A" selected>Activo</option>
  		                                    <option value="B">Baja</option>
  	                                    @elseif($empleado->status_actual == 'B')
  		                                    <option value="A" >Activo</option>
  		                                    <option value="B" selected>Baja</option>
  		                                @endif
  	                                </select>     
  	                            </div>   
  	                        </div>
  							<div class="col-md-4">
  	                            <div class="form-group">
  	                                <label for="fecha_ingreso">Fecha Ingreso</label>
  	                                <input type="date" name="fecha_ingreso" class="form-control" value="{{$empleado->fecha_ingreso}}" >
  	                             </div>
  	                        </div>
  	                        <div class="col-md-4">
  	                            <div class="form-group">
  	                                <label for="fecha_baja">Fecha Baja</label>
  	                                <input type="date" name="fecha_baja" class="form-control" value="{{$empleado->fecha_baja}}" >
  	                            </div>
  	                        </div>
  							<div class="col-md-4">
  	                            <div class="form-group">
  	                                <label for="area">Área o Departamento</label>
  	                                <input type="text" name="departamento" 
  	                                value="{{$empleado->departamento}}" class="form-control">
  	                            </div> 
  	                        </div>
  	                        <div class="col-md-4">
  	                            <div class="form-group">
  	                                <label for="cargo">Cargo</label>
  	                                <input type="text" name="cargo" class="form-control" value="{{$empleado->cargo}}">
  	                            </div>
  	                        </div>
  	                        <div class="col-md-4">
  	                            <div class="form-group">
  	                                <label for="contrato">Contrato</label>
  	                                <select class="form-control selectpicker" data-live-search="true"  name="contrato" >
  	                                    <option value="0">--Selecciona--</option>
  	                                    @if($empleado->contrato == 'A')
  		                                    <option value="A" selected>Temporal</option>
  		                                    <option value="B">Base</option>
  		                                @else
  		                                	<option value="A" >Temporal</option>
  		                                    <option value="B" selected>Base</option>
  		                                @endif
  	                                </select>
  	                            </div>
  	                        </div>
  	                        <div class="col-lg-12 ">
  	                            <div class="input-group">
  	                                <span class="input-group-addon"><STRONG>Empleo Anterior</STRONG></span>  
  	                            </div>
  	                        </div>
  	                        <div class="col-lg-4">
  	                            <div class="form-group">
  	                                <label for="depto_anterior">Área o Departamento (Anterior)</label>
  	                                <input type="text" class="form-control" name="depto_anterior" value="{{$empleado->depto_anterior }}">
  	                            </div>
  	                        </div>
  	                        <div class="col-lg-4">
  	                            <div class="form-group">
  	                                <label for="cargoAnterior">Cargo (Anterior)</label>
  	                                <input type="text" class="form-control" name="cargo_anterior" value="{{$empleado->cargo_anterior}}">
  	                            </div>
  	                        </div>                
  	                        <div class="col-lg-4">
  	                            <div class="form-group">
  	                                <label for="empresa_anterior">Empresa (Anterior)</label>
  	                                <input type="text" class="form-control" name="empresa_anterior" value="{{$empleado->empresa_anterior}}">
  	                            </div>
  	                        </div>    
	                    </div>
	                </div>
	                <div class="tab-pane fade" id="estudios-otros" role="tabpanel" aria-labelledby="estudios-otros-tab">
	                	<div class="row">
		                	<div class="col-md-12">
	  		                    <div id="sidebar">
	  		                        <div class="input-group">
		  		                      <span class="input-group-addon"><STRONG>Datos de estudios</STRONG></span>
		  		                    </div>
	  		                      	<br> 
	  		                    </div>
	  		                </div>
	  		                <div class="col-md-4">
  	                                <div class="form-group">
  	                                    <label for="institucion_estudios">Institución de Estudios</label>
  	                                    <input type="text" class="form-control" name="institucion_estudios" value="{{$empleado->institucion_estudios}}">
  	                                 </div>
  	                        </div>
  	                        <div class="col-lg-4">
  	                                <div class="form-group">
  	                                    <label for="nivel_estudios">Nivel de Estudios</label>
  	                                    <input type="text" class="form-control"  name="nivel_estudios" value="{{$empleado->nivel_estudios}}">
  	                                 </div>
  	                        </div>
  	                        <div class="col-lg-4">
  	                            <div class="form-group">
  	                                <label for="titulado">¿Titulado?</label>
  	                                <select class="form-control" name="titulado">
  		                              	<option value="0">--Selecciona--</option>
  		                              	@if($empleado->titulado == "1")	
  			                               	<option value="1" selected>Si</option>	
  			                               	<option value="0">No</option>	
  			                            @else
  			                            	<option value="1" >Si</option>	
  			                               	<option value="0" selected>No</option>	
  			                            @endif
  		                            </select> 
  	                            </div>
  	                        </div>
  	                        <div class="col-lg-6">
  	                            <div class="form-group ">
  	                                <label for="cedula_profecional">Cédula</label>
  	                                <input type="text" class="form-control" name="cedula_profecional"  value="{{$empleado->cedula_profecional}}">
  	                            </div>
  	                        </div>
  	                        <div class="col-md-6">
  	                            <div class="form-group ">
  	                                <label for="especialidad">Especialidad</label>
  	                                <input type="text" class="form-control" name="especialidad" value="{{$empleado->especialidad}}">
  	                            </div>
  	                        </div>
  		                </div>
	                </div>
                </div>
            </div>
		</div>
	</div>
	<div class="card-footer">
		<button type="submit" id="btnEnviar" class="btn-neutral btn-success">Guardar</button>	
		 <input required type="reset" class="btn-neutral btn-danger" value="Cancelar">
	</div>
	</form>
</div>
@section('scripts')
<script>

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
@endsection