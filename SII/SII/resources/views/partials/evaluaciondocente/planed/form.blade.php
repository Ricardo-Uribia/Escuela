


<!--div class="form-group {{ $errors->has('idplaned') ? 'has-error' : ''}}">
    <label for="idplaned" class="col-md-4 control-label">{{ 'Idplaned' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="idplaned" type="number" id="idplaned" value="{{ $planed->idplaned or ''}}" >
        {!! $errors->first('idplaned', '<p class="help-block">:message</p>') !!}
    </div>
</div-->

<div class="form-group {{ $errors->has('claveplaned') ? 'has-error' : ''}}">
    <label for="claveplaned" class="col-md-4 control-label">{{ 'Clave Plan ED.' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="claveplaned" type="text" id="claveplaned" value="{{ $planed->claveplaned or ''}}" >
        {!! $errors->first('claveplaned', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
    <label for="nombre" class="col-md-4 control-label">{{ 'Nombre' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="nombre" type="text" id="nombre" value="{{ $planed->nombre or ''}}" >
        {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Crear' }}">
    </div>
</div>
