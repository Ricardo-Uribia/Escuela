@extends ('layouts.admin')
@section ('principal')
  
           <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                  <label for="proveedor">Alumno</label>
                   <p>{{$venta->nombre}}</p>
                 </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                  <label for="proveedor">Status</label>
                   <p>{{$venta->Status}}</p>
                 </div>
              </div>
              
              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="form-group">
                  <label for="tipo_comprobante">Precio Total</label>
                 <p>{{$venta->cantidadProgramada}}</p>
                 </div>
              </div>
              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="form-group">
                  <label for="tipo_comprobante">Status del Pago</label>
                    <p>@if ($venta->pagado == 'N')
                       Pendiente
                      @else 
                      Pagado
                      @endif
                    </p>
                </div>
              </div>
              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                 <div class="form-group">
                  <label for="num_documento">Fecha de Pago</label>
                   <p>{{$venta->fecha}}</p>
                </div>
              </div>


              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="form-group">
                  <label for="tipo_comprobante">Caja</label>
                    <p>
                    {{$venta->idCaja}}
                    </p>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                 <div class="form-group">
                  <label for="num_documento">Folio</label>
                   <p>{{$venta->reciboCaja}}</p>
                </div>
              </div>
              
      </div>
      <div class="row"> 
            <div class="panel panel-primary">
                  <div class="panel-body">                        

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                          <table class="table table-striped table-bordered table-condensed table-hover" id="detalles">
                            <thead>
                             
                              <th>Ciclo</th>
                              <th>Precio</th>
                              <th>Cantidad</th>
                              <th>Código Concepto</th>
                              <th>Total a Pagar</th>
                              <th>Impuesto</th>
                            </thead>

                            <tfoot>
                              <th></th>
                              <th></th>  
                              <th></th>
                              <th></th>
                              <th></th>
                              <th><h4 id="total">$ {{$venta->cantidadProgramada}} <p>Total con impuesto</p></h4>
                              </th>
                            </tfoot>
                         @foreach($detalles as $det)
                            <tr>
                              <td>{{$det->ciclo}}</td>
                              <td>{{$det->precio}}</td>
                              <td>{{$det->cantidad}}</td>
                              <td>{{ $det->codigoConcepto}}</td>
                              <td>{{$det->cantidad * $det->precio}}</td>
                              <td>{{$det->cantidad * $det->precio  * $det->impuesto / 100}} %</td>
                            </tr>
                          @endforeach
                          </table>
                        </div>
                  </div>
            </div>  
              
      </div>   
@endsection