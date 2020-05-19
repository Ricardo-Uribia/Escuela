
<div class="form-group {{ $errors->has('momento') ? 'has-error' : ''}}">
    <label for="momento" class="control-label">{{ 'Momento' }}</label>
    <input class="form-control" name="momento" type="text" id="momento" value="{{ isset($momento->momento) ? $momento->momento : ''}}" >
    {!! $errors->first('momento', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'Actualizar' ? 'Actualizar' : 'Guardar' }}">
</div>
