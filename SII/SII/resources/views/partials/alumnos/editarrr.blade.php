 @extends('layouts.admin')

@section('principal')


<div id="page-wrapper">
<br>
 


  <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading ">
                            <center><h4>Ficha del Alumno</h4></center> 
                        </div>
                    </div>
            </div> 
        </div>

<div class="tab-content">
    <div class="col-md-12 contenedor-datos">
        <div role="tabpanel">
          <ul class="nav nav-pills" role="tablist">
            <li role="presentation" class="active"><a href="#principal" aria-controls="principal" data-toggle="tab" role="tab">Datos</a></li>
            <li role="presentation"><a href="#datos" aria-controls="datos" data-toggle="tab" role="tab">Datos Generales</a></li>
            <li role="presentation"><a href="#domicilio" aria-controls="domicilio" data-toggle="tab" role="tab">Domicilio y Contacto</a></li>
            <li role="presentation"><a href="#escuela" aria-controls="escuela" data-toggle="tab" role="tab">Escuela de Procedencia</a></li>
            <li role="presentation"><a href="#beca" aria-controls="beca" data-toggle="tab" role="tab">Beca</a></li>
            <li role="presentation"><a href="#estadisticos" aria-controls="estadisticos" data-toggle="tab" role="tab">Estadisticos</a></li>
            <li role="presentation"><a href="#documentos" aria-controls="documentos" data-toggle="tab" role="tab">Documentosssss</a></li>
            
              
          </ul>




<form role="form-signin" class="form-horizontal" id="" method="POST" action="" > 
 {{csrf_field()}} 
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active"  id="principal">
            <center>
             
               <br>
               
                    <div class="col-md-9">
                        <div id="sidebar">
                            <div class="well">
                                <legend>Datos de ingreso</legend> 
                                <div class="form-group">
                                    <input type="hidden" class="form-control" id="NUMEROALUMNO"  name="txtid" value="">
                                </div>

                                 <div class="input-group-addon">
                        <span class=""><b>Lugar de examen</b></span>
                       <br><br>
                        <span class=""><b>Fecha de examen</b></span>
                    </div><br>

                    <div class="input-group">
                        <span class="input-group-addon">Folio</span>
                        <input type="text" class="form-control" placeholder="" name="folioAlumn" value="{{ $alum->Folio }}" readonly disabled>
                    </div><br>
                    
                    <div class="input-group">
                        <span class="input-group-addon">Matrícula</span>
                        <input type="text" class="form-control" placeholder="" name="Matricula" value="{{ $alum->Matricula }}"readonly disabled>
                    </div><br>

                        <div class="input-group">
                        <span for="status" class="input-group-addon">Status</span>
                        <input type="" class="form-control" name="status" value="{{ $alum->Status }}" disabled="">
                    </div><br>

                    <div class="input-group">
                    <span form="Carrera" class="input-group-addon">Carrera</span>
                    <input type="text" name="Carrera" class="form-control" readonly="readonly" value="{{$alum->Carrera}}" disabled="">
                    </div><br>

    

                    <div class="input-group">
                        <span class="input-group-addon">Fecha de creación</span>
                        <input type="date" class="form-control" placeholder="" name="fechaCrea" value="{{$alum->Fecha_Creacion}}" readonly>
                    </div><br>

                    <div class="input-group">
                        <span class="input-group-addon">Fecha de actualización</span>
                        <input type="date" class="form-control" placeholder="" name="fechaAct" value="{{$alum->Fecha_Actualizacion}}" readonly>
                    </div><br>

                    <div class="input-group">
                        <span class="input-group-addon">Fecha de registro</span>
                        <input type="date" class="form-control" placeholder="" name="fechaReg" value="{{$alum->Fecha_Registro}}" readonly>
                    </div><br>

                    <div class="input-group">
                        <span class="input-group-addon">Fecha de ingreso</span>
                        <input type="date" class="form-control" placeholder="" name="fechaIng" value="{{$alum->Fecha_Ingreso}}" readonly>
                    </div><br>

                    <div class="input-group">
                        <span class="input-group-addon">Fecha de egreso</span>
                        <input type="date" class="form-control" placeholder="" name="fechaEg" value="{{$alum->Fecha_Egreso}}" readonly>
                    </div><br>

                    <div class="input-group ">
                       <span class="input-group-addon">Notas (descripción)</span>
                       <input type="textarea" rows="3" class="form-control"  placeholder="" name="notas" value="{{$alum->Notas}}" readonly>
                    </div><br>
                  
                            </div>
                        </div>
                    </div>
                    
           
                </center>
            </div>

             <div role="tabpanel" class="tab-pane" id="datos">
            
               <br>
                    <div class="col-md-7">
                        <div id="sidebar">
                            <div class="well">
                              <legend>Datos Generales</legend>
                    <div class="input-group">
                        <span class="input-group-addon">Primer Apellido</span>
                        <input type="text" class="form-control" placeholder="" name="paternoAlumn" value="{{$alum->Paterno}}" readonly>
                    </div><br>

                     <div class="input-group">
                        <span class="input-group-addon">Segundo Apellido</span>
                        <input type="text" class="form-control" placeholder="" name="maternoAlumn" value="{{$alum->Materno}}" readonly>
                    </div><br>

                    <div class="input-group">
                        <span class="input-group-addon">Nombres</span>
                        <input type="text" class="form-control" placeholder="" name="nombre" value="{{$alum->Nombres}}" readonly>
                    </div><br>

                    <div class="input-group">
                                <span form="genero" class="input-group-addon">Genero</span>
                                <input type="text" name="genero" class="form-control" readonly="readonly" value="{{$alum->Genero}}" disabled="">

                                <span  form="civilAlumn" class="input-group-addon">Estado Civil</span>
                                <input type="text" name="civilAlumn" class="form-control" readonly="readonly" value="{{$alum->Estado_Civil}}" disabled="">    
                     </div>

                    <div class="input-group">
                        <span class="input-group-addon">Fecha de nacimiento</span>
                        <input type="date" class="form-control" placeholder="" name="FechaNacAlumn" value="{{$alum->Fecha_Nac}}" readonly>
                    </div><br>

                      <div class="input-group">
                        <span class="input-group-addon">Edad</span>
                        <input type="number" class="form-control" placeholder="" name="edadAlumn" value="{{$alum->Edad}}" readonly>
                    </div><br>

                    <div class="input-group">
                        <span class="input-group-addon">Lugar de nacimiento</span>
                        <input type="text" class="form-control" placeholder="" name="lugarAlumn" value="{{$alum->Lugar_Nac}}" readonly>
                    </div><br>

                        <div class="input-group">
                        <span class="input-group-addon">Estado de nacimiento</span>
                        <input name="estadoNacAlumn" class="form-control" value="{{$alum->Estado_Nac}}" readonly>
                                    
                    </div><br>

                    <div class="input-group">
                        <span class="input-group-addon">Municipio de nacimiento</span>
                        <input type="text" class="form-control" placeholder="" name="municipioAlumn" value="{{$alum->Municipio_Nac}}" readonly>
                    </div><br>
                   
                   <div class="input-group">
                        <span class="input-group-addon">CURP</span>
                        <input type="text" class="form-control" placeholder="" name="curpAlumn" value="{{$alum->Clave_Ciudadana}}" readonly>
                    </div><br>
                            </div>
                        </div>
                    </div>
            </div>

            <div role="tabpanel" class="tab-pane" id="domicilio">
            
               <br>
                    <div class="col-md-6">
                        <div id="sidebar">
                            <div class="well">
                              <legend>Domicilio y Contacto</legend>
                    <div class="input-group">
                        <span class="input-group-addon">Domicilio</span>
                        <input type="text" class="form-control" placeholder="" name="domicilioAlumn" value="{{$alum->Domicilio}}" readonly>
                    </div><br>

                     <div class="input-group">
                        <span class="input-group-addon">Ciudad</span>
                        <input type="text" class="form-control" placeholder="" name="ciudadAlumn" value="{{$alum->Ciudad}}" readonly>
                    </div><br>


                    <div class="input-group">
                        <span class="input-group-addon">Muncicipio</span>
                        <input type="" class="form-control" placeholder="" name="munalumn" value="{{$alum->Municipio}}" readonly>
                        
                    </div><br>

                    <div class="input-group">
                        <span class="input-group-addon">Estado</span>
                        <input name="estadoAlumno" class="form-control" value="{{$alum->Estado}}" readonly>
    
                        <span class="input-group-addon">CP</span>
                        <input type="text" class="form-control" placeholder="" name="cpAlumn" value="{{$alum->CP}}" readonly>
                    </div><br>


                    <div class="input-group">
                        <span class="input-group-addon">Teléfono</span>
                        <input type="text" class="form-control" placeholder="" name="telAlumn" value="{{$alum->Telefono}}" readonly>
                        <span class="input-group-addon">Celular</span>
                        <input type="text" class="form-control" placeholder="" name="celAlumn" value="{{$alum->Celular}}" readonly>
                    </div><br>

                    <div class="input-group">
                        <span class="input-group-addon">E-mail</span>
                        <input type="text" class="form-control" placeholder="" name="correoAlumn" value="{{$alum->Email}}" readonly>
                    </div><br>


                    <div class="input-group">
                        <span class="input-group-addon">Nombre</span>
                        <input type="text" class="form-control" placeholder="" name="nombreContact" value="{{$alum->Contacto}}" readonly disabled>
                    </div><br>

                     <div class="input-group">
                                <span class="input-group-addon">Parentesco</span>
                                <select class="form-control" name="parentescoContact" value="" readonly disabled>
                                    <option value="">Seleciona</option>
                                    <option value="M" selected>Madre</option>
                                    <option value="P" selected>Padre</option>
                                    <option value="H" selected>Hermano(a)</option>
                                    <option value="R" selected>Primo</option>
                                </select>   
                            </div><br>

                             <div class="input-group">
                        <span class="input-group-addon">Teléfono</span>
                        <input type="text" class="form-control" placeholder="" name="telcontact" value="{{$alum->Tel_Contacto}}" readonly disabled>
                    </div><br>


                    <!--Checar que al marcar NO se muestren nuevos campos apra llenar-->



<div>
    <fieldset class="fields2">
    <dl>
        <dt><label>La persona de contacto es la misma que la autorizada?</label></dt>
        <dd>
            <input type="radio" name="tipo_attach" onclick="toggle(this)" value="a" checked> Si<br>
            <input type="radio" name="tipo_attach" onclick="toggle(this)" value="b" > No<br>

        </dd>
    </dl>
</fieldset>
 



<div id="uno" style="display:none">

<center><p>Ingrese los datos de la persona de contacto</p></center>
                    <div class="input-group">
                        <span class="input-group-addon">Persona Autorizada</span>
                        <input type="text" class="form-control" placeholder="" name="personaAutoAlumn" value="{{$alum->Persona_Autorizada}}" readonly>
                    </div><br>

                    <div class="input-group">
                        <span form="parentescoAlumn" class="input-group-addon">Parentesco</span>
                        <input type="text" name="parentescoAlumn" class="form-control" readonly="readonly" value="{{$alum->Parentesco_Autorizada}}" disabled="">
                    </div><br>

                    <div class="input-group">
                        <span class="input-group-addon">Teléfono</span>
                        <input type="text" class="form-control" placeholder="" name="telAuto" value="{{$alum->Telefono_Autorizada}}" readonly>
                    </div><br>
</div>
 


</div>
     

                  
                            </div>
                        </div>
                    </div>
             
            </div>


<div role="tabpanel" class="tab-pane" id="escuela">
            
               <br>
                    <div class="col-md-6">
                        <div id="sidebar">
                            <div class="well">
                              <legend>Escuela de procedencia</legend>
                    <div class="input-group">
                        <span class="input-group-addon">Escuela de procedencia</span>
                        <input type="text" class="form-control" placeholder="" name="nomEsc" value="{{$alum->Escuela_Procedencia}}" readonly>
                    </div><br>
                <div class="input-group">
                        <span class="input-group-addon">Muncicipio</span>
                        <input type="" class="form-control" placeholder="" name="munBach" value="{{$alum->Municipio_Bachillerato}}" readonly>
                    </div><br>

                    <div class="input-group">
                        <span class="input-group-addon">Estado</span>
                        <input type="text" class="form-control" name="estadoEsc" value="{{$alum->Estado_Bachillerato}}" readonly>
                    </div><br>
                    <!--Separar los campos de inicio y fin de periodo bachillerato-->

                     <div class="input-group">
                        <span class="input-group-addon">Periodo</span>
                    </div><br>

                    <div class="input-group">
                        <span class="input-group-addon">Inicio</span>
                        <input type="" class="form-control" placeholder="" name="inicio" value="{{$alum->Inicio_Bachillerato}}" readonly>
                    </div><br>

                    <div class="input-group">
                        <span class="input-group-addon">Fin</span>
                        <input type="" class="form-control" placeholder="" name="fin" value="{{$alum->Fin_Bachillerato}}" readonly>
                    </div><br>

                       <div class="input-group">
                        <span class="input-group-addon">Tipo</span>
                        <input type="" class="form-control" placeholder="" name="tipoBach" value="{{$alum->Tipo_Bachillerato}}" readonly>
                        <span class="input-group-addon">Sistema</span>
                        <input type="" class="form-control" placeholder="" name="sisBach" value="{{$alum->Sistema_Bachillerato}}" readonly>
                    </div><br>

                    <div class="input-group">
                        <span class="input-group-addon">Promedio</span>
                        <input type="number" step="0.1" class="form-control" placeholder="" name="promedioBach" value="{{$alum->Promedio_Bachillerato}}" readonly>
                    </div><br>

                    
                    
                            </div>
                        </div>
                    </div>
             
            </div>

           

             <div role="tabpanel" class="tab-pane" id="beca">
             
               <br>
                    <div class="col-md-6">
                        <div id="sidebar">
                            <div class="well">
                                <legend>Beca</legend> 
                                <div class="form-group">
                                    <input type="hidden" class="form-control" id="beca"  name="txtid" value="" readonly>
                                </div>

                               <div class="input-group">
                        <span class="input-group-addon">Promedio de admisión</span>
                        <input type="number" step="0.1" class="form-control" placeholder="" name="promAd" value="{{$alum->Promedio_Admision}}" readonly>
                    </div><br>

                            <div class="input-group">
                                <span class="input-group-addon">Solicita beca</span>
                                <input type="text" class="form-control" placeholder="" name="solcBeca" value="{{$alum->Solicita_beca}}"  readonly>
                                <span class="input-group-addon">Autoriza beca</span>
                                <input type="text" class="form-control" placeholder="" name="autorizaBeca" value="{{$alum->Autoriza_Beca}}" readonly>  
                            </div><br>

                            <div class="input-group">
                                <span class="input-group-addon">Tipo de beca</span>
                                <input type="text" class="form-control" placeholder="" name="tipoBeca" value="{{$alum->Tipo_Beca}}" readonly>
                            </div><br>
                               
                            <div class="input-group">
                                <span class="input-group-addon">Folio IBECEY</span>
                                <input type="text" class="form-control" placeholder="" name="folioIbecey" value="{{$alum->Folio_Ibecey}}" readonly>
                            </div><br>

                            <div class="input-group">
                                <span class="input-group-addon">Folio SUBES</span>
                                <input type="text" class="form-control" placeholder="" name="folioSubes" value="{{$alum->Folio_Subes}}" readonly>
                            </div><br>

                             <div class="input-group">
                                <span class="input-group-addon">Beca de transporte</span>
                                <input type="text" class="form-control" placeholder="" name="becaTrans" value="{{$alum->Beca_Transporte}}" readonly>
                            </div><br>

                            </div>
                        </div>
                    </div>

                   
            
            </div>



            <div role="tabpanel" class="tab-pane" id="estadisticos">
             
               <br>
                    <div class="col-md-9">
                        <div id="sidebar">
                            <div class="well">
                                <legend>Estadisticos</legend> 
                                <div class="form-group">
                                    <input type="hidden" class="form-control" id="estadisticos"  name="txtid" value="" readonly>
                                </div>

                           <div class="input-group">
                                <span form="origenAlumn" class="input-group-addon">Origen Indígena</span>
                                <input type="text" name="origenAlumn" class="form-control"  value="{{$alum->Origen_Indigena}}" readonly> 

                                <span form="lengAlumn" class="input-group-addon">Lengua Indígena</span>
                                <input type="text" name="lengAlumn" class="form-control"  value="{{$alum->Lengua_Indigena}}" readonly> 
                            </div><br>

                            <div class="input-group">
                                <span class="input-group-addon">Discapacidad</span>
                                <input type="text" class="form-control" placeholder="" name="disc" value="{{$alum->Discapacidad}}" readonly>
                            </div><br>

                            <div class="input-group">
                                <span class="input-group-addon">Enfermedad</span>
                                <input type="text" class="form-control" placeholder="" name="enfermedad" value="{{$alum->Enfermedad}}" readonly>
                                <span class="input-group-addon">Alergias</span>
                                <input type="text" class="form-control" placeholder="" name="alergias" value="{{$alum->Alergias}}" readonly>
                            </div><br>

                            <div class="input-group">
                                <span class="input-group-addon">Peso</span>
                                <input type="text" class="form-control" placeholder="" name="peso" value="{{$alum->Peso}}" readonly>
                            </div><br>

                             <div class="input-group">
                                <span class="input-group-addon">Talla</span>
                                <input type="text" class="form-control" placeholder="" name="talla" value="{{$alum->Talla}}" readonly>
                            </div><br>

                            <div class="input-group">
                                <span class="input-group-addon">Nombre del padre</span>
                                <input type="text" class="form-control" placeholder="" name="nomPad" value="{{$alum->Nombre_Padre}}" readonly>
                            </div><br>

                            <div class="input-group">
                                <span class="input-group-addon">Nombre de la madre</span>
                                <input type="text" class="form-control" placeholder="" name="nomMad" value="{{$alum->Nombre_Madre}}" readonly>
                            </div><br>

                                <div class="input-group">
                                <span class="input-group-addon">Escolaridad del padre</span>
                                <input name="escPad" class="form-control" value="{{$alum->Escolaridad_Padre}}" readonly>
                                    
                            </div><br>

                                <div class="input-group">
                                <span class="input-group-addon">Escolaridad de la madre</span>
                                 <input name="escMad" class="form-control" value="{{$alum->Escolaridad_Madre}}" readonly>
                                    
                            </div><br>

                             <div class="input-group">
                                <span class="input-group-addon">Actividad del padre</span>
                               <input name="actPad" class="form-control" value="{{$alum->Actividad_Padre}}" readonly>
                                    
                            </div><br>

                            <div class="input-group">
                                <span class="input-group-addon">Actividad de la madre</span>
                                <input name="actMad" class="form-control" value="{{$alum->Actividad_Madre}}" readonly>
                                  
                            </div><br>

                             <div class="input-group">
                                <span class="input-group-addon">Automovil Familiar</span>
                                <input type="text" class="form-control" placeholder="" name="autoFam" value="{{$alum->Automovil_Familiar}}" readonly>
                            </div><br>

                             <div class="input-group">
                                <span class="input-group-addon">Computadora</span>
                                <input type="text" class="form-control" placeholder="" name="compu" value="{{$alum->Computadora}}" readonly>
                            </div><br>

                             <div class="input-group">
                                <span class="input-group-addon">Tipo de seguro médico</span>
                                <input type="text" class="form-control" placeholder="" name="segMed" value="{{$alum->Tipo_Seg_Med}}" readonly>
                            </div><br>

                            <div class="input-group">
                                <span class="input-group-addon">Número de seguro médico</span>
                                <input type="text" class="form-control" placeholder="" name="numsegMed" value="{{$alum->Numero_IMSS}}" readonly>

                                 <span class="input-group-addon">Numero Verificador</span>
                                <input type="text" class="form-control" placeholder="" name="Num_imss_verificador" value="{{$alum->Num_imss_verificador}}" readonly>
                            </div><br>

                            <div class="input-group">
                                <span class="input-group-addon">Tamaño de la casa</span>
                                <input type="text" class="form-control" placeholder="" name="casa" value="{{$alum->Tamano_Casa}}" readonly>
                            </div><br>

                                <div class="input-group">
                                <span class="input-group-addon">Ingreso familiar</span>
                                <input type="text" class="form-control" placeholder="" name="ingreso" value="{{$alum->Ingreso_Familiar}}" readonly>
                            </div><br>

                                <div class="input-group">
                                <span class="input-group-addon">Personas que dependen de ese ingreso</span>
                                <input type="text" class="form-control" placeholder="" name="dependenIng" value="{{$alum->Personas_Dependen_Ingreso}}" readonly>
                            </div><br>

                              <div class="input-group">
                                <span class="input-group-addon">Personas que viven en la casa</span>
                                <input type="text" class="form-control" placeholder="" name="personasCasa" value="{{$alum->Viven_En_Casa}}" readonly>
                            </div><br>

                            <div class="input-group">
                                <span class="input-group-addon">Hermanos</span>
                                <input type="number" step="0" class="form-control" placeholder="" name="herm" value="{{$alum->Hermanos}}" readonly>
                            </div><br>

                            <div class="input-group">
                                <span class="input-group-addon">Lugar de nacimiento</span>
                                <input type="text" class="form-control" placeholder="" name="nacHerm" value="{{$alum->Lugar_Nac_Herm}}" readonly>
                            </div><br>

                            <div class="input-group">
                                <span class="input-group-addon">Estudian</span>
                                <input type="number" step="0" class="form-control" placeholder="" name="estHerm" value="{{$alum->Herm_Estudian}}" readonly>
                            </div><br>

                             <div class="input-group">
                                <span class="input-group-addon">Trabajas</span>
                                <input type="text" class="form-control" placeholder="" name="trab" value="{{$alum->Trabajas}}" readonly>
                            </div><br>

                             <div class="input-group">
                                <span class="input-group-addon">Actividad en la que trabajas</span>
                                <input name="actTrabajas" class="form-control" value="{{$alum->Act_Trabajas}}" readonly>
                                    
                            </div><br>

                             <div class="input-group">
                                <span class="input-group-addon">Horario de trabajo</span>
                                <input type="text" class="form-control" placeholder="" name="horTrab" value="{{$alum->Horario_Trabajo}}" readonly>
                            </div><br>

                             <div class="input-group">
                                <span class="input-group-addon">Nombre del conyugue</span>
                                <input type="text" class="form-control" placeholder="" name="nomConyuge" value="{{$alum->Nombre_Conyuge}}" readonly>
                            </div><br>

                              <div class="input-group">
                                <span class="input-group-addon">Escolaridad del conyugue</span>
                                  <input name="escCon" class="form-control" value="{{$alum->Escolaridad_Conyuge}}" readonly>
                                    
                            </div><br>

                             <div class="input-group">
                                <span class="input-group-addon">Actividad del cónyuge</span>
                                <input name="actCon" class="form-control" value="{{$alum->Actividad_Conyuge}}" readonly>
                                   
                            </div><br>


