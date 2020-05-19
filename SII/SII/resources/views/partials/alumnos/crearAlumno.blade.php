 @extends('layouts.admin')

@section('principal')


<div id="page-wrapper">
<br>
 


  <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading ">
                            <center><h4>Crear alumno</h4></center> 
                        </div>
                    </div>
            </div> 
        </div>

<div class="tab-content">
    <div class="col-md-12 contenedor-datos">
        <div role="tabpanel">
          <ul class="nav nav-pills" role="tablist">
            <li role="presentation" class="active"><a href="#principal" aria-controls="principal" data-toggle="tab" role="tab">Ingreso</a></li>
            <li role="presentation"><a href="#datos" aria-controls="datos" data-toggle="tab" role="tab">Datos Generales</a></li>
            <li role="presentation"><a href="#domicilio" aria-controls="domicilio" data-toggle="tab" role="tab">Domicilio y Contacto</a></li>
            <li role="presentation"><a href="#escuela" aria-controls="escuela" data-toggle="tab" role="tab">Escuela de Procedencia</a></li>
            <li role="presentation"><a href="#beca" aria-controls="beca" data-toggle="tab" role="tab">Beca</a></li>
            <li role="presentation"><a href="#estadisticos" aria-controls="estadisticos" data-toggle="tab" role="tab">Estadisticos</a></li>
            
            <!--en proceso de estadias>
            <li role="presentation"><a href="#estadisticos" aria-controls="estadisticos" data-toggle="tab" role="tab">Evaluacion Docente</a></li-->
              
          </ul>




