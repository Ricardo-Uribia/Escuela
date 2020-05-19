@extends('layouts.admin')
@section('contenido') 
<div class="row">	    
	<div class="col-md-12">          
	    @if(Session::has('error'))
	        <div class="alert alert-danger alert-dismissible" role="alert">
	            <p class="text-center">{{Session::get('error')}}</p>	            
	        </div>       
	        <br>
	    @endif
	</div>
	<div class="col-md-2"></div>
	<div class="col-md-8">	
		<div class="card border-neutral">
	<div class="card-header ui-sortable-handle">
      <h3 class="card-tittle inline-block">Nuevo concepto de pago</h3>
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
    <form action="{{route('createConcepto')}}" method="POST" id="formCreateConcept">
	@csrf
    <div class="card-body">
    	<div class="row">	
			<div class="col-md-6 col-sm-6 col-xs-12 was-validated">
				<div class="box box-primary">
					<div class="form-group {{$errors->has('codigo') ? 'has-error' : ''}}">
						<label for="codigo">Código</label>
						<input required placeholder="Código concepto..." id="codigo" type="text" class="form-control"  pattern=".{5,15}" name="codigo" value="{{old('codigo')}}" />
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
						<textarea required value="{{old('descripcion')}}"  id="descripcion" type="text" class="form-control" name="descripcion"></textarea>
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
						<input required id="precio" value="{{old('precio')}}" step="0.01"  type="number" placeholder="Precio..." pattern=".{5,10}" class="form-control" name="precio">
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
						<input step="0.01" required id="impuesto" value="{{old('impuesto')}}" type="number" class="form-control" name="impuesto">
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
						<select required id="cuenta_id" class="form-control" name="cuenta_id">
							<option value="">--Selecciona--</option>
							@foreach($cuentas as $cuenta)
								<option value="{{$cuenta->id}}">{{$cuenta->codigo}}</option>
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
		<div class="form-group">
    		<button type="submit" id="btnGuardarConcept" class="btn-neutral btn-success pull-right"> GUARDAR</button>
		</div>
    </div>
	</form>
</div>
	</div>	
</div>




@section('scripts')
<script>
$(document).ready(function() {
    //Siempre que salgamos de un campo de texto, se chequeará esta función
    $("#formCreateConcept input").keyup(function() {
        var form = $(this).parents("#formCreateConcept");
        var check = checkCampos(form);
        if(check) {
            $("#btnGuardarConcept").prop("disabled", false);
        }
        else {
            $("#btnGuardarConcept").prop("disabled", true);
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