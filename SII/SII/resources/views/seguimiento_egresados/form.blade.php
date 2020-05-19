


<section class="col-md-12">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                    <img align="right" style="width: 15%; height: 20%" src="{{asset('/img/sep.jpg')}}" width="50%"/>
                        <h4><center><b>SECRETARIA DE EDUCACION SUPERIOR <BR>
                                       COORDINACION GENERAL DE UNIVERSIDADES<BR>
                                       TECNOLÓGICAS Y POLITÉCNICAS </b></center></h4>

                                       <h4><center><b>Registro Nacional de Egresados <BR>
                                       de las Universidades Tecnologicas EGR_12 <BR>
                                       FICHA DE SEGUIMIENTO DE EGRESADOS</b></center></h4>

                                       <h3><center><b>INSTRUCCIONES :<BR>
                                       LEE CUIDADOSAMENTE CADA PREGUNTA ANTES DE CONTESTARLA.  INSTRUCCIONES ESPECIFICAS PARA PREGUNTAS: SELECCIONAR UNA RESPUESTA</b></center></h3>
                    </div>
                    
                </div>
                
            </div>
            
        </div>
        
    </div>
</section>


<section>
<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('matricula') ? 'has-error' : ''}}">
            <label for="matricula" class=" col-xs-8">Matricula :</label>
                <input name="matricula" type="number" class="form-control" id="matricula" value="{{ $seguimiento_egresado->matricula or ''}}">
                {!! $errors->first('matricula', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>




<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('idCiclo') ? 'has-error' : ''}}">
            <label for="idCiclo" class=" col-xs-8">Id Ciclo :</label>
        {!!Form::select('idCiclo', App\Models\Ciclo::all()->
        pluck('descripcion', 'idCiclo'), null,['class'=>'form-control'])!!}
        {!!$errors->first('idCiclo', '<p class="help-block"></p>')!!}
        </div>
    </div>
</div>





<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
            <label for="nombre" class=" col-xs-8">Nombre :</label>
                <input name="nombre" type="text" class="form-control" id="nombre" value="{{ $seguimiento_egresado->nombre or ''}}">
                {!!$errors->first('nombre', '<p class="help-block"></p>')!!}
        </div>
    </div>
</div>


