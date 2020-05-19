@extends('layouts.admin')

@section('principal')
    <div class="container">
        <div class="row">
         

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"></div>
                    <div class="card-body">

                        <a href="{{ url('eventoacti')}}" class="btn btn-warning btn-sm" title="Add New CatalogoEvento">
                                <i class="" aria-hidden="true"></i> Eventos ACTIVOS
                        </a>
                        <a href="{{ url('/catalogo-evento/' . $catalogoevento->idCatalogoEvento . '/edit') }}" title="Edit CatalogoEvento"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </button></a>

                        <form method="POST" action="{{ url('catalogoevento' . '/' . $catalogoevento->idCatalogoEvento) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete CatalogoEvento" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> </button>
                        </form>
                        <br/>
                        <br/>

<div class="form-group {{ $errors->has('idCatalogoEvento') ? 'has-error' : ''}}">
    <label for="idCatalogoEvento" class="col-md-4 control-label">{{ 'Idcatalogoevento' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="idCatalogoEvento" type="number" id="idCatalogoEvento" value="{{ $catalogoevento->idCatalogoEvento or ''}}" readonly>
        {!! $errors->first('idCatalogoEvento', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<br/>
<br/>

<div class="form-group {{ $errors->has('idestatusEvento') ? 'has-error' : ''}}">
    <label for="idestatusEvento" class="col-md-4 control-label">{{ 'Estatusevento' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="idestatusEvento" type="text" id="idestatusEvento" value="{{ $catalogoevento->idestatusEvento or ''}}" readonly>
        {!! $errors->first('idestatusEvento', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<br/>
<br/>



<div class="form-group {{ $errors->has('idCiclo') ? 'has-error' : ''}}">
    <label for="idCiclo" class="col-md-4 control-label">{{ 'Ciclo Cuatrimestre' }}</label>
    <div class="col-md-6">
       <input class="form-control" name="idCiclo" type="number" id="idCiclo" value="{{ $catalogoevento->idCiclo or ''}}" readonly>
        {!!$errors->first('idCiclo', '<p class="help-block"></p>')!!}
        
    </div>  
</div>
<br/>
<br/>

<div class="form-group {{ $errors->has('idEvento') ? 'has-error' : ''}}">
    <label for="idEvento" class="col-md-4 control-label">{{ 'Tipo Evento'}}</label>
    <div class="col-md-6">
       <input class="form-control" name="idEvento" type="number" id="idEvento" value="{{ $catalogoevento->idEvento or ''}}" readonly>
        {!!$errors->first('idEvento', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<br/>
<br/>




<div class="form-group {{ $errors->has('descripcion') ? 'has-error' : ''}}">
    <label for="descripcion" class="col-md-4 control-label">{{ 'Descripcion del evento' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="descripcion" type="text" id="descripcion" value="{{ $catalogoevento->descripcion or ''}}" readonly>
        {!! $errors->first('descripcion', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<br/>
<br/>

<div class="form-group {{ $errors->has('categoria') ? 'has-error' : ''}}">
    <label for="categoria" class="col-md-4 control-label">{{ 'Categoria' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="categoria" type="text" id="categoria" value="{{ $catalogoevento->categoria or ''}}" readonly>
        {!! $errors->first('categoria', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<br/>
<br/>

<div class="form-group {{ $errors->has('fechaInicio') ? 'has-error' : ''}}">
    <label for="fechaInicio" class="col-md-4 control-label">{{ 'Inicia' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="fechaInicio" type="date" id="fechaInicio" value="{{ $catalogoevento->fechaInicio or ''}}" readonly>
        {!! $errors->first('fechaInicio', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<br/>
<br/>

<div class="form-group {{ $errors->has('fechaFinal') ? 'has-error' : ''}}">
    <label for="fechaFinal" class="col-md-4 control-label">{{ 'Termina' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="fechaFinal" type="date" id="fechaFinal" value="{{ $catalogoevento->fechaFinal or ''}}" readonly>
        {!! $errors->first('fechaFinal', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<br/>
<br/>

<div class="form-group {{ $errors->has('horaInicio') ? 'has-error' : ''}}">
    <label for="horaInicio" class="col-md-4 control-label">{{ 'Hora de inicio' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="horaInicio" type="text" id="horaInicio" value="{{ $catalogoevento->horaInicio or ''}}" readonly>
        {!! $errors->first('horaInicio', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<br/>
<br/>

<div class="form-group {{ $errors->has('horaTermino') ? 'has-error' : ''}}">
    <label for="horaTermino" class="col-md-4 control-label">{{ 'Hora de termino' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="horaTermino" type="text" id="horaTermino" value="{{ $catalogoevento->horaTermino or ''}}" readonly>
        {!! $errors->first('horaTermino', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<br/>
<br/>

<div class="form-group {{ $errors->has('cupoMinimo') ? 'has-error' : ''}}">
    <label for="cupoMinimo" class="col-md-4 control-label">{{ 'Cupo minimo' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="cupoMinimo" type="number" id="cupoMinimo" value="{{ $catalogoevento->cupoMinimo or ''}}" readonly>
        {!! $errors->first('cupoMinimo', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<br/>
<br/>

<div class="form-group {{ $errors->has('cupoMaximo') ? 'has-error' : ''}}">
    <label for="cupoMaximo" class="col-md-4 control-label">{{ 'Cupo maximo' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="cupoMaximo" type="number" id="cupoMaximo" value="{{ $catalogoevento->cupoMaximo or ''}}" readonly>
        {!! $errors->first('cupoMaximo', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<br/>
<br/>


<div class="form-group {{ $errors->has('titular') ? 'has-error' : ''}}">
    <label for="titular" class="col-md-4 control-label">{{ 'Titular' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="titular" type="text" id="titular" value="{{ $catalogoevento->titular or ''}}" readonly>
        {!! $errors->first('titular', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<br/>
<br/>

<div class="form-group {{ $errors->has('sede') ? 'has-error' : ''}}">
    <label for="sede" class="col-md-4 control-label">{{ 'Sede' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="sede" type="text" id="sede" value="{{ $catalogoevento->sede or ''}}" readonly>
        {!! $errors->first('sede', '<p class="help-block">:message</p>') !!}
    </div>
</div>




                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
