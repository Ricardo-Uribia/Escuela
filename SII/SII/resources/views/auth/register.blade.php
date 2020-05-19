@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-2">
            <br><br><br>
            <a href="{{route('register')}}"><button style="width: 110%; height= 50%;" class="btn btn-warning" >Registro de Aspirantes</button></a>
            <br><br>
            <a href="{{url('/')}}/register/documentos"><button style="width: 110%; height= 50%;" class="btn btn-warning">Documentos</button></a>
        </div>
           
        <div class="col-md-10">
            
             <div class="content-wrapper">
    <div class="container-fluid">
   
      <!-- /TIPO DE DATO-->            
    <h3>Registrar nuevo alumno</h3>
     <!-- /SELECCIONAR CARRERA--> 
<form method="POST" action="crear/alumno">
    {{Form::token()}}
  <div class="col-md-12">
    <div class="was-validated">
      <div class="form-horizontal">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label col-xs-3"><B>Estatus:</B></label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label col-xs-3"><B>Nivel:</B></label>
                </div>
            </div>
        </div>
        <div class="row">
        <div class="col-md-4">
          <select name="estatus" class="custom-select mb-2 mr-sm-2 mb-sm-0" disabled id="">
            <option value="A">ASPIRANTE</option></select>
        </div>
        <div class="col-md-4">
            
          <select name="nivel" class="custom-select mb-2 mr-sm-2 mb-sm-0" disabled id="">
            <option value="A" >Técnico Superior Universitario</option>
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
          <label class="control-label col-xs-3"><B>Carrera:</B></label>
          <div class="col-auto">
       <select name="carrera" class="custom-select mb-2 mr-sm-2 mb-sm-0" id="inlineFormCustomSelect" required>
        <option value="">Elige la carrera a la que deseas registrarte...</option>
        <option value="1">Administración Área Formulación y Evaluación de Proyectos</option>
        <option value="2">Gastronomía</option>
        <option value="3">Procesos Alimentarios</option>
        <option value="4">Tecnologías de la Información y Comunicación Área Sistemas Informáticos</option>
        <option value="5">Turismo Área Desarrollo de Productos Alternativos</option>
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

        <div class="col-md-4"><div class="was-validated">
          <div class="form-group">
            <label class="control-label col-xs-3" for="paterno"><B>Primer apellido:</B></label>
            <div class="col-xs-9">
            <input name="primer apellido" type="text" class="form-control" id="" placeholder="Primer apellido" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
            </div></div></div></div>
            

        <div class="col-md-4"><div class="was-validated">
          <div class="form-group">
            <label class="control-label col-xs-3"><B>Segundo apellido:</B></label>
            <div class="col-xs-9">
            <input name="segundo apellido" type="text" class="form-control" id="" placeholder="Segundo apellido" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
            </div></div></div></div>

        <div class="col-md-4"><div class="was-validated">
          <div class="form-group">
            <label class="control-label col-xs-3"><B>Nombres:</B></label>
            <div class="col-xs-9">
            <input name="Nombres" type="text" class="form-control" id="" placeholder="Nombres" function wordlimit($string, $length = 18,) onkeyup="javascript:this.value=this.value.toUpperCase();" required>
            </div></div></div></div>

<div class="col-md-4">
      <div class="was-validated">
      <div class="form-horizontal">
          <div class="form-group">
          <label class="control-label col-xs-3"><B>Género:</B></label>
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
          <div class="form-group">
          <label class="control-label col-xs-3"><B>Estado civil:</B></label>
          <div class="col-auto">
       <select name="estado_civil" class="custom-select mb-2 mr-sm-2 mb-sm-0" id="inlineFormCustomSelect" required>
        <option value="">Estado civil...</option>
        <option value="1">Soltero (a)</option>
        <option value="2">Casado (a)</option>
        <option value="3">Unión libre</option>
        <option value="4">Divorciado (a)</option>
        <option value="5">Viudo (a)</option>      
      </select>
    </div> </div></div></div></div>
<br>

 </div>
<br>

