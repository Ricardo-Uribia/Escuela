@extends ('layouts.admin')
@section ('principal')

<div class="row">
  <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
    <h3>Módulo Cobros</h3>
    <STRONG>Hora:</STRONG>
     <p id="reloj"></p> 
           <script type="text/javascript"> function startTime(){ today=new Date(); h=today.getHours(); m=today.getMinutes(); s=today.getSeconds(); m=checkTime(m); s=checkTime(s); document.getElementById('reloj').innerHTML=h+":"+m+":"+s; t=setTimeout('startTime()',500);} function checkTime(i) {if (i<10) {i="0" + i;}return i;} window.onload=function(){startTime();} </script>
  </div>
</div>

<br>



<span id="mensajeExito" class="btn btn-success"></span>

  <div class="row">
  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
    <div class="row">
      <ul class="nav nav-pills nav-stacked">
        <li><a href="" data-target="#modal-get-student" data-toggle="modal"><button style="width: 100%" class="btn btn-primary"><i class="fa fa-user"></i> Buscar Alumno</button></a></li>
        @include('admin.cobranza.ventaPlanes.modalStudentGet')
        <li> <a href="../lista/venta/planes"><button style="width: 100%" class="btn btn-info"><i class="fa fa-list"></i> Listado de Ventas</button></a></li>
        <li><a href="{{url('/')}}/utp/venta/concepto"><button style="width: 100%" class="btn btn-warning"><i class="fa fa-th"></i> Concepto Esporadico</button></a></li>
      </ul>
    </div>
  </div>


  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
  <label class="control-label" for="date">Fecha</label>
      <div class="input-group date" id="dp3">
      <input disabled name="date" class="form-control" type="text" value="<?php echo date("m/d/Y"); ?>">
    </div>
  </div>

 <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                 <div class="form-group">
                  <label for="idCaja">Caja</label>
                  <select name="idCaja" id="idCaja" class="form-control selectpicker" data-live-search="true">
                        <option value="">Selecciona</option>
                        @foreach($cajas as $caja) 
                          <option value="{{$caja->id}}">{{$caja->descripcion}}</option> 
                        @endforeach             
                  </select>

                </div>
              </div>

  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
  <label class="control-label" for="date">Folio</label>
      <input name="folio" readonly="readonly" class="form-control" type="text" value="0">
  </div>

<br><br><br><br><br>

    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">     
      <div class="row"> 
            <div class="panel panel-primary">
                  <div class="panel-body">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                              <table class="table table-striped table-bordered table-condensed table-hover" id="detalles">
                                    <thead style="background-color:#A9D0F5">
                                        <th>Opciones</th>
                                        <th>Alumno</th>
                                        <th>Ciclo</th>
                                        <th>Plan</th>
                                        <th>Concepto</th>
                                        <th>Cantidad Programada</th>
                                       
                                    </thead>

                                  @if($query!="")
                                    @if($alumno[0]->pagado=='S')
                                       <script>
                                        alert("Este alumno no tiene pagos pendientes");
                                     </script>
                                     <tfoot>
                                        <th>TOTAL</th>
                                        <th></th>
                                        <th></th>  
                                        <th></th>
                                        <th></th>
                                        <th><h4 id="total">$/. 0.0</h4><input type="hidden" name="total_venta" id="total_venta"></th>
                                    </tfoot>
                                    <tbody>
                                    </tbody>
                                    @else
                                     @foreach($alumno as $alum)
                                      @if($alum->pagado=='N')
                                      
                                      <tbody>
                                        <tr id="fila">
                                          <td id="idAlumnosCxC"><button type="button" class="btn btn-warning" onclick="eliminar({{$alum->idAlumnosCxC}})">X</button></td>
                                          <td id="nombre">{{$alum->nombre}}</td>
                                          <td id="ciclo">{{$alum->descripcion}}</td>
                                          <td id="idPlan">{{$alum->codigoPlan}}</td>
                                          <td id="idConcepto">{{$alum->conceptopago}}</td> <!--Colocar llaves-->
                                          <td id="cantidadProgramada">{{$alum->cantidadProgramada}}</td>
                                        </tr>
                                      </tbody>
                                      @endif
                                      
                                     @endforeach
                                  
                                     <tfoot>
                                        <th>TOTAL</th>
                                        <th></th>
                                        <th></th>  
                                        <th></th>
                                        <th></th>
                                        @if(count($alumno) >= 1)
                                        <th><h4 id="totalC">$/. {{$alumno[0]->cantidadProgramada * count($alumno)}}</h4><input type="hidden" name="total_venta" id="total_venta"></th>
                                        @endif
                                          
                                      </tfoot>
                                    @endif
                                  @else
                                   
                                    <tfoot>
                                        <th>TOTAL</th>
                                        <th></th>
                                        <th></th>  
                                        <th></th>
                                        <th></th>
                                        <th><h4 id="total">$/. 0.0</h4><input type="hidden" name="total_venta" id="total_venta"></th>
                                    </tfoot>
                                    <tbody>
                                    </tbody>
                                  @endif
                              </table>
                        </div>
                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="guardar">
                            <div class="form-group">
                                <a href="" data-target="#modal-guardar-pago-{{$alumno[0]->idAlumnosCxC}}" data-toggle="modal"><button class="btn btn-primary"  type="submit"><i class="fa fa-save"></i> Cobrar</button></a>
                                @include('admin.cobranza.ventaPlanes.modalSeguridad')
                                <button type="button" class="btn btn-danger" onclick="eliminar();"><i class="fa fa-ban"></i> Cancelar</button>
                            </div> 
                          </div>
                  </div>
            </div>  
              
      </div>   
    </div>
  </div>

@push('scripts')
<script >

  $("#guardar").hide();
   evaluar();

function eliminar(index) {

     $("#fila").remove();
     $("#totalC").remove();
     evaluar();
}

function evaluar(){

      idAlumnosCxC=$("#idAlumnosCxC").val();
      alumno=$("#nombre").val();
      ciclo=$("#ciclo").val();
      plan=$("#plan").val();
      consepto=$("#clave").val();
      cantidadProgramada=$("#cantidadProgramada").val();


      if (idAlumnosCxC!="" &&  alumno!="" && ciclo!="" && plan!="" && consepto!="" && cantidadProgramada!="") {
        $("#guardar").hide();
      }
      else {
             
          $("#guardar").show();

      }
}

</script>
@endpush
@endsection