<div>
    <fieldset class="fields2">
    <dl>
        <dt><label>Hijos</label></dt>
        <dd>
        @if($alum->Hijos=='1')
            <input type="radio" name="tipo" onclick="toggle1(this)" value="1" checked> No <br>
            <input type="radio" name="tipo" onclick="toggle1(this)" value="2"> Si <br>
            @elseif($alum->Hijos=='2')
            <input type="radio" name="tipo" onclick="toggle1(this)" value="1"> No <br>
            <input type="radio" name="tipo" onclick="toggle1(this)" value="2" checked> Si <br>
            @endif
        </dd>
    </dl>
</fieldset>

 
<div id="primero" style="display:none">

<center><p>Ingrese el número de hijos</p></center>
                    <div class="input-group">
                        <span class="input-group-addon">0-5</span>
                        <input type="text" class="form-control" placeholder="" name="hijos1" value="{{$alum->Edad_Hijos0a5}}" readonly>
                    </div><br>


                             <div class="input-group">
                        <span class="input-group-addon">6-12</span>
                        <input type="text" class="form-control" placeholder="" name="hijos2" value="{{$alum->Edad_Hijos6a12}}" readonly>
                    </div><br>

                     <div class="input-group">
                        <span class="input-group-addon">13-18</span>
                        <input type="text" class="form-control" placeholder="" name="hijos3" value="{{$alum->Edad_Hijos13a18}}" readonly>
                    </div><br>

                     <div class="input-group">
                        <span class="input-group-addon">Mayores de 18</span>
                        <input type="text" class="form-control" placeholder="" name="hijos4" value="{{$alum->Edad_Mayores18}}" readonly>
                    </div><br>
</div>
 

 <div>

            <div class="input-group">
                        <span class="input-group-addon">Ingreso Percapita</span>
                        <input type="text" class="form-control" placeholder="" name="ingresoPer" value="{{$alum->Ingreso_Percapita}}" readonly>
                    </div><br>

                       <div class="input-group">
                        <span class="input-group-addon">Telefono del trabajo</span>
                        <input type="text" class="form-control" placeholder="" name="telTrabajo" value="{{$alum->Telefono_Trabajo}}" readonly>
                    </div><br>
     
 </div>
  
</div>

                            </div>
                        </div>
                    </div>




        </form>



            </div>

        

 
 <div role="tabpanel" class="tab-pane" id="documentos">
             
              <br>
                                
<br><br>

 <div class="tab-content">
    <div class="col-md-12 contenedor-datos">
        <div role="tabpanel">
          <ul class="nav nav-pills" role="tablist">
            <li role="presentation" class="active"><a href="#ingreso" aria-controls="ingreso" data-toggle="tab" role="tab">Aspirante</a></li>
             <li role="presentation"><a href="#primerCuatri" aria-controls="primerCuatri" data-toggle="tab" role="tab">C1</a></li>
             <li role="presentation"><a href="#segundoCuatri" aria-controls="segundoCuatri" data-toggle="tab" role="tab">C2</a></li>
             <li role="presentation"><a href="#tercerCuatri" aria-controls="tercerCuatri" data-toggle="tab" role="tab">C3</a></li>
             <li role="presentation"><a href="#cuartoCuatri" aria-controls="cuartoCuatri" data-toggle="tab" role="tab">C4</a></li>
             <li role="presentation"><a href="#quintoCuatri" aria-controls="quintoCuatri" data-toggle="tab" role="tab">C5</a></li>
             <li role="presentation"><a href="#sextoCuatri" aria-controls="sextoCuatri" data-toggle="tab" role="tab">C6</a></li>
             <li role="presentation"><a href="#egresadoTsu" aria-controls="egresadoTsu" data-toggle="tab" role="tab">Egresado TSU</a></li>
             <li role="presentation"><a href="#septimoCuatri" aria-controls="septimoCuatri" data-toggle="tab" role="tab">C7</a></li>
             <li role="presentation"><a href="#octavoCuatri" aria-controls="octavoCuatri" data-toggle="tab" role="tab">C8</a></li>
             <li role="presentation"><a href="#novenoCuatri" aria-controls="novenoCuatri" data-toggle="tab" role="tab">C9</a></li>
             <li role="presentation"><a href="#egresadoIt" aria-controls="egresadoIt" data-toggle="tab" role="tab">Egresado IT</a></li>
             <li role="presentation"><a href="#entregados" aria-controls="entregados" data-toggle="tab" role="tab">Entregados</a></li>

             
              
          </ul>





          <div class="tab-content">

          

            <div role="tabpanel" class="tab-pane active"  id="ingreso">
            <br>
           
           <div class="col-md-4">
                        <div id="sidebar">
                            <div class="well">

            <div class="container">
        <div class="row">
          
        </div>
    </div>

       <div class="contenedor-modal">
 <a href="" data-target="#miModal" data-toggle="modal"><button type="button" class="btn btn-primary btn-lg btn-block">Acta de nacimiento</button></a>
</div>



<div class="modal fade" id="miModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Documentos</h4>
      </div>

<form method="POST" action="{{ url('/documentos') }}" enctype="multipart/form-data">
 {{csrf_field()}}

      <div class="modal-body">
      <input type="hidden" value="{{$alum->id}}" name="idAlumno">

      <div class="input-group ">
                  
                 <span class="input-group-addon"> <input type="textarea" rows="3" class="form-control" name="descripcion"
                   value="ACTA DE NACIMIENTO" readonly="readonly" style="text-align:center" ></span>
               </div>
               <br>


<fieldset class="fields2">
        
        <label>Recibido</label>

       
             
            <input type="radio" name="recibido" id="radio1" value="No" checked> No 
          
            <input type="radio" name="recibido" id="radio2" value="Si" > Si 
         
</fieldset> <br>


<fieldset class="fields2">
      
        <label>Copia</label>
      
            <input type="radio" name="copia" value="No" checked> No 
            <input type="radio" name="copia" value="Si" > Si 
            
</fieldset> <br>

            <p><label>
            <input type="file" name="file" value="$documentos[0]->nombre">
            </label></p>


<fieldset class="fields2">
      
        <label>Validado</label>
      
            <input type="radio" name="validado" value="No" checked> No 
            <input type="radio" name="validado" value="Si" > Si 
            
</fieldset> <br>

        <div class="input-group">
              <span class="input-group-addon">Fecha de recepción</span>
            <input type="text" class="form-control" name="recepcion" value="<?php echo date("Y/m/d"); ?>" size="10" >
                        
        </div><br>

 <center> <h4 class="modal-title" id="myModalLabel">Prestamo de documentos</h4> </center> <br>

        <div class="input-group">
                        <span class="input-group-addon">Fecha de prestamo</span>
                        <input type="date" class="form-control" placeholder="" name="prestamo">
        </div><br>



<fieldset class="fields2">
      
        <label>Devolución</label>
      
            <input type="radio" name="devolucion" value="No" checked> No 
            <input type="radio" name="devolucion" value="Si" > Si 
            
</fieldset> <br>


        <div class="input-group">
                        <span class="input-group-addon">Fecha de devolución</span>
                        <input type="date" class="form-control" placeholder="" name="fechaDev" value="">
        </div><br>

     <div class="input-group ">
              <span class="input-group-addon">Observaciones</span>
               <input type="text" rows="3" class="form-control"  placeholder="" name="observaciones">
               
                            </div><br>



      </div>

      <div class="modal-footer">
      <button type="submit" class="btn btn-success pull-right">Enviar</button>
      </div>
      </form>
      
    </div>
  </div>
</div>

    

<br><br>

  <div class="contenedor-modal">
 <a href="" data-target="#miModal2" data-toggle="modal"><button type="button" class="btn btn-primary btn-lg btn-block">CURP</button></a>
</div>


<div class="modal fade" id="miModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Documentos</h4>
      </div>

<form method="POST" action="{{ url('/documentos') }}" enctype="multipart/form-data">
 {{csrf_field()}}

      <div class="modal-body">
      <input type="hidden" value="{{$alum->id}}" name="idAlumno">

          <div class="input-group ">
                  
                 <span class="input-group-addon"> <input type="textarea" rows="3" class="form-control" name="descripcion"
                   value="CURP" readonly="readonly" style="text-align:center"></span>
               </div>
               <br>

<fieldset class="fields2">
      
        <label>Recibido</label>

            <input type="radio" name="recibido" value="No" checked> No 
            <input type="radio" name="recibido" value="Si"> Si 
        
</fieldset> <br>


<fieldset class="fields2">
      
        <label>Copia</label>
           
            <input type="radio" name="copia" value="No" checked> No 
            <input type="radio" name="copia" value="Si"> Si 
           
</fieldset> <br>

            <p><label>
            <input type="file" name="file">
            </label></p>


<fieldset class="fields2">
      
        <label>Validado</label>
      
            <input type="radio" name="validado" value="No" checked> No 
            <input type="radio" name="validado" value="Si"> Si 
            
</fieldset> <br>

        <div class="input-group">
          <span class="input-group-addon">Fecha de recepción</span>
          <input type="text" class="form-control" name="recepcion" value="<?php echo date("Y/m/d"); ?>" size="10" >
        </div><br>



     <div class="input-group ">
                <span class="input-group-addon">Observaciones</span>
            <textarea type="textarea" rows="3" class="form-control"  placeholder="" name="observaciones" value="">
                </textarea>
                            </div><br>



      </div>

      <div class="modal-footer">
      <button type="submit" class="btn btn-success pull-right">Enviar</button>
      </div>
      </form>
      
    </div>
  </div>
</div>
                
<br><br>

 <div class="contenedor-modal">
 <a href="" data-target="#miModal12" data-toggle="modal"><button type="button" class="btn btn-primary btn-lg btn-block">CENEVAL</button></a>
</div>


<div class="modal fade" id="miModal12" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Documentos</h4>
      </div>

<form method="POST" action="{{ url('/documentos') }}" enctype="multipart/form-data">
 {{csrf_field()}}

      <div class="modal-body">
      <input type="hidden" value="{{$alum->id}}" name="idAlumno">
            <div class="input-group ">
                  
                 <span class="input-group-addon"> <input type="textarea" rows="3" class="form-control" name="descripcion"
                   value="CENAVAL" readonly="readonly" style="text-align:center" ></span>
               </div>

               <br>

<fieldset class="fields2">
      
        <label>Recibido</label>
      
            <input type="radio" name="recibido" value="No" checked> No 
            <input type="radio" name="recibido" value="Si"> Si 
            
</fieldset> <br>

<fieldset class="fields2">
      
        <label>Copia</label>
      
            <input type="radio" name="copia" value="No" checked> No 
            <input type="radio" name="copia" value="Si"> Si 
            
</fieldset> <br>

            <p><label>
            <input type="file" name="file">
            </label></p>


<fieldset class="fields2">
      
        <label>Validado</label>
      
            <input type="radio" name="validado" value="No" checked> No 
            <input type="radio" name="validado" value="Si"> Si 
            
</fieldset> <br>

        <div class="input-group">
                        <span class="input-group-addon">Fecha de recepción</span>
                    <input type="text" class="form-control" name="recepcion" value="<?php echo date("Y/m/d"); ?>" size="10" >
        </div><br>

 <center> <h4 class="modal-title" id="myModalLabel">Prestamo de documentos</h4> </center> <br>

        <div class="input-group">
                        <span class="input-group-addon">Fecha de prestamo</span>
                        <input type="date" class="form-control" placeholder="" name="prestamo" value="">
        </div><br>



<fieldset class="fields2">
      
        <label>Devolución</label>
      
            <input type="radio" name="devolucion" value="No" checked> No 
            <input type="radio" name="devolucion" value="Si"> Si 
            
</fieldset> <br>


        <div class="input-group">
                        <span class="input-group-addon">Fecha de devolución</span>
                        <input type="date" class="form-control" placeholder="" name="fechaDev" value="">
        </div><br>

     <div class="input-group ">
                                <span class="input-group-addon">Observaciones</span>
                                <textarea type="textarea" rows="3" class="form-control"  placeholder="" name="observaciones" value="">
                                </textarea>
                            </div><br>



      </div>

      <div class="modal-footer">
      <button type="submit" class="btn btn-success pull-right">Enviar</button>
      </div>
      </form>
      
    </div>
  </div>
</div>

<br><br>

  <div class="contenedor-modal">
 <a href="" data-target="#miModal3" data-toggle="modal"><button type="button" class="btn btn-primary btn-lg btn-block">Constancia Bach.</button></a>
</div>


<div class="modal fade" id="miModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Documentos</h4>
      </div>

<form method="POST" action="{{ url('/documentos') }}" enctype="multipart/form-data">
 {{csrf_field()}}

      <div class="modal-body">
      <input type="hidden" value="{{$alum->id}}" name="idAlumno">
            <div class="input-group ">
                  
                 <span class="input-group-addon"> <input type="textarea" rows="3" class="form-control" name="descripcion"
                   value="CONSTANCIA DE BACHILLERATO" readonly="readonly" style="text-align:center" ></span>
               </div>

               <br>

<fieldset class="fields2">
      
        <label>Recibido</label>
      
            <input type="radio" name="recibido" value="No" checked> No 
            <input type="radio" name="recibido" value="Si"> Si 
            
</fieldset> <br>

<fieldset class="fields2">
      
        <label>Copia</label>
      
            <input type="radio" name="copia" value="No" checked> No 
            <input type="radio" name="copia" value="Si"> Si 
            
</fieldset> <br>

            <p><label>
            <input type="file" name="file">
            </label></p>


<fieldset class="fields2">
      
        <label>Validado</label>
      
            <input type="radio" name="validado" value="No" checked> No 
            <input type="radio" name="validado" value="Si"> Si 
            
</fieldset> <br>

        <div class="input-group">
           <span class="input-group-addon">Fecha de recepción</span>
           <input type="text" class="form-control" name="recepcion" value="<?php echo date("Y/m/d"); ?>" size="10" >
        </div><br>

 <center> <h4 class="modal-title" id="myModalLabel">Prestamo de documentos</h4> </center> <br>

        <div class="input-group">
                        <span class="input-group-addon">Fecha de prestamo</span>
                        <input type="date" class="form-control" placeholder="" name="prestamo" value="">
        </div><br>



<fieldset class="fields2">
      
        <label>Devolución</label>
      
            <input type="radio" name="devolucion" value="No" checked> No 
            <input type="radio" name="devolucion" value="Si"> Si 
            
</fieldset> <br>


        <div class="input-group">
                        <span class="input-group-addon">Fecha de devolución</span>
                        <input type="date" class="form-control" placeholder="" name="fechaDev" value="">
        </div><br>

     <div class="input-group ">
                                <span class="input-group-addon">Observaciones</span>
                                <textarea type="textarea" rows="3" class="form-control"  placeholder="" name="observaciones" value="">
                                </textarea>
                            </div><br>



      </div>

      <div class="modal-footer">
      <button type="submit" class="btn btn-success pull-right">Enviar</button>
      </div>
      </form>
      
    </div>
  </div>
</div>

<br><br>

  <div class="contenedor-modal">
 <a href="" data-target="#miModal4" data-toggle="modal"><button type="button" class="btn btn-primary btn-lg btn-block">Registro de ingreso</button></a>
</div>


<div class="modal fade" id="miModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Documentos</h4>
      </div>

<form method="POST" action="{{ url('/documentos') }}" enctype="multipart/form-data">
 {{csrf_field()}}

      <div class="modal-body">
      <input type="hidden" value="{{$alum->id}}" name="idAlumno">
            <div class="input-group ">
                  
                 <span class="input-group-addon"> <input type="textarea" rows="3" class="form-control" name="descripcion"
                   value="REGISTRO DE INGRESO" readonly="readonly" style="text-align:center" ></span>
               </div>

               <br>

<fieldset class="fields2">
      
        <label>Recibido</label>
      
            <input type="radio" name="recibido" value="No" checked> No 
            <input type="radio" name="recibido" value="Si" > Si 
            
</fieldset> <br>

<fieldset class="fields2">
      
        <label>Copia</label>
      
            <input type="radio" name="copia" value="No" checked> No 
            <input type="radio" name="copia" value="Si" > Si 
            
</fieldset> <br>

            <p><label>
            <input type="file" name="file">
            </label></p>


<fieldset class="fields2">
      
        <label>Validado</label>
      
            <input type="radio" name="validado" value="No" checked> No 
            <input type="radio" name="validado" value="Si" > Si 
            
</fieldset> <br>

        <div class="input-group">
             <span class="input-group-addon">Fecha de recepción</span>
           <input type="text" class="form-control" name="recepcion" value="<?php echo date("Y/m/d"); ?>" size="10" >
        </div><br>



     <div class="input-group ">
                                <span class="input-group-addon">Observaciones</span>
                                <textarea type="textarea" rows="3" class="form-control"  placeholder="" name="observaciones" value="">
                                </textarea>
                            </div><br>



      </div>

      <div class="modal-footer">
      <button type="submit" class="btn btn-success pull-right">Enviar</button>
      </div>
      </form>
      
    </div>
  </div>
</div>


