@extends('layouts.admin')

@section('principal')




    <div class="container">
        <div class="row">
           

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"></div>
                    <div class="card-body">
                     <a href="{{ url('/eventoacti') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Eventos Activos</button></a>
              

                  
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-striped" id="contador">
                                <center><h2>HISTORIAL DE EVENTOS NO ACTIVOS</h2></center>
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
                                      	<th>Estatus</th>
                                    </tr>
                                </thead>
                                <tbody style="border-bottom: 1px solid #000;">
                                @foreach($catalogoevento as $ce)
                                	<tr>
                                		 <td width="10px">{{ $loop->iteration or $ce->idCatalogoEvento }}</td>
                                		<td>{{ $ce->idCiclo }}</td>
                                		<td>{{ $ce->idEvento }}</td>
                                		<td>{{ $ce->descripcion }}</td>
                                		<td>{{ $ce->categoria }}</td>
                                		<td>{{ $ce->fechaInicio }}</td>
                                		<td>{{ $ce->horaInicio }}</td>
                                		<td>{{ $ce->sede }}</td>
                                		<td>{{ $ce->idestatusEvento }}</td>
                                       
                                        
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
    document.write("contador total de:    "+$num+" Eventos no activos");
    </script>

</center>
@endsection
