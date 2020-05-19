@extends ('layouts.admin')
@section ('principal')
      <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <h3>Editar detalles</h3>
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
            <form action="{{url('/')}}/utp/planes-update-{{$planes->idPlanesPagoMST}}" method="POST">
                  {{Form::token()}}

            <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                              <label for="nombre">Código Plan</label>
                              <input type="text" name="codigoPlan" value="{{$planes->codigoPlan}}" class="form-control" >
                         </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                              <label for="Cuenta">Ciclo</label>
                              <!--sin implementacion-->
                              <input type="text" value="{{$ciclo[0]->ciclo}}" class="form-control" >
                              <input type="hidden" name="idCiclo" value="{{$ciclo[0]->idCiclo}}">
                        </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                         <div class="form-group">
                              <label for="codigo">Descripción</label>
                              <input type="text" name="descripcion" class="form-control" value="{{$planes->descripcion}}" placeholder="Descripcíón del concepto...">
                        </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                         <div class="form-group">
                              <label for="anioCorresponde">Año Correspondiente</label>
                              <input type="text" name="anioCorresponde" class="form-control" value="{{$planes->anioCorresponde}}"   placeholder="YY..." >
                        </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                         <div class="form-group">
                              <label for="mes">Mes Correspondiente</label>
                              <input type="text"   name="mes" class="form-control" value="{{$planes->mes}}" placeholder="MM..." >
                        </div>
                  </div>
                 
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                              <label for="cantidad">Precio</label>
                              <input type="number" name="cantidad" class="form-control" value="{{$planes->precio}}" placeholder="Precio del Plan...">
                        </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                              <label for="fechaInicio">Fecha Inicio</label>
                              <input type="date" name="fechaInicio" class="form-control" value="{{$planes->fechaInicio}}">
                        </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                              <label for="fechaFin">Fecha Fin</label>
                              <input type="date" name="fechaFin" class="form-control" value="{{$planes->fechaFin}}" >
                        </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="form-group">
                              <label for="nivel">Concepto</label>
                              <select name="idConceptosPagos"  class="form-control selectpicker" data-live-search="true">
                                    <option value="" >Selecciona</option>
                                    @foreach($concepto as $cic)
                                    <option value="{{$cic->idConceptosPagos}}">{{$cic->descripcion}}</option>
                                    @endforeach
                              </select>
                        </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                              <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Guardar</button>
                              <button class="btn btn-danger" type="reset"><i class="fa fa-ban"></i> Cancelar</button>
                        </div>
                  </div>
            </div>   

                  </form>
@endsection