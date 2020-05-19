@extends ('layouts.admin')
@section ('principal')

<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Estado de Cuenta del Alumnado</h3>	
		@include('admin.cobranza.search')
	</div>
</div>

<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">     
      <div class="row"> 
            <div >
                  <div class="panel-body">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                              <table class="table ">
                                  @if($query!="")
                                  	<td>{{$alumno[0]->nombre}}</td>
                                    @foreach ($alumno as $ven)
								        <tr>
								          <tr class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
								          	<td>{{ $ven->descripcion}}</td>
								          </tr>
        								</tr>
        							@endforeach
                                  @endif
                              </table>
                        </div>
                  </div>
            </div>    
      </div>  
    </div>
     @if($query!="")
    <span class="btn btn-success"><p>Este alumno tiene hasta la fecha {{count($alumno)}} pagos realizados con éxito</p></span>
    @endif
    </div>

@endsection