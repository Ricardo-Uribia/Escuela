@extends('layouts.admin')
@section('principal')

    <div class="container">
        <div class="row">

            <div class="col-md-10">
                <div class="card">
                    <div class="panel panel-default">
                    <div class="panel-heading">
                        <center><h4> Plan Evaluacion Docente</h4></center>
                        </div></div>

                    <div class="card-body">
                        <a href="{{ url('/planed/create') }}" class="btn btn-success btn-sm" title="Add New Planed">
                            <i class="fa fa-plus" aria-hidden="true"></i> Nuevo Plan
                        </a>
                        
                        <a href="{{ url('/asignarplaned') }}" class="btn btn-primary btn-sm" title="Add New Preguntased">
                         Grupos
                        </a>
                            
                           
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table" id="contador" >
                                <thead>
                                    <tr>
                                        <!--th>#</th-->
                                        <!--th>Idplaned</th-->
                                        <th>Claveplaned</th>
                                        <th>Nombre</th>
                                        <th>Fecha de creacion</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody style="border-bottom: 1px solid #000;">
                                @foreach($planed as $item)
                                    <tr>
                                        <!--td>{{ $loop->iteration or $item->idplaned }}</td-->
                                        <!--td>{{ $item->idplaned }}</td-->
                                        <td>{{ $item->claveplaned }}</td>
                                        <td>{{ $item->nombre }}</td>
                                        <td>{{ $item->created_at}}</td>
                                        <td>

                                                <a href="{{ url('/planpreguntas') }}/{{$item->idplaned}}" title="View Planed"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i>vista </button></a>


                                            <a href="{{ url('/planed/' . $item->idplaned . '/edit') }}" title="Edit Planed"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </button></a>

                                            <form method="POST" action="{{ url('/planed' . '/' . $item->idplaned) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Planed" onclick="return confirm(&quot;Confirmar delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $planed->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
            var $num = document.getElementById('contador').getElementsByTagName('tr').length - 1;
            document.write("Planes: "+$num);
        
    </script>

@endsection