<form role="form-signin" class="form-horizontal" id="" method="POST" > 
 {{csrf_field()}} 
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active"  id="principal">
            <center>
             
               <br>
               
                    <div class="col-md-9">
                        <div id="sidebar">
                            <div class="well">
                                <legend>Datos de ingreso</legend>
                                <P><FONT COLOR="ff0000">* Campo obligatorio</FONT></P>
                                <div class="form-group">
                                    <input type="hidden" class="form-control" id="NUMEROALUMNO"  name="txtid" value="">
                                </div>

                                 <div class="input-group-addon">
                        <span class=""><b>Lugar de examen</b></span>
                       <br><br>
                        <span class=""><b>Fecha de examen</b></span>
                    </div><br>
                    
                    <div class="input-group">
                        <span class="input-group-addon">Folio<B></B><FONT COLOR="ff0000"> *</FONT></B></span>
                        <input type="text" class="form-control" placeholder="" name="folioAlumn" value="" >
                    </div><br>
                    
                    <div class="input-group">
                        <span class="input-group-addon">Matrícula</FONT></B></span>
                        <input type="text" class="form-control" placeholder="" name="matricula" value="">
                    </div><br>

                              <div class="input-group">
                                <span class="input-group-addon">Status</B><FONT COLOR="ff0000"> *</FONT></B></span>
                                <select class="form-control" name="status" value="">
                                    <option value="">Seleciona</option>
                                    <option value="11">Aspirante</option>
                                    <option value="1">Activo</option>
                                    <option value="13">Regular</option>
                                    <option value="14">Reingreso</option>
                                    <option value="9">Condicionado Acádemicamente</option>
                                    <option value="10">Condicionado Administrativamente</option>

                                </select>   
                            </div><br> 


                              <div class="form-group {{$errors->has('Carrera')?'has-error':''}}" >
                                <span for="Carrera" class="input-group-addon">Carrera</B><FONT COLOR="ff0000"> *</FONT></B></span>
                                      <select name="Carrera" class="form-control" name="carreraAlumn" required>
                                        @foreach(App\Models\Niveles::all() as $registro)
                                            <option value="{!!$registro->Identificador!!}">{{$registro->Nivel. ' en '.$registro->Descripcion_Nivel}}</option>
                                            @endforeach
                                  </select>
                                </select>  
                            </div><br>
                            
                             <div class="input-group">
                        <span class="input-group-addon">Fecha de creación</B><FONT COLOR="ff0000"> *</FONT></B></span>
                        <input type="date" class="form-control" placeholder="" name="fechaCrea" value="{{OLD('scheduled_date',date('Y-m-d'))}}">
                    </div><br>

                    <div class="input-group">
                        <span class="input-group-addon">Fecha de actualización</span>
                        <input type="date" class="form-control" placeholder="" name="fechaAct" value="">
                    </div><br>

                    <div class="input-group">
                        <span class="input-group-addon">Fecha de registro</span>
                        <input type="date" class="form-control" placeholder="" name="fechaReg" value="{{OLD('scheduled_date',date('Y-m-d'))}}">
                    </div><br>

                    <div class="input-group"> 
                        <span class="input-group-addon">Fecha de ingreso</span>
                        <input type="date" class="form-control" placeholder="" name="fechaIng" value="">
                    </div><br>

                    <div class="input-group">
                        <span class="input-group-addon">Fecha de egreso</span>
                        <input type="date" class="form-control" placeholder="" name="fechaEg" value="">
                    </div><br>

                            <div class="input-group ">
                                <span class="input-group-addon">Notas (descripción)</span>
                                <textarea type="textarea" rows="3" class="form-control"  placeholder="" name="notas" value="">
                                </textarea>
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
                              <legend>Datos Generales</legend><br>
                              <P><FONT COLOR="ff0000">* Campo obligatorio</FONT></P>
                    <div class="input-group">
                        <span class="input-group-addon">Primer Apellido</B><FONT COLOR="ff0000"> *</FONT></B></span>
                        <input type="text" class="form-control" placeholder="Primer apellido" onkeyup="javascript:this.value=this.value.toUpperCase();"  name="paternoAlumn" value="">
                    </div><br>

                     <div class="input-group">
                        <span class="input-group-addon">Segundo Apellido</B><FONT COLOR="ff0000"> *</FONT></B></span>
                        <input type="text" class="form-control" placeholder="Segundo apellido" onkeyup="javascript:this.value=this.value.toUpperCase();"  name="maternoAlumn" value="">
                    </div><br>

                    <div class="input-group">
                        <span class="input-group-addon">Nombres</B><FONT COLOR="ff0000"> *</FONT></B></span>
                        <input type="text" class="form-control" placeholder="Nombre(s)" onkeyup="javascript:this.value=this.value.toUpperCase();"  name="nombre" value="">
                    </div><br>

                     <div class="input-group">
                                <span class="input-group-addon">Genero</B><FONT COLOR="ff0000"> *</FONT></B></span>
                                <select class="form-control" name="genero" value="">
                                    <option value="">Seleciona</option>
                                    <option value="M">Masculino</option>
                                    <option value="F">Femenino</option>
                                </select>  
                                <span class="input-group-addon">Estado Civil</B><FONT COLOR="ff0000"> *</FONT></B></span>
                                <select class="form-control" name="civilAlumn" value="">
                                    <option value="">Seleciona</option>
                                    <option value="S">Soltero</option>
                                    <option value="C">Casado</option>
                                    <option value="U">Unión Libre</option>
                                    <option value="D">Divorsiado</option>
                                    <option value="V">Viudo</option>
                                </select>  
                            </div><br>

                    <div class="input-group">
                        <span class="input-group-addon">Fecha de nacimiento</B><FONT COLOR="ff0000"> *</FONT></B></span>
                        <input type="date" class="form-control" placeholder="" name="FechaNacAlumn" value="">
                    </div><br>

                      <div class="input-group">
                        <span class="input-group-addon">Edad</span>
                        <input type="number" class="form-control" placeholder="" name="edadAlumn" value="">
                    </div><br>

                    <div class="input-group">
                        <span class="input-group-addon">Lugar de nacimiento</B><FONT COLOR="ff0000"> *</FONT></B></span>
                        <input type="text" class="form-control" placeholder="" name="lugarAlumn" value="">
                    </div><br>

                    <div class="form-group {{ $errors->has('Estado_Nac') ? 'has-error' : ''}}">
                        <span for="Estado_Nac" class="input-group-addon">Estado de nacimiento</B><FONT COLOR="ff0000"> *</FONT></B></span>
                        <select name="Estado_Nac" class="form-control">
                                    <option value="" >Estado</option>
                                                    <option value="Agiascaliente">Aguascalientes</option>
                                                    <option value="Baja California">Baja California</option>
                                                    <option value="Baja California Sur">Baja California Sur</option>
                                                    <option value="Campeche">Campeche</option>
                                                    <option value="Coahuila">Coahuila</option>
                                                    <option value="Colima">Colima</option>
                                                    <option value="Chiapas">Chiapas</option>
                                                    <option value="Chihuahua">Chihuahua</option>
                                                    <option value="Distrito Federal">Distrito Federal</option>
                                                    <option value="Durango">Durango</option>
                                                    <option value="Guanajuato">Guanajuato</option>
                                                    <option value="Guerrero">Guerrero</option>
                                                    <option value="Hidalgo">Hidalgo</option>
                                                    <option value="Jalisco">Jalisco</option>
                                                    <option value="México">México</option>
                                                    <option value="Michoacán">Michoacán</option>
                                                    <option value="Morelos">Morelos</option>
                                                    <option value="Nayarit">Nayarit</option>
                                                    <option value="Nuevo León">Nuevo León</option>
                                                    <option value="Oaxaca">Oaxaca</option>
                                                    <option value="Puebla">Puebla</option>
                                                    <option value="Querétaro">Querétaro</option>
                                                    <option value="Quintana Roo">Quintana Roo</option>
                                                    <option value="San Luis Potosi">San Luis Potosí</option>
                                                    <option value="Sinaloa">Sinaloa</option>
                                                    <option value="Sonora">Sonora</option>
                                                    <option value="Tabasco">Tabasco</option>
                                                    <option value="Tamaulipas">Tamaulipas</option>
                                                    <option value="Tlaxcala">Tlaxcala</option>
                                                    <option value="Veracruz">Veracruz</option>
                                                    <option value="Yucatán">Yucatán</option>
                                                    <option value="Zacatecas">Zacatecas</option>
                                                    <option value="Extranjero">Nacido Extranjero</option>
                                        </select>  
                                {!! $errors->first('Estado_Nac', '<p class="help-block">:message</p>') !!}

                    </div><br>

                    <div class="input-group">
                        <span class="input-group-addon">Municipio de nacimiento</B><FONT COLOR="ff0000"> *</FONT></B></span>
                        <input type="text" class="form-control" placeholder="" name="municipioAlumn" value="">
                    </div><br>
                   
                   <div class="input-group">
                        <span class="input-group-addon">CURP</B><FONT COLOR="ff0000"> *</FONT></B></span>
                                    
            <input type="text" class="form-control" id="curp_input" name="curpAlumn" oninput="validarInput(this)" style="width:100%;" placeholder="Ingrese su CURP" function wordlimit($string, $length = 18,) onkeyup="javascript:this.value=this.value.toUpperCase();" >
            <pre id="resultado_2"  value=""></pre>
        
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
                              <legend>Domicilio y Contacto</legend><br>
                              <P><FONT COLOR="ff0000">* Campo obligatorio</FONT></P>
                    <div class="input-group">
                        <span class="input-group-addon">Domicilio</B><FONT COLOR="ff0000"> *</FONT></B></span>
                        <input type="text" class="form-control" placeholder="" name="domicilioAlumn" value="">
                    </div><br>

                     <div class="input-group">
                        <span class="input-group-addon">Ciudad</B><FONT COLOR="ff0000"> *</FONT></B></span>
                        <input type="text" class="form-control" placeholder="" name="ciudadAlumn" value="">
                    </div><br>


                    <div class="input-group">
                        <span class="input-group-addon">Muncicipio</B><FONT COLOR="ff0000"> *</FONT></B></span>
                        <input type="" class="form-control" placeholder="" name="munalumn" value="">
                        
                    </div><br>


                     <div class="form-group {{ $errors->has('Estado') ? 'has-error' : ''}}">
                        <span for="Estado" class="input-group-addon">Estado</B><FONT COLOR="ff0000"> *</FONT></B></span>
                        <select name="Estado" class="form-control">
                                    <option value="">Seleciona</option>
                                                    <option value="Agiascaliente">Aguascalientes</option>
                                                    <option value="Baja California">Baja California</option>
                                                    <option value="Baja California Sur">Baja California Sur</option>
                                                    <option value="Campeche">Campeche</option>
                                                    <option value="Coahuila">Coahuila</option>
                                                    <option value="Colima">Colima</option>
                                                    <option value="Chiapas">Chiapas</option>
                                                    <option value="Chihuahua">Chihuahua</option>
                                                    <option value="Distrito Federal">Distrito Federal</option>
                                                    <option value="Durango">Durango</option>
                                                    <option value="Guanajuato">Guanajuato</option>
                                                    <option value="Guerrero">Guerrero</option>
                                                    <option value="Hidalgo">Hidalgo</option>
                                                    <option value="Jalisco">Jalisco</option>
                                                    <option value="México">México</option>
                                                    <option value="Michoacán">Michoacán</option>
                                                    <option value="Morelos">Morelos</option>
                                                    <option value="Nayarit">Nayarit</option>
                                                    <option value="Nuevo León">Nuevo León</option>
                                                    <option value="Oaxaca">Oaxaca</option>
                                                    <option value="Puebla">Puebla</option>
                                                    <option value="Querétaro">Querétaro</option>
                                                    <option value="Quintana Roo">Quintana Roo</option>
                                                    <option value="San Luis Potosi">San Luis Potosí</option>
                                                    <option value="Sinaloa">Sinaloa</option>
                                                    <option value="Sonora">Sonora</option>
                                                    <option value="Tabasco">Tabasco</option>
                                                    <option value="Tamaulipas">Tamaulipas</option>
                                                    <option value="Tlaxcala">Tlaxcala</option>
                                                    <option value="Veracruz">Veracruz</option>
                                                    <option value="Yucatán">Yucatán</option>
                                                    <option value="Zacatecas">Zacatecas</option>
                                                    <option value="Extranjero">Nacido Extranjero</option>
                                        </select>   
                                 {!! $errors->first('Estado', '<p class="help-block">:message</p>') !!}

                    </div><br>


                     <div class="input-group">
                        <span class="input-group-addon">CP</span>
                        <input type="text" class="form-control" placeholder="" name="cpAlumn" value="">
                    </div><br>


                    <div class="input-group">
                        <span class="input-group-addon">Teléfono</span>
                        <input type="text" class="form-control" placeholder="" name="telAlumn" value="">
                        <span class="input-group-addon">Celular</B><FONT COLOR="ff0000"> *</FONT></B></span>
                        <input type="text" class="form-control" placeholder="" name="celAlumn" value="">
                    </div><br>

                    <div class="input-group">
                        <span class="input-group-addon">E-mail</B><FONT COLOR="ff0000"> *</FONT></B></span>
                        <input type="text" class="form-control" placeholder="" name="correoAlumn" value="">
                    </div><br>

                     <div class="input-group">
                        <span class="input-group-addon">Persona Autorizada</B><FONT COLOR="ff0000"> *</FONT></B></span>
                        <input type="text" class="form-control" placeholder="" name="personaAutoAlumn" value="">
                    </div><br>

                      <div class="input-group">
                                <span class="input-group-addon">Parentesco</B><FONT COLOR="ff0000"> *</FONT></B></span>
                                <select class="form-control" name="parentescoAlumn" value="">
                                    <option value="">Seleciona</option>
                                    <option value="M">Madre</option>
                                    <option value="P">Padre</option>
                                    <option value="H">Hermano(a)</option>
                                    <option value="R">Primo</option>
                                </select>   
                            </div><br>

                    <div class="input-group">
                        <span class="input-group-addon">Teléfono</B><FONT COLOR="ff0000"> *</FONT></B></span>
                        <input type="text" class="form-control" placeholder="" name="telAuto" value="">
                    </div><br>


                    <!--Checar que al marcar NO se muestren nuevos campos apra llenar-->
