<br>
<div class="tab-content">
    <div class="col-md-11 contenedor-datos">
        <div role="tabpanel">
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#subEtapa1" aria-controls="subEtapa1" data-toggle="tab" role="tab">Servicio Social</a></li>
          </ul>

      
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active"  id="subEtapa1">
                    <div class="row">
                        <br>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <a href="" data-target="#modal-evento-titulacion" data-toggle="modal"><button class="btn" style=" width:150px;height:50px; "><span class="fa fa-file"></span> Agregar Estadia</button></a>
                            @include('admin.titulacion.modalEvento')
                        </div>
                      

                                        <br><br><br>
                        <!--<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <button class="btn" style=" width:150px;height:50px; "><span class="fa fa-file"></span> Imprimir Comprobante</button>
                        </div> --> 
                        <div class="row">
  
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <table class="table table-striped table-bordered table-condensed table-hover" style="width: 100%; height: 80%;">
                                         <thead style="background-color:#A9D0F5">
                                            <th>Estadia</th>
                                            <th>Institución</th>
                                            <th>Periodo</th>
                                            <th>Asesor</th>
                                            <th>Opciones</th>
                                        </thead>
                                        <tbody>
                                        @foreach($empresaAlumno as $empreAlum)
                                            <tr>
                                               
                                          
                                                <td>{{$empreAlum->id}}</td> 
                                                <td>{{$empreAlum->nombreEmpresa}}</td>
                                                <td>{{$empreAlum->pivot->fechaIncio}} a {{$empreAlum->pivot->fechaConclusion}}</td>
                                                <td>{{$empreAlum->pivot->supervisorNombre}}</td>
                                                <td>
                                                    <a href="" data-target="#modal-servico-social-{{$empreAlum->pivot->id}}" data-toggle="modal"><button  class="btn btn-warning" ><span class="fa fa-edit"></span> Editar</button></a> 

                                                    @include('admin.titulacion.editServicioSocial')


                                                <a href="" data-target="#modal-servico-social-delete-{{$empreAlum->id}}" data-toggle="modal"><button  class="btn btn-danger" ><span class="fa fa-trash"></span> Eliminar</button></a> 
                                                <a href="{{url('/')}}/alumno-{{$idAlumno->id}}/titulacion/etapa2-{{$empreAlum->id}}"><button  class="btn btn-success" ><span class="fa fa-replay"></span> Continuar</button></a> 
                                                    @include('admin.titulacion.modalDelete')
                                                </td>
                                               
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> 
                        

                    @if(count($empresaAlumno))
                       
                    @else
                        <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <div class="alert alert-danger"><i class="fa fa-info-circle"></i> Este alumno no tiene ficha de titulación</div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <p style="text-align: right; margin-right:10%"><button class="btn" style=" width:150px;height:50px; "><span class="fa fa-file"></span> Crear Ficha</button></p>
                                </div>
                            </div>   
                    @endif  
                    </div>
                </div>
            </div>
               
        </div>    
    </div>
</div>