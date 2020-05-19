<div class="form-group {{ $errors->has('idplaned') ? 'has-error' : ''}}">
    <label for="claveplaned" class="col-md-2 control-label">{{ 'ClavePlaned' }}</label>
<div class="col-md-4">
   <select  name="idplaned" class="form-control">
    @foreach(App\Models\Planed::all() as $planed)
       <option value="{!!$planed->idplaned!!}">{{$planed->claveplaned}}</option>
        @endforeach
   </select>
</div>
</div>

<div class="form-group {{ $errors->has('idplaned') ? 'has-error' : ''}}">
    <label for="claveplaned" class="col-md-2 control-label">{{ 'Confirmar ClavePlaned' }}</label>
<div class="col-md-4">
   <select  name="claveplaned" class="form-control">
    @foreach(App\Models\Planed::all() as $planed)
       <option value="{!!$planed->claveplaned!!}">{{$planed->claveplaned}}</option>
        @endforeach
   </select>
</div>
</div>

<div class="form-group {{ $errors->has('numero') ? 'has-error' : ''}}">
    <label for="numero" class="col-md-2 control-label">{{ 'Numero' }}</label>
    <div class="col-md-2">
        <input class="form-control" name="numero" type="number" id="numero" value="{{ $preguntased->numero or ''}}" >
        {!! $errors->first('numero', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group {{ $errors->has('clavepregunta') ? 'has-error' : ''}}">
    <label for="clavepregunta" class="col-md-2 control-label">{{ 'Clavepregunta' }}</label>
    <div class="col-md-4">
        <input class="form-control" name="clavepregunta" type="text" id="clavepregunta" value="{{ $preguntased->clavepregunta or ''}}" >
        {!! $errors->first('clavepregunta', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('preguntas') ? 'has-error' : ''}}">
    <label for="preguntas" class="col-md-2 control-label">{{ 'Pregunta' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="preguntas" type="text" id="preguntas" value="{{ $preguntased->preguntas or ''}}" >
        {!! $errors->first('preguntas', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Crear' }}">
    </div>
</div>