<div>
    <fieldset class="fields2">
    <dl>
        <dt><label>La persona de contacto es la misma que la autorizada?</label></dt>
        <dd>
            <input type="radio" name="tipo_attach" onclick="toggle(this)" value="a"> Si<br>
            <input type="radio" name="tipo_attach" onclick="toggle(this)" value="b" > No<br>
            
        </dd>
    </dl>
</fieldset>
 
<div id="uno" style="display:none">

<center><p>Ingrese los datos de la persona de contacto</p></center>
                    <div class="input-group">
                        <span class="input-group-addon">Nombre</span>
                        <input type="text" class="form-control" placeholder="" name="nombreContact" value="">
                    </div><br>

                     <div class="input-group">
                                <span class="input-group-addon">Parentesco</span>
                                <select class="form-control" name="parentescoContact" value="">
                                    <option value="">Seleciona</option>
                                    <option value="M">Madre</option>
                                    <option value="P">Padre</option>
                                    <option value="H">Hermano(a)</option>
                                    <option value="R">Primo</option>
                                </select>   
                            </div><br>

                             <div class="input-group">
                        <span class="input-group-addon">Teléfono</span>
                        <input type="text" class="form-control" placeholder="" name="telcontact" value="">
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
                              <legend>Escuela de procedencia</legend><br>
                              <P><FONT COLOR="ff0000">* Campo obligatorio</FONT></P>
                    <div class="input-group">
                        <span class="input-group-addon">Escuela de procedencia</B><FONT COLOR="ff0000"> *</FONT></B></span>
                        <input type="text" class="form-control" placeholder="" name="nomEsc" value="">
                    </div><br>
                <div class="input-group">
                        <span class="input-group-addon">Muncicipio</B><FONT COLOR="ff0000"> *</FONT></B></span>
                        <input type="" class="form-control" placeholder="" name="munBach" value="">
                    </div><br>

                    <div class="form-group {{ $errors->has('Estado_Bachillerato') ? 'has-error' : ''}}">
                        <span for="Estado_Bachillerato" class="input-group-addon">Estado</B><FONT COLOR="ff0000"> *</FONT></B></span>
                        <select name="Estado_Bachillerato" class="form-control">
                                    <option value="" >Estado</option>
                                                    <option value="Agiascaliente">Aguascalientes</option>
                                                    <option value="Baja California">Baja California</option>
                                                    <option value="Baja California Sur">Baja California Sur</option>
                                                    <option value="Campeche">Campeche</option>
                                                    <option value="Coahuila">Coahuila</option>
                                                    <option value="Colima">Colima</option>
                                                    <option value="Chiapas">Chiapas</option>
                                                    <option value="Chihuahua">Chihuahua</option>
                                                    <option value="Distrito Federal">Distrito Federal</option>
                                                    <option value="Durango">Durango</option>
                                                    <option value="Guanajuato">Guanajuato</option>
                                                    <option value="Guerrero">Guerrero</option>
                                                    <option value="Hidalgo">Hidalgo</option>
                                                    <option value="Jalisco">Jalisco</option>
                                                    <option value="México">México</option>
                                                    <option value="Michoacán">Michoacán</option>
                                                    <option value="Morelos">Morelos</option>
                                                    <option value="Nayarit">Nayarit</option>
                                                    <option value="Nuevo León">Nuevo León</option>
                                                    <option value="Oaxaca">Oaxaca</option>
                                                    <option value="Puebla">Puebla</option>
                                                    <option value="Querétaro">Querétaro</option>
                                                    <option value="Quintana Roo">Quintana Roo</option>
                                                    <option value="San Luis Potosi">San Luis Potosí</option>
                                                    <option value="Sinaloa">Sinaloa</option>
                                                    <option value="Sonora">Sonora</option>
                                                    <option value="Tabasco">Tabasco</option>
                                                    <option value="Tamaulipas">Tamaulipas</option>
                                                    <option value="Tlaxcala">Tlaxcala</option>
                                                    <option value="Veracruz">Veracruz</option>
                                                    <option value="Yucatán">Yucatán</option>
                                                    <option value="Zacatecas">Zacatecas</option>
                                                    <option value="Extranjero">Nacido Extranjero</option>
                                        </select> 
                                                        {!! $errors->first('Estado_Bachillerato', '<p class="help-block">:message</p>') !!}
 
                    </div><br>

                    <!--Separar los campos de inicio y fin de periodo bachillerato-->

                     <div class="input-group">
                        <span class="input-group-addon">Periodo</span>
                    </div><br>

                    <div class="input-group">
                        <span class="input-group-addon">Inicio</span>
                        <input type="" class="form-control" placeholder="" name="inicio" value="">
                    </div><br>

                    <div class="input-group">
                        <span class="input-group-addon">Fin</span>
                        <input type="" class="form-control" placeholder="" name="fin" value="">
                    </div><br>

                       <div class="input-group">
                        <span class="input-group-addon">Tipo</span>
                         <select class="form-control" name="tipoBach" value="">
                                    <option value="">Seleciona</option>
                                    <option value="A">ABIERTO</option>
                                    <option value="P">PROPEDEUTICO</option>
                                    <option value="T">TECNOLÓGICO</option>
                                </select>  
                        
                        <span class="input-group-addon">Sistema</span>
                        <select class="form-control" name="sisBach" value="">
                                    <option value="">Seleciona</option>
                                    <option value="BACHILLERATO ABIERTO">BACHILLERATO ABIERTO</option>
                                    <option value="CBTA (TECNOLÓGICO)">CBTA (TECNOLÓGICO)</option>
                                    <option value="CBTIS (TECNOLÓGICO">CBTIS (TECNOLÓGICO)</option>
                                    <option value="CECYT (TECNOLÓGICO)">CECYT (TECNOLÓGICO)</option>
                                    <option value="CECYTEY (TECNOLÓGICO)">CECYTEY (TECNOLÓGICO)</option>
                                    <option value="COLEGIO DE BACHILLERES (PROPEDEUTICO)">COLEGIO DE BACHILLERES (PROPEDEUTICO)</option>
                                    <option value="CONALEP (TECNOLÓGICO)">CONALEP (TECNOLÓGICO)</option>
                                    <option value="PREPARATORIAS ESTATALES (PROPEDEUTICO)">PREPARATORIAS ESTATALES (PROPEDEUTICO)</option>
                                    <option value="PREPARATORIAS INCORPORADAS A LA UADY (PROPEDEUTICO)">PREPARATORIAS INCORPORADAS A LA UADY (PROPEDEUTICO)</option>
                                    <option value="TELEBACHILLERATO (PROPEDEUTICO)">TELEBACHILLERATO (PROPEDEUTICO)</option>
                                </select>  
                    </div><br>

                    <div class="input-group">
                        <span class="input-group-addon">Promedio</span>
                        <input type="number" step="0.1" class="form-control" placeholder="" name="promedioBach" value="">
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
                                    <input type="hidden" class="form-control" id="beca"  name="txtid" value="">
                                </div>

                              
                            <div class="input-group">
                                <span class="input-group-addon">Solicita beca</span>
                                <select class="form-control" name="solcBeca" >
                                    <option value="">Seleciona</option>
                                    <option value="S">Si</option>
                                    <option value="N">No</option>
                                </select> </div><br>
                                
                                <div class="input-group">
                                <span class="input-group-addon">Tipo de beca</span>
                                <select class="form-control" name="tipoBeca" >
                                    <option value="">Seleciona</option>
                                    <option value="MANUTENCIÓN 2018">MANUTENCIÓN 2018 <script>var anyo = new Date().getFullYear();</script> </option>
                                    <option value="OTRA BECA">OTRA BECA<script>var anyo = new Date().getFullYear();</script> </option>
                                    <option value="N">No</option>
                                </select> </div><br>
                            
                            
                            <div class="input-group">
                                <span class="input-group-addon">Solicita transporte</span>
                                <select class="form-control" name="solcTrans" >
                                    <option value="">Seleciona</option>
                                    <option value="S">Si</option>
                                    <option value="N">No</option>
                                </select>
                                </div><br>
                            
                            <div class="input-group">
                                <span class="input-group-addon">Folio IBECEY</span>
                                <input type="text" class="form-control" placeholder="" name="folioIbecey" value="">
                            </div><br>

                            <div class="input-group">
                                <span class="input-group-addon">Folio SUBES</span>
                                <input type="text" class="form-control" placeholder="" name="folioSubes" value="">
                                
                            </div><br>

                            <div class="input-group">
                                <span class="input-group-addon">Autoriza beca</span>
                                <select class="form-control" name="autorizaBeca">
                                    <option value="">Seleciona</option>
                                    <option value="S">Si</option>
                                    <option value="N">No</option>
                                </select>
                            </div><br>

                             <div class="input-group">
                                <span class="input-group-addon">Autoriza transporte</span>
                                <select class="form-control" name="becaTrans" >
                                    <option value="">Seleciona</option>
                                    <option value="S">Si</option>
                                    <option value="N">No</option>
                                </select>
                            </div><br>
                            
                             <div class="input-group">
                        <span class="input-group-addon">Promedio de admisión</span>
                        <input type="number" step="0.1" class="form-control" placeholder="" name="promAd" value="">
                    </div><br>
                    
 <!--  <div>
   <fieldset class="fields2">
    <dl>
        <dt><label>¿Solicita otra beca?</label></dt>
        <dd>
            <input type="radio" name="tipo" onclick="toggle2(this)" value="3"> No <br>
            <input type="radio" name="tipo" onclick="toggle2(this)" value="4" > Si <br>
            
        </dd>
    </dl>
