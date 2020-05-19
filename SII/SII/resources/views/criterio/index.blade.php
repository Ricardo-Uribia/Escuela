@extends('layouts.admin')
@section('principal')
    <div class="container">
        <div class="row">

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Criterio</div>
                    <div class="card-body">
                        <a href="{{ url('/criterio/create') }}" class="btn btn-success btn-sm" title="Add New Criterio">
                            <i class="fa fa-plus" aria-hidden="true"></i>Agregar Nuevo
                        </a>

                        <form method="GET" action="{{ url('/criterio') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Buscar..." value="{{ request('search') }}">
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
                                        <th>#</th><th>IdCriterio</th><th>Momento</th><th>Clave Crit</th><th>Criterio</th><th>Fecha de Creación</th><th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($criterio as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->idCriterio }}</td><td>{{ $item->Momento->momento }}</td><td>{{ $item->clave_crit }}</td><td>{{ $item->criterio }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>
                                            <a href="{{ url('/criterio/' . $item->idCriterio) }}" title="View Criterio"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                            <a href="{{ url('/criterio/' . $item->idCriterio . '/edit') }}" title="Edit Criterio"><button class="btn btn-warning btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>

                                            <form method="POST" action="{{ url('/criterio' . '/' . $item->idCriterio) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Criterio" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $criterio->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
