@extends('layouts.admin')
@section('principal')

<div id="page-wrapper">

	<h1>Grupos</h1>

	
	<div>
		<a href="{{ url ('/crear/nuevo/grupo') }}" onclick="
                                return confirm('Desea Crear un nuevo Grupo')"><button>Nuevo Grupo</button></a>
	</div>

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
            <a href="{{ url ('lista/alumnos/grupos') }}/{{$grupos->id}}" class="btn btn-info fa fa-eye"></a>
      </td>
	  <td>
            <a href="{{ url ('grupo') }}/{{$grupos->id}}" class="btn btn-warning fa fa-pencil-square-o"></a>
      </td>
      <td>
            <form action="{{ url ('grupo') }}/{{$grupos->id}}" method="post" onclick="
                                return confirm('Desea Eliminar el Grupo')">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <button type="submit" class="btn btn-danger  fa fa-trash-o" ></button>
            </form>
      </td>
      
      <td>
            <a href="{{ url ('lista/alumnos/grupos') }}/{{$grupos->id}}" class="btn btn-success fa fa-check-square-o">ED</a>
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