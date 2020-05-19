 @extends('layouts.admin')

@section('menuTabs')
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
                            <center><h4><STRONG></STRONG>Datos del Empleado</STRONG></h4></center> 
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
            <li role="presentation"><a href="#estudios" aria-controls="estudios" data-toggle="tab" role="tab">Estudios & Otros</a></li>
             <!--<li role="presentation"><a href="#salud" aria-controls="salud" data-toggle="tab" role="tab">Datos de Salud y Seguridad</a></li>-->
          </ul>

            <form action="{{url('/')}}/act/empleado/{{$empleado->idEmpleado}}" method="POST" enctype="multipart/form-data">
  {{ csrf_field() }}
                <input type="hidden" name="tipo" value="6">
                <div class="tab-content">       
                    <div role="tabpanel" class="tab-pane active"  id="basicos">
                        <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="col-md-12">
                            
                        </div>
                        <div id="mio" class="input-group">
                        <span class="input-group-addon"><STRONG>Identidad</STRONG></span>  
                        </div><br> 

                         <div class="col-md-4">
                                <div class="form-group">
                                    <label for="foto">Foto</label>
                                    <input type="file"  name="fotoEmpleado" class="form-control" value="{{old('foto')}}" >
                                </div>
                            </div>

                        <div class="col-md-6">
                            <div class="form-group was-validated">
                                <label for="nombre">Nombres</label>
                                <input type="text" required name="nombre" class="form-control" value="{{$empleado->NombreEmpleado }}"  readonly="readonly">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="txtParterno">Apellido Paterno</label>
                                    <input type="txtParterno" required name="txtPaterno" class="form-control" value="{{$empleado->txtPaterno}}" placeholder="Apellido Paterno..." readonly="readonly" >
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="txtMaterno">Apellido Materno</label>
                                    <input type="text" required name="txtMaterno" class="form-control" value="{{$empleado->txtMaterno}}"  readonly="readonly">
                                </div>
                            </div>
                                                        
                            
                            
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group {{$errors->has('estadoz') ? 'has-error' : ''}}">   
                                    <label for="estadoz" >Estado</label>
                                        <input type="estadoz" name="estadoz" class="form-control" value="{{$empleado->estadoz}}" readonly="readonly">  
                                    </div>
                                </div> 

                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="municipio">Municipio</label>
                                        <input type="text" required name="municipio" class="form-control" value="{{$empleado->municipio}}" readonly="readonly" >
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="ciudad">Ciudad</label>
                                        <input type="text" name="ciudad" class="form-control" readonly="readonly" value="{{$empleado->ciudad}}" disabled>  
                                    </div>
                                </div> 
            
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group {{$errors->has('fechaNacimiento') ? 'has-error' : ''}}">
                                        <label for="fechaNacimiento">Fecha de Nacimiento</label>
                                        <input type="date" required name="fechaNacimiento" class="form-control" value="{{$empleado->fechaNacimiento or ''}}" readonly="readonly">
                                    </div>
                                </div>

                             <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label for="genero">Genero</label>
                                    <input type="select" name="genero"  value="{{$empleado->genero or ''}}" class="form-control" readonly="readonly">
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label for="curp">Curp</label>
                                    <input type="text" class="form-control"  name="curp" value="{{$empleado->claveCiudadana}}" readonly="readonly">  
                                 </div>
                            </div>

                             <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="estadoCivil">Estado Civil</label>
                                        <input type="estadoCivil" name="estadoCivil"  value="{{$empleado->estadoCivil or ''}}" class="form-control" readonly="readonly">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><STRONG>Domicilio y Localización:</STRONG></span>  
                                </div>
                            </div>
                                <br>

                                <div class="col-md-12">
                                    <div class="form-group {{$errors->has('domicilio') ? 'has-error' : ''}}"">
                                        <label for="domicilio">Domicilio</label>
                                        <input type="text" name="domicilio"  value="{{$empleado->domicilio or ''}}" class="form-control" readonly="readonly">
                                     </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group {{$errors->has('estadoActual') ? 'has-error' : ''}}">   
                                    <label for="estadoActual" >estadoActual</label>
                                       <input type="estadoActual" name="estadoActual" class="form-control" value="{{$empleado->estadoActual}}" readonly="readonly">
                                    </div>
                                </div> 

                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="muniActual">Municipio</label>
                                        <input type="text" required name="muniActual" class="form-control" value="{{$empleado->muniActual}}" readonly="readonly" >
                                    </div>
                                </div>

                            
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="ciudadActual">Ciudad</label>
                                        <input type="text" name="ciudadActual" readonly="readonly" class="form-control" value="{{$empleado->ciudadActual}}" disabled>  
                                    </div>
                                </div> 
                                

                               

                                <!--<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label for="telefono">Télefono</label>
                                    <input type="number" class="form-control"  name="telefono" value="{{$empleado->telefono}}" readonly="readonly">
                                </div>
                            </div>-->
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label for="celular">Celular</label>
                                    <input type="number" class="form-control"  name="celular" value="{{$empleado->celular}}" readonly="readonly">
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email"  name="email" class="form-control" value="{{$empleado->email}}"  readonly="readonly">
                                    </div>
                                </div>

                                <!--<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="facebook">Facebook</label>
                                        <input type="facebook"  name="facebook" class="form-control" value="{{$empleado->facebook}}" readonly="readonly">
                                    </div>
                                </div>-->

                                <div class="col-md-12">
                                <div class="input-group">
                                <span class="input-group-addon"><STRONG> Salud:</STRONG></span>  
                            </div>
                        </div><br>

                            <!--<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label for="numeroSeguroSocial">No de Seguro</label>
                                    <input type="numer" class="form-control"  value="{{$empleado->numeroSeguroSocial}}" name="numeroSeguroSocial" readonly="readonly">
                                 </div>
                            </div>-->

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						  <div class="form-group {{$errors->has('notasDescripcion') ? 'has-error' : ''}}">
							 <label for="notasDescripcion">Notas</label>
							  <input type="text"  class="form-control"  name="notasDescripcion" value="{{$empleado->notasDescripcion or ''}}" readonly="readonly">
							 
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
                                    <div class="input-group">
                                <span class="input-group-addon"><STRONG>DATOS LABORALES</STRONG></span>  
                            </div><br> 

                           <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label for="numEmpleado">No. Empleado</label>
                                    <input type="text" name="numEmpleado" required  placeholder="No. Empleado..." class="form-control" value="{{$empleado->NumEmpleado}}" readonly="readonly">
                                 </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label for="sueldo">Sueldo</label>
                                    <input type="text" class="form-control" placeholder="Sueldo..." name="sueldo" value="{{$empleado->sueldo}}" readonly="readonly">
                                </div>
                            </div>


                                </div>
                            </div>

                            <div class="input-group">
                                <span class="input-group-addon"><STRONG>Ingreso Laboral:</STRONG></span>  
                            </div><br>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
						  <div class="form-group">
							 <label for="StatusActual">Status Actual</label>
							 <input type="select" name="StatusActual" class="form-control" value="{{$empleado->StatusActual}}" readonly="readonly">    
						  </div>
					   </div>
					   
					   <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
						  <div class="form-group {{$errors->has('fecha_Ingreso') ? 'has-error' : ''}}">
							 <label for="fecha_Ingreso">Ingreso</label>
							 <input type="date" name="fecha_Ingreso" required class="form-control" value="{{$empleado->fecha_Ingreso}}" readonly="readonly">
						   </div>
					   </div>
					   <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
						  <div class="form-group">
							 <label for="fecha_Baja">Baja</label>
							 <input type="date" name="fecha_Baja" class="form-control" value="{{$empleado->fecha_Baja}}" readonly="readonly">
						   </div>
					   </div>

					   <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
						  <div class="form-group">
							 <label for="departamento"> Área o Departamento</label>
							 <input type="departamento" class="form-control" name="departamento" value="{{$empleado->departamento}}" readonly="readonly">
						  </div>
					   </div>
					   <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
						  <div class="form-group">
							 <label for="cargo">Cargo</label>
							 <input type="text" class="form-control"  name="cargo" value="{{$empleado->cargo}}" readonly="readonly">
						  </div>
					   </div>

					    <div class="col-lg-4 col-md-4 col-sm- col-xs-12">
						  <div class="form-group">
							 <label for="contrato">Contrato</label>
							 <input type="text" class="form-control" name="contrato" value="{{$empleado->contrato}}" readonly="readonly">
						  </div>
					   </div>

                           
                             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><STRONG>Empleo Anterior</STRONG></span>  
                            </div><br>
                            </div>
                            
                           <div class="col-lg-4 col-md-4 col-sm- col-xs-12">
                                <div class="form-group">
                                    <label for="departamentoAnterior">Área o Departamento (anterior)</label>
                                    <input type="departamentoAnterior" class="form-control" name="departamentoAnterior" value="{{$empleado->departamentoAnterior}}" readonly="readonly">
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm- col-xs-12">
                                <div class="form-group">
                                    <label for="cargoAnterior">Cargo (anterior)</label>
                                    <input type="cargoAnterior" class="form-control"  name="cargoAnterior" value="
                                    {{$empleado->cargoAnterior}}" readonly="readonly">
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm- col-xs-12">
                                <div class="form-group">
                                    <label for="empresaAnterior">Empresa(anterior)</label>
                                    <input type="empresaAnterior" class="form-control"  name="empresaAnterior" value="{{$empleado->empresaAnterior}}" readonly="readonly">
                                </div>
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
                                    <label for="institucionEstudios">Institución de Estudios</label>
                                    <input type="text" class="form-control" placeholder="Institución de Estudios..." name="institucionEstudios" value="{{$empleado->institucionEstudios}}" readonly="readonly">
                                 </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label for="nivelEstudio">Nivel de Estudios</label>
                                    <input type="text" class="form-control" placeholder="Nivel de Estudios..." required name="nivelEstudio" value="{{$empleado->nivelEstudios}}" readonly="readonly">
                                 </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label for="titulado">Titulado</label>
                                    <input type="text" class="form-control" placeholder="Titulado..." name="titulado" value="{{$empleado->titulado}}" readonly="readonly">
                                 </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="cedulaProfecional">Cédula Profecional</label>
                                    <input type="text" class="form-control" placeholder="Cédula Profecional..." required name="cedulaProfecional" value="{{$empleado->cedulaProfecional}}" readonly="readonly">
                                 </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="especialidad">Especialidad</label>
                                    <input type="text" class="form-control" placeholder="Especialidad..." name="especialidad" required value="{{$empleado->especialidad}}" readonly="readonly">
                                 </div>
                            </div>



                             <div class="input-group">
                                <span class="input-group-addon"><STRONG>Otros Estudios</STRONG></span>  
                            </div><br>

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
                                    <label for="nombreMaestria">Maestria</label>
                                    <input type="text" class="form-control" name="nombreMaestria"  value="{{$empleado->nombreMaestria}}" readonly="readonly">
                                 </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">educativa
                                    <label for="InstitucionMaestria">Institucion de </label>
                                    <input type="text" class="form-control"  name="institucionMaestria"  value="{{$empleado->institucionMaestria}}" readonly="readonly">
                                 </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="tituloMaestria">¿Titulo?</label>
                                    <input type="text" class="form-control" name="tituloMaestria"  value="{{$empleado->tituloMaestria}}" readonly="readonly">
                                    <input type="file"  name="file" value="{{old('foto')}}">
                                 </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="cedulaMaestria">Cédula</label>
                                    <input type="text" class="form-control"  name="especialidad"  value="{{$empleado->cedulaMaestria}}" readonly="readonly">
                                    <input type="file"  name="file" value="{{old('foto')}}">
                                 </div>
                            </div><br>
                            <br>