<!-- DATOS DE NACIMIENTO)--> 
      <h4><U>DATOS DE NACIMIENTO</U></h4>  
      <div class="row">  

 <div class="col-md-4"><div class="was-validated">
          <div class="form-group">
            <label class="control-label col-xs-3"><B>Fecha de nacimiento:</B></label>
            <div class="col-xs-9">
            <input name type="date" class="form-control" id="" placeholder="Fecha de nacimiento " function wordlimit($string, $length = 18,) onkeyup="javascript:this.value=this.value.toUpperCase();" required>
            </div></div></div></div>

            <div class="col-md-4">
      <div class="was-validated">
      <div class="form-horizontal">
          <div class="form-group">
          <label class="control-label col-xs-3"><B>Estado de nacimiento:</B></label>
          <div class="col-auto">
       <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="inlineFormCustomSelect" required>
        <option value="">Elige tu estado de nacimiento...</option>
        <option value="1">Aguascalientes</option>
        <option value="2">Baja California</option>
        <option value="3">Baja California Sur</option>
        <option value="4">Campeche</option>
        <option value="5">Coahuila</option>
        <option value="6">Colima</option>
        <option value="7">Chiapas</option>
        <option value="8">Chihuahua</option>
        <option value="9">Distrito Federal</option>
        <option value="10">Durango</option>
        <option value="11">Guanajuato</option>
        <option value="12">Guerrero</option>
        <option value="13">Hidalgo</option>
        <option value="14">Jalisco</option>
        <option value="15">México</option>
        <option value="16">Michoacán</option>
        <option value="17">Morelos</option>
        <option value="18">Nayarit</option>
        <option value="19">Nuevo León</option>
        <option value="20">Oaxaca</option>
        <option value="21">Puebla</option>
        <option value="22">Querétaro</option>
        <option value="23">Quintana Roo</option>
        <option value="24">San Luis Potosí</option>
        <option value="25">Sinaloa</option>
        <option value="26">Sonora</option>
        <option value="27">Tabasco</option>
        <option value="28">Tamaulipas</option>
        <option value="29">Tlaxcala</option>
        <option value="30">Veracruz</option>
        <option value="31">Yucatán</option>
        <option value="32">Zacatecas</option>
        <option value="33">Nacido Extranjero</option>
      </select>
    </div>
      </div></div></div></div>

         <div class="col-md-4"><div class="was-validated">
          <div class="form-group">
            <label class="control-label col-xs-3"><B>CURP:</B> (Consúltala o valídala <a href="https://consultas.curp.gob.mx/CurpSP/gobmx/inicio.jsp" target="_blank">AQUÍ</a>)</label>
            <div class="col-xs-9">
            <input type="text" class="form-control" id="curp_input" oninput="validarInput(this)" style="width:100%;" placeholder="Ingrese su CURP" function wordlimit($string, $length = 18,) onkeyup="javascript:this.value=this.value.toUpperCase();" required>
            <pre id="resultado"></pre>
            </div></div></div></div>

</div>
<br>
<!-- DATOS DE DOMICILIO Y LOCALIZACI���N)--> 
      <h4><U>DATOS DE DOMICILIO Y LOCALIZACIÓN</U></h4>  
      <div class="row">  

