@extends('layouts.app')

@section('content')

<br><br><br>

<div class="container">
    <div class="row">
        <div class="col-md-2">
            <br><br><br>
            <a href="{{url('/')}}/registro"><button style="width: 110%; height= 50%;" class="btn btn-warning" >Registro de Aspirantes</button></a>
            <br><br>
            <a href="{{url('/')}}/subir/documentos"><button style="width: 110%; height= 50%;" class="btn btn-warning" >Documentos</button></a>
        </div>
           
        <div class="col-md-10">
            
             <div class="content-wrapper">
    <div class="container-fluid">
   
      <!-- /TIPO DE DATO-->            
    <h3>Registrar nuevo alumno</h3>
     <!-- /SELECCIONAR CARRERA--> 
<form method="POST" action="{{ url('/registro')}}">
    {{csrf_field()}}
  <div class="col-md-12">
    <div class="was-validated">
      <div class="form-horizontal">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="estatus" class="control-label col-xs-3"><B>Estatus:</B></label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="nivel" class="control-label col-xs-3"><B>Nivel:</B></label>
                </div>
            </div>
        </div>
        <div class="row">
        <div class="col-md-4">
            <select name="estatus" class="custom-select mb-2 mr-sm-2 mb-sm-0"  required>
                <option value="11">Aspirante</option>
          </select>
        </div>
        <div class="col-md-4">
            
          <select name="nivel" class="custom-select mb-2 mr-sm-2 mb-sm-0"  required>
                <option value="TSU">Técnico Superior Universitario</option>
          </select>
        </div>
        </div>
      </div>
    </div>
  </div>
  

<br>

    <div class="col-md-12">
      <div class="was-validated">
      <div class="form-horizontal">
          <div class="form-group">
          <label for="carrera" class="control-label col-xs-3">{{'Carrera'}}</label>
          <div class="col-auto">
       <select name="carrera" class="custom-select mb-2 mr-sm-2 mb-sm-0"  required>
           <div class="form-group" {{$errors->has('carrera')?'has-error':''}}">
            @foreach(App\Models\Niveles::all() as $registro)
             @if($registro->ACTIVO == 'S' && $registro->Nivel == 'Técnico Superior Universitario')
                <option value="{!!$registro->Identificador!!}">{{$registro->Descripcion_Nivel}}</option>
                @endif
                @endforeach
      </select>
    </div>
      </div>
      </div>
  </div>
</div>
 
<br>

      <!-- DATOS DE IDENTIDAD)--> 
    <h4><U>DATOS DE IDENTIDAD</U></h4>  
      <div class="row">  
     <!-- /Aqu��� empieza el formulario (con javascrip para que convierta en may���sculas)--> 

        <div class="col-md-4">
            <div class="was-validated">
          <div class="form-group" {{$errors->has('primerApe')?'has-error':''}}" >
            <label for="primerApe" class="control-label col-xs-3" >{{'Primer Apellido'}}</label>
            <div class="col-xs-9">
            <input name="primerApe" type="text" class="form-control"   placeholder="Primer apellido" onkeyup="javascript:this.value=this.value.toUpperCase();" required value="{{$registro->primerApe or ''}}">
            {!! $errors->first('primerApe','<p class="help-block">:message</p>')!!}
            </div></div></div></div>
            

        <div class="col-md-4"><div class="was-validated">
            <div class="form-group" {{$errors->has('segundoApe')?'has-error':''}}" >
            <label for="segundoApe" class="control-label col-xs-3" >{{'Segundo Apellido'}}</label>
            <div class="col-xs-9">
            <input name="segundoApe" type="text" class="form-control"  placeholder="Segundo apellido" onkeyup="javascript:this.value=this.value.toUpperCase();" required value="{{$registro->segundoApe or ''}}">
            {!! $errors->first('segundoApe','<p class="help-block">:message</p>')!!}
            </div></div></div></div>

        <div class="col-md-4"><div class="was-validated">
          <div class="form-group" {{$errors->has('nom')?'has-error':''}}" >
            <label for="nom" class="control-label col-xs-3" >{{'Nombres'}}</label>
            <div class="col-xs-9">
            <input name="nom" type="text" class="form-control" id="" placeholder="Nombres" function wordlimit($string, $length = 18,) onkeyup="javascript:this.value=this.value.toUpperCase();" required value="{{$registro->nom or ''}}">
            {!! $errors->first('nom','<p class="help-block">:message</p>')!!}
            </div></div></div></div>

