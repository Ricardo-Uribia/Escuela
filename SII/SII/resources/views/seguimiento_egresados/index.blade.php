@extends('layouts.admin')

@section('principal')
    <div class="container">
        <div class="row">
            

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"></div>
                    <div class="card-body">
                        <a href="{{ url('/grupos_seguimiento_egresados') }}" class="btn btn-primary btn-sm" title="Add New Seguimiento_egresado" style="border: #000 2px solid; background-color: #0000FF">
                            <i class="" aria-hidden="true"></i> Grupos
                        </a>
            

                        <br/>
                        <br/>
                        <br/>
                                <h4><b>Matricula:</b></h4>

                          <form method="GET" action="{{ url('/seguimiento_egresados') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                              
                            </div>
                              <span class="input-group-append">
                                    <button style="background-color: #FF9900" class="btn btn-secondary" type="submit">
                                        <i class="">buscar</i>
                                    </button>
                                </span>
                        </form>


                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <!--th>#</th--><th>Identificador</th><th>Matricula</th><th>Ciclo-escolar</th><th>Nombre</th><th>Carrera</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($seguimiento_egresados as $item)
                                    <tr>
                                        <!--td>{{ $loop->iteration or $item->idSeguimientoegresados }}</td-->
                                        <td>{{ $item->idSeguimientoegresados }}</td><td>{{ $item->matricula }}</td><td>{{ $item->Ciclo->descripcion }}</td><td>{{ $item->nombre }}</td><td>{{ $item->Niveles->Descripcion_Nivel }}</td>
                                        <td>
                                            <a href="{{ url('/seguimiento_egresados/' . $item->idSeguimientoegresados) }}" title="View Seguimiento_egresado"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Ver</button></a>
                                            <!--a href="{{ url('/seguimiento_egresados/' . $item->idSeguimientoegresados . '/edit') }}" title="Edit Seguimiento_egresado"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a-->

                                            <form method="POST" action="{{ url('/seguimiento_egresados' . '/' . $item->idSeguimientoegresados) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Seguimiento_egresado" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar</button>
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
    </div>


@endsection
