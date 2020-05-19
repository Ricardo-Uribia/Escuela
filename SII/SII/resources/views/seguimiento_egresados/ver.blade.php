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

                           
                              
                            <td width="10px">
                             <!--a href="{{ url('/seguimiento_egresados/show')}}/{{$alg->id_alumno}}" ><button class="btn btn-info btn-sm"><i class="" aria-hidden="true"></i> VER</button></a-->
                            <a href="{{ url ('seguimiento_egresados/nuevo') }}/{{$alg->id_alumno}}"><button class="btn btn-info"style="border: #000 1px solid; background-color: #800080" >SE</i></button>
                                    
                            </a>
                            
                            </td>
                            <td width="10px">
                              <a href=""><button class="btn btn-danger"><i class="" aria-hidden="true"></i>Correo</button></a>
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