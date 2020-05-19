@extends('layouts.admin')
@section('contenido')
@section('scripts')
  <script src="{{asset('/CODE_DATA/public/js/internal/swalDelete.js')}}"></script>
@endsection
@if(Session::has('success'))
	<div class="small-box bg-success">
		<div class="card-header">
			<center><p>{{Session::get('success')}}</p></center>
		</div>
	</div>
@endif
		<div class="card border-neutral">
			<div class="card-header">
				<h3 class="inline-block">Lista de planes de pago</h3>
		        <small style="color: red;">
		        	{{(!Session::has('ciclos'))?'Por favor, seleccione un ciclo para trabajar':null}}
		         </small>
		        <small style="color: red;">
		        	{{(Session::has('error'))?Session::get('error'):null}}
		        </small>
		        @include('Backend/Cobranza/Planes_pagos/Formularios/create')
				<button  id="btnNewPlan" href="" data-target="#modal-planes-create" data-toggle="modal" class="btn-neutral btn-secondary float-right">Nuevo plan de pago</button>
			</div>
			<div class="card-body ">
					<table class="table">
						<thead>
							<th>#</th>
							<th>Ciclo</th>
							<th>Código</th>
							<th >Fecha inicio</th>
							<th >Fecha Fin</th>
							<th>Opciones</th>
						</thead>
						<tbody>
							@foreach($planespago as $key => $planpago)
							<tr>
								<td>{{$key+1}}</td>
								<td>{{$planpago->ciclos->descripcion}}</td>
								<td>{{$planpago->producto->codigo}}</td>
								<td>{{$planpago->fechaInicio}}</td>
								<td>{{$planpago->fechaFin}}</td>	
								<td class="{{Session::has('ciclos')?null:'disabledContent'}}">
									@if($planpago->fechaFin != null)
									<form method="POST" action="{{route('details-plan')}}" class="inline-block">
										@csrf
										<input type="hidden" name="planId" value="{{$planpago->id}}">
										 <button type="submit" class="btn-neutral btn-secondary">Ver</button>
									</form>
									@else
									<form method="GET" action="{{url('/admin/configuracion/planpago')}}" class="inline-block">
										@csrf
										<input type="hidden" name="planId" value="{{$planpago->id}}">
										 <button type="submit" class="btn-neutral btn-secondary">Configurar</button>
									</form>
									@endif
									@if($planpago->producto->alumnocxcs->count() > 0)
										<small class="inline-block text-danger">Plan Asignado</small>
						            @else
						           	 	<button value="{{ Crypt::encrypt($planpago->id)}}" onclick="modelDelete(this, `{{url('/admin/planpago/delete')}}`,'Imposible eliminar, este plan ya ha sido asignado.')" class="btn-neutral btn-danger">Eliminar</button>
						            @endif
								</td>	
							</tr>
							@endforeach
						</tbody>
					</table>
			</div>
			<div class="card-footer">
				{{$planespago->links()}}
			</div>
		</div>



@if(!Session::has('ciclos'))
<script>
	const btnNewPlan = document.getElementById('btnNewPlan');
	btnNewPlan.setAttribute('hidden', 'hidden');
	const mensaje = document.getElementById('')
</script>
@endif

@endsection