@extends('layouts.admin')
@section('principal')

<div id="page-wrapper">

 <div class="panel panel-default">
                   <div class="panel-heading ">
                       <center><h4>Alumnos del Grupo</h4></center> 
                    </div>
               </div>
  <div>
      

  </div>
<br><br>
 <div class="table-responsive">
                    <h1>Grúpo: <span class="label label-info">{{$grupo->Codigo_Grupo}}</span></h1>

                            <table class="table table-striped" id="tbUsuario">
                                <thead>
                                    <tr>
                                <th>#</th>
                                <th>Matrícula</th>
                                <th>Nombre del Alumno</th>
                                <th>Genero</th>
                                <th>Status</th>
                                
                                 <th></th>
                                 <th></th>
                                 <th></th>
                                </tr>
                                </thead>
                            <tbody>
                           
                              @foreach($alumnogrupo as $alg)
                           <tr>
                              <td>{{ $loop->iteration }}</td>  
                              <td>{{$alg->Matricula}}</td>
                              <td>{{$alg->Paterno}} {{$alg->Materno}} {{$alg->Nombres}} </td>
                              <td>{{$alg->Genero}}</td>
                              <td>{{$alg->Status}}</td>

                           
             <td>
 
            <a href="{{ url('estadia/seg')}}/{{$alg->id_alumno}}" class="btn btn-info">SEGUIMIENTO EGRESADO</a>

            </td>

                                            
                                         
                                            
                                                          </tr>
                          @endforeach
                        
                         </tbody>
                          </table>
            </div>

  </div>

<script >
  
  var $num =document.getElementById('tbUsuario').getElementsByTagName('tr').length -1;
  document.write("Alumnos inscritos: " +$num);

</script>




              
@endsection

>