<br><br>

  <div class="contenedor-modal">
 <a href="" data-target="#miModal5" data-toggle="modal"><button type="button" class="btn btn-primary btn-lg btn-block">Pago de registro</button></a>
</div>


<div class="modal fade" id="miModal5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Documentos</h4>
      </div>

<form method="POST" action="{{ url('/documentos') }}" enctype="multipart/form-data">
 {{csrf_field()}}

      <div class="modal-body">
      <input type="hidden" value="{{$alum->id}}" name="idAlumno">
           <div class="input-group ">
                  
                 <span class="input-group-addon"> <input type="textarea" rows="3" class="form-control" name="descripcion"
                   value="PAGO DE REGISTRO" readonly="readonly" style="text-align:center" ></span>
               </div>

               <br>


<fieldset class="fields2">
      
        <label>Recibido</label>
      
            <input type="radio" name="recibido" value="No" checked> No 
            <input type="radio" name="recibido" value="Si"> Si 
            
</fieldset> <br>

<fieldset class="fields2">
      
        <label>Copia</label>
      
            <input type="radio" name="copia" value="No" checked> No 
            <input type="radio" name="copia" value="Si"> Si 
            
</fieldset> <br>

            <p><label>
            <input type="file" name="file">
            </label></p>


<fieldset class="fields2">
      
        <label>Validado</label>
      
            <input type="radio" name="validado" value="No" checked> No 
            <input type="radio" name="validado" value="Si"> Si 
            
</fieldset> <br>

        <div class="input-group">
            <span class="input-group-addon">Fecha de recepción</span>
            <input type="text" class="form-control" name="recepcion" value="<?php echo date("Y/m/d"); ?>" size="10" >
        </div><br>

 
      </div>

      <div class="modal-footer">
      <button type="submit" class="btn btn-success pull-right">Enviar</button>
      </div>
      </form>
      
    </div>
  </div>
</div>



<br><br>

  <div class="contenedor-modal">
 <a href="" data-target="#miModal6" data-toggle="modal"><button type="button" class="btn btn-primary btn-lg btn-block">Foto</button></a>
</div>


<div class="modal fade" id="miModal6" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Documentos</h4>
      </div>

<form method="POST" action="{{ url('/documentos') }}" enctype="multipart/form-data">
 {{csrf_field()}}

      <div class="modal-body">
      <input type="hidden" value="{{$alum->id}}" name="idAlumno">
            <div class="input-group ">
                  
                 <span class="input-group-addon"> <input type="textarea" rows="3" class="form-control" name="descripcion"
                   value="FOTO" readonly="readonly" style="text-align:center" ></span>
               </div>

               <br>

<fieldset class="fields2">
      
        <label>Recibido</label>
      
            <input type="radio" name="recibido" value="No" checked> No 
            <input type="radio" name="recibido" value="Si"> Si 
            
</fieldset> <br>

<fieldset class="fields2">
      
        <label>Copia</label>
      
            <input type="radio" name="copia" value="No" checked> No 
            <input type="radio" name="copia" value="Si"> Si 
            
</fieldset> <br>

            <p><label>
            <input type="file" name="file">
            </label></p>


<fieldset class="fields2">
      
        <label>Validado</label>
      
            <input type="radio" name="validado" value="No" checked> No 
            <input type="radio" name="validado" value="Si"> Si 
            
</fieldset> <br>

        <div class="input-group">
             <span class="input-group-addon">Fecha de recepción</span>
          <input type="text" class="form-control" name="recepcion" value="<?php echo date("Y/m/d"); ?>" size="10" >
        </div><br>

 

     <div class="input-group ">
                                <span class="input-group-addon">Observaciones</span>
                                <textarea type="textarea" rows="3" class="form-control"  placeholder="" name="observaciones" value="">
                                </textarea>
                            </div><br>



      </div>

      <div class="modal-footer">
      <button type="submit" class="btn btn-success pull-right">Enviar</button>
      </div>
      </form>
      
    </div>
  </div>
</div>




            </div>
            </div>
            </div>



            </div>


                <!--DOCUMENTOS DE PRIMER CUATRIMESTRE-->

            <div role="tabpanel" class="tab-pane" id="primerCuatri">
            
               <br>
                    <div class="col-md-4">
                        <div id="sidebar">
                            <div class="well">
                      

           <div class="container">

  <div class="row">
          
        </div>
  
</div>    
<div class="contenedor-modal">
 <a href="" data-target="#miModal7" data-toggle="modal"><button type="button" class="btn btn-primary btn-lg btn-block">Inscripción 1</button></a>
</div>


<div class="modal fade" id="miModal7" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Documentos</h4>
      </div>

<form method="POST" action="{{ url('/documentos') }}" enctype="multipart/form-data">
 {{csrf_field()}}

      <div class="modal-body">
      <input type="hidden" value="{{$alum->id}}" name="idAlumno">
            <div class="input-group ">
                  
                 <span class="input-group-addon"> <input type="textarea" rows="3" class="form-control" name="descripcion"
                   value="INSCRIPCIÓN 1" readonly="readonly" style="text-align:center" ></span>
               </div>

               <br>

<fieldset class="fields2">
      
        <label>Recibido</label>
      
            <input type="radio" name="recibido" value="No" checked> No 
            <input type="radio" name="recibido" value="Si"> Si 
            
</fieldset> <br>

<fieldset class="fields2">
      
        <label>Copia</label>
      
            <input type="radio" name="copia" value="No" checked> No 
            <input type="radio" name="copia" value="Si"> Si 
            
</fieldset> <br>

            <p><label>
            <input type="file" name="file">
            </label></p>


<fieldset class="fields2">
      
        <label>Validado</label>
      
            <input type="radio" name="validado" value="No" checked> No 
            <input type="radio" name="validado" value="Si"> Si 
            
</fieldset> <br>

        <div class="input-group">
              <span class="input-group-addon">Fecha de recepción</span>
             <input type="text" class="form-control" name="recepcion" value="<?php echo date("Y/m/d"); ?>" size="10" >
        </div><br>



     <div class="input-group ">
                                <span class="input-group-addon">Observaciones</span>
                                <textarea type="textarea" rows="3" class="form-control"  placeholder="" name="observaciones" value="">
                                </textarea>
                            </div><br>



      </div>

      <div class="modal-footer">
      <button type="submit" class="btn btn-success pull-right">Enviar</button>
      </div>
      </form>
      
    </div>
  </div>
</div>

<br><br>

 <div class="contenedor-modal">
 <a href="" data-target="#miModal8" data-toggle="modal"><button type="button" class="btn btn-primary btn-lg btn-block">Pago 1</button></a>
</div>


<div class="modal fade" id="miModal8" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Documentos</h4>
      </div>

<form method="POST" action="{{ url('/documentos') }}" enctype="multipart/form-data">
 {{csrf_field()}}

      <div class="modal-body">
      <input type="hidden" value="{{$alum->id}}" name="idAlumno">
            <div class="input-group ">
                  
                 <span class="input-group-addon"> <input type="textarea" rows="3" class="form-control" name="descripcion"
                   value="PAGO 1" readonly="readonly" style="text-align:center" ></span>
               </div>

               <br>

<fieldset class="fields2">
      
        <label>Recibido</label>
      
            <input type="radio" name="recibido" value="No" checked> No 
            <input type="radio" name="recibido" value="Si"> Si 
            
</fieldset> <br>

<fieldset class="fields2">
      
        <label>Copia</label>
      
            <input type="radio" name="copia" value="No" checked> No 
            <input type="radio" name="copia" value="Si"> Si 
            
</fieldset> <br>

            <p><label>
            <input type="file" name="file">
            </label></p>


<fieldset class="fields2">
      
        <label>Validado</label>
      
            <input type="radio" name="validado" value="No" checked> No 
            <input type="radio" name="validado" value="Si"> Si 
            
</fieldset> <br>

        <div class="input-group">
                <span class="input-group-addon">Fecha de recepción</span>
              <input type="text" class="form-control" name="recepcion" value="<?php echo date("Y/m/d"); ?>" size="10" >
        </div><br>


     <div class="input-group ">
                                <span class="input-group-addon">Observaciones</span>
                                <textarea type="textarea" rows="3" class="form-control"  placeholder="" name="observaciones" value="">
                                </textarea>
                            </div><br>



      </div>

      <div class="modal-footer">
      <button type="submit" class="btn btn-success pull-right">Enviar</button>
      </div>
      </form>
      
    </div>
  </div>
</div>

<br><br>

<div class="contenedor-modal">
 <a href="" data-target="#miModal9" data-toggle="modal"><button type="button" class="btn btn-primary btn-lg btn-block">Certificado de secundaria</button></a>
</div>


<div class="modal fade" id="miModal9" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Documentos</h4>
      </div>

<form method="POST" action="{{ url('/documentos') }}" enctype="multipart/form-data">
 {{csrf_field()}}

      <div class="modal-body">
      <input type="hidden" value="{{$alum->id}}" name="idAlumno">
            <div class="input-group ">
                  
                 <span class="input-group-addon"> <input type="textarea" rows="3" class="form-control" name="descripcion"
                   value="CERTIFICADO DE SECUNDARIA" readonly="readonly" style="text-align:center" ></span>
               </div>

               <br>

<fieldset class="fields2">
      
        <label>Recibido</label>
      
            <input type="radio" name="recibido" value="No" checked> No 
            <input type="radio" name="recibido" value="Si"> Si 
            
</fieldset> <br>

<fieldset class="fields2">
      
        <label>Copia</label>
      
            <input type="radio" name="copia" value="No" checked> No 
            <input type="radio" name="copia" value="Si"> Si 
            
</fieldset> <br>

            <p><label>
            <input type="file" name="file">
            </label></p>


<fieldset class="fields2">
      
        <label>Validado</label>
      
            <input type="radio" name="validado" value="No" checked> No 
            <input type="radio" name="validado" value="Si"> Si 
            
</fieldset> <br>

        <div class="input-group">
              <span class="input-group-addon">Fecha de recepción</span>
                 <input type="text" class="form-control" name="recepcion" value="<?php echo date("Y/m/d"); ?>" size="10" >
        </div><br>

 <center> <h4 class="modal-title" id="myModalLabel">Prestamo de documentos</h4> </center> <br>

        <div class="input-group">
                        <span class="input-group-addon">Fecha de prestamo</span>
                        <input type="date" class="form-control" placeholder="" name="prestamo" value="">
        </div><br>



<fieldset class="fields2">
      
        <label>Devolución</label>
      
            <input type="radio" name="devolucion" value="No" checked> No 
            <input type="radio" name="devolucion" value="Si" > Si 
            
</fieldset> <br>


        <div class="input-group">
                        <span class="input-group-addon">Fecha de devolución</span>
                        <input type="date" class="form-control" placeholder="" name="fechaDev" value="">
        </div><br>

     <div class="input-group ">
                                <span class="input-group-addon">Observaciones</span>
                                <textarea type="textarea" rows="3" class="form-control"  placeholder="" name="observaciones" value="">
                                </textarea>
                            </div><br>



      </div>

      <div class="modal-footer">
      <button type="submit" class="btn btn-success pull-right">Enviar</button>
      </div>
      </form>
      
    </div>
  </div>
</div>

<br><br>

<div class="contenedor-modal">
 <a href="" data-target="#miModal10" data-toggle="modal"><button type="button" class="btn btn-primary btn-lg btn-block">Comprobante de domicilio</button></a>
</div>


<div class="modal fade" id="miModal10" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Documentos</h4>
      </div>

<form method="POST" action="{{ url('/documentos') }}" enctype="multipart/form-data">
 {{csrf_field()}}

      <div class="modal-body">
      <input type="hidden" value="{{$alum->id}}" name="idAlumno">
            <div class="input-group ">
                  
                 <span class="input-group-addon"> <input type="textarea" rows="3" class="form-control" name="descripcion"
                   value="COMPROBANTE DE DOMICILIO" readonly="readonly" style="text-align:center" ></span>
               </div>

               <br>

<fieldset class="fields2">
      
        <label>Recibido</label>
      
            <input type="radio" name="recibido" value="No" checked> No 
            <input type="radio" name="recibido" value="Si"> Si 
            
</fieldset> <br>

<fieldset class="fields2">
      
        <label>Copia</label>
      
            <input type="radio" name="copia" value="No" checked> No 
            <input type="radio" name="copia" value="Si"> Si 
            
</fieldset> <br>

            <p><label>
            <input type="file" name="file">
            </label></p>


<fieldset class="fields2">
      
        <label>Validado</label>
      
            <input type="radio" name="validado" value="No" checked> No 
            <input type="radio" name="validado" value="Si"> Si 
            
</fieldset> <br>

        <div class="input-group">
                   <span class="input-group-addon">Fecha de recepción</span>
                <input type="text" class="form-control" name="recepcion" value="<?php echo date("Y/m/d"); ?>" size="10" >
        </div><br>


     <div class="input-group ">
                                <span class="input-group-addon">Observaciones</span>
                                <textarea type="textarea" rows="3" class="form-control"  placeholder="" name="observaciones" value="">
                                </textarea>
                            </div><br>



      </div>

      <div class="modal-footer">
      <button type="submit" class="btn btn-success pull-right">Enviar</button>
      </div>
      </form>
      
    </div>
  </div>
</div>

<br><br>

<div class="contenedor-modal">
 <a href="" data-target="#miModal11" data-toggle="modal"><button type="button" class="btn btn-primary btn-lg btn-block">IFE</button></a>
</div>


<div class="modal fade" id="miModal11" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Documentos</h4>
      </div>

<form method="POST" action="{{ url('/documentos') }}" enctype="multipart/form-data">
 {{csrf_field()}}

      <div class="modal-body">
      <input type="hidden" value="{{$alum->id}}" name="idAlumno">
            <div class="input-group ">
                  
                 <span class="input-group-addon"> <input type="textarea" rows="3" class="form-control" name="descripcion"
                   value="IFE" readonly="readonly" style="text-align:center" ></span>
               </div>

               <br>

<fieldset class="fields2">
      
        <label>Recibido</label>
      
            <input type="radio" name="recibido" value="No" checked> No 
            <input type="radio" name="recibido" value="Si"> Si 
            
</fieldset> <br>

<fieldset class="fields2">
      
        <label>Copia</label>
      
            <input type="radio" name="copia" value="No" checked> No 
            <input type="radio" name="copia" value="Si"> Si 
            
</fieldset> <br>

            <p><label>
            <input type="file" name="file">
            </label></p>


<fieldset class="fields2">
      
        <label>Validado</label>
      
            <input type="radio" name="validado" value="No" checked> No 
            <input type="radio" name="validado" value="Si"> Si 
            
</fieldset> <br>

        <div class="input-group">
                    <span class="input-group-addon">Fecha de recepción</span>
                  <input type="text" class="form-control" name="recepcion" value="<?php echo date("Y/m/d"); ?>" size="10" >
        </div><br>


     <div class="input-group ">
                                <span class="input-group-addon">Observaciones</span>
                                <textarea type="textarea" rows="3" class="form-control"  placeholder="" name="observaciones" value="">
                                </textarea>
                            </div><br>



      </div>

      <div class="modal-footer">
      <button type="submit" class="btn btn-success pull-right">Enviar</button>
      </div>
      </form>
      
    </div>
  </div>
</div>

<br><br>

<div class="contenedor-modal">
 <a href="" data-target="#miModal13" data-toggle="modal"><button type="button" class="btn btn-primary btn-lg btn-block">IMSS</button></a>
</div>


<div class="modal fade" id="miModal13" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Documentos</h4>
      </div>

<form method="POST" action="{{ url('/documentos') }}" enctype="multipart/form-data">
 {{csrf_field()}}

      <div class="modal-body">
      <input type="hidden" value="{{$alum->id}}" name="idAlumno">
            <div class="input-group ">
                  
                 <span class="input-group-addon"> <input type="textarea" rows="3" class="form-control" name="descripcion"
                   value="IMSS" readonly="readonly" style="text-align:center" ></span>
               </div>

               <br>

<fieldset class="fields2">
      
        <label>Recibido</label>
      
            <input type="radio" name="recibido" value="No" checked> No 
            <input type="radio" name="recibido" value="Si"> Si 
            
</fieldset> <br>

<fieldset class="fields2">
      
        <label>Copia</label>
      
            <input type="radio" name="copia" value="No" checked> No 
            <input type="radio" name="copia" value="Si"> Si 
            
</fieldset> <br>

            <p><label>
            <input type="file" name="file">
            </label></p>


<fieldset class="fields2">
      
        <label>Validado</label>
      
            <input type="radio" name="validado" value="No" checked> No 
            <input type="radio" name="validado" value="Si"> Si 
            
</fieldset> <br>

        <div class="input-group">
                        <span class="input-group-addon">Fecha de recepción</span>
                    <input type="text" class="form-control" name="recepcion" value="<?php echo date("Y/m/d"); ?>" size="10" >
        </div><br>

 <center> <h4 class="modal-title" id="myModalLabel">Prestamo de documentos</h4> </center> <br>

        <div class="input-group">
                        <span class="input-group-addon">Fecha de prestamo</span>
                        <input type="date" class="form-control" placeholder="" name="prestamo" value="">
        </div><br>



<fieldset class="fields2">
      
        <label>Devolución</label>
      
            <input type="radio" name="devolucion" value="No" checked> No 
            <input type="radio" name="devolucion" value="Si"> Si 
            
</fieldset> <br>


        <div class="input-group">
                        <span class="input-group-addon">Fecha de devolución</span>
                        <input type="date" class="form-control" placeholder="" name="fechaDev" value="">
        </div><br>

     <div class="input-group ">
                                <span class="input-group-addon">Observaciones</span>
                                <textarea type="textarea" rows="3" class="form-control"  placeholder="" name="observaciones" value="">
                                </textarea>
                            </div><br>



      </div>

      <div class="modal-footer">
      <button type="submit" class="btn btn-success pull-right">Enviar</button>
      </div>
      </form>
      
    </div>
  </div>
</div>

<br><br>

<div class="contenedor-modal">
 <a href="" data-target="#miModal14" data-toggle="modal"><button type="button" class="btn btn-primary btn-lg btn-block">Boleta 1</button></a>
</div>


<div class="modal fade" id="miModal14" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Documentos</h4>
      </div>

<form method="POST" action="{{ url('/documentos') }}" enctype="multipart/form-data">
 {{csrf_field()}}

      <div class="modal-body">
      <input type="hidden" value="{{$alum->id}}" name="idAlumno">
            <div class="input-group ">
                  
                 <span class="input-group-addon"> <input type="textarea" rows="3" class="form-control" name="descripcion"
                   value="BOLETA 1" readonly="readonly" style="text-align:center" ></span>
               </div>

               <br>

<fieldset class="fields2">
      
        <label>Recibido</label>
      
            <input type="radio" name="recibido" value="No" checked> No 
            <input type="radio" name="recibido" value="Si"> Si 
            
</fieldset> <br>


            <p><label>
            <input type="file" name="file">
            </label></p>


<fieldset class="fields2">
      
        <label>Validado</label>
      
            <input type="radio" name="validado" value="No" checked> No 
            <input type="radio" name="validado" value="Si"> Si 
            
</fieldset> <br>

        <div class="input-group">
                        <span class="input-group-addon">Fecha de recepción</span>
                 <input type="text" class="form-control" name="recepcion" value="<?php echo date("Y/m/d"); ?>" size="10" >
        </div><br>


     <div class="input-group ">
                                <span class="input-group-addon">Observaciones</span>
                                <textarea type="textarea" rows="3" class="form-control"  placeholder="" name="observaciones" value="">
                                </textarea>
                            </div><br>


      </div>

      <div class="modal-footer">
      <button type="submit" class="btn btn-success pull-right">Enviar</button>
      </div>
      </form>
      
    </div>
  </div>
</div>

                    </div>
                    </div>
                    </div>

                </div>


        <!--DOCUMENTOS DE SEGUNDO CUATRIMESTRE-->

            <div role="tabpanel" class="tab-pane" id="segundoCuatri">
            
               <br>
                    <div class="col-md-4">
                        <div id="sidebar">
                            <div class="well">
                      

           <div class="container">

  <div class="row">
          
        </div>
  
