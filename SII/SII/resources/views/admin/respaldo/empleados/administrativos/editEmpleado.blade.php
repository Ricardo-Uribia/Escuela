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

            <form action="{{url('/')}}/edit/empleado/{{$emple->id}}" method="POST" enctype="multipart/form-data">
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
                                <input type="text" required name="nombre" class="form-control" value="{{$emple->NombreEmpleado }}" placeholder="Nombres..." readonly="readonly">
                            </div>
                        </div>
                         <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="foto">Foto</label>
                                    <input type="file"  name="fotoEmpleado" class="form-control" value="{{old('foto')}}" >
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
                                        <select name="estadoActual" id="estado_id7" class="form-control selectpicker" data-live-search="true">
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
                                        {!!Form::select('town7', ['placeholder' => 'Selecciona'], null, ['id' => 'town7', 'class' => 'form-control', 'name' => 'municipioActual'])!!}
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
                                        <select name="estadoActual" id="estado_id6" class="form-control selectpicker" data-live-search="true">
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
                                        {!!Form::select('town6', ['placeholder' => 'Selecciona'], null, ['id' => 'town6', 'class' => 'form-control', 'name' => 'municipioActual'])!!}
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

                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
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

                                 <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label for="telefono">Télefono</label>
                                    <input type="number" class="form-control" placeholder="Télefono" name="telefono" value="{{$emple->telefono}}">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label for="celular">Celular</label>
                                    <input type="number" class="form-control" placeholder="Celular" name="celular" value="{{$emple->celular}}">
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
                                    <input type="text" name="numEmpleado" required  placeholder="No. Empleado..." class="form-control" value="{{$emple->NumEmpleado}}" >
                                 </div>
                            </div>
                            
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

                             <div class="col-lg-4 col-md-4 col-sm- col-xs-12">
                                <div class="form-group">
                                    <label for="contrato">Contrato</label>
                                    <input type="text" class="form-control" placeholder="Contrato.." name="contrato" value="{{$emple->contrato}}">
                                </div>
                            </div>


                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label for="sueldo">Sueldo</label>
                                    <input type="text" class="form-control" placeholder="Sueldo..." name="sueldo" value="{{$emple->sueldo}}">
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label for="contrato">Status Actual</label>
                                    <select class="form-control selectpicker" data-live-search="true"  name="statusEmple" value="" required>
                                         @if($emple->StatusActual == 'A')
                                        <option value="">Seleciona</option>
                                        <option value="A" selected>Activo</option>
                                        <option value="B">Baja</option>
                                        @else
                                        <option value="">Seleciona</option>
                                        <option value="A">Activo</option>
                                        <option value="B" selected>Baja</option>
                                        @endif
                                    </select>     
                                </div>
                            </div>
                           
                             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><STRONG>Otros:</STRONG></span>  
                            </div><br>
                            </div>
                            
                           <div class="form-group">
                                <label for="telefonoOficceEmple">Télefono Oficina</label>
                                <input type="number" name="telefonoOficceEmple"   placeholder="Télefono Oficina..." class="form-control" value="{{$emple->administrativos[0]->Telefono_Oficina}}" >
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
                                <span class="input-group-addon"><STRONG>Trabajos Anteriores:</STRONG></span>  
                            </div><br>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="anteriorTrabajoEmple">Trabajo</label>
                                    <input type="text" class="form-control" placeholder="Trabajo" name="anteriorTrabajoEmple" value="{{$emple->administrativos[0]->Trabajo_Anterior}}">
                                 </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="cargoAnteriorEmple">Cargo</label>
                                    <input type="text" class="form-control" placeholder="Cargo..." name="cargoAnteriorEmple" value="{{$emple->administrativos[0]->Cargo_Anterior}}">
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

                               <div class="input-group">
                                <span class="input-group-addon"><STRONG>Persona de Contacto para Emergencias</STRONG></span>  
                            </div><br>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label for="persona_Contacto_Emple">Persona</label>
                                    <input type="text" class="form-control" placeholder="Persona..." name="persona_Contacto_Emple" value="{{$emple->administrativos[0]->Emergencia_Persona}}">
                                 </div>
                            </div>


                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label for="telefono_Contacto_Emple">Télefono</label>
                                    <input type="text" class="form-control" id="telefono" placeholder="Télefono..." name="telefono_Contacto_Emple" value="{{$emple->administrativos[0]->Emergencia_Telefono}}">
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




