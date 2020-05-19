<div class="form-group {{ $errors->has('idalumnosegresados') ? 'has-error' : ''}}">
    <label for="idalumnosegresados" class="col-md-4 control-label">{{ 'Idalumnosegresados' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="idalumnosegresados" type="number" id="idalumnosegresados" value="{{ $alumnosegresado->idalumnosegresados or ''}}" >
        {!! $errors->first('idalumnosegresados', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
    <label for="nombre" class="col-md-4 control-label">{{ 'Nombre' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="nombre" type="text" id="nombre" value="{{ $alumnosegresado->nombre or ''}}" >
        {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('carrera') ? 'has-error' : ''}}">
    <label for="carrera" class="col-md-4 control-label">{{ 'Carrera' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="carrera" type="text" id="carrera" value="{{ $alumnosegresado->carrera or ''}}" >
        {!! $errors->first('carrera', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('matricula') ? 'has-error' : ''}}">
    <label for="matricula" class="col-md-4 control-label">{{ 'Matricula' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="matricula" type="number" id="matricula" value="{{ $alumnosegresado->matricula or ''}}" >
        {!! $errors->first('matricula', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('grupo') ? 'has-error' : ''}}">
    <label for="grupo" class="col-md-4 control-label">{{ 'Grupo' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="grupo" type="text" id="grupo" value="{{ $alumnosegresado->grupo or ''}}" >
        {!! $errors->first('grupo', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('estatus') ? 'has-error' : ''}}">
    <label for="estatus" class="col-md-4 control-label">{{ 'Estatus' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="estatus" type="text" id="estatus" value="{{ $alumnosegresado->estatus or ''}}" >
        {!! $errors->first('estatus', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<h1>Datos personales del alumno</h1>


<div class="form-group {{ $errors->has('numero') ? 'has-error' : ''}}">
    <label for="numero" class="col-md-4 control-label">{{ 'Numero' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="numero" type="text" id="numero" value="{{ $alumnosegresado->numero or ''}}" >
        {!! $errors->first('numero', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('estado') ? 'has-error' : ''}}">
    <label for="estado" class="col-md-4 control-label">{{ 'Estado' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="estado" type="text" id="estado" value="{{ $alumnosegresado->estado or ''}}" >
        {!! $errors->first('estado', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('municipio') ? 'has-error' : ''}}">
    <label for="municipio" class="col-md-4 control-label">{{ 'Municipio' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="municipio" type="text" id="municipio" value="{{ $alumnosegresado->municipio or ''}}" >
        {!! $errors->first('municipio', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('lugar') ? 'has-error' : ''}}">
    <label for="lugar" class="col-md-4 control-label">{{ 'Lugar' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="lugar" type="text" id="lugar" value="{{ $alumnosegresado->lugar or ''}}" >
        {!! $errors->first('lugar', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('edad') ? 'has-error' : ''}}">
    <label for="edad" class="col-md-4 control-label">{{ 'Edad' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="edad" type="text" id="edad" value="{{ $alumnosegresado->edad or ''}}" >
        {!! $errors->first('edad', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('direccion') ? 'has-error' : ''}}">
    <label for="direccion" class="col-md-4 control-label">{{ 'Direccion' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="direccion" type="text" id="direccion" value="{{ $alumnosegresado->direccion or ''}}" >
        {!! $errors->first('direccion', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<h2>Documentos necesarios para estadias</h2>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
