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
	    <h4 class="inline-block">Pre-Registro del Empleado</h4>
		<a href="{{url('/admin/list-empleados')}}" class="btn-neutral btn-secondary float-right">REGRESAR</a>
	</div>
	<div class="card-body">
		<div class="card card-primary card-outline card-outline-tabs">
			<div class="card-header p-0 border-bottom-0">
				<ul class="nav nav-tabs" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" data-toggle="pill" href="#data_basic" role="tab" aria-controls="data_basic" aria-selected="true">Datos básicos</a>
					</li>
				</ul>
			</div>
			<div class="card-body">
				<div class="tab-content">
					<div class="tab-pane fade active show" role="tabpanel" aria-labelledby="data_basic">
						<form method="POST" action="{{route('add-employee')}}" enctype="multipart/form-data">
	      					@csrf
							<div class="was-validated">
								<div class="form-group">
									<span><STRONG>Identificación:</STRONG></span>
									<hr>
								</div>
								<div class="form-horizontal">
									<div class="form-group">
										<label for="foto">Foto</label>
				                        <input  class="form-control" type="file"  name="foto" value="{{old('foto')}}" >
									</div>
									<div class="row">
										<div class="col-md-4">
											<label for="nombres">Nombres</label>
		                                	<input required type="text" required name="nombres" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{old('nombres')}}">
										</div>
										<div class="col-md-4">
											<label for="ap_paterno">Apellido Paterno</label>
		                                	<input required type="text" name="paterno" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{old('ap_paterno')}}">
										</div>
										<div class="col-md-4">
											<label for="ap_materno">Apellido Materno</label>
		                                	<input required type="text" required name="materno" class="form-control" onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{old('ap_materno')}}">
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">
											<label for="clave_ciudadana">Curp</label>
		                               		<input id="search_curp_employe" required type="text" class="form-control" name="clave_ciudadana" value="{{old('clave_ciudadana')}}" maxlength="18" placeholder="Ingrese Curp..." oninput="validarInput(this)" onkeyup="esValidoCurpOBlockeaBtnSubmit();javascript:this.value=this.value.toUpperCase();">
		                                	<pre id="resultado"></pre> 
		                                	<p id="val_res_p_" hidden="hidden"></p>
										</div>
										<div class="col-md-4">
											<label for="genero">Genero</label>
			                                <select required class="form-control" name="genero">
				                                	<option value="">--Selecciona--</option>
				                                    <option value="M">Masculino</option>
				                                    <option value="F">Femenino</option>        
			                                </select>
										</div>
										<div class="col-md-4">
											<label for="estado_civil">Estado Civil</label>
			                                <select required name="estado_civil" value="" class="form-control">
				                                	<option value="">--Seleciona--</option>
				                                    <option value="S">Soltero(a)</option>
				                                    <option value="C">Casado(a)</option>
				                                    <option value="U">Unión Libre</option>
				                                    <option value="D">Divorciado(a)</option>
				                                    <option value="V">Viudo(a)</option>
			                                </select>   
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-md-3">
												<label for="fecha_nacimiento">Fecha de Nacimiento</label>
		                                        <input class="form-control" id="fecha_nacimiento_empleado" onblur="calcularEdad(this.value)" name="fecha_nacimiento" required type="date">
											</div>
											<div class="col-md-2" style="padding-left: 0px; margin-top: 33px">
			                                    <input type="text" id="edad_txt" class="form-control" readonly="readonly"required style="border-left: none;">
			                                </div>
		                                    <input type="hidden" name="edad" value="" id="edad_" required>
		                                    <div class="col-md-4">
		                                    	<label for="estado_nacimiento_id">Estado de nacimiento</label>
					                            <select required name="estado_nacimiento_id" id="estado_nacimiento_id" class="form-control" >
					                            </select>  
		                                    </div>
		                                    <div class="col-md-3">
		                                    	<label for="municipio_nacimiento">Municipio Nacimiento</label>
					                            <select required name="municipio_nacimiento" id="municipio_nacimiento_id" class="form-control">
					                                <option value="">-- Seleccione primero un estado --</option>
					                            </select>
		                                    </div>
										</div>
									</div>
									<div class="form-group">
										<span ><STRONG>Domicilio & Localización:</STRONG></span>
									</div>
									<hr>
									<div class="form-group">
										<div class="row">
											<div class="col-md-6">
												<label for="telefono">Télefono</label>
		                                		<input  type="number" class="form-control" name="telefono" value="{{old('telefono')}}" max="10000000000" step="1">
											</div>
											<div class="col-md-6">
												<label for="celular">Celular</label>
		                                		<input  type="number" class="form-control" name="celular" value="{{old('celular')}}" max="10000000000" step="1">
											</div>
										</div>
										<div class="row">
											<div class="col-md-3">
												<label for="estadoActual">Estado</label>
				                                <select required name="estado_id_actual" id="estado_actual" class="form-control">
				                                </select>  
											</div>
											<div class="col-md-4">
												<label for="municipioActual">Municipio</label>
				     							<select required id="municipio_actual_id" name="municipio_actual"  value="{{old('municipio_actual')}}" class="form-control">
				     								 <option value="">-- Seleccione primero un estado --</option>       
				     							</select>
											</div>
											<div class="col-md-5">
		                                		<label for="email">Email</label>
		                            			<input required type="email"  name="email" class="form-control" placeholder="ejemplo@gmail.com" value="{{old('email')}}">
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<label for="domicilio">Domicilio</label>
		                                		<input required type="text" name="domicilio"  value="{{old('domicilio')}}" placeholder="Ejemplo: Calle 50 No. 145 entre 45 y 52 " class="form-control">
											</div>
											<div class="col-md-6">
												<label for="notas">Notas</label>
		                                		<textarea  name="notas_descripcion"  value="{{old('notas')}}" class="form-control"></textarea>
											</div>
										</div>
									</div>
								</div>
								<div class="form-group pull-right">
									<button type="submit" id="btn_guardar_empleado" disabled class="btn-neutral btn-success ">Guardar</button>	
		 							<input required type="reset" class="btn-neutral btn-danger" value="Cancelar">
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@section('scripts')
	<script defer src="{{asset('/CODE_DATA/public/js/internal/validarCURP.js')}}"></script>
	<script src="{{asset('/CODE_DATA/public/js/internal/estados_y_municipios_mexico.js') }}"></script>
	<script>
		function esValidoCurpOBlockeaBtnSubmit(){          
          let value_pre = document.getElementById('val_res_p_').innerHTML;
          let not_block = parseInt(value_pre) > 0; 
          blockearBtnSubmitFormFicha(not_block);                                  
    	}

    	function blockearBtnSubmitFormFicha(not_block){           
	      if (not_block) {                    
	          document.getElementById('btn_guardar_empleado').removeAttribute("disabled");
	      }else{                            
	          document.getElementById('btn_guardar_empleado').setAttribute("disabled", "disabled");
	      }
	    }

	function calcularEdad(date_input)
    {        
      const edad_input_visible = document.getElementById('edad_txt');
      const edad_input_oculto  = document.getElementById('edad_');                  

      if(validate_fecha(date_input)==true)
      {
        // Si la fecha es correcta, calculamos la edad
        var values=date_input.split("-");
        var dia = values[2];
        var mes = values[1];
        var ano = values[0];
 
        // cogemos los valores actuales
        var fecha_hoy = new Date();
        var ahora_ano = fecha_hoy.getYear();
        var ahora_mes = fecha_hoy.getMonth()+1;
        var ahora_dia = fecha_hoy.getDate();
 
        // realizamos el calculo
        var edad = (ahora_ano + 1900) - ano;
        if ( ahora_mes < mes )
        {
            edad--;
        }
        if ((mes == ahora_mes) && (ahora_dia < dia))
        {
            edad--;
        }
        if (edad > 1900)
        {
            edad -= 1900;
        }
 
        // calculamos los meses
        var meses=0;
        if(ahora_mes>mes)
            meses=ahora_mes-mes;
        if(ahora_mes<mes)
            meses=12-(mes-ahora_mes);
        if(ahora_mes==mes && dia>ahora_dia)
            meses=11;
 
        // calculamos los dias
        var dias=0;
        if(ahora_dia>dia)
            dias=ahora_dia-dia;
        if(ahora_dia<dia)
        {
            ultimoDiaMes=new Date(ahora_ano, ahora_mes, 0);
            dias=ultimoDiaMes.getDate()-(dia-ahora_dia);
        }        
        
        edad_input_visible.value =edad+" años";
        edad_input_oculto.value = edad;

        esValidoCurpOBlockeaBtnSubmit();       
      }else{
        alert("Fecha de nacimiento incorrecto, porfavor ingreselo correctamente")        
        blockearBtnSubmitFormFicha(block)        
      }
    }

    function validate_fecha(fecha)
    {
      var patron=new RegExp("^(19|20)+([0-9]{2})([-])([0-9]{1,2})([-])([0-9]{1,2})$");
      var estrucctura_valida= false;

      if(fecha.search(patron)==0)
      {
        var values=fecha.split("-");
        estrucctura_valida = isValidDate(values[2],values[1],values[0]);      
      }
      return estrucctura_valida;
    }

    function isValidDate(day,month,year)
    {
      var dteDate;    
      month=month-1;
      dteDate=new Date(year,month,day);    
      //Devuelva true o false..
      return ((day==dteDate.getDate()) && (month==dteDate.getMonth()) && (year==dteDate.getFullYear()));
    }

    (function() {
    	EstadosMunicipiosMexico.set('estado_actual','municipio_actual_id');
    	EstadosMunicipiosMexico.set('estado_nacimiento_id', 'municipio_nacimiento_id');
    }());
	</script>  
@endsection
@endsection