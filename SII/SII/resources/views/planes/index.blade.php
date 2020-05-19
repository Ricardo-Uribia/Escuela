@extends('layouts.admin')
@section('principal')

@if(session('status'))
  <div class="alert alert-success">
    {{ session('status') }}
  </div>
@endif
<div class="col-md-12">
	<h1>Planes De Estudio</h1>

	<div>
		<a href="{{ url ('/crear/plan') }}"><button>Nuevo Plan</button></a>
	</div>

<br><br>

<form method="POST" action="{{url('/planes')}}">
  @csrf
  <div class="row">
<div class="col-sm-10">
    <select class="form-control" name="carrera">
      <option value="">Seleccione una Carrera para Filtrar...</option>
      @foreach(App\Models\Niveles::all() as $carrera)
      @if($carrera->ACTIVO == 'S')
      <option value="{!!$carrera->id!!}"
        @if(!empty($idNivel))
          @if($idNivel==$carrera->id)
          selected
          @endif
        @endif
        ><?php echo $carrera->Nivel." en ".$carrera->Descripcion_Nivel ?></option>
        @endif
      @endforeach
    </select>
  </div>
  <div class="col-sm-2">
    <input type="submit" value="Filtrar" class="btn btn-primary btn-md ">
  </div>
  </div>
  </form><br><br><br>
<div class="table-responsive">
  <table class="table" id="planesDataTable">
      <thead>
          <th>Clave</th>
          <th>Nombre</th>      
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
   
			<td><a href="{{ url ('editar/plan') }}/{{$planEst->idPlanEst}}">{{$planEst->clave_plan}}</a></td>
			<td>{{$planEst->nombre_plan}}</td>
			<td>{{$planEst->oficio_auto}}</td>
			<td>{{$planEst->calif_min}}</td>
			<td>{{$planEst->calif_max}}</td>
			<td>{{$planEst->min_aprobatoria}}</td>
		
			<td>
			    <a href="{{ url ('asignaturas') }}/{{$planEst->idPlanEst}}" class="btn btn-info fa fa-eye"></a>

            

            </td>
             <td>
                <a href="{{ url ('editar/plan') }}/{{$planEst->idPlanEst}}" class="btn btn-warning fa fa-pencil-square-o"></a>
          </td>
          <td>  
               <form action="{{ url ('eliminar/plan') }}/{{$planEst->idPlanEst}}" method="post">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <button type="submit" class="btn btn-danger btn-sm" title="Delete Plan" onclick="return confirm(&quot;Desea eliminar este plan?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
       
        </form>
                

            </td>
        </tr>

        @endforeach
      </table>
   
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