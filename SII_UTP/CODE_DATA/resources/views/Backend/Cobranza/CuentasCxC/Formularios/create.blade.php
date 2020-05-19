@extends('layouts.admin')
@section('contenido')
@if(Session::has('error'))
	<div class="small-box bg-danger">
		<div class="card-header">
			<center><p>{{Session::get('error')}}</p></center>
		</div>
	</div>
@endif
<div class="card border-neutral">
	<div class="card-header">
		<h4 class="inline-block">Asignar Cuentas x Cobrar</h4>
		<a href="{{url('/admin/crearcxc/index')}}" class="{{Session::has('ciclos')?Null:'disabledContent'}} btn-neutral btn-secondary float-right">Administrar</a>
		<br>	
		@if(!Session::has('ciclos'))
		    <small>
		        <strong style="color: red;">Hemos detectado que no ha seleccionado un ciclo para trabajar, eliga un ciclo de trabajo de lo contrario no podrá continuar</strong>
		    </small>
		@endif
	</div>
	@if(Session::has('ciclos'))
		<div class="card-body">
		<div class="row">
			<div class="col-md-6"  id="buscadorAlumn">
				<form method="POST" action="{{url('/admin/search/alumno')}}"  onsubmit="return showLoad()">
				@csrf
				<label for="alumno">Buscar Alumno</label>
				<div class="input-group">
			        <input class="form-control" type="search" placeholder="Search" aria-label="Search" id="alumno" name="search">
			        <span class="input-group-append">
			        	<button type="submit" class="btn btn-primary">Buscar</button>
			        </span>
				</div>
				</form>
				@if(Session::has('mensaje'))
					<p style="color: red">{{Session::get('mensaje')}}</p>
				@endif
				<small>
					{{(count($alumno)>=1)?'':'Sin resultados'}}
				</small>
			</div>
			<div class="col-md-6 was-validated" id="plan_select_id" hidden>
				<label for="pla">Plan de pagos</label>
				<select required id="plan_id"  class="form-control" name="plan_id">
					<option value="">--SELECCIONA--</option>
					@foreach($planespago as $planpago)
						<option value="{{$planpago->id}}">{{$planpago->producto->codigo}}</option>
					@endforeach
					
				</select>
				@if(count($planespago)==0)
					<small>Sin planes en el ciclo seleccionado</small>
				@endif
			</div>
			
		</div>
		<br>

		<div class="row"  hidden="hidden" id="card-alumno">
			<div class="col-12">
				<div class="card card-widget widget-user">
					<div class="widget-user-header bg-info">
						<h3 id="nombre_ID" class="widget-user-username"></h3>
						<h5 class="widget-user-desc">Estudiante</h5>
						
					</div>
					<div class="widget-user-image">
						<img id="foto_id" class="img-circle elevation-2" src="" alt="Foto del alumno">
					</div>
					<div class="card-footer">
						<div class="row">
							<div class="col-sm-4 border-right">
								<div class="description-block">
									<h5 id="Matricula_ID" class="description-header"></h5>
									<span class="description-text">Matricula</span>
								</div>
							</div>
							<div class="col-sm-4 border-right">
								<div class="description-block">
									<h5 id="curp_id" class="description-header"></h5>
									<span class="description-text">Curp</span>
								</div>
							</div>
							<div class="col-sm-4 border-right">
								<div class="description-block">
									<h5 id="genero_id" class="description-header"></h5>
									<span class="description-text">Genero</span>
								</div>
							</div>
						</div>
						<form id="applyCxC" method="POST" action="{{url('/admin/crearcxc/alumn')}}">
							@csrf
							<input type="hidden" name="alumno_id" id="alumno_id" value="">
							<input type="hidden" name="planespago_id" id="planopago_id" value="">
							<input type="hidden" readonly class="form-control" name="folio" id="folio" value="{{$folio[0]['folio']}}">
							<div class="row float-right">
								<div class="col-4 was-validated">
										<label for="caja_id">Caja cobrante</label>
										<select required class="form-control" name="caja_id" id="caja_id">
											<option value="">--Selecciona--</option>
											@foreach($cajas as $caja)
												@if($caja->id == $folio[0]['caja_id'])
												<option value="{{$caja->id}}" selected>{{$caja->descripcion}}</option>
												@else
												<option value="{{$caja->id}}">{{$caja->descripcion}}</option>
												@endif
											@endforeach
										</select>
								</div>
								<div class="col-4">
									<label for="folio">Folio</label>
									<input required type="text" disabled class="form-control"  value="F-{{$folio[0]['folio']}}">
								</div>
								
									<button style="margin-top: 30px; margin-left:0px;" type="button" id="btnNewCxC" onclick="return areyousure()" class="btn-neutral btn-info float-right">Crear CxC</button>
								
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>	
	</div>
	@endif
