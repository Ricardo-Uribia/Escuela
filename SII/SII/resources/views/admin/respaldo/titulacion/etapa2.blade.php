<br>

<div class="tab-content">
    <div class="col-md-12 contenedor-datos">
        <div role="tabpanel">
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#subEtapa1" aria-controls="subEtapa1" data-toggle="tab" role="tab">Modalidad de Titulación y Trámites</a></li>
            <li role="presentation"><a href="#subEtapa2" aria-controls="subEtapa2" data-toggle="tab" role="tab">Trabajo Recepcional</a></li>
            <li role="presentation"><a href="#subEtapa3" aria-controls="subEtapa3" data-toggle="tab" role="tab">Síntesis del Trabajo Recepcional</a></li>
            <li role="presentation"><a href="#subEtapa4" aria-controls="subEtapa4" data-toggle="tab" role="tab">Carta de Autorización</a></li><!--Titulo REcepcion de la carta de autorizacion de impresion del trabajo recepcional de estadia profecional->contenido fecha de emicion -->
          </ul>

      <!--Cada seccion se guarda inependiente a l anterior-->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active"  id="subEtapa1">
                    <div class="row">
                        <h4 style="margin-left: 5%;">Elija la Modalidad de Titulación</h4>
                        	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
	                                <label for="modalidad">Modalidad</label>
	                        		<select class="form-control" id="modalidad">
	                        			<option value="">Sin modalidad seleccionada</option>
	                        			@foreach($modalidad as $mod)
                                        <option value="{{$mod->idCFGModalidades}}">{{$mod->descripcion}} + Carrera </option>
                                        @endforeach
	                        		</select>
                               	</div>
                            </div>
                            <div class="row">
	                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	                                <div class="form-group">
		                                <label for="fechaInicioTramite">Fecha de Inicio de Trámites:</label>
		                        		<input type="date" name="" id="fechaInicioTramite" class="form-control">
	                               	</div>
	                            </div>
	                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		                            <div class="form-group">
			                            <label for="expedienteTitulacion">Expediente de Titulación</label>
			                        	<input type="text" name="" id="expedienteTitulacion" class="form-control">
		                            </div>
		                        </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
	                                <label for="listaRequisitos">Lista de Requesitos para esta modalidad</label>
	                        		<table class="table table-striped table-bordered table-condensed table-hover" style="width: 100%; height: 80%;">
	                        			 <thead style="background-color:#A9D0F5">
		                        			<th>Documento</th>
		                        			<th>Fecha de Entrega</th>
		                        		</thead>
		                        		<tbody>
		                        			<tr>
                                                <td>Hola</td> 
                                                <td>Mundo</td> 

                                            </tr>
                                            <tr>
                                                <td>Hola</td> 
                                                <td>Mundo</td> 
                                            </tr>
                                            <tr>
                                                <td>Hola</td> 
                                                <td>Mundo</td> 

                                            </tr>
                                            <tr>
                                                <td>Hola</td> 
                                                <td>Mundo</td> 
                                            </tr>
                                            <tr>
                                                <td>Hola</td> 
                                                <td>Mundo</td> 

                                            </tr>
                                            <tr>
                                                <td>Hola</td> 
                                                <td>Mundo</td> 
                                            </tr>
		                        		</tbody>
	                        		</table>
                               	</div>
                            </div>
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
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="subEtapa2">
                    <div class="row">
                        <h4 style="margin-left: 5%;">Datos del Trabajo Recepcional</h4>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="temaTratar">Tema del que trata</label>
                                <input type="text" name="" id="temaTratar" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="nombreProyecto">Nombre del Proyecto</label>
                                <input type="text" name="" id="temaTratar" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="fechaSolicitudAprovacion">Fecha de Solicitud de Aprobación:</label>
                                <input type="date" name="" id="fechaSolicitudAprovacion" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                            <div class="form-group">
                                <label for="statusTrabajo">Status del Trabajo</label>
                                <select class="form-control" id="statusTrabajo">
                                    <option value="">Seleccione</option>
                                    <option value="">No iniciado</option>
                                    <option value="">Iniciado</option>
                                    <option value="">En revición</option>
                                    <option value="">Con voto aprobatorio/Vo.Bo del Asesor</option>
                                    <option value="">Rechazado</option>
                                    <!--Posible implementacion de base de datos-->
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <button class="btn" style=" width:150px;height:50px; "><span class="fa fa-file"></span> Doctos. del Alumno</button>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="fechaInicio">Fecha de Inicio:</label>
                                    <input type="date" name="" id="fechaInicio" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="fechaConclucion">Fecha de Conclusión:</label>
                                    <input type="date" name="" id="fechaConclucion" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="Observaciones">Observaciones sobre el Trabajo Recepcional</label>
                                <textarea id="Observaciones" class="form-control">
                                </textarea>
                            </div>
                        </div>
                        <h4 style="margin-left: 5%; color: green">Asesor para el Trabajo Recepcional</h4>

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="seleccionarProfesor">Selecciona Profesor o Empleado</label>
                                <select class="form-control" id="seleccionarProfesor">
                                    <option value="">Selecciona Profesor o Empleado</option>
                                    @foreach($maestros as $maestr)
                                    <option value="{{$maestr->idEmpleados}}">{{$maestr->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
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
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="subEtapa3">  
                    <div class="row">
                        <br>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                 <textarea class="form-control"></textarea>
                            </div>
                        </div>
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
                    </div>     
                </div>
                <div role="tabpanel" class="tab-pane" id="subEtapa4">  
                    <div class="row">
                        <br>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <h4 style="margin-left: 5%; color: green">Recepción de la Carta de Autorización de Impresión del Trabajo Recepcional de Estadía Profecional</h4>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="fechaEmicion">Fecha de Emición:</label>
                                <input type="date" name="" id="fechaEmicion" class="form-control">
                            </div>
                        </div>
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
                    </div>     
                </div>
            </div>    
        </div>
    </div>
</div>