</div>    

    <div class="contenedor-modal">
 <a href="" data-target="#miModal15" data-toggle="modal"><button type="button" class="btn btn-primary btn-lg btn-block"> Inscripción 2</button></a>
</div>


<div class="modal fade" id="miModal15" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Documentos</h4>
      </div>

<form method="POST" action="{{ url('/documentos') }}" enctype="multipart/form-data">
 {{csrf_field()}}

      <div class="modal-body">
      <input type="hidden" value="{{$alum->id}}" name="idAlumno">
            <div class="input-group ">
                  
                 <span class="input-group-addon"> <input type="textarea" rows="3" class="form-control" name="descripcion"
                   value="INSCRIPCIÓN 2" readonly="readonly" style="text-align:center" ></span>
               </div>

               <br>

<fieldset class="fields2">
      
        <label>Recibido</label>
      
            <input type="radio" name="recibido" value="No" checked> No 
            <input type="radio" name="recibido" value="Si"> Si 
            
</fieldset> <br>

<fieldset class="fields2">
      
        <label>Copia</label>
      
            <input type="radio" name="copia" value="No" checked> No 
            <input type="radio" name="copia" value="Si"> Si 
            
</fieldset> <br>

            <p><label>
            <input type="file" name="file">
            </label></p>


<fieldset class="fields2">
      
        <label>Validado</label>
      
            <input type="radio" name="validado" value="No" checked> No 
            <input type="radio" name="validado" value="Si"> Si 
            
</fieldset> <br>

        <div class="input-group">
                        <span class="input-group-addon">Fecha de recepción</span>
                    <input type="text" class="form-control" name="recepcion" value="<?php echo date("Y/m/d"); ?>" size="10" >
        </div><br>



     <div class="input-group ">
                                <span class="input-group-addon">Observaciones</span>
                                <textarea type="textarea" rows="3" class="form-control"  placeholder="" name="observaciones" value="">
                                </textarea>
                            </div><br>



      </div>

      <div class="modal-footer">
      <button type="submit" class="btn btn-success pull-right">Enviar</button>
      </div>
      </form>
      
    </div>
  </div>
</div>

<br><br>

 <div class="contenedor-modal">
 <a href="" data-target="#miModal16" data-toggle="modal"><button type="button" class="btn btn-primary btn-lg btn-block">Pago 2</button></a>
</div>


<div class="modal fade" id="miModal16" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Documentos</h4>
      </div>

<form method="POST" action="{{ url('/documentos') }}" enctype="multipart/form-data">
 {{csrf_field()}}

      <div class="modal-body">
      <input type="hidden" value="{{$alum->id}}" name="idAlumno">
            <div class="input-group ">
                  
                 <span class="input-group-addon"> <input type="textarea" rows="3" class="form-control" name="descripcion"
                   value="PAGO 2" readonly="readonly" style="text-align:center" ></span>
               </div>

               <br>

<fieldset class="fields2">
      
        <label>Recibido</label>
      
            <input type="radio" name="recibido" value="No" checked> No 
            <input type="radio" name="recibido" value="Si"> Si 
            
</fieldset> <br>

<fieldset class="fields2">
      
        <label>Copia</label>
      
            <input type="radio" name="copia" value="No" checked> No 
            <input type="radio" name="copia" value="Si"> Si 
            
</fieldset> <br>

            <p><label>
            <input type="file" name="file">
            </label></p>


<fieldset class="fields2">
      
        <label>Validado</label>
      
            <input type="radio" name="validado" value="No" checked> No 
            <input type="radio" name="validado" value="Si"> Si 
            
</fieldset> <br>

        <div class="input-group">
                        <span class="input-group-addon">Fecha de recepción</span>
                 <input type="text" class="form-control" name="recepcion" value="<?php echo date("Y/m/d"); ?>" size="10" >
        </div><br>


     <div class="input-group ">
                                <span class="input-group-addon">Observaciones</span>
                                <textarea type="textarea" rows="3" class="form-control"  placeholder="" name="observaciones" value="">
                                </textarea>
                            </div><br>



      </div>

      <div class="modal-footer">
      <button type="submit" class="btn btn-success pull-right">Enviar</button>
      </div>
      </form>
      
    </div>
  </div>
</div>

<br><br>

 <div class="contenedor-modal">
 <a href="" data-target="#miModal17" data-toggle="modal"><button type="button" class="btn btn-primary btn-lg btn-block">Boleta 2</button></a>
</div>


<div class="modal fade" id="miModal17" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Documentos</h4>
      </div>

<form method="POST" action="{{ url('/documentos') }}" enctype="multipart/form-data">
 {{csrf_field()}}

      <div class="modal-body">
      <input type="hidden" value="{{$alum->id}}" name="idAlumno">
            <div class="input-group ">
                  
                 <span class="input-group-addon"> <input type="textarea" rows="3" class="form-control" name="descripcion"
                   value="BOLETA 2" readonly="readonly" style="text-align:center" ></span>
               </div>

               <br>

<fieldset class="fields2">
      
        <label>Recibido</label>
      
            <input type="radio" name="recibido" value="No" checked> No 
            <input type="radio" name="recibido" value="Si"> Si 
            
</fieldset> <br>

<fieldset class="fields2">
      
        <label>Copia</label>
      
            <input type="radio" name="copia" value="No" checked> No 
            <input type="radio" name="copia" value="Si"> Si 
            
</fieldset> <br>

            <p><label>
            <input type="file" name="file">
            </label></p>


<fieldset class="fields2">
      
        <label>Validado</label>
      
            <input type="radio" name="validado" value="No" checked> No 
            <input type="radio" name="validado" value="Si"> Si 
            
</fieldset> <br>

        <div class="input-group">
                        <span class="input-group-addon">Fecha de recepción</span>
                   <input type="text" class="form-control" name="recepcion" value="<?php echo date("Y/m/d"); ?>" size="10" >
        </div><br>



     <div class="input-group ">
                                <span class="input-group-addon">Observaciones</span>
                                <textarea type="textarea" rows="3" class="form-control"  placeholder="" name="observaciones" value="">
                                </textarea>
                            </div><br>



      </div>

      <div class="modal-footer">
      <button type="submit" class="btn btn-success pull-right">Enviar</button>
      </div>
      </form>
      
    </div>
  </div>
</div>
                    </div>
                    </div>
                    </div>

                </div>

 <!--DOCUMENTOS DE TERCER CUATRIMESTRE-->

            <div role="tabpanel" class="tab-pane" id="tercerCuatri">
            
               <br>
                    <div class="col-md-4">
                        <div id="sidebar">
                            <div class="well">
                      

           <div class="container">

  <div class="row">
          
        </div>
  
</div>    

    <div class="contenedor-modal">
 <a href="" data-target="#miModal18" data-toggle="modal"><button type="button" class="btn btn-primary btn-lg btn-block">Inscripción 3</button></a>
</div>


<div class="modal fade" id="miModal18" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Documentos</h4>
      </div>

<form method="POST" action="{{ url('/documentos') }}" enctype="multipart/form-data">
 {{csrf_field()}}

      <div class="modal-body">
      <input type="hidden" value="{{$alum->id}}" name="idAlumno">
            <div class="input-group ">
                  
                 <span class="input-group-addon"> <input type="textarea" rows="3" class="form-control" name="descripcion"
                   value="INSCRIPCIÓN 3" readonly="readonly" style="text-align:center" ></span>
               </div>

               <br>

<fieldset class="fields2">
      
        <label>Recibido</label>
      
            <input type="radio" name="recibido" value="No" checked> No 
            <input type="radio" name="recibido" value="Si"> Si 
            
</fieldset> <br>

<fieldset class="fields2">
      
        <label>Copia</label>
      
            <input type="radio" name="copia" value="No" checked> No 
            <input type="radio" name="copia" value="Si"> Si 
            
</fieldset> <br>

            <p><label>
            <input type="file" name="file">
            </label></p>


<fieldset class="fields2">
      
        <label>Validado</label>
      
            <input type="radio" name="validado" value="No" checked> No 
            <input type="radio" name="validado" value="Si"> Si 
            
</fieldset> <br>

        <div class="input-group">
                        <span class="input-group-addon">Fecha de recepción</span>
                      <input type="text" class="form-control" name="recepcion" value="<?php echo date("Y/m/d"); ?>" size="10" >
        </div><br>

     <div class="input-group ">
                                <span class="input-group-addon">Observaciones</span>
                                <textarea type="textarea" rows="3" class="form-control"  placeholder="" name="observaciones" value="">
                                </textarea>
                            </div><br>



      </div>

      <div class="modal-footer">
      <button type="submit" class="btn btn-success pull-right">Enviar</button>
      </div>
      </form>
      
    </div>
  </div>
</div>

<br><br>

 <div class="contenedor-modal">
 <a href="" data-target="#miModal19" data-toggle="modal"><button type="button" class="btn btn-primary btn-lg btn-block">Pago 3</button></a>
</div>


<div class="modal fade" id="miModal19" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Documentos</h4>
      </div>

<form method="POST" action="{{ url('/documentos') }}" enctype="multipart/form-data">
 {{csrf_field()}}

      <div class="modal-body">
      <input type="hidden" value="{{$alum->id}}" name="idAlumno">
            <div class="input-group ">
                  
                 <span class="input-group-addon"> <input type="textarea" rows="3" class="form-control" name="descripcion"
                   value="PAGO 3" readonly="readonly" style="text-align:center" ></span>
               </div>

               <br>

<fieldset class="fields2">
      
        <label>Recibido</label>
      
            <input type="radio" name="recibido" value="No" checked> No 
            <input type="radio" name="recibido" value="Si"> Si 
            
</fieldset> <br>

<fieldset class="fields2">
      
        <label>Copia</label>
      
            <input type="radio" name="copia" value="No" checked> No 
            <input type="radio" name="copia" value="Si"> Si 
            
</fieldset> <br>

            <p><label>
            <input type="file" name="file">
            </label></p>


<fieldset class="fields2">
      
        <label>Validado</label>
      
            <input type="radio" name="validado" value="No" checked> No 
            <input type="radio" name="validado" value="Si"> Si 
            
</fieldset> <br>

        <div class="input-group">
                        <span class="input-group-addon">Fecha de recepción</span>
                     <input type="text" class="form-control" name="recepcion" value="<?php echo date("Y/m/d"); ?>" size="10" >
        </div><br>


     <div class="input-group ">
                                <span class="input-group-addon">Observaciones</span>
                                <textarea type="textarea" rows="3" class="form-control"  placeholder="" name="observaciones" value="">
                                </textarea>
                            </div><br>



      </div>

      <div class="modal-footer">
      <button type="submit" class="btn btn-success pull-right">Enviar</button>
      </div>
      </form>
      
    </div>
  </div>
</div>

<br><br>

 <div class="contenedor-modal">
 <a href="" data-target="#miModal20" data-toggle="modal"><button type="button" class="btn btn-primary btn-lg btn-block">Boleta 3</button></a>
</div>


<div class="modal fade" id="miModal20" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Documentos</h4>
      </div>

<form method="POST" action="{{ url('/documentos') }}" enctype="multipart/form-data">
 {{csrf_field()}}

      <div class="modal-body">
      <input type="hidden" value="{{$alum->id}}" name="idAlumno">
            <div class="input-group ">
                  
                 <span class="input-group-addon"> <input type="textarea" rows="3" class="form-control" name="descripcion"
                   value="BOLETA 3" readonly="readonly" style="text-align:center" ></span>
               </div>

               <br>

<fieldset class="fields2">
      
        <label>Recibido</label>
      
            <input type="radio" name="recibido" value="No" checked> No 
            <input type="radio" name="recibido" value="Si"> Si 
            
</fieldset> <br>

<fieldset class="fields2">
      
        <label>Copia</label>
      
            <input type="radio" name="copia" value="No" checked> No 
            <input type="radio" name="copia" value="Si"> Si 
            
</fieldset> <br>

            <p><label>
            <input type="file" name="file">
            </label></p>


<fieldset class="fields2">
      
        <label>Validado</label>
      
            <input type="radio" name="validado" value="No" checked> No 
            <input type="radio" name="validado" value="Si"> Si 
            
</fieldset> <br>

        <div class="input-group">
                        <span class="input-group-addon">Fecha de recepción</span>
                      <input type="text" class="form-control" name="recepcion" value="<?php echo date("Y/m/d"); ?>" size="10" >
        </div><br>


     <div class="input-group ">
                                <span class="input-group-addon">Observaciones</span>
                                <textarea type="textarea" rows="3" class="form-control"  placeholder="" name="observaciones" value="">
                                </textarea>
                            </div><br>



      </div>

      <div class="modal-footer">
      <button type="submit" class="btn btn-success pull-right">Enviar</button>
      </div>
      </form>
      
    </div>
  </div>
</div>
                    </div>
                    </div>
                    </div>

                </div>


                <!--DOCUMENTOS DE CUARTO CUATRIMESTRE-->

            <div role="tabpanel" class="tab-pane" id="cuartoCuatri">
            
               <br>
                    <div class="col-md-4">
                        <div id="sidebar">
                            <div class="well">
                      

           <div class="container">

  <div class="row">
          
        </div>
  
</div>    

     <div class="contenedor-modal">
 <a href="" data-target="#miModal21" data-toggle="modal"><button type="button" class="btn btn-primary btn-lg btn-block">Inscripción 4</button></a>
</div>


<div class="modal fade" id="miModal21" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Documentos</h4>
      </div>

<form method="POST" action="{{ url('/documentos') }}" enctype="multipart/form-data">
 {{csrf_field()}}

      <div class="modal-body">
      <input type="hidden" value="{{$alum->id}}" name="idAlumno">
            <div class="input-group ">
                  
                 <span class="input-group-addon"> <input type="textarea" rows="3" class="form-control" name="descripcion"
                   value="INSCRIPCIÓN 4" readonly="readonly" style="text-align:center" ></span>
               </div>

               <br>

<fieldset class="fields2">
      
        <label>Recibido</label>
      
            <input type="radio" name="recibido" value="No" checked> No 
            <input type="radio" name="recibido" value="Si"> Si 
            
</fieldset> <br>

<fieldset class="fields2">
      
        <label>Copia</label>
      
            <input type="radio" name="copia" value="No" checked> No 
            <input type="radio" name="copia" value="Si"> Si 
            
</fieldset> <br>

            <p><label>
            <input type="file" name="file">
            </label></p>


<fieldset class="fields2">
      
        <label>Validado</label>
      
            <input type="radio" name="validado" value="No" checked> No 
            <input type="radio" name="validado" value="Si"> Si 
            
</fieldset> <br>

        <div class="input-group">
                        <span class="input-group-addon">Fecha de recepción</span>
                      <input type="text" class="form-control" name="recepcion" value="<?php echo date("Y/m/d"); ?>" size="10" >
        </div><br>

 
     <div class="input-group ">
                                <span class="input-group-addon">Observaciones</span>
                                <textarea type="textarea" rows="3" class="form-control"  placeholder="" name="observaciones" value="">
                                </textarea>
                            </div><br>



      </div>

      <div class="modal-footer">
      <button type="submit" class="btn btn-success pull-right">Enviar</button>
      </div>
      </form>
      
    </div>
  </div>
</div>

<br><br>

 <div class="contenedor-modal">
 <a href="" data-target="#miModalx" data-toggle="modal"><button type="button" class="btn btn-primary btn-lg btn-block">Pago 4</button></a>
</div>


<div class="modal fade" id="miModalx" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Documentos</h4>
      </div>

<form method="POST" action="{{ url('/documentos') }}" enctype="multipart/form-data">
 {{csrf_field()}}

      <div class="modal-body">
      <input type="hidden" value="{{$alum->id}}" name="idAlumno">
            <div class="input-group ">
                  
                 <span class="input-group-addon"> <input type="textarea" rows="3" class="form-control" name="descripcion"
                   value="PAGO 4" readonly="readonly" style="text-align:center" ></span>
               </div>

               <br>

<fieldset class="fields2">
      
        <label>Recibido</label>
      
            <input type="radio" name="recibido" value="No" checked> No 
            <input type="radio" name="recibido" value="Si"> Si 
            
</fieldset> <br>

<fieldset class="fields2">
      
        <label>Copia</label>
      
            <input type="radio" name="copia" value="No" checked> No 
            <input type="radio" name="copia" value="Si"> Si 
            
</fieldset> <br>

            <p><label>
            <input type="file" name="file">
            </label></p>


<fieldset class="fields2">
      
        <label>Validado</label>
      
            <input type="radio" name="validado" value="No" checked> No 
            <input type="radio" name="validado" value="Si"> Si 
            
</fieldset> <br>

        <div class="input-group">
                        <span class="input-group-addon">Fecha de recepción</span>
                       <input type="text" class="form-control" name="recepcion" value="<?php echo date("Y/m/d"); ?>" size="10" >
        </div><br>


     <div class="input-group ">
                                <span class="input-group-addon">Observaciones</span>
                                <textarea type="textarea" rows="3" class="form-control"  placeholder="" name="observaciones" value="">
                                </textarea>
                            </div><br>



      </div>

      <div class="modal-footer">
      <button type="submit" class="btn btn-success pull-right">Enviar</button>
      </div>
      </form>
      
    </div>
  </div>
</div>

<br><br>

 <div class="contenedor-modal">
 <a href="" data-target="#miModal22" data-toggle="modal"><button type="button" class="btn btn-primary btn-lg btn-block">Boleta 4</button></a>
</div>


<div class="modal fade" id="miModal22" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Documentos</h4>
      </div>

<form method="POST" action="{{ url('/documentos') }}" enctype="multipart/form-data">
 {{csrf_field()}}

      <div class="modal-body">
      <input type="hidden" value="{{$alum->id}}" name="idAlumno">
            <div class="input-group ">
                  
                 <span class="input-group-addon"> <input type="textarea" rows="3" class="form-control" name="descripcion"
                   value="BOLETA 4" readonly="readonly" style="text-align:center" ></span>
               </div>

               <br>

<fieldset class="fields2">
      
        <label>Recibido</label>
      
            <input type="radio" name="recibido" value="No" checked> No 
            <input type="radio" name="recibido" value="Si"> Si 
            
</fieldset> <br>

<fieldset class="fields2">
      
        <label>Copia</label>
      
            <input type="radio" name="copia" value="No" checked> No 
            <input type="radio" name="copia" value="Si"> Si 
            
</fieldset> <br>

            <p><label>
            <input type="file" name="file">
            </label></p>


<fieldset class="fields2">
      
        <label>Validado</label>
      
            <input type="radio" name="validado" value="No" checked> No 
            <input type="radio" name="validado" value="Si"> Si 
            
</fieldset> <br>

        <div class="input-group">
                        <span class="input-group-addon">Fecha de recepción</span>
                      <input type="text" class="form-control" name="recepcion" value="<?php echo date("Y/m/d"); ?>" size="10" >
        </div><br>


     <div class="input-group ">
                                <span class="input-group-addon">Observaciones</span>
                                <textarea type="textarea" rows="3" class="form-control"  placeholder="" name="observaciones" value="">
                                </textarea>
                            </div><br>

      </div>

      <div class="modal-footer">
      <button type="submit" class="btn btn-success pull-right">Enviar</button>
      </div>
      </form>
      
    </div>
  </div>
</div>
                    </div>
                    </div>
                    </div>

                </div>



 <!--DOCUMENTOS DE QUINTO CUATRIMESTRE-->

            <div role="tabpanel" class="tab-pane" id="quintoCuatri">
            
               <br>
                    <div class="col-md-4">
                        <div id="sidebar">
                            <div class="well">
                      

           <div class="container">

  <div class="row">
          
        </div>
  
</div>    

     <div class="contenedor-modal">
 <a href="" data-target="#miModal23" data-toggle="modal"><button type="button" class="btn btn-primary btn-lg btn-block">Inscripción 5</button></a>
</div>


<div class="modal fade" id="miModal23" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Documentos</h4>
      </div>

