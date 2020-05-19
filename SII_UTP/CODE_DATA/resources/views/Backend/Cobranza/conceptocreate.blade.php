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
	    <h4 class="inline-block">Cobranza de Conceptos Esporadicos</h4>
		 <a href="{{url('/admin/cobranza')}}" class="btn-neutral btn-secondary float-right">REGRESAR</a>
	</div>
	<div class="card-body">
		@if(!Session::has('ciclos'))
		    <small>
		        <strong style="color: red;">Hemos detectado que no ha seleccionado un ciclo para trabajar, eliga un ciclo de trabajo de lo contrario no podrá continuar</strong>
		    </small>
		@endif
		@if(Session::has('ciclos'))
		<div class="row">
			<div class="col-3">
				<div class=" row">
					<label for="buscador">Alumno</label>
					<form class="form-inline ml-3" id="formBuscar" method="POST" action="{{route('buscarAlumno')}}">
						@csrf
				      <div class="input-group">
				      	<input type="hidden" name="type" value="cconcep">
				        <input class="form-control" type="search" placeholder="Search" aria-label="Search" id="txtbuscador" name="search">
				        <div class="input-group-append">
				         <button class="btn btn-default" type="button" id="btnBuscarAlumno">
				           <i class="fa fa-search"></i>
				         </button>
				        </div>
				      </div>
				      <p id="mensaje"></p>
				    </form>
				</div>
			</div>
			<!-- <form method="POST" action="" id="formCobro"> -->
				<input type="hidden" name="alumnocxc_id" id="alumnocxc_id" value>
				<input type="hidden" name="cantidadPagada" id="cantidadPagada" value>
				@csrf
				<div class="col-9">
					<div class="row">
						<div class="col-4 was-validated">
							<label for="fecha">Ciclo</label>
							<input required type="text" name="ciclo" class="form-control" readonly value="{{Session::get('ciclos')->descripcion}}" readonly>
						</div>
						<div class="col-4 was-validated">
							<label for="caja_id">Caja</label>
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
							<input required type="text" readonly class="form-control"  value="F-{{$folio[0]['folio']}}">
						</div>
					</div>
				</div>
		</div>
		<div class="row">
			<div class="col-12">
				<br>
				<div class="card card-outline card-primary">
					<div class="card-body table-responsive">
						<div class="row">
							<div class="col-4">
								<label for="concepto">Concepto</label>
								<select class="form-control" name="concepto_id" id="concepto_id" disabled>
									<option value="">--Selecciona--</option>
									@foreach($conceptos as $concep)
									<option value="{{$concep->id}}_{{$concep->precio}}_{{$concep->conceptopago->impuesto}}_{{$concep->descripcion}}">{{$concep->codigo}}</option>
									@endforeach
								</select>
							</div>
							<div class="col-4">
								<label for="precio">Precio</label>
								<input type="text" id="precio" name="precio" disabled class="form-control">
							</div>
							<!-- <div class="col-3">
								<label for="impuesto">Impuesto</label>
								<input type="impuesto" id="impuesto" name="impuesto" disabled class="form-control">
							</div>
							<div class="col-3">
								<label for="cantidad">Cantidad</label>
								<input disabled id="cantidad" type="number" name="cantidad" class="form-control">
							</div> -->
							<div class="col-4">
								<button style="margin-top: 31px" disabled id="btnAdd" class="btn-neutral btn-info">Agregar</button>
							</div>
							<input type="hidden" id="nombre_alumno">
						</div>
						<br>
						<div class="alert alert-success" id="background-color" hidden>
							<p id="mensajeflash"></p>
						</div>
						
						<table id="tplanprodcut" class="table table-striped table-bordered table-condensed table-hover"  >
							<thead style="background-color:#A9D0F5">
								<tr>
									<th>Item</th>
									<th>Alumno</th>	
									<th>Código</th>
									<th>Descripcion</th>		
									<th>Precio</th>
									<th>Cantidad</th>
									<th>Total</th>		
									<th>Eliminar</th>
								</tr>
							</thead>
							<tbody id="contenido">
							@if(Session::has('CARRITO_CN'))
								@forelse ($products as $key => $producto)
									<tr>
										<td>{{$key}}</td>
										<td>{{$producto['student']}}</td>
										<td>{{$producto['products']['codigo']}}</td>
										<td>{{$producto['products']['descripcion']}}</td>
										<td>${{number_format($producto['products']['precio'])}}</td>
										<td>{{$producto['quantity']}}</td>
										<td>${{number_format($producto['price'])}}</td>
										<td><a href="{{url('/remover-item')}}/{{$producto['products']['id']}}"><button class="btn-neutral btn-danger" type="button" >X</button></td></a>
									</tr>
								@empty
									<tr>
			                           <td colspan="7">Sin conceptos</td>
			                        </tr>
								@endforelse
							@else
								<tr>
		                           <td colspan="7">Sin conceptos</td>
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
								<td id="vsubtotal">16 %</td>
							</tr>
							<tr>
								<th style="width: 50%">Total:</th>
								<td>${{ !empty($totalPrecio) ? number_format($totalPrecio * 1.16) : '0' }}</td>
								<input type="hidden" name="vtotal" id="vtotal" value="{{ !empty($totalPrecio) ? ($totalPrecio * 1.16) : '0' }}">
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
					<form method="POST" action="{{route('cobrar-plan')}}" id="formCobroPlan">
						@csrf
						<input type="hidden" name="type" value="_CN">
						<input type="hidden" name="iva" value="1.16">
						<input type="hidden" readonly class="form-control" name="folio" id="folio" value="{{$folio[0]['folio']}}">
						<button class="btn-neutral border-neutral btn-lg btn-block" type="button" id="btnCobrar" onclick="swal_confirm_pago();" >Cobrar</button>
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
      	<input type="hidden" id="alumno_id" name="alumno_id">
       	<table class="table table-hover">
       		<thead>
       			<th>Matricula</th>
       			<th>Nombres</th>
       			<th>Opciones</th>
       		</thead>
       		<tbody id="tableResult">
       		</tbody>
       	</table>
      </div>
      <div class="modal-footer">
        <button type="button" id="btnCancelar" class="btn-neutral btn-danger" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

