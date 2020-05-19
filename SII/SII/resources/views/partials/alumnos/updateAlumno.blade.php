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
            <li role="presentation"><a href="#documentos" aria-controls="documentos" data-toggle="tab" role="tab">Documentos</a></li>
            
              
          </ul>




<form role="form-signin" class="form-horizontal" id="" method="POST" action="{{url('/')}}/editaralumno{{$alum->id}}" > 
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
                        <input type="text" class="form-control" placeholder="" name="folioAlumn" value="{{ $alum->Folio }}">
                    </div><br>
                    
                    <div class="input-group">
                        <span for="Matricula" class="input-group-addon">Matrícula</span>
                        <input type="text" class="form-control" placeholder="" name="Matricula" value="{{ $alum->Matricula }}">
                    </div><br>

                              <div class="input-group">
                                <span class="input-group-addon">Status</span>
                                <select class="form-control" name="status">
                                    <option value="">Seleciona</option>
                                    <option value="1" selected>Activo</option>
                                    <option value="2" selected>Egresado</option>
                                    <option value="3" selected>Baja Temporal</option>
                                    <option value="4" selected>Alumnos de nuevo Ingreso</option>
                                    <option value="5" selected>Baja Definitiva</option>
                                    <option value="6" selected>Baja Academica</option>
                                    <option value="7">Titulado</option>
                                    <option value="8">Desercion</option>
                                    <option value="9">Condicionado Academicamente</option>
                                    <option value="10">Condicionado Administrativamente</option>
                                    <option value="11" selected>Aspirante</option>
                                    <option value="13">Regular</option>
                                    <option value="14">Reingreso</option>
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
                        <span class="input-group-addon">Fecha de creación</span>
                        <input type="date" class="form-control" placeholder="" name="fechaCrea" value="{{$alum->Fecha_Creacion}}">
                    </div><br>

                    <div class="input-group">
                        <span class="input-group-addon">Fecha de actualización</span>
                        <input type="date" class="form-control" placeholder="" name="fechaAct" value="{{OLD('scheduled_date',date('Y-m-d'))}}">
                    </div><br> 

                    <div class="input-group">
                        <span class="input-group-addon">Fecha de registro</span>
                        <input type="date" class="form-control" placeholder="" name="fechaReg" value="{{$alum->Fecha_Registro}}">
                    </div><br>

                    <div class="input-group">
                        <span class="input-group-addon">Fecha de ingreso</span>
                        <input type="date" class="form-control" placeholder="" name="fechaIng" value="{{$alum->Fecha_Ingreso}}">
                    </div><br>

                    <div class="input-group">
                        <span class="input-group-addon">Fecha de egreso</span>
                        <input type="date" class="form-control" placeholder="" name="fechaEg" value="{{$alum->Fecha_Egreso}}">
                    </div><br>

                    <div class="input-group ">
                       <span class="input-group-addon">Notas (descripción)</span>
                       <input type="textarea" rows="3" class="form-control"  placeholder="" name="notas" value="{{$alum->Notas}}">
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
                        <input type="text" class="form-control" placeholder="" name="paternoAlumn" value="{{$alum->Paterno}}">
                    </div><br>

                     <div class="input-group">
                        <span class="input-group-addon">Segundo Apellido</span>
                        <input type="text" class="form-control" placeholder="" name="maternoAlumn" value="{{$alum->Materno}}">
                    </div><br>

                    <div class="input-group">
                        <span class="input-group-addon">Nombres</span>
                        <input type="text" class="form-control" placeholder="" name="nombre" value="{{$alum->Nombres}}">
                    </div><br>

                     <div class="input-group">
                                <span class="input-group-addon">Genero</span>
                                <select class="form-control" name="genero" value="">
                                    <option value="">Seleciona</option>
                                    @if($alum->Genero=='M')
                                    <option value="M" selected>Masculino</option>
                                    <option value="F" >Femenino</option></option>
                                     @elseif($alum->Genero=='F')
                                    <option value="F" selected>Femenino</option>
                                    <option value="M" >Masculino</option>
                                    @endif
                                </select> 
                                
                                <span class="input-group-addon">Estado Civil</span>
                               <select class="form-control" name="civilAlumn" value="">
                                    <option value="">Seleciona</option>
                                    <option value="S" selected>Soltero</option>
                                    <option value="C" selected>Casado</option>
                                    <option value="U" selected>Unión Libre</option>
                                    <option value="D" selected>Divorsiado</option>
                                    <option value="V" selected>Viudo</option>
                                </select>  
                            </div><br>

                    <div class="input-group">
                        <span class="input-group-addon">Fecha de nacimiento</span>
                        <input type="date" class="form-control" placeholder="" name="FechaNacAlumn" value="{{$alum->Fecha_Nac}}">
                    </div><br>

                      <div class="input-group">
                        <span class="input-group-addon">Edad</span>
                        <input type="number" class="form-control" placeholder="" name="edadAlumn" value="{{$alum->Edad}}">
                    </div><br>

                    <div class="input-group">
                        <span class="input-group-addon">Lugar de nacimiento</span>
                        <input type="text" class="form-control" placeholder="" name="lugarAlumn" value="{{$alum->Lugar_Nac}}">
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
                        <span class="input-group-addon">Municipio de nacimiento</span>
                        <input type="text" class="form-control" placeholder="" name="municipioAlumn" value="{{$alum->Municipio_Nac}}">
                    </div><br>
                   
                   <div class="input-group">
                        <span class="input-group-addon">CURP</span>
                        <input type="text" class="form-control" placeholder="" name="curpAlumn" value="{{$alum->Clave_Ciudadana}}">
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
                        <input type="text" class="form-control" placeholder="" name="domicilioAlumn" value="{{$alum->Domicilio}}">
                    </div><br>

                     <div class="input-group">
                        <span class="input-group-addon">Ciudad</span>
                        <input type="text" class="form-control" placeholder="" name="ciudadAlumn" value="{{$alum->Ciudad}}">
                    </div><br>


                    <div class="input-group">
                        <span class="input-group-addon">Muncicipio</span>
                        <input type="" class="form-control" placeholder="" name="munalumn" value="{{$alum->Municipio}}">
                        
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
                        <input type="text" class="form-control" placeholder="" name="cpAlumn" value="{{$alum->CP}}">
                    </div><br>


                    <div class="input-group">
                        <span class="input-group-addon">Teléfono</span>
                        <input type="text" class="form-control" placeholder="" name="telAlumn" value="{{$alum->Telefono}}">
                        <span class="input-group-addon">Celular</span>
                        <input type="text" class="form-control" placeholder="" name="celAlumn" value="{{$alum->Celular}}">
                    </div><br>

                    <div class="input-group">
                        <span class="input-group-addon">E-mail</span>
                        <input type="text" class="form-control" placeholder="" name="correoAlumn" value="{{$alum->Email}}">
                    </div><br>

                     <div class="input-group">
                        <span class="input-group-addon">Nombre</span>
                        <input type="text" class="form-control" placeholder="" name="nombreContact" value="{{$alum->Contacto}}">
                    </div><br>

                     <div class="input-group">
                                <span class="input-group-addon">Parentesco</span>
                                <select class="form-control" name="parentescoContact" value="">
                                    <option value="">Seleciona</option>
                                    <option value="M" selected>Madre</option>
                                    <option value="P" selected>Padre</option>
                                    <option value="H" selected>Hermano(a)</option>
                                    <option value="R" selected>Primo</option>
                                </select>   
                            </div><br>

                             <div class="input-group">
                        <span class="input-group-addon">Teléfono</span>
                        <input type="text" class="form-control" placeholder="" name="telcontact" value="{{$alum->Tel_Contacto}}">
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
                        <input type="text" class="form-control" placeholder="" name="nomEsc" value="{{$alum->Escuela_Procedencia}}">
                    </div><br>
                <div class="input-group">
                        <span class="input-group-addon">Muncicipio</span>
                        <input type="" class="form-control" placeholder="" name="munBach" value="{{$alum->Municipio_Bachillerato}}">
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
                        <input type="" class="form-control" placeholder="" name="inicio" value="{{$alum->Inicio_Bachillerato}}">
                    </div><br>

                    <div class="input-group">
                        <span class="input-group-addon">Fin</span>
                        <input type="" class="form-control" placeholder="" name="fin" value="{{$alum->Fin_Bachillerato}}">
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
                        <input type="number" step="0.1" class="form-control" placeholder="" name="promedioBach" value="{{$alum->Promedio_Bachillerato}}" >
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
                        <span class="input-group-addon">Promedio de admisión</span>
                        <input type="number" step="0.1" class="form-control" placeholder="" name="promAd" value="{{$alum->Promedio_Admision}}">
                    </div><br>

                            <div class="input-group">
                                <span class="input-group-addon">Solicita beca</span>
                                <input type="text" class="form-control" placeholder="" name="solcBeca" value="{{$alum->Solicita_beca}}">
                                <span class="input-group-addon">Autoriza beca</span>
                                <input type="text" class="form-control" placeholder="" name="autorizaBeca" value="{{$alum->Autoriza_Beca}}">  
                            </div><br>

                            <div class="input-group">
                                <span class="input-group-addon">Tipo de beca</span>
                                <input type="text" class="form-control" placeholder="" name="tipoBeca" value="{{$alum->Tipo_Beca}}">
                            </div><br>
                               
                            <div class="input-group">
                                <span class="input-group-addon">Folio IBECEY</span>
                                <input type="text" class="form-control" placeholder="" name="folioIbecey" value="{{$alum->Folio_Ibecey}}">
                            </div><br>

                            <div class="input-group">
                                <span class="input-group-addon">Folio SUBES</span>
                                <input type="text" class="form-control" placeholder="" name="folioSubes" value="{{$alum->Folio_Subes}}">
                            </div><br>

                             <div class="input-group">
                                <span class="input-group-addon">Beca de transporte</span>
                                <input type="text" class="form-control" placeholder="" name="becaTrans" value="{{$alum->Beca_Transporte}}" >
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
                                    <input type="hidden" class="form-control" id="estadisticos"  name="txtid" value="">
                                </div>

                           <div class="input-group">
                                <span class="input-group-addon">Origen Indígena</span>
                                <select class="form-control" name="origenAlumn" value="">
                                    <option value="">Seleciona</option>
                                    <option value="S" selected>Si</option>
                                    <option value="N" selected>No</option>
                                </select>  

                                <span class="input-group-addon">Lengua Indígena</span>
                                <select class="form-control" name="lengAlumn" value="">
                                    <option value="">Seleciona</option>
                                    <option value="S" selected>Si</option>
                                    <option value="N" selected>No</option>
                                </select> 
                            </div><br>

                            <div class="input-group">
                                <span class="input-group-addon">Discapacidad</span>
                                <select class="form-control" placeholder="" name="disc" value="">
                                    <option value="">Seleciona</option>
                                    <option value="S">Si</option>
                                    <option value="N">No</option>
                                </select> 
                                </div><br>

                            <div class="input-group">
                                <span class="input-group-addon">Enfermedad</span>
                                <input type="text" class="form-control" placeholder="" name="enfermedad" value="{{$alum->Enfermedad}}">
                                <span class="input-group-addon">Alergias</span>
                                <input type="text" class="form-control" placeholder="" name="alergias" value="{{$alum->Alergias}}">
                            </div><br>

                            <div class="input-group">
                                <span class="input-group-addon">Peso</span>
                                <input type="text" class="form-control" placeholder="" name="peso" value="{{$alum->Peso}}">
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
                                <span class="input-group-addon">Nombre del padre</span>
                                <input type="text" class="form-control" placeholder="" name="nomPad" value="{{$alum->Nombre_Padre}}">
                            </div><br>

                            <div class="input-group">
                                <span class="input-group-addon">Nombre de la madre</span>
                                <input type="text" class="form-control" placeholder="" name="nomMad" value="{{$alum->Nombre_Madre}}">
                            </div><br>

                                <div class="input-group">
                                <span class="input-group-addon">Escolaridad del padre</span>
                                <input name="escPad" class="form-control" value="{{$alum->Escolaridad_Padre}}">
                                    
                            </div><br>

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
                                <span class="input-group-addon">Automovil Familiar</span>
                                <input type="text" class="form-control" placeholder="" name="autoFam" value="{{$alum->Automovil_Familiar}}">
                            </div><br>

                             <div class="input-group">
                                <span class="input-group-addon">Computadora</span>
                                <input type="text" class="form-control" placeholder="" name="compu" value="{{$alum->Computadora}}" >
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
                                <input type="text" class="form-control" placeholder="" name="numsegMed" value="{{$alum->Numero_IMSS}}" >

                                 <span class="input-group-addon">Numero Verificador</span>
                                <input type="text" class="form-control" placeholder="" name="Num_imss_verificador" value="{{$alum->Num_imss_verificador}}">
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
                                <input type="text" class="form-control" placeholder="" name="ingreso" value="{{$alum->Ingreso_Familiar}}">
                            </div><br>

                                <div class="input-group">
                                <span class="input-group-addon">Personas que dependen de ese ingreso</span>
                                <input type="text" class="form-control" placeholder="" name="dependenIng" value="{{$alum->Personas_Dependen_Ingreso}}" >
                            </div><br>

                              <div class="input-group">
                                <span class="input-group-addon">Personas que viven en la casa</span>
                                <input type="text" class="form-control" placeholder="" name="personasCasa" value="{{$alum->Viven_En_Casa}}">
                            </div><br>

                            <div class="input-group">
                                <span class="input-group-addon">Hermanos</span>
                                <input type="number" step="0" class="form-control" placeholder="" name="herm" value="{{$alum->Hermanos}}">
                            </div><br>

                            <div class="input-group">
                                <span class="input-group-addon">Lugar de nacimiento</span>
                                <input type="text" class="form-control" placeholder="" name="nacHerm" value="{{$alum->Lugar_Nac_Herm}}">
                            </div><br>

                            <div class="input-group">
                                <span class="input-group-addon">Estudian</span>
                                <input type="number" step="0" class="form-control" placeholder="" name="estHerm" value="{{$alum->Herm_Estudian}}">
                            </div><br>

                             <div class="input-group">
                                <span class="input-group-addon">Trabajas</span>
                                <input type="text" class="form-control" placeholder="" name="trab" value="{{$alum->Trabajas}}">
                            </div><br>

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
                                <input type="text" class="form-control" placeholder="" name="horTrab" value="{{$alum->Horario_Trabajo}}">
                            </div><br>

                             <div class="input-group">
                                <span class="input-group-addon">Nombre del conyugue</span>
                                <input type="text" class="form-control" placeholder="" name="nomConyuge" value="{{$alum->Nombre_Conyuge}}">
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
                        <input type="text" class="form-control" placeholder="" name="hijos1" value="{{$alum->Edad_Hijos0a5}}">
                    </div><br>


                             <div class="input-group">
                        <span class="input-group-addon">6-12</span>
                        <input type="text" class="form-control" placeholder="" name="hijos2" value="{{$alum->Edad_Hijos6a12}}">
                    </div><br>

                     <div class="input-group">
                        <span class="input-group-addon">13-18</span>
                        <input type="text" class="form-control" placeholder="" name="hijos3" value="{{$alum->Edad_Hijos13a18}}">
                    </div><br>

                     <div class="input-group">
                        <span class="input-group-addon">Mayores de 18</span>
                        <input type="text" class="form-control" placeholder="" name="hijos4" value="{{$alum->Edad_Mayores18}}">
                    </div><br>
</div>
 

 <div>

            <div class="input-group">
                        <span class="input-group-addon">Ingreso Percapita</span>
                        <input type="text" class="form-control" placeholder="" name="ingresoPer" value="{{$alum->Ingreso_Percapita}}">
                    </div><br>

                       <div class="input-group">
                        <span class="input-group-addon">Telefono del trabajo</span>
                        <input type="text" class="form-control" placeholder="" name="telTrabajo" value="{{$alum->Telefono_Trabajo}}">
                    </div><br>
     
 </div>

</div>

                            </div>
                        </div>
                        <div class="form-group">
              
            <button type="submit" class="btn btn-primary">Actualizar</button>
  
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
                   value="ACTA DE NACIMIENTO"  style="text-align:center" ></span>
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