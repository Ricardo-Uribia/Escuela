<div class="form-group {{ $errors->has('idcatalogo_villas') ? 'has-error' : ''}}">
    <label for="idcatalogo_villas" class="col-md-4 control-label">{{ 'Idcatalogo Villas' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="idcatalogo_villas" type="number" id="idcatalogo_villas" value="{{ $catalogo_villa->idcatalogo_villas or ''}}" readonly>
        {!! $errors->first('idcatalogo_villas', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('idCiclo') ? 'has-error' : ''}}">
    <label for="idCiclo" class="col-md-4 control-label">{{ 'Idciclo' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="idCiclo" type="number" id="idCiclo" value="{{ $catalogo_villa->idCiclo or ''}}" readonly>
        {!! $errors->first('idCiclo', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('idgrupos_villas') ? 'has-error' : ''}}">
    <label for="idgrupos_villas" class="col-md-4 control-label">{{ 'Idgrupos Villas' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="idgrupos_villas" type="number" id="idgrupos_villas" value="{{ $catalogo_villa->idgrupos_villas or ''}}" readonly>
        {!! $errors->first('idgrupos_villas', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('genero') ? 'has-error' : ''}}">
    <label for="genero" class="col-md-4 control-label">{{ 'Genero' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="genero" type="text" id="genero" value="{{ $catalogo_villa->genero or ''}}" readonly>
        {!! $errors->first('genero', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('cupoMaximo') ? 'has-error' : ''}}">
    <label for="cupoMaximo" class="col-md-4 control-label">{{ 'Cupomaximo' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="cupoMaximo" type="text" id="cupoMaximo" value="{{ $catalogo_villa->cupoMaximo or ''}}" readonly>
        {!! $errors->first('cupoMaximo', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('responsableVilla') ? 'has-error' : ''}}">
    <label for="responsableVilla" class="col-md-4 control-label">{{ 'Responsablevilla' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="responsableVilla" type="text" id="responsableVilla" value="{{ $catalogo_villa->responsableVilla or ''}}" readonly>
        {!! $errors->first('responsableVilla', '<p class="help-block">:message</p>') !!}
    </div>
</div>


