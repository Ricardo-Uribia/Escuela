@extends ('layouts.admin')
@section ('principal')
  
          
      <div class="row"> 
            <div class="panel panel-primary">
                  <div class="panel-body">                        

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                          <table class="table table-striped table-bordered table-condensed table-hover" id="detalles">
                            <thead style="background-color:#A9D0F5">
                              <th>Fechas de Pago</th>
                              <th>Ciclo</th>
                              <th>Código Plan</th>
                              <th>Descripción del plan</th>
                              <th>Precio</th>
                              <th>Concepto</th>
                              <th>Año correspondiente</th>
                            </thead>
                            <tfoot>
                              @foreach($plan as $det)
                            <tr>
                              <td>{{$det->fechaInicio ."" ." a "."". $det->fechaFin}}</td>
                              <td>{{$det->descripcion}}</td>
                              <td>{{ $det->codigoPlan}}</td>
                              <td>{{$det->descripPlan}}</td>
                              <td>{{$det->precio}}</td>
                              <td>{{$det->concepto}}</td>
                              <td>{{$det->anioCorresponde}}</td>
                            </tr>
                          @endforeach
                          </table>
                        </div>
                  </div>
            </div>  
              
      </div>   
@endsection