<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-guardar-pago-{{$alumno[0]->idAlumnosCxC}}">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" 
				aria-label="Close">
                     <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Realizar Cobros</h4>
			</div>

			<div class="modal-body">
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
            <input name="folio" readonly="readonly" id="folio" class="form-control" type="text" value="1001">
        </div>

        <br><br><br><br>

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">     
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
                                        <th><h4 id="total">$/. 0.0</h4><input type="hidden" name="total_venta" id="total_venta"></th>
                                    </tfoot>
                                    <tbody>
                                    </tbody>
                                  @endif
                                  </table>
                            </div>
                      </div>
                </div>  
                  
          </div>   
        </div>
			</div>
			<div class="modal-footer">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="guardar">
            <div class="form-group">
                <button class="btn btn-primary"  type="submit" onclick="cobrar({{json_encode($alumno)}})"><i class="fa fa-save"></i> Cobrar</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-ban"></i> Cancelar</button>
              </div> 
            </div>
			</div>
		</div>
	</div>
</div>

@push('cobrar')
<script>
 
$(document).ready(function(){
  $("#mensajeExito").hide();
});

 
function cobrar(alumno){

  var confirmar = confirm("Realmente quieres cobrar la cuenta");
  if (confirmar == true) {
    var array = alumno;
   
      for (var i = 0; i < array.length; i++) {
        if (array[i]["pagado"] == "N") {

          var cuentaAlumno = array[i]["idAlumnosCxC"];
      
        $.ajax({
          url:'../plan/cobrar/' + cuentaAlumno,
          type:'get',
          dataType:'json',
          data: {
            'cuenta':array[i],
            'folio': $("#folio").val(),
            'idCiclo': $("#idCaja").val(),
          },
          success:function(data){
          
           location.href ="../plan/create";
            
          }
        });
        }
        
      }
  }
}
</script>
@endpush