<!--div class="form-group {{ $errors->has('idcatalogo_villas') ? 'has-error' : ''}}">
    <label for="idcatalogo_villas" class="col-md-4 control-label">{{ 'Idcatalogo Villas' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="idcatalogo_villas" type="number" id="idcatalogo_villas" value="{{ $catalogo_villa->idcatalogo_villas or ''}}" >
        {!! $errors->first('idcatalogo_villas', '<p class="help-block">:message</p>') !!}
    </div>
</div-->
<div class="form-group {{ $errors->has('idCiclo') ? 'has-error' : ''}}">
    <label for="idCiclo" class="col-md-4 control-label">{{ 'Idciclo' }}</label>
    <div class="col-md-6">
       {!!Form::select('idCiclo', App\Models\Ciclo::all()->
        pluck('descripcion', 'idCiclo'), null,['class'=>'form-control'])!!}
        {!! $errors->first('idCiclo', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('idgrupos_villas') ? 'has-error' : ''}}">
    <label for="idgrupos_villas" class="col-md-4 control-label">{{ 'Idgrupos Villas' }}</label>
    <div class="col-md-6">
        {!!Form::select('idgrupos_villas', App\grupos_villa::all()->
        pluck('nombreVilla', 'idgrupos_villas'), null,['class'=>'form-control'])!!}
        {!! $errors->first('idgrupos_villas', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('genero') ? 'has-error' : ''}}">
    <label for="genero" class="col-md-4 control-label">{{ 'Genero' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="genero" type="text" id="genero" value="{{ $catalogo_villa->genero or ''}}" >
        {!! $errors->first('genero', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('cupoMaximo') ? 'has-error' : ''}}">
    <label for="cupoMaximo" class="col-md-4 control-label">{{ 'Cupomaximo' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="cupoMaximo" type="text" id="cupoMaximo" value="{{ $catalogo_villa->cupoMaximo or ''}}" >
        {!! $errors->first('cupoMaximo', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('responsableVilla') ? 'has-error' : ''}}">
    <label for="responsableVilla" class="col-md-4 control-label">{{ 'Responsablevilla' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="responsableVilla" type="text" id="responsableVilla" value="{{ $catalogo_villa->responsableVilla or ''}}" >
        {!! $errors->first('responsableVilla', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
