@extends('layouts.admin')
@section('principal')
    <title>Evaluacion Docente 2019</title>
  <div class="container"> 
   <div class="row">
    <div class="col-md-11">

          <div class="panel panel-default">
            @foreach($evaluaciondocente as $eval)
                  @endforeach
                   <div class="panel-heading ">
                       <center><h4>Evaluacion Docente "<?php 
                       echo $eval->Ciclo->descripcion;
                         ?>"</h4></center> 
                    </div>
               </div>
            
            <!--en proceso de estadias>
            <li role="presentation"><a href="#estadisticos" aria-controls="estadisticos" data-toggle="tab" role="tab">Evaluacion Docente</a></li-->
            

           <div class="row">
              <div class="col-md-4">
               <div class="form-group">
                  <label for="txtNombre">Nombre</label>
                   @foreach($evaluaciondocente as $eval)
                  @endforeach
                  <input type="txtNombre" required name="txtNombre" class="form-control" value="<?php 
        echo $eval->alumnosgrupos->Alumnos->Paterno." ".$eval->AlumnosGrupos->Alumnos->Materno." ".$eval->alumnosgrupos->Alumnos->Nombres;
         ?>" disabled>
                
                  </div> 
                </div>

                <div class="col-md-6">
                 <div class="form-group">
                   <label for="txtCarrera">Carrera</label>
                    <input type="text" required name="txtCarrera" class="form-control" value="<?php 
        echo $eval->alumnosgrupos->Grupos->Niveles->Nivel;
         ?>" disabled>
                     </div>                   
                    </div>

                      <div class="col-md-2">
                    <div class="form-group">
                   <label for="txtCuatrimestre">Cuatrimestre</label>
                    <input type="text" required name="txtCuatrimestre" class="form-control" value=    "<?php 
                       echo $eval->alumnosgrupos->Grupos->Cuatrimestre;
                         ?>" disabled>
                    </div>
                  </div>
                                    
            </div>



        <h3 class="col-mb-2">
          <img class="img-fluid img-profile rounded-circle" src="img/muser2-160x160.jpg" alt="ola"> Maestro(a):<span class="text-primary">Juan Centeno Morales</span>
          </h3>

          <div class="subheading mb-5"> <h3>Asignatura: Soporte de equipos de Computos</h3> </div>
                  

  

        <br><br>
        <div class="subheading mb-5">
              <ul class="fa-ul mb-0">
            <button id="btn3" class="btn btn-success" onclick='alert(" guardado")'>guardar</button>
          </ul>
        </div>

    </div>
  </div>
</div>

  @endsection