<div class="col-md-4">
      <div class="was-validated">
      <div class="form-horizontal">
          <div class="form-group">
          <label for="genero" class="control-label col-xs-3"><B>Género:</B></label>
          <div class="col-auto">
       <select name="genero" class="custom-select mb-2 mr-sm-2 mb-sm-0" id="inlineFormCustomSelect" required>
        <option value="">Género...</option>
        <option value="F">Femenino</option>
        <option value="M">Masculino</option>       
      </select>
    </div>
      </div></div></div></div>

      <div class="col-md-4">
      <div class="was-validated">
      <div class="form-horizontal">
          <div class="form-group" {{$errors->has('estado_civil')?'has-error':''}}">
         <label for="estado_civil" class="control-label col-xs-3"><B>Estado Civil:</B></label>
          <div class="col-auto">
       <select name="estado_civil" class="custom-select mb-2 mr-sm-2 mb-sm-0" id="inlineFormCustomSelect" required>
        <option value="">Selecciona...</option>
        <option value="S">Soltero(a)</option>
        <option value="C">Casado(a)</option>
        <option value="D">Divorciado(a)</option>
        <option value="V">Viudo(a)</option>
        <option value="U">Union libre</option>
      </select>
    </div> </div></div></div></div>
<br>

 </div>
<br>

<!-- DATOS DE NACIMIENTO)--> 
      <h4><U>DATOS DE NACIMIENTO</U></h4>  
      <div class="row">  

 <div class="col-md-4"><div class="was-validated">
          <div class="form-group" {{$errors->has('fechaNac')?'has-error':''}}">
            <label for="fechaNac "class="control-label col-xs-3">{{'Fecha de Nacimiento'}}</label>
            <div class="col-xs-9">
            <input name="fechaNac" type="date" value="{{$registro->fechaNac or ''}}" class="form-control" id="fechaNac" placeholder="Fecha de nacimiento " 
            function wordlimit($string, $length = 18,) onkeyup="javascript:this.value=this.();" required  >
            {!! $errors->first('fechaNac','<p class="help-block">:message</p>') !!}
            </div></div></div></div>

        <div class="col-md-4"><div class="was-validated">
            <div class="form-group {{$errors->has('estados')?'has-error':''}}">
            <label for="Estado_Nac" class="control-label col-xs-3">{{'Estado Nacimiento'}}</label>
      <div class="col-xs-9">
          <select name="Estado_Nac" class="form-control" >
            <option value="{{old('Estado_Nac')}}" >Estado</option>
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
                
      </div></div></div></div>

         <div class="col-md-4">
            <div class="was-validated">
          <div class="form-group" {{$errors->has('curp')?'has-error':''}}">
            <label for="curp"  class="control-label col-xs-4">{{'Curp'}} (Consúltala o valídala) <a href="https://consultas.curp.gob.mx/CurpSP/gobmx/inicio.jsp" target="_blank">AQUÍ</a></label>
            <div class="col-xs-9">
            <input name="curp" type="text" class="form-control" id="curp_input" oninput="validarInput(this)" style="width:100%;" placeholder="Ingrese su CURP" 
            function wordlimit($string, $length = 18,) onkeyup=" javascript:this.value=this.value.toUpperCase();"  required  value="{{$registro->curp or ''}}">
            {!! $errors->first('curp','<p class="help-block">:message</p>') !!}
            <pre id="resultado"></pre>
            </div></div></div></div>

</div>
<br>
<!-- DATOS DE DOMICILIO Y LOCALIZACI���N)--> 
      <h4><U>DATOS DE DOMICILIO Y LOCALIZACIÓN</U></h4>  
      <div class="row">  

