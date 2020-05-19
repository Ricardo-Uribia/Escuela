
@extends('layouts.admin')
@section('principal')

<div id="page-wrapper">
<br>
 <div class="col-md-12">
                        

                                 <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading ">
                            <center><h4>Alumnos (todos)</h4></center> 
                        </div>
                    </div>
            </div> 
        </div>

<h4><a href="{{ url ('crear/alumno') }}"> Registrar nuevo</a></h4>
<hr>

<div class="table-responsive">
  @if($alum)
    <table class="table table-striped" id="listaDataTable">
      <thead>
          <th>Matricula</th>
          <th>Nivel</th>
          <th>Nombre</th>
          <th>Genero</th>
          <th>Status</th>
          <th>Grupo</th>
          <th></th>
          <th></th>
      </thead>
 
      @foreach($alum as $row)
      <tr>
          <td>{{ $row->Matricula }}</td>
          <td>{{ $row->Nivel }}</td>
          <td>{{ $row->Paterno }} {{ $row->Materno }} {{ $row->Nombres }} </a></td>
          <td>{{ $row->Genero }}</td>
          <td>{{ $row->Status }}</td>
          <td>{{ $row->Grupo }}</td>
          <td>


            <a href="{{ url ('EditarAlumno') }}/{{$row->id}}" class="btn btn-info">Ver</a>


            <a href="{{ url ('crear/alumno') }}/{{$row->id}}" class="btn btn-info">Editar</a>

            </td>
            <td>

            <form action="{{ route('lista.destroy', $row->id) }}" method="post">
              <input name="_method" type="hidden" value="DELETE">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <button type="submit" class="btn btn-danger" onclick=" return confirm('Desea eliminar al alumno')">Eliminar</button>
            </form>
          </td>
        </tr>
      
        @endforeach
      </table>
    @endif
  </div>
</div>



</div>

@push('listaDataTable')
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
    $('#listaDataTable').DataTable({
       "language": lang_spain


    });
            });



    
</script>

@endpush

@endsection