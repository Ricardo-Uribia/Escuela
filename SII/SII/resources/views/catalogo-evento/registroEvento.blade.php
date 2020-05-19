@extends('layouts.admin')
@section('principal')


	

	<div class="container">
		<div class="row">
			<div class="col-md-12"> 
				<div class="card">
					<div class="card-header">
						
					</div>
						<div class="card-body">

						 <a href="{{ url('/eventoacti') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Eventos Activos</button></a>
						
						<!--a href="{{ url('/buscarAlumnosAE')}}"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i>Buscar Alumno</button></a-->
							            <a href="{{ url('/buscarAlumnosAE')}}/{{$catalogo_evento_1->idCatalogoEvento}}" class="btn btn-success btn-sm" title="Add New CatalogoEvento">
                                            <i class="fa fa-plus" aria-hidden="true"></i> Inscribir Alumno
                                        </a>

                                        <br>
                                        <center><h2>Lista de alumnos que pertenecen al evento</h2></center>
                                        <br>

							<div class="table-responsive"> 
								<table class="table" id="contador">
									<thead>
										<tr>
											<th>ID actividades</th>
											<th>Nombre</th>
											<th>Matricula</th>
											<th>Carrera</th>
											<th>Genero</th>
											<th>ID Grupo</th>
											
										</tr>
									</thead>
									<tbody style="border-bottom: 1px solid #000;">
										@foreach($catalogoevento as $ce)
										<tr>
											<td>{{ $loop->iteration or $ce->idactividades }}</td>
											<td>{{ $ce->Nombres }}</td>
											<td>{{ $ce->Matricula }}</td>
											<td>{{ $ce->Carrera }}</td>
											<td>{{ $ce->Genero }}</td>
											<td>{{ $ce->id_grupo }}</td>
											<td>
												<!--a href="{{ url('/actividades/' . $ce->idactividades) }}" title="View actividade"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> </button></a-->
											
												<form method="POST" action="{{ url('/actividades' . '/' . $ce->idactividades) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete actividade" onclick="return confirm(&quot;Esta seguro de Eliminar el registro?, Es posible que el alumno ya no se pueda visualizar en el evento que pertenece &quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> </button>
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

    var $num=document.getElementById('contador').getElementsByTagName('tr').length - 1;
    document.write("contador total de:    "+$num+" registros");
    </script>

</center>
</section>





@endsection