@section('scripts')
<script defer>
	const btnBuscarAlumno 	= document.getElementById('btnBuscarAlumno');
	const txtBuscar 		= document.getElementById('txtbuscador');
	const mensaje 			= document.getElementById('mensaje');
    const result 			= document.getElementById('resultados');
    const colums 			= document.getElementById('tableResult');
    const concepto_id 		= document.getElementById('concepto_id');
	const btnCancelar 		= document.getElementById('btnCancelar');
    const contenido 		= document.getElementById('contenido');
    const btnCobrar 		= document.getElementById('btnCobrar');
    const alumno 			= document.getElementById("nombre_alumno");
    const vsubtotal			= document.getElementById("vsubtotal");
    const vtotal 			= document.getElementById("vtotal");
	var subt 	= 0;
	var tot 	= 0;
    var carrito_producto_compra = [];

    /***
    **	Funciones para agregar fila a la tabla de cobros, y cambios de valores en diferentes elementos de la tabla.
    */

    btnCancelar.addEventListener('click', function(){
		peticions(null, `{{url('/prueba/delete')}}`, 'mensaje_global');
		setTimeout(window.location=window.location.href, 1000);
	});


 	concepto_id.addEventListener('change', function(){
 	var datosArticulo = concepto_id.value.split("_");
 		if (concepto_id.value != "") {
 			$('#precio').val(datosArticulo[1]);
        	$('#impuesto').val(datosArticulo[2]);	
        	disabledRemove();
 		}else{
 			disabled();
 			cleanAll();
 		}
 	});



 	const btnAdd = document.getElementById('btnAdd');
 	btnAdd.addEventListener('click', function(evt){
 		 add_product_cart(alumno.value, concepto_id.value.split("_"), precio.value);
 	});

 	function add_product_cart(alumno_id, producto_id, cantidad, precioproduct){
 		let product_array = [
 		 {
 		 	"alumno_id": alumno_id,
 		 	"producto_id": producto_id[0],
 		 	"price_product": precioproduct,
 		 	"ciclo": null,
 		 	"btnAction": 'agregar'
 		 }
 		];

 		peticion(product_array, `{{url('prueba')}}`, 'mensajeflash');
 	}

 	function peticion(PARAMS, URL, MENSAJE){
		let request   = new XMLHttpRequest();
		const _token  = document.getElementsByName('_token');
		let params 	  = '_token='+_token[1].value+'&data='+JSON.stringify(PARAMS);
		request.open('POST', URL, true);
		request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
		request.onload = function(){
			if (this.status >= 200 && this.status < 400) {
			    // Success!
			    var resp = JSON.parse(this.response);
			    const mnsj= document.getElementById(MENSAJE);
			    const divmensa = document.getElementById('background-color');
			    if (resp.state == 404) {
			    	$("#background-color").removeClass("alert-success");
			    	$("#background-color").addClass("alert-danger");
			    	mnsj.innerHTML = resp.message;
			    	divmensa.removeAttribute('hidden','hidden');
			    	$('#background-color').fadeOut(2000);
			    	
			    }else{
			    	mnsj.innerHTML = resp.message;
			    	$("#background-color").removeClass("alert-danger");
			    	$("#background-color").addClass("alert-success");
			    	divmensa.removeAttribute('hidden','hidden');
			    	$(mnsj).fadeOut(2000);
			    	setTimeout(window.location=window.location.href, 2000);
			    }
			  } else {
			    // We reached our target server, but it returned an error
			   $("#background-color").removeClass("alert-danger");
			    mnsj.innerHTML ="ERROR DE SEVIDOR";
			  }
		};
		request.send(params); 		
 	}


 

	/*Funciones para buscar al alumno*/
	/***
		1.- Funcion que detecta el evento onclick para buscar al alumno y llama a la funcion 2
		2.- Funcion que consulta al servidor por el query del alumno ingresado
		3.- Funcion que se realiza para mostrar los valores retornados por el servidor
		4.- Funcion que se encarga de seleccionar al alumno y guardar nombre para uso proximo
	**
	*/
	btnBuscarAlumno.addEventListener('click', function(evt){
		if(txtBuscar.value != ""){
    		consultar_register_Alumno('POST', `{{route('buscarAlumno')}}`, "formBuscar");
		}
	});
	function consultar_register_Alumno(METHOD, URL, IDFORM){
		let args = {method: METHOD, url: URL, HTML_form_id: IDFORM};
		api = pretty.create(args);
		api.beforeSend(function(){
			mensaje.innerHTML = "Buscando...";
		});
		api.send(function(done, request){
			mensaje.innerHTML = "";
			var response = JSON.parse(request);
			if (done == false) {
				message.innerHTML = "Oups.. por favor vuelva a intentar";
				throw request;
			}
				if (response.status == 200) {
					innerHtmlAlumno(response.data);
					txtBuscar.value = "";
				}else{
					alert(response.data);
					txtBuscar.value = "";
				}
			
		});
	}

    function innerHtmlAlumno(data){
    	let modal = $('#alumnocxc').modal().show();
    	var info = "";
    	for(let i = 0; i < data.length; i++) {
    		info += "<tr><td>"+data[i].alumno.matricula+"</td><td>"+data[i].alumno.nombre+"</td><td><button type='button' onclick='setearDatos("+JSON.stringify(data[i])+")'' class='assing btn-neutral btn-secondary'>Asignar</button></td></tr>";
    		colums.innerHTML = info;
    	}
    	result.innerHTML = 'Coincidencias: ' + data.length;
    }

	function setearDatos(datoAlumno){
		alumno.value = datoAlumno.alumno.id;
	 	$("#alumnocxc").modal('hide');
	 	disabledRemove();
	}

	/*Funciones de bloqueo y desbloqueo de campos y botones*/
	function disabledRemove(){
		concepto_id.removeAttribute('disabled');
		btnAdd.removeAttribute('disabled');
		
	}

	function disabled(){
		btnAdd.setAttribute('disabled','disabled');
 		
	}


	function cleanAll()
	{
		impuesto.value  		= "";
		precio.value    		= "";
		cantidad.value  		= "";
		alumno_id.value 		= "";
		concepto_id.value 		= "";
		concepto_id.setAttribute("disabled", "disabled");
		disabled();
	}

	function swal_confirm_pago(){
	 	let total_HTML			= vtotal.value;
	 	console.log(total_HTML);
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
				//peticions(null, `{{url('/prueba/delete')}}`, 'mensaje_global');
				document.getElementById('formCobroPlan').submit();
			}
		})
	}

</script>
@endsection
@endif
@endsection

