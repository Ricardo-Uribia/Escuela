@extends ('layouts.admin')
@section('principal')


<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <h3>Asignar Cuenta Por Cobrar</h3>
      @if (count($errors)>0)
      <div class="alert alert-danger">
        <ul>
        @foreach ($errors->all() as $error)
          <li>{{$error}}</li>
        @endforeach
        </ul>
      </div>
      @endif
    </div>
  </div>


		{!!Form::open(array('url'=>'utp/plan/create', 'method'=>'POST', 'autocomplete'=>'off'))!!}
        {{Form::token()}}
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label>Plan</label>
                            <select name="pidPLan" class="form-control selectpicker" id="pidPLan" data-live-search="true">
                                <option>Selecciona</option>
                                @foreach($plan as $plan)
                                <option value="{{$plan->idPlanesPagoMST}}">{{$plan->codigoPlan . $plan->descripcion}}</option>
                                @endforeach
                            </select>
                    </div>
                </div>

        

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                	<div class="form-group">
                  		<label for="idAlumno">Alumno</label>
                  			<select name="idAlumno" id="id" class="form-control selectpicker" data-live-search="true">
                                <option value="">Selecciona</option>
                                @foreach($alumnos as $alum) 
                                <option value="{{$alum->id}}">{{$alum->Nombres}} {{$alum->Paterno}} {{$alum->Materno}} {{$alum->Matricula}}</option> 
                                @endforeach             
                            </select>
                 	</div>
              	</div>

               <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <div class="form-group">
                      <button type="submit" class="btn btn-primary">Asignar Plan</button>
                      <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-ban"></i> Cancelar</button>
                  </div>
              </div>
		
			
		</div>
	</div>
	{{Form::Close()}}

</div>
@endsection