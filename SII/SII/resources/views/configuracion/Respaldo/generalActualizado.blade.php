@extends('layouts.admin')
@section('principal')

<div class="row">
  <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
    <h3>Panel de Configuaración</h3>
  </div>
 
</div>

 <div class="panel-body">
    @if(session('Notificacion') > 0){
      <div class="alert alert-success">
        {{session('Notificacion')}}
      </div>
    @endif

    @if(count($errors) > 0)
      <div class="alert alert-danger">
        <ul>
          @foreach($errors->all() as $error)
            <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>
    @endif
  </div>

<div class="tab-content">
    <div class="col-md-12 contenedor-datos">
        <div role="tabpanel">
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#nivel" aria-controls="nivel" data-toggle="tab" role="tab">Niveles</a></li>
            <li role="presentation"><a href="#ciclo" aria-controls="ciclo" data-toggle="tab" role="tab">Ciclos</a></li>
            <li role="presentation"><a href="#cuenta" aria-controls="cuenta" data-toggle="tab" role="tab">Cuentas</a></li>
            <li role="presentation"><a href="#caja" aria-controls="caja" data-toggle="tab" role="tab">Cajas</a></li>
          </ul>

     
        
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active"  id="nivel">

                  <form role="form-signin" class="form-horizontal" id="" method="POST" action="" > 
                  {{csrf_field()}} 
                    <div class="tab-content">
                      <div role="tabpanel" class="tab-pane active"  id="niveles">
                        <center>
                        <br>
                        <div class="col-md-12">
                          <div id="sidebar">
                            <div class="well">
                              <legend>Niveles Escolares </legend> 
                              <p>En esta sección deberá ingresar todas las carreras, secciones o niveles educativos.</p>

                              <div class="form-group">
                                <input type="hidden" class="form-control" id="NUMEROALUMNO"  name="txtid" value="">
                              </div>         
                              <h4><a href="{{ url ('crear/nivel') }}"> Crear Nuevo Nivel</a></h4>
                              <hr>
                                <div class="table-responsive">
                                  <table class="table">
                                    <thead>
                                      <tr>
                                        <td>Identificador</td>
                                        <td>Descripción</td>
                                        <td>Opciones</td>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        <!--Implementar codigo de alicia-->
                                    </tbody>
                                  </table>
                                </div>
                            </div>
                          </div>
                        </div>
                        </center>
                      </div>
                    </div>
                  </form>                        
                </div>

                <div role="tabpanel" class="tab-pane" id="ciclo">
                        <center>
                        <br>
                        <div class="col-md-12">
                          <div id="sidebar">
                            <div class="well">
                              <legend>Ciclos Académicos</legend> 
                              <p>En esta sección agregará un nuevo ciclo escolar según sea el caso.</p>
                                <span class="label label-danger">Nota:</span><p>Solo puede agregar un ciclo dependiendo de la fecha de <strong>Inicio</strong> y de <strong>Fin</strong> del periodo.</p>
                                <div id="products">
                            
                                </div>
                                @push('ciclos')
                                <script>

                                  $(document).ready(function(){

                                      $('#products').load('<?php echo url('configuracion/ciclos');?>').fadeIn("slow");

                                  });
                                   
                                </script>
                                @endpush
                            </div>
                          </div>
                        </div> 
                        </center>    
                </div>

                 <div role="tabpanel" class="tab-pane" id="cuenta">
                        <center>
                        <br>
                        <div class="col-md-12">
                          <div id="sidebar">
                            <div class="well">
                              <legend>Cuentas</legend> 
                              <p>En esta sección podrá crear una cuenta y asignarlo al módulo de cobranza.</p>
                                <div id="cuentaDatos">
                            
                                </div>
                                @push('cuenta')
                                <script>

                                  $(document).ready(function(){

                                      $('#cuentaDatos').load('<?php echo url('configuracion/cuenta');?>').fadeIn("slow");

                                  });
                                   
                                </script>
                                @endpush
                            </div>
                          </div>
                        </div> 
                        </center>    
                </div>
               
                <div role="tabpanel" class="tab-pane" id="caja">  
                  <center>
                        <br>
                        <div class="col-md-12">
                          <div id="sidebar">
                            <div class="well">
                              <legend>Cajas de Cobros</legend> 
                              <p>En esta sección podrá configurar las cajas que harán referencia al modulo de cobros</p>
                                <div id="cajas">
                            
                                </div>
                                @push('caja')
                                <script>

                                  $(document).ready(function(){

                                      $('#cajas').load('<?php echo url('configuracion/caja');?>').fadeIn("slow");

                                  });
                                   
                                </script>
                                @endpush
                            </div>
                          </div>
                        </div> 
                        </center>       
                </div>
            </div>
        </div>
    </div>
</div>

@endsection