@extends('layouts.admin')
@section('contenido')
<div class="invoice p-3 mb-3">
	<div class="row">
		<div class="col-9 float-left">
			<h4 class="page-header"><small><strong>Universidad Tecnológica del Poniente.</strong></small></h4>
			<div class="invoice-info">
				<div class="col-sm-5 invoice-col">
					<!--De-->
					<address>
				        Calle 29 S/N Col. Tres Cruces
				        <br>
				        Maxcanú, Yucatán, CP 97800
				        <br>
						Telefono: (997) 971 21 83
						<br>
						Email: contacto@utponiente.edu.mx
						<br>
					</address>
				</div>
			</div>
		</div>
		<div class="col-3 float-right">
			<small>Creación: {{$cuentacxc->created_at->format('d-m-Y')}}</small><br>
			<small>Alumno {{$cuentacxc->alumno->nombres." ".$cuentacxc->alumno->paterno." ".$cuentacxc->alumno->materno}}</small><br>
			<small>Matricula: {{$cuentacxc->alumno->matricula}}</small>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 table-responsive">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>Concepto o Plan</th>
						<th>Recibido Por</th>
						<th>Fecha de pago</th>
						<th>Precio</th>
					</tr>
				</thead>
				<tbody>
					@foreach($cuentacxc->productos as $details)
					<tr>
						<td>{{$details->id}}</td>
						<td>{{$details->codigo}}</td>
						<td>{{$details->pivot->recibidoPor}}</td>
						<td>{{$details->pivot->fechaPago}}</td>
						<td>{{$details->precio}}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
	<div class="row">
		<div class="col-6">
			<p class="lead"></p>
			<div class="table-responsive">
				<table class="table">
					<thead>
					<tr>
						<th>Ciclo</th>
						<th>Pagado</th>
						<th>No recibo</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>{{$cuentacxc->ciclo->descripcion}}</td>
						<td>{{$cuentacxc->pagado}}</td>
						<td>{{$cuentacxc->productos[0]->pivot->reciboCaja}}</td>
					</tr>
				</tbody>
				</table>
			</div>
		</div>
		<div class="col-6 float-right">
			<p class="lead"></p>
			<div class="table-responsive">
				<table class="table">
					<tbody>
						<tr>
							<th style="width: 50%">Cantidad programada + IVA:</th>
							<td>
								${{$cuentacxc->cantidadProgramada}}
							</td>
						</tr>
						<tr>
							<th style="width: 50%">Cantidad Pagada + IVA:</th>
							<td>
								{{($cuentacxc->cantidadPagada!=null)?'$'.$cuentacxc->cantidadPagada:'S/P'}}
							</td>
						</tr>
						<!--<tr>
							<th style="width: 50%">Shipping:</th>
							<td>
								$5.30
							</td>
						</tr>-->
						<tr>
							<th style="width: 50%">Adeudo:</th>
							<td>
								${{intval($cuentacxc->cantidadProgramada) - intval($cuentacxc->cantidadPagada)}}
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>

<div class="row no-print">
	<div class="col-12">
		<!--<a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"> Print</i></a>
		<button type="button" class="btn btn-warning float-right" style="margin-right: 5px"><i class="fa fa-edit"> Editar/Configurar</i></button>-->
		<a href="{{url('admin/crearcxc/index')}}" class="btn-neutral sys-background-color float-right" style="margin-right: 5px">REGRESAR</a>
	</div>
</div>
</div>	
@endsection