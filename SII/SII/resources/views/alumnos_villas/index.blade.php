@extends('layouts.admin')

@section('principal')
    <div class="container">
        <div class="row">
          

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"></div>
                    <div class="card-body">
                        <a href="{{ url('/alumnos_villas/create') }}" class="btn btn-success btn-sm" title="Add New alumnos_villa">
                            <i class="fa fa-plus" aria-hidden="true"></i> Registrar Alumno
                        </a>
                        
                        <a href="{{ url('/catalogo_villas') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Catalogos</button></a>

                        <br>
                        <br>

                        <form method="GET" action="{{ url('/alumnos_villas') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                                        <!--th>#</th--><th>Identificador</th>
                                       
                                        <th>idCiclo</th>
                                        <th>idcatalogo_Villas</th>
                                        <th>idAlumno</th>
                                        <th>idGrupo Villa</th>
                                        <th>Observaciones Villa</th>
                                    </tr>
                                </thead>
                                <tbody style="border-bottom: 1px solid #000;">
                                @foreach($alumnos_villas as $item)
                                    <tr>
                                        <td>{{ $loop->iteration or $item->idalumnos_villas }}</td>
                                        
                                        <td>{{ $item->idCiclo }}</td>
                                        <td>{{ $item->idcatalogo_villas }}</td>
                                        <td>{{ $item->idalumno }}</td>
                                        <td>{{ $item->idgrupo }}</td>
                                        <td>{{ $item->observaciones_villa }}</td>
                                     
                                        <td width="10px">
                                            <a href="{{ url('/alumnos_villas/' . $item->idalumnos_villas) }}" title="View alumnos_villa"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Ver</button></a>
                                            </td>
                                            <td width="10px">
                                            <a href="{{ url('/alumnos_villas/' . $item->idalumnos_villas . '/edit') }}" title="Edit alumnos_villa"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
                                            </td>
                                            <td width="10px">
                                            <form method="POST" action="{{ url('/alumnos_villas' . '/' . $item->idalumnos_villas) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete alumnos_villa" onclick="return confirm(&quot;Esta seguro de Eliminar este alumno del registro?, es posible que ya no se visualice en la villa el cual se registro&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $alumnos_villas->appends(['search' => Request::get('search')])->render() !!} </div>
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
