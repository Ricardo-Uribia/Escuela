@extends('layouts.admin')

@section('principal')
           <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading ">
                            <center><h4><STRONG>Pre-Registro del Empleado</STRONG></h4></center> 
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
            <li role="presentation" class="active"><a href="#basicos" aria-controls="basicos" data-toggle="tab" role="tab"><STRONG>Datos Básicos</STRONG></a></li>
          </ul>

            
       <form action="{{url('/')}}/crear/nuevo/Empleado" method="POST" enctype="multipart/form-data">
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
                                <label for="NombreEmpleado">Nombres</label>
                                <input type="text" name="NombreEmpleado" class="form-control" value="{{old('NombreEmpleado')}}" placeholder="Nombres..." function wordlimit($string, $length = 18,) onkeyup="javascript:this.value=this.value.toUpperCase();">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="txtParterno">Apellido Paterno</label>
                                    <input type="text" name="txtPaterno" class="form-control" value="{{old('txtPaterno')}}" placeholder="Apellido Paterno..." function wordlimit($string, $length = 18,) onkeyup="javascript:this.value=this.value.toUpperCase();" >
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="txtMaterno">Apellido Materno</label>
                                    <input type="text" name="txtMaterno" class="form-control" value="{{old('txtMaterno')}}" placeholder="Apellido Materno..." function wordlimit($string, $length = 18,) onkeyup="javascript:this.value=this.value.toUpperCase();" >
                                </div>
                            </div>
                                                        
                            
                                 <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="estadoz">Estado de Nacimiento</label>
                                    <select name="estadoz" class="form-control selectpicker" data-live-search="true">
                                            <option value="" >Estado</option>
                                                    <option value="Aguascalientes">Aguascalientes</option>
                                                    <option value="Baja California">Baja California</option>
                                                    <option value="Baja California Sur">Baja California Sur</option>
                                                    <option value="Campeche">Campeche</option>
                                                    <option value="Coahuila">Coahuila</option>
                                                    <option value="Colima">Colima</option>
                                                    <option value="Chiapas">Chiapas</option>
                                                    <option value="Chihuahua">Chihuahua</option>
                                                    <option value="Ciudad de México">Ciudad de México</option>
                                                    <option value="Durango">Durango</option>
                                                    <option value="Guanajuato">Guanajuato</option>
                                                    <option value="Guerrero">Guerrero</option>
                                                    <option value="Hidalgo">Hidalgo</option>
                                                    <option value="Jalisco">Jalisco</option>
                                                    <option value="Estado de México">Estado de México</option>
                                                    <option value="Michoacán">Michoacán</option>
                                                    <option value="Morelos">Morelos</option>
                                                    <option value="Nayarit">Nayarit</option>
                                                    <option value="Nuevo León">Nuevo León</option>
                                                    <option value="Oaxaca">Oaxaca</option>
                                                    <option value="Puebla">Puebla</option>
                                                    <option value="Querétaro">Querétaro</option>
                                                    <option value="Quintana Roo">Quintana Roo</option>
                                                    <option value="San Luis Potosí">San Luis Potosí</option>
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
                                    </div>
                                </div> 
                
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="municipio">Lugar de Nacimiento</label>
                                        <input type="text"  name="municipio" class="form-control" value="{{old('municipio')}}"  placeholder="municipio" function wordlimit($string, $length = 18,) onkeyup="javascript:this.value=this.value.toUpperCase();">
                                    </div>
                                </div>
                                
                                          
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="ciudad">Ciudad</label>
                                        <input type="text" name="ciudad"  value="{{old('ciudad')}}" class="form-control" placeholder="ciudad" function wordlimit($string, $length = 18,) onkeyup="javascript:this.value=this.value.toUpperCase();">
                                     </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="fechaNacimiento">Fecha de Nacimiento</label>
                                        <input type="date" name="fechaNacimiento" class="form-control" value="{{old('fechaNacimiento')}}">
                                    </div>
                                </div>

                             <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="genero">Genero</label>
                                        <select name="genero" class="form-control selectpicker" data-live-search="true" >
                                            <option value="">Seleciona</option>
                                            <option value="M">Masculino</option>
                                            <option value="F">Femenino</option>
                                        </select>
                                    </div>
                                </div>


                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label for="claveCiudadana">Curp</label>
                                    <input type="text" class="form-control" id="curp_input" oninput="validarInput(this)" style="width:100%;" placeholder="Curp..." name="claveCiudadana" value="{{old('claveCiudadana')}}" function wordlimit($string, $length = 18,) onkeyup="javascript:this.value=this.value.toUpperCase();">  
                                    <pre id="resultado"></pre>
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

                                <div class="col-md-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><STRONG>Domicilio y Localización:</STRONG></span>  
                                </div>
                            </div>
                                <br>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="domicilio">Domicilio</label>
                                        <input type="domicilio" name="domicilio"  value="{{old('domicilio')}}" class="form-control" placeholder="Domicilio...">
                                     </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="estadoActual">Estado</label>
                                        <select name="estadoActual" class="form-control selectpicker" data-live-search="true" >
                                            <option value="" >Estado</option>
                                                    <option value="Aguascalientes">Aguascalientes</option>
                                                    <option value="Baja California">Baja California</option>
                                                    <option value="Baja California Sur">Baja California Sur</option>
                                                    <option value="Campeche">Campeche</option>
                                                    <option value="Coahuila">Coahuila</option>
                                                    <option value="Colima">Colima</option>
                                                    <option value="Chiapas">Chiapas</option>
                                                    <option value="Chihuahua">Chihuahua</option>
                                                    <option value="Ciudad de México">Ciudad de México</option>
                                                    <option value="Durango">Durango</option>
                                                    <option value="Guanajuato">Guanajuato</option>
                                                    <option value="Guerrero">Guerrero</option>
                                                    <option value="Hidalgo">Hidalgo</option>
                                                    <option value="Jalisco">Jalisco</option>
                                                    <option value="Estado de México">Estado de México</option>
                                                    <option value="Michoacán">Michoacán</option>
                                                    <option value="Morelos">Morelos</option>
                                                    <option value="Nayarit">Nayarit</option>
                                                    <option value="Nuevo León">Nuevo León</option>
                                                    <option value="Oaxaca">Oaxaca</option>
                                                    <option value="Puebla">Puebla</option>
                                                    <option value="Querétaro">Querétaro</option>
                                                    <option value="Quintana Roo">Quintana Roo</option>
                                                    <option value="San Luis Potosí">San Luis Potosí</option>
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
                                        </select>  
                                    </div>
                                </div> 

                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        <label name="muniActual" for="muniActual">Municipio</label>
                                        <input type="text" name="muniActual"  value="{{old('muniActual')}}" class="form-control" placeholder="muniActual" function wordlimit($string, $length = 18,) onkeyup="javascript:this.value=this.value.toUpperCase();">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="ciudadActual">Ciudad</label>
                                        <input type="text" name="ciudadActual" value="{{old('ciudadActual')}}" class="form-control" placeholder="Ciudad" function wordlimit($string, $length = 18,) onkeyup="javascript:this.value=this.value.toUpperCase();">
                                     </div>
                                </div>


                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="cp">Codigo Postal</label>
                                        <input type="text" name="cp"  placeholder="Código Postal..." class="form-control" value="{{old('cp')}}">
                                     </div>
                                </div>

                                <!--<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="telefono">Télefono</label>
                                        <input type="number" name="telefono"   placeholder="Télefono..." class="form-control" value="{{old('telefono')}}" >
                                     </div>
                                </div>-->
                                
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

                                <div class="col-md-12">
                                <div class="input-group">
                                <span class="input-group-addon"><STRONG> </STRONG></span>  
                            </div>
                        </div><br>

                             

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="notasDescripcion">Notas (descripción)</label>
                                     <textarea type="textarea" rows="3" class="form-control"  placeholder="Notas (descripción)" name="notasDescripcion" value="{{old('notasDescripcion')}}">
                                    </textarea>
                                 </div>
                            </div>
</div><!--espacio entre lineas-->
                        </div>
                    </div>     
                </div>
            </div>
          <br>                   
        </div>                   
    </div>
</div>
  </div>
    </div>
        <div class="form-group">
                    <button type="submit" class="btn  btn-info  btn-block">
                        Guardar
                    </button>  
                </div>
         </form>
        </div>
    </div>
</div>

        <!-- /#page-wrapper -->
@endsection