<form method="POST" action="{{ url('/documentos') }}" enctype="multipart/form-data">
 {{csrf_field()}}

      <div class="modal-body">
      <input type="hidden" value="{{$alum->id}}" name="idAlumno">
            <div class="input-group ">
                  
                 <span class="input-group-addon"> <input type="textarea" rows="3" class="form-control" name="descripcion"
                   value="INSCRIPCIÓN 5" readonly="readonly" style="text-align:center" ></span>
               </div>

               <br>

<fieldset class="fields2">
      
        <label>Recibido</label>
      
            <input type="radio" name="recibido" value="No" checked> No 
            <input type="radio" name="recibido" value="Si"> Si 
            
</fieldset> <br>

<fieldset class="fields2">
      
        <label>Copia</label>
      
            <input type="radio" name="copia" value="No" checked> No 
            <input type="radio" name="copia" value="Si"> Si 
            
</fieldset> <br>

            <p><label>
            <input type="file" name="file">
            </label></p>


<fieldset class="fields2">
      
        <label>Validado</label>
      
            <input type="radio" name="validado" value="No" checked> No 
            <input type="radio" name="validado" value="Si"> Si 
            
</fieldset> <br>

        <div class="input-group">
                        <span class="input-group-addon">Fecha de recepción</span>
                   <input type="text" class="form-control" name="recepcion" value="<?php echo date("Y/m/d"); ?>" size="10" >
        </div><br>


     <div class="input-group ">
                                <span class="input-group-addon">Observaciones</span>
                                <textarea type="textarea" rows="3" class="form-control"  placeholder="" name="observaciones" value="">
                                </textarea>
                            </div><br>

      </div>

      <div class="modal-footer">
      <button type="submit" class="btn btn-success pull-right">Enviar</button>
      </div>
      </form>
      
    </div>
  </div>
</div>

<br><br>

 <div class="contenedor-modal">
 <a href="" data-target="#miModal24" data-toggle="modal"><button type="button" class="btn btn-primary btn-lg btn-block">Pago 5</button></a>
</div>


<div class="modal fade" id="miModal24" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Documentos</h4>
      </div>

<form method="POST" action="{{ url('/documentos') }}" enctype="multipart/form-data">
 {{csrf_field()}}

      <div class="modal-body">
      <input type="hidden" value="{{$alum->id}}" name="idAlumno">
            <div class="input-group ">
                  
                 <span class="input-group-addon"> <input type="textarea" rows="3" class="form-control" name="descripcion"
                   value="PAGO 5" readonly="readonly" style="text-align:center" ></span>
               </div>

               <br>

<fieldset class="fields2">
      
        <label>Recibido</label>
      
            <input type="radio" name="recibido" value="No" checked> No 
            <input type="radio" name="recibido" value="Si"> Si 
            
</fieldset> <br>

<fieldset class="fields2">
      
        <label>Copia</label>
      
            <input type="radio" name="copia" value="No" checked> No 
            <input type="radio" name="copia" value="Si"> Si 
            
</fieldset> <br>

            <p><label>
            <input type="file" name="file">
            </label></p>


<fieldset class="fields2">
      
        <label>Validado</label>
      
            <input type="radio" name="validado" value="No" checked> No 
            <input type="radio" name="validado" value="Si"> Si 
            
</fieldset> <br>

        <div class="input-group">
                        <span class="input-group-addon">Fecha de recepción</span>
                     <input type="text" class="form-control" name="recepcion" value="<?php echo date("Y/m/d"); ?>" size="10" >
        </div><br>

     <div class="input-group ">
                                <span class="input-group-addon">Observaciones</span>
                                <textarea type="textarea" rows="3" class="form-control"  placeholder="" name="observaciones" value="">
                                </textarea>
                            </div><br>



      </div>

      <div class="modal-footer">
      <button type="submit" class="btn btn-success pull-right">Enviar</button>
      </div>
      </form>
      
    </div>
  </div>
</div>

<br><br>

 <div class="contenedor-modal">
 <a href="" data-target="#miModal25" data-toggle="modal"><button type="button" class="btn btn-primary btn-lg btn-block">Boleta 5</button></a>
</div>


<div class="modal fade" id="miModal25" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Documentos</h4>
      </div>

<form method="POST" action="{{ url('/documentos') }}" enctype="multipart/form-data">
 {{csrf_field()}}

      <div class="modal-body">
      <input type="hidden" value="{{$alum->id}}" name="idAlumno">
            <div class="input-group ">
                  
                 <span class="input-group-addon"> <input type="textarea" rows="3" class="form-control" name="descripcion"
                   value="BOLETA 5" readonly="readonly" style="text-align:center" ></span>
               </div>

               <br>

<fieldset class="fields2">
      
        <label>Recibido</label>
      
            <input type="radio" name="recibido" value="No" checked> No 
            <input type="radio" name="recibido" value="Si"> Si 
            
</fieldset> <br>

<fieldset class="fields2">
      
        <label>Copia</label>
      
            <input type="radio" name="copia" value="No" checked> No 
            <input type="radio" name="copia" value="Si"> Si 
            
</fieldset> <br>

            <p><label>
            <input type="file" name="file">
            </label></p>


<fieldset class="fields2">
      
        <label>Validado</label>
      
            <input type="radio" name="validado" value="No" checked> No 
            <input type="radio" name="validado" value="Si"> Si 
            
</fieldset> <br>

        <div class="input-group">
                        <span class="input-group-addon">Fecha de recepción</span>
                       <input type="text" class="form-control" name="recepcion" value="<?php echo date("Y/m/d"); ?>" size="10" >
        </div><br>


     <div class="input-group ">
                                <span class="input-group-addon">Observaciones</span>
                                <textarea type="textarea" rows="3" class="form-control"  placeholder="" name="observaciones" value="">
                                </textarea>
                            </div><br>

      </div>

      <div class="modal-footer">
      <button type="submit" class="btn btn-success pull-right">Enviar</button>
      </div>
      </form>
      
    </div>
  </div>
</div>
                    </div>
                    </div>
                    </div>

                </div>


<!--DOCUMENTOS DE SEXTO CUATRIMESTRE-->

            <div role="tabpanel" class="tab-pane" id="sextoCuatri">
            
               <br>
                    <div class="col-md-4">
                        <div id="sidebar">
                            <div class="well">
                      

           <div class="container">

  <div class="row">
          
        </div>
  
</div>    

     <div class="contenedor-modal">
 <a href="" data-target="#miModal26" data-toggle="modal"><button type="button" class="btn btn-primary btn-lg btn-block">Inscripción 6</button></a>
</div>


<div class="modal fade" id="miModal26" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Documentos</h4>
      </div>

<form method="POST" action="{{ url('/documentos') }}" enctype="multipart/form-data">
 {{csrf_field()}}

      <div class="modal-body">
      <input type="hidden" value="{{$alum->id}}" name="idAlumno">
            <div class="input-group ">
                  
                 <span class="input-group-addon"> <input type="textarea" rows="3" class="form-control" name="descripcion"
                   value="INSCRIPCIÓN 6" readonly="readonly" style="text-align:center" ></span>
               </div>

               <br>

<fieldset class="fields2">
      
        <label>Recibido</label>
      
            <input type="radio" name="recibido" value="No" checked> No 
            <input type="radio" name="recibido" value="Si"> Si 
            
</fieldset> <br>

<fieldset class="fields2">
      
        <label>Copia</label>
      
            <input type="radio" name="copia" value="No" checked> No 
            <input type="radio" name="copia" value="Si"> Si 
            
</fieldset> <br>

            <p><label>
            <input type="file" name="file">
            </label></p>


<fieldset class="fields2">
      
        <label>Validado</label>
      
            <input type="radio" name="validado" value="No" checked> No 
            <input type="radio" name="validado" value="Si"> Si 
            
</fieldset> <br>

        <div class="input-group">
                        <span class="input-group-addon">Fecha de recepción</span>
                    <input type="text" class="form-control" name="recepcion" value="<?php echo date("Y/m/d"); ?>" size="10" >
        </div><br>


     <div class="input-group ">
                                <span class="input-group-addon">Observaciones</span>
                                <textarea type="textarea" rows="3" class="form-control"  placeholder="" name="observaciones" value="">
                                </textarea>
                            </div><br>



      </div>

      <div class="modal-footer">
      <button type="submit" class="btn btn-success pull-right">Enviar</button>
      </div>
      </form>
      
    </div>
  </div>
</div>

<br><br>

 <div class="contenedor-modal">
 <a href="" data-target="#miModal27" data-toggle="modal"><button type="button" class="btn btn-primary btn-lg btn-block">Pago 6</button></a>
</div>


<div class="modal fade" id="miModal27" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Documentos</h4>
      </div>

<form method="POST" action="{{ url('/documentos') }}" enctype="multipart/form-data">
 {{csrf_field()}}

      <div class="modal-body">
      <input type="hidden" value="{{$alum->id}}" name="idAlumno">
            <div class="input-group ">
                  
                 <span class="input-group-addon"> <input type="textarea" rows="3" class="form-control" name="descripcion"
                   value="PAGO 6" readonly="readonly" style="text-align:center" ></span>
               </div>

               <br>

<fieldset class="fields2">
      
        <label>Recibido</label>
      
            <input type="radio" name="recibido" value="No" checked> No 
            <input type="radio" name="recibido" value="Si"> Si 
            
</fieldset> <br>

<fieldset class="fields2">
      
        <label>Copia</label>
      
            <input type="radio" name="copia" value="No" checked> No 
            <input type="radio" name="copia" value="Si"> Si 
            
</fieldset> <br>

            <p><label>
            <input type="file" name="file">
            </label></p>


<fieldset class="fields2">
      
        <label>Validado</label>
      
            <input type="radio" name="validado" value="No" checked> No 
            <input type="radio" name="validado" value="Si"> Si 
            
</fieldset> <br>

        <div class="input-group">
                        <span class="input-group-addon">Fecha de recepción</span>
                       <input type="text" class="form-control" name="recepcion" value="<?php echo date("Y/m/d"); ?>" size="10" >
        </div><br>

     <div class="input-group ">
                                <span class="input-group-addon">Observaciones</span>
                                <textarea type="textarea" rows="3" class="form-control"  placeholder="" name="observaciones" value="">
                                </textarea>
                            </div><br>

      </div>

      <div class="modal-footer">
      <button type="submit" class="btn btn-success pull-right">Enviar</button>
      </div>
      </form>
      
    </div>
  </div>
</div>

<br><br>

  <div class="contenedor-modal">
 <a href="" data-target="#miModal28" data-toggle="modal"><button type="button" class="btn btn-primary btn-lg btn-block">Boleta 6</button></a>
</div>


<div class="modal fade" id="miModal28" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Documentos</h4>
      </div>

<form method="POST" action="{{ url('/documentos') }}" enctype="multipart/form-data">
 {{csrf_field()}}

      <div class="modal-body">
      <input type="hidden" value="{{$alum->id}}" name="idAlumno">
            <div class="input-group ">
                  
                 <span class="input-group-addon"> <input type="textarea" rows="3" class="form-control" name="descripcion"
                   value="BOLETA 6" readonly="readonly" style="text-align:center" ></span>
               </div>

               <br>

<fieldset class="fields2">
      
        <label>Recibido</label>
      
            <input type="radio" name="recibido" value="No" checked> No 
            <input type="radio" name="recibido" value="Si"> Si 
            
</fieldset> <br>

<fieldset class="fields2">
      
        <label>Copia</label>
      
            <input type="radio" name="copia" value="No" checked> No 
            <input type="radio" name="copia" value="Si"> Si 
            
</fieldset> <br>

            <p><label>
            <input type="file" name="file">
            </label></p>


<fieldset class="fields2">
      
        <label>Validado</label>
      
            <input type="radio" name="validado" value="No" checked> No 
            <input type="radio" name="validado" value="Si"> Si 
            
</fieldset> <br>

        <div class="input-group">
                        <span class="input-group-addon">Fecha de recepción</span>
                     <input type="text" class="form-control" name="recepcion" value="<?php echo date("Y/m/d"); ?>" size="10" >
        </div><br>

     <div class="input-group ">
                                <span class="input-group-addon">Observaciones</span>
                                <textarea type="textarea" rows="3" class="form-control"  placeholder="" name="observaciones" value="">
                                </textarea>
                            </div><br>

      </div>

      <div class="modal-footer">
      <button type="submit" class="btn btn-success pull-right">Enviar</button>
      </div>
      </form>
      
    </div>
  </div>
</div>
                    </div>
                    </div>
                    </div>

                </div>

<!--DOCUMENTOS DE EGRESADO TSU-->

            <div role="tabpanel" class="tab-pane" id="egresadoTsu">
            
               <br>
                    <div class="col-md-4">
                        <div id="sidebar">
                            <div class="well">
                      

           <div class="container">

  <div class="row">
          
        </div>
  
</div>    

    <div class="contenedor-modal">
 <a href="" data-target="#miModal29" data-toggle="modal"><button type="button" class="btn btn-primary btn-lg btn-block">Pago de titulación</button></a>
</div>


<div class="modal fade" id="miModal29" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Documentos</h4>
      </div>

<form method="POST" action="{{ url('/documentos') }}" enctype="multipart/form-data">
 {{csrf_field()}}

      <div class="modal-body">
      <input type="hidden" value="{{$alum->id}}" name="idAlumno">
            <div class="input-group ">
                  
                 <span class="input-group-addon"> <input type="textarea" rows="3" class="form-control" name="descripcion"
                   value="PAGO DE TITULACIÓN TSU" readonly="readonly" style="text-align:center" ></span>
               </div>

               <br>

<fieldset class="fields2">
      
        <label>Recibido</label>
      
            <input type="radio" name="recibido" value="No" checked> No 
            <input type="radio" name="recibido" value="Si"> Si 
            
</fieldset> <br>

<fieldset class="fields2">
      
        <label>Copia</label>
      
            <input type="radio" name="copia" value="No" checked> No 
            <input type="radio" name="copia" value="Si"> Si 
            
</fieldset> <br>

            <p><label>
            <input type="file" name="file">
            </label></p>


<fieldset class="fields2">
      
        <label>Validado</label>
      
            <input type="radio" name="validado" value="No" checked> No 
            <input type="radio" name="validado" value="Si"> Si 
            
</fieldset> <br>

        <div class="input-group">
                        <span class="input-group-addon">Fecha de recepción</span>
                    <input type="text" class="form-control" name="recepcion" value="<?php echo date("Y/m/d"); ?>" size="10" >
        </div><br>


     <div class="input-group ">
                                <span class="input-group-addon">Observaciones</span>
                                <textarea type="textarea" rows="3" class="form-control"  placeholder="" name="observaciones" value="">
                                </textarea>
                            </div><br>



      </div>

      <div class="modal-footer">
      <button type="submit" class="btn btn-success pull-right">Enviar</button>
      </div>
      </form>
      
    </div>
  </div>
</div>

<br><br>

  <div class="contenedor-modal">
 <a href="" data-target="#miModal30" data-toggle="modal"><button type="button" class="btn btn-primary btn-lg btn-block">Carta de liberación</button></a>
</div>


<div class="modal fade" id="miModal30" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Documentos</h4>
      </div>

<form method="POST" action="{{ url('/documentos') }}" enctype="multipart/form-data">
 {{csrf_field()}}

      <div class="modal-body">
      <input type="hidden" value="{{$alum->id}}" name="idAlumno">
            <div class="input-group ">
                  
                 <span class="input-group-addon"> <input type="textarea" rows="3" class="form-control" name="descripcion"
                   value="CARTA DE LIBERACIÓN TSU" readonly="readonly" style="text-align:center" ></span>
               </div>

               <br>

<fieldset class="fields2">
      
        <label>Recibido</label>
      
            <input type="radio" name="recibido" value="No" checked> No 
            <input type="radio" name="recibido" value="Si"> Si 
            
</fieldset> <br>

<fieldset class="fields2">
      
        <label>Copia</label>
      
            <input type="radio" name="copia" value="No" checked> No 
            <input type="radio" name="copia" value="Si"> Si 
            
</fieldset> <br>

            <p><label>
            <input type="file" name="file">
            </label></p>


<fieldset class="fields2">
      
        <label>Validado</label>
      
            <input type="radio" name="validado" value="No" checked> No 
            <input type="radio" name="validado" value="Si"> Si 
            
</fieldset> <br>

        <div class="input-group">
                        <span class="input-group-addon">Fecha de recepción</span>
                  <input type="text" class="form-control" name="recepcion" value="<?php echo date("Y/m/d"); ?>" size="10" >
        </div><br>

 <center> <h4 class="modal-title" id="myModalLabel">Prestamo de documentos</h4> </center> <br>

        <div class="input-group">
                        <span class="input-group-addon">Fecha de prestamo</span>
                        <input type="date" class="form-control" placeholder="" name="prestamo" value="">
        </div><br>



<fieldset class="fields2">
      
        <label>Devolución</label>
      
            <input type="radio" name="devolucion" value="No" checked> No 
            <input type="radio" name="devolucion" value="Si"> Si 
            
</fieldset> <br>


        <div class="input-group">
                        <span class="input-group-addon">Fecha de devolución</span>
                        <input type="date" class="form-control" placeholder="" name="fechaDev" value="">
        </div><br>

     <div class="input-group ">
                                <span class="input-group-addon">Observaciones</span>
                                <textarea type="textarea" rows="3" class="form-control"  placeholder="" name="observaciones" value="">
                                </textarea>
                            </div><br>



      </div>

      <div class="modal-footer">
      <button type="submit" class="btn btn-success pull-right">Enviar</button>
      </div>
      </form>
      
    </div>
  </div>
</div>

<br><br>

  <div class="contenedor-modal">
 <a href="" data-target="#miModal31" data-toggle="modal"><button type="button" class="btn btn-primary btn-lg btn-block">Autorización impresión</button></a>
</div>


<div class="modal fade" id="miModal31" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Documentos</h4>
      </div>

<form method="POST" action="{{ url('/documentos') }}" enctype="multipart/form-data">
 {{csrf_field()}}

      <div class="modal-body">
      <input type="hidden" value="{{$alum->id}}" name="idAlumno">
            <div class="input-group ">
                  
                 <span class="input-group-addon"> <input type="textarea" rows="3" class="form-control" name="descripcion"
                   value="AUTORIZACIÓN IMPRESIÓN TSU" readonly="readonly" style="text-align:center" ></span>
               </div>

               <br>

<fieldset class="fields2">
      
        <label>Recibido</label>
      
            <input type="radio" name="recibido" value="No" checked> No 
            <input type="radio" name="recibido" value="Si"> Si 
            
</fieldset> <br>

<fieldset class="fields2">
      
        <label>Copia</label>
      
            <input type="radio" name="copia" value="No" checked> No 
            <input type="radio" name="copia" value="Si"> Si 
            
</fieldset> <br>

            <p><label>
            <input type="file" name="file">
            </label></p>


<fieldset class="fields2">
      
        <label>Validado</label>
      
            <input type="radio" name="validado" value="No" checked> No 
            <input type="radio" name="validado" value="Si"> Si 
            
</fieldset> <br>

        <div class="input-group">
                        <span class="input-group-addon">Fecha de recepción</span>
                     <input type="text" class="form-control" name="recepcion" value="<?php echo date("Y/m/d"); ?>" size="10" >
        </div><br>

 <center> <h4 class="modal-title" id="myModalLabel">Prestamo de documentos</h4> </center> <br>

        <div class="input-group">
                        <span class="input-group-addon">Fecha de prestamo</span>
                        <input type="date" class="form-control" placeholder="" name="prestamo" value="">
        </div><br>



<fieldset class="fields2">
      
        <label>Devolución</label>
      
            <input type="radio" name="devolucion" value="No" checked> No 
            <input type="radio" name="devolucion" value="Si"> Si 
            
