@extends('layouts.admin')

@section('principal')
    <div class="container">
        <div class="row">
          
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">alumnosegresado {{ $alumnosegresado->idalumnosegresados }}</div>
                    <div class="card-body">

                        <a href="{{ url('/alumnosegresados') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/alumnosegresados/' . $alumnosegresado->idalumnosegresados . '/edit') }}" title="Edit alumnosegresado"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('alumnosegresados' . '/' . $alumnosegresado->idalumnosegresados) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete alumnosegresado" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $alumnosegresado->idalumnosegresados }}</td>
                                    </tr>
                                    <tr><th> Idalumnosegresados </th><td> {{ $alumnosegresado->idalumnosegresados }} </td></tr><tr><th> Nombre </th><td> {{ $alumnosegresado->nombre }} </td></tr><tr><th> Carrera </th><td> {{ $alumnosegresado->carrera }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
