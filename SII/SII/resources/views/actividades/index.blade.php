@extends('layouts.admin')

@section('principal')
    <div class="container">
        <div class="row">
           

            <div class="col-md-12"> 
                <div class="card">
                    <div class="card-header"></div>
                    <div class="card-body">
                        <a href="{{ url('/actividades/create') }}" class="btn btn-success btn-sm" title="Add New actividade">
                            <i class="fa fa-plus" aria-hidden="true"></i> Nuevo Registro
                        </a>
                        <a href="{{ url('/eventoacti') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Catalogo de Eventos</button></a>

                        <form method="GET" action="{{ url('/actividades') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                                <center><h2>REGISTROS</h2></center>
                                <thead>
                                    <tr>
                                       <th>Idactividades</th>
                                       <th>ID Ciclo</th>
                                       <th>ID Evento</th>
                                        <th>ID Catalogo Evento</th>
                                        <th>ID Alumno</th>
                                        <th>Descripcion</th>
                                    </tr>
                                </thead>
                                <tbody style="border-bottom: 1px solid #000;">
                                @foreach($actividades as $item)
                                    <tr>
                                        <td>{{ $loop->iteration or $item->idactividades }}</td>
                                        <td>{{ $item->idCiclo }}</td>
                                        <td>{{ $item->idEvento }}</td>
                                        <td>{{ $item->idCatalogoEvento }}</td>
                                        <td>{{ $item->id_alumno }}</td>
                                        <td>{{ $item->descripcion }}</td>
                                        <td>
                                            <a href="{{ url('/actividades/' . $item->idactividades) }}" title="View actividade"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> </button></a>
                                            <a href="{{ url('/actividades/' . $item->idactividades . '/edit') }}" title="Edit actividade"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </button></a>

                                            <!--form method="POST" action="{{ url('/actividades' . '/' . $item->idactividades) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete actividade" onclick="return confirm(&quot;Esta seguro de Eliminar el registro?, Es posible que el alumno ya no se pueda visualizar en el evento que pertenece &quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> </button>
                                            </form-->
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <!--div class="pagination-wrapper"> {!! $actividades->appends(['search' => Request::get('search')])->render() !!} </div-->
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
