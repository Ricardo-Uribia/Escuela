@extends('layouts.admin')
@section('contenido')
@if(Session::has('success'))
	<div class="small-box bg-success">
		<div class="card-header">
			<center><p>{{Session::get('success')}}</p></center>
		</div>
	</div>
@endif
@if(Session::has('error'))
	<div class="small-box bg-danger">
		<div class="card-header">
			<center><p>{{Session::get('error')}}</p></center>
		</div>
	</div>
@endif
<div class="card border-neutral">
	<div class="card-header">
		<h4 class="inline-block">Administrar Cuentas x Cobrar</h4>
			<a href="{{url('/admin/crearcxc/alumno')}}" class="btn-neutral btn-secondary float-right">Regresar</a>
		@if(!Session::has('ciclos'))
		    <small>
		        <strong style="color: red;">Hemos detectado que no ha seleccionado un ciclo para trabajar, eliga un ciclo de trabajo de lo contrario no podrá continuar</strong>
		    </small>
		@endif
		@if(count($ventascxc)==0)
			<small style="color: red;">Sin registros en el ciclo seleccionado</small>
		@endif
	</div>
	<div class="card-body">
		<table class="table">
			<thead>
				<th>ID</th>
				<th>Ciclo</th>
				<th>Alumno</th>
				<th>Pagado</th>
				<th>Fecha Asignación</th>
				<th>Opciones</th>
			</thead>
			<tbody>
				@foreach($ventascxc as $key => $ventacxc)
				
				<tr {{($ventacxc->pagado=='N')?"style=color:red;":"style=color:green;"}}>
					<td>{{$key+1}}</td>
					<td>{{$ventacxc->ciclo->descripcion}}</td>
					<td>{{$ventacxc->alumno->nombres}}</td>
					<td>{{$ventacxc->pagado}}</td>
					<td>{{$ventacxc->created_at}}</td>	
					<td>
						<form method="POST" action="{{url('/admin/view/cxc/alumno')}}" class="inline-block"> 
							@csrf
							<input type="hidden" name="cuentacxc_id" value="{{$ventacxc->id}}">
							<input type="submit" value="VER" class="btn-neutral btn-secondary">
						</form>
						<form method="POST" id="delealumcxc_{{$ventacxc->id}}" action="{{url('/admin/delete/alumn-cxc')}}" class=" inline-block"> 
							@csrf
							<input type="hidden" name="cuentacxc_id" value="{{$ventacxc->id}}">
							<input type="hidden" name="pagado" value="{{$ventacxc->pagado}}">
							<button type="button" onclick="return areyousure(`{{$ventacxc->id}}`);" value="ELIMINAR" class="btn-neutral btn-danger">Elimninar</button>
						</form>
					</td>
				</tr>
				@endforeach				
			</tbody>
		</table>
	</div>
	<div class="card-footer">	
		{{$ventascxc->links()}}
	</div>
</div>
<script>
	function areyousure(id) {
		console.log(id)
	Swal.fire({
	  title: '¡Advertencia!',
	  text: 'No podrás eliminar el registro si esta pagado',
	  icon: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonText: 'Cancelar',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Si, de acuerdo'
	}).then((result) => {
	  if (result.value) {
	  	
	  		document.getElementById('delealumcxc_'+id).submit();
	  	
	  }
	})
}
	
</script>
@endsection