</fieldset> <br>


        <div class="input-group">
                        <span class="input-group-addon">Fecha de devolución</span>
                        <input type="date" class="form-control" placeholder="" name="fechaDev" value="">
        </div><br>

     <div class="input-group ">
                                <span class="input-group-addon">Observaciones</span>
                                <textarea type="textarea" rows="3" class="form-control"  placeholder="" name="observaciones" value="">
                                </textarea>
                            </div><br>



      </div>

      <div class="modal-footer">
      <button type="submit" class="btn btn-success pull-right">Enviar</button>
      </div>
      </form>
      
    </div>
  </div>
</div>


<br><br>

  <div class="contenedor-modal">
 <a href="" data-target="#modalCedula" data-toggle="modal"><button type="button" class="btn btn-primary btn-lg btn-block"> Cédula</button></a>
</div>


<div class="modal fade" id="modalCedula" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Documentos</h4>
      </div>

<form method="POST" action="{{ url('/documentos') }}" enctype="multipart/form-data">
 {{csrf_field()}}

      <div class="modal-body">
      <input type="hidden" value="{{$alum->id}}" name="idAlumno">
            <div class="input-group ">
                  
                 <span class="input-group-addon"> <input type="textarea" rows="3" class="form-control" name="descripcion"
                   value="CÉDULA TSU" readonly="readonly" style="text-align:center" ></span>
               </div>

               <br>

<fieldset class="fields2">
      
        <label>Recibido</label>
      
            <input type="radio" name="recibido" value="No" checked> No 
            <input type="radio" name="recibido" value="Si"> Si 
            
</fieldset> <br>

<fieldset class="fields2">
      
        <label>Copia</label>
      
            <input type="radio" name="copia" value="No" checked> No 
            <input type="radio" name="copia" value="Si"> Si 
            
</fieldset> <br>

            <p><label>
            <input type="file" name="file">
            </label></p>


<fieldset class="fields2">
      
        <label>Validado</label>
      
            <input type="radio" name="validado" value="No" checked> No 
            <input type="radio" name="validado" value="Si"> Si 
            
</fieldset> <br>

        <div class="input-group">
                        <span class="input-group-addon">Fecha de recepción</span>
                     <input type="text" class="form-control" name="recepcion" value="<?php echo date("Y/m/d"); ?>" size="10" >
        </div><br>

 <center> <h4 class="modal-title" id="myModalLabel">Prestamo de documentos</h4> </center> <br>

        <div class="input-group">
                        <span class="input-group-addon">Fecha de prestamo</span>
                        <input type="date" class="form-control" placeholder="" name="prestamo" value="">
        </div><br>



<fieldset class="fields2">
      
        <label>Devolución</label>
      
            <input type="radio" name="devolucion" value="No" checked> No 
            <input type="radio" name="devolucion" value="Si"> Si 
            
</fieldset> <br>


        <div class="input-group">
                        <span class="input-group-addon">Fecha de devolución</span>
                        <input type="date" class="form-control" placeholder="" name="fechaDev" value="">
        </div><br>

     <div class="input-group ">
                                <span class="input-group-addon">Observaciones</span>
                                <textarea type="textarea" rows="3" class="form-control"  placeholder="" name="observaciones" value="">
                                </textarea>
                            </div><br>



      </div>

      <div class="modal-footer">
      <button type="submit" class="btn btn-success pull-right">Enviar</button>
      </div>
      </form>
      
    </div>
  </div>
</div>

<br><br>

  <div class="contenedor-modal">
 <a href="" data-target="#modalTituloTsu" data-toggle="modal"><button type="button" class="btn btn-primary btn-lg btn-block"> Título </button></a>
</div>


<div class="modal fade" id="modalTituloTsu" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Documentos</h4>
      </div>

<form method="POST" action="{{ url('/documentos') }}" enctype="multipart/form-data">
 {{csrf_field()}}

      <div class="modal-body">
      <input type="hidden" value="{{$alum->id}}" name="idAlumno">
            <div class="input-group ">
                  
                 <span class="input-group-addon"> <input type="textarea" rows="3" class="form-control" name="descripcion"
                   value="TÍTULO TSU" readonly="readonly" style="text-align:center" ></span>
               </div>

               <br>

<fieldset class="fields2">
      
        <label>Recibido</label>
      
            <input type="radio" name="recibido" value="No" checked> No 
            <input type="radio" name="recibido" value="Si"> Si 
            
</fieldset> <br>

<fieldset class="fields2">
      
        <label>Copia</label>
      
            <input type="radio" name="copia" value="No" checked> No 
            <input type="radio" name="copia" value="Si"> Si 
            
</fieldset> <br>

            <p><label>
            <input type="file" name="file">
            </label></p>


<fieldset class="fields2">
      
        <label>Validado</label>
      
            <input type="radio" name="validado" value="No" checked> No 
            <input type="radio" name="validado" value="Si"> Si 
            
</fieldset> <br>

        <div class="input-group">
                        <span class="input-group-addon">Fecha de recepción</span>
                     <input type="text" class="form-control" name="recepcion" value="<?php echo date("Y/m/d"); ?>" size="10" >
        </div><br>

 <center> <h4 class="modal-title" id="myModalLabel">Prestamo de documentos</h4> </center> <br>

        <div class="input-group">
                        <span class="input-group-addon">Fecha de prestamo</span>
                        <input type="date" class="form-control" placeholder="" name="prestamo" value="">
        </div><br>



<fieldset class="fields2">
      
        <label>Devolución</label>
      
            <input type="radio" name="devolucion" value="No" checked> No 
            <input type="radio" name="devolucion" value="Si"> Si 
            
</fieldset> <br>


        <div class="input-group">
                        <span class="input-group-addon">Fecha de devolución</span>
                        <input type="date" class="form-control" placeholder="" name="fechaDev" value="">
        </div><br>

     <div class="input-group ">
                                <span class="input-group-addon">Observaciones</span>
                                <textarea type="textarea" rows="3" class="form-control"  placeholder="" name="observaciones" value="">
                                </textarea>
                            </div><br>



      </div>

      <div class="modal-footer">
      <button type="submit" class="btn btn-success pull-right">Enviar</button>
      </div>
      </form>
      
    </div>
  </div>
</div>

<br><br>

  <div class="contenedor-modal">
 <a href="" data-target="#certificadoTsu" data-toggle="modal"><button type="button" class="btn btn-primary btn-lg btn-block"> Certificado TSU</button></a>
</div>


<div class="modal fade" id="certificadoTsu" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Documentos</h4>
      </div>

<form method="POST" action="{{ url('/documentos') }}" enctype="multipart/form-data">
 {{csrf_field()}}

      <div class="modal-body">
      <input type="hidden" value="{{$alum->id}}" name="idAlumno">
            <div class="input-group ">
                  
                 <span class="input-group-addon"> <input type="textarea" rows="3" class="form-control" name="descripcion"
                   value="CERTIFICADO TSU" readonly="readonly" style="text-align:center" ></span>
               </div>

               <br>

<fieldset class="fields2">
      
        <label>Recibido</label>
      
            <input type="radio" name="recibido" value="No" checked> No 
            <input type="radio" name="recibido" value="Si"> Si 
            
</fieldset> <br>

<fieldset class="fields2">
      
        <label>Copia</label>
      
            <input type="radio" name="copia" value="No" checked> No 
            <input type="radio" name="copia" value="Si"> Si 
            
</fieldset> <br>

            <p><label>
            <input type="file" name="file">
            </label></p>


<fieldset class="fields2">
      
        <label>Validado</label>
      
            <input type="radio" name="validado" value="No" checked> No 
            <input type="radio" name="validado" value="Si"> Si 
            
</fieldset> <br>

        <div class="input-group">
                        <span class="input-group-addon">Fecha de recepción</span>
                     <input type="text" class="form-control" name="recepcion" value="<?php echo date("Y/m/d"); ?>" size="10" >
        </div><br>

 <center> <h4 class="modal-title" id="myModalLabel">Prestamo de documentos</h4> </center> <br>

        <div class="input-group">
                        <span class="input-group-addon">Fecha de prestamo</span>
                        <input type="date" class="form-control" placeholder="" name="prestamo" value="">
        </div><br>



<fieldset class="fields2">
      
        <label>Devolución</label>
      
            <input type="radio" name="devolucion" value="No" checked> No 
            <input type="radio" name="devolucion" value="Si"> Si 
            
</fieldset> <br>


        <div class="input-group">
                        <span class="input-group-addon">Fecha de devolución</span>
                        <input type="date" class="form-control" placeholder="" name="fechaDev" value="">
        </div><br>

     <div class="input-group ">
                                <span class="input-group-addon">Observaciones</span>
                                <textarea type="textarea" rows="3" class="form-control"  placeholder="" name="observaciones" value="">
                                </textarea>
                            </div><br>



      </div>

      <div class="modal-footer">
      <button type="submit" class="btn btn-success pull-right">Enviar</button>
      </div>
      </form>
      
    </div>
  </div>
</div>


<br><br>

  <div class="contenedor-modal">
 <a href="" data-target="#constanciaSS" data-toggle="modal"><button type="button" class="btn btn-primary btn-lg btn-block">Constancia SS</button></a>
</div>


<div class="modal fade" id="constanciaSS" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Documentos</h4>
      </div>

<form method="POST" action="{{ url('/documentos') }}" enctype="multipart/form-data">
 {{csrf_field()}}

      <div class="modal-body">
      <input type="hidden" value="{{$alum->id}}" name="idAlumno">
            <div class="input-group ">
                  
                 <span class="input-group-addon"> <input type="textarea" rows="3" class="form-control" name="descripcion"
                   value="CONSTANCIA SS - TSU" readonly="readonly" style="text-align:center" ></span>
               </div>

               <br>

<fieldset class="fields2">
      
        <label>Recibido</label>
      
            <input type="radio" name="recibido" value="No" checked> No 
            <input type="radio" name="recibido" value="Si"> Si 
            
</fieldset> <br>

<fieldset class="fields2">
      
        <label>Copia</label>
      
            <input type="radio" name="copia" value="No" checked> No 
            <input type="radio" name="copia" value="Si"> Si 
            
</fieldset> <br>

            <p><label>
            <input type="file" name="file">
            </label></p>


<fieldset class="fields2">
      
        <label>Validado</label>
      
            <input type="radio" name="validado" value="No" checked> No 
            <input type="radio" name="validado" value="Si"> Si 
            
</fieldset> <br>

        <div class="input-group">
                        <span class="input-group-addon">Fecha de recepción</span>
                     <input type="text" class="form-control" name="recepcion" value="<?php echo date("Y/m/d"); ?>" size="10" >
        </div><br>

 <center> <h4 class="modal-title" id="myModalLabel">Prestamo de documentos</h4> </center> <br>

        <div class="input-group">
                        <span class="input-group-addon">Fecha de prestamo</span>
                        <input type="date" class="form-control" placeholder="" name="prestamo" value="">
        </div><br>



<fieldset class="fields2">
      
        <label>Devolución</label>
      
            <input type="radio" name="devolucion" value="No" checked> No 
            <input type="radio" name="devolucion" value="Si"> Si 
            
</fieldset> <br>


        <div class="input-group">
                        <span class="input-group-addon">Fecha de devolución</span>
                        <input type="date" class="form-control" placeholder="" name="fechaDev" value="">
        </div><br>

     <div class="input-group ">
                                <span class="input-group-addon">Observaciones</span>
                                <textarea type="textarea" rows="3" class="form-control"  placeholder="" name="observaciones" value="">
                                </textarea>
                            </div><br>



      </div>

      <div class="modal-footer">
      <button type="submit" class="btn btn-success pull-right">Enviar</button>
      </div>
      </form>
      
    </div>
  </div>
</div>


<br><br>

  <div class="contenedor-modal">
 <a href="" data-target="#excencion" data-toggle="modal"><button type="button" class="btn btn-primary btn-lg btn-block"> Carta excención de examen</button></a>
</div>


<div class="modal fade" id="excencion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Documentos</h4>
      </div>

<form method="POST" action="{{ url('/documentos') }}" enctype="multipart/form-data">
 {{csrf_field()}}

      <div class="modal-body">
      <input type="hidden" value="{{$alum->id}}" name="idAlumno">
            <div class="input-group ">
                  
                 <span class="input-group-addon"> <input type="textarea" rows="3" class="form-control" name="descripcion"
                   value="CARTA EXCENCIÓN DE EXAMEN TSU" readonly="readonly" style="text-align:center" ></span>
               </div>

               <br>

<fieldset class="fields2">
      
        <label>Recibido</label>
      
            <input type="radio" name="recibido" value="No" checked> No 
            <input type="radio" name="recibido" value="Si"> Si 
            
</fieldset> <br>

<fieldset class="fields2">
      
        <label>Copia</label>
      
            <input type="radio" name="copia" value="No" checked> No 
            <input type="radio" name="copia" value="Si"> Si 
            
</fieldset> <br>

            <p><label>
            <input type="file" name="file">
            </label></p>


<fieldset class="fields2">
      
        <label>Validado</label>
      
            <input type="radio" name="validado" value="No" checked> No 
            <input type="radio" name="validado" value="Si"> Si 
            
</fieldset> <br>

        <div class="input-group">
                        <span class="input-group-addon">Fecha de recepción</span>
                     <input type="text" class="form-control" name="recepcion" value="<?php echo date("Y/m/d"); ?>" size="10" >
        </div><br>

 <center> <h4 class="modal-title" id="myModalLabel">Prestamo de documentos</h4> </center> <br>

        <div class="input-group">
                        <span class="input-group-addon">Fecha de prestamo</span>
                        <input type="date" class="form-control" placeholder="" name="prestamo" value="">
        </div><br>



<fieldset class="fields2">
      
        <label>Devolución</label>
      
            <input type="radio" name="devolucion" value="No" checked> No 
            <input type="radio" name="devolucion" value="Si"> Si 
            
</fieldset> <br>


        <div class="input-group">
                        <span class="input-group-addon">Fecha de devolución</span>
                        <input type="date" class="form-control" placeholder="" name="fechaDev" value="">
        </div><br>

     <div class="input-group ">
                                <span class="input-group-addon">Observaciones</span>
                                <textarea type="textarea" rows="3" class="form-control"  placeholder="" name="observaciones" value="">
                                </textarea>
                            </div><br>



      </div>

      <div class="modal-footer">
      <button type="submit" class="btn btn-success pull-right">Enviar</button>
      </div>
      </form>
      
    </div>
  </div>
</div>



                    </div>
                    </div>
                    </div>

                </div>

<!--DOCUMENTOS DE SEPTIMO CUATRIMESTRE-->

            <div role="tabpanel" class="tab-pane" id="septimoCuatri">
            
               <br>
                    <div class="col-md-4">
                        <div id="sidebar">
                            <div class="well">
                      

           <div class="container">

  <div class="row">
          
        </div>
  
</div>    

     <div class="contenedor-modal">
 <a href="" data-target="#miModal32" data-toggle="modal"><button type="button" class="btn btn-primary btn-lg btn-block">Inscripción 7</button></a>
</div>


<div class="modal fade" id="miModal32" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Documentos</h4>
      </div>

<form method="POST" action="{{ url('/documentos') }}" enctype="multipart/form-data">
 {{csrf_field()}}

      <div class="modal-body">
      <input type="hidden" value="{{$alum->id}}" name="idAlumno">
            <div class="input-group ">
                  
                 <span class="input-group-addon"> <input type="textarea" rows="3" class="form-control" name="descripcion"
                   value="INSCRIPCIÓN 7" readonly="readonly" style="text-align:center" ></span>
               </div>

               <br>

<fieldset class="fields2">
      
        <label>Recibido</label>
      
            <input type="radio" name="recibido" value="No" checked> No 
            <input type="radio" name="recibido" value="Si"> Si 
            
</fieldset> <br>

<fieldset class="fields2">
      
        <label>Copia</label>
      
            <input type="radio" name="copia" value="No" checked> No 
            <input type="radio" name="copia" value="Si"> Si 
            
</fieldset> <br>

            <p><label>
            <input type="file" name="file">
            </label></p>


<fieldset class="fields2">
      
        <label>Validado</label>
      
            <input type="radio" name="validado" value="No" checked> No 
            <input type="radio" name="validado" value="Si"> Si 
            
</fieldset> <br>

        <div class="input-group">
                        <span class="input-group-addon">Fecha de recepción</span>
                     <input type="text" class="form-control" name="recepcion" value="<?php echo date("Y/m/d"); ?>" size="10" >
        </div><br>


     <div class="input-group ">
                                <span class="input-group-addon">Observaciones</span>
                                <textarea type="textarea" rows="3" class="form-control"  placeholder="" name="observaciones" value="">
                                </textarea>
                            </div><br>



      </div>

      <div class="modal-footer">
      <button type="submit" class="btn btn-success pull-right">Enviar</button>
      </div>
      </form>
      
    </div>
  </div>
</div>

<br><br>

  <div class="contenedor-modal">
 <a href="" data-target="#miModal33" data-toggle="modal"><button type="button" class="btn btn-primary btn-lg btn-block">Pago 7</button></a>
</div>


<div class="modal fade" id="miModal33" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Documentos</h4>
      </div>

<form method="POST" action="{{ url('/documentos') }}" enctype="multipart/form-data">
 {{csrf_field()}}

      <div class="modal-body">
      <input type="hidden" value="{{$alum->id}}" name="idAlumno">
            <div class="input-group ">
                  
                 <span class="input-group-addon"> <input type="textarea" rows="3" class="form-control" name="descripcion"
                   value="PAGO 7" readonly="readonly" style="text-align:center" ></span>
               </div>

               <br>

<fieldset class="fields2">
      
        <label>Recibido</label>
      
            <input type="radio" name="recibido" value="No" checked> No 
            <input type="radio" name="recibido" value="Si"> Si 
            
</fieldset> <br>

<fieldset class="fields2">
      
        <label>Copia</label>
      
            <input type="radio" name="copia" value="No" checked> No 
            <input type="radio" name="copia" value="Si"> Si 
            
</fieldset> <br>

            <p><label>
            <input type="file" name="file">
            </label></p>


<fieldset class="fields2">
      
        <label>Validado</label>
      
            <input type="radio" name="validado" value="No" checked> No 
            <input type="radio" name="validado" value="Si"> Si 
            
</fieldset> <br>

        <div class="input-group">
                        <span class="input-group-addon">Fecha de recepción</span>
                      <input type="text" class="form-control" name="recepcion" value="<?php echo date("Y/m/d"); ?>" size="10" >
        </div><br>


     <div class="input-group ">
                                <span class="input-group-addon">Observaciones</span>
                                <textarea type="textarea" rows="3" class="form-control"  placeholder="" name="observaciones" value="">
                                </textarea>
                            </div><br>



      </div>

      <div class="modal-footer">
      <button type="submit" class="btn btn-success pull-right">Enviar</button>
      </div>
      </form>
      
    </div>
  </div>
</div>

<br><br>

  <div class="contenedor-modal">
 <a href="" data-target="#miModal34" data-toggle="modal"><button type="button" class="btn btn-primary btn-lg btn-block">Boleta 7</button></a>
</div>


<div class="modal fade" id="miModal34" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Documentos</h4>
      </div>

<form method="POST" action="{{ url('/documentos') }}" enctype="multipart/form-data">
 {{csrf_field()}}

      <div class="modal-body">
      <input type="hidden" value="{{$alum->id}}" name="idAlumno">
            <div class="input-group ">
                  
                 <span class="input-group-addon"> <input type="textarea" rows="3" class="form-control" name="descripcion"
                   value="BOLETA 7" readonly="readonly" style="text-align:center" ></span>
               </div>

               <br>

<fieldset class="fields2">
      
        <label>Recibido</label>
      
            <input type="radio" name="recibido" value="No" checked> No 
            <input type="radio" name="recibido" value="Si"> Si 
            
</fieldset> <br>

<fieldset class="fields2">
      
        <label>Copia</label>
      
            <input type="radio" name="copia" value="No" checked> No 
            <input type="radio" name="copia" value="Si"> Si 
            
</fieldset> <br>

            <p><label>
            <input type="file" name="file">
            </label></p>


<fieldset class="fields2">
      
        <label>Validado</label>
      
            <input type="radio" name="validado" value="No" checked> No 
            <input type="radio" name="validado" value="Si"> Si 
            