<div class="col-md-8"><div class="was-validated">
          <div class="form-group" {{$errors->has('domi')?'has-error':''}}">
            <label for="domi">{{'Direccion'}} (Por ejemplo: Calle 28 No. 358 entre 23 y 25 Col. Tres Cruces)</label>
    <input name="domi" class="form-control" id="domi" rows="3" placeholder="Ingresa tu dirección.." required  value="{{$registro->domi or ''}}"> 
    {!! $errors->first('domi','<p class="help-block">:message</p>') !!}
    </div></div></div></div>

 <div class="row">

    <div class="col-md-4">
      <div class="was-validated">
      <div class="form-horizontal">
          <div class="form-group">
          <label for="estado" class="control-label col-xs-3"><B>Estado:</B></label>
          <div class="col-auto">
       <select id="estados" class="form-control" name="estado" required>
                  </select>
    </div>
      </div></div></div></div>


    <div class="col-md-4">
      <div class="was-validated">
      <div class="form-horizontal">
          <div class="form-group">
          <label for="municipio" class="control-label col-xs-3"><B>Municipio:</B></label>
          <div class="col-auto">
      <select class="form-control" id="municipio" name="municipio" required>
                  </select>
      </div>
    </div>
    </div>
    </div>
    </div>

<div class="col-md-4"><div class="was-validated">
          <div class="form-group">
            <label for="cuidad" class="control-label col-xs-3"><B>Ciudad o localidad:</B></label>
            <div class="col-xs-9">
            <input type="text" class="form-control" id="" name="ciudad" placeholder="Ciudad o localidad" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
            </div></div></div></div>
          

 <div class="col-md-2"><div class="was-validated">
          <div class="form-group {{$errors->has('codigoP')?'has-error':''}}">
            <label for="codigoP" class="control-label col-xs-3"><B>{{'Codigo Postal:'}}</B></label>
            <div class="col-xs-9">
            <input name="codigoP" type="text" maxlength="5" class="form-control" id="" value="{{$registro->codigoP or ''}}" placeholder="Código Postal..." required>
            {!! $errors->first('codigoP','<p class="help-block">:message</p>') !!}
            </div></div></div></div>

        <div class="col-md-3"><div class="was-validated">
          <div class="form-group {{$errors->has('cell')?'has-error':''}}">
            <label for="cell" class="control-label col-xs-3"><B>{{'Telefono Celular'}}</B></label>
            <div class="col-xs-9">
            <input   class="form-control" name="cell" type="text" id="cell" value="{{$registro->cell or ''}}" placeholder="Teléfono Celular..." 
            onkeyup="javascript:this.value=this.value.toUpperCase();" required >
            {!! $errors->first('cell','<p class="help-block">:message</p>') !!}
            </div></div></div></div>

        <div class="col-md-7"><div class="was-validated">
          <div class="form-group  {{$errors->has('Email')?'has-error':''}}" >
            <label for="Email"  class="control-label col-xs-3"><B>{{'Correo Electronico'}}</B></label>
            <div class="col-xs-9">
            <input class="form-control" name="Email" type="Email" id="Email" value="{{ $registro->Email or ''}}" placeholder="Correo electrónico..."
            required >
            {!! $errors->first('Email','<p class="help-block">:message</p>') !!}
            </div></div></div></div>
            </div>
          
         
          <br>


 <!--(PERSONA DE CONTACTO)-->
 <h4><U>PERSONA DE CONTACTO</U></h4>  
      <div class="row"> 


<div class="col-md-5"><div class="was-validated">
          <div class="form-group {{$errors->has('tel')?'has-error':''}}">
            <label for='contacto'class="control-label col-xs-3"><B>{{'Persona de Contacto:'}}</B></label>
            <div class="col-xs-6">
            <input name="contacto" type="text" class="form-control" id="tel" value="{{$registro->tel or ''}}" placeholder="Persona de contacto.." required>
            {!! $errors->first('tel','<p class="help-block">:message</p>') !!}
            </div></div></div></div>


