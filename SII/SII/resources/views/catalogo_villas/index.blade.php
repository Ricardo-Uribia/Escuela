@extends('layouts.admin')

@section('principal')
    <div class="container">
        <div class="row">
          

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"></div>
                    <div class="card-body">
                        <a href="{{ url('/catalogo_villas/create') }}" class="btn btn-success btn-sm" title="Add New catalogo_villa">
                            <i class="fa fa-plus" aria-hidden="true"></i> Agregar Catalogo
                        </a>
                        
                        <a href="{{ url('/grupos_villas') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Agregar Villa</button></a>

                        <a href="{{ url('/alumnos_villas') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Alumnos Todos</button></a>
                        
                        <!--a href="{{ url ('/buscarAlumnoRick/') }}"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                                            Registrar Alumno
                        </button></a--> 

                        <br>
                        <br>

                        <form method="GET" action="{{ url('/catalogo_villas') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br/>
                        <br/>
                        <div class="table-responsive"> 
                            <table class="table table-striped" id="contador">
                                <thead>
                                    <tr>
                                        <!--th>#</th--> 
                                        <th>Identificador</th>
                                        <!--th>Ciclo</th-->
                                        <th>Grupos villas</th>
                                        <th>Genero</th>
                                        <th>Cupo Maximo</th>
                                        <th>Responsable Villa</th>
                                    </tr>
                                </thead>
                                <tbody style="border-bottom: 1px solid #000;"> 
                                @foreach($catalogo_villa as $item)
                                    <tr>
                                        <td width="10px">{{ $loop->iteration or $item->idcatalogo-villas }}</td>
                                        <!--td width="10px">{{ $item->idcatalogo_villas }}</td-->
                                        <!--td width="10px">{{ $item->idCiclo }}</td-->
                                        <td width="10px">{{ $item->idgrupos_villas }}</td>
                                        <td>{{ $item->genero }}</td>
                                        <td>{{ $item->cupoMaximo }}</td>
                                        <td>{{ $item->responsableVilla }}</td>
                                        <td>
                                            <!--a href="{{ url ('/buscarAlumnoRick/') }}/{{ $item->idcatalogo_villas }}"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                                            Agregar Alumno 
                                            </button></a--> 
                                        
                                            <a href="{{ url('/registro_villa')}}/{{ $item->idcatalogo_villas }}" title="ver villa"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i>Ver alumnos de la villa</button></a>
                                        </td>
                                        <td>
                                            <a href="{{ url('/catalogo_villas/' . $item->idcatalogo_villas) }}" title="View catalogo_villa"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Ver</button></a>
                                     
                                            <a href="{{ url('/catalogo_villas/' . $item->idcatalogo_villas . '/edit') }}" title="Edit catalogo_villa"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Editar</button></a>
                                       
                                            <form method="POST" action="{{ url('/catalogo_villas' . '/' . $item->idcatalogo_villas) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete catalogo_villa" onclick="return confirm(&quot;Esta seguro de Eliminar el Catalogo de una Villa?, esta accion eliminara los registros que contiene&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar villa</button>
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
    document.write("contador total de:    "+$num+" Villas");
    </script>
    </div>
@endsection
