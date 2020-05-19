<!--div class="form-group {{ $errors->has('idalumnos_villas') ? 'has-error' : ''}}">
    <label for="idalumnos_villas" class="col-md-4 control-label">{{ 'id alumno villa' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="idalumnos_villas" type="number" id="idalumnos_villas" value="{{ $alumnos_villa->idalumnos_villas or ''}}" >
        {!! $errors->first('idalumnos_villas', '<p class="help-block">:message</p>') !!}
    </div>
</div-->

<center><h3>Registro para alojamiento en las villas</h3></center>

<br>
<br>

<div class="form-group {{ $errors->has('idCiclo') ? 'has-error' : ''}}">
    <label for="idCiclo" class="col-md-4 control-label">{{ 'ID Ciclo' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="idCiclo" type="number" id="idCiclo" value="{{ $alumnos_villa->idCiclo or ''}}" >
        {!! $errors->first('idCiclo', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('idcatalogo_villas') ? 'has-error' : ''}}">
    <label for="idcatalogo_villas" class="col-md-4 control-label">{{ 'ID Catalogo villas' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="idcatalogo_villas" type="number" id="idcatalogo_villas" value="{{ $alumnos_villa->idcatalogo_villas or ''}}" >
        {!! $errors->first('idcatalogo_villas', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('idalumno') ? 'has-error' : ''}}">
    <label for="idalumno" class="col-md-4 control-label">{{ 'ID alumno' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="idalumno" type="number" id="idalumno" value="{{ $alumnos_villa->idalumno or ''}}" >
        {!! $errors->first('idalumno', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('idgrupo') ? 'has-error' : ''}}">
    <label for="idgrupo" class="col-md-4 control-label">{{ 'ID Grupo' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="idgrupo" type="number" id="idgrupo" value="{{ $alumnos_villa->idgrupo or ''}}" >
        {!! $errors->first('idgrupo', '<p class="help-block">:message</p>') !!}
    </div>
</div>




<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Guardar Registro' }}">
    </div>
</div>
