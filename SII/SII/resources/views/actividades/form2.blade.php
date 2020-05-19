<!--div class="form-group {{ $errors->has('idactividades') ? 'has-error' : ''}}">
    <label for="idactividades" class="col-md-4 control-label">{{ 'Idactividades' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="idactividades" type="number" id="idactividades" value="{{ $actividade->idactividades or ''}}" >
        {!! $errors->first('idactividades', '<p class="help-block">:message</p>') !!}
    </div>
</div-->

<div class="form-group {{ $errors->has('idCatalogoEvento') ? 'has-error' : ''}}">
    <label for="idCatalogoEvento" class="col-md-4 control-label">{{ 'id Catalogo Evento' }}</label>
    <div class="col-md-6">
         <input class="form-control" name="idCatalogoEvento" type="number" id="idCatalogoEvento" value="{{ $actividade->idCatalogoEvento or ''}}" readonly>
        {!! $errors->first('idCatalogoEvento', '<p class="help-block">:message</p>') !!}
    </div> 
</div> 

<div class="form-group {{ $errors->has('idCiclo') ? 'has-error' : ''}}">
    <label for="idCiclo" class="col-md-4 control-label">{{ 'id Ciclo' }}</label>
    <div class="col-md-6">
         <input class="form-control" name="idCiclo" type="number" id="idCiclo" value="{{ $actividade->idCiclo or ''}}" readonly>
        {!! $errors->first('idCiclo', '<p class="help-block">:message</p>') !!}
    </div> 
</div> 

<div class="form-group {{ $errors->has('idEvento') ? 'has-error' : ''}}">
    <label for="idEvento" class="col-md-4 control-label">{{ 'id Evento' }}</label>
    <div class="col-md-6">
         <input class="form-control" name="idEvento" type="number" id="idEvento" value="{{ $actividade->idEvento or ''}}" readonly>
        {!! $errors->first('idEvento', '<p class="help-block">:message</p>') !!}
    </div> 
</div> 

<div class="form-group {{ $errors->has('id_alumno') ? 'has-error' : ''}}">
    <label for="id_alumno" class="col-md-4 control-label">{{ 'id Alumno' }}</label>
    <div class="col-md-6">
         <input class="form-control" name="id_alumno" type="number" id="id_alumno" value="{{ $actividade->id_alumno or ''}}" readonly>
        {!! $errors->first('id_alumno', '<p class="help-block">:message</p>') !!}
    </div> 
</div>

<!--div class="form-group {{ $errors->has('id_grupo') ? 'has-error' : ''}}">
    <label for="id_grupo" class="col-md-4 control-label">{{ 'id Grupo' }}</label>
    <div class="col-md-6">
         <input class="form-control" name="id_grupo" type="number" id="id_grupo" value="{{ $actividade->id_grupo or ''}}" >
        {!! $errors->first('id_grupo', '<p class="help-block">:message</p>') !!}
    </div> 
</div-->

<div class="form-group {{ $errors->has('descripcion') ? 'has-error' : ''}}">
    <label for="descripcion" class="col-md-4 control-label">{{ 'Descripcion' }}</label>
    <div class="col-md-6">
         <input class="form-control" name="descripcion" type="text" id="descripcion" value="{{ $actividade->descripcion or ''}}" readonly>
        {!! $errors->first('descripcion', '<p class="help-block">:message</p>') !!}
    </div> 
</div>



<!--div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div-->
