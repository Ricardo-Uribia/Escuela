@extends('layouts.admin')
@section('principal')
    <div class="container">
        <div class="row">
         
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Momento {{ $momento->idMomento }}</div>
                    <div class="card-body">

                        <a href="{{ url('/momento') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i>Regresar</button></a>
                        <a href="{{ url('/momento/' . $momento->idMomento . '/edit') }}" title="Edit Momento"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </button></a>

                        <form method="POST" action="{{ url('momento' . '/' . $momento->idMomento) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Momento" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $momento->idMomento }}</td>
                                    </tr>
                                    <tr><th> IdMomento </th><td> {{ $momento->idMomento }} </td></tr><tr><th> Momento </th><td> {{ $momento->momento }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
