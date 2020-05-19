@extends('layouts.admin')
@section('principal')

<div id="page-wrapper">
<br>
 <div class="col-md-12">
                        

                                 <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading ">
                            <center><h4></h4></center> 
                        </div>
                    </div>
            </div> 
        </div>

<h4><a href="{{ url ('crear/alumno') }}"> Registrar nuevo</a></h4>
<hr>

<div class="table-responsive">
  @if($data)
    <table class="table" id="listaDataTable">
      <thead>
        <tr>
          <td>Matricula</td>
          <td>Nivel</td>
          <td>Nombre</td>
          <td>Genero</td>
          <td>Status</td>
          <td>Grupo</td>
          <td></td>
          <td></td>
        </tr>
      </thead>
      <tbody>
      @foreach($data as $row)
          <td>{{ $row->Matricula }}</td>
          <td>{{ $row->Nivel }}</td>
          <td>{{ $row->Nombre }}</td>
          <td>{{ $row->Genero }}</td>
          <td>{{ $row->Status }}</td>
          <td>{{ $row->Grupo }}</td>
          <td>

            <a href="{{ route('lista.edit', $row->id) }}" class="btn btn-info">Editar</a>

            </td>
            <td>

            <form action="{{ route('lista.destroy', $row->id) }}" method="post">
              <input name="_method" type="hidden" value="DELETE">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <button type="submit" class="btn btn-danger">Eliminar</button>
            </form>
          </td>
        
        </tbody>

        @endforeach
      </table>
    @endif
  </div>
</div>



</div>

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


@endsection