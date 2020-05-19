 @extends('layouts.admin')

@section('menuTabs')
        <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading ">
                            <center><h4>Nuevo Empleado</h4></center> 
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
            <li role="presentation"><a href="#academicos" aria-controls="academicos" data-toggle="tab" role="tab">Datos Académicos</a></li>
            <li role="presentation"><a href="#estudios" aria-controls="estudios" data-toggle="tab" role="tab">Datos de Estudios</a></li>
             <li role="presentation"><a href="#salud" aria-controls="salud" data-toggle="tab" role="tab">Datos de Salud y Seguridad</a></li>
          </ul>

      <form role="form-signin"  id="" method="POST" action="" enctype="multipart/form-data">  
       {{ csrf_field() }}
        <input type="hidden" name="tipo" value="6">
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
                                    <input type="text" required name="nombre" class="form-control" value="{{old('nombre')}}" placeholder="Nombres...">
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
                                        <label for="txtPaterno">Apellido Paterno</label>
                                        <input type="txtPaterno" required name="txtPaterno" class="form-control" value="{{old('txtPaterno')}}" placeholder="Apellido Paterno...">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="txtMaterno">Apellido Materno</label>
                                        <input type="text" required name="txtMaterno" class="form-control" value="{{old('txtMaterno')}}" placeholder="Apellido Materno...">
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
                                        <label for="Fecha_nacimiento">Fecha de Nacimiento</label>
                                        <input type="date" required name="Fecha_nacimiento" class="form-control" value="">
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="estado_id">Estado de Nacimiento</label>
                                        <select name="estadoNacimiento" id="estado_id3" class="form-control " >
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
                                        <label for="town">Lugar de Nacimiento</label>
                                        {!!Form::select('town3', ['placeholder' => 'Selecciona'], null, ['id' => 'town3', 'class' => 'form-control', 'name' => 'municipioNacimiento'])!!}
                                    </div>
                                </div>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-addon"><STRONG>Domicilio y Localización:</STRONG></span>  
                                </div>
                                <br>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="estado_id">Estado</label>
                                        <select name="estadoActual" id="estado_id4" class="form-control ">
                                            <option value="">Estado</option>
                                                @foreach($state as $u)
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
                                        {!!Form::select('town4', ['placeholder' => 'Selecciona'], null, ['id' => 'town4', 'class' => 'form-control', 'name' => 'municipioActual'])!!}
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
                                        <label for="cp">CP</label>
                                        <input type="text" name="cp" required  placeholder="Código Postal..." class="form-control" value="{{old('cp')}}">
                                     </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="domicilio">Domicilio</label>
                                        <input type="text" name="domicilio"  value="{{old('domicilio')}}" class="form-control" placeholder="Domicilio...">
                                     </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="estadoCivil">Estado Civil</label>
                                        <select class="form-control selectpicker" data-live-search="true" name="estadoCivil" value="">
                                            <option value="">Seleciona</option>
                                            <option value="S">Soltero(a)</option>
                                            <option value="C">Casado(a)</option>
                                            <option value="U">Unión Libre</option>
                                            <option value="D">Divorciado(a)</option>
                                            <option value="V">Viudo(a)</option>
                                        </select>     
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="telefono">Télefono</label>
                                        <input type="number" name="telefono"   placeholder="Télefono..." class="form-control" value="{{old('telefono')}}" >
                                     </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="domicilio">Celular</label>
                                        <input type="numer" name="celular"  value="{{old('celular')}}" class="form-control" placeholder="Celular...">
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

                            <div class="input-group">
                                <span class="input-group-addon"><STRONG>Ingreso Laboral:</STRONG></span>  
                            </div><br>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label for="numEmpleado">No. Empleado</label>
                                    <input type="text" name="numEmpleado"   placeholder="No. Empleado..." class="form-control" value="{{old('numEmpleado')}}" >
                                 </div>
                            </div>
                                                
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label for="Fecha_ingreso">Ingreso</label>
                                    <input type="date" name="Fecha_ingreso"   placeholder="Ingreso..." class="form-control" value="{{old('Fecha_ingreso')}}" >
                                 </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label for="Fecha_baja">Baja</label>
                                    <input type="date" name="Fecha_baja"  placeholder="Baja..." class="form-control" value="{{old('Fecha_baja')}}" >
                                 </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="departamento">Departamento</label>
                                    <input type="text" name="departamento"  placeholder="Departamento..." class="form-control" value="{{old('departamento')}}" >
                                 </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="cargo">Cargo</label>
                                    <input type="text" name="cargo"   placeholder="Cargo..." class="form-control" value="{{old('cargo')}}" >
                                 </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label for="contrato">Contrato</label>
                                    <input type="text" name="contrato"   placeholder="Contrato..." class="form-control" value="{{old('contrato')}}" >
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm- col-xs-12">
                                <div class="form-group">
                                    <label for="sueldo">Sueldo</label>
                                    <input type="text" class="form-control" placeholder="Sueldo..." name="sueldo" value="{{old('sueldo')}}">
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label for="contrato">Status Actual</label>
                                    <select class="form-control selectpicker" data-live-search="true" name="statusEmple" value="" required>
                                        <option value="">Seleciona</option>
                                        <option value="A">Activo</option>
                                        <option value="B">Baja</option>
                                    </select>     
                                </div>
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon"><STRONG>Otros:</STRONG></span>  
                            </div><br>
                            <div class="form-group">
                                <label for="telefonoOficceEmple">Télefono Oficina</label>
                                <input type="number" name="telefonoOficceEmple"   placeholder="Télefono Oficina..." class="form-control" value="{{old('telefonoOficceEmple')}}" >
                            </div>
                            </div>
                        </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="estudios">  
                       <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                       
                            <div class="col-md-12">
                                <div id="sidebar">
                                    <legend>Datos de Estudios</legend> 
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label for="almaMater">Institución de Estudios</label>
                                    <input type="text" class="form-control" placeholder="Institución de Estudios..." name="almaMater" value="{{old('almaMater')}}">
                                 </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label for="nivelEstudio">Nivel de Estudios</label>
                                    <input type="text" class="form-control" placeholder="Nivel de Estudios..."  name="nivelEstudio" value="{{old('nivelEstudio')}}">
                                 </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label for="titulado">Titulado</label>
                                    <input type="text" class="form-control" placeholder="Titulado..." name="titulado" value="{{old('titulado')}}">
                                 </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="cedula">Cédula Profecional</label>
                                    <input type="text" class="form-control" placeholder="Cédula Profecional..."  name="cedula" value="{{old('cedula')}}">
                                 </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="especialidad">Especialidad</label>
                                    <input type="text" class="form-control" placeholder="Especialidad..." name="especialidad"  value="{{old('especialidad')}}">
                                 </div>
                            </div>

                            <div class="input-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <span class="input-group-addon"><STRONG>Trabajos Anteriores</STRONG></span>  
                            </div><br>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="anteriorTrabajoEmple">Trabajo</label>
                                    <input type="text" class="form-control" placeholder="Trabajo" name="anteriorTrabajoEmple" value="{{old('anteriorTrabajoEmple')}}">
                                 </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="cargoAnteriorEmple">Cargo</label>
                                    <input type="text" class="form-control" placeholder="Cargo..." name="cargoAnteriorEmple" value="{{old('cargoAnteriorEmple')}}">
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
                <div role="tabpanel" class="tab-pane" id="salud">
                                           <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                       
                            <div class="col-md-12">
                                <div id="sidebar">
                                    <legend>Datos de Salud y Seguridad</legend> 
                                </div>
                            </div>

                             <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label for="numeroSeguro">No de Seguro</label>
                                    <input type="numer" class="form-control" placeholder="No de Seguro.." value="{{old('numeroSeguro')}}" name="numeroSeguro" >
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
                                    <label for="rfc">RFC</label>
                                    <input type="text" class="form-control" placeholder="RFC..." name="rfc" value="{{old('rfc')}}">
                                 </div>
                            </div>


                            <div class="input-group">
                                <span class="input-group-addon"><STRONG>Persona de Contacto para Emergencias</STRONG></span>  
                            </div><br>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label for="persona_Contacto_Emple">Persona</label>
                                    <input type="text" class="form-control" placeholder="Persona..." name="persona_Contacto_Emple" value="{{old('persona_Contacto_Emple')}}">
                                 </div>
                            </div>


                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label for="telefono_Contacto_Emple">Télefono</label>
                                    <input type="text" class="form-control" id="telefono" placeholder="Télefono..." name="telefono_Contacto_Emple" value="{{old('telefono_Contacto_Emple')}}">
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
      </form>
        </div>
    </div>
</div>

        <!-- /#page-wrapper -->
@endsection