</fieldset> <br>

        <div class="input-group">
                        <span class="input-group-addon">Fecha de recepción</span>
                  <input type="text" class="form-control" name="recepcion" value="<?php echo date("Y/m/d"); ?>" size="10" >
        </div><br>


     <div class="input-group ">
                                <span class="input-group-addon">Observaciones</span>
                                <textarea type="textarea" rows="3" class="form-control"  placeholder="" name="observaciones" value="">
                                </textarea>
                            </div><br>



      </div>

      <div class="modal-footer">
      <button type="submit" class="btn btn-success pull-right">Enviar</button>
      </div>
      </form>
      
    </div>
  </div>
</div>
                    </div>
                    </div>
                    </div>

                </div>

<!--DOCUMENTOS DE OCTAVO CUATRIMESTRE-->

            <div role="tabpanel" class="tab-pane" id="octavoCuatri">
            
               <br>
                    <div class="col-md-4">
                        <div id="sidebar">
                            <div class="well">
                      

           <div class="container">

  <div class="row">
          
        </div>
  
</div>    

      <div class="contenedor-modal">
 <a href="" data-target="#miModal35" data-toggle="modal"><button type="button" class="btn btn-primary btn-lg btn-block">Inscripción 8</button></a>
</div>


<div class="modal fade" id="miModal35" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Documentos</h4>
      </div>

<form method="POST" action="{{ url('/documentos') }}" enctype="multipart/form-data">
 {{csrf_field()}}

      <div class="modal-body">
      <input type="hidden" value="{{$alum->id}}" name="idAlumno">
            <div class="input-group ">
                  
                 <span class="input-group-addon"> <input type="textarea" rows="3" class="form-control" name="descripcion"
                   value="INSCRIPCIÓN 8" readonly="readonly" style="text-align:center" ></span>
               </div>

               <br>

<fieldset class="fields2">
      
        <label>Recibido</label>
      
            <input type="radio" name="recibido" value="No" checked> No 
            <input type="radio" name="recibido" value="Si"> Si 
            
</fieldset> <br>

<fieldset class="fields2">
      
        <label>Copia</label>
      
            <input type="radio" name="copia" value="No" checked> No 
            <input type="radio" name="copia" value="Si"> Si 
            
</fieldset> <br>

            <p><label>
            <input type="file" name="file">
            </label></p>


<fieldset class="fields2">
      
        <label>Validado</label>
      
            <input type="radio" name="validado" value="No" checked> No 
            <input type="radio" name="validado" value="Si"> Si 
            
</fieldset> <br>

        <div class="input-group">
                        <span class="input-group-addon">Fecha de recepción</span>
                     <input type="text" class="form-control" name="recepcion" value="<?php echo date("Y/m/d"); ?>" size="10" >
        </div><br>


     <div class="input-group ">
                                <span class="input-group-addon">Observaciones</span>
                                <textarea type="textarea" rows="3" class="form-control"  placeholder="" name="observaciones" value="">
                                </textarea>
                            </div><br>



      </div>

      <div class="modal-footer">
      <button type="submit" class="btn btn-success pull-right">Enviar</button>
      </div>
      </form>
      
    </div>
  </div>
</div>

<br><br>

  <div class="contenedor-modal">
 <a href="" data-target="#miModal36" data-toggle="modal"><button type="button" class="btn btn-primary btn-lg btn-block">Pago 8</button></a>
</div>


<div class="modal fade" id="miModal36" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Documentos</h4>
      </div>

<form method="POST" action="{{ url('/documentos') }}" enctype="multipart/form-data">
 {{csrf_field()}}

      <div class="modal-body">
      <input type="hidden" value="{{$alum->id}}" name="idAlumno">
            <div class="input-group ">
                  
                 <span class="input-group-addon"> <input type="textarea" rows="3" class="form-control" name="descripcion"
                   value="PAGO 8" readonly="readonly" style="text-align:center" ></span>
               </div>

               <br>

<fieldset class="fields2">
      
        <label>Recibido</label>
      
            <input type="radio" name="recibido" value="No" checked> No 
            <input type="radio" name="recibido" value="Si"> Si 
            
</fieldset> <br>

<fieldset class="fields2">
      
        <label>Copia</label>
      
            <input type="radio" name="copia" value="No" checked> No 
            <input type="radio" name="copia" value="Si"> Si 
            
</fieldset> <br>

            <p><label>
            <input type="file" name="file">
            </label></p>


<fieldset class="fields2">
      
        <label>Validado</label>
      
            <input type="radio" name="validado" value="No" checked> No 
            <input type="radio" name="validado" value="Si"> Si 
            
</fieldset> <br>

        <div class="input-group">
                        <span class="input-group-addon">Fecha de recepción</span>
                   <input type="text" class="form-control" name="recepcion" value="<?php echo date("Y/m/d"); ?>" size="10" >
        </div><br>

     <div class="input-group ">
                                <span class="input-group-addon">Observaciones</span>
                                <textarea type="textarea" rows="3" class="form-control"  placeholder="" name="observaciones" value="">
                                </textarea>
                            </div><br>

      </div>

      <div class="modal-footer">
      <button type="submit" class="btn btn-success pull-right">Enviar</button>
      </div>
      </form>
      
    </div>
  </div>
</div>

<br><br>

  <div class="contenedor-modal">
 <a href="" data-target="#miModal37" data-toggle="modal"><button type="button" class="btn btn-primary btn-lg btn-block">Boleta 8</button></a>
</div>


<div class="modal fade" id="miModal37" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Documentos</h4>
      </div>

<form method="POST" action="{{ url('/documentos') }}" enctype="multipart/form-data">
 {{csrf_field()}}

      <div class="modal-body">
      <input type="hidden" value="{{$alum->id}}" name="idAlumno">
            <div class="input-group ">
                  
                 <span class="input-group-addon"> <input type="textarea" rows="3" class="form-control" name="descripcion"
                   value="BOLETA 8" readonly="readonly" style="text-align:center" ></span>
               </div>

               <br>

<fieldset class="fields2">
      
        <label>Recibido</label>
      
            <input type="radio" name="recibido" value="No" checked> No 
            <input type="radio" name="recibido" value="Si"> Si 
            
</fieldset> <br>

<fieldset class="fields2">
      
        <label>Copia</label>
      
            <input type="radio" name="copia" value="No" checked> No 
            <input type="radio" name="copia" value="Si"> Si 
            
</fieldset> <br>

            <p><label>
            <input type="file" name="file">
            </label></p>


<fieldset class="fields2">
      
        <label>Validado</label>
      
            <input type="radio" name="validado" value="No" checked> No 
            <input type="radio" name="validado" value="Si"> Si 
            
</fieldset> <br>

        <div class="input-group">
                        <span class="input-group-addon">Fecha de recepción</span>
                      <input type="text" class="form-control" name="recepcion" value="<?php echo date("Y/m/d"); ?>" size="10" >
        </div><br>


     <div class="input-group ">
                                <span class="input-group-addon">Observaciones</span>
                                <textarea type="textarea" rows="3" class="form-control"  placeholder="" name="observaciones" value="">
                                </textarea>
                            </div><br>



      </div>

      <div class="modal-footer">
      <button type="submit" class="btn btn-success pull-right">Enviar</button>
      </div>
      </form>
      
    </div>
  </div>
</div>
                    </div>
                    </div>
                    </div>

                </div>


<!--DOCUMENTOS DE NOVENO CUATRIMESTRE-->

            <div role="tabpanel" class="tab-pane" id="novenoCuatri">
            
               <br>
                    <div class="col-md-4">
                        <div id="sidebar">
                            <div class="well">
                      

           <div class="container">

  <div class="row">
          
        </div>
  
</div>    

      <div class="contenedor-modal">
 <a href="" data-target="#miModal38" data-toggle="modal"><button type="button" class="btn btn-primary btn-lg btn-block">Inscripción 9</button></a>
</div>


<div class="modal fade" id="miModal38" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Documentos</h4>
      </div>

<form method="POST" action="{{ url('/documentos') }}" enctype="multipart/form-data">
 {{csrf_field()}}

      <div class="modal-body">
      <input type="hidden" value="{{$alum->id}}" name="idAlumno">
            <div class="input-group ">
                  
                 <span class="input-group-addon"> <input type="textarea" rows="3" class="form-control" name="descripcion"
                   value="INSCRIPCIÓN 9" readonly="readonly" style="text-align:center" ></span>
               </div>

               <br>

<fieldset class="fields2">
      
        <label>Recibido</label>
      
            <input type="radio" name="recibido" value="No" checked> No 
            <input type="radio" name="recibido" value="Si"> Si 
            
</fieldset> <br>

<fieldset class="fields2">
      
        <label>Copia</label>
      
            <input type="radio" name="copia" value="No" checked> No 
            <input type="radio" name="copia" value="Si"> Si 
            
</fieldset> <br>

            <p><label>
            <input type="file" name="file">
            </label></p>


<fieldset class="fields2">
      
        <label>Validado</label>
      
            <input type="radio" name="validado" value="No" checked> No 
            <input type="radio" name="validado" value="Si"> Si 
            
</fieldset> <br>

        <div class="input-group">
                        <span class="input-group-addon">Fecha de recepción</span>
                        <input type="text" class="form-control" name="recepcion" value="<?php echo date("Y/m/d"); ?>" size="10" >
        </div><br>


     <div class="input-group ">
                                <span class="input-group-addon">Observaciones</span>
                                <textarea type="textarea" rows="3" class="form-control"  placeholder="" name="observaciones" value="">
                                </textarea>
                            </div><br>

      </div>

      <div class="modal-footer">
      <button type="submit" class="btn btn-success pull-right">Enviar</button>
      </div>
      </form>
      
    </div>
  </div>
</div>

<br><br>

  <div class="contenedor-modal">
 <a href="" data-target="#miModal39" data-toggle="modal"><button type="button" class="btn btn-primary btn-lg btn-block">Pago 9</button></a>
</div>


<div class="modal fade" id="miModal39" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Documentos</h4>
      </div>

<form method="POST" action="{{ url('/documentos') }}" enctype="multipart/form-data">
 {{csrf_field()}}

      <div class="modal-body">
      <input type="hidden" value="{{$alum->id}}" name="idAlumno">
            <div class="input-group ">
                  
                 <span class="input-group-addon"> <input type="textarea" rows="3" class="form-control" name="descripcion"
                   value="PAGO 9" readonly="readonly" style="text-align:center" ></span>
               </div>

               <br>

<fieldset class="fields2">
      
        <label>Recibido</label>
      
            <input type="radio" name="recibido" value="No" checked> No 
            <input type="radio" name="recibido" value="Si"> Si 
            
</fieldset> <br>

<fieldset class="fields2">
      
        <label>Copia</label>
      
            <input type="radio" name="copia" value="No" checked> No 
            <input type="radio" name="copia" value="Si"> Si 
            
</fieldset> <br>

            <p><label>
            <input type="file" name="file">
            </label></p>


<fieldset class="fields2">
      
        <label>Validado</label>
      
            <input type="radio" name="validado" value="No" checked> No 
            <input type="radio" name="validado" value="Si"> Si 
            
</fieldset> <br>

        <div class="input-group">
                        <span class="input-group-addon">Fecha de recepción</span>
                      <input type="text" class="form-control" name="recepcion" value="<?php echo date("Y/m/d"); ?>" size="10" >
        </div><br>


     <div class="input-group ">
                                <span class="input-group-addon">Observaciones</span>
                                <textarea type="textarea" rows="3" class="form-control"  placeholder="" name="observaciones" value="">
                                </textarea>
                            </div><br>

      </div>

      <div class="modal-footer">
      <button type="submit" class="btn btn-success pull-right">Enviar</button>
      </div>
      </form>
      
    </div>
  </div>
</div>

<br><br>

  <div class="contenedor-modal">
 <a href="" data-target="#miModal40" data-toggle="modal"><button type="button" class="btn btn-primary btn-lg btn-block">Boleta 9</button></a>
</div>


<div class="modal fade" id="miModal40" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Documentos</h4>
      </div>

<form method="POST" action="{{ url('/documentos') }}" enctype="multipart/form-data">
 {{csrf_field()}}

      <div class="modal-body">
      <input type="hidden" value="{{$alum->id}}" name="idAlumno">
            <div class="input-group ">
                  
                 <span class="input-group-addon"> <input type="textarea" rows="3" class="form-control" name="descripcion"
                   value="BOLETA 9" readonly="readonly" style="text-align:center" ></span>
               </div>

               <br>

<fieldset class="fields2">
      
        <label>Recibido</label>
      
            <input type="radio" name="recibido" value="No" checked> No 
            <input type="radio" name="recibido" value="Si"> Si 
            
</fieldset> <br>

<fieldset class="fields2">
      
        <label>Copia</label>
      
            <input type="radio" name="copia" value="No" checked> No 
            <input type="radio" name="copia" value="Si"> Si 
            
</fieldset> <br>

            <p><label>
            <input type="file" name="file">
            </label></p>


<fieldset class="fields2">
      
        <label>Validado</label>
      
            <input type="radio" name="validado" value="No" checked> No 
            <input type="radio" name="validado" value="Si"> Si 
            
</fieldset> <br>

        <div class="input-group">
                        <span class="input-group-addon">Fecha de recepción</span>
                       <input type="text" class="form-control" name="recepcion" value="<?php echo date("Y/m/d"); ?>" size="10" >
        </div><br>

     <div class="input-group ">
                                <span class="input-group-addon">Observaciones</span>
                                <textarea type="textarea" rows="3" class="form-control"  placeholder="" name="observaciones" value="">
                                </textarea>
                            </div><br>

      </div>

      <div class="modal-footer">
      <button type="submit" class="btn btn-success pull-right">Enviar</button>
      </div>
      </form>
      
    </div>
  </div>
</div>
                    </div>
                    </div>
                    </div>

                </div>


<!--DOCUMENTOS DE EGRESADO IT-->

            <div role="tabpanel" class="tab-pane" id="egresadoIt">
            
               <br>
                    <div class="col-md-4">
                        <div id="sidebar">
                            <div class="well">
                      

           <div class="container">

  <div class="row">
          
        </div>
  
</div>    

      <div class="contenedor-modal">
 <a href="" data-target="#miModal41" data-toggle="modal"><button type="button" class="btn btn-primary btn-lg btn-block">Pago de titulación</button></a>
</div>


<div class="modal fade" id="miModal41" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Documentos</h4>
      </div>

<form method="POST" action="{{ url('/documentos') }}" enctype="multipart/form-data">
 {{csrf_field()}}

      <div class="modal-body">
      <input type="hidden" value="{{$alum->id}}" name="idAlumno">
            <div class="input-group ">
                  
                 <span class="input-group-addon"> <input type="textarea" rows="3" class="form-control" name="descripcion"
                   value="PAGO DE TITULACIÓN IT" readonly="readonly" style="text-align:center" ></span>
               </div>

               <br>

<fieldset class="fields2">
      
        <label>Recibido</label>
      
            <input type="radio" name="recibido" value="No" checked> No 
            <input type="radio" name="recibido" value="Si"> Si 
            
</fieldset> <br>

<fieldset class="fields2">
      
        <label>Copia</label>
      
            <input type="radio" name="copia" value="No" checked> No 
            <input type="radio" name="copia" value="Si"> Si 
            
</fieldset> <br>

            <p><label>
            <input type="file" name="file">
            </label></p>


<fieldset class="fields2">
      
        <label>Validado</label>
      
            <input type="radio" name="validado" value="No" checked> No 
            <input type="radio" name="validado" value="Si"> Si 
            
</fieldset> <br>

        <div class="input-group">
                        <span class="input-group-addon">Fecha de recepción</span>
                       <input type="text" class="form-control" name="recepcion" value="<?php echo date("Y/m/d"); ?>" size="10" >
        </div><br>


     <div class="input-group ">
                                <span class="input-group-addon">Observaciones</span>
                                <textarea type="textarea" rows="3" class="form-control"  placeholder="" name="observaciones" value="">
                                </textarea>
                            </div><br>

      </div>

      <div class="modal-footer">
      <button type="submit" class="btn btn-success pull-right">Enviar</button>
      </div>
      </form>
      
    </div>
  </div>
</div>

<br><br>

  <div class="contenedor-modal">
 <a href="" data-target="#miModal42" data-toggle="modal"><button type="button" class="btn btn-primary btn-lg btn-block">Carta de liberación</button></a>
</div>


<div class="modal fade" id="miModal42" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Documentos</h4>
      </div>

<form method="POST" action="{{ url('/documentos') }}" enctype="multipart/form-data">
 {{csrf_field()}}

      <div class="modal-body">
      <input type="hidden" value="{{$alum->id}}" name="idAlumno">
            <div class="input-group ">
                  
                 <span class="input-group-addon"> <input type="textarea" rows="3" class="form-control" name="descripcion"
                   value="CARTA DE LIBERACIÓN IT" readonly="readonly" style="text-align:center" ></span>
               </div>

               <br>

<fieldset class="fields2">
      
        <label>Recibido</label>
      
            <input type="radio" name="recibido" value="No" checked> No 
            <input type="radio" name="recibido" value="Si"> Si 
            
</fieldset> <br>

<fieldset class="fields2">
      
        <label>Copia</label>
      
            <input type="radio" name="copia" value="No" checked> No 
            <input type="radio" name="copia" value="Si"> Si 
            
</fieldset> <br>

            <p><label>
            <input type="file" name="file">
            </label></p>


<fieldset class="fields2">
      
        <label>Validado</label>
      
            <input type="radio" name="validado" value="No" checked> No 
            <input type="radio" name="validado" value="Si"> Si 
            
</fieldset> <br>

        <div class="input-group">
                        <span class="input-group-addon">Fecha de recepción</span>
                      <input type="text" class="form-control" name="recepcion" value="<?php echo date("Y/m/d"); ?>" size="10" >
        </div><br>

 <center> <h4 class="modal-title" id="myModalLabel">Prestamo de documentos</h4> </center> <br>

        <div class="input-group">
                        <span class="input-group-addon">Fecha de prestamo</span>
                        <input type="date" class="form-control" placeholder="" name="prestamo" value="">
        </div><br>



<fieldset class="fields2">
      
        <label>Devolución</label>
      
            <input type="radio" name="devolucion" value="No" checked> No 
            <input type="radio" name="devolucion" value="Si"> Si 
            
</fieldset> <br>


        <div class="input-group">
                        <span class="input-group-addon">Fecha de devolución</span>
                        <input type="date" class="form-control" placeholder="" name="fechaDev" value="">
        </div><br>

     <div class="input-group ">
                                <span class="input-group-addon">Observaciones</span>
                                <textarea type="textarea" rows="3" class="form-control"  placeholder="" name="observaciones" value="">
                                </textarea>
                            </div><br>



      </div>

      <div class="modal-footer">
      <button type="submit" class="btn btn-success pull-right">Enviar</button>
      </div>
      </form>
      
    </div>
  </div>
</div>

<br><br>

 <div class="contenedor-modal">
 <a href="" data-target="#miModal43" data-toggle="modal"><button type="button" class="btn btn-primary btn-lg btn-block">Autorización impresión</button></a>
</div>


<div class="modal fade" id="miModal43" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Documentos</h4>
      </div>

<form method="POST" action="{{ url('/documentos') }}" enctype="multipart/form-data">
 {{csrf_field()}}

      <div class="modal-body">
      <input type="hidden" value="{{$alum->id}}" name="idAlumno">
            <div class="input-group ">
                  
                 <span class="input-group-addon"> <input type="textarea" rows="3" class="form-control" name="descripcion"
                   value="AUTORIZACIÓN IMPRESIÓN IT" readonly="readonly" style="text-align:center" ></span>
               </div>

               <br>

<fieldset class="fields2">
      
        <label>Recibido</label>
      
            <input type="radio" name="recibido" value="No" checked> No 
            <input type="radio" name="recibido" value="Si"> Si 
            
</fieldset> <br>

<fieldset class="fields2">
      
        <label>Copia</label>
      
            <input type="radio" name="copia" value="No" checked> No 
            <input type="radio" name="copia" value="Si"> Si 
            