<hr>
<hr>
<hr>
<hr>
<hr>
<hr>
<hr>
<hr>
<hr>
<hr>
<div class="col-md-9">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('id') ? 'has-error' : ''}}">
            <label for="id" class=" col-xs-8">Id Carrera :</label>
                     {!!Form::select('id', App\Models\Niveles::all()->
                    pluck('Descripcion_Nivel', 'id'), null,['class'=>'form-control'])!!}
                {!! $errors->first('id', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>



<hr>
<hr>
<hr>
<hr>
<hr>
<hr>
<hr>
<hr>
<hr>
<h3><center><B>I. DATOS GENERALES<B></center></h3>

<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('estadocivil_egresado') ? 'has-error' : ''}}">
            <label for="estadocivil_egresado" class="col-xs-6"><h4><B>2.Estado Civil :</B></h4></label>
               <select class="form-control" name="estadocivil_egresado">
               <option value="Selecciona">Selecciona</option>
                <option value="Soltero">soltero</option>
                <option vlaue="Divorciado">Divorciado</option>
                <option value="Viudo">Viudo</option>
                <option value="Casado">Casado</option>
                <option value="Union libre">Union libre</option>
                   
               </select>
                {!! $errors->first('estatadocivil_egresado', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<hr>
<hr>
<hr>
 
<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('estatus_titulacion') ? 'has-error' : ''}}">
            <label for="estatus_titulacion" class=" col-xs-8">3. ¿Cual es el estado de tu titulacion?</label>
                <select class="form-control" name="estatus_titulacion">
                <option value="Selecciona">Selecciona</option>
                <option value="Si, Titulo y cedula profesional">Si, Titulo y cedula profesional</option>
                <option value="No, estoy en espera de recibir los documentos">No, estoy en espera de recibir los documentos</option>
                <option value="No he hecho los tramites"></option>                    
                </select>
                {!! $errors->first('estatus_titulacion', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>
<hr>
<hr>
<hr>
<hr>
<hr>

<h3><center><b>4. Para cubrir los gastos de tus estudios de este nivel que concluyes, indica aproximadamente el porcentaje que represento</b></center></h3>


<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('porcentaje_rubros') ? 'has-error' : ''}}">
            <label for="porcentaje_rubros" class=" col-xs-8">Porcentaje Rubros :</label>
                <input name="porcentaje_rubros" type="text" class="form-control" id="porcentaje_rubros" value="{{ $seguimiento_egresado->porcentaje_rubros or ''}}">
                {!! $errors->first('porcentaje_rubros', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('porcentaje_cual') ? 'has-error' : ''}}">
            <label for="porcentaje_cual" class="control-label col-xs-8">Porcentaje ¿cual? :</label>
                <select class="form-control" name="porcentaje_cual">
                <option value="Selecciona">Selecciona</option>
                <option value="Familiares">Familiares</option>
                <option value="Trabajando">Trabajando</option>
                <option value="Beca">Beca</option>
                </select>
                {!! $errors->first('porcentaje_cual', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<hr>
<hr>
<hr>

<div class="col-md-12">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('beca_principal') ? 'has-error' : ''}}">
            <label for="beca_principal" class=" col-xs-8">Beca Principal :</label>
                <select class="form-control" name="beca_principal">
                    <option value="Selecciona">Selecciona</option>
                    <option value="PRONABES">PRONABES</option>
                    <option value="Gobierno Estatal o Municipal">Gobierno estatal o Municipal</option>
                    <option value="Credito Educativo">Credito Educativo</option>
                    <option value="FONABEC">FONABEC</option>
                    <option value="Becalos">Becalos</option>
                    <option value="Fundaciones o asociaciones civiles">Fundaciones o asociaciones civiles</option>
                    <option value="Apoyo institucional (alimentacion, transporte, exencion de pago o descuento)">Apoyo institucional (alimentacion, transporte, exencion de pago o descuento)</option>
                    <option value="FESE">FESE</option>
                    <option value="Otra beca">Otra beca</option>
                    
                </select>
                {!! $errors->first('beca_principal', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<hr>
<hr>
<hr>
<hr>
<hr>



<h3><center><b>II. DATOS DE CONTACTO</b></center></h3>
<h4><center><b>5. Numeros telefonicos</b></center></h4>

<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('telefono_casa_a') ? 'has-error' : ''}}">
            <label for="telefono_casa_a" class=" col-xs-8">Telefono fijo :</label>
                <input name="telefono_casa_a" type="number" class="form-control" id="telefono_casa_a" value="{{ $seguimiento_egresado->telefono_casa_a or ''}}">
                {!! $errors->first('telefono_casa_a', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('celular_a') ? 'has-error' : ''}}">
            <label for="celular_a" class=" col-xs-8">Celular_a :</label>
                <input name="celular_a" type="number" class="form-control" id="celular_a" value="{{ $seguimiento_egresado->celular_a or ''}}">
                {!! $errors->first('celular_a', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('telefono_contacto_a') ? 'has-error' : ''}}">
            <label for="telefono_contacto_a" class=" col-xs-8">Telefono Casa :</label>
                <input name="telefono_contacto_a" type="number" class="form-control" id="telefono_contacto_a" value="{{ $seguimiento_egresado->telefono_contacto_a or ''}}">
                {!! $errors->first('telefono_contacto_a', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('parentezco_contacto_a') ? 'has-error' : ''}}">
            <label for="parentezco_contacto_a" class=" col-xs-8">Parentezco Contacto :</label>
                <input name="parentezco_contacto_a" type="text" class="form-control" id="parentezco_contacto_a" value="{{ $seguimiento_egresado->parentezco_contacto_a or ''}}">
                {!! $errors->first('parentezco_contacto_a', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<hr>
<hr>
<hr>
<hr>
<hr>
<hr>
<hr>


<h3><center><b>6. Domicilios</b></center></h3>




<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('domicilio_particular') ? 'has-error' : ''}}">
            <label for="domicilio_particular" class=" col-xs-8">Domicilio Particular :</label>
                <input name="domicilio_particular" type="text" class="form-control" id="domicilio_particular" value="{{ $seguimiento_egresado->domicilio_particular or ''}}">
                {!! $errors->first('domicilio_particular', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('colonia_particular') ? 'has-error' : ''}}">
            <label for="colonia_particular" class=" col-xs-8">Colonia Paticular :</label>
                <input name="colonia_particular" type="text" class="form-control" id="colonia_particular" value="{{ $seguimiento_egresado->colonia_particular or ''}}">
                {!! $errors->first('colonia_particular', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('municipio_particular') ? 'has-error' : ''}}">
            <label for="municipio_particular" class=" col-xs-8">Municipio Particular :</label>
                <input name="municipio_particular" type="text" class="form-control" id="municipio_particular" value="{{ $seguimiento_egresado->municipio_particular or ''}}">
                {!! $errors->first('municipio_particular', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('estado_particular') ? 'has-error' : ''}}">
            <label for="estado_particular" class=" col-xs-8">Estado Particular :</label>
                <input name="estado_particular" type="text" class="form-control" id="estado_particular" value="{{ $seguimiento_egresado->estado_particular or ''}}">
                {!! $errors->first('estado_particular', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('nombre_empresa') ? 'has-error' : ''}}">
            <label for="nombre_empresa" class=" col-xs-8">Nombre Empresa :</label>
                <input name="nombre_empresa" type="text" class="form-control" id="nombre_empresa" value="{{ $seguimiento_egresado->nombre_empresa or ''}}">
                {!! $errors->first('nombre_empresa', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('domicilio_laboral') ? 'has-error' : ''}}">
            <label for="domicilio_laboral" class=" col-xs-8">Domicilio Laboral :</label>
                <input name="domicilio_laboral" type="text" class="form-control" id="domicilio_laboral" value="{{ $seguimiento_egresado->domicilio_laboral or ''}}">
                {!! $errors->first('domicilio_laboral', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('estado_laboral') ? 'has-error' : ''}}">
            <label for="estado_laboral" class=" col-xs-8">Estado Laboral :</label>
                <input name="estado_laboral" type="text" class="form-control" id="estado_laboral" value="{{ $seguimiento_egresado->estado_laboral or ''}}">
                {!! $errors->first('estado_laboral', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('domicilio_contacto') ? 'has-error' : ''}}">
            <label for="domicilio_contacto" class=" col-xs-8">Domicilio Contacto :</label>
                <input name="domicilio_contacto" type="text" class="form-control" id="domicilio_contacto" value="{{ $seguimiento_egresado->domicilio_contacto or ''}}">
                {!! $errors->first('domicilio_contacto', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('colonia_contacto') ? 'has-error' : ''}}">
            <label for="colonia_contacto" class=" col-xs-8">Colonia Contacto :</label>
                <input name="colonia_contacto" type="text" class="form-control" id="colonia_contacto" value="{{ $seguimiento_egresado->colonia_contacto or ''}}">
                {!! $errors->first('colonia_contacto', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('municipio_contacto') ? 'has-error' : ''}}">
            <label for="municipio_contacto" class=" col-xs-8">Municipio Contacto :</label>
                <input name="municipio_contacto" type="text" class="form-control" id="municipio_contacto" value="{{ $seguimiento_egresado->municipio_contacto or ''}}">
                {!! $errors->first('municipio_contacto', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('estado_contacto') ? 'has-error' : ''}}">
            <label for="estado_contacto" class=" col-xs-8">Estado Contacto :</label>
                <input name="estado_contacto" type="text" class="form-control" id="estado_contacto" value="{{ $seguimiento_egresado->estado_contacto or ''}}">
                {!! $errors->first('estado_contacto', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('parentezco_contacto') ? 'has-error' : ''}}">
            <label for="parentezco_contacto" class=" col-xs-8">Parentezco Contacto :</label>
                <input name="parentezco_contacto" type="text" class="form-control" id="parentezco_contacto" value="{{ $seguimiento_egresado->parentezco_contacto or ''}}">
                {!! $errors->first('parentezco_contacto', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<hr>
<hr>
<hr>
<hr>


<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('apartado_postal') ? 'has-error' : ''}}">
            <label for="apartado_postal" class=" col-xs-8">Apartado Postal :</label>
                <input name="apartado_postal" type="text" class="form-control" id="apartado_postal" value="{{ $seguimiento_egresado->apartado_postal or ''}}">
                {!! $errors->first('apartado_postal', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<hr>
<hr>
<hr>
<hr>
<hr>
<hr>
<hr>
<hr>
<hr>
<hr>
<hr>
<hr>
<hr>
<hr>


<h3><center><b>7. Medios electronicos y redes sociales</b></center></h3>

<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('email_a') ? 'has-error' : ''}}">
            <label for="email_a" class=" col-xs-8">EmailA :</label>
                <input name="email_a" type="text" class="form-control" id="email_a" value="{{ $seguimiento_egresado->email_a or ''}}">
                {!! $errors->first('email_a', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('email2') ? 'has-error' : ''}}">
            <label for="email2" class=" col-xs-8">Email 2 :</label>
                <input name="email2" type="text" class="form-control" id="email2" value="{{ $seguimiento_egresado->email2 or ''}}">
                {!! $errors->first('email2', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('email_laboral') ? 'has-error' : ''}}">
            <label for="email_laboral" class=" col-xs-8">Email Laboral :</label>
                <input name="email_laboral" type="text" class="form-control" id="email_laboral" value="{{ $seguimiento_egresado->email_laboral or ''}}">
                {!! $errors->first('email_laboral', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('facebook_a') ? 'has-error' : ''}}">
            <label for="facebook_a" class=" col-xs-8">Facebook:</label>
                <input name="facebook_a" type="text" class="form-control" id="facebook_a" value="{{ $seguimiento_egresado->facebook_a or ''}}">
                {!! $errors->first('facebook_a', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('twitter') ? 'has-error' : ''}}">
            <label for="twitter" class=" col-xs-8">Twitter :</label>
                <input name="twitter" type="text" class="form-control" id="twitter" value="{{ $seguimiento_egresado->twitter or ''}}">
                {!! $errors->first('twitter', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>




<hr>
<hr>
<hr>
<hr>
<hr>
<hr>
<hr>
<hr>
<h3><center><b>8. Referencias</b></center></h3>


<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('ref_fam1') ? 'has-error' : ''}}">
            <label for="ref_fam1" class=" col-xs-8">Referencia Familiar 1 :</label>
                <input name="ref_fam1" type="text" class="form-control" id="ref_fam1" value="{{ $seguimiento_egresado->ref_fam1 or ''}}">
                {!! $errors->first('ref_fam1', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('tel_fam1') ? 'has-error' : ''}}">
            <label for="tel_fam1" class=" col-xs-8">Telefono Familiar 1 :</label>
                <input name="tel_fam1" type="number" class="form-control" id="tel_fam1" value="{{ $seguimiento_egresado->tel_fam1 or ''}}">
                {!! $errors->first('tel_fam1', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('email_fam1') ? 'has-error' : ''}}">
            <label for="email_fam1" class=" col-xs-8">Email Familiar 1 :</label>
                <input name="email_fam1" type="text" class="form-control" id="email_fam1" value="{{ $seguimiento_egresado->email_fam1 or ''}}">
                {!! $errors->first('email_fam1', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('ref_fam2') ? 'has-error' : ''}}">
            <label for="ref_fam2" class=" col-xs-8">Referencia Familiar 2 :</label>
                <input name="ref_fam2" type="text" class="form-control" id="ref_fam2" value="{{ $seguimiento_egresado->ref_fam2 or ''}}">
                {!! $errors->first('ref_fam2', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('tel_fam2') ? 'has-error' : ''}}">
            <label for="tel_fam2" class=" col-xs-8">Telefono Familiar 2 :</label>
                <input name="tel_fam2" type="number" class="form-control" id="tel_fam2" value="{{ $seguimiento_egresado->tel_fam2 or ''}}">
                {!! $errors->first('tel_fam2', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('email_fam2') ? 'has-error' : ''}}">
            <label for="email_fam2" class=" col-xs-8">Email Familiar 2 :</label>
                <input name="email_fam2" type="text" class="form-control" id="email_fam2" value="{{ $seguimiento_egresado->email_fam2 or ''}}">
                {!! $errors->first('email_fam2', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('ref_laboral1') ? 'has-error' : ''}}">
            <label for="ref_laboral1" class=" col-xs-8">Referencia Laboral 1 :</label>
                <input name="ref_laboral1" type="text" class="form-control" id="ref_laboral1" value="{{ $seguimiento_egresado->ref_laboral1 or ''}}">
                {!! $errors->first('ref_laboral1', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('tel_ref_laboral1') ? 'has-error' : ''}}">
            <label for="tel_ref_laboral1" class=" col-xs-8">Telefono Referencia Laboral 1 :</label>
                <input name="tel_ref_laboral1" type="number" class="form-control" id="tel_ref_laboral1" value="{{ $seguimiento_egresado->tel_ref_laboral1 or ''}}">
                {!! $errors->first('tel_ref_laboral1', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('email_ref_laboral1') ? 'has-error' : ''}}">
            <label for="email_ref_laboral1" class=" col-xs-8">Email Referencia Laboral 1 :</label>
                <input name="email_ref_laboral1" type="text" class="form-control" id="email_ref_laboral1" value="{{ $seguimiento_egresado->email_ref_laboral1 or ''}}">
                {!! $errors->first('email_ref_laboral1', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('ref_laboral2') ? 'has-error' : ''}}">
            <label for="ref_laboral2" class=" col-xs-8">Referencia Laboral 2 :</label>
                <input name="ref_laboral2" type="text" class="form-control" id="ref_laboral2" value="{{ $seguimiento_egresado->ref_laboral2 or ''}}">
                {!! $errors->first('ref_laboral2', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('tel_ref_laboral2') ? 'has-error' : ''}}">
            <label for="tel_ref_laboral2" class=" col-xs-8">Telefono Referencia Laboral :</label>
                <input name="tel_ref_laboral2" type="number" class="form-control" id="tel_ref_laboral2" value="{{ $seguimiento_egresado->tel_ref_laboral2 or ''}}">
                {!! $errors->first('tel_ref_laboral2', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('email_ref_laboral2') ? 'has-error' : ''}}">
            <label for="email_ref_laboral2" class=" col-xs-8">Email Referencia Laboral :</label>
                <input name="email_ref_laboral2" type="text" class="form-control" id="email_ref_laboral2" value="{{ $seguimiento_egresado->email_ref_laboral2 or ''}}">
                {!! $errors->first('email_ref_laboral2', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('ref_escolar1') ? 'has-error' : ''}}">
            <label for="ref_escolar1" class=" col-xs-8">Referencia Escolar 1 :</label>
                <input name="ref_escolar1" type="text" class="form-control" id="ref_escolar1" value="{{ $seguimiento_egresado->ref_escolar1 or ''}}">
                {!! $errors->first('ref_escolar1', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('tel_ref_escolar1') ? 'has-error' : ''}}">
            <label for="tel_ref_escolar1" class=" col-xs-8">Telefono Referencia Escolar 1 :</label>
                <input name="tel_ref_escolar1" type="number" class="form-control" id="tel_ref_escolar1" value="{{ $seguimiento_egresado->tel_ref_escolar1 or ''}}">
                {!! $errors->first('tel_ref_escolar1', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('email_ref_escolar1') ? 'has-error' : ''}}">
            <label for="email_ref_escolar1" class=" col-xs-8">Email Referencia Escolar 1 :</label>
                <input name="email_ref_escolar1" type="text" class="form-control" id="email_ref_escolar1" value="{{ $seguimiento_egresado->email_ref_escolar1 or ''}}">
                {!! $errors->first('email_ref_escolar1', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('ref_escolar2') ? 'has-error' : ''}}">
            <label for="ref_escolar2" class=" col-xs-8">Referencia Escolar 2 :</label>
                <input name="ref_escolar2" type="text" class="form-control" id="ref_escolar2" value="{{ $seguimiento_egresado->ref_escolar2 or ''}}">
                {!! $errors->first('ref_escolar2', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('tel_ref_escolar2') ? 'has-error' : ''}}">
            <label for="tel_ref_escolar2" class=" col-xs-8">Telefono Referencia Escolar 2 :</label>
                <input name="tel_ref_escolar2" type="number" class="form-control" id="tel_ref_escolar2" value="{{ $seguimiento_egresado->tel_ref_escolar2 or ''}}">
                {!! $errors->first('tel_ref_escolar2', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('email_ref_escolar2') ? 'has-error' : ''}}">
            <label for="email_ref_escolar2" class=" col-xs-8">Email Referecnia Escolar 2 :</label>
                <input name="email_ref_escolar2" type="text" class="form-control" id="email_ref_escolar2" value="{{ $seguimiento_egresado->email_ref_escolar2 or ''}}">
                {!! $errors->first('email_ref_escolar2', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<hr>
<hr>
<hr>
<hr>
<hr>
<hr>
<hr>
<hr>
<h3><center><b>III. DATOS LABORALES</b></center></h3>
<h3><center><b>9. ¿Trabajas actualmente?</b></center></h3>

    <fieldset class="fields2">
    <dl>
        <dt><label></label></dt>
        <dd>
            <input type="radio" name="trab" onclick="toggle3(this)" value="SI"> No <br>
            <input type="radio" name="trab" onclick="toggle3(this)" value="NO" > Sí <br>
            
        </dd>
    </dl>
</fieldset>

<div id="cinco" style="display:none">
    
<div class="input-group">

<hr>
<hr>
<hr>
<hr>
<hr>
<hr>
<h3><center><b>10. Dado que actualmente no trabajas, selecciona, la siguiente lista, la razon principal por la que no lo haces</b></center></h3>

<div class="col-md-12">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('razon_no_trabajo') ? 'has-error' : ''}}">
            <label for="razon_no_trabajo" class=" col-xs-8"></label>
                <select class="form-control" name="razon_no_trabajo">
                    <option value="Selecciona">Selecciona</option>
                    <option value="No has encontrado empleo con el salario que pretendes">No has encontrado empleo con el salario que pretendes</option>
                    <option value="No has encontrado empleo en el area de tu formacion profesional">No has encontrado empleo en el area de tu formacion profesional</option>
                    <option value="No has encontrado empleo de ningun tipo">No has encontrado empleo de ningun tipo</option>
                    <option value="Continuas (o continuaras) estudiando en la UT una Licencia Profesional">Continuas (o continuaras) estudiando en la UT una Licencia Profesional</option>
                    <option value="Continuas (o continuaras) estudiando en la UT una Ingenieria o una Licenciatura">continuas (o continuaras) estudiando en la UT una Ingenieria o una Licenciatura</option>
                    <option value="Continuas (o continuaras) estudiando en otra institucion una Ingenieria o una Licenciatura">Continuas (o continuaras) estudiando en otra institucion una Ingenieria o una Licenciatura</option>
                    <option value="Continuas (o continuaras) estudinado en otra institucion un Posgrado">Continuas (o continuaras) estudiando en otra institucion un Posgrado</option>
                    <option value="Renunciaste a algun empleo que tenias porque no te convenia">Renunciaste a algun empleo que tenias porque no te convenia</option>
                    <option value="Tenias empleo pero fuiste despedido">Tenias empleo pero fuiste despedido</option>
                    <option value="Cerro la empresa en donde trabajabas">Cerro la empresa en donde trabajabas</option>
                    <option value="Trabajabas por contrato y termino el mismo">Trabajabas por contrato y termino el mismo</option>
                    <option value="Por situaciones medicas">Por situaciones medicas</option>
                    <option value="Te ocupas de las labores del hogar">Te ocupas de las labores del hogar</option>
                    <option value="No has solicitado empleo">No has solicitado empleo</option>                    
                </select>
                {!! $errors->first('razon_no_trabajo', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<hr>
<h3><center><b>11. Datos de tu jefe inmediato</b></center></h3>

<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('nombre_jefe') ? 'has-error' : ''}}">
            <label for="nombre_jefe" class=" col-xs-8">Nombre Jefe :</label>
                <input name="nombre_jefe" type="text" class="form-control" id="nombre_jefe" value="{{ $seguimiento_egresado->nombre_jefe or ''}}">
                {!! $errors->first('nombre_jefe', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('puesto_jefe') ? 'has-error' : ''}}">
            <label for="puesto_jefe" class=" col-xs-8">Puesto Jefe :</label>
                <input name="puesto_jefe" type="text" class="form-control" id="puesto_jefe" value="{{ $seguimiento_egresado->puesto_jefe or ''}}">
                {!! $errors->first('puesto_jefe', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('telefono_jefe') ? 'has-error' : ''}}">
            <label for="telefono_jefe" class=" col-xs-8">Telefono Jefe :</label>
                <input name="telefono_jefe" type="number" class="form-control" id="telefono_jefe" value="{{ $seguimiento_egresado->telefono_jefe or ''}}">
                {!! $errors->first('telefono_jefe', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('extension_jefe') ? 'has-error' : ''}}">
            <label for="extension_jefe" class=" col-xs-8">Extension Jefe :</label>
                <input name="extension_jefe" type="text" class="form-control" id="extension_jefe" value="{{ $seguimiento_egresado->extension_jefe or ''}}">
                {!! $errors->first('extension_jefe', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('email_jefe') ? 'has-error' : ''}}">
            <label for="email_jefe" class=" col-xs-8">Email Jefe :</label>
                <input name="email_jefe" type="text" class="form-control" id="email_jefe" value="{{ $seguimiento_egresado->email_jefe or ''}}">
                {!! $errors->first('email_jefe', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<hr>
<hr>
<hr>
<hr>
<hr>
<hr>
<hr>
<hr>
<hr>
<h3><center><b>12. Al concluir tus estudios en la UT ¿cuanto tiempo tardaste en encontrar tu primer empleo, en empezar a trabajar por tu cuentao en un negocio familiar o propio?</b></center></h3>

<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('tiempo_primer_trabajo') ? 'has-error' : ''}}">
            <label for="tiempo_primer_trabajo" class=" col-xs-8">Tiempo Primer Trabajo :</label>
               <select class="form-control" name="tiempo_primer_trabajo">
               <option value="Selecciona">Selecciona</option>
                <option value="Ya estabas trabajando y continuaste haciendolo">Ya estabas trabajando y continuaste haciendolo</option>
                <option value="Te contrataron donde hiciste la estadia">Te contrataron donde hiciste la estadia</option>
                <option value="Menos de 3 meses">Menos de 3 meses</option>
                <option value="Mas de 6 meses a un año">Mas de 6 meses a un año</option>
                <option value="Mas de un año">Mas de un año</option>
                   
               </select>
                {!! $errors->first('tiempo_primer_trabajo', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>


<hr>
<hr>
<hr>
<hr>
<hr>
<h3><center><b>13. ¿A que regimen juridico pertenece la empresa donde trabajas?</b></center></h3>


<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('regimen_trabajo') ? 'has-error' : ''}}">
            <label for="regimen_trabajo" class=" col-xs-8">Regimen Trabajo :</label>
                <select class="form-control" name="regimen_trabajo">
                    <option value="Selecciona">Selecciona</option>
                    <option value="Publico">Publico</option>
                    <option value="Privado">Privado</option>
                    
                </select>
                {!! $errors->first('regimen_trabajo', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>


<hr>
<hr>
<hr>
<hr>
<hr>
<h3><center><b>14. Tamaño de la empresa donde trabajas:</b></center></h3>


<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('tamaño_trabajo') ? 'has-error' : ''}}">
            <label for="tamaño_trabajo" class=" col-xs-8">Tamaño Trabajo :</label>
               <select class="form-control" name="tamaño_trabajo">
                <option value="Selecciona">Selecciona</option>
                <option value="Microempresa ( de 1 a 20 empleados)">Microempresa (de 1 a 20 empleados)</option>
                <option value="Pequeña (de 21 a 50 empleados)">Pequeña (de 21 a 50 empleados)</option>
                <option value="Mediana (entre 51 a 100 empleados)">Mediana (entre 51 a 100 empleados)</option>
                <option value="Grande (mas de 100 empleados)">Mas de 100 empleados</option>
                   
               </select>
                {!! $errors->first('tamaño_trabajo', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>


<hr>
<hr>
<hr>
<hr>
<hr>
<h3><center><b>15. Puesto actual:</b></center></h3>
<div class="col-md-12">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('puesto_actual') ? 'has-error' : ''}}">
            <label for="puesto_actual" class=" col-xs-8">Puesto Actual :</label>
                <select class="form-control" name="puesto_actual">
                    <option value="Selecciona">Selecciona</option>
                    <option value="Actividades no profesionales (oficios, actividades, ajenas a su profesion)">Actividades no profesionales (oficios, actividades, ajenas a su profesion)</option>
                    <option value="Operario / Auxiliar"> Operario / Auxiliar</option>
                    <option value="Tecnico especializado (Industrial o Administracion)">Tecnico especializado (Industrial o Administracion)</option>
                    <option value="Supervisor / Coordinador (mando medio)">Supervisor / Coordinador (mando medio)</option>
                    <option value="Director, gerente (mando superior)">Director, gerente (ando superior)</option>
                    <option value="Propietario">Propietario</option>                  
                </select>
                {!! $errors->first('puesto_actual', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<hr>
<hr>
<hr>
<hr>
<hr>
<hr>
<h3><center><b>16. ¿En que medida coincide el trabajo que tienes actualmente, con la formacion que recibes en la UT?</b></center></h3>

<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('coincidencia_formacion_ut') ? 'has-error' : ''}}">
            <label for="coincidencia_formacion_ut" class=" col-xs-8">Coincidencia Formacion UT :</label>
                <select class="form-control" name="coincidencia_formacion_ut">
                    <option value="Selecciona">Selecciona</option>
                    <option value="Totalmente">Totalmente</option>
                    <option value="Mucho">Mucho</option>
                    <option value="Poco">Poco</option>
                    <option value="Nada">Nada</option>
                    
                </select>
                {!! $errors->first('coincidencia_formacion_ut', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>


<hr>
<hr>
<hr>
<hr>
<hr>
<hr>
<h3><center><b>17. Ingreso mensual aproximado en tu empleo actual:</b></center></h3>

<div class="col-md-12">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('ingreso_mensual') ? 'has-error' : ''}}">
            <label for="ingreso_mensual" class=" col-xs-8">Ingreso Mensual :</label>
               <select class="form-control" name="ingreso_mensual">
                <option value="Selecciona">Selecciona</option>
                <option value="Hasta dos salarios minimos-> Menos de $3,741">Hasta dos salarios minimos-> Menos de $3,741</option>
                <option value="Mas de dos, hasta cuatro salarios minimos-> $3,741 a $7,480">Mas de dos, hasta cuatro salarios minimos-> $3,741 a $7,480</option>
                <option value="Mas de cuatro, hasta seis salarios minimos-> $7,481 a $11,219">Mas de cuatro, hasta seis salarios minimos-> $7,481 a $11,219</option>
                <option value="Mas de seis, hasta diez salarios minimos-> $11,220 a $18,699">Mas de seis, hasta diez salarios minimos-> $11,220 a $18,699</option>
                <option value="Mas de diez salarios minimos-> $18,699">Mas de diez salarios minimos-> $18,699</option>
                   
               </select>
                {!! $errors->first('ingreso_mensual', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<hr>
<hr>
<hr>
<hr>
<hr>
<hr>
<hr>
<h3><center><b>18. ¿Por que medio obtuviste tu trabajo actual?</b></center></h3>

<div class="col-md-12">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('medio_obtencion_trabajo') ? 'has-error' : ''}}">
            <label for="medio_obtencion_trabajo" class=" col-xs-8"><center></center></label>
               <select class="form-control" name="medio_obtencion_trabajo">
                <option value="Selecciona">Selecciona</option>
                <option value="Relacion con la empresa en la que realizaste en la estadia">Relacion con la empresa en la que realizaste en la estadia</option>
                <option value="Bolsa de trabajo de la UT">Bolsa de trabajo de la UT</option>
                <option value="Creaste tu propio negocio con apoyo de la incubadora de empresas dela UT">Creaste tu propio negocio con apoyo de la incubadora de empresas dela UT</option>
                <option value="Amigos o familiares">Amigos o familiares</option>
                <option value="Invitacion de una empresa o institucion">Invitacion de una empresa o institucion</option>
                <option value="Relaciones hechas en empleos anteriores">Relaciones hechas en empleos anteriores</option>
                <option value="Creaste tu negocio con tus medios propio">Creaste tu negocio con tus medios propio</option>
                <option value="Te integraste a un negocio familiar">Te integraste a un negocio familiar</option>
                <option value="Buscaste por tu cuenta en periodicos, internet, bolsas de trabajo">Buscaste por tu cuenta en periodicos, internet, bolsas de trabajo</option>
                   
               </select>
                {!! $errors->first('medio_obtencion_trabajo', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<hr>
<hr>
<hr>
<hr>
<hr>
<hr>
<hr>
<h3><center><b>En que tipo de instutucion estuduias actualmente</b></center></h3>


<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('estudias_actual') ? 'has-error' : ''}}">
            <label for="estudias_actual" class=" col-xs-8">Estudias Actual :</label>
                <input name="estudias_actual" type="text" class="form-control" id="estudias_actual" value="{{ $seguimiento_egresado->estudias_actual or ''}}">
                {!! $errors->first('estudias_actual', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>


<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('tipo_institucion_actual') ? 'has-error' : ''}}">
            <label for="tipo_institucion_actual" class=" col-xs-8">Tipo Institucion Actual :</label>
                <select class="form-control" name="tipo_institucion_actual">
                    <option value="Selecciona">Selecciona</option>
                    <option value="No estudio actualmente">No estudio actualmente</option>
                    <option value="No estudio actualmente pero planeo hacerlo en un futuro">No estudio actualmente pero planeo hacerlo en un futuro</option>
                    <option value="Una Universidad Tecnologica (licencia profesioanl)">Una Universidad Tecnologica (licencia profesioanl)</option>
                    <option value="Una Universidad Tecnologica (ingenieria o licenciatura)">Una Universidad Tecnologica (ingenieria o licenciatura)</option>
                    <option value="Universidad Politecnica">Universidad Politecnica</option>
                    <option value="Universidad publica estatal o federal">Universidad publica estatal o federal</option>
                    <option value="Universidad privada">Universidad privada</option>
                    <option value="UNAD: Universidad Abierta y a Distancia">UNAD: Universidad Abierta y a Distancia</option>
                    <option value="Estudios en el extrangero">Estudios en el extrangero</option>
                    
                </select>
                {!! $errors->first('tipo_institucion_actual', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>


<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('nombre_institucion_actual') ? 'has-error' : ''}}">
            <label for="nombre_institucion_actual" class=" col-xs-8">Nombre Institucion Actual :</label>
                <input name="nombre_institucion_actual" type="text" class="form-control" id="nombre_institucion_actual" value="{{ $seguimiento_egresado->nombre_institucion_actual or ''}}">
                {!! $errors->first('nombre_institucion_actual', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<hr>
<hr>
<hr>
<hr>
<hr>
<hr>
<h3><center><b>Que nivel academico has planeado estudiar de inmediato</b></center></h3>

<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('nivel_academico_planteado') ? 'has-error' : ''}}">
            <label for="nivel_academico_planteado" class=" col-xs-8">Nivel Academico Planeado :</label>
                <select class="form-control" name="nivel_academico_planteado">
                <option value="Selecciona">Selecciona</option>
                <option value="No planeo continuar estudiando de inmediato">No planeo continuar estudiando de inmediato</option>
                <option value="Especialidad">Especialidad</option>
                <option value="Licencia profesional">Licencia profesional</option>
                <option value="Ingenieria o licenciatura">Ingenierua o Licenciatura</option>
                <option value="Maestria">Maestria</option>
                <option value="Doctorado">Doctorado</option>
                    
                </select>
                {!! $errors->first('nivel_academico_planteado', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>


<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('nombre_institucion_actual') ? 'has-error' : ''}}">
            <label for="nombre_institucion_actual" class=" col-xs-8">Nombre Institucion Actual :</label>
                <input name="nombre_institucion_actual" type="text" class="form-control" id="nombre_institucion_actual" value="{{ $seguimiento_egresado->nombre_institucion_actual or ''}}">
                {!! $errors->first('nombre_institucion_actual', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<br>
<br>

</div>
 
</div>








<div class="form-group">
    <div class="col-md-offset-5 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Guardar' }}">
    </div>
</div>

</section>


