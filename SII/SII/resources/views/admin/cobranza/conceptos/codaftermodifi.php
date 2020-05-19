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


                                   <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="guardar">
                            <div class="form-group">
                                <a href="" data-target="#modal-guardar-pago-{{$alumno[0]->idAlumnosCxC}}" data-toggle="modal"><button class="btn btn-primary"  type="submit"><i class="fa fa-save"></i> Cobrar</button></a>
                                @include('admin.cobranza.ventaPlanes.modalSeguridad')
                                <button type="button" class="btn btn-danger" onclick="eliminar();"><i class="fa fa-ban"></i> Cancelar</button>
                            </div> 
                          </div>