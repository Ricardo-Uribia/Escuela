@extends('layouts.admin')
@section('principal')
    <div class="container">
        <div class="row">
        

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Preguntased {{ $preguntased->idpreguntaed }}</div>
                    <div class="card-body">

                        <a href="{{ url('/planpreguntas') }}/{{$preguntased->idplaned}}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/preguntased/' . $preguntased->idpreguntaed . '/edit') }}" title="Edit Preguntased"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('preguntased' . '/' . $preguntased->idpreguntaed) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Preguntased" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <!--tr>
                                        <th>ID</th><td>{{ $preguntased->idpreguntaed }}</td>
                                    </tr-->
                                    <!--tr><th> Idpreguntaed </th><td> {{ $preguntased->idpreguntaed }} </td></tr-->
                                    <tr><th> Claveplaned </th><td> {{ $preguntased->planed->claveplaned }} </td></tr>
                                    <tr><th> Numero </th><td> {{ $preguntased->numero }} </td></tr>
                                    <tr><th> Clavepregunta</th><td> {{ $preguntased->clavepregunta }} </td></tr>
                                    <tr><th> Preguntas </th><td> {{ $preguntased->preguntas }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
