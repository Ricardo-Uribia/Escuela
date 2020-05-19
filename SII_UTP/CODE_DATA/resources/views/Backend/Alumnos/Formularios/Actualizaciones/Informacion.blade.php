{{-- Paso validaciones y existen los datos necesarios para crear un alumno --}}
<div class="tab-content">
    <div class="row">             

        <div class="col-md-2">            
            @if($alumno->fotografia != null)                
                <img src="{{asset("CODE_DATA/storage".App\Services\Internal\DocumentStatements::$PATH_ALUMN_IMG)."/".$alumno->fotografia}}" style="width: 150px" class="rounded">
            @else
                <small>Sin fotografía</small>                                
            @endif                         
            <small class="text-center">Nombre:  {{$alumno->getNombreCompleto()}}</small>
        </div>        
        <div class="col-md-10">
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
               <form class="was-validated form-group" action="{{url('/admin/alumnos/update')}}" method="POST"  enctype="multipart/form-data" >      
                @csrf
                <div class="tab-content" id="custom-tabs-three-tabContent">
                    <input type="hidden" name="tipo_update_form" = value="info">
                    <input type="hidden" name="alumno_id" = value="{{$alumno->id}}">
                    {{-- DATOS INGRESO --}}
                    <div class="tab-pane fade show active" id="contenido_tab_ingreso_id" role="tabpanel" aria-labelledby="a_head_link_tab_ingreso_id">
                        <div class="form-row">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        Folio
                                    </span>
                                </div>                                      
                                <input type="text" disabled="disabled" class="form-control" value="{{$alumno->folio->folio}}">
                            </div>
                            <br>                    
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        Matricula
                                    </span>
                                </div>
                                <input type="text" class="form-control"  value="{{$alumno->matricula}}" >
                            </div>
                            <br>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        Estatus
                                    </span>
                                </div>
                                <select class="form-control" required name="cfgstatus_id">
                                    <option value="{{$alumno->cfgstatus_id}}">
                                        {{$alumno->cfgstatus->descripcion}}
                                    </option>
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
                                @php
                                    $ultimo_grupo = $alumno->grupos->last();
                                    $carrera      = $ultimo_grupo->carrera;
                                    $nivel        = $carrera->nivel;
                                @endphp

                                <select class="form-control" id="niveles_id" onchange="getGroupesOf('carreras', '{{url('/admin/alumnos/fetch-carreras')}}',this.value)" required>
                                    
                                    <option value="{{$nivel->id}}">
                                        {{$nivel->nivel}}
                                    </option>
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
                            
                                    <option value="{{$carrera->id}}">
                                        {{$carrera->descripcion}}
                                    </option>
                                    
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
                                    <option value="{{$ultimo_grupo->id}}">
                                        {{$ultimo_grupo->codigo}}
                                    </option>
                                </select>                      
                            </div>
                            <br>                                     
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        Fecha registro
                                    </span>
                                </div>
                                <input type="date" class="form-control" name="fecha_registro" value="{{($alumno->fecha_registro)? date_format(new DateTime($alumno->fecha_registro),'Y-m-d'):''}}">
                            </div>
                            <br>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        Fecha ingreso
                                    </span>
                                </div>
                                <input type="date" class="form-control" name="fecha_ingreso" value="{{($alumno->fecha_ingreso)? date_format(new DateTime($alumno->fecha_ingreso),'Y-m-d'):''}}">
                            </div>
                            <br>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        Fecha egreso
                                    </span>
                                </div>
                                <input type="date" class="form-control" name="fecha_egreso" 
                                value="{{($alumno->fecha_egreso)? date_format(new DateTime($alumno->fecha_egreso),'Y-m-d'):''}}">
                            </div>                                    
                            <br>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        Nota:
                                    </span>
                                </div>
                                <textarea type="textarea" rows="6" class="form-control" name="notas" value="{{$alumno->notas}}" placeholder="No requerido en este momento."></textarea>
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
                                       value="{{$alumno->paterno}}">
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
                                       value="{{$alumno->materno}}" 
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
                                       value="{{$alumno->nombres}}">
                            </div>
                            <br>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        Genero
                                    </span>
                                </div>                 
                                <select class="form-control" name="genero" required>
                                @foreach($generos['references'] as $i => $genero)
                                    @if($genero == $alumno->genero)
                                        <option selected="selected" value="{{$alumno->genero}}">
                                            {{$generos['values'][$i]}}
                                        </option>
                                        @continue;
                                    @endif
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
                                @foreach($estados_civiles['references'] as $i => $edo_civil)
                                    @if($edo_civil == $alumno->estado_civil)
                                        <option selected="selected" value="{{$alumno->estado_civil}}">
                                            {{$estados_civiles['values'][$i]}}
                                        </option>
                                        @continue;
                                    @endif
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
                                <input type="date" class="form-control" name="fecha_nac" required id="fecha_nacimiento_id" value="{{($alumno->fecha_nac)? date_format(new DateTime($alumno->fecha_nac),'Y-m-d'):''}}">
                            </div>
                            <br>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        Edad
                                    </span>
                                </div>
                                {{-- visible --}}
                                <input type="text" id="edad_visible_id" value="{{($alumno->edad)?$alumno->edad.' años':''}}" class="form-control" readonly="readonly" required placeholder="Campo calculado.">
                                {{-- oculto --}}
                                <input type="hidden" name="edad" value="{{$alumno->edad}}" id="edad_invisible_id">
                            </div>
                            <br>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        Estado de nacimiento
                                    </span>
                                </div>   
                                @php
                                    $estado_nacimiento = $alumno->estadoReferencia($alumno->estado_nac_id);
                                @endphp
                                <input type="text" value="{{$estado_nacimiento->nom_ent}}" disabled="disabled" class="form-control">
                            </div>
                            <br>  
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        Municipio de nacimiento
                                    </span>
                                </div>
                                <input type="text" value="{{$alumno->municipio_nac}}" class="form-control" disabled="disabled">
                            </div>
                            <br>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        Correo electrónico (email)
                                    </span>
                                </div>
                                <input type="email" class="form-control" name="email" required value="{{$alumno->email}}"> 
                            </div>
                            <br>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        Teléfono
                                    </span>
                                </div>
                                <input type="number" class="form-control" name="telefono" value="{{$alumno->telefono}}" max="10000000000" step="1">
                            </div>
                            <br>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        Celular
                                    </span>
                                </div>
                                <input type="number" class="form-control" name="celular" value="{{$alumno->celular}}" required max="10000000000" step="1">
                            </div>
                            <br>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        CURP
                                    </span>
                                </div>                                  
                                <input class="form-control" id="curp_" type="text" name="curp" maxlength="18"           
                                       onkeyup="javascript:this.value=this.value.toUpperCase();" 
                                       required value="{{$alumno->curp}}">
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
                                <input type="text" class="form-control" name="domicilio" value="{{$alumno->domicilio}}" required>
                            </div>
                            <br>
                            <button type="button" id="btn_cambiar_edo_domicilio_id" class="btn btn-primary" onclick="cambiarEstadoMunicipioDomicilio(); toggleClass(this,'btn-primary', 'btn-danger')" data-container="body" data-toggle="popover" data-placement="top" data-content="Para poder cambiar el estado o municipio de domicilio debe activar la opcion de cambio presionando el botón azul.">
                                cambiar de estado o municipio
                            </button>                                
                            <div class="input-group mb-3" style="padding-top: 1%">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                       Estado                               
                                    </span>
                                </div> 
                                <select class="form-control" id="estado_domicilio_id" name="estado_id" required readonly="readonly" data-container="body" data-toggle="popover" data-placement="top" data-content="Para poder cambiar el estado de domicilio debe activar la opcion de cambio presionando el botón azul.">
                                    <option 
                                    value="{{$alumno->estadoReferencia($alumno->estado_id)->id}}">
                                        {{$alumno->estadoReferencia($alumno->estado_id)->nom_ent}}
                                    </option>                                 
                                </select> 
                            </div>
                            <br>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                       Municipio 
                                    </span>
                                </div> 
                                <select class="form-control" id="municipio_domicilio_id" name="municipio" required readonly="readonly" data-container="body" data-toggle="popover" data-placement="top" data-content="Para poder cambiar el municipio de domicilio debe activar la opcion de cambio presionando el botón azul, y despues selecionar el estado primero.">
                                    <option value="{{$alumno->municipio_nac}}">
                                        {{$alumno->municipio_nac}}
                                    </option>
                                </select>            
                            </div>
                            <br>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                       Ciudad o localidad
                                   </span>
                                </div> 
                                <input class="form-control" name="ciudad" required value="{{$alumno->ciudad}}">
                            </div>                                   
                            <br>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                       CP (Código postal)
                                    </span>
                                </div>                
                                 <input class="form-control" id="CP_" max="100000" name="cp"required type="number" step="1" value="{{$alumno->cp}}">
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
                                <input type="text" class="form-control" name="contacto" required value="{{$alumno->contacto}}" onkeyup="javascript:this.value=this.value.toUpperCase();" id="nombre_contacto_id">
                            </div>                                     
                            <br>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                      Parentesco contacto
                                    </span>
                                </div>     
                                <select class="form-control" id="parentesco_contacto_id" name="parentesco_contacto" required>      
                                    @foreach($parentescos["references"] as $i => $parentesco)
                                        @if($parentesco == $alumno->parentesco_contacto)
                                            <option selected="selected" value="{{$alumno->parentesco_contacto}}">
                                                {{$parentescos['values'][$i]}}
                                            </option>
                                            @continue;
                                        @endif
                                        <option value="{{$parentesco}}">
                                            {{$parentescos['values'][$i]}}
                                        </option>
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
                                <input class="form-control" name="tel_contacto" max="10000000000" type="number" step="1" id="tel_contacto_id" required value="{{$alumno->tel_contacto}}"  onblur="controlPersonaContactoYAutorizada()">
                            </div>
                            <br>
                            <p>Persona autorizada de pedir información</p>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                      ¿La persona de contacto es la misma que la autorizada?
                                    </span>
                                </div>                         
                                <select class="form-control" name="misma_autorizada" id="misma_autorizada_id" onchange="controlMismaPersonaAutorizada(this.value)" required >         
                                    @php
                                        $selectedTrue='';
                                        $selectedFalse='';
                                        if($alumno->misma_autorizada){
                                            $selectedTrue='selected="selected"';
                                        }else{
                                           $selectedFalse='selected="selected"';
                                        }
                                    @endphp
                                    <option value="true" {{$selectedTrue}}>
                                        SI
                                    </option>
                                    <option value="false" {{$selectedFalse}}>
                                        NO
                                    </option>
                                </select>   
                            </div>
                            <br>
                            <div id="inputs_persona_misma_contacto_id" class="row-fluid">
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
                                           value="{{$alumno->persona_autorizada}}"
                                           onkeyup="javascript:this.value=this.value.toUpperCase();">
                                </div>                                  
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                          Parentesco
                                        </span>
                                    </div>   
                                    <select class="form-control misma_persona_contacto_class" name="parentesco_autorizada" required>
                                      @foreach($parentescos["references"] as 
                                      $i => $parentesco) 
                                        @if($parentesco == $alumno->parentesco_autorizada)
                                            <option selected="selected" value="{{$alumno->parentesco_autorizada}}">
                                                {{$parentescos['values'][$i]}}
                                            </option>
                                            @continue;
                                        @endif
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
                                    <input type="number" class="form-control misma_persona_contacto_class" name="telefono_autorizada" value="{{$alumno->telefono_autorizada}}" required max="10000000000" step="1">
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
                                <input type="text" class="form-control" name="escuela_procedencia" value="{{$alumno->escuela_procedencia}}" placeholder="Bachillerato." required>
                            </div>  
                            <br>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                      Tipo 
                                    </span> 
                                </div>
                                <select class="form-control" name="tipo_bachillerato" required>            
                                    @foreach($tipos_bachiller['references'] as $i => $tipo)
                                        @if($tipo == $alumno->tipo_bachillerato)
                                            <option selected="selected" value="{{$alumno->tipo_bachillerato}}">
                                                {{$tipos_bachiller['values'][$i]}}
                                            </option>
                                            @continue
                                        @endif
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
                                    @foreach($sistemas_bachiller['references'] as $i => $sistema)
                                        @if($sistema == $alumno->sistema_bachillerato)
                                            <option selected="selected" value="{{$alumno->sistema_bachillerato}}">
                                                {{$sistemas_bachiller['values'][$i]}}
                                            </option>
                                            @continue
                                        @endif
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
                                @php
                                    $estado_bachiller = $alumno->estadoReferencia($alumno->estado_bachillerato_id);
                                @endphp
                                <input type="text" class="form-control" value="{{$estado_bachiller->nom_ent}}" disabled="disabled">
                            </div>
                            <br>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                      Municipio donde se encuentra
                                    </span>
                                </div>
                                <input type="text" class="form-control" value="{{$alumno->municipio_bachillerato}}" disabled="disabled">
                            </div>
                            <br>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                      Promedio bachillerato 
                                    </span>
                                </div>
                                <input class="form-control"step="00.01" name="promedio_bachillerato" required type="number" value="{{$alumno->promedio_bachillerato}}">
                            </div>
                            <br>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                      Inicio en el periodo
                                    </span>
                                </div>   
                                <input type="date" class="form-control" name="inicio_bachillerato" value="{{($alumno->inicio_bachillerato)? date_format(new DateTime($alumno->inicio_bachillerato),'Y-m-d'):''}}" >
                            </div>
                            <br>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                      Fininalizo
                                    </span>
                                </div>
                                <input type="date" class="form-control" name="fin_bachillerato" value="{{($alumno->fin_bachillerato)? date_format(new DateTime($alumno->fin_bachillerato),'Y-m-d'):''}}" >
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
                                    @php
                                        $selectedTrue='';
                                        $selectedFalse='';
                                        if($alumno->tuvo_beca_bachillerato){
                                            $selectedTrue='selected="selected"';
                                        }else{
                                           $selectedFalse='selected="selected"';
                                        }
                                    @endphp
                                    <option value="true" {{$selectedTrue}}>
                                        SI
                                    </option>
                                    <option value="false" {{$selectedFalse}}>
                                        NO
                                    </option>                              
                                </select> 
                            </div>
                            <br>                                              
                            <div class="input-group mb-3" {{($alumno->tuvo_beca_bachillerato)? '' : 'hidden'}}
                                id="input_tipo_beca_bachiller_id">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                      ¿Cual? / Tipo
                                    </span>
                                </div>
                                <input type="text" class="form-control" name="tipo_beca_bachillerato" value="{{$alumno->tipo_beca_bachillerato}}">
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
                                    @php
                                        $selectedTrue='';
                                        $selectedFalse='';
                                        if($alumno->solicita_beca_utp){
                                            $selectedTrue='selected="selected"';
                                        }else{
                                           $selectedFalse='selected="selected"';
                                        }
                                    @endphp
                                    <option value="true" {{$selectedTrue}}>
                                        SI
                                    </option>
                                    <option value="false" {{$selectedFalse}}>
                                        NO
                                    </option>  
                                </select> 
                            </div>
                            <br> 
                            <div {{($alumno->solicita_beca_utp)? '' : 'hidden'}} id="inputs_solicita_beca_utp_id" >
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                          Tipo beca 
                                        </span>
                                    </div>
                                    <input class="form-control" name="tipo_beca_utp" value="{{$alumno->tipo_beca_utp}}">        
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                          Folio SUBES
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" name="folio_subes" value="{{$alumno->folio_subes}}">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                          ¿Autoriza beca?
                                        </span>
                                    </div>                                        
                                    <select class="form-control" name="autoriza_beca_utp">
                                        @php
                                            $selectedTrue='';
                                            $selectedFalse='';
                                            if($alumno->autoriza_beca_utp){
                                                $selectedTrue='selected="selected"';
                                            }else{
                                               $selectedFalse='selected="selected"';
                                            }                                 
                                        @endphp
                                        <option value="true" {{$selectedTrue}}>Si</option>
                                        <option value="false" {{$selectedFalse}}>No</option>
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
                                    @php
                                        $selectedTrue='';
                                        $selectedFalse='';
                                        if($alumno->origen_indigena){
                                            $selectedTrue='selected="selected"';
                                        }else{
                                            $selectedFalse='selected="selected"';
                                        }                                   
                                    @endphp

                                    <option value="true" {{$selectedTrue}}>
                                        SI
                                    </option>
                                    <option value="false" {{$selectedFalse}}>
                                        NO
                                    </option>
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
                                    @php
                                        $selectedTrue='';
                                        $selectedFalse='';
                                        if($alumno->lengua_indigena){
                                            $selectedTrue='selected="selected"';
                                        }else{
                                            $selectedFalse='selected="selected"';
                                        }                                   
                                    @endphp
                                    <option value="true" {{$selectedTrue}}>SI
                                    </option>
                                    <option value="false" {{$selectedFalse}}>
                                        NO
                                    </option>
                                </select> 
                            </div>
                            <br>
                            <div class="input-group mb-3" id="lengua_indigena_hablante_id" {{($alumno->lengua_indigena)?'' : 'hidden'}} >
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                      ¿Cual? 
                                    </span>
                                </div>                                    
                                <select class="form-control" name="lengua_indigena_hablante" value="">                                         
                                    @foreach($lenguas_indigenas['references'] as $i => $lengua)
                                        @if($lengua == $alumno->lengua_indigena_hablante)
                                            <option selected="selected" value="{{$alumno->lengua_indigena_hablante}}">
                                                {{$lenguas_indigenas['values'][$i]}}
                                            </option>
                                            @continue
                                        @endif
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
                                    @php
                                        $selectedTrue='';
                                        $selectedFalse='';
                                        if($alumno->discapacidad){
                                            $selectedTrue='selected="selected"';
                                        }else{
                                            $selectedFalse='selected="selected"';
                                        }                                   
                                    @endphp
                                    <option value="true" {{$selectedTrue}}>SI
                                    </option>
                                    <option value="false" {{$selectedFalse}}>
                                        NO
                                    </option>
                                </select> 
                            </div>
                            <br>
                            <div class="input-group mb-3" id="tipo_discapacidad_id" {{($alumno->discapacidad)?'' : 'hidden'}}>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                      ¿Cual? 
                                    </span>
                                </div>
                                <select class="form-control" name="tipo_discapacidad">  
                                    @php
                                        $dsc_references = array('V','A','M');
                                        $dsc_values = array('VISUAL','AUDITIVA','MOTRIZ');
                                    @endphp   
                                    @foreach($dsc_references as $k => $value)
                                        @if($edo_civil == $alumno->tipo_discapacidad)
                                            <option selected="selected" value="{{$alumno->tipo_discapacidad}}">
                                                {{$dsc_values[$k]}}
                                            </option>
                                            @continue;
                                        @endif
                                        <option value="{{$dsc_references[$k]}}">
                                            {{$dsc_values[$k]}}
                                        </option>
                                    @endforeach     
                                </select>
                            </div>
                            <br>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                      ¿Tiene alguna enfermedad crónica o sigue algun tratamiento? 
                                    </span>
                                </div>
                                <select class="form-control" name="enfermedad" required onchange="toggleShow(document.getElementById('nombre_enfermedad_id'),this.value)">
                                    @php
                                        $selectedTrue='';
                                        $selectedFalse='';
                                        if($alumno->enfermedad){
                                            $selectedTrue='selected="selected"';
                                        }else{
                                            $selectedFalse='selected="selected"';
                                        }
                                    @endphp
                                    <option value="true" {{$selectedTrue}}>SI
                                    </option>
                                    <option value="false"{{$selectedFalse}}>
                                        NO
                                    </option>
                                </select>
                            </div>
                            <br>
                            <div class="input-group mb-3" id="nombre_enfermedad_id" {{($alumno->enfermedad)?'':'hidden'}}>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                      Nombre de enfermedad o tipo de tratamiento
                                    </span>
                                </div>
                                <input type="text" class="form-control" name="nombre_enfermedad" value="{{$alumno->nombre_enfermedad}}">
                            </div>
                            <br>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                      ¿Tiene alergias? 
                                    </span>
                                </div>
                                <select class="form-control" required name="alergias" onchange="toggleShow(document.getElementById('tipo_alergia_id'),this.value)">
                                    @php
                                        $selectedTrue='';
                                        $selectedFalse='';
                                        if($alumno->alergias){
                                            $selectedTrue='selected="selected"';
                                        }else{
                                            $selectedFalse='selected="selected"';
                                        }
                                    @endphp
                                    <option value="true" {{$selectedTrue}}>SI
                                    </option>
                                    <option value="false"{{$selectedFalse}}>
                                        NO
                                    </option>
                                </select> 
                            </div>
                            <br> 
                            <div class="input-group mb-3" {{($alumno->alergias)?'':'hidden'}} id="tipo_alergia_id">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        ¿Cual?
                                    </span>
                                </div> 
                                <input type="text" class="form-control" name="tipo_alergia" value="{{$alumno->tipo_alergia}}">
                            </div>
                            <br>  
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        Peso
                                    </span>
                                </div>     
                                <input type="number" step="0.1" class="form-control" name="peso" value="{{$alumno->peso}}" placeholder="No requerido en este momento.">  
                            </div>
                            <br>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        Talla
                                    </span>
                                </div>
                                <select class="form-control" name="talla">
                                    @php
                                        $tallas_ref = array('XS','S','M','G','XG','XXG');
                                        $tallas_val = array('Extra Chico','Chico','Mediano','Grande','Extra Grande','Extra Extra Grande');
                                    @endphp
                                    @foreach($tallas_ref as $k => $value)
                                        @if($value == $alumno->talla)
                                            <option selected="selected" value="{{$alumno->talla}}">
                                                {{$tallas_val[$k]}}
                                            </option>
                                            @continue;
                                        @endif
                                        <option value="{{$tallas_ref[$k]}}">
                                            {{$tallas_val[$k]}}
                                        </option>
                                    @endforeach
                                </select> 
                            </div>
                            <br> 
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        Nombre del padre
                                    </span>
                                </div> 
                                <input type="text" class="form-control" name="nombre_padre" value="{{$alumno->nombre_padre}}" required onkeyup="javascript:this.value=this.value.toUpperCase();">                                    
                            </div>
                            <br>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        Escolaridad del padre
                                    </span>
                                </div>
                                <select class="form-control" name="escolaridad_padre_id" required>         
                                    @foreach($escolaridades as $escolaridad)
                                        @if($alumno->escolaridad_padre_id == $escolaridad->id)
                                            <option  selected="selected" value="{{$alumno->escolaridad_padre_id}}">{{$escolaridad->nombre}}</option>
                                        @continue
                                        @endif
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
                                    @foreach($actividades as $actividad)
                                        @if($alumno->actividad_padre_id == $actividad->id)
                                            <option  selected="selected" value="{{$alumno->actividad_padre_id}}">
                                                {{$actividad->nombre}}
                                            </option>
                                        @continue
                                        @endif
                                        <option value="{{$actividad->id}}">
                                            {{$actividad->nombre}}
                                        </option>
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
                                <input type="text" class="form-control" name="nombre_madre" value="{{$alumno->nombre_madre}}" required onkeyup="javascript:this.value=this.value.toUpperCase();">                                    
                            </div>                                    
                            <br>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        Escolaridad del madre
                                    </span>
                                </div>
                                <select class="form-control" name="escolaridad_madre_id" required>
                                    @foreach($escolaridades as $escolaridad)
                                        @if($alumno->escolaridad_madre_id == $escolaridad->id)
                                            <option  selected="selected" value="{{$alumno->escolaridad_madre_id}}">
                                                {{$escolaridad->nombre}}
                                            </option>
                                        @continue
                                        @endif
                                        <option value="{{$escolaridad->id}}">   {{$escolaridad->nombre}}
                                        </option>
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
                                    @foreach($actividades as $actividad)
                                        @if($alumno->actividad_madre_id == $actividad->id)
                                            <option  selected="selected" value="{{$alumno->actividad_madre_id}}">
                                                {{$actividad->nombre}}
                                            </option>
                                        @continue
                                        @endif
                                        <option value="{{$actividad->id}}">
                                            {{$actividad->nombre}}
                                        </option>
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
                                    @php
                                        $selectedTrue='';
                                        $selectedFalse='';
                                        if($alumno->alergias){
                                            $selectedTrue='selected="selected"';
                                        }else{
                                            $selectedFalse='selected="selected"';
                                        }
                                    @endphp
                                    <option value="true" {{$selectedTrue}}>SI
                                    </option>
                                    <option value="false"{{$selectedFalse}}>
                                        NO
                                    </option>
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
                                    @php
                                        $selectedTrue='';
                                        $selectedFalse='';
                                        if($alumno->alergias){
                                            $selectedTrue='selected="selected"';
                                        }else{
                                            $selectedFalse='selected="selected"';
                                        }
                                    @endphp
                                    <option value="true" {{$selectedTrue}}>SI
                                    </option>
                                    <option value="false"{{$selectedFalse}}>
                                        NO
                                    </option>
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
                                    @php
                                        $selectedTrue='';
                                        $selectedFalse='';
                                        if($alumno->tipo_seg_medico != null){
                                            $selectedTrue='selected="selected"';
                                        }else{
                                            $selectedFalse='selected="selected"';
                                        }
                                    @endphp
                                    <option value="true" {{$selectedTrue}}>SI
                                    </option>
                                    <option value="false"{{$selectedFalse}}>
                                        NO
                                    </option>
                                </select> 
                            </div>
                            <br>
                            <div id="inputs_tiene_seguro_id" {{($alumno->tipo_seg_medico != null)?'':'hidden'}}>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                           Tipo de seguro médico
                                        </span>
                                    </div>
                                    <select class="form-control" name="tipo_seg_medico">
                                        @php
                                            $tipos_seg = array('IMMS','ISSSTE (FEDERAL)', 'ISSSTE (ESTATAL)','ISSTEY (ESTATAL)','SEGURO POPULAR','SEGURO PARTICULAR');
                            
                                        @endphp
                                        @foreach($tipos_seg as $value)
                                            @if($value == $alumno->tipo_seg_medico)
                                                <option selected="selected" value="{{$alumno->tipo_seg_medico}}">
                                                    {{$value}}
                                                </option>
                                                @continue;
                                            @endif
                                            <option value="{{$value}}">
                                                {{$value}}
                                            </option>
                                        @endforeach
                                    </select> 
                                </div>                                    
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            Numero de seguro médico
                                        </span>
                                    </div>
                                    <input type="number" class="form-control" name="numero_imss" value="{{$alumno->numero_imss}}" placeholder="No requerido en este momento.">
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
                                    @php
                                        $tams_c_ref = array('C','G','M');
                                        $tams_c_val = array('CHICA','MEDIANA','GRANDE');
                                    @endphp
                                    @foreach($tams_c_ref as $k => $value)
                                        @if($value == $alumno->tamano_casa)
                                            <option selected="selected" value="{{$alumno->tamano_casa}}">
                                                {{$tams_c_val[$k]}}
                                            </option>
                                            @continue;
                                        @endif
                                        <option value="{{$value}}">
                                            {{$tams_c_val[$k]}}
                                        </option>
                                    @endforeach                           
                                </select> 
                            </div>
                            <br>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                       Ingreso familiar
                                    </span>
                                </div>
                                <input type="number" class="form-control" name="ingreso_familiar" value="{{$alumno->ingreso_familiar}}" placeholder="No requerido en este momento." id="ingreso_familiar_id">
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
                                        value="{{$alumno->personas_dependen_ingreso}}" 
                                        name="personas_dependen_ingreso" 
                                        id="personas_dependen_ingreso_id" onkeyup="calcularIngresoPercapita('ingreso_familiar_id', this.value,'ingreso_percapita_id')" step="1">
                                    </div>     
                                    <div class="col-md-6">
                                        <input type="number" class="form-control" name="ingreso_percapita" step="1" placeholder="Campo calculado / Ingreso percápita" id="ingreso_percapita_id" value="{{$alumno->ingreso_percapita}}"  readonly="readonly">
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
                                <input type="number" class="form-control" name="viven_en_casa" value="{{$alumno->viven_en_casa}}"  placeholder="No requerido en este momento.">
                            </div>
                            <br>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        ¿Tiene hermanos?
                                    </span>
                                </div>
                                <select class="form-control" name="tiene_hermanos" onchange="toggleShow(document.getElementById('inputs_tiene_hermanos_id'), this.value)" required>
                                    @php
                                        $selectedTrue='';
                                        $selectedFalse='';
                                        if($alumno->tiene_hermanos){
                                            $selectedTrue='selected="selected"';
                                        }else{
                                            $selectedFalse='selected="selected"';
                                        }
                                    @endphp
                                    <option value="true" {{$selectedTrue}}>SI
                                    </option>
                                    <option value="false"{{$selectedFalse}}>
                                        NO
                                    </option>
                                </select>
                                
                            </div>
                            <br>
                            <div id="inputs_tiene_hermanos_id" {{($alumno->tiene_hermanos)?'':'hidden'}}>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            ¿Cuántos?
                                        </span>
                                    </div>
                                    <input type="number" step="0" class="form-control" name="num_hermanos" value="{{$alumno->num_hermanos}}">
                                </div>                                  
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            ¿Cuantos estudian?
                                        </span>
                                    </div>
                                    <input type="number" class="form-control" name="num_hermanos_estudian" value="{{$alumno->num_hermanos_estudian}}">
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
                                    @php
                                        $selectedTrue='';
                                        $selectedFalse='';
                                        if($alumno->trabajas){
                                            $selectedTrue='selected="selected"';
                                        }else{
                                            $selectedFalse='selected="selected"';
                                        }
                                    @endphp
                                    <option value="true" {{$selectedTrue}}>SI
                                    </option>
                                    <option value="false"{{$selectedFalse}}>
                                        NO
                                    </option>
                                </select>
                            </div>
                            <br>
                            <div id="inputs_trabajas_id" {{($alumno->trabajas)?'':'hidden'}}>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            ¿Actividad en la que trabajas?
                                        </span>
                                    </div>
                                    <select class="form-control" name="actividad_trabajo_id">  
                                        @foreach($actividades as $actividad)
                                            @if($alumno->actividad_trabajo_id == $actividad->id)
                                                <option value="{{$actividad->id}}" selected="selected" >
                                                {{$actividad->nombre}}
                                                </option>
                                            @continue
                                            @endif
                                            <option value="{{$actividad->id}}">{{$actividad->nombre}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>                                    
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            Horario de trabajo
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" name="horario_trabajo" value="{{$alumno->horario_trabajo}}">
                                </div>                                  
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            Teléfono de trabajo
                                        </span>
                                    </div>
                                    <input class="form-control" max="10000000000" type="number" step="1" name="telefono_trabajo" value="{{$alumno->telefono_trabajo}}" placeholder="No requerido en este momento.">  
                                </div>
                            </div>
                            <br>
                            <div id="inputs_datos_conyugue_id" {{($alumno->estado_civil == 'C' )?'':'hidden'}}>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            Nombre del conyugue
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" name="nombre_conyuge" value="{{$alumno->nombre_conyuge}}" onkeyup="javascript:this.value=this.value.toUpperCase();">
                                </div>                                  
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            Escolaridad del conyugue
                                        </span>
                                    </div>
                                    <select class="form-control" name="escolaridad_conyuge_id">                                            
                                        @foreach($escolaridades as $escolaridad)
                                            @if($escolaridad->id == $alumno->escolaridad_padre_id)
                                                <option selected="selected" value="{{$escolaridad->id}}">
                                                    {{$escolaridad->nombre}}
                                                </option>
                                            @continue
                                            @endif                                          
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
                                        @foreach($actividades as $actividad)
                                            @if($actividad->id == $alumno->actividad_conyuge_id)
                                                <option selected="selected" value="{{$actividad->id}}">
                                                    {{$actividad->nombre}}
                                                </option>
                                            @continue                                       
                                            @endif
                                            <option value="{{$actividad->id}}">{{$actividad->nombre}}
                                            </option>
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
                                    @php
                                        $selectedTrue='';
                                        $selectedFalse='';
                                        if($alumno->hijos){
                                            $selectedTrue='selected="selected"';
                                        }else{
                                            $selectedFalse='selected="selected"';
                                        }
                                    @endphp
                                    <option value="true" {{$selectedTrue}}>SI
                                    </option>
                                    <option value="false"{{$selectedFalse}}>
                                        NO
                                    </option>
                                </select>                              
                            </div>
                            <br>
                            <div id="inputs_datos_hijos_id" {{($alumno->hijos)?'':'hidden'}}>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                           Entre 1 y 5 ¿Cuántos?
                                        </span>
                                    </div>
                                    <input type="number" class="form-control"name="0_5" value="{{$alumno['0_5']}}">
                                </div>                                  
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                           Entre 6 y 12 ¿Cuántos?
                                        </span>
                                    </div>
                                    <input type="number" class="form-control" name="6_12" value="{{$alumno['6_12']}}">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                           Entre 13 y 18 ¿Cuántos?
                                        </span>
                                    </div>
                                    <input type="number" class="form-control" name="13_18" value="{{$alumno['13_18']}}">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                           Mayores de 18 ¿Cuántos?
                                        </span>
                                    </div>
                                    <input type="number" class="form-control" name="mayor_18" value="{{$alumno['mayor_18']}}">
                                </div>
                            </div>
                            <br>
                            <div class="row col-md-12">  
                                <div class="col-md-4"></div>
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-success btn-block">GUARDAR INFORMACIÓN</button>
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
                
        $('[data-toggle="popover"]').popover({
            trigger : 'hover'
        });           

        const element_estado_domicilio    = document.getElementById('estado_domicilio_id');
        const element_municipio_domicilio = document.getElementById('municipio_domicilio_id');
        const btn_cambiar_edo_domicilio= document.getElementById('btn_cambiar_edo_domicilio_id');
        var old_value_estado_domicilio    = element_estado_domicilio.value;
        var old_text_estado_domicilio     = element_estado_domicilio.innerText;
        var old_value_municipio_domicilio = element_municipio_domicilio.value;
        var old_text_municipio_domicilio  = element_municipio_domicilio.innerText;;
        var calls = 0;

        function cambiarEstadoMunicipioDomicilio(calls_){                
            calls += 1;            
            if (calls == 1) {
                //habilitar         
                //btn_cambiar_edo_domicilio.classList.remove('btn-primary');
                //btn_cambiar_edo_domicilio.classList.add('btn-danger');

                EstadosMunicipiosMexico.set('estado_domicilio_id','municipio_domicilio_id');
                element_estado_domicilio.removeAttribute("readonly");
                element_municipio_domicilio.removeAttribute("readonly");                
            }else{
                //deshabilitar   
                //btn_cambiar_edo_domicilio.classList.remove('btn-danger');
                //btn_cambiar_edo_domicilio.classList.add('btn-primary');

                element_estado_domicilio.innerHTML = `<option value="${old_value_estado_domicilio}">${old_text_estado_domicilio}</option>`;

                element_municipio_domicilio.innerHTML = `<option value="${old_value_municipio_domicilio}">${old_text_municipio_domicilio}</option>`;

                element_estado_domicilio.setAttribute("readonly","readonly");
                element_municipio_domicilio.setAttribute("readonly","readonly");
                calls =0;
            }            
        }

        

        function getGroupesOf(fetch, url_, reference_id) {            
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
        function controlPersonaContactoYAutorizada(){
            let sel_misma_autorizada=document.getElementById('misma_autorizada_id');
            let nom = document.getElementById('nombre_contacto_id').value;
            let par = document.getElementById('parentesco_contacto_id').value;
            let tel = document.getElementById('tel_contacto_id').value;
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
                toggleShow(div_inputs,false);                        
            }else{
                if (JSON.parse(value)) {  
                    controlPersonaContactoYAutorizada();   
                    inputs[0].value=prepararInfoMismaPersonaAutorizada.nombre;
                    inputs[1].value=prepararInfoMismaPersonaAutorizada.parentesco;
                    inputs[2].value=prepararInfoMismaPersonaAutorizada.telefono;
                    toggleShow(div_inputs,true);
                }else{                        
                    inputs[0].value="";
                    inputs[1].value="";
                    inputs[2].value="";
                    toggleShow(div_inputs,true);
                }
            }
        }
    
    </script>
@endsection