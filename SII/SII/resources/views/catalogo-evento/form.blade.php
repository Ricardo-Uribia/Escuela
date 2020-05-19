<!--div class="form-group {{ $errors->has('idCatalogoEvento') ? 'has-error' : ''}}">
    <label for="idCatalogoEvento" class="col-md-4 control-label">{{ 'Idcatalogoevento' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="idCatalogoEvento" type="number" id="idCatalogoEvento" value="{{ $catalogoevento->idCatalogoEvento or ''}}" >
        {!! $errors->first('idCatalogoEvento', '<p class="help-block">:message</p>') !!}
    </div>
</div-->

<div class="form-group {{ $errors->has('idCiclo') ? 'has-error' : ''}}">
    <label for="idCiclo" class="col-md-4 control-label">{{ 'ID Ciclo' }}</label>
    <div class="col-md-6">
        {!!Form::select('idCiclo', App\Models\Ciclo::all()->
        pluck('descripcion', 'idCiclo'), null,['class'=>'form-control'])!!}
        {!!$errors->first('idCiclo', '<p class="help-block"></p>')!!}
        
    </div>  
</div>

<div class="form-group {{ $errors->has('idEvento') ? 'has-error' : ''}}">
    <label for="idEvento" class="col-md-4 control-label">{{ 'ID Evento'}}</label>
    <div class="col-md-6">
          {!!Form::select('idEvento',App\TipoEvento::all()->
        pluck('TipoEvento','idEvento'),null,['class'=>'form-control'])!!}
        {!!$errors->first('idEvento', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('descripcion') ? 'has-error' : ''}}">
    <label for="descripcion" class="col-md-4 control-label">{{ 'Descripcion' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="descripcion" type="text" id="descripcion" value="{{ $catalogoevento->descripcion or ''}}" >
        {!! $errors->first('descripcion', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('categoria') ? 'has-error' : ''}}">
    <label for="categoria" class="col-md-4 control-label">{{ 'Categoria' }}</label>
    <div class="col-md-6">
       <select  class="form-control" name="categoria"> 
       <option value="SELECCIONA">SELECCIONA</option>
        <option value="AMATEUR">AMATEUR</option>
        <option value="INTERMEDIO">INTERMEDIO</option>
        <option value="SEMIPROFESIONAL">SEMIPROFESIONAL</option>
           
       </select>
        {!! $errors->first('categoria', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('fechaInicio') ? 'has-error' : ''}}">
    <label for="fechaInicio" class="col-md-4 control-label">{{ 'Fechainicio' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="fechaInicio" type="date" id="fechaInicio" value="{{ $catalogoevento->fechaInicio or ''}}" >
        {!! $errors->first('fechaInicio', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('fechaFinal') ? 'has-error' : ''}}">
    <label for="fechaFinal" class="col-md-4 control-label">{{ 'Fechafinal' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="fechaFinal" type="date" id="fechaFinal" value="{{ $catalogoevento->fechaFinal or ''}}" >
        {!! $errors->first('fechaFinal', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('horaInicio') ? 'has-error' : ''}}">
    <label for="horaInicio" class="col-md-4 control-label">{{ 'Horainicio' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="horaInicio" type="text" id="horaInicio" value="{{ $catalogoevento->horaInicio or ''}}" >
        {!! $errors->first('horaInicio', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('horaTermino') ? 'has-error' : ''}}">
    <label for="horaTermino" class="col-md-4 control-label">{{ 'Horatermino' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="horaTermino" type="text" id="horaTermino" value="{{ $catalogoevento->horaTermino or ''}}" >
        {!! $errors->first('horaTermino', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('idestatusEvento') ? 'has-error' : ''}}">
    <label for="idestatusEvento" class="col-md-4 control-label">{{ 'Id Estatus Evento'}}</label>
    <div class="col-md-6">
          {!!Form::select('idestatusEvento',App\EstatusEvento::all()->
        pluck('estatus','idestatusEvento'),null,['class'=>'form-control'])!!}
        {!!$errors->first('idestatusEvento', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('cupoMinimo') ? 'has-error' : ''}}">
    <label for="cupoMinimo" class="col-md-4 control-label">{{ 'Cupominimo' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="cupoMinimo" type="number" id="cupoMinimo" value="{{ $catalogoevento->cupoMinimo or ''}}" >
        {!! $errors->first('cupoMinimo', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('cupoMaximo') ? 'has-error' : ''}}">
    <label for="cupoMaximo" class="col-md-4 control-label">{{ 'Cupomaximo' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="cupoMaximo" type="number" id="cupoMaximo" value="{{ $catalogoevento->cupoMaximo or ''}}" >
        {!! $errors->first('cupoMaximo', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<!--div class="form-group {{ $errors->has('AlumnosIns') ? 'has-error' : ''}}">
    <label for="AlumnosIns" class="col-md-4 control-label">{{ 'Alumnos Incritos' }}</label>
        <div class="col-md-6">
            <input class="form-control" name="AlumnosIns" type="number" id="AlumnosIns" value="">

        </div>
    </div-->



<div class="form-group {{ $errors->has('titular') ? 'has-error' : ''}}">
    <label for="titular" class="col-md-4 control-label">{{ 'Titular' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="titular" type="text" id="titular" value="{{ $catalogoevento->titular or ''}}" >
        {!! $errors->first('titular', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('sede') ? 'has-error' : ''}}">
    <label for="sede" class="col-md-4 control-label">{{ 'Sede' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="sede" type="text" id="sede" value="{{ $catalogoevento->sede or ''}}" >
        {!! $errors->first('sede', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