</div>



@if(count($alumno)>=1)
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header sys-background-color">
        <h5 class="modal-title" id="exampleModalLongTitle">Coincidencias</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       	<table class="table table-hover" id="tableResult">
       		<thead>
       			<th>ID</th>
       			<th>Matricula</th>
       			<th>Nombres</th>
       			<th>Genero</th>
       			<th>Opciones</th>
       		</thead>
       		<tbody>
       			@foreach($alumno as $alumn)
				<tr>
					<td>{{$alumn->id}}</td>
					<td>{{($alumn->matricula)?$alumn->matricula:'Null'}}</td>
					<td>{{$alumn->nombres}}</td>
					@if($alumn->genero == 'M')
					<td>Masculino</td>
					@elseif($alumn->genero == 'F')
					<td>Femenino</td>
					@endif
					<td><button class="assing btn-neutral btn-secondary" onclick="setDataOnInputs(`{{$alumn}}`)">Asignar</button></td>
				</tr>
				@endforeach
       		</tbody>
       	</table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn-neutral btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
@endif
@section('scripts')
<script>
	$("#exampleModalCenter").modal().show();
	const nombre = document.getElementById('nombre_ID')
	const matricula = document.getElementById('Matricula_ID')
	const genero = document.getElementById('genero_id');
	const curp = document.getElementById('curp_id');
	const plan_select_id = document.getElementById('plan_select_id');
	const foto = document.getElementById('foto_id');
	const seccion = document.getElementById('card-alumno');
	const input_plan = document.getElementById("planopago_id");
	const alumno_id =  document.getElementById("alumno_id");
	var plan_id;
	
	function setDataOnInputs(data) {
	 	var datoAlumno = JSON.parse(data);
	 	setearDatos(datoAlumno);
	 	$("#exampleModalCenter").modal('hide');
	 	seccion.removeAttribute('hidden');
	 	plan_select_id.removeAttribute('hidden');
	}

	function setearDatos(datoAlumno){
		if (datoAlumno.genero == 'M') {
	 		genero.innerHTML = "Masculino";
	 	}else{
	 		genero.innerHTML = "Femenino";
	 	}
		nombre.innerHTML = datoAlumno.nombres;
	 	matricula.innerHTML = datoAlumno.matricula;
	 	curp.innerHTML = datoAlumno.curp;
	 	alumno_id.value = datoAlumno.id;

	 	if (datoAlumno.fotografia != null) {
	 		foto.setAttribute("src", datoAlumno.fotografia);
	 	}else{
	 		foto.setAttribute("src", `{{asset('/CODE_DATA/public/img/internal_statics/avatar_2x.png')}}`);
	 	}
	}

function areyousure() {
	Swal.fire({
	  title: '¿Estas Seguro?',
	  text: '¿Realmente deseas cargar este pago?, Podras ver los registros en el apartado de registros',
	  icon: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonText: 'Cancelar',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Si, cargar cuenta'
	}).then((result) => {
	  if (result.value) {
	  	if (input_plan.value == "") {
			Swal.fire({
			  icon: 'error',
			  title: 'Oops...',
			  text: 'Por favor selecciona un plan valido'
			})
	  	}else{
	  		document.getElementById("applyCxC").submit();
	  	}
	  }
	})
}
	
	const valuePlan = document.getElementById("plan_id");
	valuePlan.addEventListener('change', function(){
		plan_id =  valuePlan.value;
		input_plan.value = plan_id;
	});


</script>
@endsection
@endsection