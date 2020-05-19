@extends('layouts.admin')

@section('principal')

 
    <div class="container">
        <div class="row">
          

            <div class="col-md-12">
                <div class="card">

                    <div class="card-header"></div>
                    <div class="card-body">

                       
                        
                        <a href="{{ url('/catalogo_villas') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Catalogos</button></a>
                        
                         <a href="{{ url ('/buscarAlumnoRick/') }}/{{ $catalogo_villa->idcatalogo_villas }}"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                                            Agregar Alumno 
                                            </button></a> 



                        <br/>
                        <center><h2>Lista de alummnos que pertenecen a la villa</h2></center>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-striped" id="contador">
                                <thead>
                                    <tr>
                                        <!--th>#</th-->
                                        <th>Identificador</th>
                                        <!--th>ID</th-->
                                       <th>Nombre</th>
                                        <th>Matricula</th>
                                        <th>Carrera</th>
                                         <th>Genero</th>
                                         <th>ID Grupo</th>
                                    
                                        
                                    </tr>
                                </thead>
                                <tbody style="border-bottom: 1px solid #000;"> 
                                @foreach($catalogovilla as $cv)
                                    <tr>
                                        <td>{{ $loop->iteration or $cv->idalumnos_villas }}</td>
                                    
                                      <td>{{ $cv->Nombres }}</td>
                                      <td>{{ $cv->Matricula}}</td>
                                      <td>{{ $cv->Carrera }}</td>
                                      <td>{{ $cv->Genero }}</td>
                                      <td>{{ $cv->id_grupo }}</td>

                                     
                                      
                                        <td>
                                            <!--a href="{{ url('/alumnos_villas/' . $cv->idalumnos_villas) }}" title="View alumnos_villa"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a-->
                                            <!--a href="{{ url('/alumnos_villas/' . $cv->idalumnos_villas . '/edit') }}" title="Edit alumnos_villa"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a-->

                                            <form method="POST" action="{{ url('/alumnos_villas' . '/' . $cv->idalumnos_villas) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete alumnos_villa" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                          
                        </div>

                    </div>
                </div>
            </div>
        </div>
    <script>
            var $num=document.getElementById('contador').getElementsByTagName('tr').length - 1;
    document.write("contador total de:    "+$num+" registros");
    </script>
    </div>
@endsection
