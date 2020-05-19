@extends('layouts.admin')

@section('principal')
    <div class="container">
        <div class="row">
          

            <div class="col-md-12"> 
                <div class="card">
                    <div class="card-header"> {{ $seguimiento_egresado->idSeguimientoegresado }}</div>
                    <div class="card-body">

            
                        <br/>
                        <br/>



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
        <div class="form-group {{ $errors->has('idSeguimintoegresados') ? 'has-error' : ''}}">
            <label for="idSeguimintoegresados" class=" col-xs-8">id Seguimiento Egresados :</label>
                <input name="idSeguimintoegresados" type="text" class="form-control" id="idSeguimientoegresados" value="{{ $seguimiento_egresado->idSeguimientoegresados or ''}}" readonly>
                {!! $errors->first('idSeguimintoegresados', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>




<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('idCiclo') ? 'has-error' : ''}}">
            <label for="idCiclo" class=" col-xs-8">Id Ciclo :</label>
                <input name="idCiclo" type="number" class="form-control" id="idCiclo" value="{{ $seguimiento_egresado->idCiclo or ''}}" readonly>
                {!! $errors->first('idCiclo', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>





<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('Nombre') ? 'has-error' : ''}}">
            <label for="nombre" class=" col-xs-8">nombre :</label>
                <input name="nombre" type="text" class="form-control" id="nombre" value="{{ $seguimiento_egresado->nombre or ''}}" readonly>
                {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
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
<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('id') ? 'has-error' : ''}}">
            <label for="id" class=" col-xs-8">Id Carrera :</label>
                <input name="id" type="number" class="form-control" id="id" value="{{ $seguimiento_egresado->id or ''}}" readonly>
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
                 <input name="estadocivil_egresado" type="text" class="form-control" id="estadocivil_egresado" value="{{ $seguimiento_egresado->estadocivil_egresado or ''}}" readonly>
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
              <input name="estatus_titulacion" type="text" class="form-control" id="estatus_titulacion" value="{{ $seguimiento_egresado->estatus_titulacion or ''}}" readonly>
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
                <input name="porcentaje_rubros" type="text" class="form-control" id="porcentaje_rubros" value="{{ $seguimiento_egresado->porcentaje_rubros or ''}}" readonly>
                {!! $errors->first('porcentaje_rubros', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('porcentaje_cual') ? 'has-error' : ''}}">
            <label for="porcentaje_cual" class="control-label col-xs-8">Porcentaje ¿cual? :</label>
            <input name="porcentaje_cual" type="text" class="form-control" id="porcentaje_cual" value="{{ $seguimiento_egresado->porcentaje_cual or ''}}" readonly>
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
            <input name="beca_principal" tupe="text" class="form-control" id="beca_principal" value="{{ $seguimiento_egresado->beca_principal or ''}}" readonly>
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
                <input name="telefono_casa_a" type="number" class="form-control" id="telefono_casa_a" value="{{ $seguimiento_egresado->telefono_casa_a or ''}}" readonly>
                {!! $errors->first('telefono_casa_a', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('celular_a') ? 'has-error' : ''}}">
            <label for="celular_a" class=" col-xs-8">Celular_a :</label>
                <input name="celular_a" type="number" class="form-control" id="celular_a" value="{{ $seguimiento_egresado->celular_a or ''}}" readonly>
                {!! $errors->first('celular_a', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('telefono_contacto_a') ? 'has-error' : ''}}">
            <label for="telefono_contacto_a" class=" col-xs-8">Telefono Casa :</label>
                <input name="telefono_contacto_a" type="number" class="form-control" id="telefono_contacto_a" value="{{ $seguimiento_egresado->telefono_contacto_a or ''}}" readonly>
                {!! $errors->first('telefono_contacto_a', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('parentezco_contacto_a') ? 'has-error' : ''}}">
            <label for="parentezco_contacto_a" class=" col-xs-8">Parentezco Contacto :</label>
                <input name="parentezco_contacto_a" type="text" class="form-control" id="parentezco_contacto_a" value="{{ $seguimiento_egresado->parentezco_contacto_a or ''}}" readonly>
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
                <input name="domicilio_particular" type="text" class="form-control" id="domicilio_particular" value="{{ $seguimiento_egresado->domicilio_particular or ''}}" readonly>
                {!! $errors->first('domicilio_particular', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('colonia_particular') ? 'has-error' : ''}}">
            <label for="colonia_particular" class=" col-xs-8">Colonia Paticular :</label>
                <input name="colonia_particular" type="text" class="form-control" id="colonia_particular" value="{{ $seguimiento_egresado->colonia_particular or ''}}" readonly>
                {!! $errors->first('colonia_particular', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('municipio_particular') ? 'has-error' : ''}}">
            <label for="municipio_particular" class=" col-xs-8">Municipio Particular :</label>
                <input name="municipio_particular" type="text" class="form-control" id="municipio_particular" value="{{ $seguimiento_egresado->municipio_particular or ''}}" readonly>
                {!! $errors->first('municipio_particular', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('estado_particular') ? 'has-error' : ''}}">
            <label for="estado_particular" class=" col-xs-8">Estado Particular :</label>
                <input name="estado_particular" type="text" class="form-control" id="estado_particular" value="{{ $seguimiento_egresado->estado_particular or ''}}" readonly>
                {!! $errors->first('estado_particular', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('nombre_empresa') ? 'has-error' : ''}}">
            <label for="nombre_empresa" class=" col-xs-8">Nombre Empresa :</label>
                <input name="nombre_empresa" type="text" class="form-control" id="nombre_empresa" value="{{ $seguimiento_egresado->nombre_empresa or ''}}" readonly>
                {!! $errors->first('nombre_empresa', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('domicilio_laboral') ? 'has-error' : ''}}">
            <label for="domicilio_laboral" class=" col-xs-8">Domicilio Laboral :</label>
                <input name="domicilio_laboral" type="text" class="form-control" id="domicilio_laboral" value="{{ $seguimiento_egresado->domicilio_laboral or ''}}" readonly>
                {!! $errors->first('domicilio_laboral', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('estado_laboral') ? 'has-error' : ''}}">
            <label for="estado_laboral" class=" col-xs-8">Estado Laboral :</label>
                <input name="estado_laboral" type="text" class="form-control" id="estado_laboral" value="{{ $seguimiento_egresado->estado_laboral or ''}}" readonly>
                {!! $errors->first('estado_laboral', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('domicilio_contacto') ? 'has-error' : ''}}">
            <label for="domicilio_contacto" class=" col-xs-8">Domicilio Contacto :</label>
                <input name="domicilio_contacto" type="text" class="form-control" id="domicilio_contacto" value="{{ $seguimiento_egresado->domicilio_contacto or ''}}" readonly>
                {!! $errors->first('domicilio_contacto', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('colonia_contacto') ? 'has-error' : ''}}">
            <label for="colonia_contacto" class=" col-xs-8">Colonia Contacto :</label>
                <input name="colonia_contacto" type="text" class="form-control" id="colonia_contacto" value="{{ $seguimiento_egresado->colonia_contacto or ''}}" readonly>
                {!! $errors->first('colonia_contacto', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('municipio_contacto') ? 'has-error' : ''}}">
            <label for="municipio_contacto" class=" col-xs-8">Municipio Contacto :</label>
                <input name="municipio_contacto" type="text" class="form-control" id="municipio_contacto" value="{{ $seguimiento_egresado->municipio_contacto or ''}}" readonly>
                {!! $errors->first('municipio_contacto', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('estado_contacto') ? 'has-error' : ''}}">
            <label for="estado_contacto" class=" col-xs-8">Estado Contacto :</label>
                <input name="estado_contacto" type="text" class="form-control" id="estado_contacto" value="{{ $seguimiento_egresado->estado_contacto or ''}}" readonly>
                {!! $errors->first('estado_contacto', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('parentezco_contacto') ? 'has-error' : ''}}">
            <label for="parentezco_contacto" class=" col-xs-8">Parentezco Contacto :</label>
                <input name="parentezco_contacto" type="text" class="form-control" id="parentezco_contacto" value="{{ $seguimiento_egresado->parentezco_contacto or ''}}" readonly>
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
                <input name="apartado_postal" type="text" class="form-control" id="apartado_postal" value="{{ $seguimiento_egresado->apartado_postal or ''}}" readonly>
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
                <input name="email_a" type="text" class="form-control" id="email_a" value="{{ $seguimiento_egresado->email_a or ''}}" readonly>
                {!! $errors->first('email_a', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('email2') ? 'has-error' : ''}}">
            <label for="email2" class=" col-xs-8">Email 2 :</label>
                <input name="email2" type="text" class="form-control" id="email2" value="{{ $seguimiento_egresado->email2 or ''}}" readonly>
                {!! $errors->first('email2', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('email_laboral') ? 'has-error' : ''}}">
            <label for="email_laboral" class=" col-xs-8">Email Laboral :</label>
                <input name="email_laboral" type="text" class="form-control" id="email_laboral" value="{{ $seguimiento_egresado->email_laboral or ''}}" readonly>
                {!! $errors->first('email_laboral', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('facebook_a') ? 'has-error' : ''}}">
            <label for="facebook_a" class=" col-xs-8">FacebookA :</label>
                <input name="facebook_a" type="text" class="form-control" id="facebook_a" value="{{ $seguimiento_egresado->facebook_a or ''}}" readonly>
                {!! $errors->first('facebook_a', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('twitter') ? 'has-error' : ''}}">
            <label for="twitter" class=" col-xs-8">Twitter :</label>
                <input name="twitter" type="text" class="form-control" id="twitter" value="{{ $seguimiento_egresado->twitter or ''}}" readonly>
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
                <input name="ref_fam1" type="text" class="form-control" id="ref_fam1" value="{{ $seguimiento_egresado->ref_fam1 or ''}}" readonly>
                {!! $errors->first('ref_fam1', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('tel_fam1') ? 'has-error' : ''}}">
            <label for="tel_fam1" class=" col-xs-8">Telefono Familiar 1 :</label>
                <input name="tel_fam1" type="number" class="form-control" id="tel_fam1" value="{{ $seguimiento_egresado->tel_fam1 or ''}}" readonly>
                {!! $errors->first('tel_fam1', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('email_fam1') ? 'has-error' : ''}}">
            <label for="email_fam1" class=" col-xs-8">Email Familiar 1 :</label>
                <input name="email_fam1" type="text" class="form-control" id="email_fam1" value="{{ $seguimiento_egresado->email_fam1 or ''}}" readonly>
                {!! $errors->first('email_fam1', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('ref_fam2') ? 'has-error' : ''}}">
            <label for="ref_fam2" class=" col-xs-8">Referencia Familiar 2 :</label>
                <input name="ref_fam2" type="text" class="form-control" id="ref_fam2" value="{{ $seguimiento_egresado->ref_fam2 or ''}}" readonly>
                {!! $errors->first('ref_fam2', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('tel_fam2') ? 'has-error' : ''}}">
            <label for="tel_fam2" class=" col-xs-8">Telefono Familiar 2 :</label>
                <input name="tel_fam2" type="number" class="form-control" id="tel_fam2" value="{{ $seguimiento_egresado->tel_fam2 or ''}}" readonly>
                {!! $errors->first('tel_fam2', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('email_fam2') ? 'has-error' : ''}}">
            <label for="email_fam2" class=" col-xs-8">Email Familiar 2 :</label>
                <input name="email_fam2" type="text" class="form-control" id="email_fam2" value="{{ $seguimiento_egresado->email_fam2 or ''}}" readonly>
                {!! $errors->first('email_fam2', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('ref_laboral1') ? 'has-error' : ''}}">
            <label for="ref_laboral1" class=" col-xs-8">Referencia Laboral 1 :</label>
                <input name="ref_laboral1" type="text" class="form-control" id="ref_laboral1" value="{{ $seguimiento_egresado->ref_laboral1 or ''}}" readonly>
                {!! $errors->first('ref_laboral1', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('tel_ref_laboral1') ? 'has-error' : ''}}">
            <label for="tel_ref_laboral1" class=" col-xs-8">Telefono Referencia Laboral 1 :</label>
                <input name="tel_ref_laboral1" type="number" class="form-control" id="tel_ref_laboral1" value="{{ $seguimiento_egresado->tel_ref_laboral1 or ''}}" readonly>
                {!! $errors->first('tel_ref_laboral1', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('email_ref_laboral1') ? 'has-error' : ''}}">
            <label for="email_ref_laboral1" class=" col-xs-8">Email Referencia Laboral 1 :</label>
                <input name="email_ref_laboral1" type="text" class="form-control" id="email_ref_laboral1" value="{{ $seguimiento_egresado->email_ref_laboral1 or ''}}" readonly>
                {!! $errors->first('email_ref_laboral1', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('ref_laboral2') ? 'has-error' : ''}}">
            <label for="ref_laboral2" class=" col-xs-8">Referencia Laboral 2 :</label>
                <input name="ref_laboral2" type="text" class="form-control" id="ref_laboral2" value="{{ $seguimiento_egresado->ref_laboral2 or ''}}" readonly>
                {!! $errors->first('ref_laboral2', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('tel_ref_laboral2') ? 'has-error' : ''}}">
            <label for="tel_ref_laboral2" class=" col-xs-8">Telefono Referencia Laboral :</label>
                <input name="tel_ref_laboral2" type="number" class="form-control" id="tel_ref_laboral2" value="{{ $seguimiento_egresado->tel_ref_laboral2 or ''}}" readonly>
                {!! $errors->first('tel_ref_laboral2', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('email_ref_laboral2') ? 'has-error' : ''}}">
            <label for="email_ref_laboral2" class=" col-xs-8">Email Referencia Laboral :</label>
                <input name="email_ref_laboral2" type="text" class="form-control" id="email_ref_laboral2" value="{{ $seguimiento_egresado->email_ref_laboral2 or ''}}" readonly>
                {!! $errors->first('email_ref_laboral2', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('ref_escolar1') ? 'has-error' : ''}}">
            <label for="ref_escolar1" class=" col-xs-8">Referencia Escolar 1 :</label>
                <input name="ref_escolar1" type="text" class="form-control" id="ref_escolar1" value="{{ $seguimiento_egresado->ref_escolar1 or ''}}" readonly>
                {!! $errors->first('ref_escolar1', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('tel_ref_escolar1') ? 'has-error' : ''}}">
            <label for="tel_ref_escolar1" class=" col-xs-8">Telefono Referencia Escolar 1 :</label>
                <input name="tel_ref_escolar1" type="number" class="form-control" id="tel_ref_escolar1" value="{{ $seguimiento_egresado->tel_ref_escolar1 or ''}}" readonly>
                {!! $errors->first('tel_ref_escolar1', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('email_ref_escolar1') ? 'has-error' : ''}}">
            <label for="email_ref_escolar1" class=" col-xs-8">Email Referencia Escolar 1 :</label>
                <input name="email_ref_escolar1" type="text" class="form-control" id="email_ref_escolar1" value="{{ $seguimiento_egresado->email_ref_escolar1 or ''}}" readonly>
                {!! $errors->first('email_ref_escolar1', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('ref_escolar2') ? 'has-error' : ''}}">
            <label for="ref_escolar2" class=" col-xs-8">Referencia Escolar 2 :</label>
                <input name="ref_escolar2" type="text" class="form-control" id="ref_escolar2" value="{{ $seguimiento_egresado->ref_escolar2 or ''}}" readonly>
                {!! $errors->first('ref_escolar2', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('tel_ref_escolar2') ? 'has-error' : ''}}">
            <label for="tel_ref_escolar2" class=" col-xs-8">Telefono Referencia Escolar 2 :</label>
                <input name="tel_ref_escolar2" type="number" class="form-control" id="tel_ref_escolar2" value="{{ $seguimiento_egresado->tel_ref_escolar2 or ''}}" readonly>
                {!! $errors->first('tel_ref_escolar2', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('email_ref_escolar2') ? 'has-error' : ''}}">
            <label for="email_ref_escolar2" class=" col-xs-8">Email Referecnia Escolar 2 :</label>
                <input name="email_ref_escolar2" type="text" class="form-control" id="email_ref_escolar2" value="{{ $seguimiento_egresado->email_ref_escolar2 or ''}}" readonly>
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
                <input name="razon_no_trabajo" type="text" class="form-control" id="razon_no_trabajo" value="{{ $seguimiento_egresado->razon_no_trabajo or ''}}" readonly>
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
                <input name="nombre_jefe" type="text" class="form-control" id="nombre_jefe" value="{{ $seguimiento_egresado->nombre_jefe or ''}}" readonly>
                {!! $errors->first('nombre_jefe', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('puesto_jefe') ? 'has-error' : ''}}">
            <label for="puesto_jefe" class=" col-xs-8">Puesto Jefe :</label>
                <input name="puesto_jefe" type="text" class="form-control" id="puesto_jefe" value="{{ $seguimiento_egresado->puesto_jefe or ''}}" readonly>
                {!! $errors->first('puesto_jefe', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('telefono_jefe') ? 'has-error' : ''}}">
            <label for="telefono_jefe" class=" col-xs-8">Telefono Jefe :</label>
                <input name="telefono_jefe" type="number" class="form-control" id="telefono_jefe" value="{{ $seguimiento_egresado->telefono_jefe or ''}}" readonly>
                {!! $errors->first('telefono_jefe', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('extension_jefe') ? 'has-error' : ''}}">
            <label for="extension_jefe" class=" col-xs-8">Extension Jefe :</label>
                <input name="extension_jefe" type="text" class="form-control" id="extension_jefe" value="{{ $seguimiento_egresado->extension_jefe or ''}}" readonly>
                {!! $errors->first('extension_jefe', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('email_jefe') ? 'has-error' : ''}}">
            <label for="email_jefe" class=" col-xs-8">Email Jefe :</label>
                <input name="email_jefe" type="text" class="form-control" id="email_jefe" value="{{ $seguimiento_egresado->email_jefe or ''}}" readonly>
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
            <input name="tiempo_primer_trabajo" type="text" class="form-control" id="tiempo_primer_trabajo" value="{{ $seguimiento_egresado->tiempo_primer_trabajo or ''}}" readonly>
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
             <input name="regimen_trabajo" type="text" class="form-control" id="regimen_trabajo" value="{{ $seguimiento_egresado->regimen_trabajo or ''}}" readonly>
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
            <input name="tamaño_trabajo" type="text" class="form-control" id="tamaño_trabajo" value="{{ $seguimiento_egresado->tamaño_trabajo or ''}}" readonly>
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
            <input name="puesto_actual" type="text" class="form-control" id="puesto_actual" value="{{ $seguimiento_egresado->puesto_actual or ''}}" readonly>
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
             <input name="coincidencia_formacion_ut" type="text" class="form-control" id="coincidencia_formacion_ut" value="{{ $seguimiento_egresado->coincidencia_formacion_ut}}" readonly>
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
              <inupt name="ingreso_mensual" type="text" class="form-control" id="ingreso_mensual" value="{{ $seguiento_egresado->ingreso_mensual or ''}}" readonly>
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
                <input name="medio_obtencion_trabajo" type="text" class="form-control" id="medio_obtencion_trabajo" value="{{ $seguimiento_egresado->medio_obtencion_trabajo or ''}}" readonly>
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
                <input name="estudias_actual" type="text" class="form-control" id="estudias_actual" value="{{ $seguimiento_egresado->estudias_actual or ''}}" readonly>
                {!! $errors->first('estudias_actual', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>


<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('tipo_institucion_actual') ? 'has-error' : ''}}">
            <label for="tipo_institucion_actual" class=" col-xs-8">Tipo Institucion Actual :</label>
                <input name="tipo_institucion_actual" type="text" class="form-control" id="tipo_institucion_actual" value="{{ $seguimiento_egresado->tipo_institucion_actual or ''}}" readonly>
                {!! $errors->first('tipo_institucion_actual', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>


<div class="col-md-4">
    <div class="was-validated">
        <div class="form-group {{ $errors->has('nombre_institucion_actual') ? 'has-error' : ''}}">
            <label for="nombre_institucion_actual" class=" col-xs-8">Nombre Institucion Actual :</label>
                <input name="nombre_institucion_actual" type="text" class="form-control" id="nombre_institucion_actual" value="{{ $seguimiento_egresado->nombre_institucion_actual or ''}}" readonly>
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
                <input name="nombre_institucion_actual" type="text" class="form-control" id="nombre_institucion_actual" value="{{ $seguimiento_egresado->nombre_institucion_actual or ''}}" readonly>
                {!! $errors->first('nombre_institucion_actual', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<br>
<br>












</section>






@endsection
