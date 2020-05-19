@extends('layouts.admin')
@section('principal')

@if(session('status'))
  <div class="alert alert-success">
    {{ session('status') }}
  </div>
@endif
<div id="page-wrapper">

<div class="col-md-12">

	<h1>Asignaturas</h1>

	<div>
	<a href="{{ url ('/crear/asignatura') }}/{{$plan->idPlanEst}}"><button>Nueva Asignatura</button></a>
	</div><br><br>
  
<div class="table-responsive">

  <table class="table">
      <thead>
        <tr>
          <td>Clave</td>
          <td>Nombre</td>
          <td></td>
        </tr>
      </thead>
      <tbody>

		@foreach($listaAsignatura as $oasignatura)

			<td><a href="{{ url ('editar/asignatura') }}/{{$oasignatura->idAsignatura}}">{{$oasignatura->clave_asignatura}}</a></td>
  
			<td>{{$oasignatura->nombre_asignatura}}</td>
		

			<td>
        <a href="{{ url ('editar/asignatura') }}/{{$oasignatura->idAsignatura}}" class="btn btn-warning fa fa-pencil-square-o"></a>
      </td>

      <td>
        <form action="{{ url ('destroy/asignatura') }}/{{$oasignatura->idAsignatura}}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <button type="submit" class="btn btn-danger btn-sm" title="Delete Asignatura" onclick="return confirm(&quot;Desea eliminar esta asignatura?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                </form>
            
      </td>
      </tbody>
        @endforeach
      </table>
   
  </div>
		</div>

</div>

	@endsection