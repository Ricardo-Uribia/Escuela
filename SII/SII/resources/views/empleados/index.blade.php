@extends('layouts.admin')

@section('principal')
    <div class="container">
        <div class="row">
            

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header"><h2>Listado de Empleados</h2></div>
                    <div class="card-body">
                        
                        <a href="{{url('/crear/Empleado')}}"><br><br><button class="btn btn-success">Nuevo Empleado</button>
                    </a>
            

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th bgcolor="#AFF7ED">#</th><th bgcolor="#AFF7ED">Nombres</th><th bgcolor="#7e8286">Paterno</th><th bgcolor="#7e8286">Materno</th><th bgcolor="#7e8286">Genero</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($empleados as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->NombreEmpleado }}</td><td>{{ $item->txtPaterno }}</td><td>{{ $item->txtMaterno }}</td><td>{{ $item->genero }}</td>
                                        <td>
                                            <a href="{{ url('/empleado/' . $item->id) }}" title="View Empleado"><button class="btn btn-success btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> ver</button></a>

                                            <a href="{{ url('/empleado/' . $item->id . '/edit') }}" title="Edit Empleado"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
                                        <td>
                                        <form action="{{ url('delete/empleado/') }}/{{ $item->id }}" method="POST" onclick="return confirm('Seguro quieres eliminar este empleado')"> 

                                             <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                             <button type="submit" class="btn btn-danger fa fa.fa-trash-o">Eliminar</button>   
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $empleados->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
