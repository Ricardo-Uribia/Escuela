 @extends('layouts.admin')

@section('menuTabs')

  <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading ">
                            <center><h4>Nuevo Empleador</h4></center> 

                               

                        </div>
                    </div>
            </div> 

            <div class="panel-body">
                @if(session('Notificacion') > 0){
                <div class="alert alert-success">
                    {{session('Notificacion')}}
                </div>
                @endif

                @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
        </div>
<link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet" />
<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet" />

  <div class="tab-content">
    <div class="col-md-12 contenedor-datos">
        <div role="tabpanel">
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#basicos" aria-controls="basicos" data-toggle="tab" role="tab">Datos Básicos</a></li>
            <li role="presentation"><a href="#academicos" aria-controls="academicos" data-toggle="tab" role="tab">Datos Laborales</a></li>
            <li role="presentation"><a href="#salud" aria-controls="salud" data-toggle="tab" role="tab">Estudios y otros</a></li>
          </ul>

 
 {!!Form::open(['route' => 'crearProfesor.store', 'method' => 'POST', 'files' => 'true'])!!} 
  {{ csrf_field() }}
        <input type="hidden" name="tipo" value="2">
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active"  id="basicos">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="col-md-12">
                            <div id="sidebar">
                                <div id="mio" class="input-group">
                        <span class="input-group-addon"><STRONG>Identidad</STRONG></span>  
                        </div><br> 
                            </div>
                        </div>
                        <div class="col-md-4">
                            <span class="fa-stack fa-2x">
                            <i class="fa fa-cloud fa-stack-2x bottom pulsating"></i>
                            <i class="fa fa-circle fa-stack-1x top medium"></i>
                            <i class="fa fa-arrow-circle-up fa-stack-1x top"></i>
                            </span>
                                <div class="form-group">
                                    <label for="foto">Foto</label>
                                    <input type="file"  name="file" value="{{old('foto')}}" >
                                </div>
                            </div>
                        <div class="col-md-6">
                            <div class="form-group was-validated">
                                <label for="nombre">Nombres</label>
                                <input type="text" required name="nombre" class="form-control" value="{{old('nombre')}}" placeholder="Nombres...">
                            </div>
                        </div>
                         
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="txtParterno">Primer Paterno</label>
                                    <input type="txtParterno" required name="txtPaterno" class="form-control" value="{{old('txtParterno')}}" placeholder="Apellido Paterno...">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="txtMaterno">Segundo Materno</label>
                                    <input type="text" required name="txtMaterno" class="form-control" value="{{old('txtMaterno')}}" placeholder="Apellido Materno...">
                                </div>
                            </div>

                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="Fecha_nacimiento">Fecha de Nacimiento</label>
                                        <input type="date" required name="Fecha_nacimiento" class="form-control" value="">
                                    </div>
                                </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="estado_id">Estado de Nacimiento</label>
                                        <select name="estadoNacimiento" id="estado_id" class="form-control selectpicker" data-live-search="true">
                                            <option value="">Estado</option>
                                                @foreach($state as $u)
                                                    <option  value="{{$u['id']}}">
                                                        {{$u['NOMBRE']}}
                                                    </option> 
                                                @endforeach
                                        </select>  
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="town">Municipio de Nacimiento</label>
                                       

                                          {!!Form::select('town', ['placeholder' => 'Selecciona'], null, ['id' => 'town', 'class' => 'form-control', 'name' => 'municipioNacimiento'])!!}
                                    </div>
                                </div>


                             <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label for="genero">Genero</label>
                                    <select name="genero"   class="form-control selectpicker" data-live-search="true" required>
                                        <option value="">Seleciona</option>
                                        <option value="M">Masculino</option>
                                        <option value="F">Femenino</option>
                                    </select>
                                </div>
                            </div>

                             <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label for="curp">Curp</label>
                                    <input type="text" class="form-control" placeholder="Curp..." name="curp" value="{{old('curp')}}">  
                                 </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="estadoCivil">Estado Civil</label>
                                        <select name="estadoCivil" value="" class="form-control selectpicker" data-live-search="true">
                                            <option value="">Seleciona</option>
                                            <option value="S">Soltero(a)</option>
                                            <option value="C">Casado(a)</option>
                                            <option value="U">Unión Libre</option>
                                            <option value="D">Divorciado(a)</option>
                                            <option value="V">Viudo(a)</option>
                                        </select>     
                                    </div>
                                </div><br>
                                <div class="col-md-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><STRONG>Domicilio & Localización:</STRONG></span>  
                                </div>
                            </div>
                                <br>
                                  <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="domicilio">Domicilio</label>
                                        <input type="text" name="domicilio"  value="{{old('domicilio')}}" class="form-control" placeholder="Domicilio...">
                                     </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="estado_id">Estado</label>
                                        <select name="estadoActual" id="estado_id2" class="form-control selectpicker" data-live-search="true">
                                            <option value="">Estado</option>
                                                @foreach($state as $u)
                                                    <option  value="{{$u['id']}}">
                                                        {{$u['NOMBRE']}}
                                                    </option> 
                                                @endforeach
                                        </select>  
                                    </div>
                                </div> 

                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="domicilio">Municipio</label>
                                        <input type="text" name="municipio"  value="{{old('municipio')}}" class="form-control" placeholder="municip...">
                                     </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="town1">Ciudad</label>
                                        {!!Form::select('town2', ['placeholder' => 'Selecciona'], null, ['id' => 'town2', 'class' => 'form-control', 'name' => 'municipioActual'])!!}
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="cp">Codigo Postal</label>
                                        <input type="text" name="cp" required  placeholder="Código Postal..." class="form-control" value="{{old('cp')}}">
                                     </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label for="telefono">Télefono</label>
                                    <input type="number" class="form-control" placeholder="Télefono" name="telefono" value="{{old('telefono')}}">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label for="celular">Celular</label>
                                    <input type="number" class="form-control" placeholder="Celular" name="celular" value="{{old('celular')}}">
                                </div>
                            </div>

                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email"  name="email" class="form-control" value="{{old('email')}}" placeholder="Email...">
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="email">Facebook</label>
                                        <input type="email"  name="email" class="form-control" value="{{old('email')}}" placeholder="Email...">
                                    </div>
                                </div>


                                                                
                        </div>
                        <div class="input-group">
                                <span class="input-group-addon"><STRONG> Salud:</STRONG></span>  
                            </div><br>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label for="numeroSeguro">No de Seguro</label>
                                    <input type="numer" class="form-control" placeholder="No de Seguro.." value="{{old('numeroSeguro')}}" name="numeroSeguro" >
                                 </div>
                            </div>


                            <!--<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label for="rfc">RFC</label>
                                    <input type="text" class="form-control" placeholder="RFC..." name="rfc" value="{{old('rfc')}}">
                                 </div>
                            </div>-->

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="notas">Notas (descripción)</label>
                                     <textarea type="textarea" rows="3" class="form-control"  placeholder="Notas (descripción)" name="notas" value="{{old('notas')}}">
                                    </textarea>
                                 </div>
                            </div>
                    </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="academicos">
            
               <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                       
                            <div class="col-md-12">
                                <div id="sidebar">
                                <div class="input-group">
                                <span class="input-group-addon"><STRONG> Datos Academicos</STRONG></span>  
                            </div><br>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label for="numEmpleado">Numero de Empleado</label>
                                    <input type="text" name="numEmpleado"   placeholder="No. Empleado..." class="form-control" value="{{old('numEmpleado')}}" >
                                 </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label for="claveProfe">Cláve Profesor</label>
                                   <input type="text" class="form-control" placeholder="Cláve Profesor"  name="claveProfe" value="{{old('claveProfe')}}">
                                 </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm- col-xs-12">
                                <div class="form-group">
                                    <label for="sueldo">Sueldo</label>
                                    <input type="text" class="form-control" placeholder="Sueldo..." name="sueldo" value="{{old('sueldo')}}">
                                </div>
                            </div>
                            <div class="col-md-12">
                            <div class="input-group">
                                <span class="input-group-addon"><STRONG>Ingreso Laboral:</STRONG></span>  
                            </div>
                        </div><br>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label for="contrato">Status</label>
                                    <select class="form-control selectpicker" data-live-search="true"  name="statusEmple" value="" required>
                                        <option value="">Seleciona</option>
                                        <option value="A">Activo</option>
                                        <option value="B">Baja</option>
                                    </select>     
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label for="Fecha_ingreso">Fecha Ingreso</label>
                                    <input type="date" name="Fecha_ingreso"   placeholder="Ingreso..." class="form-control" value="{{old('Fecha_ingreso')}}" >
                                 </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label for="Fecha_baja">Fecha Baja</label>
                                    <input type="date" name="Fecha_baja"  placeholder="Baja..." class="form-control" value="{{old('Fecha_baja')}}" >
                                 </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label for="sueldo">Área o Departamento</label>
                                    <select class="form-control selectpicker" data-live-search="true"  name="statusEmple" value="" required>
                                        <option value="">Profesor de:</option>
                                        <option value="A">matematicas</option>
                                        <option value="B">Ingles</option>
                                        <option value="B">Fránces</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label for="cargo">Cargo</label>
                                    <input type="text" class="form-control" placeholder="Cargo.." name="cargo" value="{{old('cargo')}}">
                                </div>
                            </div>
                            
                            <div class="col-lg-4 col-md-4 col-sm- col-xs-12">
                                <div class="form-group">
                                    <label for="contrato">Contrato</label>
                                    <select class="form-control selectpicker" data-live-search="true"  name="statusEmple" value="" required>
                                        <option value="">Tipo de contrato:</option>
                                        <option value="A">Temporal</option>
                                        <option value="B">Fijo</option>
                                        <option value="B"></option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label for="rfc">RFC</label>
                                    <input type="text" class="form-control" placeholder="RFC.." name="RFC" value="{{old('rfc')}}">
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><STRONG>Horas:</STRONG></span>  
                            </div><br>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm- col-xs-12">
                                <div class="form-group">
                                    <label for="sueldo">Docencia</label>
                                    <input type="number" class="form-control" placeholder="Docencia.." name="docencia" value="{{old('docencia')}}">
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm- col-xs-12">
                                <div class="form-group">
                                    <label for="sueldo">Investigación</label>
                                    <input type="number" class="form-control" placeholder="Investigación.." name="horasInves" value="{{old('horasInves')}}">
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm- col-xs-12">
                                <div class="form-group">
                                    <label for="sueldo">Administrativas</label>
                                    <input type="number" class="form-control" placeholder="Administrativas.." name="horasAdmin" value="{{old('horasAdmin')}}">
                                </div>
                            </div>

                             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><STRONG>Empleo Anterior</STRONG></span>  
                            </div><br>
                            </div>
                            
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label for="sueldo">Área o Departamento</label>
                                    <select class="form-control selectpicker" data-live-search="true"  name="statusEmple" value="" required>
                                        <option value="">Profesor de:</option>
                                        <option value="A">matematicas</option>
                                        <option value="B">Ingles</option>
                                        <option value="B">Fránces</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label for="cargo">Cargo</label>
                                    <input type="text" class="form-control" placeholder="Cargo.." name="cargo" value="{{old('cargo')}}">
                                </div>
                            </div>
                            
                            <div class="col-lg-4 col-md-4 col-sm- col-xs-12">
                                <div class="form-group">
                                    <label for="contrato">Contrato</label>
                                    <select class="form-control selectpicker" data-live-search="true"  name="statusEmple" value="" required>
                                        <option value="">Tipo de contrato:</option>
                                        <option value="A">Temporal</option>
                                        <option value="B">Fijo</option>
                                        <option value="B"></option>
                                    </select>
                                </div>
                            </div>     

                </div>
             
            </div>
        </div>
            <div role="tabpanel" class="tab-pane" id="salud">
                <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                       
                            <div class="col-md-12">
                                <div id="sidebar">
                                    <legend>Estudios</legend> 
                                </div>
                            </div>

                            <div class="input-group">
                                <span class="input-group-addon"><STRONG>Estudios:</STRONG></span>  
                            </div><br>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="almaMater">Institución de Educativa</label>
                                    <input type="text" class="form-control" placeholder="Institución de Educati..." name="almaMater" value="{{old('almaMater')}}">
                                 </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="nivelEstudio">Nivel de Estudios</label>
                                    <input type="text" class="form-control" placeholder="Nivel de Estudios..."  name="nivelEstudio" value="{{old('nivelEstudio')}}">
                                 </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="especialidad">Carrera</label>
                                    <input type="text" class="form-control" placeholder="Especialidad..." name="especialidad"  value="{{old('especialidad')}}">
                                 </div>
                            </div>

                            <div class="col-lg-3 col-sm-3 col-xs-12">
                                <div class="form-group">
                                    <label for="contrato">¿Titulado?</label>
                                    <input type="text" class="form-control" placeholder="Titulo..." name="titulo"  value="{{old('Titulo')}}">
                                    <input type="file"  name="file" value="{{old('foto')}}">  
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <div class="form-group">
                                    <label for="especialidad">Cédula</label>
                                    <input type="text" class="form-control" placeholder="Cédula..." name="Cédula"  value="{{old('Cédula')}}">
                                    <input type="file"  name="file" value="{{old('foto')}}">
                                 </div>
                            </div>

                            </div><br>
                            <br>
                         
                        </div>
                        <div>
    <fieldset class="fields2">
    <dl>
        <dt><label>¿Estudio Maestria?</label></dt>
        <dd>
            <input type="radio" name="trab" onclick="toggle3(this)" value="SI"> No <br>
            <input type="radio" name="trab" onclick="toggle3(this)" value="NO" > Si <br>
            
        </dd>
    </dl>
</fieldset>
 
<div id="cinco" style="display:none">
    
<div class="input-group">
                                 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="especialidad">Maestria</label>
                                    <input type="text" class="form-control" placeholder="Maestria..." name="especialidad"  value="{{old('especialidad')}}">
                                 </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">educativa
                                    <label for="especialidad">Institucion de </label>
                                    <input type="text" class="form-control" placeholder="inst.de la maestria..." name="especialidad"  value="{{old('especialidad')}}">
                                 </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="especialidad">¿Titulo?</label>
                                    <input type="text" class="form-control" placeholder="Titulo del Maestria..." name="especialidad"  value="{{old('especialidad')}}">
                                    <input type="file"  name="file" value="{{old('foto')}}">
                                 </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="especialidad">Cédula</label>
                                    <input type="text" class="form-control" placeholder="Cédula del maestria..." name="especialidad"  value="{{old('especialidad')}}"><input type="file"  name="file" value="{{old('foto')}}">
                                 </div>
                            </div><br>
                            <br>

</div>
 
</div>

</div>

<div>
    <fieldset class="fields2">
    <dl>
        <dt><label>¿estudio Doctorado?</label></dt>
        <dd>
            <input type="radio" name="tipo" onclick="toggle1(this)" value="1"> No <br>
            <input type="radio" name="tipo" onclick="toggle1(this)" value="2" > Si <br>
            
        </dd>
    </dl>
</fieldset>
 
<div id="primero" style="display:none">

<center><p>documentos</p></center>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="cedula">Doctorado en:</label>
                        <input type="text" class="form-control" placeholder="Inst.del Doctorado..."  name="cedula" value="{{old('cedula')}}">
                        </div>
                     </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label for="cedula">Institucion de Educativa</label>
                            <input type="text" class="form-control" placeholder="Titulo Doctorado..."  name="cedula" value="{{old('cedula')}}">
                        </div>
                    </div>
                         <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                             <div class="form-group">
                                 <label for="cedula">Titulado </label>
                                 <input type="text" class="form-control" placeholder="titulado Doctorado..."  name="cedula" value="{{old('cedula')}}">
                                 <input type="file"  name="file" value="{{old('foto')}}">
                        </div>
                     </div> 
                     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                             <div class="form-group">
                                 <label for="cedula">Cedula </label>
                                 <input type="text" class="form-control" placeholder="titulado Doctorado..."  name="cedula" value="{{old('cedula')}}">
                                 <input type="file"  name="file" value="{{old('foto')}}">
                        </div>
                     </div><br>  

</div>
</div>
<p>tut</p>
<div>
                        <fieldset class="fields2">
                            <dl>
                            <dt><label>¿Estudio Post Doctorado?</label></dt>
                            <dd>
                            <input type="radio" name="tipo_attach" onclick="toggle(this)" value="b" > si<br>
                            <input type="radio" name="tipo_attach" onclick="toggle(this)" value="a"> no<br>  
                            </dd>
                            </dl>
                            </fieldset>
 
                            <div id="uno" style="display:none">

                             <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="especialidad">PostDoctorado en:</label>
                                    <input type="text" class="form-control" placeholder="PostDoctorado..." name="especialidad"  value="{{old('especialidad')}}">
                                 </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="especialidad">Institucion de Educativa</label>
                                    <input type="text" class="form-control" placeholder="PostDoctorado..." name="especialidad"  value="{{old('especialidad')}}">
                                 </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="especialidad">Titulo</label>
                                    <input type="text" class="form-control" placeholder="Titulo del PostDoctorado..." name="especialidad"  value="{{old('especialidad')}}">
                                    <input type="file"  name="file" value="{{old('foto')}}">
                                 </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="especialidad">Cédula</label>
                                    <input type="text" class="form-control" placeholder="Cédula del PostDoctorado..." name="especialidad"  value="{{old('especialidad')}}">
                                    <input type="file"  name="file" value="{{old('foto')}}">
                                 </div>
                            </div><br>
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
  <div>
</div>
            <div class="form-group">
                <button type="submit" class="btn  btn-info  btn-block">
                    Guardar
                </button>  
            </div>
        {!!Form::close()!!}
        </div>
    </div>
    
  </div>
@endsection