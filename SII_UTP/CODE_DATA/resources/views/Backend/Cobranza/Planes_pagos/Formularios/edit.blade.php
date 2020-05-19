@extends('layouts.admin')
@section('contenido')
<div class="card border-neutral">
	<div class="card-header ui-sortable-handle">
		<h3 class="card-tittle inline-block">Editar plan: <small class="badge badge-info">{{$planpago->producto->codigo}}</small></h3>
		@if (Session::has('mensaje'))
	      <span role="alert">
		    <strong style="color: red;">{{Session::get('mensaje')}}</strong>
		  </span>
      	@endif
      	<a href="{{url('admin/planes/pago')}}">
      		<button class="btn-neutral sys-background-color float-right" style="margin-right: 10px">
	        REGRESAR
	    	</button>
	    </a>   
	</div>
	<form action="{{url('/admin/edit/planpago')}}" method="POST" >
	@csrf
	
	<input type="hidden" name="planpago" value="{{$planpago->producto->id}}">

	<div class="card-body">
		<div class="row">		
			<div class="col-md-12">
				<div class="row">	
					<div class="col-md-6 col-sm-6 col-xs-12 was-validated">
						<div class="box box-primary">
							<div class="form-group {{$errors->has('codigo') ? 'is-invalid' : ''}}">
								<label for="codigo">Código</label>
								<input required placeholder="Código concepto..." id="codigo" type="text" class="form-control" pattern=".{5,20}" name="codigo" value="{{$planpago->producto->codigo}}" />
								@error('codigo')
				                    <span class="invalid-feedback" role="alert">
				                      <strong style="color: red;">{{ $message }}</strong>
				                    </span>
				                @enderror 
							</div>
						</div>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-12 was-validated">
						<div class="box box-primary">
							<div class="form-group {{$errors->has('ciclo') ? 'has-error' : ''}}">
								<label for="ciclo">Ciclo</label>
								<input id="ciclo" type="text" readonly class="form-control" value="{{$planpago->ciclos->descripcion}}">

								@error('ciclo')
				                    <span class="invalid-feedback" role="alert">
				                      <strong style="color: red;">{{ $message }}</strong>
				                    </span>
				                @enderror 
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12 was-validated">
						<div class="box box-primary">
							<div class="form-group {{$errors->has('aniocorresponde') ? 'has-error' : ''}}">
								<label for="aniocorresponde">Año correspondiente</label>
								<input required type="text" minlength="1" maxlength="4" pattern="[0-*]+" name="aniocorresponde" class="form-control" value="{{$planpago->aniocorrespondiente}}">
								@error('aniocorresponde')
			                    <span class="invalid-feedback" role="alert">
			                      <strong style="color: red;">{{ $message }}</strong>
			                    </span>
			               	 	@enderror
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12 was-validated">
						<div class="box box-primary">
							<div class="form-group {{$errors->has('mes') ? 'has-error' : ''}}">
								<label for="mes">Mes Correspondiente</label>
								<input required=""  minlength="1" maxlength="2" max="12"  step="0" type="number" name="mes" class="form-control" value="{{$planpago->mes}}">
								@error('mes')
			                    <span class="invalid-feedback" role="alert">
			                      <strong style="color: red;">{{ $message }}</strong>
			                    </span>
			               	 	@enderror
							</div>
						</div>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-12 was-validated">
						<div class="box box-primary">
							<div class="form-group {{$errors->has('descripcion') ? 'has-error' : ''}}">
								<label for="descripcion">Descripción</label>
								<textarea required id="descripcion" type="text" class="form-control" name="descripcion">{{$planpago->producto->descripcion}}</textarea>
								@error('descripcion')
			                    <span class="invalid-feedback" role="alert">
			                      <strong style="color: red;">{{ $message }}</strong>
			                    </span>
			               	 	@enderror
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12 was-validated">
						<div class="box box-primary">
							<div class="form-group {{$errors->has('precio') ? 'has-error' : ''}}">
								<label for="precio">Precio</label>
								<input required id="precio" value="{{$planpago->producto->precio}}"  type="text" placeholder="Precio..." pattern=".{2,10}" step="0.01" class="form-control" name="precio">
								@error('precio')
			                    <span class="invalid-feedback" role="alert">
			                      <strong style="color: red;">{{ $message }}</strong>
			                    </span>
			                	@enderror
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12 was-validated">
						<div class="box box-primary">
							<div class="form-group {{$errors->has('concepto_id') ? 'has-error' : ''}}">
								<label for="concepto_id">Concepto</label>
								<select required id="concepto_id" class="form-control" name="concepto_id">
										<option value="">Selecciona</option>	
									@foreach($conceptos as $concepto)
										@if($concepto->id == $planpago->conceptopago_id)
											<option selected value="{{$concepto->id}}">{{$concepto->codigo}}</option>
										@else
											<option value="{{$concepto->id}}">{{$concepto->codigo}}</option>
										@endif
									@endforeach
								</select>
								@error('concepto_id')
			                    <span class="invalid-feedback" role="alert">
			                      <strong style="color: red;">{{ $message }}</strong>
			                    </span>
			                  	@enderror 
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12 was-validated">
						<div class="box box-primary">
							<div class="form-group {{$errors->has('fechaInicio') ? 'has-error' : ''}}">
								<label for="fechaInicio">Fecha inicio</label>
								<input required id="fechaInicio" value="{{$planpago->fechaInicio}}" type="date" class="form-control" name="fechaInicio">
								@error('fechaInicio')
			                    <span class="invalid-feedback" role="alert">
			                      <strong style="color: red;">{{ $message }}</strong>
			                    </span>
			                	@enderror
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-3 col-xs-12 was-validated">
						<div class="box box-primary">
							<div class="form-group {{$errors->has('fechaFin') ? 'has-error' : ''}}">
								<label for="fechaFin">Fecha fin</label>
								<input required id="fechaFin" value="{{$planpago->fechaFin}}" type="date" class="form-control" name="fechaFin">
								@error('fechaFin')
			                    <span class="invalid-feedback" role="alert">
			                      <strong style="color: red;">{{ $message }}</strong>
			                    </span>
			                	@enderror
							</div>
						</div>
					</div>
		
				</div>
			</div>
		</div>
	</div>
	<div class="card-footer">
		<button type="submit" id="btnSubmit" hidden class="btn-neutral  btn-success">GUARDAR</button>
	</div>
	</form>
</div>
<script>
	const concepto_id = document.getElementById('concepto_id');
	const button = document.getElementById('btnSubmit');
	if(concepto_id.value!=0){
		button.removeAttribute('hidden');
	}
	concepto_id.addEventListener('change', function(evt){
		if (concepto_id.value!=0) {
			button.removeAttribute('hidden');
		}else{
			button.setAttribute('hidden', 'hidden');
		}	
	});
</script>
@endsection