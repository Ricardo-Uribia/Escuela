@extends('layouts.admin')
@section('contenido')
<div class="card border-neutral">
	<div class="card-header ui-sortable-handle">
      <h3 class="card-tittle inline-block">Concepto: <small class="badge badge-info">{{$conceptos->producto->codigo}}</small></h3>
      @if (Session::has('validaciones_ID'))
      <div class="alert alert-danger">
        <ul>
          <li>{{Session::get('validaciones_ID')}}</li>
        </ul>
      </div>
      @endif
      	<a href="{{url('/admin/conceptos/cobro')}}">
      		<button class="btn-neutral sys-background-color float-right" style="margin-right: 10px">
	        REGRESAR
	    	</button>
	    </a>   
    </div>
    <form action="{{route('updateConcepto')}}" method="POST" id="formConcepto" >
	@csrf
    <div class="card-body">
    		<input required type="hidden" name="concepto_id" value="{{$conceptos->id}}">
	<div class="row">	
		<div class="col-md-6 col-sm-6 col-xs-12 was-validated">
			<div class="box box-primary">
				<div class="form-group {{$errors->has('codigo') ? 'has-error' : ''}}">
					<label for="codigo">Código</label>
					<input required placeholder="Código concepto..." id="codigo" type="text" class="form-control" pattern=".{5,10}" name="codigo" value="{{$conceptos->producto->codigo}}" />
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
				<div class="form-group {{$errors->has('descripcion') ? 'has-error' : ''}}">
					<label for="descripcion">Descripción</label>
					<textarea required id="descripcion" type="text" class="form-control" name="descripcion">{{$conceptos->producto->descripcion}}</textarea>
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
					<input required id="precio" step="0.01" value="{{$conceptos->producto->precio}}"  type="text" placeholder="Precio..." class="form-control" name="precio">
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
				<div class="form-group {{$errors->has('impuesto') ? 'has-error' : ''}}">
					<label for="impuesto">Impuesto</label>
					<input required id="impuesto" step="0.01" value="{{$conceptos->impuesto}}" type="text" class="form-control" name="impuesto">
					@error('impuesto')
                    <span class="invalid-feedback" role="alert">
                      <strong style="color: red;">{{ $message }}</strong>
                    </span>
                	@enderror
				</div>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-xs-12 was-validated">
			<div class="box box-primary">
				<div class="form-group {{$errors->has('cuenta_id') ? 'has-error' : ''}}">
					<label for="cuenta_id">Cuenta</label>
					<select id="cuenta_id" class="form-control" name="cuenta_id">
						<option value="">--Selecciona--</option>
						@foreach($cuentas as $cuenta)
							@if($cuenta->id == $conceptos->cuenta_id)
								<option value="{{$cuenta->id}}" selected>{{$cuenta->codigo}}</option>
							@else
								<option value="{{$cuenta->id}}">{{"Cuenta: " .$cuenta->codigo}}</option>
							@endif
						@endforeach
					</select>
					@error('cuenta_id')
                    <span class="invalid-feedback" role="alert">
                      <strong style="color: red;">{{ $message }}</strong>
                    </span>
                  	@enderror 
				</div>
			</div>
		</div>
	</div>
    </div>
    <div class="card-footer">
    	<button type="submit" id="btnGuardar" class="btn-neutral btn-success"> GUARDAR</button>
    </div>
    </form>
</div>
@section('scripts')
<script>
	$(document).ready(function() {
    //Siempre que salgamos de un campo de texto, se chequeará esta función
    $("#formConcepto input").keyup(function() {
        var form = $(this).parents("#formConcepto");
        var check = checkCampos(form);
        if(check) {
            $("#btnGuardar").prop("hidden", false);
        }
        else {
            $("#btnGuardar").prop("hidden", true);
        }
    });
});

//Función para comprobar los campos de texto
function checkCampos(obj) {
    var camposRellenados = true;
    obj.find("input").each(function() {
    var $this = $(this);
        if( $this.val().length <= 0 ) {
            camposRellenados = false;
            return false;
        }
    });
    if(camposRellenados == false) {
        return false;
    }
    else {
        return true;
    }
}
</script>
@endsection
@endsection