</fieldset> 
 
<div id="tres" style="display:none">

<center><p>Ingrese datos de la segunda beca</p></center>
                            
                                <div class="input-group">
                                <span class="input-group-addon">Tipo de beca</span>
                                <select class="form-control" name="tipoBeca" >
                                    <option value="">Seleciona</option>
                                    <option value="MANUTENCIÓN 2018">MANUTENCIÓN 2018 <script>var anyo = new Date().getFullYear();</script> </option>
                                    <option value="OTRA BECA">OTRA BECA<script>var anyo = new Date().getFullYear();</script> </option>
                                    <option value="N">No</option>
                                </select> </div><br>
                            
                            
                            <div class="input-group">
                                <span class="input-group-addon">Folio IBECEY</span>
                                <input type="text" class="form-control" placeholder="" name="folioIbecey" value="">
                            </div><br>

                            <div class="input-group">
                                <span class="input-group-addon">Folio SUBES</span>
                                <input type="text" class="form-control" placeholder="" name="folioSubes" value="">
                                
                            </div><br>

                            <div class="input-group">
                                <span class="input-group-addon">Autoriza beca</span>
                                <select class="form-control" name="autorizaBeca">
                                    <option value="">Seleciona</option>
                                    <option value="S">Si</option>
                                    <option value="N">No</option>
                                </select>
                            </div><br>