</div>
 
</div>

</div>

<div>
    <fieldset class="fields2">
    <dl>
        <dt><label>¿Doctorado?</label></dt>
        <dd>
            <input type="radio" name="tipo_status" onclick="toggle4(this)" value="7"> No <br>
            <input type="radio" name="tipo_status" onclick="toggle4(this)" value="8" > Si <br>
            
        </dd>
    </dl>
</fieldset>
 
<div id="siete" style="display:none">
    
<div class="input-group">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="nombreDoctorado">Doctorado en:</label>
                        <input type="text" class="form-control"  name="nombreDoctorado" value="{{$empleado->nombreDoctorado}}" readonly="readonly">
                        </div>
                     </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label for="institucionDoctorado">Institucion de Educativa</label>
                            <input type="text" class="form-control"   name="institucionDoctorado" value="{{$empleado->institucionDoctorado}}" readonly="readonly">
                        </div>
                    </div>
                         <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                             <div class="form-group">
                                 <label for="tituloDoctorado">Titulado </label>
                                 <input type="text" class="form-control"   name="tituloDoctorado" value="{{$empleado->tituloDoctorado}}" readonly="readonly">
                                 <input type="file"  name="file" value="{{old('foto')}}">
                        </div>
                     </div> 
                     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                             <div class="form-group">
                                 <label for="cedulaDoctorado">Cedula </label>
                                 <input type="text" class="form-control"   name="cedulaDoctorado" value="{{$empleado->cedulaDoctorado}}" readonly="readonly">
                                 <input type="file"  name="file" value="{{old('foto')}}">
                        </div>
                     </div><br>  

