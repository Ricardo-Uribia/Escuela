<div class="form-group {{ $errors->has('idProfesor') ? 'has-error' : ''}}">
    <label for="idProfesor" class="control-label">{{ 'Idprofesor' }}</label>
    <input class="form-control" name="idProfesor" type="number" id="idProfesor" value="{{ isset($profesor->idProfesor) ? $profesor->idProfesor : ''}}" >
    {!! $errors->first('idProfesor', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('idEmpleado') ? 'has-error' : ''}}">
    <label for="Nombres" class="control-label">{{ 'Idempleado' }}</label>
    {!!Form::select('idEmpleado',App\Models\Empleado::all()->
        pluck('NombreEmpleado'),null,['class'=>'form-control'])!!}
        {!!$errors->first('idEmpleado', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('cargo') ? 'has-error' : ''}}">
    <label for="" class="control-label">{{ 'tipoProfesor' }}</label> 
    {!!Form::select('idEmpleado',App\Models\Empleado::all()->
        pluck('cargo'),null,['class'=>'form-control'])!!}
        {!!$errors->first('cargo', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'guardar como profesor' }}">
</div>