</div>
 
</div> -->

</div>

                            </div>
                        </div>
                    </div>

                   
            <div role="tabpanel" class="tab-pane" id="estadisticos">
             
               <br>
                    <div class="col-md-9">
                        <div id="sidebar">
                            <div class="well">
                                <legend>Estadisticos</legend> <br>
                              <P><FONT COLOR="ff0000">* Campo obligatorio</FONT></P>
                                <div class="form-group">
                                    <input type="hidden" class="form-control" id="estadisticos"  name="txtid" value="">
                                </div>

                            <div class="input-group">
                                <span class="input-group-addon">Origen Indígena</span>
                                <select class="form-control" name="origenAlumn" value="">
                                    <option value="">Seleciona</option>
                                    <option value="S">Si</option>
                                    <option value="N">No</option>
                                </select>  
                                </div><br>
                                
                            <div class="input-group">
                                <span class="input-group-addon">Lengua Indígena</span>
                                <select class="form-control" name="lengAlumn" value="">
                                    <option value="">Seleciona</option>
                                    <option value="S">Si</option>
                                    <option value="N">No</option>
                                </select> 
                                </div><br>
                                
                                <div class="input-group">
                                <span class="input-group-addon">¿Cuál?</span>
                                <select class="form-control" name="lengAlumnCual" value=""> <!--falta en base de datos-->
                                    <option value="">Seleciona</option>
                                    <option value="MAYA">MAYA</option>
                                    <option value="OTRA">OTRA</option>
                                </select> </div><br>
                            
                            
                            <div class="input-group">
                                <span class="input-group-addon">Discapacidad</span>
                                <select class="form-control" placeholder="" name="disc" value="">
                                    <option value="">Seleciona</option>
                                    <option value="S">Si</option>
                                    <option value="N">No</option>
                                </select> 
                                </div><br>
                                
                                <div class="input-group">
                                <span class="input-group-addon">Tipo de discapacidad</span>
                                <select class="form-control" placeholder="" name="discCual" value=""> <!--falta en base de datos-->
                                    <option value="Ninguna">Ninguna</option>
                                    <option value="VISUAL">VISUAL</option>
                                    <option value="AUDITIVA">AUDITIVA</option>
                                    <option value="MOTRIZ">MOTRIZ</option>
                                </select> </div><br>
                            
                            <div class="input-group">
                                <span class="input-group-addon">Enfernedad</span>
                                <select class="form-control" placeholder="" name="enfermedad" value="">
                                    <option value="Ninguna">Seleciona</option>
                                    <option value="S">Si</option>
                                    <option value="N">No</option>
                                </select> 
                                </div><br>
                                
                                <div class="input-group">
                                <span class="input-group-addon">Nombre enfermedad</span>
                                <input type="text" class="form-control" placeholder="" name="enfermedadCual" value="">  <!--falta en base de datos-->
                            </div><br>
                            
                            <div class="input-group">
                                <span class="input-group-addon">Alergias</span>
                                <select class="form-control" placeholder="" name="alergias" value="">
                                    <option value="Ninguna">Seleciona</option>
                                    <option value="S">Si</option>
                                    <option value="N">No</option>
                                </select> 
                                </div><br>
                                
                                <div class="input-group">
                                <span class="input-group-addon">Tipo de alergia</span>
                                <input type="text" class="form-control" placeholder="" name="alergiasCual" value=""><!--falta en base de datos-->
                            </div><br>
                            
                          
                            <div class="input-group">
                                <span class="input-group-addon">Peso</span>
                                <input type="text" class="form-control" placeholder="" name="peso" value="">
                                </div><br>
                                
                            <div class="input-group">   
                                <span class="input-group-addon">Talla</span>
                                <select class="form-control" placeholder="" name="talla" value="">
                                    <option value="">Seleciona</option>
                                    <option value="XS"> Extra Chico</option>
                                    <option value="S">Chico</option>
                                    <option value="M">Mediano</option>
                                    <option value="G">Grande</option>
                                    <option value="XG">Extra Grande</option>
                                    <option value="XXG">Extra Extra Grande</option>
                                </select> 
                            </div><br>

                            <div class="input-group">
                                <span class="input-group-addon">Nombre del padre</B><FONT COLOR="ff0000"> *</FONT></B></span>
                                <input type="text" class="form-control" placeholder="" name="nomPad" value="">
                            </div><br>

                            <div class="input-group">
                                <span class="input-group-addon">Nombre de la madre</B><FONT COLOR="ff0000"> *</FONT></B></span>
                                <input type="text" class="form-control" placeholder="" name="nomMad" value="">
                            </div><br>
                            <div class="input-group">
                                <span class="input-group-addon">Escolaridad del padre</B><FONT COLOR="ff0000"> *</FONT></B></span>
                                <input type="text" class="form-control" placeholder="" name="nomMad" value="">
                            </div><br>

                              <!--div class="input-group">
                                <span class="input-group-addon">Escolaridad del padre</span>
                                <select name="escPad" class="form-control">
                                    <option value="">Seleciona</option>
                                    @foreach ($escPadre as $f)
                                    <option value="{{$f->id}}">{{$f->escolaridadPadre}}</option>
                                    @endforeach 
                                </select>
                            </div><br-->

                              <div class="input-group">
                                <span class="input-group-addon">Escolaridad de la madre</span>
                                 <select name="escMad" class="form-control">
                                    <option value="">Seleciona</option>
                                    @foreach ($escMadre as $e)
                                    <option value="{{$e->id}}">{{$e->escolaridadMadre}}</option>
                                    @endforeach 
                                </select>
                            </div><br>

                             <div class="input-group">
                                <span class="input-group-addon">Actividad del padre</span>
                               <select name="actPad" class="form-control">
                                    <option value="">Seleciona</option>
                                    @foreach ($actPadre as $o)
                                    <option value="{{$o->id}}">{{$o->actividadPadre}}</option>
                                    @endforeach 
                                </select>
                            </div><br>

                             <div class="input-group">
                                <span class="input-group-addon">Actividad de la madre</span>
                                <select name="actMad" class="form-control">
                                    <option value="">Seleciona</option>
                                    @foreach ($actMadre as $u)
                                    <option value="{{$u->id}}">{{$u->actividadMadre}}</option>
                                    @endforeach 
                                </select>
                            </div><br>

                            <div class="input-group">
                                <span class="input-group-addon">Automóvil Familiar</span>
                                <select class="form-control" placeholder="" name="autoFam" value="">
                                    <option value="N">Seleciona</option>
                                    <option value="S">Si</option>
                                    <option value="N">No</option>
                                </select> 
                                </div><br>

                            <div class="input-group">
                                <span class="input-group-addon">Computadora</span>
                                <select class="form-control" placeholder="" name="compu" value="">
                                    <option value="N">Seleciona</option>
                                    <option value="S">Si</option>
                                    <option value="N">No</option>
                                </select> 
                                </div><br>
                            
                            <div class="input-group">
                                <span class="input-group-addon">Tipo de Seguro Médico</span>
                                <select class="form-control" placeholder="" name="segMed" value="">
                                    <option value="Ninguno">Seleciona</option>
                                    <option value="IMSS">IMSS</option>
                                    <option value="ISSSTE (FEDERAL)">ISSSTE (FEDERAL)</option>
                                    <option value="ISSTEY (ESTATAL)">ISSTEY (ESTATAL)</option>
                                    <option value="SEGURO POPULAR">SEGURO POPULAR</option>
                                    <option value="SEGURO PARTICULAR">SEGURO PARTICULAR</option>
                                </select> 
                                </div><br>
                             
                            <div class="input-group">
                                <span class="input-group-addon">Número de seguro médico</span>
                                <input type="text" class="form-control" placeholder="" name="numsegMed" value="">
                            </div><br>

                            <div class="input-group">
                                <span class="input-group-addon">Tamaño de la casa</span>
                                <select class="form-control" placeholder="" name="casa" value="">
                                    <option value="">Seleciona</option>
                                    <option value="CHICA">CHICA</option>
                                    <option value="MEDIANA">MEDIANA</option>
                                    <option value="GRANDE">GRANDE</option>
                                </select> 
                                </div><br>

                                <div class="input-group">
                                <span class="input-group-addon">Ingreso familiar</span>
                                <input type="text" class="form-control" placeholder="" name="ingreso" value="">
                            </div><br>

                                <div class="input-group">
                                <span class="input-group-addon">Personas que dependen de ese ingreso</span>
                                <input type="text" class="form-control" placeholder="" name="dependenIng" value="">
                            </div><br>

                              <div class="input-group">
                                <span class="input-group-addon">Personas que viven en la casa</span>
                                <input type="text" class="form-control" placeholder="" name="personasCasa" value="">
                            </div><br>

                            <div class="input-group">
                                <span class="input-group-addon">Hermanos</span>
                                <input type="number" step="0" class="form-control" placeholder="" name="herm" value="">
                            </div><br>

                            <div class="input-group">
                                <span class="input-group-addon">Lugar de nacimiento</span>
                                <input type="text" class="form-control" placeholder="" name="nacHerm" value="">
                            </div><br>

                            <div class="input-group">
                                <span class="input-group-addon">Estudian</span>
                                <input type="number" step="0" class="form-control" placeholder="" name="estHerm" value="">
                            </div><br>
                            
                            <div class="input-group">
                        <span class="input-group-addon">Ingreso Percapita</span>
                        <input type="text" class="form-control" placeholder="" name="ingresoPer" value="">
                    </div><br>


