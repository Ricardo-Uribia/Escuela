@extends ('layouts.admin')
@section ('principal')
  <div class="row">
  <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
    <h3>Módulo de Cobros: Conceptos Esporadicos</h3>
    <STRONG>Hora:</STRONG>
     <p id="reloj"></p> 
           <script type="text/javascript"> function startTime(){ today=new Date(); h=today.getHours(); m=today.getMinutes(); s=today.getSeconds(); m=checkTime(m); s=checkTime(s); document.getElementById('reloj').innerHTML=h+":"+m+":"+s; t=setTimeout('startTime()',500);} function checkTime(i) {if (i<10) {i="0" + i;}return i;} window.onload=function(){startTime();} </script>
  </div>
</div>


  <div class="row">
  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
    <div class="row">
      <ul class="nav nav-pills nav-stacked">
        <li><a href="{{url('/')}}/utp/venta/concepto/"><button class="btn btn-danger" style="width: 100%"><i class="fa fa-chevron-left"></i> Regresar</button></a></li>
        <li><center><button style="width: 83%" class="btn btn-success" id="personasExternas"><i class="fa fa-users"></i> Personas Externas</button></center></li>
      </ul>
    </div>
  </div>

    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
      {!!Form::open(array('url'=>'utp/concepto/create','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}

           <div class="row">
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="form-group">
                  <label for="idAlumno">Alumno</label>
                  <select name="idAlumno" id="idAlumno" class="form-control selectpicker" data-live-search="true">
                        <option value="">Selecciona</option>
                          @foreach($alumnos as $alum) 
                            <option value="{{$alum->id}}">{{$alum->nombre}}</option> 
                          @endforeach             
                  </select>
                 </div>
              </div>

              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="form-group">
                  <label for="idCiclo">Ciclos</label>
                  <select name="idCiclo" id="idCiclo" class="form-control selectpicker" data-live-search="true">
                        <option value="">Selecciona</option>
                        @foreach($ciclos as $ciclo) 
                          <option value="{{$ciclo->idCiclo}}">{{$ciclo->descripcion}}</option> 
                        @endforeach             
                  </select>
                 </div>
              </div>

              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" id="campoPeople">
                <div class="form-group">
                <label class="control-label" for="campoPeople">Nombre</label>
                    <input name="campoPeople"  class="form-control" type="text" value="{{old('campoPeople')}}" placeholder="Nombre persona Externa.....">
                </div>
              </div>


              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
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
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                 <div class="form-group">
                  <label for="folio">Folio</label>
                  <input type="text"  name="folio" id="folio" class="form-control" value="{{old('folio')}}" placeholder="Folio...">
                </div>
              </div>
      </div>
      <div class="row"> 
            <div class="panel panel-primary">
                  <div class="panel-body">
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                              <div class="form-group">
                                    <label>Concepto de Cobro</label>
                                    <select name="pidConcepto" class="form-control selectpicker" id="pidConcepto" data-live-search="true">
                                          <option value="">Selecciona</option>
                                          @foreach($plan as $plan)
                                          <option value="{{$plan->idConceptosPagos}}_{{$plan->precio}}_{{$plan->impuesto}}">{{$plan->codigoConcepto}}</option>
                                          @endforeach
                                    </select>
                              </div>
                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                              <div class="form-group">
                                    <label for="pprecio">Precio</label>
                                    <input type="text" name="pprecio"  class="form-control" id="pprecio" disabled placeholder="Precio Venta...">
                              </div>
                        </div>
                       
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                              <div class="form-group">
                                     <label for="impuesto">Impuesto</label>
                                    <input type="text" name="pimpuesto" id="pimpuesto" class="form-control" disabled placeholder="Impuesto...">
                              </div>
                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                              <div class="form-group">
                                     <label for="cantidad">Cantidad</label>
                                    <input type="number" name="pcantidad" id="pcantidad" class="form-control" placeholder="Impuesto...">
                              </div>
                        </div>
                        
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                              <div class="form-group">
                                     <button id="bt_add"  class="btn btn-primary" type="button"><i class="fa fa-plus"></i> Agregar</button>
                              </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                              <table class="table table-striped table-bordered table-condensed table-hover" id="detalles">
                                    <thead style="background-color:#A9D0F5">
                                        <th>Opciones</th>
                                        <th>Concepto</th>
                                        <th>Precio</th>
                                        <th>Cantidad</th>
                                        <th>Subtotal</th>
                                        <th>Impuesto</th>
                                        <th>Total</th>
                                    </thead>
                                    <tfoot>
                                        <th>Total a Pagar</th>
                                        <th></th>
                                        <th></th>  
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th style="text-align: right;" ><h4 id="total">$/. 0.00</h4><input type="hidden" name="total_venta" id="total_venta"></th>
                                    </tfoot>
                                     <tbody>
                                    </tbody>
                              </table>
                        </div>
                  </div>
            </div>  
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="guardar">
                <div class="form-group">
                  <button class="btn btn-primary" type="submit" onclick="confirmar();"><i class="fa fa-save"></i> Guardar</button>
                  <button class="btn btn-danger" type="reset"><i class="fa fa-ban"></i> Cancelar</button>
                </div>
              </div>
      </div>   


      {!!Form::close()!!}   

            
    </div>
  </div>


@push('scripts')
<script >


$(document).ready(function(){
      $("#bt_add").click(function(){
            agregar();
      });
});
       var cont=0;
       total = 0;
       subtotal=[];
       precioIva=[];
       cantidad=[];

     
      $("#guardar").hide();
      $("#pidConcepto").change(mostrarValores);

      function mostrarValores() {
        datosArticulo=document.getElementById('pidConcepto').value.split("_");
        $('#pprecio').val(datosArticulo[1]);
        $('#pimpuesto').val(datosArticulo[2]);
      }

      function agregar() {

            datosArticulo=document.getElementById('pidConcepto').value.split('_');
            
            idConceptosPagos=datosArticulo[0];
            consepto=$("#pidConcepto option:selected").text();
            cantidad=$("#pcantidad").val();
            precio=$("#pprecio").val();
            impuesto=$("#pimpuesto").val();
            

            if(consepto!="" &&  precio!="" && impuesto!="" && cantidad!="")
            {

                  precioCantidad = precio * cantidad;
                  iva = precioCantidad * impuesto / 100;
                  subtotal[cont] = precioCantidad;
                  precioIva[cont] = iva;
                  total1=precioIva[cont]+subtotal[cont];
                  total=total+total1;

                  var fila ='<tr class="selected" id="fila' + cont +'" ><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="idConceptosPagos[]" value="'+idConceptosPagos+'">'+consepto+'</td><td><input type="text" name="precio[]" readonly="readonly" style="text-align: right;" value="$/. '+precio+'"></td><td><input type="text" name="cantidad[]"  value="'+cantidad+'"></td><td type="text" name=precioCantidad[] style="text-align: right;" readonly>$/.'+precioCantidad+'</td><td type="number" style="text-align: right;" name=iva[]>$/.'+iva+'</td><td style="text-align: right;">$/.'+ total1+'</td></tr>';
                  
                  cont++;
                  limpiar();
                  $("#total").html("$/. " + total);
                  $("#total_venta").val(total);
                  evaluar();
                  $("#detalles").append(fila);
                  
            }else {

                 
                  alert("Error al ingresar el detalle de la venta, revise los datos del articulo");
                  
            }
      }

function limpiar() {
      $("#pfechaPago").val("");
      $("#pprecio_venta").val("");
    
}

function evaluar(){

      if (total>0) {
            $("#guardar").show();
      }
      else {
           $("#guardar").hide();  
      }
}

function eliminar(index) {
     
     total=total-subtotal[index];
     $("#total").html("$/. " + total);
     $("#total_venta").val(total);
     $("#fila" + index).remove();
     evaluar();
}

$(document).ready(function(){
    $("#campoPeople").hide();
      $("#personasExternas").click(function(){
           $("#campoPeople").show();
      });
});

</script>
@endpush
@endsection