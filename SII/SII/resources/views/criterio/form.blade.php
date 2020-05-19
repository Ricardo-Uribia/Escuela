<div class="form-group {{ $errors->has('idMomento') ? 'has-error' : ''}}">
  <label for="idMomento" class="control-label">{{'Momento'}}</label>
  <div class="col-md-14">
   <select name="idMomento" class="form-control">
       <option>Seleccione</option>
    @foreach(App\Momento::all() as $omomento)
       <option value="{!!$omomento->idMomento!!}">{{$omomento->momento}}</option>
        @endforeach
   </select>
 </div>
  
</div>

<div class="form-group {{ $errors->has('clave_crit') ? 'has-error' : ''}}">
    <label for="clave_crit" class="control-label">{{ 'Clave Crit' }}</label>
    <input class="form-control" name="clave_crit" type="text" id="clave_crit" value="{{ isset($criterio->clave_crit) ? $criterio->clave_crit : ''}}" >
    {!! $errors->first('clave_crit', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('criterio') ? 'has-error' : ''}}">
    <label for="criterio" class="control-label">{{ 'Criterio' }}</label>
    <input class="form-control" name="criterio" type="text" id="criterio" value="{{ isset($criterio->criterio) ? $criterio->criterio : ''}}" >
    {!! $errors->first('criterio', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'Actualizar' ? 'Actualizar' : 'Guardar' }}">
</div>
