@extends('layouts.admin')
@section('contenido')
<div class="card border-neutral">
	<div class="card-header ui-sortable-handle">
		<h3 class="card-tittle inline-block">Programar plan: <small class="badge badge-info">{{$planpago->codigo}}</small></h3>
		@if (Session::has('mensaje'))
	      <span role="alert">
		    <strong style="color: red;">{{Session::get('mensaje')}}</strong>
		  </span>
      	@endif
	</div>
	<form action="{{url('/admin/update/planpago')}}" method="POST" id="formPlanCREATE" >
	@csrf
	
	<input type="hidden" name="planpago" value="{{$planpago->id}}">

	<div class="card-body">
		<div class="row">		
			<div class="col-md-12">
				<div class="row">	
					<div class="col-md-6 col-sm-6 col-xs-12 was-valited">
						<div class="box box-primary">
							<div class="form-group {{$errors->has('codigo') ? 'is-invalid' : ''}}">
								<label for="codigo">Código</label>
								<input required placeholder="Código concepto..." id="codigo" type="text" class="form-control"  pattern=".{5,20}"  name="codigo" disabled value="{{$planpago->codigo}}" />
								@error('codigo')
				                    <span class="invalid-feedback" role="alert">
				                      <strong style="color: red;">{{ $message }}</strong>
				                    </span>
				                @enderror 
							</div>
						</div>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-12 was-valited">
						<div class="box box-primary">
							<div class="form-group {{$errors->has('ciclo') ? 'has-error' : ''}}">
								<label for="ciclo">Ciclo</label>
								<input required placeholder="Ciclo..." id="ciclo" type="text" class="form-control" name="ciclo" disabled value="{{$planpago->planespago->ciclos->descripcion}}"/>
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
								<input required minlength="1" maxlength="4" pattern="[0-*]+"  type="text" name="aniocorresponde" class="form-control" value="{{old('aniocorresponde')}}">
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
								<input required type="number"  minlength="1" maxlength="2" max="12"  step="0" name="mes" class="form-control" value="{{old('mes')}}">
								@error('mes')
			                    <span class="invalid-feedback" role="alert">
			                      <strong style="color: red;">{{ $message }}</strong>
			                    </span>
			               	 	@enderror
							</div>
						</div>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-12 was-valited">
						<div class="box box-primary">
							<div class="form-group {{$errors->has('descripcion') ? 'has-error' : ''}}">
								<label for="descripcion">Descripción</label>
								<textarea disabled id="descripcion" type="text" class="form-control" name="descripcion">{{$planpago->descripcion}}</textarea>
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
								<input required id="precio" value="{{old('precio')}}"  type="number" placeholder="Precio..." pattern=".{5,10}" step="0.01" class="form-control" name="precio">
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
											<option value="{{$concepto->id}}">{{$concepto->producto->codigo}}</option>
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
								<input required id="fechaInicio" value="{{old('fechaInicio')}}" type="date" class="form-control" name="fechaInicio">
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
								<input required id="fechaFin" value="{{old('fechaFin')}}" type="date" class="form-control" name="fechaFin">
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
		<button type="submit" id="btnGuardarPLAN" class="btn-neutral  btn-success">GUARDAR</button>
	</div>
	</form>
</div>
@endsection