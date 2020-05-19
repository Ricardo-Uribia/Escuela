 @extends('layouts.admin')

@section('menuTabs')

  <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading ">
                            <center><h4>Nuevo Profesor</h4></center> 

                               

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

  <div class="tab-content">
    <div class="col-md-12 contenedor-datos">
        <div role="tabpanel">
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#basicos" aria-controls="basicos" data-toggle="tab" role="tab">Datos Básicos</a></li>
            <li role="presentation"><a href="#academicos" aria-controls="academicos" data-toggle="tab" role="tab">Datos Laborales</a></li>
            <li role="presentation"><a href="#salud" aria-controls="salud" data-toggle="tab" role="tab">Estudios y otros</a></li>
          </ul>

 
 {!!Form::open([ 'method' => 'POST', 'files' => 'true'])!!} 
  {{ csrf_field() }}
       <input type="hidden" name="tipo" value="2">
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active"  id="basicos">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="col-md-12">
                            <div id="sidebar">
                                <legend>Datos Básicos</legend> 
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group was-validated">
                                <label for="nombre">Nombres</label>
                                <input type="text" required name="nombre" class="form-control" value="{{$emple->NombreEmpleado }}" placeholder="Nombres..." readonly="readonly">
                            </div>
                        </div>
                         <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="foto">Foto</label>
                                    <input type="file"  name="file" class="form-control" value="{{old('foto')}}" >
                                </div>
                            </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label for="txtParterno">Apellido Paterno</label>
                                    <input type="txtParterno" required name="txtPaterno" class="form-control" value="{{$emple->txtPaterno}}" placeholder="Apellido Paterno..." readonly="readonly" >
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label for="txtMaterno">Apellido Materno</label>
                                    <input type="text" required name="txtMaterno" class="form-control" value="{{$emple->txtMaterno}}" placeholder="Apellido Materno..." readonly="readonly">
                                </div>
                            </div>
                             <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label for="genero">Genero</label>
                                    <select name="genero"   class="form-control selectpicker" data-live-search="true" required>

                                        @if($emple->genero == 'M')
                                        <option value="">Seleciona</option>
                                        <option value="M" selected>Masculino</option>
                                        <option value="F">Femenino</option>
                                        @else
                                        <option value="">Seleciona</option>
                                        <option value="M" >Masculino</option>
                                        <option value="F" selected>Femenino</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                           
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="Fecha_nacimiento">Fecha de Nacimiento</label>
                                        <input type="date" required name="Fecha_nacimiento" class="form-control" value="{{$emple->fechaNacimiento}}">
                                    </div>
                                </div>
    
                                 @if(is_null($empleMunicipio))
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="estado_id">Estado</label>
                                        <select name="estadoActual" id="estado_id8" class="form-control selectpicker" data-live-search="true">
                                            <option value="">Estado</option>
                                                @foreach($estados as $u)
                                                    <option  value="{{$u['id']}}">
                                                        {{$u['NOMBRE']}}
                                                    </option>
                                                @endforeach
                                        </select>  
                                    </div>
                                </div> 
                
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="town1">Ciudad</label>
                                        {!!Form::select('town8', ['placeholder' => 'Selecciona'], null, ['id' => 'town8', 'class' => 'form-control', 'name' => 'municipioActual'])!!}
                                    </div>
                                </div>
                                  @else
                                     <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="estado_id">Estado de Nacimiento</label>
                                        <input type="text" name="estadoNacimiento" id="estado_id" class="form-control" value="{{$emple->estado->NOMBRE}}" disabled>  
                                    </div>
                                </div> 
                
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="town">Lugar de Nacimiento</label>
                                        <input type="text" name="municipioNacimiento" class="form-control" value="{{$Municipio->nombre}}">
                                    </div>
                                </div>
                                  @endif
        
                               

                                          <br>
                                <div class="input-group">
                                    <span class="input-group-addon"><STRONG>Domicilio y Localización:</STRONG></span>  
                                </div>
                                <br>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="estado_id">Estado</label>
                                        <select name="estadoActual" id="estado_id10" class="form-control selectpicker" data-live-search="true">
                                            <option value="">Estado</option>
                                                @foreach($estados as $u)
                                                    <option  value="{{$u['id']}}">
                                                        {{$u['NOMBRE']}}
                                                    </option> 
                                                @endforeach
                                        </select>  
                                    </div>
                                </div> 

                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="town1">Ciudad</label>
                                        {!!Form::select('town10', ['placeholder' => 'Selecciona'], null, ['id' => 'town10', 'class' => 'form-control', 'name' => 'municipioActual'])!!}
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email"  name="email" class="form-control" value="{{$emple->email}}" placeholder="Email...">
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="cp">CP</label>
                                        <input type="text" name="cp" required  placeholder="Código Postal..." class="form-control" value="{{$emple->cp}}">
                                     </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="domicilio">Domicilio</label>
                                        <input type="text" name="domicilio"  value="{{$emple->domicilio}}" class="form-control" placeholder="Domicilio...">
                                     </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="estadoCivil">Estado Civil</label>
                                        <select name="estadoCivil" value="" class="form-control" >
                                        @if($emple->estadoCivil == 'S')
                                            <option value="">Seleciona</option>
                                            <option value="S" selected>Soltero(a)</option>
                                            <option value="C">Casado(a)</option>
                                            <option value="U">Unión Libre</option>
                                            <option value="D">Divorciado(a)</option>
                                            <option value="V">Viudo(a)</option>
                                        @elseif($emple->estadoCivil == 'C')
                                            <option value="">Seleciona</option>
                                            <option value="S">Soltero(a)</option>
                                            <option value="C" selected>Casado(a)</option>
                                            <option value="U">Unión Libre</option>
                                            <option value="D">Divorciado(a)</option>
                                            <option value="V">Viudo(a)</option>
                                        @elseif($emple->estadoCivil == 'U')
                                            <option value="">Seleciona</option>
                                            <option value="S">Soltero(a)</option>
                                            <option value="C" >Casado(a)</option>
                                            <option value="U" selected>Unión Libre</option>
                                            <option value="D">Divorciado(a)</option>
                                            <option value="V">Viudo(a)</option>
                                        @elseif($emple->estadoCivil == 'D')
                                            <option value="">Seleciona</option>
                                            <option value="S">Soltero(a)</option>
                                            <option value="C" >Casado(a)</option>
                                            <option value="U" >Unión Libre</option>
                                            <option value="D" selected>Divorciado(a)</option>
                                            <option value="V">Viudo(a)</option>
                                        @else
                                            <option value="">Seleciona</option>
                                            <option value="S">Soltero(a)</option>
                                            <option value="C" >Casado(a)</option>
                                            <option value="U" >Unión Libre</option>
                                            <option value="D" >Divorciado(a)</option>
                                            <option value="V" selected>Viudo(a)</option>
                                        @endif
                                        </select>     
                                    </div>
                                </div>

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
            </div>
            <div role="tabpanel" class="tab-pane" id="academicos">
            
               <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                       
                            <div class="col-md-12">
                                <div id="sidebar">
                                    <legend>Datos Académicos</legend> 
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label for="numEmpleado">No. Empleado</label>
                                    <input type="text" name="numEmpleado" required  placeholder="No. Empleado..." class="form-control" value="{{$emple->NumEmpleado}}" >
                                 </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label for="claveProfe">Cláve Profesor</label>
                                   <input type="text" class="form-control" placeholder="Cláve Profesor" required name="claveProfe" value="{{$emple->profesores[0]->ClaveProfesor}}">
                                 </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm- col-xs-12">
                                <div class="form-group">
                                    <label for="sueldo">Sueldo</label>
                                    <input type="text" class="form-control" placeholder="Sueldo..." name="sueldo" value="{{$emple->sueldo}}">
                                </div>
                            </div>

                            <div class="input-group">
                                <span class="input-group-addon"><STRONG>Ingreso Laboral:</STRONG></span>  
                            </div><br>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label for="Fecha_ingreso">Ingreso</label>
                                    <input type="date" name="Fecha_ingreso" required  placeholder="Ingreso..." class="form-control" value="{{$emple->fecha_Ingreso}}" >
                                 </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label for="Fecha_baja">Baja</label>
                                    <input type="date" name="Fecha_baja"  placeholder="Baja..." class="form-control" value="{{$emple->fecha_Baja}}" >
                                 </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><STRONG>Horas:</STRONG></span>  
                            </div><br>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm- col-xs-12">
                                <div class="form-group">
                                    <label for="sueldo">Administrativas</label>
                                    <input type="number" class="form-control" placeholder="Administrativas.." name="horasAdmin" value="{{$emple->profesores[0]->HorasAdmin}}">
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm- col-xs-12">
                                <div class="form-group">
                                    <label for="sueldo">Investigación</label>
                                    <input type="number" class="form-control" placeholder="Investigación.." name="horasInves" value="{{$emple->profesores[0]->HorasInvestigacion}}">
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm- col-xs-12">
                                <div class="form-group">
                                    <label for="sueldo">Docencia</label>
                                    <input type="number" class="form-control" placeholder="Docencia.." name="docencia" value="{{$emple->profesores[0]->HorasDocencia}}">
                                </div>
                            </div>

                             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><STRONG>Otros:</STRONG></span>  
                            </div><br>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="sueldo">Departamento</label>
                                    <input type="departamento" class="form-control" placeholder="Departamento.." name="departamento" value="{{$emple->departamento}}">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="cargo">Cargo</label>
                                    <input type="text" class="form-control" placeholder="Cargo.." name="cargo" value="{{$emple->cargo}}">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="telefono">Télefono</label>
                                    <input type="number" class="form-control" placeholder="Télefono" name="telefono" value="{{$emple->telefono}}">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="celular">Celular</label>
                                    <input type="number" class="form-control" placeholder="Celular" name="celular" value="{{$emple->celular}}">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm- col-xs-12">
                                <div class="form-group">
                                    <label for="contrato">Contrato</label>
                                    <input type="text" class="form-control" placeholder="Contrato.." name="contrato" value="{{$emple->contrato}}">
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label for="contrato">Status Actual</label>
                                    <select class="form-control selectpicker" data-live-search="true"  name="statusEmple" value="" required>
                                        <option value="">Seleciona</option>
                                        <option value="A">Activo</option>
                                        <option value="B">Baja</option>
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
                                    <legend>Estudios y Otros</legend> 
                                </div>
                            </div>

                            <div class="input-group">
                                <span class="input-group-addon"><STRONG>Estudios:</STRONG></span>  
                            </div><br>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label for="almaMater">Institución de Estudios</label>
                                    <input type="text" class="form-control" placeholder="Institución de Estudios..." name="almaMater" value="{{$emple->institucionEstudios}}">
                                 </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label for="nivelEstudio">Nivel de Estudios</label>
                                    <input type="text" class="form-control" placeholder="Nivel de Estudios..." required name="nivelEstudio" value="{{$emple->nivelEstudios}}">
                                 </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label for="titulado">Titulado</label>
                                    <input type="text" class="form-control" placeholder="Titulado..." name="titulado" value="{{$emple->titulado}}">
                                 </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="cedula">Cédula Profecional</label>
                                    <input type="text" class="form-control" placeholder="Cédula Profecional..." required name="cedula" value="{{$emple->cedulaProfecional}}">
                                 </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="especialidad">Especialidad</label>
                                    <input type="text" class="form-control" placeholder="Especialidad..." name="especialidad" required value="{{$emple->especialidad}}">
                                 </div>
                            </div>

                            <div class="input-group">
                                <span class="input-group-addon"><STRONG> Salud:</STRONG></span>  
                            </div><br>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label for="numeroSeguro">No de Seguro</label>
                                    <input type="numer" class="form-control" placeholder="No de Seguro.." value="{{$emple->numeroSeguroSocial}}" name="numeroSeguro" >
                                 </div>
                            </div>

                             <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label for="curp">Curp</label>
                                    <input type="text" class="form-control" placeholder="Curp..." name="curp" value="{{$emple->claveCiudadana}}">  
                                 </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label for="rfc">RFC</label>
                                    <input type="text" class="form-control" placeholder="RFC..." name="rfc" value="{{$emple->cedulaFiscal}}">
                                 </div>
                            </div>
                            </div>
                </div>
            </div>
          </div>
            <div class="form-group">
                <button type="submit" class="btn  btn-success  btn-block">
                    Guardar
                </button>  
            </div>
        {!!Form::close()!!}
        </div>
    </div>
    
  </div>
@endsection