<!--div class="form-group {{ $errors->has('idgrupos_villas') ? 'has-error' : ''}}">
    <label for="idgrupos_villas" class="col-md-4 control-label">{{ 'Idgrupos Villas' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="idgrupos_villas" type="number" id="idgrupos_villas" value="{{ $grupos_villa->idgrupos_villas or ''}}" >
        {!! $errors->first('idgrupos_villas', '<p class="help-block">:message</p>') !!}
    </div>
</div-->

<div class="form-group {{ $errors->has('nombreVilla') ? 'has-error' : ''}}">
    <label for="nombreVilla" class="col-md-4 control-label">{{ 'Nombre villa' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="nombreVilla" type="text" id="nombreVilla" value="{{ $grupos_villa->nombreVilla or ''}}" >
        {!! $errors->first('nombreVilla', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
