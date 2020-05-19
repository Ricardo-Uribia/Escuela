@extends('layouts.admin')
@section('principal')

<div id="page-wrapper">


  

                        <br/>


	<h1>Grupos</h1>

	
                    
<br><br>

<div class="table-responsive">

  <table class="table table-striped" id="tbUsuario" >
      <thead>
         <tr>
          <th>#</th>
          <th>Nivel o Sección</th>
          <th>Cuatrimestre</th>
          <th>Codigo del grupo</th>
          <!--th>Tipo</th-->
          <th>Cupo Maximo</th>
          <!--<td>Inscritos</td>-->
          <th>Grupo</th>
          <th>Turno</th>
          <th>Profesor Titular</th>
        
          <th></th>
          <th></th>
          <th></th>
          <th></th
          </tr>
      </thead>
      
      <tbody>

       @foreach ($grupo as $grupos)
         <tr>
            <td>{{ $loop->iteration }}</td>
             <td>{{$grupos->Identificador}}</td>
			<td>{{$grupos->Cuatrimestre}}</td>
			<td>{{$grupos->Codigo_Grupo}}</td>
			<!--td>{{$grupos->Tipo_Grupo}}</td-->
			<td>{{$grupos->Cupo_Maximo}}</td>
			<td>{{$grupos->Diferenciador_Grupo}}</td>
			<td>{{$grupos->Turno}}</td>
			<td>{{$grupos->NombreEmpleado}}</td>
			
			<td>
            <a href="{{ url ('estadia/ver') }}/{{$grupos->id}}" class="btn btn-info"><b>Ver Alumnos del Grupo</b></a>
          
      </td>
	
 
      
    
   </tr>
       
        @endforeach
             </tbody>
               </table>
   
        </div>

	</div>



<script >
  
  var $num =document.getElementById('tbUsuario').getElementsByTagName('tr').length -1;
  document.write("Mostrando un total de: " +$num+ " Grupos");

</script>




@endsection