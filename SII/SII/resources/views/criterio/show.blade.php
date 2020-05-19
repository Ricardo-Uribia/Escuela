@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Criterio {{ $criterio->idCriterio }}</div>
                    <div class="card-body">

                        <a href="{{ url('/criterio') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/criterio/' . $criterio->idCriterio . '/edit') }}" title="Edit Criterio"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('criterio' . '/' . $criterio->idCriterio) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Criterio" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $criterio->idCriterio }}</td>
                                    </tr>
                                    <tr><th> IdCriterio </th><td> {{ $criterio->idCriterio }} </td></tr><tr><th> Clave Crit </th><td> {{ $criterio->clave_crit }} </td></tr><tr><th> Criterio </th><td> {{ $criterio->criterio }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
