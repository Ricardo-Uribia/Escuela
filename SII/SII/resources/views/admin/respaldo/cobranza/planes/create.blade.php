@extends ('layouts.admin')
@section ('principal')
      <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <h3>Configurar Plan</h3>
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
            <form action="{{url('/')}}/utp/configurar/plan/{{}}" method="POST">
                  {{Form::token()}}

            <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                         <div class="form-group">
                              <label for="anioCorresponde">Año Correspondiente</label>
                              <input type="text" name="anioCorresponde" class="form-control" value="{{old('anioCorresponde')}}" placeholder="YY...">
                        </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                         <div class="form-group">
                              <label for="mes">Mes Correspondiente</label>
                              <input type="text" name="mes" class="form-control" value="{{old('mes')}}" placeholder="MM...">
                        </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                              <label for="cantidad">Precio</label>
                              <input type="number" required name="cantidad" class="form-control" value="{{old('cantidad')}}" placeholder="Precio del Plan...">
                        </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                              <label for="fechaInicio">Fecha Inicio</label>
                              <input type="date" required name="fechaInicio" class="form-control" value="{{old('fechaInicio')}}">
                        </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                              <label for="fechaFin">Fecha Fin</label>
                              <input type="date" required name="fechaFin" class="form-control" value="{{old('fechaFin')}}" >
                        </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="form-group">
                              <label for="nivel">Concepto</label>
                              <select name="concepto"  class="form-control selectpicker" data-live-search="true">
                                    <option value="" >Selecciona</option>
                                    @foreach($concepto as $cic)
                                    <option value="{{$cic->idConceptosPagos}}">{{$cic->descripcion}}</option>
                                    @endforeach
                              </select>
                        </div>
                  </div>
            </div>  
            <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-ban"></i> Cerrar</button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Confirmar</button>
                  </div> 

            </form>      
@endsection