</div>
</div>

<div>
                        <fieldset class="fields2">
                            <dl>
                            <dt><label>¿Estudio Post Doctorado?</label></dt>
                            <dd>
                            <input type="radio" name="tipo_attach" onclick="toggle(this)" value="a"> no<br> 
                            <input type="radio" name="tipo_attach" onclick="toggle(this)" value="b" > si<br>
                             
                            </dd>
                            </dl>
                            </fieldset>
 
                            <div id="uno" style="display:none">

                             <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="nombrePostDoctorado">PostDoctorado en:</label>
                                    <input type="text" class="form-control"  name="nombrePostDoctorado"  value="{{$empleado->nombrePostDoctorado}}" readonly="readonly">
                                 </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="institucionPostDoctorado">Institucion de Educativa</label>
                                    <input type="text" class="form-control" name="institucionPostDoctorado"  value="{{$empleado->institucionPostDoctorado}}" readonly="readonly">
                                 </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="tituloPostDoctorado">Titulo</label>
                                    <input type="text" class="form-control"  name="tituloPostDoctorado"  value="{{$empleado->tituloPostDoctorado}}" readonly="readonly">
                                    <input type="file"  name="file" value="{{old('foto')}}">
                                 </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="cedulaPostDcotorado">Cédula</label>
                                    <input type="text" class="form-control" placeholder="Cédula del PostDoctorado..." name="cedulaPostDcotorado"  value="{{$empleado->cedulaPostDoctorado}}" readonly="readonly">
                                    <input type="file"  name="file" value="{{old('foto')}}">
                                 </div>
                            </div><br>
                            
                            </div>
                </div>
                    </div>
            

                            </div><br>
                            <br>
                         
                        </div>
                        
</div>
</div>

                    </div>
                </div>
                <div class="form-group">
                    <!--<button type="submit" class="btn  btn-success  btn-block">
                        Guardar
                    </button>--> 
                    <li><a href="{{url('/')}}/empleado"><i class="fa fa-circle-o"></i> REGRESAR </a></li>
                </div>
         </form>
        </div>
    </div>
</div>

        <!-- /#page-wrapper -->
@endsection




