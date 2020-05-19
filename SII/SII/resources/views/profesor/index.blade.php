@extends('layouts.admin')

@section('principal')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Profesor</div>
                    <div class="card-body">
                        <a href="{{ url('/profesor/create') }}" class="btn btn-success btn-sm" title="Add New Profesor">
                            <i class="fa fa-plus" aria-hidden="true"></i> Agregar Profesor
                        </a>

                        <form method="GET" action="{{ url('/profesor') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>IdProfesor</th><th>IdEmpleado</th><th>TipoProfesor</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($profesor as $item)
                                    <tr>
                                        <!--<td>{{ $loop->iteration }}</td>-->
                                        <td>{{ $item->id }}</td><td>{{ $item->idEmpleado }}</td><td>{{ $item->ClaveProfesor }}</td>
                                        <td>
                                            <a href="{{ url('/profesor/' . $item->idProfesor) }}" title="View Profesor"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Ver</button></a>
                                            <a href="{{ url('/profesor/' . $item->idProfesor . '/edit') }}" title="Edit Profesor"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                                            <a href="{{ url('/profesor/' . $item->idProfesor . '/edit') }}" title="Edit Profesor"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Asignar</button></a>

                                            <form method="POST" action="{{ url('/profesor' . '/' . $item->idProfesor) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Profesor" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $profesor->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
