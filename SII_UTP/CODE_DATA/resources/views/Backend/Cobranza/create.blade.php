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
	    <h4 class="inline-block">Cobranza</h4>
		<a href="{{url('/admin/cobranza/conceptos/esporadicos/')}}" class="btn-neutral btn-secondary float-right">CONCEPTOS ESPORADICOS</a>
		<p id="mensaje_global"></p>
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-3">
				<div class=" row">
					<label for="buscador">Alumno</label>
					<form class="form-inline ml-3" id="formSearchAlum" method="POST" action="{{route('buscarAlumno')}}">
						@csrf
						<input type="hidden" name="type" value="cplan">
				      <div class="input-group">
				        <input class="form-control" type="search" placeholder="Search" aria-label="Search" id="txtSearchAlum" name="search">
				        <div class="input-group-append">
				         <button class="btn btn-default" type="button" id="btnSearchAlum">
				           <i class="fa fa-search"></i>
				         </button>
				        </div>
				      </div>
				      <p id="mensaje"></p>
				    </form>
				</div>
			</div>
				<div class="col-9">
					<div class="row">
						<div class="col-4 was-validated">
							<label for="fecha">Fecha</label>
							<input required type="date" name="fecha" id="fecha" class="form-control" readonly value="<?php echo date('Y-m-d'); ?>">
						</div>
					</div>
				</div>
		</div>
		<div class="row">
			<div class="col-12">
				<br>
				<div class="card card-outline card-primary">
					<div class="card-body table-responsive">
						
						<table id="tplanprodcut" class="table table-striped table-bordered table-condensed table-hover">
							<thead style="background-color:#A9D0F5">
								<tr>
									<th>Item</th>
									<th>Alumno</th>	
									<th>Código</th>	
									<th>Ciclo</th>	
									<th>Descripción</th>
									<th>Precio</th>		
									<th>Eliminar</th>
								</tr>
							</thead>
							<tbody>
							@if(Session::has('CARRITO_PL'))
								@forelse ($products as $key =>$producto)
									<tr>
										<td>{{$key}}</td>
										<td>{{$producto['student']}}</td>
										<td>{{$producto['products']['codigo']}}</td>
										<td>{{$producto['cycleYear']}}</td>
										<td>{{$producto['products']['descripcion']}}</td>
										<td>${{number_format($producto['products']['precio'])}}</td>
										<td><a href="{{url('/remover-item')}}/{{$producto['products']['id']}}"><button class="btn-neutral btn-danger" type="button" >X</button></td></a>
									</tr>
								 @empty
									<tr>
			                           <td colspan="7">Sin planes agregados</td>
			                        </tr>
								 @endforelse
	                        @else
	                            <tr>
		                           <td colspan="7">Sin planes agregados</td>
		                        </tr>
							@endif
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="col-6"></div>
			<div class="col-6 float-right">
				<div class="table-responsive">
					<table class="table">
						<tbody>
							<tr>
								<th style="width: 50%">Subtotal:</th>
								<td id="vsubtotal">$.{{ !empty($totalPrecio) ? number_format($totalPrecio) : '0'}}</td>
							</tr>
							<tr>
								<th style="width: 50%">IVA:</th>
								<td id="vsubtotal">0</td>
							</tr>
							<tr>
								<th style="width: 50%">Total:</th>
								<td>${{ !empty($totalPrecio) ? number_format($totalPrecio * 1.00) : '0' }}</td>
								<input type="hidden" name="vtotal" id="vtotal" value="{{ !empty($totalPrecio) ? ($totalPrecio * 1.00) : '0' }}">
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		@if(!empty($totalPrecio))
		<div class="card-footer">
			<div class="row">
				<div class="col-6"></div>
				<div class="col-6 float-right">
					<form method="POST" action="{{route('cobrar-plan')}}" id="formCobro">
						@csrf
						<input type="hidden" name="type" value="_PL">
						<input type="hidden" name="iva" value="1.00">
						<button class="btn-neutral border-neutral btn-lg btn-block" type="button"  id="btnCobrar" onclick="return swal_confirm_pago();">Cobrar</button>
					</form>	
				</div>
			</div>		
		</div>
		@endif
