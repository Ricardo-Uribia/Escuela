<div class="form-group {{ $errors->has('idEvento') ?  'has-error' : ''}}">	
	<label for="idEvento" class="col-md-4 control-label">{{ 'idEvento' }}</label>
	<div class="col-md-6">
			<input class="form-control" name="idEvento" type="number" id="idEvento" value="{{ $tipoevento->idEvento or ''}}" readonly>
			{!! $errors->first('idEvento', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<br>
<br>
<br>

<div class="form-group {{ $errors->has('TipoEvento') ? 'has-error' : ''}}">
<label for="TipoEvento" class="col-md-4 control-label">{{ 'TipoEvento'}}</label>
	<div class="col-md-6">
		<input class="form-control" name="TipoEvento" type="text" id="TipoEvento" value="{{ $tipoevento->TipoEvento or ''}}" readonly>
		{!! $errors->first('TipoEvento', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<br>
<br>
<br>