<div>
    <fieldset class="fields2">
    <dl>
        <dt><label>¿Trabajas?</label></dt>
        <dd>
            <input type="radio" name="trab" onclick="toggle3(this)" value="SI"> No <br>
            <input type="radio" name="trab" onclick="toggle3(this)" value="NO" > Si <br>
            
        </dd>
    </dl>
</fieldset>
 
<div id="cinco" style="display:none">
    
<div class="input-group">
                                 <div class="input-group">
                                <span class="input-group-addon">Actividad en la que trabajas</span>
                                <select name="actTrabajas" class="form-control">
                                    <option value="">Seleciona</option>
                                    @foreach ($actTrabajas as $c)
                                    <option value="{{$c->id}}">{{$c->actividadTrabajas}}</option>
                                    @endforeach 
                                </select>
                            </div><br>
                            
                             <div class="input-group">
                                <span class="input-group-addon">Horario de trabajo</span>
                                <input type="text" class="form-control" placeholder="" name="horTrab" value="">
                            </div><br>
                            
                             <div class="input-group">
                        <span class="input-group-addon">Telefono del trabajo</span>
                        <input type="text" class="form-control" placeholder="" name="telTrabajo" value="">
                    </div><br>

</div>
 
</div>

</div>


<div>
    <fieldset class="fields2">
    <dl>
        <dt><label>¿Soltero(a)?</label></dt>
        <dd>
            <input type="radio" name="tipo_status" onclick="toggle4(this)" value="7"> Si <br>
            <input type="radio" name="tipo_status" onclick="toggle4(this)" value="8" > No <br>
            
        </dd>
    </dl>
