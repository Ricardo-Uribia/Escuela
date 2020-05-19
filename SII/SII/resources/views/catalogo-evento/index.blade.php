@extends('layouts.admin')

@section('principal')
    <div class="container">
        <div class="row">
           

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"></div>
                    <div class="card-body">
                        <!--a href="{{ url('/catalogo-evento/create') }}" class="btn btn-success btn-sm" title="Add New CatalogoEvento">
                            <i class="fa fa-plus" aria-hidden="true"></i> Nuevo Catalogo-Evento
                        </a-->

                        <!--a href="{{ url('/tipo-evento/') }}" class="btn btn-primary btn-sm" title="Add New TipoEvento">
                            <i class="" aria-hidden="true"></i> Nuevo Tipo-Evento
                        </a-->

            

                        <!--a href="{{ url('actividades')}}" class="btn btn-success btn-sm" title="Add New CatalogoEvento">
                                <i class="" aria-hidden="true"></i> historial Registro
                        </a-->

                        <a href="{{ url('historial')}}" class="btn btn-danger btn-sm" title="Add New CatalogoEvento">
                                <i class="" aria-hidden="true"></i> Eventos NO ACTIVOS
                        </a>

                         <a href="{{ url('eventoacti')}}" class="btn btn-warning btn-sm" title="Add New CatalogoEvento">
                                <i class="" aria-hidden="true"></i> Eventos ACTIVOS
                        </a>




                        



                  
                      


                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-striped" id="contador">
                                <center><h2>CATALOGO DE EVENTOS</h2></center>
                                <thead>
                                    <tr>
                                       <th>Identificador</th>
                                      
                                       <th>Ciclo-Cuatrimestre</th>
                                       <th>Tipo Evento</th>
                                       <th>Descripcion</th>
                                       <th>Categoria</th>
                                       <th>Fecha Inicio</th>
                                        <th>Hora Inicio</th>
                                      
                                    </tr>
                                </thead>
                                <tbody style="border-bottom: 1px solid #000;">
                                @foreach($catalogoevento as $item)
                                    <tr>
                                       <td width="10px">{{ $loop->iteration or $item->idCatalogoEvento }}</td>
                                        
                                        <td width="10px">{{ $item->idCiclo}}</td>
                                        <td width="10px">{{ $item->idEvento }}</td>
                                        <td>{{ $item->descripcion }}</td>
                                        <td>{{ $item->categoria }}</td>
                                        <td>{{ $item->fechaInicio }}</td>
                                        <td>{{ $item->horaInicio}}</td>
                                        
                                        
                                       
                                        <td>
                                            <a href="{{ url('/catalogo-evento/' . $item->idCatalogoEvento) }}" title="View CatalogoEvento"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> </button></a>
                                            <a href="{{ url ('registroevento') }}/{{$item->idCatalogoEvento}}" title="View CatalogoEvento"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true">Participantes</i></button></a>
                                            <!--a href="{{ url ('registroAlevento') }}/{{$item->idCatalogoEvento}}" title="View CatalogoEvento"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true">His.Ests</i></button></a-->
                                            <a href="{{ url('/catalogo-evento/' . $item->idCatalogoEvento . '/edit') }}" title="Edit CatalogoEvento"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </button></a>

                                            <!--form method="POST" action="{{ url('/catalogo-evento' . '/' . $item->idCatalogoEvento) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete CatalogoEvento" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> </button>
                                            </form-->
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

    var $num=document.getElementById('contador').getElementsByTagName('tr').length - 1;
    document.write("contador total de:    "+$num+" Todos los eventos avtivos y no activos");
    </script>

</center>
@endsection
