@extends('layouts.admin')
@section('principal')
    <title>Evaluacion Docente 2019</title>
  <div class="container">
    <div class="row">
      <div class="col-md-11">

     <section class="resume-section p-3 p-lg-5 d-flex d-column" id="marta">
        <div class="panel panel-default">
           <div class="panel-heading ">
                  <center><h4>Precentacion de la Evaluacion Docente</h4></center> 
                  </div>
               </div>              
      </section>

      <div class="col-sm-12">
        <h4><p><b>Estimado(a) estudiante:</b>  Con el propósito de mejorar la calidad de los aprendizajes que obtuviste en esta Universidad, y tu grado de satisfacción como estudiante, te pedimos responder el presente instrumento que tiene por objeto recolectar, con base en tu opinión, información objetiva acerca de la docencia, las tutorías y las asesorías que aquí se imparten, con el fin de tener datos para mejorar continuamente estos servicios.
        Dada la relevancia de la información proporcionada por usted, le solicitamos que responda cada pregunta del cuestionario con absoluta seriedad y responsabilidad.</p></h4>
        <br>
      <div class="row">

          <div  role="alert" class="alert alert-info">
    <button class="close" data-dismiss="alert">  
    </button>
  </div>

      <div class="col-sm-12">
         <h4><p><b>Instrucciones:</b> Teclea en el casillero que corresponda, el número que represente tu opinión, según la siguiente ESCALA DE VALORACIÓN, si el profesor demostró durante la totalidad de las sesiones del cuatrimestre las conductas listadas. </p></h4>
        </div>

        <div class="col-sm-5" >
        <div class="table-responsive">
          <table  class="table  table-condensed table-hover table-bordered " >  <!--table-bordered table-dark table-hover-->
          <thead>
            <tr>
             <center><th colspan="2">ESCALA DE VALORACIÓN</th></center>
             
            </tr>
          </thead>
          <tbody>
            <tr class="table-success">
              <center><th>TOTALMENTE DE ACUERDO</th></center>
              <td>5</td>
              
            </tr>
            <tr class="table-danger">
              <center><th>DE ACUERDO</th></center>
              <td>4</td>
            </tr>
            <tr class="table-warning">
              <center><th>MAS O MENOS DE ACUERDO</th></center>
              <td>3</td>
            </tr>
            <tr class="table-info">
              <center><th>EN DESACUERDO</th></center>
              <td>2</td>
            </tr>
            <tr class="table-warning">
              <center><th>TOTALMENTE EN DESACUERDO</th></center>
              <td>1</td>
            </tr>
            
          </tbody>
        </table>
        </div>
      </div>

      <div class="col-sm-7 ">

          <h4><p><b>NOTA:</b>"PODRÁS OBSERVAR QUE ALGÚN(OS) MAESTRO(S) IMPARTE(N) MÁS DE UNA ASIGNATURA EN LA CARRERA QUE CURSAS. POR ESTE MOTIVO, DEBERÁS EVALUARLO(S) DE ACUERDO A LAS CARACTERÍSTICAS ENLISTADAS, SEGÚN COMO HAYAS OBERVADO EN CADA ASIGNATURA."  </p></h4>
         </div>

    </div>
    <div class="row">
      <div class="col-sm-12">

        <h4>
          "SI YA HAS LEÍDO LA PRESENTACIÓN"</h4><a href="{{ url('/alumno_ev_docente') }}""><button class="btn btn-success" >Realizar Evaluacion</button></a>
      </div>
      
    </div>


  </div>


    </div>
  </div>
    
  </div>

  @endsection