</fieldset>
 
<div id="siete" style="display:none">
    
<div class="input-group">
                                <div class="input-group">
                                <span class="input-group-addon">Nombre del conyugue</span>
                                <input type="text" class="form-control" placeholder="" name="nomConyuge" value="">
                            </div><br>

                             <div class="input-group">
                                <span class="input-group-addon">Escolaridad del conyugue</span>
                                  <select name="escCon" class="form-control">
                                    <option value="">Seleciona</option>
                                    @foreach ($escConyuge as $d)
                                    <option value="{{$d->id}}">{{$d->escolaridadConyuge}}</option>
                                    @endforeach 
                                </select>
                            </div><br>

                             <div class="input-group">
                                <span class="input-group-addon">Actividad del cónyuge</span>
                                <select name="actCon" class="form-control">
                                    <option value="">Seleciona</option>
                                    @foreach ($actConyuge as $b)
                                    <option value="{{$b->id}}">{{$b->actividadConyuge}}</option>
                                    @endforeach 
                                </select>
                            </div><br>

</div>
 
</div>

</div>

                            
                            
                           
                             

<div>
    <fieldset class="fields2">
    <dl>
        <dt><label>Hijos</label></dt>
        <dd>
            <input type="radio" name="tipo" onclick="toggle1(this)" value="1"> No <br>
            <input type="radio" name="tipo" onclick="toggle1(this)" value="2" > Si <br>
            
        </dd>
    </dl>
</fieldset>
 
<div id="primero" style="display:none">

<center><p>Ingrese el número de hijos</p></center>
                    <div class="input-group">
                        <span class="input-group-addon">0-5</span>
                        <input type="text" class="form-control" placeholder="" name="hijos1" value="">
                    </div><br>


                             <div class="input-group">
                        <span class="input-group-addon">6-12</span>
                        <input type="text" class="form-control" placeholder="" name="hijos2" value="">
                    </div><br>

                     <div class="input-group">
                        <span class="input-group-addon">13-18</span>
                        <input type="text" class="form-control" placeholder="" name="hijos3" value="">
                    </div><br>

                     <div class="input-group">
                        <span class="input-group-addon">Mayores de 18</span>
                        <input type="text" class="form-control" placeholder="" name="hijos4" value="">
                    </div><br>
</div>
 

 <div>

            
                      
     
 </div>

</div>

                            </div>
                        </div>
                    </div>
<div class="form-group">
            <button type="submit" class="btn btn-success btn-block"> Guardar </button>
              
          </div>
        </form>
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