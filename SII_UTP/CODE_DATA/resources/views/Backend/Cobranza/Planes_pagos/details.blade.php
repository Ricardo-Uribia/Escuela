@extends('layouts.admin')
@section('contenido')
<div class="invoice p-3 mb-3">
	<div class="row">
		<div class="col-12">
			<h4 class="page-header"><small><strong>Universidad Tecnológica del Poniente.</strong></small>
				<small class="float-right">Creación: {{$planpago->created_at->format('d-m-Y')}}</small>
			</h4>
		</div>
	</div>
	<div class="row invoice-info">
		<div class="col-sm-4 invoice-col">
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
				Plan de pago: {{$planpago->producto->codigo}}
			</address>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 table-responsive">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>Ciclo</th>
						<th>Descripción</th>
						<th>Concepto</th>
						<th>Precio</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>{{$planpago->id}}</td>
						<td>{{$planpago->ciclos->descripcion}}</td>
						<td>{{$planpago->producto->descripcion}}</td>
						<td>{{$planpago->concepto->producto->codigo}}</td>
						<td>${{$planpago->producto->precio}}</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="row">
		<div class="col-6"></div>
		<div class="col-6 float-right">
			<p class="lead">Fechas de pago del {{$planpago->fechaInicio}} al {{$planpago->fechaFin}}</p>
			<div class="table-responsive">
				<table class="table">
					<tbody>
						<tr>
							<th style="width: 50%">Subtotal:</th>
							<td>
								${{$planpago->producto->precio}}
							</td>
						</tr>
						<!--<tr>
							<th style="width: 50%">Tax(9.3%)</th>
							<td>
								$10.34
							</td>
						</tr>
						<tr>
							<th style="width: 50%">Shipping:</th>
							<td>
								$5.30
							</td>
						</tr>-->
						<tr>
							<th style="width: 50%">Total:</th>
							<td>
								${{$planpago->producto->precio}}
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
		<form method="POST" action="{{route('/admin/plan_edit')}}" class="inline-block float-right">
			@csrf
			<input type="hidden" name="plan_id" value="{{$planpago->id}}">
			<button type="submit" class="btn-neutral btn-primary " style="margin-right: 5px">EDITAR</button>
		</form>
		<a href="{{url('admin/planes/pago')}}" class="btn-neutral sys-background-color float-right" style="margin-right: 5px">REGRESAR</a>
	</div>
</div>
</div>	
@endsection