@extends('layouts.admin')
@section('principal')

<div class="row">
       <div class="col-lg-12">
              <div class="panel panel-default">
                   <div class="panel-heading ">
                       <center><h4>ASIGNAR PLAN ED. AL GRUPO</h4></center> 
                    </div>
               </div> 

               <a href="{{ url('/planed') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i></button></a> 

     <div class="row">
       <div class="col-lg-12">

          <form method="$_POST">

          <div class="col-md-4"> 
          <h4>Selecione el Plan ED</h4>
          <select  class="form-control" name="plan" id="plan">
            @foreach($planed as $planed)
              <option value="{{ $planed->idplaned }}">{{ $planed->nombre }}</option>
             @endforeach
           </select>
          </div>

        <div class="col-md-6">
          <h4>Seleccione el grupo para el cual desea asignar el plan ED.</h4>

              <select class="form-control" name="grupo" id="profesorgrupo">
             @foreach($profesorgrupo as $oag)
                 <option value="{{ $oag->idProfesorGrupo }}">{{ $oag->Grupos->Codigo_Grupo }}</option>
               @endforeach
            </select>
        </div>

          <div class="col-md-4">
                 <div class="form-group">
                  <label for="txtAsig">Asignatura</label>
                    <input type="text" readonly="true" name="Asig" class="form-control" value="<?php 
                   echo $oag->Asignaturas->nombre_asignatura; ?>">
                  </div>                   
              </div>
              <div class="col-md-6">
                 <div class="form-group">
                  <label for="txtAsig">Profesor</label>
                    <input type="text" readonly="true" name="Prof" class="form-control" value="<?php 
                   echo $oag->Profesores->Empleados->NombreEmpleado; ?>">
                  </div>                   
              </div>

              


        <div class="form-group col-md-1">
               <button type="submit" class="btn btn-success pull-right"> Asignar </button>
            </div>
      </form>
      
     </div>
   </div> 
            <br/>
            <br/>

        <div class="table-responsive">
          @foreach($alumno_kardex as $ak)
          <table class="table table-striped" id="asignacion">
        <thead>
            <tr>
              <th>Ciclo</th>
              <th>Alumno</th>
              <th>Grupo</th>
              <th>Asignatura</th>
              <th>profesor</th>
              <th class="col-md-2">Habilitaci®Æn</th>
              </tr>
            </thead>
            <tbody style="border-bottom: 1px solid #000;">
                                
                <tr>
                    <td>{{$ak->idCiclo}}</td>
                    <td>{{$ak->idAlumno}}</td>
                    <td>{{$ak->idProfesor}}</td>
                    <td>{{$ak->idAsignatura}}</td>
                    <td>{{$ak->idProfesor}}</td>
                    
                    <td>
                    <button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i>Habilitar</butto><a href="" title=""><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Reporte</button></a></td>

                </tr>
                          
            </tbody>
        </table>
          @endforeach








     <table class="table table-striped" id="asignacion">
        <thead>
            <tr>
              <th>Ciclo</th>
              <th>Grupo</th>
              <th>Asignado</th>
              <th class="col-md-2">Abilitaci√≥n</th>
              </tr>
            </thead>
            <tbody style="border-bottom: 1px solid #000;">
                                
                <tr>
                    <td>Mayo-Agoato2019</td>
                    <td>ADF-3B</td>
                    <td>Evaluacion Docente 2012<br>Tutoria2012</td>
                    <td>
                    <button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i>Abilitar</butto><a href="" title=""><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Reporte</button></a></td>

                </tr>
                          
            </tbody>
        </table>
      </div>

   
          <!--div>
          <a href="{{ url ('') }}"><button btn btn-primary" style="margin: 10px">Reporte</button></a>
          </div-->

        </div>
 	</div>

  

  <!--script type="text/javascript"> 
function selecciona(frm) { 
  for (i=0; ele = frm.plan.options[i]; i++) 
    ele.selected = true; 
} 

function selecciona2(frm) { 
  for (i=0; ele = frm.plan2.options[i]; i++) 
    ele.selected = true; 
}
</script-->  

@endsection

