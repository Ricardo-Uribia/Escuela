@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Profesor {{ $profesor->idProfesor }}</div>
                    <div class="card-body">

                        <a href="{{ url('/profesor') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/profesor/' . $profesor->idProfesor . '/edit') }}" title="Edit Profesor"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('profesor' . '/' . $profesor->idProfesor) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Profesor" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <a href="{{ url('/asig-horasprofesor/create') }}" class="btn btn-success btn-sm" title="Add New Empleado">
                            <i class="fa fa-plus" aria-hidden="true"></i> Asignar Horas
                        </a>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $profesor->idProfesor }}</td>
                                    </tr>
                                    <tr><th> IdProfesor </th><td> {{ $profesor->idProfesor }} </td></tr><tr><th> IdEmpleado </th><td> {{ $profesor->idEmpleado }} </td></tr><tr><th> TipoProfesor </th><td> {{ $profesor->tipoProfesor }} </td></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
