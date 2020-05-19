@extends('layouts.admin')
@section('principal')

        <form method="GET" action="{{ url('/buscarAlumno')}}" accept-charset="UTF-8" >
      
    <label for="buscarAlumno">BUSCAR ALUMNO</label>
    <input name="buscarAlumno" type="text" class="form-control" id="buscarAlumno" placeholder="Ingresa la matrícula o primer y segundo apellidos..." value="{{request('Matricula')}}">
     <br>
    <button  type="submit" class="btn btn-primary">BUSCAR</button>
    </form>

         <br>
     <br>
     @foreach($listaAlumno as $oalumno)
      @endforeach
   
       <p><strong>Nombre del alumno: </strong></p><h4><?php echo $oalumno->Nombres." ".$oalumno->Paterno." ".$oalumno->Materno ?></h4>
       <p><strong>Matrícula: </strong></p><h4><?php echo $oalumno->Matricula ?></h4>
       <p><strong>Carrera: </strong></p><p><?php echo $oalumno->Carrera ?></p>
       <p><strong>Cuatrimestre: </strong></p><p>1</p>
       <p><strong>Grupo: </strong></p><p>TIC_5-A</p>
  
   

     

  </div>
  
      <div>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary">Agregar al grupo</button>
      </div>
@endsection