@extends('layouts.admin')
@section('principal')

<div id="page-wrapper">

 <div class="panel panel-default">
                   <div class="panel-heading ">
                       <center><h4>Alumnos del Grupo</h4></center> 
                    </div>
               </div>
  <div>
      
       <!-- HEY, JULIÁN... AGREGUÉ ESTE BOTÓN. SI YA TIENES EL QUE VAS A PONER, ELIMÍNALO -->
      
      <!-- Button BUSCAR ALUMNO -->
 <a href="{{ url ('/buscarAlumno/'.$grupo->id)}}"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  Buscar Alumno
</button></a> 
 <!-- Button IR A GRUPO -->
 
 <a href="{{url('grupos')}}"><button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModalCenter">
  Ir a "Grupos"
</button></a> 


<!--<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalCenterTitle">Agregar alumno al grupo</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form method="GET" accept-charset="UTF-8" >
      
    <label for="listaAlumno">BUSCAR ALUMNO</label>
    <input name="listaAlumno"type="text" class="form-control"  placeholder="Ingresa la matrícula o primer y segundo apellidos..." value="{{request('Matricula')}}">
     <br>
    <button  action="url('/gfhef')" type="submit" class="btn btn-primary">BUSCAR</button>

    </form>
     <br>
     <br>
    <p><strong>Nombre del alumno: </strong></p><p>Ángel Felipe Julián Cocom Mis</p>
    <p><strong>Matrícula: </strong></p><p>17090259</p>
    <p><strong>Carrera: </strong></p><p>Técnico Superior Universitario en Tecnologías de la Información y Comunicación Área Sistemas Informáticos</p>
    <p><strong>Cuatri: </strong></p><p>1</p>
    <p><strong>Grupo: </strong></p><p>TIC_5-A</p>
  </div>
  
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary">Agregar al grupo</button>
      </div>
    </div>
  </div>
</div>-->



 <!-- HASTA AQUÍ TERMINA LA MODAL QUE AGREGUÉ. EL BOTÓN DE ABAJO ES EL QUE ESTABA, PERO LO "COMENTÉ" -->

    <!--a href="{{ url ('/crear/nuevo/grupo') }}"><button>Agregar alumno</button></a-->
  </div>
<br><br>
 <div class="table-responsive">
                    <h1>Grupo: <span class="label label-info">{{$grupo->Codigo_Grupo}}</span></h1>

                            <table class="table table-striped" id="BalumnoDataTable" >
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
                            <a href="{{ url ('crear/alumno') }}/{{$alg->id_alumno}}"><button class="btn btn-info"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                            </a></td>
                                            
                                            
                             
                             <td><form action="{{ url ('/eliminar/alumno-grupo/') }}/{{$alg->id}}" method="post" onclick="
                                return confirm('Desea eliminar al alumno')">

                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                              <button type="submit" class="btn btn-danger  fa fa-trash-o" ></button>
                            </form></td>
                                            
                                <td> <a href="{{ url ('lista/alumnos/grupos') }}/{{$alg->id}}" class="btn btn-success fa fa-check-square">ED</a></td>
                           </tr>
                          @endforeach
                        
                         </tbody>
                          </table>
            </div>

  </div>

      @push('BalumnoDataTable')
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
    $('#BalumnoDataTable').DataTable({
       "language": lang_spain


    });
            });



    
</script>

@endpush

<script >
  
  var $num =document.getElementById('tbUsuario').getElementsByTagName('tr').length -1;
  document.write("Alumnos inscritos: " +$num);

</script>




              
@endsection