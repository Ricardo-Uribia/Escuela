<h4 style="margin-left: 5%;">Datos de Registro de Título y/o Cédula Profesional</h4>
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
	    <div class="form-group">
		    <label for="carrera">Para la Carrea o Nivel</label>
			<input type="text" name="" id="carrera" value="Carrera del alumno" class="form-control">
	    </div>
	</div>
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
	    <div class="form-group">
		    <Strong for="modalidad">Modalidad de Titulación:</Strong>
			<p id="modalidad">Sin ficha creada</p>
	</div>
</div>



<br>


<div class="tab-content">
    <div class="col-md-12 contenedor-datos">
        <div role="tabpanel">
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#subEtapa1" aria-controls="subEtapa1" data-toggle="tab" role="tab">Datos de Registro del Título</a></li>
            <li role="presentation"><a href="#subEtapa2" aria-controls="subEtapa2" data-toggle="tab" role="tab">Cédula Profecional</a></li>
          </ul>

      
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active"  id="subEtapa1">
                    <div class="row">
                        <div class="row">
	                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
	                                <div class="form-group">
		                                <label for="fechaExpedicion">Fecha de Expedición de Título:</label>
		                        		<input type="date" name="" id="fechaExpedicion" class="form-control">
	                               	</div>
	                            </div>
	                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
	                                <div class="form-group">
		                                <label for="fechaRegistro">Fecha de Registro de Título:</label>
		                        		<input type="date" name="" id="fechaRegistro" class="form-control">
	                               	</div>
	                            </div>
                        </div>
                        <br>
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                            <div class="form-group">
                                   <label for="folio">Folio de Registro de Título</label>
                                   <input type="text" name="" id="folio" class="form-control">
                                </div>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                            <div class="form-group">
                                   <label for="OtrosDatos">Folio Largo</label>
                                   <input type="text" name="" id="OtrosDatos" class="form-control">
                                </div>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                            <div class="form-group">
                                <label for="Observaciones">Paquete</label>
                                <input type="text" name="" id="Observaciones" class="form-control">
                                
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                            <div class="form-group">
                                   <label for="Observaciones">Observaciones</label>
                                   <textarea id="Observaciones" class="form-control"></textarea>
                                </div>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                            <div class="form-group">
                                   <label for="Situación">Situación del Título</label>
                                   <select class="form-control" id="Situación">
                                        <option>Selecciona</option>
	                        			<option value="">No Expedido</option>
                                        <option value="">En tramite</option>
                                        <option value="">Registrado en DGP</option>
                                        <option>Entregado al alumno</option>
                                        <option>Cancelado</option>    			
                                        <!--Posible implementacion de base de datos-->
	                        		</select>
                            </div>
                        </div>

                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                            <div class="form-group">
                                <label for="Observaciones">Folio</label>
                                <input type="text" name="" id="Observaciones" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                            <div class="form-group">
                                <label for="Observaciones">Libro</label>
                                <input type="text" name="" id="Observaciones" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                            <div class="form-group">
                                <label for="Observaciones">Foja</label>
                                <input type="text" name="" id="Observaciones" class="form-control">
                            </div>
                        </div>
<!--Folio_tit, libro_tit, y foja_tit en base de datos que se llamen los campos despues de situacion tilo en alumnos_titulacion-->
                        <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <div class="alert alert-danger"><i class="fa fa-info-circle"></i> Este alumno no tiene ficha de titulación</div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <p style="text-align: right; margin-right:10%"><button class="btn" style=" width:200px;height:50px; "><span class="fa fa-save"></span> Guardar Datos de Registro</button></p>
                                </div>
                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="subEtapa2">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
	                        <div class="form-group">
		                        <label for="fechaExpedicionCedula">Fecha de Expedición de Cédula:</label>
		                    	<input type="date" name="" id="fechaExpedicionCedula" class="form-control">
	                       	</div>
	                    </div> 
	                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
	                        <div class="form-group">
		                        <label for="folioCedula">Folio de Cédula:</label>
		                    	<input type="text" name="" id="folioCedula" class="form-control">
	                       	</div>
	                    </div> 
	                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
	                        <div class="form-group">
		                        <label for="Cedulapor">Cédula Expedida por:</label>
		                    	<input type="text" name="" id="Cedulapor" class="form-control">
	                       	</div>
	                    </div> 
	                    <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <div class="alert alert-danger"><i class="fa fa-info-circle"></i> Este alumno no tiene ficha de titulación</div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <p style="text-align: right; margin-right:10%"><button class="btn" style=" width:200px;height:50px; "><span class="fa fa-save"></span> Guardar Datos de Registro</button></p>
                                </div>
                        </div>  
                    </div>
                </div>
            </div>    
        </div>
    </div>
</div>