<div class="col-md-4">
      <div class="was-validated">
      <div class="form-horizontal">
          <div class="form-group"  {{$errors->has('parentesco')?'has-error':''}}">
          <label for="parentesco" class="control-label col-xs-3"><B>Parentesco del contacto:</B></label>
          <div class="col-auto">
       <select name="parentesco" class="custom-select mb-2 mr-sm-2 mb-sm-0" id="inlineFormCustomSelect" required>
        <option value="">Parentesco contacto...</option>
        <option value="Padre">Padre</option>
        <option value="Madre">Madre</option>
        <option value="Hermano(a)">Hermano(a)</option>
        <option value="Pariente">Pariente</option>
        <option value="Conyugue">Cónyugue</option>
        <option value="Amigo(a)">Amigo(a)</option> 
        <option value="Tutor(a)">Tutor(a)</option>
        <option value="Otro">Otro..</option>
      </select>
    </div>
      </div></div></div>
    </div>


<div class="col-md-3"><div class="was-validated">
          <div class="form-group">
            <label for="tel_contacto" class="control-label col-xs-3"><B>Teléfono del contacto:</B></label>
            <div class="col-xs-9">
            <input type="text" name="tel_contacto" class="form-control" id="" placeholder="Teléfonoel contacto..." 
            onkeyup="javascript:this.value=this.value.toUpperCase();" required>
            </div></div></div></div>

          </div>
          <br>


 <!--ESCUELA DE PROCEDENCIA)--> 
 <h4><U>ESCUELA DE PROCEDENCIA</U></h4>  
      <div class="row"> 


<div class="col-md-10"><div class="was-validated">
          <div class="form-group" {{$errors->has('escuelaProce')?'has-error':''}}">
            <label for="escuelaProce" class="control-label col-xs-3">{{'Nombre de la Escuela'}}</label>
            <div class="col-xs-6">
            <input name="escuelaProce" type="text" class="form-control" id="" placeholder="Ingresa el nombre de tu escuela de procedencia..." required  value="{{$registro->escuelaProce or ''}}" >
            {!! $errors->first('escuelaProce','<p class="help-block">:message</p>')!!}
            </div></div></div></div>



    <div class="col-md-4">
      <div class="was-validated">
      <div class="form-horizontal">
          <div class="form-group">
          <label for="estado1" class="control-label col-xs-3">Estados:</label>
                  <div class="col-auto">
                  <select id="estadosUno" class="form-control" name="estado1" required>
                  </select>
                  </div>
      </div></div></div></div>



    <div class="col-md-4">
      <div class="was-validated">
      <div class="form-horizontal">
          <div class="form-group">
           <label for="bachillerato_municipio" class="control-label col-xs-3">Municipios:</label>
                  <div class="col-auto">
                  <select class="form-control" id="municipioUno" name="bachillerato_municipio" required>
                  </select>
                  </div>
    </div></div></div></div>


 <div class="col-md-2">
  <div class="was-validated">
          <div class="form-group {{$errors->has('promedio')?'has-error':''}}">
            <label for="promedio" class="control-label col-xs-3"><B>{{'Promedio Bach.. '}}</B></label>
            <div class="col-xs-9">
            <input name="promedio" value="{{$registro->promedio or ''}}" type="text" step="any" class="form-control" id="" placeholder="Promedio..." required>
            {!! $errors->first('promedio','<p class="help-block">:message</p>')!!}
            </div></div></div></div>


 </div>
          <br>
           <br>



  <br>
  <br>
<div class="alert alert-warning"><h4><B>ATENCIÓN!</B> Antes de guardar tus datos, corrobora que sean correctos.</h4></div>
  <br>

 <div class="row"> 

<div class="col-md-4"><button type="submit" class="btn btn-success btn-lg">GUARDAR</button></div>  
 <br>
  <br>
 <br>
  <br>

<div class="alert alert-warning"><h4>Ahora, dirígete a la sección "DOCUMENTOS", e ingrésalos como se te indica.</h4></div>
  <br>

</div>
</form>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright (2018) UTPoniente 2018</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">¿Listo para salir?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">��</span>
            </button>
          </div>
          <div class="modal-body">Seleccione "Cerrar sesión" si está listo para finalizar.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Cerrar sesión</a>
          </div>
        </div>
      </div>
    </div>

            
        </div>
    </div>
</div>


@endsection
