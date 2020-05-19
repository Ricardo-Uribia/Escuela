@extends('layouts.app')

@section('content')
<br><br><br>

<div class="container">
    <div class="row">
        <div class="col-md-2">
            <br><br><br>
            <a href="{{url('/')}}/registro"><button style="width: 110%; height= 50%;" class="btn btn-warning" >Registro de Aspirantes</button></a>
            <br><br>
            <a href="{{url('/')}}/subir/documentos"><button style="width: 110%; height= 50%;" class="btn btn-warning">Documentos</button></a>
        </div>
           
        <div class="col-md-10">
              <!-- Navigation-->

  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        
      </ol>  
      <!-- /TIPO DE DATO-->            
    <h3>Registrar nuevo alumno</h3>
     <!-- /SELECCIONAR CARRERA--> 

     <br>
     <br>
<form>

 
<!-- SUBE TUS DOCUMENTOS)--> 
 <h4><U>SUBE TUS DOCUMENTOS</U></h4>  
      
 <br>
  <br>
  <h4>Para subir tus documentos, deberás escanearlos en formato .pdf y renombrar cada archivo según se indica en cada ejemplo.</h4>
  <br>



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
      <input type="hidden" value="" name="idAlumno">

      <div class="input-group ">
                  
                 <span class="input-group-addon"> <input type="textarea" rows="3" class="form-control" name="descripcion"
                   value="ACTA DE NACIMIENTO" readonly="readonly" style="text-align:center" ></span>
               </div>
               <br>

 <br>

            <p><label>
            <input type="file" name="file" value="">
            </label></p>



<fieldset class="fields2">
      
                    
</fieldset> <br>

   
        <div class="input-group">
              <span class="input-group-addon">Fecha de recepción</span>
            <input type="text" class="form-control" name="recepcion" value="<?php echo date("Y/m/d"); ?>" readonly="readonly" size="10" >
                        
        </div><br>

 <br>



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
      <input type="hidden" value="" name="idAlumno">

          <div class="input-group ">
                  
                 <span class="input-group-addon"> <input type="textarea" rows="3" class="form-control" name="descripcion"
                   value="CURP" readonly="readonly" style="text-align:center"></span>
               </div>
               <br>

 <br>

            <p><label>
            <input type="file" name="file">
            </label></p>


<br>

        <div class="input-group">
          <span class="input-group-addon">Fecha de recepción</span>
          <input type="text" class="form-control" name="recepcion" value="<?php echo date("Y/m/d"); ?>"  readonly="readonly" size="10" >
        </div><br>


     <br>



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
      <input type="hidden" value="" name="idAlumno">
            <div class="input-group ">
                  
                 <span class="input-group-addon"> <input type="textarea" rows="3" class="form-control" name="descripcion"
                   value="CONSTANCIA DE BACHILLERATO" readonly="readonly" style="text-align:center" ></span>
               </div>

               <br>

 <br>


            <p><label>
            <input type="file" name="file">
            </label></p>

      
       <br>

        <div class="input-group">
           <span class="input-group-addon">Fecha de recepción</span>
           <input type="text" class="form-control" name="recepcion" value="<?php echo date("Y/m/d"); ?>" readonly="readonly" size="10" >
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
      <input type="hidden" value="" name="idAlumno">
           <div class="input-group ">
                  
                 <span class="input-group-addon"> <input type="textarea" rows="3" class="form-control" name="descripcion"
                   value="PAGO DE REGISTRO" readonly="readonly" style="text-align:center" ></span>
               </div>

               <br>


<br>

            <p><label>
            <input type="file" name="file">
            </label></p>


<fieldset class="fields2">
      
        <br>

        <div class="input-group">
            <span class="input-group-addon">Fecha de recepción</span>
            <input type="text" class="form-control" name="recepcion" value="<?php echo date("Y/m/d"); ?>" readonly="readonly" size="10" >
        </div><br>

 
      </div>

      <div class="modal-footer">
      <button type="submit" class="btn btn-success pull-right">Enviar</button>
      </div>
      </form>
      
    </div>
  </div>
</div>
</fieldset>
</div>
</div>

<br>
<br>

<h4><U>Manifiesto de responsabilidad</U></h4> 

  <div class="checkbox">
    <label>
      <input type="checkbox">
       Manifiesto que los documentos proporcionados son escaneo fiel de los originales, los cuales entregaré a la brevedad al Depto. de Control Escolar.
  </div>
  </div>
</label>






  <br>
  <br>
<div class="alert alert-warning"><h4><B>¡ATENCIÓN!</B> Antes de enviar tu solicitud, confirma que los datos y documentos que proporcionaste sean correctos y verídicos.</h4></div>
  <br>

 <div class="row"> 

<div class="col-md-4"> <a href="turegistro.php"><button type="button" class="btn btn-success btn-lg">ENVIAR SOLICITUD</button>
        </a></div>  
 <br>
  <br>

  <div class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Ejemplo de ventana modal</h4>
      </div>
      <div class="modal-body">
        <p>Ejemplo de texto interno.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Guardar</button>
       
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>
</form>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © UTPoniente 2018</small>
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
              <span aria-hidden="true">×</span>
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