</fieldset> <br>

            <p><label>
            <input type="file" name="file">
            </label></p>


<fieldset class="fields2">
      
        <label>Validado</label>
      
            <input type="radio" name="validado" value="No" checked> No 
            <input type="radio" name="validado" value="Si"> Si 
            
</fieldset> <br>

        <div class="input-group">
                        <span class="input-group-addon">Fecha de recepción</span>
                      <input type="text" class="form-control" name="recepcion" value="<?php echo date("Y/m/d"); ?>" size="10" >
        </div><br>

 <center> <h4 class="modal-title" id="myModalLabel">Prestamo de documentos</h4> </center> <br>

        <div class="input-group">
                        <span class="input-group-addon">Fecha de prestamo</span>
                        <input type="date" class="form-control" placeholder="" name="prestamo" value="">
        </div><br>



<fieldset class="fields2">
      
        <label>Devolución</label>
      
            <input type="radio" name="devolucion" value="No" checked> No 
            <input type="radio" name="devolucion" value="Si"> Si 
            
</fieldset> <br>


        <div class="input-group">
                        <span class="input-group-addon">Fecha de devolución</span>
                        <input type="date" class="form-control" placeholder="" name="fechaDev" value="">
        </div><br>

     <div class="input-group ">
                                <span class="input-group-addon">Observaciones</span>
                                <textarea type="textarea" rows="3" class="form-control"  placeholder="" name="observaciones" value="">
                                </textarea>
                            </div><br>



      </div>

      <div class="modal-footer">
      <button type="submit" class="btn btn-success pull-right">Enviar</button>
      </div>
      </form>
      
    </div>
  </div>
</div>


<br><br>

 <div class="contenedor-modal">
 <a href="" data-target="#cedulaIt" data-toggle="modal"><button type="button" class="btn btn-primary btn-lg btn-block">Cédula</button></a>
</div>


<div class="modal fade" id="cedulaIt" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Documentos</h4>
      </div>

<form method="POST" action="{{ url('/documentos') }}" enctype="multipart/form-data">
 {{csrf_field()}}

      <div class="modal-body">
      <input type="hidden" value="{{$alum->id}}" name="idAlumno">
            <div class="input-group ">
                  
                 <span class="input-group-addon"> <input type="textarea" rows="3" class="form-control" name="descripcion"
                   value="CÉDULA IT" readonly="readonly" style="text-align:center" ></span>
               </div>

               <br>

<fieldset class="fields2">
      
        <label>Recibido</label>
      
            <input type="radio" name="recibido" value="No" checked> No 
            <input type="radio" name="recibido" value="Si"> Si 
            
</fieldset> <br>

<fieldset class="fields2">
      
        <label>Copia</label>
      
            <input type="radio" name="copia" value="No" checked> No 
            <input type="radio" name="copia" value="Si"> Si 
            
</fieldset> <br>

            <p><label>
            <input type="file" name="file">
            </label></p>


<fieldset class="fields2">
      
        <label>Validado</label>
      
            <input type="radio" name="validado" value="No" checked> No 
            <input type="radio" name="validado" value="Si"> Si 
            
</fieldset> <br>

        <div class="input-group">
                        <span class="input-group-addon">Fecha de recepción</span>
                      <input type="text" class="form-control" name="recepcion" value="<?php echo date("Y/m/d"); ?>" size="10" >
        </div><br>

 <center> <h4 class="modal-title" id="myModalLabel">Prestamo de documentos</h4> </center> <br>

        <div class="input-group">
                        <span class="input-group-addon">Fecha de prestamo</span>
                        <input type="date" class="form-control" placeholder="" name="prestamo" value="">
        </div><br>



<fieldset class="fields2">
      
        <label>Devolución</label>
      
            <input type="radio" name="devolucion" value="No" checked> No 
            <input type="radio" name="devolucion" value="Si"> Si 
            
</fieldset> <br>


        <div class="input-group">
                        <span class="input-group-addon">Fecha de devolución</span>
                        <input type="date" class="form-control" placeholder="" name="fechaDev" value="">
        </div><br>

     <div class="input-group ">
                                <span class="input-group-addon">Observaciones</span>
                                <textarea type="textarea" rows="3" class="form-control"  placeholder="" name="observaciones" value="">
                                </textarea>
                            </div><br>



      </div>

      <div class="modal-footer">
      <button type="submit" class="btn btn-success pull-right">Enviar</button>
      </div>
      </form>
      
    </div>
  </div>
</div>


<br><br>

 <div class="contenedor-modal">
 <a href="" data-target="#tituloIt" data-toggle="modal"><button type="button" class="btn btn-primary btn-lg btn-block">Título</button></a>
</div>


<div class="modal fade" id="tituloIt" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Documentos</h4>
      </div>

<form method="POST" action="{{ url('/documentos') }}" enctype="multipart/form-data">
 {{csrf_field()}}

      <div class="modal-body">
      <input type="hidden" value="{{$alum->id}}" name="idAlumno">
            <div class="input-group ">
                  
                 <span class="input-group-addon"> <input type="textarea" rows="3" class="form-control" name="descripcion"
                   value="TÍTULO IT" readonly="readonly" style="text-align:center" ></span>
               </div>

               <br>

<fieldset class="fields2">
      
        <label>Recibido</label>
      
            <input type="radio" name="recibido" value="No" checked> No 
            <input type="radio" name="recibido" value="Si"> Si 
            
</fieldset> <br>

<fieldset class="fields2">
      
        <label>Copia</label>
      
            <input type="radio" name="copia" value="No" checked> No 
            <input type="radio" name="copia" value="Si"> Si 
            
</fieldset> <br>

            <p><label>
            <input type="file" name="file">
            </label></p>


<fieldset class="fields2">
      
        <label>Validado</label>
      
            <input type="radio" name="validado" value="No" checked> No 
            <input type="radio" name="validado" value="Si"> Si 
            
</fieldset> <br>

        <div class="input-group">
                        <span class="input-group-addon">Fecha de recepción</span>
                      <input type="text" class="form-control" name="recepcion" value="<?php echo date("Y/m/d"); ?>" size="10" >
        </div><br>

 <center> <h4 class="modal-title" id="myModalLabel">Prestamo de documentos</h4> </center> <br>

        <div class="input-group">
                        <span class="input-group-addon">Fecha de prestamo</span>
                        <input type="date" class="form-control" placeholder="" name="prestamo" value="">
        </div><br>



<fieldset class="fields2">
      
        <label>Devolución</label>
      
            <input type="radio" name="devolucion" value="No" checked> No 
            <input type="radio" name="devolucion" value="Si"> Si 
            
</fieldset> <br>


        <div class="input-group">
                        <span class="input-group-addon">Fecha de devolución</span>
                        <input type="date" class="form-control" placeholder="" name="fechaDev" value="">
        </div><br>

     <div class="input-group ">
                                <span class="input-group-addon">Observaciones</span>
                                <textarea type="textarea" rows="3" class="form-control"  placeholder="" name="observaciones" value="">
                                </textarea>
                            </div><br>



      </div>

      <div class="modal-footer">
      <button type="submit" class="btn btn-success pull-right">Enviar</button>
      </div>
      </form>
      
    </div>
  </div>
</div>


<br><br>

 <div class="contenedor-modal">
 <a href="" data-target="#certificadoIt" data-toggle="modal"><button type="button" class="btn btn-primary btn-lg btn-block">Certificado IT</button></a>
</div>


<div class="modal fade" id="certificadoIt" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Documentos</h4>
      </div>

<form method="POST" action="{{ url('/documentos') }}" enctype="multipart/form-data">
 {{csrf_field()}}

      <div class="modal-body">
      <input type="hidden" value="{{$alum->id}}" name="idAlumno">
            <div class="input-group ">
                  
                 <span class="input-group-addon"> <input type="textarea" rows="3" class="form-control" name="descripcion"
                   value="CERTIFICADO IT" readonly="readonly" style="text-align:center" ></span>
               </div>

               <br>

<fieldset class="fields2">
      
        <label>Recibido</label>
      
            <input type="radio" name="recibido" value="No" checked> No 
            <input type="radio" name="recibido" value="Si"> Si 
            
</fieldset> <br>

<fieldset class="fields2">
      
        <label>Copia</label>
      
            <input type="radio" name="copia" value="No" checked> No 
            <input type="radio" name="copia" value="Si"> Si 
            
</fieldset> <br>

            <p><label>
            <input type="file" name="file">
            </label></p>


<fieldset class="fields2">
      
        <label>Validado</label>
      
            <input type="radio" name="validado" value="No" checked> No 
            <input type="radio" name="validado" value="Si"> Si 
            
</fieldset> <br>

        <div class="input-group">
                        <span class="input-group-addon">Fecha de recepción</span>
                      <input type="text" class="form-control" name="recepcion" value="<?php echo date("Y/m/d"); ?>" size="10" >
        </div><br>

 <center> <h4 class="modal-title" id="myModalLabel">Prestamo de documentos</h4> </center> <br>

        <div class="input-group">
                        <span class="input-group-addon">Fecha de prestamo</span>
                        <input type="date" class="form-control" placeholder="" name="prestamo" value="">
        </div><br>



<fieldset class="fields2">
      
        <label>Devolución</label>
      
            <input type="radio" name="devolucion" value="No" checked> No 
            <input type="radio" name="devolucion" value="Si"> Si 
            
</fieldset> <br>


        <div class="input-group">
                        <span class="input-group-addon">Fecha de devolución</span>
                        <input type="date" class="form-control" placeholder="" name="fechaDev" value="">
        </div><br>

     <div class="input-group ">
                                <span class="input-group-addon">Observaciones</span>
                                <textarea type="textarea" rows="3" class="form-control"  placeholder="" name="observaciones" value="">
                                </textarea>
                            </div><br>



      </div>

      <div class="modal-footer">
      <button type="submit" class="btn btn-success pull-right">Enviar</button>
      </div>
      </form>
      
    </div>
  </div>
</div>

<br><br>

 <div class="contenedor-modal">
 <a href="" data-target="#constanciaSsIt" data-toggle="modal"><button type="button" class="btn btn-primary btn-lg btn-block">Constancia SS</button></a>
</div>


<div class="modal fade" id="constanciaSsIt" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Documentos</h4>
      </div>

<form method="POST" action="{{ url('/documentos') }}" enctype="multipart/form-data">
 {{csrf_field()}}

      <div class="modal-body">
      <input type="hidden" value="{{$alum->id}}" name="idAlumno">
            <div class="input-group ">
                  
                 <span class="input-group-addon"> <input type="textarea" rows="3" class="form-control" name="descripcion"
                   value="CONSTANCIA SS - IT" readonly="readonly" style="text-align:center" ></span>
               </div>

               <br>

<fieldset class="fields2">
      
        <label>Recibido</label>
      
            <input type="radio" name="recibido" value="No" checked> No 
            <input type="radio" name="recibido" value="Si"> Si 
            
</fieldset> <br>

<fieldset class="fields2">
      
        <label>Copia</label>
      
            <input type="radio" name="copia" value="No" checked> No 
            <input type="radio" name="copia" value="Si"> Si 
            
</fieldset> <br>

            <p><label>
            <input type="file" name="file">
            </label></p>


<fieldset class="fields2">
      
        <label>Validado</label>
      
            <input type="radio" name="validado" value="No" checked> No 
            <input type="radio" name="validado" value="Si"> Si 
            
</fieldset> <br>

        <div class="input-group">
                        <span class="input-group-addon">Fecha de recepción</span>
                      <input type="text" class="form-control" name="recepcion" value="<?php echo date("Y/m/d"); ?>" size="10" >
        </div><br>

 <center> <h4 class="modal-title" id="myModalLabel">Prestamo de documentos</h4> </center> <br>

        <div class="input-group">
                        <span class="input-group-addon">Fecha de prestamo</span>
                        <input type="date" class="form-control" placeholder="" name="prestamo" value="">
        </div><br>



<fieldset class="fields2">
      
        <label>Devolución</label>
      
            <input type="radio" name="devolucion" value="No" checked> No 
            <input type="radio" name="devolucion" value="Si"> Si 
            
</fieldset> <br>


        <div class="input-group">
                        <span class="input-group-addon">Fecha de devolución</span>
                        <input type="date" class="form-control" placeholder="" name="fechaDev" value="">
        </div><br>

     <div class="input-group ">
                                <span class="input-group-addon">Observaciones</span>
                                <textarea type="textarea" rows="3" class="form-control"  placeholder="" name="observaciones" value="">
                                </textarea>
                            </div><br>



      </div>

      <div class="modal-footer">
      <button type="submit" class="btn btn-success pull-right">Enviar</button>
      </div>
      </form>
      
    </div>
  </div>
</div>

<br><br>

 <div class="contenedor-modal">
 <a href="" data-target="#excencionIt" data-toggle="modal"><button type="button" class="btn btn-primary btn-lg btn-block">Carta excención de examen</button></a>
</div>


<div class="modal fade" id="excencionIt" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Documentos</h4>
      </div>

<form method="POST" action="{{ url('/documentos') }}" enctype="multipart/form-data">
 {{csrf_field()}}

      <div class="modal-body">
      <input type="hidden" value="{{$alum->id}}" name="idAlumno">
            <div class="input-group ">
                  
                 <span class="input-group-addon"> <input type="textarea" rows="3" class="form-control" name="descripcion"
                   value="CARTA EXCENCIÓN DE EXAMEN IT" readonly="readonly" style="text-align:center" ></span>
               </div>

               <br>

<fieldset class="fields2">
      
        <label>Recibido</label>
      
            <input type="radio" name="recibido" value="No" checked> No 
            <input type="radio" name="recibido" value="Si"> Si 
            
</fieldset> <br>

<fieldset class="fields2">
      
        <label>Copia</label>
      
            <input type="radio" name="copia" value="No" checked> No 
            <input type="radio" name="copia" value="Si"> Si 
            
</fieldset> <br>

            <p><label>
            <input type="file" name="file">
            </label></p>


<fieldset class="fields2">
      
        <label>Validado</label>
      
            <input type="radio" name="validado" value="No" checked> No 
            <input type="radio" name="validado" value="Si"> Si 
            
</fieldset> <br>

        <div class="input-group">
                        <span class="input-group-addon">Fecha de recepción</span>
                      <input type="text" class="form-control" name="recepcion" value="<?php echo date("Y/m/d"); ?>" size="10" >
        </div><br>

 <center> <h4 class="modal-title" id="myModalLabel">Prestamo de documentos</h4> </center> <br>

        <div class="input-group">
                        <span class="input-group-addon">Fecha de prestamo</span>
                        <input type="date" class="form-control" placeholder="" name="prestamo" value="">
        </div><br>



<fieldset class="fields2">
      
        <label>Devolución</label>
      
            <input type="radio" name="devolucion" value="No" checked> No 
            <input type="radio" name="devolucion" value="Si"> Si 
            
</fieldset> <br>


        <div class="input-group">
                        <span class="input-group-addon">Fecha de devolución</span>
                        <input type="date" class="form-control" placeholder="" name="fechaDev" value="">
        </div><br>

     <div class="input-group ">
                                <span class="input-group-addon">Observaciones</span>
                                <textarea type="textarea" rows="3" class="form-control"  placeholder="" name="observaciones" value="">
                                </textarea>
                            </div><br>



      </div>

      <div class="modal-footer">
      <button type="submit" class="btn btn-success pull-right">Enviar</button>
      </div>
      </form>
      
    </div>
  </div>
</div>
                    </div>
                    </div>
                    </div>

                </div>

      <div role="tabpanel" class="tab-pane" id="entregados">
             
               <br>
                    <div class="col-md-6">
                        <div id="sidebar">
                            <div class="well">
                                <legend>Documentos entregados</legend> 
                                <div class="form-group">
                                    <input type="hidden" class="form-control" id="entregados"  name="txtid" value="">
                                </div>

                              
                          
                           

                           
   <?php   foreach ($documentos as $documento): ?>
    <p>
    <a href="{{url ('/')}} /storage/{{$documento['nombre']}}" target="_blank"> <?= $documento['descripcion']?></a> 
      
       @if($documento->descripcion)<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
       <a href="" data-target="#modal-editdocumento-{{$documento['id']}}" data-toggle="modal"><button type="button" class="btn btn-primary btn-sm">Editar</button></a>

       <div class="modal fade" id="modal-editdocumento-{{$documento['id']}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Documentos</h4>
      </div>

<form method="POST" action="{{ url('/') }}/documentos/edit/{{$documento['id']}}" enctype="multipart/form-data">
 {{csrf_field()}}

      <div class="modal-body">
     

      <div class="input-group ">
                  
                 <span class="input-group-addon"> <input type="textarea" rows="3" class="form-control" name="descripcion"
                   value="{{ $documento->descripcion }}" readonly="readonly" style="text-align:center" ></span>
               </div>
               <br>

<fieldset class="fields2">
        
        <label>Recibido</label>

       
              @if($documento->recibido=='No')
            <input type="radio" name="recibido" value="No" checked> No 
            <input type="radio" name="recibido" value="Si"> Si 
             @elseif($documento->recibido=='Si')
            <input type="radio" name="recibido" value="No"> No 
            <input type="radio" name="recibido" value="Si" checked> Si 
                      @endif
</fieldset> <br>

       
<fieldset class="fields2">
      
        <label>Copia</label>
          
              @if($documento->copia=='No')
            <input type="radio" name="copia" value="No" checked> No 
            <input type="radio" name="copia" value="Si"> Si 
             @elseif($documento->copia=='Si')
             <input type="radio" name="copia" value="No"> No 
            <input type="radio" name="copia" value="Si" checked> Si 
                      @endif
          
</fieldset> <br>

            <p><label>
            <input type="file" name="file">
            </label></p>


<fieldset class="fields2">
      
        <label>Validado</label>

          @if($documento->validado=='No')
            <input type="radio" name="validado" value="No" checked> No 
            <input type="radio" name="validado" value="Si"> Si 
             @elseif($documento->validado=='Si')
            <input type="radio" name="validado" value="No"> No 
            <input type="radio" name="validado" value="Si" checked> Si 
              @endif
</fieldset> <br>

        <div class="input-group">
                        <span class="input-group-addon">Fecha de recepción</span>
                        <input type="date" class="form-control" placeholder="" name="recepcion" value="{{ $documento->fecha_recepcion }}">
        </div><br>

 <center> <h4 class="modal-title" id="myModalLabel">Prestamo de documentos</h4> </center> <br>

        <div class="input-group">
                        <span class="input-group-addon">Fecha de prestamo</span>
                        <input type="date" class="form-control" placeholder="" name="prestamo" value="{{ $documento->fecha_prestamo }}">
        </div><br>



<fieldset class="fields2">
      
        <label>Devolución</label>
          @if($documento->devolucion=='No')
            <input type="radio" name="devolucion" value="No" checked> No 
            <input type="radio" name="devolucion" value="Si"> Si 
             @elseif($documento->devolucion=='Si')
            <input type="radio" name="devolucion" value="No"> No 
            <input type="radio" name="devolucion" value="Si" checked> Si 
              @endif
</fieldset> <br>


        <div class="input-group">
                        <span class="input-group-addon">Fecha de devolución</span>
                        <input type="date" class="form-control" placeholder="" name="fechaDev" value="{{ $documento->fecha_devolucion }}">
        </div><br>

     <div class="input-group ">
              <span class="input-group-addon">Observaciones</span>
               <input type="text" rows="3" class="form-control"  placeholder="" name="observaciones" value="{{ $documento->observaciones }}">
               
                            </div><br>



      </div>

      <div class="modal-footer">
      <button type="submit" class="btn btn-success pull-right">Enviar</button>
      </div>
      </form>
      
    </div>
  </div>
</div>



       
      @endif

    </p>
  <?php endforeach ?>
                          
               

                            </div>
                        </div>
                    </div>

                   
            
            </div>

            </div>
          
            </div>
            </div>
            </div>
                              




           


                            </div>
                        </div>
                    </div>

                   </div>
            
           
@endsection