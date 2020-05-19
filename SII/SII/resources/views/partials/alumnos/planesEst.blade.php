@extends('layouts.admin')
@section('principal')


<div id="page-wrapper">

<div class="col-md-12">

	<h1>Planes De Estudio</h1>

	<div>
		<a href="{{ url ('/crear/nuevo/plan') }}"><button>Nuevo Plan</button></a>
	</div>

<br><br>

<div class="table-responsive">

  <table class="table" id="planesDataTable">
      <thead>
          <th>Clave</th>
          <th>Nombre</th>
         <!-- <td>Carrera</td> -->
          <th>Oficio Auto</th>
          <th>Calif. mínima</th>
          <th>Calif. Máxima</th>
          <th>Mínima Aprobatoria</th>
        
          <th></th>
          <th></th>
          <th></th>
      </thead>

		@foreach ($plan as $planEst)
		<tr>
			<td><a href="{{ url ('crear/alumno') }}/{{$planEst->id}}">{{$planEst->Clave_Plan}}</a></td>
  
			<td>{{$planEst->Nombre_Plan}}</td>
      <!--<td>{{$planEst->nivel}}</td>-->
			<td>{{$planEst->Oficio_Auto}}</td>
			<td>{{$planEst->Calif_Min}}</td>
			<td>{{$planEst->Calif_Max}}</td>
			<td>{{$planEst->Min_Aprobatoria}}</td>
		
			<td>
			    <a href="{{ url ('crear/nuevaMateria') }}/{{$planEst->id}}" class="btn btn-info fa fa-eye"></a>

            

            </td>
             <td>
                <a href="{{ url ('editar/plan') }}/{{$planEst->id}}" class="btn btn-warning fa fa-pencil-square-o"></a>
          </td>
          <td>
                <form action="{{ url ('plan') }}/{{$planEst->id}}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button type="submit" class="btn btn-danger  fa fa-trash-o"></button>
                </form>

            </td>
        </tr>

        @endforeach
      </table>
   
  </div>

		</div>

</div>

@push('planesDataTable')
<script>
    $(document).ready(function(){
             
        var lang_spain = {
        "sProcessing":     "Procesando...",
        "sLengthMenu":     "Mostrar _MENU_ registros",
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ning煤n dato disponible en esta tabla",
        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sSearch":         "Buscar:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst":    "Primero",
            "sLast":     "脷ltimo",
            "sNext":     "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
  }
    $('#planesDataTable').DataTable({
       "language": lang_spain


    });
            });



    
</script>

@endpush

	@endsection