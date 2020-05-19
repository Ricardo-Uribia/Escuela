@extends('layouts.app')
@section('estilos')
   <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('/CODE_DATA/public/css/font-awesome.css')}}" />   
    <style>
      .disabledContent {
          pointer-events: none;
          opacity: 0.4;
      }
    </style>

@endsection

@section('contenido')

 <a name="Ancla" id="a"></a>
  <br/>
  <br/>
  <br/>
  @if(
      ($nivel != '[]' && $cfgstatusAlumno != '' && $estados != '[]')      || 
      ($nivel != null && $cfgstatusAlumno != null && $estados != null )
  )
    <div class="container">      
        <div class="row">
          @if(Session::has('success'))
            <div class="col-md-2"></div>
            <div class="col-md-8">              
              <div class="alert alert-success alert-dismissible" role="alert">
                  <p class="text-center">{{Session::get('success')}}</p>
              </div> 
            </div>
            <div class="col-md-2"></div>
          @endif


            <div class="col-md-1"></div>
            
            <div id="accordion" class="col-md-10">
              <div class="card">
                <div class="card-header bg-danger text-light" id="headingOne">
                  <h5 class="mb-0"><h3>
                    ¡ATENCIÓN!<br> Antes de iniciar, lee detenidamente la siguiente información.</h3><hr>
                    <h5 class="text">Después de haber leído la información, ingresa en el siguiente botón y comienza tu registro o reingresa al sistema para completar tu registro:</h5>
                    <button class="btn btn-primary float-right" id="btn_entiendo_advertencia_id" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                     INICIAR REGISTRO/REINGRESAR
                    </button>
                    
                  </h5>
                </div>

                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion" style="border-color: red; border-style: solid; border-width: 1px">
                  <div class="card-body">
                      
                    <div class="alert alert-dark">
                        <h4> 
                        Estimado aspirante:<br><br>
                        El proceso de registro consta de 4 pasos que deberás realizar en su totalidad para poderlo finalizar exitosamente.</h4><br>
                        
                    </div>
                    
                    <div class="alert alert-primary">
                        <h4>
                        	<ul>
	                        	<li class="text-body-description"><b class="text-blue">PASO 1: </b> Ingreso de datos y documentos </li>
	                        	
	                       	</ul>
	                       	
                            <p class="text">* Al finalizar la carga de estos documentos, el sistema te genera la ficha de pago 
                                en la que se encuentran los datos necesarios para realizar el siguiente paso.</p>
                    </div>
                    
                    <div class="alert alert-primary">
                        <h4>
                        	<ul>
	                        	
	                        	<li class="text-body-description"><b class="text-blue">PASO 2: </b> Pago del derecho al EXANI II, 2020</li>
	                        	
	                        </ul>
	                        <br>
	                        <p class="text">Puedes realizarlo en cualquiera de estas modalidades:</p>
    
    	<ul>
		<li class="text-body-description"><class="text-blue">Pago en línea, desde la aplicación de Banco Azteca (debes tener cuenta en este banco)</li>
		<li class="text-body-description"><class="text-blue">Acudiendo a la sucursal de Banco Azteca más cercana a tu domicilio</li>
	
	    </ul>
                        </h4>
                        
                   
                    
                    <div class="alert alert-warning">
                        <h5>
                               <div class="text-danger"><b>PRECAUCIÓN</b></div>
                        
                      ANTES DE SALIR REALIZAR TU PAGO EN VENTANILLA DE LA SUCURSAL BANCARIA, <B>TE EXHORTAMOS A SEGUIR TODAS LAS INDICACIONES SANITARIAS QUE HAN EMITIDO LAS AUTORIDADES DE SALUD ESTATAL Y FEDERAL.</B>
                        </h5>
                        
                       <center> <a href="https://www.youtube.com/watch?v=Hp21evOHQSI" target="_blank"> <h5> <b>
                                  ¡CONSÚLTALAS AQUÍ!</b></h5>
                                </a> </center>
                        
                        </div>
                     </div>    
                    
                      <div class="alert alert-primary">
                        <h4>
                        	<ul>
	                        	<li class="text-body-description"><b class="text-blue">PASO 3: </b> Ingresa al sistema tu comprobante de pago</li>
	                        
	                       	</ul>
                        </h4>
                    </div>
                    
                      <div class="alert alert-primary">
                        <h4>
                        	<ul>
	                        
	                        	<li class="text-body-description"><b class="text-blue">PASO 4: </b> Obtener tu pase de ingreso en el sistema CENEVAL</li>
	                       	</ul>
	                    <b>Estará disponible del 01 al 12 de junio de 2020</b><br>
	                     </h4>
	                   </div>
	                   
	                   <div class="alert alert-danger">
                                <h5>
                                
                                <div class="text-danger"><b> *DEBERÁS HABER REALIZADO EL PROCESO COMPLETO PARA PODER TENER ACCESO AL EXAMEN* </b></div>
                        
                         </h5>
                        </div>
	                   
	                   <div class="alert alert-dark">
	                   <h4>    
                        Si tienes alguna duda durante el proceso, puedes enviarnos un inbox en la página de facebook y con gusto te apoyamos.
                
                        </h4>
                       
                         <hr>
                         
                           <a href="#Ancla"><h4>Regresar arriba para "INICIAR REGISTRO"</h4></a> 
                    
                    </div>
                     
                      
                     
                    <br>
                  </div>
                </div>
              </div>
            </div>                      
            <div class="col-md-1"></div>
            <div class="col-md-12" style="height: 30px"></div>            
            <div class="col-md-12" id="alerts_">                                
                @if(Session::has('error'))
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <p class="text-center">{{Session::get('error')}}</p>
                    </div>       
                @endif
            </div>
            
            <div class="col-md-1 col"></div>
            <div class="col-md-10 col-12 disabledContent" id="div_formulario_registro_id">
                
                <div class="content-wrapper">
                    <div class="container-fluid">
                      <div style="background-color: #FFF;">                                          
                        <div class="jumbotron">          
                          <div class="row">
                            <div class="col-md-6">
                              <br>
                              <br>
                              <h4>SISTEMA DE REGISTRO EN LÍNEA</h4>
                              <h4>VALIDACIÓN DE CURP`S</h4><br><h5>Aquí podrás:</h5>   
                              <ul>
                                  <li>Validar el formato de la CURP y asegurarte de no tener un registro previo, y</li>
                                  <li>SI YA HABÍAS COMENZADO EL REGISTRO, reingresar al sistema para subir tu ficha de pago y concluir el registro.</li>
                              </ul>
                              
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-4" id="div_digite_curp_id">

                              <label for="continuar_curp_reg"> 
                                POR FAVOR, INGRESA TU CURP  <br>
                                para continuar.
                                <br>
                                <br>
                                <a href="https://consultas.curp.gob.mx/CurpSP/gobmx/inicio.jsp" target="_blank">
                                  Si no conoces tu CURP consúltala y valídala AQUI
                                </a>
                                @if(Session::has('error'))
                                 <img src="{{asset('/CODE_DATA/public/img/internal_statics/arrow-red-down.png')}}" class="img-fluid float-right" style="height: 70px">
                                @endif
                              </label>
                              <div class="input-group">                                
                                  <div class="form-row">                                     
                                    <form id="form_validate_curp_id">
                                      <input type="text" 
                                             class="form-control col-md-9" 
                                             id="search_curp" 
                                             name="curp_alumno" 
                                             value="{{old('curp_alumno')}}" 
                                             placeholder="Ingrese CURP.." 
                                             required maxlength="18" 
                                             oninput="validarInputSeguimientoFicha(this)" onkeyup="esValidoCurpOBlockeaBtnSearchSubmit();javascript:this.value=this.value.toUpperCase();">
                                        <pre id="resultado_buscar_curp"></pre>
                                        <p id="val_res_buscar_curp" hidden="hidden"></p>
                                      </input>                                         
                                      <p id="mensage_enviando_post_id" class="text-danger"></p>
                                    </form>
                                    <button class="input-group-text text-light bg-primary col-md-3" id="btn_continuar_curp_reg" type="button" disabled="disabled" onclick="sendCurpJSONValidate()" style="display: inline-block;">
                                        Buscar
                                    </button>
                                  </div>                                                      
                              </div>
                            </div>
                          </div>                
                        </div>  
                        
                        
                        
                        
                        <div style="margin-left: 1%; margin-right: 1%">                          
                          <form action="{{route('form-alumno-pub')}}" method="POST" enctype="multipart/form-data">
                              @csrf
                              <input type="hidden" name="grupo_id" value="" id="hidden_input_grupo_id">
                              
                              <div class="alert alert-primary">
                        <h4>
                        	<ul>
	                        	<li class="text-body-description"><b class="text-blue">PASO 1: </b> Ingreso de datos y documentos </li>
	                        	
	                       	</ul>
	           
	                       	
                          Para poder realizar el registro, asegúrate tener los siguientes <b>documentos originales escaneados en formato .pdf</b>. De lo contrario, no se podrá generar tu ficha de pago.                    
                        </h4>
                        
                          <h4>                 
                            <ul>
                              <li>Fotografía. (NO SELFIE). En formato de imagen .JPEG, no mayor a 50 kb, tipo "foto tamaño infantil", blanco y negro o en color. </li> 
                              <button class="btn btn-info float-right" type="button" data-toggle="modal" data-target="#foto_id" onclick="open">Ejemplo de fotografìa</button><br>
                              <li>Acta de nacimiento (Original)</li>
                              <li>CURP</li>
                              <li>Constancia de estar cursando el último grado de bachillerato <br>(o Certificado original de Bachillerato si ya eres egresado)</li><br>
                              * Durante la contingencia de salud por el COVID-19, la constancia puede ser la credencial vigente de bachillerato, una boleta de calificaciones o una carta "bajo protesta de decir verdad"</h4>
                              <center><a href="https://utpyucatan.wixsite.com/control-escolar/ingreso-tsu-online" target="_blank"><h4><b>(Consulta aquí el formato de carta bajo protesta de decir verdad).</b></h4></a></center><h4> Éstas deben ser del período actual (Febrero-Junio 2020)<br>
                              * Si ya se han restablecido los servicios escolares, solicita en tu escuela la constancia y adjùntala al registrarte.
                            </ul>
                            <br>
                            <br>
                            
                            <div class="alert alert-warning">
                                
                            <div class="text-danger"> *IMPORTANTE* </div>
                        
                       Tus datos están protegidos por la "Ley Federal de Protección de Datos Personales en Posesión de Sujetos Obligados". Para mayor información,
                      <h4> <a href="https://utpyucatan.wixsite.com/control-escolar/aviso-de-privacidad" target="_blank"><h4>
                                  consulta AQUÍ nuestro Aviso de Privacidad</h4>
                                </a> </h4>
                            
                        </h4>
                        
                       </div> 
                    </div>
                              <div class="col-md-12">
                                  <div class="was-validated">
                                      <div class="form-horizontal">
                                          <div class="row">
                                              <div class="col-md-4">
                                                  <div class="form-group">
                                                    <div class="was-validated">
                                                      <div class="form-horizontal">
                                                        <div class="form-group">
                                                          <label for="estatus_" class="control-label" for="estatus">Estatus:</label>            
                                                          <br>                     
                                                          <input type="text" class="form-control" id="estatus_" value="{{$cfgstatusAlumno->descripcion}}" readonly="readonly">

                                                           <input type="text" value="{{$cfgstatusAlumno->id}}" hidden="hidden" name="cfgstatus_id">
                                                          
                                                        </div>
                                                      </div>  
                                                    </div>
                                                  </div>
                                              </div>
                                              <div class="col-md-8">
                                                  <div class="form-group">
                                                    <div class="was-validated">
                                                      <div class="form-horizontal">
                                                        <div class="form-group">
                                                          <label class="control-label" for="nivel_">Nivel:</label>           
                                                          <br>       
                                                          <input type="text" id="nivel_" class="form-control" value="{{$nivel->nivel}}" readonly="readonly">                  
                                                        </div>
                                                      </div> 
                                                    </div>                                              
                                                  </div>
                                              </div>
                                          </div>                                       
                                      </div>
                                  </div>
                              </div>                          
                              <div class="col-md-12">
                                  <div class="was-validated">
                                      <div class="form-horizontal">
                                          <div class="form-group">
                                              <label for="carrera">
                                                  Carrera
                                              </label>                                            
                                              <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="carrera_id_" name="carrera_id" required onchange="getGruposFromCarrera(this)">
                                                <option value="">-- Seleccionar --</option>
                                                @foreach($carreras as $carrera)
                                                  <option value="{{$carrera->id}}">{{$carrera->descripcion}}</option>
                                                @endforeach
                                              </select>
                                              <pre id="grupos_message_id"></pre>                        
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <br/>
                            <div class="disabledContent" id="div_form_continue_grupos_id">
                              <!-- DATOS DE IDENTIDAD)-->                              
                              <h4>DATOS DE IDENTIDAD</h4>                              
                              <hr>
                              <div class="row">    
                                  <div class="col-md-4">
                                      <div class="was-validated">
                                          <div class="form-group">
                                              <label class="control-label" for="primerApe">
                                                 Fotografia
                                              </label>                                            
                                              <input type="file" name="fotografia" class="form-control" accept="image/*" /> <!--LA FOTOGRAFÍA PUEDE SER NO REQUERIDA-->
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <div class="was-validated">
                                          <div class="form-group">
                                              <label class="control-label" for="primerApe">
                                                  Primer Apellido
                                              </label>                                            
                                              <input class="form-control" name="paterno" required type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" maxlength="20">                                                   
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <div class="was-validated">
                                          <div class="form-group">
                                              <label class="control-label" for="segundoApe">
                                                Segundo Apellido
                                              </label>                                            
                                              <input class="form-control" required name="materno" onkeyup="javascript:this.value=this.value.toUpperCase();" required type="text" maxlength="20">                                            
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <div class="was-validated">
                                          <div class="form-group" >
                                              <label class="control-label" for="nombres_">
                                                  Nombres
                                              </label>                                            
                                              <input class="form-control" id="nombres_" name="nombres" required onkeyup="javascript:this.value=this.value.toUpperCase();" maxlength="40">                                            
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <div class="was-validated">
                                          <div class="form-horizontal">
                                              <div class="form-group">
                                                  <label class="control-label" for="genero_">Género:</label>
                                                  <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="genero_" name="genero" required >
                                                    <option value="">-- Seleccionar --</option>
                                                    <option value="F">Femenino</option>
                                                    <option value="M">Masculino</option>
                                                  </select>
                                                  
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <div class="was-validated">
                                          <div class="form-horizontal">
                                              <div class="form-group">
                                                  <label class="control-label" for="estado_civil_">
                                                    Estado Civil:
                                                  </label>                                                     
                                                  <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="estado_civil_" name="estado_civil"  required>
                                                    <option value="">-- Seleccionar --</option>
                                                    <option value="S">Soltero(a)</option>
                                                    <option value="C">Casado(a)</option>
                                                    <option value="D">Divorciado(a)</option>
                                                    <option value="V">Viudo(a)</option>
                                                    <option value="U">Union libre</option>
                                                  </select>                                                
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  <br/>
                              </div>
                              <br/>
                              <!-- DATOS DE NACIMIENTO)-->
                              <h4>DATOS DE NACIMIENTO</h4>
                              <hr>
                              <div class="row">
                                  <div class="col-md-4">
                                      <div class="was-validated">
                                          <div class="form-group">                                            
                                            <div class="row">
                                              <div class="col-md-12">
                                                <label class="control-label" for="fecha_nac_">Fecha de Nacimiento
                                                </label>                                                            
                                              </div>
                                              <div class="col-md-8" style="padding-right: 0px">
                                                <input class="form-control" id="fecha_nac_" onblur="calcularEdad(this.value)" name="fecha_nac" required type="date">
                                              </div>
                                              <div class="col-md-4" style="padding-left: 0px">
                                                {{-- visible --}}
                                                <input type="text" id="edad_txt" class="form-control" readonly="readonly"required style="border-left: none;">                                              
                                              </div>
                                            </div>
                                              {{-- oculto --}}
                                              <input type="hidden" name="edad" value="" id="edad_" required >
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <div class="was-validated">
                                          <div class="form-group">
                                              <label class="control-label col-xs-3" for="estado_nac_id_">
                                                  Estado Nacimiento
                                              </label>
                                              <div class="col-xs-9">                                                  
                                                  <select class="form-control" id="estado_nac_id_" name="estado_nac_id"  required>
                                                      <option value="">-- Seleccionar --</option>
                                                      @foreach($estados as $edo)
                                                      <option value="{{$edo->id}}">{{$edo->nom_ent}}</option>
                                                      @endforeach        
                                                  </select>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <div class="was-validated">
                                          <div class="form-group">
                                              <label class="control-label" for="curp_">
                                                  CURP 
                                                  <a href="https://consultas.curp.gob.mx/CurpSP/gobmx/inicio.jsp" target="_blank">
                                                      (Consúltala o valídala) AQUI
                                                  </a>
                                              </label>                                            
                                              <input class="form-control" id="curp_" name="curp" maxlength="18" oninput="validarInput(this)" onkeyup="esValidoCurpOBlockeaBtnSubmit();javascript:this.value=this.value.toUpperCase();" required type="text">
                                                <pre id="resultado"></pre>
                                                <p id="val_res_p_" hidden="hidden"></p>
                                              </input>                                            
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <br/>
                              <!-- DATOS DE DOMICILIO Y LOCALIZACI���N)-->
                              <h4>DATOS DE DOMICILIO Y LOCALIZACIÓN</h4>
                              <hr>
                              <div class="row">
                                  <div class="col-md-12">
                                      <div class="was-validated">
                                          <div class="form-group" >
                                              <label for="domi">
                                                  Direccion de casa
                                              </label>
                                              <input class="form-control" id="domi" name="domicilio" placeholder="Por ejemplo: Calle 28 No. 358 entre 23 y 25 Col. Tres Cruces" required="" rows="3" >
                                              </input>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-4">
                                      <div class="was-validated">
                                          <div class="form-horizontal">
                                              <div class="form-group">
                                                  <label class="control-label" for="estado_d_"> 
                                                    Estado:
                                                  </label>                                                
                                                  <select class="form-control" id="estado_d_" name="estado_id" required >
                                                   <option value="">--Seleccionar--</option>
                                                  </select>                                     
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <div class="was-validated">
                                          <div class="form-horizontal">
                                              <div class="form-group">
                                                  <label class="control-label" for="municipio_">
                                                    Municipio:
                                                  </label>
                                                  <select class="form-control" id="municipio_" name="municipio" required >
                                                  <option value="">--Seleccionar--</option>
                                                  </select>                                                
                                              </div>
                                          </div>
                                      </div>
                                  </div>                                
                                  <div class="col-md-4">
                                    <div class="was-validated">
                                      <div class="form-group">
                                        <label class="control-label col-xs-3" for="cuidad_">
                                          Ciudad o localidad
                                        </label>                                            
                                        <input class="form-control" id="ciudad_" name="ciudad" required type="text">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-2">
                                      <div class="was-validated">
                                          <div class="form-group">
                                              <label class="control-label" for="CP_">
                                                Codigo Postal
                                              </label>                                            
                                              <input class="form-control" id="CP_" max="100000" name="cp"required type="number" step="1">
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-md-3">
                                      <div class="was-validated">
                                          <div class="form-group">
                                              <label class="control-label" for="cel_">
                                                Telefono Celular
                                              </label>                                            
                                              <input class="form-control" id="cel_" name="celular" max="10000000000" required type="number" step="1">                                          
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-md-7">
                                      <div class="was-validated">
                                          <div class="form-group">
                                              <label class="control-label" for="email_">
                                                Correo Electronico
                                              </label>                                            
                                              <input class="form-control" id="email_" name="email" required type="email">
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <br/>          
                              {{--  --}}
                              <h4>PERSONA DE CONTACTO</h4>
                              <hr>
                              <div class="row">
                                  <div class="col-md-5">
                                      <div class="was-validated">
                                          <div class="form-group">
                                              <label class="control-label" for="contacto_">
                                                Nombre de persona de contacto
                                              </label>                                            
                                              <input class="form-control" id="contacto_" name="contacto" required type="text" onkeyup="javascript:this.value=this.value.toUpperCase();">
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-md-4">                                      
                                    <div class="form-horizontal">
                                        <div class="form-group was-validated">
                                            <label for="parentesco_contacto_">
                                                    Parentesco del contacto:
                                            </label>                                                
                                            <select class="form-control" id="parentesco_contacto_" name="parentesco_contacto" required >
                                              <option value="">-- Seleccionar --</option>
                                              <option value="P">Padre</option>
                                              <option value="M">Madre</option>
                                              <option value="H">Hermano(a)</option>
                                              <option value="Pa">Pariente</option>
                                              <option value="C">Cónyugue</option>
                                              <option value="Am">Amigo(a)</option>
                                              <option value="T">Tutor(a)</option>
                                              <option value="O">Otro</option>
                                            </select>                                                
                                        </div>
                                    </div>                                      
                                  </div>
                                  <div class="col-md-3">
                                      <div class="was-validated">
                                          <div class="form-group">
                                              <label class="control-label" for="tel_contacto_">
                                                Teléfono del contacto
                                              </label>
                                              <input class="form-control" id="tel_contacto_" max="10000000000" name="tel_contacto" required type="number" step="1">
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <br/>
                              <!--ESCUELA DE PROCEDENCIA)-->
                              <h4>ESCUELA DE PROCEDENCIA</h4>
                              <hr>
                              <div class="row">
                                  <div class="col-md-12">
                                      <div class="was-validated">
                                          <div class="form-group">
                                              <label class="control-label" for="escuela_proc_">
                                                  Nombre de la Escuela
                                              </label>
                                              <input class="form-control" id="escuela_proc_" name="escuela_procedencia" required type="text"  onkeyup="javascript:this.value=this.value.toUpperCase();">
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="was-validated">
                                          <div class="form-horizontal">
                                              <div class="form-group">
                                                  <label class="control-label" for="estado_bac_">
                                                      Estado donde se encuentra
                                                  </label>                                                
                                                  <select class="form-control is-invalid" id="estado_bac_" name="estado_bachillerato_id" required >
                                                    <option value="">--Seleccionar--</option>
                                                  </select>                                                
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="was-validated">
                                          <div class="form-horizontal">
                                              <div class="form-group">
                                                  <label class="control-label" for="municipio_bachillerato_">
                                                      Municipios:
                                                  </label>
                                                  <select class="form-control" id="municipio_bachillerato_" name="municipio_bachillerato" required>
                                                    <option value="">--Seleccionar--</option>
                                                  </select>                                                
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="was-validated">
                                          <div class="form-group">
                                              <label class="control-label" for="promedio_bac_">
                                                Promedio Bachillerato<br>
                                                <div class="text-danger"><b>Debe ser con base 10.</b><br> Es decir, si tu promedio está con base 100 y éste es 89, 
                                                deberás convertirlo a 8.9 (ocho punto nueve)</div>
                                              </label>                                            
                                              <input class="form-control" id="promedio_bac_" step="00.01" name="promedio_bachillerato" required type="number">
                                          </div>
                                      </div>
                                  </div>
                              </div>
                            </div>
                              <br/>
                              <div class="alert alert-warning">
                                  <h4>
                                      <b>
                                          ¡ATENCIÓN!
                                      </b>
                                     El botón "GUARDAR Y SUBIR DOCUMENTOS" no se activa si falta algún dato o si la CURP no es válida. Si sucede esto, revisa y corrige.   
                                     
                                </h4>
                              </div>
                              <div class="alert alert-warning">
                                  <h4> Serás redireccionado a la sección "DOCUMENTOS". Tenlos a mano en formato PDF para ingresarlos de manera correcta.
                                  </h4>
                              </div>
                              <div class="row">
                                  <div class="col-md-6"></div>
                                  <div class="col-md-4">
                                      <button class="btn btn-success btn-lg" id="btn_guardar_ficha" disabled="disabled" type="submit">
                                          GUARDAR Y A SUBIR DOCUMENTOS
                                      </button>
                                  </div>
                                  <div class="col-md-2"></div>
                                  <br/>
                                  <br/>
                                  <br/>
                                  <br/>
                                  <br/>
                              </div>
                          </form>
                        </div>  
                      </div>                                                                 
                    </div>
                </div>
            </div>
            <div class="col-md-1 col"></div>
        </div>
    </div>
    {{-- Despues de intentar registrarse cuando ya existe el mismo curp ejecuta lo siguiente --}}
    @if(Session::has('error'))
      <script defer>
        document.getElementById("div_formulario_registro_id").classList.remove("disabledContent"); 
        const divCollapse =  document.getElementById("collapseOne");        
        divCollapse.classList.remove('collapse');
        divCollapse.classList.remove('show');
        divCollapse.classList.add('collapsing');

        // const elementTop = document.getElementById('alerts_');
        // //const topPos = elementTop.offsetTop;
        // elementTop.scrollTop = elementTop.scrollHeight;
//         document.getElementById('alerts_').scrollTop = topPos;

// var objDiv = document.getElementById("alerts_");
// objDiv.scrollTop = objDiv.scrollHeight;

      </script>  
    @endif
  @else


  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
      <h4>
        Usted no puede registrarse, debido a que no se encontraron los datos necesarios para esto.
        <br>
        <br>
        <br>
        Revise que existan registros de los siguiente: <span class="text-danger"> (Niveles, Carreras)</span>      
      </h4>
      <br>
      <br>
      <br>
      <small>Reporte en control escolar o envie un email al siguiente contacto <a href="#" style="color: blue">controlescolar.utponiente@gmail.com</a></small>
      
    </div>
    <div class="col-md-2"></div>
    
  </div>
  @endif

  {{-- MODALES --}}
  
  <!-- Modal foto -->
       <div class="modal fade" id="foto_id" tabindex="-1" role="dialog" aria-labelledby="foto" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="dialog">
      <div class="modal-content">
        <div class="modal-header bg-dark">
          <h5 class="modal-title text-light" id="foto">Ejemplo de fotografìa</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        
          <div class="modal-body">
              @csrf
              <center><img src="{{asset('/CODE_DATA/public/img/1H.png')}}" alt="Responsive image" class="img-thumbnail"></center><br>
              <h5>
              <lu>
                  <li>Fondo blanco</li>
                  <li>Playera o camisa blanca</li>
                  <li>Bien peinado (a)</li>
              </lu>
              </h5>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" onclick="javascript:confirm_email_id.value='';btn_confirmar_identidad_id.setAttribute('disabled', 'disabled');" data-dismiss="modal">Cerrar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
 
  
  
  
  {{-- CONFIRMAR IDENTIDAD ALUMNO --}}
  <!-- Modal -->
  <div class="modal fade" id="confirmarIdentidadAlumnoModal_id" tabindex="-1" role="dialog" aria-labelledby="ConfirmarIdentidadAlumno" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header bg-dark">
          <h5 class="modal-title text-light" id="ConfirmarIdentidadAlumno">Confirmar identidad</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form class="was-validated" action="{{route('form-send-mail-confirm-identidad')}}" method="POST">
          <div class="modal-body">
              @csrf
              <label for="confirm_email_id"><b>INGRESA EL EMAIL QUE REGISTRASTE.</b><br>
              Ahí te enviaremos una liga para que accedas de nuevo al sistema y subas tu comprobante de pago; o para editar algún dato.<br>
              * En caso de que no te llegue el correo, inténtalo nuevamente.<br>
              **Si el problema continúa, notifícalo al correo: 
              <a href="#" class="botonOfertaEducativa">adm.utponiente@gmail.com</a></b></label>
              <input type="email" class="form-control" id="confirm_email_id" onkeyup="confirmaEmailIgualConPost()" placeholder="Ingresa aquí el correo que registraste">
              <input type="hidden" name="email" id="confirm_email_post_id" class="form-control">
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" onclick="javascript:confirm_email_id.value='';btn_confirmar_identidad_id.setAttribute('disabled', 'disabled');" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary" id="btn_confirmar_identidad_id" disabled="disabled">Enviar correo</button>
          </div>
        </form>
      </div>
    </div>
  </div>



{{-- <div class="was-validated">
  <label>as</label>
    <input class="form-control is-invalid">
</div> --}}


   





@endsection
@section('scripts')
  {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script> --}}  
  <script defer src="{{asset('/CODE_DATA/public/js/internal/validarCURP.js')}}"></script>  

  <script defer>    
    const btn_guardar_ficha_           = document.getElementById('btn_guardar_ficha');
    const btn_continuar_curp_reg_      = document.getElementById('btn_continuar_curp_reg');
    const btn_entiendo_advertencia_id_ = document.getElementById('btn_entiendo_advertencia_id');
    const div_formulario_registro_id_  = document.getElementById('div_formulario_registro_id');
    const block                        = false;
    const not_block                    = true;

    btn_entiendo_advertencia_id_.addEventListener('click', function(){
      let tieneClassDisabled=  ((" " + div_formulario_registro_id_.className + " ").replace(/[\n\t]/g, " ").indexOf(" disabledContent ") > -1 );
      if (tieneClassDisabled) {
        div_formulario_registro_id_.classList.remove("disabledContent");
      } else {
        div_formulario_registro_id_.classList.add("disabledContent");
      }
    });
    
    function getGruposFromCarrera(element){
      if (element.value != '') {        
        blockearBtnSubmitFormFicha(block);
        load("{{url('/pub/alumnos/ged-grupos-from-nivel')}}", element);

      }
    }

    function load(url, element)
    {          
      const div_continue_grupos= document.getElementById('div_form_continue_grupos_id');
      const input_grupo_id     = document.getElementById('hidden_input_grupo_id');
      const pre_message_grupos = document.getElementById('grupos_message_id');
      const POST_              = new XMLHttpRequest();
      let formdata             = new FormData();                 
      formdata.append('_token', document.getElementsByName('_token')[0].value); 
      formdata.append(element.name, element.value);
      beforeSend();
      POST_.open('POST', url);
      POST_.onload = function() {
        if (this.status >= 200 && this.status < 400) {           
          let response = JSON.parse(this.response);          
          let data     = response.data;
          let state    = response.state;          
          if (parseInt(state) == 200) {            
            success(data);            
          }else{error(data);} 
        } else {errorMessage();blockearBtnSubmitFormFicha(block);}
      };
      POST_.onerror = function() {errorMessage();blockearBtnSubmitFormFicha(block);};
      POST_.send(formdata);

      function beforeSend(){
        pre_message_grupos.innerHTML = 'Buscando grupos disponibles de esta carrera.'; 
        pre_message_grupos.classList.remove("text-danger");
      } 

      function success(data){
        input_grupo_id.value         = data;                      
        pre_message_grupos.innerHTML = 'OK';
        div_continue_grupos.classList.remove("disabledContent");
      }  

      function error(data){
        input_grupo_id.value         = '';
        pre_message_grupos.innerHTML = data;
        pre_message_grupos.classList.add("text-danger");
        div_continue_grupos.classList.add("disabledContent");
      }
      
  }


    function errorMessage(){
       alert('Ups.. algo salió mal revise su conexión a internet, vuelva a intentar o contactese con el administrador.');
    }

    function esValidoCurpOBlockeaBtnSubmit(){          
          let value_pre = document.getElementById('val_res_p_').innerHTML;
          let not_block = parseInt(value_pre) > 0;                                   
          blockearBtnSubmitFormFicha(not_block);                  
    }

    function esValidoCurpOBlockeaBtnSearchSubmit(){
      let value_pre = document.getElementById('val_res_buscar_curp').innerHTML;
      let not_block = parseInt(value_pre) > 0;           
      blockearBtnSubmitFormFichaSearchCurp(not_block); 
    }
    
    function blockearBtnSubmitFormFicha(not_block){            
      if (not_block) {                    
          btn_guardar_ficha_.removeAttribute("disabled");
      }else{                            
          btn_guardar_ficha_.setAttribute("disabled", "disabled");
      }
    }

    function blockearBtnSubmitFormFichaSearchCurp(not_block){            
      if (not_block) {                    
          btn_continuar_curp_reg_.removeAttribute("disabled");
      }else{                            
          btn_continuar_curp_reg_.setAttribute("disabled", "disabled");
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

        esValidoCurpOBlockeaBtnSearchSubmit();       
      }else{
        alert("Fecha de nacimiento incorrecto, porfavor ingreselo correctamente")        
        blockearBtnSubmitFormFicha(block)        
      }
    }

    function isValidDate(day,month,year)
    {
      var dteDate;    
      month=month-1;
      dteDate=new Date(year,month,day);    
      //Devuelva true o false..
      return ((day==dteDate.getDate()) && (month==dteDate.getMonth()) && (year==dteDate.getFullYear()));
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
    
    const mensage_post_            = document.getElementById('mensage_enviando_post_id');
    const modal_confirma_ident     = $("#confirmarIdentidadAlumnoModal_id");
    const btn_confirmar_identidad_ = document.getElementById('btn_confirmar_identidad_id');
    const input_oculto_confirm_email_post_id = document.getElementById('confirm_email_post_id');

    function sendCurpJSONValidate(){            
      let args ={method: "POST",url: "{{url('/api/pub/alumnos/find-curp-alumno')}}", HTML_form_id: "form_validate_curp_id"};
      
      api = pretty.create(args);
      api.beforeSend(function(){
        mensage_post_.innerHTML = "Validando existencia. (Espere)..";      
      });
      api.send(function(state , request){            
        mensage_post_.innerHTML = "";   
        var response = JSON.parse(request);
        if (parseInt(response.state) == 200) {
          modal_confirma_ident.modal().show();
          input_oculto_confirm_email_post_id.value=response.data.email;
        }else{
          alert(response.data);
        }  
      });                  
    }






    var input_visible_confirm_email = document.getElementById('confirm_email_id');
    function confirmaEmailIgualConPost(){
      
      let val      = input_visible_confirm_email.value;
      let val_post = confirm_email_post_id.value;

      //console.log(val+" / "+val_post);

      if (val == val_post) {
        //valido
        btn_confirmar_identidad_.removeAttribute("disabled");
      }else{
        //no valido
        btn_confirmar_identidad_.setAttribute("disabled", "disabled");
      }
      
    }

  </script>
@endsection