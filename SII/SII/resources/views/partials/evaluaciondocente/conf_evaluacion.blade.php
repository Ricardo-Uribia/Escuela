@extends('layouts.admin')
@section('principal')

<div class="row">
       <div class="col-lg-12">
              <div class="panel panel-default">
                   <div class="panel-heading ">
                       <center><h4>Configuracion de Evaluacion Docente</h4></center> 
                    </div>
               </div>

          <div>
          <a href="{{ url ('planed') }}"><button type="submit " class="col-md-2  btn btn-primary"  style="margin: 10px">Ver Plan</button></a>

          <a href="{{ url ('') }}"><button class="col-md-2 btn btn-primary" style="margin: 10px">Grupo</button></a>
          
          <a href="{{ url ('') }}"><button class="col-md-2 btn btn-primary" style="margin: 10px">Reporte</button></a>
          </div>

        </div>
 	</div>

@endsection