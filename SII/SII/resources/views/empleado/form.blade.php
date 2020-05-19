@extends('layouts.app')

@section('content')
@push('editEmpleado')
<script type="text/javascript">
    $(document).ready(function(){

     function cargarpais(){
                $('#estado_id6 option:eq(<?= $empleado->estado_id; ?>)').prop('selected', true);   
    
    }

cargarpais();
     var valorEstado = $("#estado_id6").val();

    $.get("../../towns/" + valorEstado + "", function(response, state){
        //console.log(response);
        $("#town6").empty();
        for ( i = 0; i<response.length; i++) {
            $("#town6").append("<option value='"+ response[i].id +"' > "  + response[i].nombre + "</option>");

        }
    });
   
    });
$("#estado_id6").change(function (event) {
    $.get("../../towns/" + event.target.value + "", function(response, state){
        //console.log(response);
        $("#town6").empty();
        for ( i = 0; i<response.length; i++) {
            $("#town6").append("<option value='"+ response[i].id +"' > "  + response[i].nombre + "</option>");
        }
    });
});
</script>
@endpush
 


        <div class="row">
            <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading ">
                            <center><h4>Nuevo Empleado666</h4></center> 
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

<div class="nav nav-pills nav-justified">
    <div class="col-md-12 contenedor-datos">
        <div role="tabpanel">
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#basicos" aria-controls="basicos" data-toggle="tab" role="tab">Datos Básicos</a></li>
            <li role="presentation"><a href="#academicos" aria-controls="academicos" data-toggle="tab" role="tab">Datos Académicos</a></li>
            <li role="presentation"><a href="#estudios" aria-controls="estudios" data-toggle="tab" role="tab">Datos de Estudios</a></li>
             <li role="presentation"><a href="#salud" aria-controls="salud" data-toggle="tab" role="tab">Datos de Salud y Seguridad</a></li>
          </ul>

            <form action="{{url('/')}}/edit/empleado/{{$empleado->idEmpleado}}" method="POST" enctype="multipart/form-data">
  {{ csrf_field() }}
                <input type="hidden" name="tipo" value="6">          
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
                            <i class="glyphicon glyphicon-user"></i>
                            <i class="fa fa-circle fa-stack-1x top medium"></i>
                            <i class="fa fa-arrow-circle-up fa-stack-1x top"></i>
                            </span>
                                <div class="form-group">
                                    <label for="foto">Foto</label>
                                    <input type="file"  name="file" value="{{old('foto')}}" >
                                </div>
                            </div>
                        <div class="col-md-6">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group {{ $errors->has('nombreEmpleado') ? 'has-error' : ''}}">
                                    <label for="nombreEmpleado">Nombre</label>
                                    <input type="nombreEmpleado" name="nombreEmpleadpo" class="form-control" value="{{ $empleado->nombreEmpleado or ''}}" readonly>
                                </div>
                        </div>
                         
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group {{ $errors->has('txtParterno') ? 'has-error' : ''}}">
                                    <label for="txtParterno">Primer Apellido</label>
                                    <input type="text" required name="txtParterno" class="form-control" value="{{ $empleado->txtPaterno or ''}}" readonly>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group {{$errors->has('txtMaterno') ? 'has-error' : ''}}">
                                    <label for="txtMaterno">Segundo Apellido</label>
                                    <input type="text" name="txtMaterno" class="form-control" value="{{$empleado->txtMaterno or ''}}">
                                </div>
                            </div>

                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group {{$errors->has('fechaNacimiento')}}">
                                        <label for="fechaNacimiento">Fecha de Nacimiento</label>
                                        <input type="date" required name="fechaNacimiento" class="form-control" value="{{$empleado->fechaNacimiento or ''}}">
                                    </div>
                                </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                        <label for="estado_id">Estado de Nacimiento</label>
                                        <select name="estadoActual" id="estado_id2" class="form-control selectpicker" data-live-search="true">
                                            <option value="">Estado de Nacimiento</option>
                                                
                                        </select>  
                                    </div>
                            </div>

                                <div class="col-md-4">
                                <div class="form-group">
                                        <label for="town1">Municipio Nacimiento</label>
                                        {!!Form::select('town2', ['placeholder' => 'Selecciona'], null, ['id' => 'town2', 'class' => 'form-control', 'name' => 'municipioActual'])!!}
                                    </div>
                                </div>


                             <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group {{ $errors->has('genero') ? 'has-error' : ''}}">
                                    <label for="genero">Genero</label>
                                    <select class="form-control" name="genero">
                                        <option value="Hombre">H</option>
                                        <option value="Mujer">F</option>                
                                    </select>
                                </div>
                               
                            </div>

                             <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group {{$errors->has('claveCiudadana') ? 'has.error' : ''}}">
                                    <label for="claveCiudadana">Curp</label>
                                    <input type="text" class="form-control" name="claveCiudadana" value="{{$empleado->claveCiudadana or ''}}">  
                                 </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                     <div class="form-group {{ $errors->has('estadoCivil') ? 'has-error' : ''}}">
                                    <label for="estadoCivil">EStadoCivil</label>
                                    <select class="form-control" name="estadoCivil">
                                        <option value="C">Casado</option>
                                        <option value="S">Soltero</option> 
                                        <option value="D">Divorciado</option>
                                        <option value="V">Viuda</option>               
                                    </select>
                                </div>

                                </div><br>
                                <div class="col-md-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><STRONG>Domicilio & Localización:</STRONG></span>  
                                </div>
                                </div>
                                  <div class="col-md-12">
                                    <div class="form-group {{$errors->has('domicilio') ? 'has-error' : ''}}">
                                        <label for="domicilio">Domicilio</label>
                                        <input type="text" name="domicilio"  value="{{$empleado->domicilio or ''}}" class="form-control">
                                     </div>
                                </div>
 
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="estado_id">Estado</label>
                                        <select name="estadoActual" id="estado_id2" class="form-control selectpicker" data-live-search="true">
                                            <option value="">Estado de Nacimiento</option>
                                                
                                        </select>  
                                    </div>
                                </div> 

                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="town1">Municipio Nacimiento</label>
                                        {!!Form::select('town2', ['placeholder' => 'Selecciona'], null, ['id' => 'town2', 'class' => 'form-control', 'name' => 'municipioActual'])!!}
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group {{$errors->has('ciudad') ? 'has-error' : ''}}">
                                        <label for="domicilio">Ciudad o localidad</label>
                                        <input type="text" name="ciudad"  value="{{$empleado->ciudad or ''}}" class="form-control">
                                     </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group {{$errors->has('cp') ? 'has-error' : ''}}">
                                        <label for="cp">Codigo Postal</label>
                                        <input type="text" name="cp" class="form-control" value="{{$empleado->cp or ''}}">
                                     </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group {{$errors->has('telefono') ? 'has-error' : ''}}">
                                    <label for="telefono">Télefono</label>
                                    <input type="number" class="form-control" name="telefono" value="{{$empleado->telefono or ''}}">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group {{$errors->has('calular') ? 'has-error' : ''}}">
                                    <label for="celular">Celular</label>
                                    <input type="number" class="form-control" name="celular" value="{{$empleado->celular or ''}}">
                                </div>
                            </div>

                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group {{$errors->has('email') ? 'has-error' : ''}}">
                                        <label for="email">Email</label>
                                        <input type="email"  name="email" class="form-control" value="{{$empleado->email or ''}}">
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group {{$errors->has('facebook') ? 'has-error' : ''}}">
                                        <label for="facebook">Facebook</label>
                                        <input type="facebook"  name="facebook" class="form-control" value="{{$empleado->facebook or ''}}">
                                    </div>
                                </div>


                                                                
                        </div>
                        <div class="input-group">
                                <span class="input-group-addon"><STRONG> Salud:</STRONG></span>  
                            </div><br>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group {{$errors->has('numeroSeguroSocial')? 'has-error' : ''}}">
                                    <label for="numeroSeguroSocial">Numero de Seguro</label>
                                    <input type="numer" class="form-control" value="{{$empleado->numeroSeguroSocial or ''}}" name="numeroSeguroSocial" >
                                 </div>
                            </div>


                            <!--<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label for="rfc">RFC</label>
                                    <input type="text" class="form-control" placeholder="RFC..." name="rfc" value="{{old('rfc')}}">
                                 </div>
                            </div>-->

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group {{$errors->has('notasDescripcion') ? 'has-error' : ''}}">
                                    <label for="notasDescripcion">Notas (descripción)</label>
                                     <textarea type="textarea" class="form-control"  name="notasDescripcion" value="{{$empleado->notasDescripcion or ''}}">
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


                            <div class="col-lg-4 col-md-4 col-sm- col-xs-12">
                                <div class="form-group {{$errors->has('sueldo') ? 'has-error' : ''}}">
                                    <label for="sueldo">Sueldo</label>
                                    <input type="text" class="form-control" name="sueldo" value="{{$empleado->sueldo or ''}}">
                                </div>
                            </div>
                            <div class="col-md-12">
                        
                            <div class="input-group">
                                <span class="input-group-addon"><STRONG>Ingreso Laboral:</STRONG></span>  
                            </div><br>
                        </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group {{$errors->has('StatusActual') ? 'has-error' : ''}}">
                                    <label for="StatusActual">Status</label>
                                    <select class="form-control" name="StatusActual" value="StatusActual" >
                                        <option value="">Seleciona</option>
                                        <option value="A">Activo</option>
                                        <option value="B">Baja</option>
                                    </select>     
                                </div>   
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group {{$errors->has('fecha_Ingreso') ? 'has-error' : ''}}">
                                    <label for="Fecha_ingreso">Fecha Ingreso</label>
                                    <input type="date" name="Fecha_ingreso" class="form-control" value="{{$empleado->Fecha_ingreso or ''}}" >
                                 </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group {{$errors->has('Fecha_baja') ? 'has-error' : ''}}">
                                    <label for="Fecha_baja">Fecha Baja</label>
                                    <input type="date" name="Fecha_baja" class="form-control" value="{{$empleado->Fecha_baja or ''}}" >
                                 </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group {{$errors->has('direccion') ? 'has-error' : ''}}">
                                    <label for="direccion">Direccion</label>
                                    <select class="form-control selectpicker" name="direccion">
                                            <option value="">Seleciona</option>
                                            <option value="REC">Rectoría</option>
                                            <option value="ADM">Dirección de Administración y Finanzas</option>
                                            <option value="VIN"> Dirección de Vinculación </option>
                                            <option value="DCA">Dirección de Carreras</option>

                                        </select>
                                </div>
                            </div>

                            <!--<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label for="area">Área o Departamento</label>
                                    <select class="form-control selectpicker" data-live-search="true"  name="statusEmple" value="" required>
                                        <option value="DCE">Depto. de Control Escolar</option>
                                        <option value="DSA">Depto. de Servicios Administrativos</option>
                                        <option value="DEA">Depto. de Actividades Extracurriculares</option>
                                        <option value="B"></option>
                                    </select>
                                </div>
                            </div>-->
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group {{$errors->has('cargo') ? 'has-error' : ''}}">
                                    <label for="cargo">Cargo</label>
                                    <select class="form-control selectpicker" data-live-search="true" name="estadoCivil" value="">
                                            <option value="">Seleciona</option>
                                            <option value="Rec">Rector</option>
                                            <option value="Dir">Director</option>
                                            <option value="JD">Jefe de Departamento</option>
                                            <option value="IS">Ingeniro en Sistemas</option>
                                            <option value="C">Coordinador</option>
                                            <option value="JO">Jefe de Oficina</option>
                                            <option value="AA">Analista Administrativo</option>
                                            <option value="SM">Servivios y Mantenimiento</option>
                                            <option value="SR">Secretatio(a) del Rector</option>
                                            <option value="PA">Profesor de Asignatura</option>
                                            <option value="PTC">Profesor de Tiempo Completo</option>
                                        </select>
                                </div>
                            </div>
                            
                            <div class="col-lg-4 col-md-4 col-sm- col-xs-12">
                                <div class="form-group {{$errors->has('contrato') ? 'has-error' : ''}}">
                                    <label for="contrato">Contrato</label>
                                    <select class="form-control selectpicker" data-live-search="true"  name="contrato" value="">
                                        <option value="">Tipo de contrato:</option>
                                        <option value="A">Temporal</option>
                                        <option value="B">Fijo</option>
                                        <option value="B"></option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group {{$errors->has('cedulaFiscal') ? 'has-error' : ''}}">
                                    <label for="cedulaFiscal">RFC</label>
                                    <input type="text" class="form-control"  name="cedulaFiscal" value="{{$empleado->cedulaFiscal or ''}}">
                                 </div>
                            </div>

                             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><STRONG>Empleo Anterior</STRONG></span>  
                            </div><br>
                            </div>
                            
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group {{$errors->has('departamentoAnterior') ? 'has-error' : ''}}">
                                    <label for="departamentoAnterior">Área o Departamento</label>
                                    <select class="form-control selectpicker" data-live-search="true"  name="departamentoAnterior" value="">
                                        <option value="">Profesor de:</option>
                                        <option value="A">matematicas</option>
                                        <option value="B">Ingles</option>
                                        <option value="B">Fránces</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group {{$errors->has('cargoAnterior') ? 'has-error' : ''}}">
                                    <label for="cargoAnterior">Cargo</label>
                                    <input type="text" class="form-control" name="cargo" value="{{$empleados->cargoAnterior or ''}}">
                                </div>
                            </div>
                            
                            <div class="col-lg-4 col-md-4 col-sm- col-xs-12">
                                <div class="form-group {{$errors->has('empresaAnterior') ? 'has-error' : ''}}">
                                    <label for="empresaAnterior">EmpresaAnterior</label>
                                    <input type="text" class="form-control" name="empresaAnterior" value="{{$empleados->empresaAnterior or ''}}">
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
                                <div class="form-group {{$errors->has('institucionAcademica') ? 'has-error' : ''}}">
                                    <label for="institucionAcademica">Institución de Educativa</label>
                                    <input type="text" class="form-control" name="institucionAcademica" value="{{$empleado->institucionAcademica}}">
                                 </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group {{$errors->has('nivelEstudio')? 'has-error' : ''}}">
                                    <label for="nivelEstudio">Nivel de Estudios</label>
                                    <input type="text" class="form-control"  name="nivelEstudio" value="{{$empleado->nivelEstudio or ''}}">
                                 </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group {{$errors->has('carrera')? 'has-error' : ''}}">
                                    <label for="carrera">Carrera</label>
                                    <input type="text" class="form-control"  name="carrera"  value="{{$Empleado->carrera or ''}}">
                                 </div>
                            </div>

                            <div class="col-lg-3 col-sm-3 col-xs-12">
                                <div class="form-group {{$errors->has('titulado') ? 'has-error' : ''}}">
                                    <label for="titulado">¿Titulado?</label>
                                    <input type="text" class="form-control" name="titulo"  value="{{$empleado->titulado or ''}}">
                                    <input type="file"  name="file" value="{{old('foto')}}">  
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <div class="form-group {{$errors->has('cedula') ? 'has-error' : ''}}">
                                    <label for="cedula">Cédula</label>
                                    <input type="text" class="form-control" name="cédula"  value="{{$empleado->cedula or ''}}">
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




