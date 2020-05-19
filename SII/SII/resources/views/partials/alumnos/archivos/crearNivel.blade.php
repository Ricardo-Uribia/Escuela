@extends('layouts.admin')
@section('principal')


<div id="page-wrapper">

<div class="col-md-9">

	<h1>Configuración</h1>

	
	<div class="tab-content">
    <div class="col-md-12 contenedor-datos">
        <div role="tabpanel">
          <ul class="nav nav-tabs" role="tablist">
      <li role="presentation" class="active"><a href="#niveles" aria-controls="niveles" data-toggle="tab" role="tab">Niveles</a></li>
      <li role="presentation"><a href="#" aria-controls="" data-toggle="tab" role="tab">Ciclos</a></li>
      <li role="presentation"><a href="#" aria-controls="" data-toggle="tab" role="tab">Cajas</a></li>
           
          </ul>




<form role="form-signin" class="form-horizontal" id="" method="POST" action="" > 
 {{csrf_field()}} 
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active"  id="niveles">
            <center>
             
               <br>
               
                    <div class="col-md-12">
                        <div id="sidebar">
                            <div class="well">
      <legend>Niveles Escolares </legend> 
        <p>En esta sección deberá ingresar todas las carreras, secciones o niveles educativos.</p>
         <div class="form-group">
         <input type="hidden" class="form-control" id="NUMEROALUMNO"  name="txtid" value="">
             </div>

           <div class="input-group">
       <span class="input-group-addon">Clave o Identificador</span>
            <input type="text" class="form-control" placeholder="" name="identificador" value="">
            </div><br>

          <div class="input-group">
          <span class="input-group-addon">Descripción del Nivel</span>
            <input type="text" class="form-control" placeholder="" name="descriptNivel" value="">
               </div><br>

     <div class="input-group">
            <span class="input-group-addon">Acuerdo de Creación o Incorporación</span>
          <input type="text" class="form-control" placeholder="" name="acuerdoCreacion" value="">
          </div><br>

		  <div class="input-group">
         <span class="input-group-addon">Fecha</span>
         <input type="date" class="form-control" placeholder="" name="fechaNivel" value="">
         </div><br>

            <div class="input-group">
            <span class="input-group-addon">Rango de Grados Permitidos</span>
         </div><br>


         <div class="input-group">
           <span class="input-group-addon">Del</span>
           <input type="text" class="form-control" placeholder="" name="del" value="">
   		   <span class="input-group-addon">A</span>
         <input type="text" class="form-control" placeholder="" name="a" value="">
     </div><br>

                       <div class="input-group">
            <span class="input-group-addon">Serie para Asignación de Matrículas</span>
                 <select class="form-control" name="asigMatricula" value="" disabled="">
                      <option value="">Ninguna</option>
                                    
                                </select>   
                            </div><br>

                            </div>
                        </div>
                    </div>
                    
           
                </center>
            </div>

          </div>

          <button type="submit" class="btn btn-success pull-right"> Guardar </button>
          
        </form>
      </div>
    </div>
  </div>

		</div>

</div>

	@endsection