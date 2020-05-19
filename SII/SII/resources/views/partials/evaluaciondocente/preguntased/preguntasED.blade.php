@extends('layouts.admin')
@section('principal')
    <div class="container">
        <div class="row">

            <div class="col-md-11">
                <div class="card">
                   <div class="panel panel-default">
                        @foreach($plan as $item)
                        @endforeach
                   <div class="panel-heading ">
                       <center><h4>Preguntas del plan"<?php 
                       echo $item->planed->nombre;
                         ?>"</h4></center> 
                    </div>
                    
               </div>
                    <div class="card-body">
                         <a href="{{ url('/planed') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i></button></a>

                        <a href="{{ url('/preguntased/create') }}" class="btn btn-success btn-sm" title="Add New Preguntased">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                        </a>
                        

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-striped" id="tblUsuario">
                                <thead>
                                    <tr>
                                        <!--th>#</th-->
                                        <!--th>Idpreguntaed</th-->
                                        <!--th>Idplaned</th-->
                                        <th>Numero</th>
                                        <th>Claveplaned</th>
                                        <th>Clavepregunta</th>
                                        <th>Pregunta</th>
                                        <th class="col-md-2">Opciones</th>
                                    </tr>
                                </thead>
                                <tbody style="border-bottom: 1px solid #000;">
                                @foreach($plan as $item)
                                    <tr>
                                        <!--td>{{ $loop->iteration}}</td-->
                                        <!--td>{{ $item->idpreguntaed }}</td-->
                                        <!--td>{{ $item->idplaned }}</td-->
                                        <td>{{ $item->numero }}</td>
                                        <td>{{ $item->planed->claveplaned}}</td>
                                        <td>{{ $item->clavepregunta}}</td>
                                        <td>{{ $item->preguntas}}</td>
                                        <td>
                                            <a href="{{ url('/preguntased/' . $item->idpreguntaed) }}" title="View Preguntased"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button></a>

                                            <a href="{{ url('/preguntased/' . $item->idpreguntaed . '/edit') }}" title="Edit Preguntased"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>

                                            <form method="POST" action="{{ url('/preguntased' . '/' . $item->idpreguntaed) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Preguntased" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
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

    <script>
            var $num = document.getElementById('tblUsuario').getElementsByTagName('tr').length - 1;
            document.write("Preguntas: "+$num);
        
    </script>


@endsection
