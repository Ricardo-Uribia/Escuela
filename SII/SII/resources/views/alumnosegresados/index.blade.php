@extends('layouts.admin')

@section('principal')
    <div class="container">
        <div class="row">
       

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Alumnosegresados</div>
                    <div class="card-body">
                        <a href="{{ url('/alumnosegresados/create') }}" class="btn btn-success btn-sm" title="Add New alumnosegresado">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        <form method="GET" action="{{ url('/alumnosegresados') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                                        <!--th>#</th><th>Idalumnosegresados</th--><th>Nombre</th><th>Carrera</th><th>Matricula</th><th>Grupo</th><th>Estatus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                               @foreach($alumnosegresados as $item)
                                    <tr>
                                        <!--td>{{ $loop->iteration or $item->idalumnosegresados }}</td-->
                                        <!--td>{{ $item->idalumnosegresados }}</td--><td>{{ $item->nombre }}</td><td>{{ $item->carrera }}</td><td>{{ $item->matricula}}</td><td> {{ $item->grupo}}</td><td>{{ $item->estatus}}</td>
                                        <td>
                                            <a href="{{ url('/alumnosegresados/' . $item->idalumnosegresados) }}" title="View alumnosegresado"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Ver</button></a>
                                            <a href="{{ url('/alumnosegresados/' . $item->idalumnosegresados . '/edit') }}" title="Edit alumnosegresado"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Datos</button></a>
                                            <form method="POST" action="{{ url('/alumnosegresados' . '/' . $item->idalumnosegresados) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete alumnosegresado" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                    
           
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $alumnosegresados->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