<div class="modal fade" id="alumnocxc" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header sys-background-color">
        <h5 class="modal-title" id="exampleModalLongTitle">Alumnos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	 <p class="float-rigth" id="resultados">Resultados</p>
      	 <p class="float-rigth" id="state_mensaje" hidden></p>
      	 <input type="hidden" id="alumno_id" name="alumno_id">
      	 <div class="table-responsive">	
      	 	<table class="table table-hover">
	       		@csrf
	       		<thead>
	       			<th>Matricula</th>
	       			<th>Nombres</th>
	       			<th>Plan</th>
	       			<th>Ciclo</th>	
	       			<th>Opciones</th>
	       		</thead>
	       		<tbody id="table_list_alums">
	       		</tbody>
	       	</table>
      	 </div>
      </div>
      <div class="modal-footer">
      	<button type="button" class="btn-neutral btn-info" hidden id="btnAccepted">Aceptar</button>
        <button type="button" id="btnModalCancel" class="btn-neutral btn-danger" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

@section('scripts')
<script defer>
	/*Referencias a elementos HTML y variables goblales*/
	const btnSearchAlum 		= document.getElementById('btnSearchAlum');
	const btnAccepted			= document.getElementById('btnAccepted');
	const btnModalCancel		= document.getElementById('btnModalCancel');
	const btnCobrar				= document.getElementById('btnCobrar');
	const txtSearchAlum 		= document.getElementById('txtSearchAlum');
	const txtItemN0				= document.getElementById('itemN0');
	const vsubtotal				= document.getElementById('vsubtotal');
	const vtotal				= document.getElementById('vtotal');
	const table_list_alums		= document.getElementById('table_list_alums');
	const table_planes_alums 	= document.getElementById('table_planes_alums');

	/*Funcion de accion del boton de buscar alumnos*/ 
	btnSearchAlum.addEventListener('click', function(){
		consult_register_alum('POST', `{{route('buscarAlumno')}}`, 'formSearchAlum');
	});

	btnAccepted.addEventListener('click', function(){
		setTimeout(window.location=window.location.href, 1000);
	});

	btnModalCancel.addEventListener('click', function(){
		peticions(null, `{{url('/prueba/delete')}}`, 'mensaje_global');
		setTimeout(window.location=window.location.href, 1000);
	});

	/*Funcion de peticiones al servidor*/
	function consult_register_alum(METHOD, URL, IDFORM){
		let message 	= document.getElementById('mensaje');
		let args 		= {method: METHOD, url: URL, HTML_form_id: IDFORM};
		api = pretty.create(args);
		api.beforeSend(function(){
			mensaje.innerHTML = "Buscando...";
		});
		api.send(function(done, request){
			var response 		= JSON.parse(request);
			message.innerHTML 	= "";
			if (done == false) {
				message.innerHTML = "Oups.. por favor vuelva a intentar";
				throw request;
			}

				if (response.status == 200) {
					innerAlumnosHTML(response.data);
					txtSearchAlum.value 	= "";
				}else{
					alert(response.data);
					txtSearchAlum.value 	= "";
				}
			
		});
	}

	/*Funcion que muestra modal con los resultados obtenidos de busqueda*/
	function innerAlumnosHTML(response){
		let modal 	= $('#alumnocxc').modal().show();
		let result 	= document.getElementById('resultados');
    	var info 	= "";
    	for(let i = 0; i < response.length; i++) {
    		info += "<tr><td>"+response[i].alumno.matricula+"</td><td>"+response[i].alumno.nombre+"</td><td>"+response[i].producto.codigo+"</td><td>"+response[i].alumnocxc.ciclo+"</td><td><button id='btnAdd"+i+"' type='button' onclick='selectProduct("+JSON.stringify(response[i])+")'' class='assing btn-neutral btn-secondary '>Asignar</button></td></tr>";
    		table_list_alums.innerHTML = info;
    	}
    	result.innerHTML = 'Coincidencias: ' + response.length;
	}
	

	/*Funcion para agregar todos los planes a cobrar*/
	function selectProduct(data){ 
		var td 					= event.target.parentNode; 
		var tr 					= td.parentNode;
		var index 				= Array.from(tr.parentNode.children).indexOf(tr);
		let array_product = [
		   {
		      "alumnocxc_id":data.alumnocxc.id,
		      "alumno_id": data.alumno.alumnoID,
		      "producto_id": data.producto.productoID,
		      "price_product": data.alumnocxc.precio,
		      "ciclo": data.alumnocxc.ciclo,
		      "btnAction": 'agregar'
		   }
		];
		peticions(array_product, `{{url('prueba')}}`, 'state_mensaje');
		btnAccepted.removeAttribute('hidden');
		tr.parentNode.removeChild(tr);
	}

	function peticions(PARAMS, URL, MENSAJE){	
		let request   = new XMLHttpRequest();
		const _token  = document.getElementsByName('_token');
		let params 	  = '_token='+_token[2].value+'&data='+JSON.stringify(PARAMS);
		request.open('POST', URL, true);
		request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
		request.onload = function(){
			if (this.status >= 200 && this.status < 400) {
			    // Success!
			    var resp = JSON.parse(this.response);
			    const mnsj= document.getElementById(MENSAJE);
			    if (resp.state == 404) {
			    	mnsj.removeAttribute('hidden','hidden');
			    	mnsj.innerHTML = resp.message;
			    	//$(mnsj).fadeOut(2000);
			    	mnsj.setAttribute('hidden','hidden');
			    }else{
			    	mnsj.removeAttribute('hidden','hidden');
			    	mnsj.innerHTML = resp.message;
			    	//$(mnsj).fadeOut(2000);
			    	mnsj.setAttribute('hidden','hidden');
			    }
			  } else {
			    // We reached our target server, but it returned an error
			    console.log("Error de servidor");
			  }
		};
		request.send(params);
	}


	/*Funcion de confirmacion de pago*/
	function swal_confirm_pago(){
	 	let total_HTML			= vtotal.value;
	 	Swal.fire({
	 	  title: '¿Estas Seguro?',
	 	  text: '¿Realmente deseas cobrar este pago?',
	 	  icon: 'warning',
	 	  showCancelButton: true,
	 	  confirmButtonColor: '#3085d6',
		  cancelButtonText: 'Cancelar',
	 	  cancelButtonColor: '#d33',
	 	  confirmButtonText: 'Si, cobrar'
	 	}).then((result) => {
	 	  	if (result.value) {
	 	  		swal_pago();
	 	  	}

	 	})
	 	  	
	}

	function swal_pago(){
		Swal.fire({
	 		title: 'Ingrese la cantidad pagada',
	 		input: 'text',
	 		showCancelButton: true,
	 		confirmButtonText: 'OK',
	 		showLoaderOnConfirm: true,
	 	}).then((result) => {
	 		if(result.dismiss!= 'cancel'){
		 		if (result.value == "") {
		 			swal_error("Debes ingresar un valor valido");
		 		}else{
		 			let evaluar = evaluar_cambio(result.value);
		 			if(evaluar != true){
		 				swal_error("El valor ingresado no es sufiente");
		 			}else{
		 				swal_cambio(result.value - parseInt(vtotal.value));	
		 			}
		 		}
		 	}
	 	})
	}

	function swal_error(message){
		Swal.fire({
		  icon: 'error',
		  title: 'Oops...',
		  text: message,
		})
	}

	function evaluar_cambio(pago){
		if (parseInt(pago) < parseInt(vtotal.value)) {
			return false;
		}else{
			return true;
		}
	}

	function swal_cambio(cambio){
		Swal.fire({
			title: 'Cambio',
			input: 'text',
			inputAttributes: {
			    disabled: true
			},
			inputValue:cambio,
			confirmButtonText: 'Aceptar',
		}).then((result)=>{
			if (result.value) {
				document.getElementById('formCobro').submit();
			}
		})
	}

</script>
@endsection
@endsection