@extends('layouts.admin')
@section('contenido')

<div class="row">       
    <div class="col-md-12">                
        @if(Session::has('error'))
            <div class="alert alert-danger alert-dismissible" role="alert">
                <p class="text-center">{{Session::get('error')}}</p>
            </div>       
        @endif
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading text-center">
               <h4>Registro de nuevo alumno</h4>                  
            </div>
        </div>
    </div> 
</div>
<br>

@if(isset($contadores))
    {{-- No paso las validacinoes // no muestra formulario --}}
    <div class="tab-content">
        <div class="row">          
            <div class="col-md-12">
                <h4> 
                    Para poder crear un alumno debe primero seleccionar un 
                    <span class="text-danger">Ciclo.</span>
                    <br>
                    Luego debe asegurarse de que existan los datos suficientes o existan para registrar un alumno ya que estos son requeridos:
                    <br>
                    <span class="text-danger">
                        (cfgstatus= {{$contadores[0]}},
                         nivel= {{$contadores[1]}}, 
                         estados= {{$contadores[2]}}, 
                         escolaridades = {{$contadores[3]}}, 
                         actividades = {{$contadores[4]}})
                    </span> 
                </h4>
            </div>
        </div>
    </div>
@else
    {{-- Paso validaciones y existen los datos necesarios para crear un alumno --}}
    <div class="tab-content">
        <div class="row">                    
                <div class="col-md-12">
                    <div class="card card-primary card-outline card-outline-tabs">
                      <div class="card-header p-0 border-bottom-0">
                        <ul class="nav nav-tabs" id="tabs_creation_form_alumno_id" role="tablist">
                          <li class="nav-item">
                            <a class="nav-link active" id="a_head_link_tab_ingreso_id" data-toggle="pill" href="#contenido_tab_ingreso_id" role="tab" aria-controls="contenido_tab_ingreso_id" aria-selected="true">
                                Ingreso
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" id="a_head_link_tab_dat_generales_id" data-toggle="pill" href="#contenido_tab_dat_generales_id" role="tab" aria-controls="contenido_tab_dat_generales_id" aria-selected="false">Datos generales
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" id="a_head_link_tab_domicilio_y_contacto_id" data-toggle="pill" href="#contenido_tab_domicilio_y_contacto_id" role="tab" aria-controls="contenido_tab_domicilio_y_contacto_id" aria-selected="false">
                            Domicilio y contacto
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" id="a_head_link_tab_escuela_proc_id" data-toggle="pill" href="#contenido_tab_escuela_proc_id" role="tab" aria-controls="contenido_tab_escuela_proc_id" aria-selected="false">
                            Escuela procedencia
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" id="a_head_link_tab_beca_id" data-toggle="pill" href="#contenido_tab_beca_id" role="tab" aria-controls="contenido_tab_beca_id" aria-selected="false">
                            Beca
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" id="a_head_link_tab_estadisticos_id" data-toggle="pill" href="#contenido_tab_estadisticos_id" role="tab" aria-controls="contenido_tab_estadisticos_id" aria-selected="false">
                            Estadisticos
                            </a>
                          </li>
                        </ul>
                      </div>
                      <div class="card-body">
                       <form class="was-validated form-group" action="{{route('adm-form-alumno')}}" method="POST" enctype="multipart/form-data">      
                        @csrf                        
                        <div class="tab-content" id="custom-tabs-three-tabContent">

                            {{-- DATOS INGRESO --}}
                            <div class="tab-pane fade show active" id="contenido_tab_ingreso_id" role="tabpanel" aria-labelledby="a_head_link_tab_ingreso_id">
                                <div class="form-row">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                Folio
                                            </span>
                                        </div>                                      
                                        <input type="text" disabled="disabled" class="form-control" placeholder="Generación automática">
                                    </div>
                                    <br>        
                                    
                                     {{-- ************************************************** --}}
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                Matrícula
                                            </span>
                                        </div>     
                                        <input type="number" step="0.1" class="form-control" name="peso" value="{{old('matricilao')}}" placeholder="">  
                                    </div>
                                     {{--SI NO FUNCIONA ESTA METRÍCULA, DESCOMENTAR LA DE ABAJO --}}
                                     
                                    <!--div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                Matricula
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" disabled="disabled" placeholder="Generación automática">
                                    </div-->
                                    <br>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                Estatus
                                            </span>
                                        </div>
                                        <select class="form-control" required name="cfgstatus_id">
                                            <option value="">-- Seleccionar --</option>
                                            @foreach($cfgstatusAlumno as $estatus)
                                            <option value="{{$estatus->id}}">{{$estatus->descripcion}}</option>
                                            @endforeach
                                        </select>                                      
                                    </div>
                                    <br> 
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                Nivel
                                            </span>
                                        </div>
                                        <select class="form-control" id="niveles_id" onchange="getGroupesOf('carreras', '{{url('/admin/alumnos/fetch-carreras')}}',this.value)" required>
                                            <option value="">-- Seleccionar --</option>
                                            @foreach($niveles as $nivel)
                                            <option value="{{$nivel->id}}">{{$nivel->nivel}}</option>
                                            @endforeach
                                        </select> 
                                    </div>
                                    <br>
                                    <small id="carreras_message_id"></small>
                                    <br>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                Carrera
                                            </span>
                                        </div>
                                        <select class="form-control" id="carreras_id" name="carrera_id" required onchange="getGroupesOf('grupos','{{url('/admin/alumnos/fetch-grupos')}}',this.value)">
                                            <option value="">-- Prmero seleccione un nivel --</option>
                                        </select> 
                                    </div>
                                    <br>
                                    <small id="grupos_message_id"></small>
                                    <br>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                Grupo
                                            </span>
                                        </div>
                                        <select class="form-control" id="grupos_id" name="grupo_id" required>
                                            <option value="">-- Prmero seleccione una carrera --</option>
                                        </select>                      
                                    </div>
                                    <br>                                               
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                Fecha registro
                                            </span>
                                        </div>
                                        <input type="date" class="form-control" name="fecha_registro" value="{{date('Y-m-d')}}">
                                    </div>
                                    <br>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                Fecha ingreso
                                            </span>
                                        </div>
                                        <input type="date" class="form-control" name="fecha_ingreso" value="{{date('Y-m-d')}}">
                                    </div>
                                    <br>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                Fecha egreso
                                            </span>
                                        </div>
                                        <input type="date" class="form-control" name="fecha_egreso">
                                    </div>                                    
                                    <br>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                Nota:
                                            </span>
                                        </div>
                                        <textarea type="textarea" rows="6" class="form-control" name="notas" value="{{old('notas')}}" placeholder="No requerido en este momento."></textarea>
                                    </div>                                        
                                </div>  {{-- end form-row inputs --}}  
                            </div>

                            {{-- ************************************************** --}}
                            {{-- ************************************************** --}}
                            {{-- DATOS GENERALES  --}}

                            <div class="tab-pane fade" id="contenido_tab_dat_generales_id" role="tabpanel" aria-labelledby="a_head_link_tab_dat_generales_id">
                                <div class="form-row">       
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                Fotografía
                                            </span>
                                        </div>
                                        <input type="file" name="fotografia" class="form-control" accept="image/*" />
                                    </div>
                                    <br>       
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                Primer apellido
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" 
                                               onkeyup="javascript:this.value=this.value.toUpperCase();" 
                                               required 
                                               name="paterno" 
                                               value="{{old('paterno')}}">
                                    </div>
                                    <br>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                Segundo apellido
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" 
                                               onkeyup="javascript:this.value=this.value.toUpperCase();" 
                                               name="materno" 
                                               value="{{old('materno')}}" 
                                               required>
                                    </div>
                                    <br>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                Nombres
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" 
                                               onkeyup="javascript:this.value=this.value.toUpperCase();"  
                                               name="nombres" 
                                               required 
                                               value="{{old('nombres')}}">
                                    </div>
                                    <br>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                Genero
                                            </span>
                                        </div>                 
                                        <select class="form-control" name="genero" required>
                                            <option value="">-- Seleccionar --</option>
                                            @foreach($generos['references'] as $i => $genero)
                                                <option value="{{$genero}}">
                                                    {{$generos['values'][$i]}}
                                                </option>
                                            @endforeach                    
                                        </select>                                   
                                    </div>

                                    <br>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                Estado civil
                                            </span>
                                        </div>                                   
                                        <select class="form-control" name="estado_civil"required onchange="controlEstadoCivil(this.value)">
                                            <option value="">-- Seleccionar --</option>
                                            @foreach($estados_civiles['references'] as $i => $edo_civil)
                                                <option value="{{$edo_civil}}">
                                                    {{$estados_civiles['values'][$i]}}
                                                </option>
                                            @endforeach  
                                        </select>    
                                    </div>
                                    <br>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                Fecha nacimiento
                                            </span>
                                        </div> 
                                        <input type="date" class="form-control" name="fecha_nac" required id="fecha_nacimiento_id">
                                    </div>
                                    <br>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                Edad
                                            </span>
                                        </div>
                                        {{-- visible --}}
                                        <input type="text" id="edad_visible_id" value="{{old('edad')}}" class="form-control" readonly="readonly" required placeholder="Campo calculado.">
                                        {{-- oculto --}}
                                        <input type="hidden" name="edad" value="{{old('edad')}}" id="edad_invisible_id" required >
                                    </div>
                                    <br>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                Estado de nacimiento
                                            </span>
                                        </div> 
                                        <select class="form-control" id="estado_nacimiento_id" name="estado_nac_id" required> 
                                        </select> 
                                    </div>
                                    <br>  
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                Municipio de nacimiento
                                            </span>
                                        </div>                                        
                                        <select class="form-control" id="municipio_nacimiento_id" name="municipio_nac" required> 
                                            <option value="">-- Seleccione primero un estado --</option>                 
                                        </select> 
                                    </div>
                                    <br>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                Correo electrónico (email)
                                            </span>
                                        </div>
                                        <input type="email" class="form-control" name="email" required value="{{old('email')}}"> 
                                    </div>
                                    <br>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                Teléfono
                                            </span>
                                        </div>
                                        <input type="number" class="form-control" name="telefono" value="{{old('telefono')}}" max="10000000000" step="1">
                                    </div>
                                    <br>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                Celular
                                            </span>
                                        </div>
                                        <input type="number" class="form-control" name="celular" value="{{old('celular')}}" required max="10000000000" step="1">
                                    </div>
                                    <br>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                CURP
                                            </span>
                                        </div>                                  
                                        <input class="form-control" id="curp_" 
                                               name="curp" 
                                               maxlength="18"           
                                               onkeyup="javascript:this.value=this.value.toUpperCase();" 
                                               required placeholder="Campo validado." 
                                               type="text">
                                    </div> {{-- END CURP INPUT --}}
                                    <p id="resultado" style="height: 60%"></p>
                                    <p id="val_res_p_" hidden="hidden"></p>
                                    <a href="https://consultas.curp.gob.mx/CurpSP/gobmx/inicio.jsp" target="_blank" class="text-left"> Consúltala AQUI TU CURP </a> 
                                    <br>
                                </div> 
                            </div>

                            {{-- ************************************************** --}}
                            {{-- ************************************************** --}}
                            {{-- DOMICILIO Y CONTACTO --}}

                            <div class="tab-pane fade" id="contenido_tab_domicilio_y_contacto_id" role="tabpanel" aria-labelledby="a_head_link_tab_domicilio_y_contacto_id">
                                <div class="form-row">
                                    <p>Datos de domicilio</p>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                               Dirección de domicilio                                        
                                            </span>
                                        </div> 
                                        <input type="text" class="form-control" name="domicilio" value="{{old('domicilio')}}" required>
                                    </div>
                                    <br>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                               Estado                                        
                                            </span>
                                        </div> 
                                        <select class="form-control" id="estado_domicilio_id" name="estado_id" required >                                            
                                        </select> 
                                    </div>
                                    <br>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                               Municipio 
                                            </span>
                                        </div> 
                                        <select class="form-control" id="municipio_domicilio_id" name="municipio" required>
                                            <option value="">-- Seleccione primero un estado --</option>
                                        </select>            
                                    </div>
                                    <br>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                               Ciudad o localidad
                                           </span>
                                        </div> 
                                        <input class="form-control" name="ciudad" required>                                  
                                    </div>                                   
                                    <br>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                               CP (Código postal)
                                            </span>
                                        </div>                
                                         <input class="form-control" id="CP_" max="100000" name="cp"required type="number" step="1" value="{{old('cp')}}">
                                    </div>
                                    <br>
                                    <p>Datos de persona de contacto</p>
                                    <br>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                              Nombre de contacto
                                            </span>
                                        </div>                                        
                                        <input type="text" class="form-control" name="contacto" required value="{{old('contacto')}}" onkeyup="javascript:this.value=this.value.toUpperCase();" id="nombre_contacto_id">
                                    </div>                                     
                                    <br>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                              Parentesco contacto
                                            </span>
                                        </div>     
                                        <select class="form-control" id="parentesco_contacto_id" name="parentesco_contacto" required >
                                           <option value="">-- Selecionar --</option>
                                            @foreach($parentescos["references"] as $i => $parentesco)
                                            <option value="{{$parentesco}}">{{$parentescos['values'][$i]}}</option>
                                            @endforeach                        
                                        </select>   
                                    </div>
                                    <br>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                              Teléfono / celular  contacto
                                            </span>
                                        </div> 
                                        <input class="form-control" name="tel_contacto" max="10000000000" type="number" step="1" required onblur="controlPersonaContactoYAutorizada('nombre_contacto_id','parentesco_contacto_id',this.value)">
                                    </div>
                                    <br>
                                    <p>Persona autorizada de pedir información</p>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                              ¿La persona de contacto es la misma que la autorizada?
                                            </span>
                                        </div>                         
                                        <select class="form-control" name="misma_autorizada" id="misma_autorizada_id" onchange="controlMismaPersonaAutorizada(this.value)" required disabled="disabled">
                                           <option value="">-- Seleccionar --</option>
                                           <option value="true">SI</option>
                                           <option value="false">NO</option>
                                        </select>   
                                    </div>
                                    <br>
                                    <div id="inputs_persona_misma_contacto_id" class="row-fluid" hidden="hidden">
                                        {{-- Conesta "SI", se ponen los mismos datos en input de persona de contacto y se oculta visualmente, contesta "NO", se muesta inputs --}}
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                  Nombre
                                                </span>
                                            </div> 
                                            <input type="text" class="form-control misma_persona_contacto_class" 
                                                   name="persona_autorizada" 
                                                   required 
                                                   value="{{old('persona_autorizada')}}"
                                                   onkeyup="javascript:this.value=this.value.toUpperCase();">
                                        </div>                                  
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                  Parentesco
                                                </span>
                                            </div>   
                                            <select class="form-control misma_persona_contacto_class" name="parentesco_autorizada" required>
                                            <option value="">-- Selecionar --</option>
                                              @foreach($parentescos["references"] as $i => $parentesco)
                                              <option value="{{$parentesco}}">{{$parentescos['values'][$i]}}</option>
                                              @endforeach
                                            </select>                                
                                        </div>                                  
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                  Teléfono / Celular 
                                                </span>
                                            </div>                                  
                                            <input type="number" class="form-control misma_persona_contacto_class" name="telefono_autorizada" value="{{old('telefono_autorizada')}}" required max="10000000000" step="1">
                                        </div>
                                    </div>

                                </div>
                            </div>

                            {{-- ************************************************** --}}
                            {{-- ************************************************** --}}
                            {{-- ESCUELA DE PROCEDENCIA --}}

                            <div class="tab-pane fade" id="contenido_tab_escuela_proc_id" role="tabpanel" aria-labelledby="a_head_link_tab_escuela_proc_id">
                                <div class="form-row">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                              Escuela procedencia
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" name="escuela_procedencia" value="{{old('escuela_procedencia')}}" placeholder="Bachillerato." required>
                                    </div>  
                                    <br>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                              Tipo 
                                            </span> 
                                        </div>
                                        <select class="form-control" name="tipo_bachillerato" required>
                                            <option value="">-- Selecionar --</option>
                                            @foreach($tipos_bachiller['references'] as $i => $tipo)
                                            <option value="{{$tipo}}">
                                                {{$tipos_bachiller['values'][$i]}}
                                            </option>
                                            @endforeach             
                                        </select>    
                                    </div>
                                    <br>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                              Sistema 
                                            </span>
                                        </div>
                                        <select class="form-control" name="sistema_bachillerato" required>
                                            <option value="">-- Selecionar --</option>
                                            @foreach($sistemas_bachiller['references'] as $i => $sistema)
                                            <option value="{{$sistema}}">
                                                {{$sistemas_bachiller['values'][$i]}}
                                            </option>
                                            @endforeach
                                        </select>  
                                    </div>
                                    <br>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                              Estado donde se encuentra
                                            </span>
                                        </div>
                                        <select class="form-control" id="estado_bachillerato_id" name="estado_bachillerato_id" required>
                                            <option value="">--Seleccionar--</option>
                                        </select>
                                    </div>
                                    <br>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                              Municipio donde se encuentra
                                            </span>
                                        </div>
                                        <select class="form-control" id="municipio_bachillerato_id" name="municipio_bachillerato" required>
                                            <option value="">--Primero seleccione un estado--</option>
                                        </select>
                                    </div>
                                    <br>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                              Promedio bachillerato 
                                            </span>
                                        </div>
                                        <input class="form-control"step="00.01" name="promedio_bachillerato" required type="number" 
                                            value="{{old('promedio_bachillerato')}}">
                                    </div>
                                    <br>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                              Inicio en el periodo
                                            </span>
                                        </div>                                                
                                        <input type="date" class="form-control" name="inicio_bachillerato">
                                    </div>
                                    <br>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                              Fininalizo
                                            </span>
                                        </div>
                                        <input type="date" class="form-control" name="fin_bachillerato">
                                    </div>
                                    <br>
                                </div>
                            </div>

                            {{-- ************************************************** --}}
                            {{-- ************************************************** --}}
                            {{-- DATOS DE BECA --}}

                            <div class="tab-pane fade" id="contenido_tab_beca_id" role="tabpanel" aria-labelledby="a_head_link_tab_beca_id">
                                <div class="form-row">
                                    <br>
                                    <p>Beca bachiller</p>
                                    <br>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                              ¿Tuvo beca en bachiillerato?
                                            </span>
                                        </div>
                                        <select class="form-control" onchange="toggleShow(document.getElementById('input_tipo_beca_bachiller_id'), this.value)" name="tuvo_beca_bachillerato" required>
                                            <option value="">-- Selecionar --</option>
                                            <option value="true">SI</option>
                                            <option value="false">NO</option>
                                        </select> 
                                    </div>
                                    <br>                                              
                                    <div class="input-group mb-3" hidden="hidden" id="input_tipo_beca_bachiller_id">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                              ¿Cual? / Tipo
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" name="tipo_beca_bachillerato" value="{{old('tipo_beca_bachillerato')}}">
                                    </div>
                                    <br>
                                    <p>Becas UTP</p>
                                    <br>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                              ¿Solicita beca?
                                            </span>
                                        </div>
                                        <select class="form-control" name="solicita_beca_utp" required onchange="toggleShow(document.getElementById('inputs_solicita_beca_utp_id'),this.value)">
                                            <option value="">--Selecionar--</option>
                                            <option value="true">SI</option>
                                            <option value="false">NO</option>
                                        </select> 
                                    </div>
                                    <br> 
                                    <div hidden="hidden" id="inputs_solicita_beca_utp_id" >
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                  Tipo beca 
                                                </span>
                                            </div>
                                            <input type="text" name="tipo_beca_utp" class="form-control" placeholder="Tipo de beca a solicitar">
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                  Folio SUBES
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" name="folio_subes" value="{{old('folio_subes')}}" placeholder="No requerido en este momento.">
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                  ¿Autoriza beca?
                                                </span>
                                            </div>
                                            <select class="form-control" name="autoriza_beca_utp">
                                                <option value="false" selected="selected">NO</option>
                                                <option value="true">SI</option>
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                </div>
                            </div>


                            {{-- ************************************************** --}}
                            {{-- ************************************************** --}}
                            {{-- ESTADISTICOS --}}

                            <div class="tab-pane fade" id="contenido_tab_estadisticos_id" role="tabpanel" aria-labelledby="a_head_link_tab_estadisticos_id">
                                <div class="form-row">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                              Origen indigena 
                                            </span>
                                        </div>
                                        <select class="form-control" name="origen_indigena" required>
                                            <option value="">-- Selecionar --</option>
                                            <option value="true">SI</option>
                                            <option value="false">NO</option>
                                        </select>  
                                    </div>
                                    <br>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                              ¿Habla lengua indigena?
                                            </span>
                                        </div>
                                        <select class="form-control" name="lengua_indigena" required onchange="toggleShow( document.getElementById('lengua_indigena_hablante_id'),this.value)">
                                            <option value="">-- Selecionar --</option>
                                            <option value="true">SI</option>
                                            <option value="false">NO</option>
                                        </select> 
                                    </div>
                                    <br>
                                    <div class="input-group mb-3" id="lengua_indigena_hablante_id" hidden="hidden">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                              ¿Cual? 
                                            </span>
                                        </div>                                    
                                        <select class="form-control" name="lengua_indigena_hablante" value=""> 
                                            <option value="">-- Selecionar --</option>
                                            @foreach($lenguas_indigenas['references'] as $i => $lengua)
                                            <option value="{{$lengua}}">
                                                {{$lenguas_indigenas['values'][$i]}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <br>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                              ¿Tiene alguna discapacidad? 
                                            </span>
                                        </div>
                                        <select class="form-control" name="discapacidad" required onchange="toggleShow(document.getElementById('tipo_discapacidad_id'), this.value)">
                                            <option value="" >-- Selecionar --</option>
                                            <option value="true">SI</option>
                                            <option value="false">NO</option>
                                        </select> 
                                    </div>
                                    <br>
                                    <div class="input-group mb-3" id="tipo_discapacidad_id" hidden="hidden">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                              ¿Cual? 
                                            </span>
                                        </div>
                                        <select class="form-control" name="tipo_discapacidad" value="{{old('tipo_discapacidad')}}"> 
                                                            <!--falta en base de datos-->
                                            <option value="">-- Seleccionar --</option>
                                            <option value="V">VISUAL</option>
                                            <option value="A">AUDITIVA</option>
                                            <option value="M">MOTRIZ</option>
                                        </select>
                                    </div>
                                    <br>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                              ¿Tiene alguna enfermedad crónica o sigue algun tratamiento? 
                                            </span>
                                        </div>
                                        <select class="form-control" name="enfermedad" value="{{old('enfermedad')}}" required onchange="toggleShow(document.getElementById('nombre_enfermedad_id'),this.value)">
                                            <option value="">-- Selecionar --</option>
                                            <option value="true">SI</option>
                                            <option value="false">NO</option>
                                        </select>
                                    </div>
                                    <br>
                                    <div class="input-group mb-3" id="nombre_enfermedad_id" hidden="hidden">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                              Nombre de enfermedad o tipo de tratamiento
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" name="nombre_enfermedad" value="{{old('nombre_enfermedad')}}">
                                    </div>
                                    <br>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                              ¿Tiene alergias? 
                                            </span>
                                        </div>
                                        <select class="form-control" required name="alergias" onchange="toggleShow(document.getElementById('tipo_alergia_id'),this.value)">
                                            <option value="">-- Selecionar --</option>
                                            <option value="true">SI</option>
                                            <option value="false">NO</option>
                                        </select> 
                                    </div>
                                    <br> 
                                    <div class="input-group mb-3" hidden="hidden" id="tipo_alergia_id">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                ¿Cual?
                                            </span>
                                        </div> 
                                        <input type="text" class="form-control" name="tipo_alergia"  value="{{old('tipo_alergia')}}">
                                    </div>
                                    <br>  
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                Peso
                                            </span>
                                        </div>     
                                        <input type="number" step="0.1" class="form-control" name="peso" value="{{old('peso')}}" placeholder="No requerido en este momento.">  
                                    </div>
                                    <br>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                Talla
                                            </span>
                                        </div>
                                        <select class="form-control" name="talla">
                                            <option value="">-- Selecionar --</option>
                                            <option value="XS"> Extra Chico</option>
                                            <option value="S">Chico</option>
                                            <option value="M">Mediano</option>
                                            <option value="G">Grande</option>
                                            <option value="XG">Extra Grande</option>
                                            <option value="XXG">Extra Extra Grande</option>
                                        </select> 
                                    </div>
                                    <br> 
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                Nombre del padre
                                            </span>
                                        </div> 
                                        <input type="text" class="form-control" name="nombre_padre" value="{{old('nombre_padre')}}" 
                                        required
                                        onkeyup="javascript:this.value=this.value.toUpperCase();">                                    
                                    </div>
                                    <br>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                Escolaridad del padre
                                            </span>
                                        </div>
                                        <select class="form-control" name="escolaridad_padre_id" required>
                                            <option value="">-- Seleccionar --</option>
                                            @foreach($escolaridades as $escolaridad)
                                            <option value="{{$escolaridad->id}}">{{$escolaridad->nombre}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <br>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                Actividad del padre
                                            </span>
                                        </div>
                                        <select class="form-control" name="actividad_padre_id" required>
                                            <option value="">-- Seleccionar --</option>
                                            @foreach($actividades as $actividad)
                                            <option value="{{$actividad->id}}">{{$actividad->nombre}}</option>
                                            @endforeach
                                        </select>
                                    </div>                                    
                                    <br>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                Nombre de la madre
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" name="nombre_madre" value="{{old('nombre_madre')}}" 
                                        required
                                        onkeyup="javascript:this.value=this.value.toUpperCase();">                                    
                                    </div>                                    
                                    <br>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                Escolaridad del madre
                                            </span>
                                        </div>
                                        <select class="form-control" name="escolaridad_madre_id" required>
                                            <option value="">-- Seleccionar --</option>
                                            @foreach($escolaridades as $escolaridad)
                                            <option value="{{$escolaridad->id}}">{{$escolaridad->nombre}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <br>                                    
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                Actividad de la madre
                                            </span>
                                        </div>
                                        <select class="form-control" name="actividad_madre_id" required>
                                            <option value="">-- Seleccionar --</option>
                                            @foreach($actividades as $actividad)
                                            <option value="{{$actividad->id}}">{{$actividad->nombre}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <br>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                ¿Tiene automovil propio/familiar?
                                            </span>
                                        </div>
                                        <select class="form-control" name="automovil_familiar">
                                            <option value="">-- Selecionar --</option>
                                            <option value="true">Si</option>
                                            <option value="false">No</option>
                                        </select> 
                                    </div>
                                    <br>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                ¿Tiene computadora?
                                            </span>
                                        </div>
                                        <select class="form-control"name="computadora">
                                            <option>-- Selecionar --</option>
                                            <option value="true">Si</option>
                                            <option value="false">No</option>
                                        </select> 
                                    </div>
                                    <br>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                ¿Tiene Seguro médico?
                                            </span>
                                        </div>
                                        <select class="form-control" onchange="toggleShow(document.getElementById('inputs_tiene_seguro_id'), this.value);" required>
                                            <option value="">-- Selecionar --</option>
                                            <option value="true">Si</option>
                                            <option value="false">No</option>
                                        </select> 
                                    </div>
                                    <br>
                                    <div id="inputs_tiene_seguro_id" hidden="hidden">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                   Tipo de seguro médico
                                                </span>
                                            </div>
                                            <select class="form-control" name="tipo_seg_medico">
                                                <option value="">-- Seleccionar--</option>
                                                <option value="IMSS">IMSS</option>
                                                <option value="ISSSTE (FEDERAL)">ISSSTE (FEDERAL)</option>
                                                <option value="ISSTEY (ESTATAL)">ISSTEY (ESTATAL)</option>
                                                <option value="SEGURO POPULAR">SEGURO POPULAR</option>
                                                <option value="SEGURO PARTICULAR">SEGURO PARTICULAR</option>
                                            </select> 
                                        </div>                                    
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    Numero de seguro médico
                                                </span>
                                            </div>
                                            <input type="number" class="form-control" name="numero_imss" value="{{old('numero_imss')}}" placeholder="No requerido en este momento.">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                Tamaño de la casa
                                            </span>
                                        </div>
                                        <select class="form-control" name="tamano_casa">
                                            <option>-- Selecionar --</option>
                                            <option value="C">CHICA</option>
                                            <option value="M">MEDIANA</option>
                                            <option value="G">GRANDE</option>
                                        </select> 
                                    </div>
                                    <br>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                               Ingreso familiar
                                            </span>
                                        </div>
                                        <input type="number" class="form-control" name="ingreso_familiar" value="{{old('ingreso_familiar')}}" placeholder="No requerido en este momento." id="ingreso_familiar_id" onblur="toggleDisable('personas_dependen_ingreso_id', this.value)">
                                    </div>
                                    <br>
                                    <small class="text-danger" id="mensaje_ingreso_percapita_id"></small>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                Personas que dependen de ese ingreso
                                            </span>
                                        </div>
                                        <div class="row" style="width: 70%;">
                                            <div class="col-md-6">
                                                <input type="number" 
                                                class="form-control" 
                                                name="personas_dependen_ingreso" 
                                                id="personas_dependen_ingreso_id" disabled="disabled" onkeyup="calcularIngresoPercapita('ingreso_familiar_id', this.value,'ingreso_percapita_id')" step="1">
                                            </div>     
                                            <div class="col-md-6">
                                                <input type="number" class="form-control" name="ingreso_percapita" step="1" placeholder="Campo calculado / Ingreso percápita" id="ingreso_percapita_id" readonly="readonly">
                                            </div>
                                        </div>
                                    </div> 
                                    <br>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                Personas que viven en la casa
                                            </span>
                                        </div>
                                        <input type="number" class="form-control" name="viven_en_casa" value="{{old('viven_en_casa')}}" placeholder="No requerido en este momento.">
                                    </div>
                                    <br>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                ¿Tiene hermanos?
                                            </span>
                                        </div>
                                        <select class="form-control" name="tiene_hermanos" onchange="toggleShow(document.getElementById('inputs_tiene_hermanos_id'), this.value)" required>
                                            <option value="">-- Seleccionar --</option>
                                            <option value="true">SI</option>
                                            <option value="false">NO</option>
                                        </select>
                                        
                                    </div>
                                    <br>
                                    <div id="inputs_tiene_hermanos_id" hidden="hidden">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    ¿Cuántos?
                                                </span>
                                            </div>
                                            <input type="number" step="0" class="form-control" name="num_hermanos" value="{{old('num_hermanos')}}">
                                        </div>                                  
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    ¿Cuantos estudian?
                                                </span>
                                            </div>
                                            <input type="number" class="form-control" name="num_hermanos_estudian">
                                        </div>
                                    </div>                                    
                                    <br>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                ¿Trabajas?
                                            </span>
                                        </div>
                                        <select class="form-control" onchange="toggleShow(document.getElementById('inputs_trabajas_id'), this.value)"
                                         name="trabajas" required>
                                          <option value="">-- Seleccionar --</option>
                                           <option value="true">SI</option>
                                           <option value="false">NO</option>
                                        </select>
                                    </div>
                                    <br>
                                    <div id="inputs_trabajas_id" hidden="hidden">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    ¿Actividad en la que trabajas?
                                                </span>
                                            </div>
                                            <select class="form-control" name="actividad_trabajo_id">
                                                <option value="">-- Seleccionar --</option>
                                                @foreach($actividades as $actividad)
                                                <option value="{{$actividad->id}}">{{$actividad->nombre}}</option>
                                                @endforeach
                                            </select>
                                        </div>                                    
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    Horario de trabajo
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" name="horario_trabajo" value="{{old('horario_trabajo')}}">
                                        </div>                                  
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    Teléfono de trabajo
                                                </span>
                                            </div>
                                            <input class="form-control" max="10000000000" type="number" step="1" name="telefono_trabajo" value="{{old('telefono_trabajo')}}" placeholder="No requerido en este momento.">  
                                        </div>
                                    </div>
                                    <br>
                                    <div id="inputs_datos_conyugue_id" hidden="hidden">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    Nombre del conyugue
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" name="nombre_conyuge" value="{{old('nombre_conyuge')}}" onkeyup="javascript:this.value=this.value.toUpperCase();">
                                        </div>                                  
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    Escolaridad del conyugue
                                                </span>
                                            </div>
                                            <select class="form-control" name="escolaridad_conyuge_id">
                                                <option value="">-- Seleccionar --</option>
                                                @foreach($escolaridades as $escolaridad)
                                                <option value="{{$escolaridad->id}}">{{$escolaridad->nombre}}</option>
                                                @endforeach
                                            </select>
                                        </div>                                  
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    Actividad del conyugue
                                                </span>
                                            </div>
                                            <select class="form-control" name="actividad_conyuge_id">
                                                <option value="">-- Seleccionar --</option>
                                                @foreach($actividades as $actividad)
                                                <option value="{{$actividad->id}}">{{$actividad->nombre}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                ¿Tiene hijos?
                                            </span>
                                        </div>
                                        <select class="form-control" name="hijos" onchange="toggleShow(document.getElementById('inputs_datos_hijos_id'), this.value)" required>
                                           <option value="">-- Seleccionar --</option>
                                           <option value="true">SI</option>
                                           <option value="false">NO</option>
                                        </select>                              
                                    </div>
                                    <br>
                                    <div id="inputs_datos_hijos_id" hidden="hidden">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                   Entre 1 y 5 ¿Cuántos?
                                                </span>
                                            </div>
                                            <input type="number" class="form-control"name="0_5" value="{{old('0_5')}}">
                                        </div>                                  
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                   Entre 6 y 12 ¿Cuántos?
                                                </span>
                                            </div>
                                            <input type="number" class="form-control" name="6_12" value="{{old('6_12')}}">
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                   Entre 13 y 18 ¿Cuántos?
                                                </span>
                                            </div>
                                            <input type="number" class="form-control" name="13_18" value="{{old('13_18')}}">
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                   Mayores de 18 ¿Cuántos?
                                                </span>
                                            </div>
                                            <input type="number" class="form-control" name="mayor_18" value="{{old('mayor_18')}}">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row col-md-12">  
                                        <div class="col-md-4"></div>
                                        <div class="col-md-4">
                                            <button type="submit" class="btn btn-success btn-block" style="height: 100%" data-container="body" data-toggle="popover" data-placement="top" data-content="Se guardará la información unicamente.">GUARDAR INFORMACIÓN</button>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="hidden" name="subir_documentos" value="false" id="input_subir_documentos_id">
                                            <button type="submit" class="btn btn-primary btn-block" onclick="javascript:document.getElementById('input_subir_documentos_id').value=true;" data-container="body" data-toggle="popover" data-placement="top" data-content="Se guardará la información y será enviado al apartado para subir documentos del alumno.">GUARDAR INFORMACIÓN E IR A SUBIR DOCUMENTOS</button>     
                                        </div>                                        
                                    </div>
                                </div>
                            </div>

                            {{-- ************************************************** --}}
                            {{-- ************************************************** --}}
                        </div>
                       </form>
                      </div>
                    </div> <!-- /.card -->                      
                </div> <!-- /.cols -->                      

        </div> {{-- fin row  --}}
    </div>    
    @csrf {{-- _token laravel     --}}
@endif
@endsection
@section('scripts')
    <script src="{{asset('/CODE_DATA/public/js/internal/estados_y_municipios_mexico.js') }}"></script>
    <script src="{{asset('/CODE_DATA/public/js/internal/calcular_edad.js') }}"></script>
    <script src="{{asset('/CODE_DATA/public/js/developer/global/sys.js') }}"></script>
    {{-- <script defer src="{{asset('/CODE_DATA/public/js/internal/validarCURP.js')}}"></script> --}}
    <script defer>    
        const pre_carreras_message = document.getElementById('carreras_message_id');
        const pre_grupos_message   = document.getElementById('grupos_message_id');
        const sel_carreras_message = document.getElementById('carreras_id');   
        const sel_grupos_message   = document.getElementById('grupos_id'); 

        (function(){
            EstadosMunicipiosMexico.set('estado_nacimiento_id','municipio_nacimiento_id');
            EstadosMunicipiosMexico.set('estado_domicilio_id','municipio_domicilio_id');   
            EstadosMunicipiosMexico.set('estado_bachillerato_id','municipio_bachillerato_id');   
            Edad.calcular('fecha_nacimiento_id','edad_invisible_id','edad_visible_id');
            $('[data-toggle="popover"]').popover({
                trigger : 'hover'
            });          

        }());

        var contar_inputs_no_llenados = 0;
        $("form input").on("invalid", function() {                
            if (contar_inputs_no_llenados++ == 1) {
                alert("Algunos campos no han sido llenados por favor, revice cuales.");
                //find tab id           
                throw "Algunos campos no han sido llenados por favor, revice cuales.";
            }
            //var element = $(this).closest('.ui-tabs-panel').index();
             //goto tab id
            //$('#tabs_creation_form_alumno_id').tabs('option', 'active', element);
         });
                
                

        function getGroupesOf(fetch, url_, reference_id) {
            console.log(fetch+" "+url_+" "+reference_id);

            let p_element;
            let sel_element_to_insert_response;
            if (reference_id == "") {
                alert("Opción seleccionada no valida");
                throw "Opción seleccionada no valida";
            }
            if (fetch == "carreras") {
                p_element = pre_carreras_message;
                sel_element_to_insert_response = sel_carreras_message ;
            }else if (fetch == "grupos"){
                p_element = pre_grupos_message;
                sel_element_to_insert_response = sel_grupos_message;
            }

            let args ={method: "POST" ,url: url_,HTML_form_id: null};  
            api = pretty.create(args);
            api.pushInput("reference_id",reference_id);     
            api.pushInput(document.getElementsByName('_token')[0]);   
            api.beforeSend(function(){                    
                p_element.innerHTML = "Consultando.. "+fetch;
            });
            api.send(function(done, request){                  

              let res = JSON.parse(request);                            
              if (done == false) {
                p_element.innerHTML = "Oups.. por favor vuelva a intentar";
                throw request;
              }
              if (res.status == 200) {  
                p_element.innerHTML = "Ok";
                sel_element_to_insert_response.innerHTML=setOnSelect(fetch,res.data);
              }else{
                p_element.innerHTML = res.data;
              }    

            });

            function setOnSelect(type,array){            

                let options=null;    
                if (type == "carreras") {
                    options += `<option value="">-- Seleccionar --</option>`;
                    array.forEach(function(object){
                        options += `<option value="${object.id}">
                                        ${object.descripcion}
                                    </option>`;
                    });
                 }else{
                    options += `<option value="">-- Seleccionar --</option>`;
                    array.forEach(function(object){
                        options += `<option value="${object.id}">
                                        ${object.codigo}
                                    </option>`;
                    });
                 }

                return options;
            }
        }


        function controlEstadoCivil(estado_civil){
            const inputs = document.getElementById('inputs_datos_conyugue_id');
            if (estado_civil == "C") {
                toggleShow(inputs, true);
            }else{
                toggleShow(inputs, false);
            }
        }

        var prepararInfoMismaPersonaAutorizada;
        function controlPersonaContactoYAutorizada(nom_contacto,parentesco_contacto,telefono_contacto){            
            let sel_misma_autorizada =document.getElementById('misma_autorizada_id');
            let nom = document.getElementById(nom_contacto).value;
            let par = document.getElementById(parentesco_contacto).value;
            let tel = telefono_contacto;
            if (nom != "" && par != "" && tel != "") {
                sel_misma_autorizada.removeAttribute("disabled");
                prepararInfoMismaPersonaAutorizada= new prepare(nom,par,tel);
            }else{
                prepararInfoMismaPersonaAutorizada= null;
                sel_misma_autorizada.setAttribute("disabled", "disabled");
            }
        }

        function prepare(...info){            
            this.nombre     = info[0];
            this.parentesco = info[1];
            this.telefono   = info[2];
        }
        function calcularIngresoPercapita(ingreso_familiar, personas_dependen_ingreso, ingreso_percapita){
            if (personas_dependen_ingreso != "") {                            
                let ingr_familiar= document.getElementById(ingreso_familiar).value;
                let percapita = 0;
                if (personas_dependen_ingreso != 0) {
                    calculo   =parseFloat(ingr_familiar/personas_dependen_ingreso);
                    percapita= truncNumber(calculo,2);
                }
                document.getElementById('mensaje_ingreso_percapita_id').innerHTML="";
                document.getElementById(ingreso_percapita).value =percapita;
            }else{
                document.getElementById('mensaje_ingreso_percapita_id').innerHTML="Valor no válido";
            }
        }

        function controlMismaPersonaAutorizada(value){
            let div_inputs = document.getElementById('inputs_persona_misma_contacto_id');
            let inputs = document.getElementsByClassName('misma_persona_contacto_class');

            if (value=="") {                
                div_inputs.classList.add("disabled-content");
                toggleShow(div_inputs,false);                        
            }else{
                if (JSON.parse(value)) {                
                    div_inputs.classList.add("disabled-content");
                    inputs[0].value=prepararInfoMismaPersonaAutorizada.nombre;
                    inputs[1].value=prepararInfoMismaPersonaAutorizada.parentesco;
                    inputs[2].value=prepararInfoMismaPersonaAutorizada.telefono;
                    toggleShow(div_inputs,true);
                }else{    
                    div_inputs.classList.remove("disabled-content");
                    toggleShow(div_inputs,true);
                }
            }
        }
    
    </script>
@endsection

