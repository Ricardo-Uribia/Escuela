@extends ('layouts.admin')
@section ('principal')

 <!--<div class="row">
 <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">-->
  <div>
  <!--<center><img src="//localhost/2019Si/siii/SII/public/imagenes/cobranza.jpg" alt="50" width="600"/><br></center>
                                      <h1><center><strong>Modulo Cobros</strong></center></h1>
  </div>
    <STRONG>Hora:</STRONG>
     <p id="reloj"></p> 
           <script type="text/javascript"> function startTime(){ today=new Date(); h=today.getHours(); m=today.getMinutes(); s=today.getSeconds(); m=checkTime(m); s=checkTime(s); document.getElementById('reloj').innerHTML=h+":"+m+":"+s; t=setTimeout('startTime()',500);} function checkTime(i) {if (i<10) {i="0" + i;}return i;} window.onload=function(){startTime();} </script>
  </div>
</div>-->

<br>

<!--<span id="mensajeExito" class="btn btn-success"></span>

  <div class="row">
  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
    <div class="row">
      <ul class="nav nav-pills nav-stacked">
        <li><a href="" data-target="#modal-get-student" data-toggle="modal"><button style="width: 100%" class="btn btn-primary"><i class="fa fa-user"></i> Buscar Alumno</button></a></li>-->
         <div class="btn-group">
  <button type="button" class="btn btn-warning dropdown-toggle"
          data-toggle="dropdown">
    C O B R O S <span class="caret"></span>
  </button>

  <ul class="dropdown-menu" role="menu">
    <li><a href="{{url('/')}}/utp/concepto/create"><button class="btn btn-warning" style=""><i class="fa fa-money fa-fw"></i>C_Conceptos</button></a></li>
  </ul>
</div></center>
        <br>
        
                                      
          <a href="../lista/venta/planes"><button style="width: 18%" class="btn btn-info"><i class="fa fa-list"></i> Listado de Ventas</button></a>
          <br>
          <br>

        <!--  <a href="../lista/venta/planes"><button style="width: 18%" class="btn btn-danger"><i class="fa fa-save"></i> Cobro de Ventas</button></a>-->

                <br></center>
      </ul>
    </div>
  </div>
  <br>

<form method="GET" action="{{ url('/alumnocxc') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

       
 {!!Form::open(array('url'=>'utp/venta/plan/cobrar/','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}

  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
  <label class="control-label" for="date">Fecha</label>
      <div class="input-group date" id="dp3">
      <input disabled name="date" class="form-control" type="text" value="<?php echo date("m/d/Y"); ?>">
    </div>
  </div>

 <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                 <div class="form-group">
                  <label for="idCaja">Caja</label>
                  <select name="idCaja" id="idCaja" class="form-control selectpicker" data-live-search="true">
                        <option value="">Selecciona</option>
                        @foreach($cajas as $caja) 
                          <option value="{{$caja->id}}">{{$caja->descripcion}}</option> 
                        @endforeach             
                  </select>

                </div>
              </div>

  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
  <label class="control-label" for="date">Folio</label>
      <input name="folio"  class="form-control" type="text" value="0">
  </div>

<br><br><br><br><br>

    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">     
      <div class="row"> 
            <div class="panel panel-primary">
                  <div class="panel-body">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                              <table class="table table-striped table-bordered table-condensed table-hover" id="detalles">
                                    <thead style="background-color:#A9D0F5">
                                        <th>Opciones</th>
                                        <th>Alumno</th>
                                        <th>Ciclo</th>
                                        <th>Plan</th>
                                        <th>Concepto</th>
                                        <th>Cantidad Programada</th>
                                        <th></th>
                                       
                                    </thead>
                                    <tbody id="contenido_principal">
                                        
                                    </tbody>
                                    <tfoot>
                                        <th>TOTAL</th>
                                        <th></th>
                                        <th></th>  
                                        <th></th>
                                        <th></th>  
                                        <th></th>
                                        <th id="subtotal"><input type="hidden" name="total_venta" id="total_venta"><p>$./0.0</p></th>
                                    </tfoot>
                                    
                              </table>       
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="guardar">
                            <div class="form-group">
                                <button class="btn btn-primary"  type="submit"><i class="fa fa-save"></i> Cobrar</button>
                                <button type="button" class="btn btn-danger" onclick="eliminar();"><i class="fa fa-ban"></i> Cancelar</button>
                            </div> 
                          </div>
                    </div>
              </div>
          </div>
      </div>

      {!!Form::close()!!} -->

  </div>                     
@endsection