<div class="col-md-8"><div class="was-validated">
          <div class="form-group">
            <label for="exampleFormControlTextarea1"><B>Dirección</B>  (Por ejemplo: Calle 28 No. 358 entre 23 y 25 Col. Tres Cruces)</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Ingresa tu dirección.." required ></textarea> 
    </div></div></div></div>

 <div class="row">

    <div class="col-md-4">
      <div class="was-validated">
      <div class="form-horizontal">
          <div class="form-group">
          <label class="control-label col-xs-3"><B>Estado:</B></label>
          <div class="col-auto">
       <select id="estados" class="form-control" name="estado" required>
                  </select>
    </div>
      </div></div></div></div>


    <div class="col-md-4">
      <div class="was-validated">
      <div class="form-horizontal">
          <div class="form-group">
          <label class="control-label col-xs-3"><B>Municipio:</B></label>
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
            <label class="control-label col-xs-3"><B>Ciudad o localidad:</B></label>
            <div class="col-xs-9">
            <input type="text" class="form-control" id="" placeholder="Ciudad o localidad" onkeyup="javascript:this.value=this.value.toUpperCase();" required>
            </div></div></div></div>
          

 <div class="col-md-2"><div class="was-validated">
          <div class="form-group">
            <label class="control-label col-xs-3"><B>Código postal:</B></label>
            <div class="col-xs-9">
            <input type="number" maxlength="5" class="form-control" id="" placeholder="Código Postal..." required>
            </div></div></div></div>

        <div class="col-md-3"><div class="was-validated">
          <div class="form-group">
            <label class="control-label col-xs-3"><B>Teléfono celular:</B></label>
            <div class="col-xs-9">
            <input type="number" class="form-control" id="" placeholder="Teléfono Celular..." onkeyup="javascript:this.value=this.value.toUpperCase();" required>
            </div></div></div></div>

        <div class="col-md-7"><div class="was-validated">
          <div class="form-group">
            <label class="control-label col-xs-3"><B>Correo electrónico:</B></label>
            <div class="col-xs-9">
            <input type="email" class="form-control" id="" placeholder="Correo electrónico..." required>
            </div></div></div></div>
          </div>
         
          <br>


 <!--(PERSONA DE CONTACTO)-->
 <h4><U>PERSONA DE CONTACTO</U></h4>  
      <div class="row"> 


<div class="col-md-5"><div class="was-validated">
          <div class="form-group">
            <label class="control-label col-xs-3"><B>Persona de contacto:</B></label>
            <div class="col-xs-6">
            <input type="text" class="form-control" id="" placeholder="Nombre del contacto..." required>
            </div></div></div></div>


<div class="col-md-4">
      <div class="was-validated">
      <div class="form-horizontal">
          <div class="form-group">
          <label class="control-label col-xs-3"><B>Parentesco del contacto:</B></label>
          <div class="col-auto">
       <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="inlineFormCustomSelect" required>
        <option value="">Parentesco contacto...</option>
        <option value="1">Padre</option>
        <option value="2">Madre</option>
        <option value="3">Hermano(a)</option>
        <option value="4">Cónyugue</option>
        <option value="5">Amigo(a)</option> 
        <option value="6">Abuelo(a)</option>
        <option value="7">Tío(a)</option>
        <option value="8">Primo(a)</option>
        <option value="9">Relación laboral</option>     
      </select>
    </div>
      </div></div></div>
    </div>


<div class="col-md-3"><div class="was-validated">
          <div class="form-group">
            <label class="control-label col-xs-3"><B>Teléfono del contacto:</B></label>
            <div class="col-xs-9">
            <input type="number" class="form-control" id="" placeholder="Teléfonoel contacto..." onkeyup="javascript:this.value=this.value.toUpperCase();" required>
            </div></div></div></div>

          </div>
          <br>


 <!--ESCUELA DE PROCEDENCIA)--> 
 <h4><U>ESCUELA DE PROCEDENCIA</U></h4>  
      <div class="row"> 


<div class="col-md-10"><div class="was-validated">
          <div class="form-group">
            <label class="control-label col-xs-3"><B>Nombre de la escuela:</B></label>
            <div class="col-xs-6">
            <input type="text" class="form-control" id="" placeholder="Ingresa el nombre de tu escuela de procedencia..." required>
            </div></div></div></div>



    <div class="col-md-4">
      <div class="was-validated">
      <div class="form-horizontal">
          <div class="form-group">
          <label class="control-label col-xs-3">Estados:</label>
                  <div class="col-auto">
                  <select id="estadosUno" class="form-control" name="estado" required>
                  </select>
                  </div>
      </div></div></div></div>



    <div class="col-md-4">
      <div class="was-validated">
      <div class="form-horizontal">
          <div class="form-group">
           <label class="control-label col-xs-3">Municipios:</label>
                  <div class="col-auto">
                  <select class="form-control" id="municipioUno" name="municipio" required>
                  </select>
                  </div>
    </div></div></div></div>


 <div class="col-md-2">
  <div class="was-validated">
          <div class="form-group">
            <label class="control-label col-xs-3"><B>Promedio bach.:</B></label>
            <div class="col-xs-9">
            <input name="un_numero_decimal" value="" type="number" step="any" class="form-control" id="" placeholder="Promedio..." required>
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
