@extends('layouts.admin')

@section('principal')




    <div class="container">
        <div class="row">
           

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"></div>
                    <div class="card-body">
                     <a href="{{ url('/catalogo-evento') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Catalogo de Eventos</button></a>
                       
                        </a>
                        <a href="{{ url('actividades')}}" class="btn btn-primary btn-sm" title="Add New CatalogoEvento">
                            <i class="" aria-hidden="true"></i> historial Registro
                        </a>

                        <a href="{{ url('historial')}}" class="btn btn-danger btn-sm" title="Add New CatalogoEvento">
                                <i class="" aria-hidden="true"></i> Eventos NO ACTIVOS
                        </a>

                        <a href="{{ url('/catalogo-evento/create' )}}" title="create"><button class="btn btn-success btn-sm"><i class="" aria.hidden="true"></i> Catalogo Evento</button></a>
                            
                        <a href="{{ url('/tipo-evento/') }}" class="btn btn-primary btn-sm" title="Add New TipoEvento">
                            <i class="" aria-hidden="true"></i> Nuevo Tipo-Evento
                        </a>

                  
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-striped" id="contador"> 
                                <center><h2>Eventos Activos</h2></center>
                                <thead>
                                    <tr>
                                        <th>Identificador</th>
                                        <th>Ciclo-Cuatrimestre</th>
                                        <th>Tipo Evento</th>
                                        <th>Descripcion</th>
                                        <th>Categoria</th>
                                        <th>Fecha Inicio</th>
                                        <th>Hora Inicio</th>
                                      	<th>Sede</th>
                                      	<!--th>Estatus</th-->
                                    </tr>
                                </thead>
                                <tbody style="border-bottom: 1px solid #000;">
                                @foreach($catalogoevento as $ce)
                                	<tr>
                                		 <td width="10px">{{ $loop->iteration or $ce->idCatalogoEvento }}</td>
                                		<td width="10px">{{ $ce->idCiclo }}</td>
                                		<td width="10px">{{ $ce->idEvento }}</td>
                                		<td width="150px">{{ $ce->descripcion }}</td>
                                		<td width="10px">{{ $ce->categoria }}</td>
                                		<td>{{ $ce->fechaInicio }}</td>
                                		<td width="10px">{{ $ce->horaInicio }}</td>
                                		<td>{{ $ce->sede }}</td>
                                		<!--td>{{ $ce->idestatusEvento }}</td-->
                                        <td>
                                        <!--a href="{{ url('/buscarAlumnosAE')}}/{{$ce->idCatalogoEvento}}" class="btn btn-success btn-sm" title="Add New CatalogoEvento">
                                            <i class="fa fa-plus" aria-hidden="true"></i> Inscribir Alumno
                                        </a-->
                                            <a href="{{ url('/catalogo-evento/' . $ce->idCatalogoEvento) }}" title="View CatalogoEvento"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> </button></a>
                                            <a href="{{ url ('registroevento') }}/{{$ce->idCatalogoEvento}}" title="View CatalogoEvento"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true">Prts</i></button></a>
                                            <!--a href="{{ url ('registroAlevento') }}/{{$ce->idCatalogoEvento}}" title="View CatalogoEvento"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true">His.Ests</i></button></a-->
                                            <a href="{{ url('/catalogo-evento/' . $ce->idCatalogoEvento . '/edit') }}" title="Edit CatalogoEvento"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </button></a>
                                        
                                            <form method="POST" action="{{ url('/catalogo-evento' . '/' . $ce->idCatalogoEvento) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete CatalogoEvento" onclick="return confirm(&quot;Esta seguro de Eliminar el catalogo?, esto incluye a los alumnos registrados&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> </button>
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

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                 <div class="card">
                    <div class="card-header"></div>
                        <div class="card-body">

                             
                        </div>
                     
                 </div>
                    
                </div>
                
            </div>
            
        </div>
    </section>
    <script>

    var $num=document.getElementById('contador').getElementsByTagName('tr').length - 1;
    document.write("contador total de:    "+$num+" Eventos ativos");
    </script>

</center>
@endsection
