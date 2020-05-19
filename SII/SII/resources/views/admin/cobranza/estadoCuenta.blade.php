@extends ('layouts.admin')
@section ('principal')

@if(Auth::user()->role == "1")
@push('estadoCuenta')
<script>

  //alert("working");
  $("#numeroCuenta").hide();
  $("#nombreAlumno").hide();
   
  $("#btnCuenta").click(function(){
    var buscar_alumno = $("#buscarCuenta").val()
      var url="<?php echo url('/utp/estado/cuenta/alumno-"+buscar_alumno+"') ?>";
   
      $("#nombreAlumno").find('td').remove().end();
       $("#numeroCuenta").find('td').remove().end();
    
   $.get(url,function(resul){
      $('#contenido_principal').html('');

      if (resul == "") {
                  $("#nombreAlumno").hide();
                  $('#contenido_principal').append("<div class='rechazado'><label style='color:#FA206A'>...No se ha encontrado estado de  cuenta a este alumno...</label>  </div>"); 
                   $("#numeroCuenta").hide();
           
        }else{

          var nombre = resul[0]['nombre'];
          $("#nombreAlumno").append("<td>"+nombre+"</td>");
          $("#nombreAlumno").show();
            $.each(resul, function(idx, opt) {
                var dato =  $('#contenido_principal').append(
                    +"<td></td>"
                    +"<tr><tr><td>"+opt.descripcion+"<td></tr></tr>");                              
               
          });
            
            $("#numeroCuenta").show();
            var cuenta = resul.length;
            $("#numeroCuenta").append("<td> Este alumno tiene hasta la fecha "+cuenta+" pagos realizados con éxito</td>");
             
        }    
    })
});

</script>
@endpush

<div class="row">
  <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
    <h3>Estado de Cuenta del Alumnado</h3>  
    <div class="form-group">
  <div class="input-group">
    <input type="hidden" value="{{csrf_token()}}" id="token"/>
    <input type="text" class="form-control" id="buscarCuenta" placeholder="Buscar Alumno..." value="" name="searchText">
    <span class="input-group-btn">
      <button type="submit" id="btnCuenta" class="btn btn-primary" id="btnEstadoCuenta"><i class="fa fa-search"></i> Buscador</button>
    </span>
  </div>
</div>
  </div>
</div>

@elseif(Auth::user()->role == "4")
  @push('estadoCuenta')
<script>

  //alert("working");
  $("#numeroCuenta").hide();
  $("#nombreAlumno").hide();
   
  $(document).ready(function(){
    var buscar_alumno = $("#buscarCuenta").val()
      var url="<?php echo url('/utp/estado-cuenta/alumno-"+buscar_alumno+"') ?>";
   

    
   $.get(url,function(resul){
      $('#contenido_principal').html('');

      if (resul == "") {
                  $("#nombreAlumno").hide();
                  $('#contenido_principal').append("<div class='rechazado'><label style='color:#FA206A'>...No se ha encontrado estado de  cuenta a este alumno...</label>  </div>"); 
                   $("#numeroCuenta").hide();
           
        }else{

          var nombre = resul[0]['nombre'];
          $("#nombreAlumno").append("<td>"+nombre+"</td>");
          $("#nombreAlumno").show();
            $.each(resul, function(idx, opt) {
                var dato =  $('#contenido_principal').append(
                    +"<td></td>"
                    +"<tr><tr><td>"+opt.descripcion+"<td></tr></tr>");                              
               
          });
            $("#numeroCuenta").show();
            var cuenta = resul.length;
            $("#CuentaAlum").append("<p> Este alumno tiene hasta la fecha "+cuenta+" pagos realizados con éxito</p>");
             
        }    
    })
});

</script>
@endpush

<div class="row">
  <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
    <h4>Estado de Cuenta de {{Auth::user()->name}} en la Universidad</h4>  
    <div class="form-group">
  <div class="input-group">
    <input type="hidden" value="{{csrf_token()}}" id="token"/>
    <input type="hidden" id="buscarCuenta" value="{{Auth::user()->alumnos[0]->id}}" name="searchText">
  </div>
</div>
  </div>
</div>
@endif

<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">     
      <div class="row"> 
            <div >
                  <div class="panel-body">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <table id="nombreAlumno"></table>
                          <br>
                              <table class="table" id="contenido_principal">
                              </table>
                        </div>
                  </div>
            </div>    
      </div>  
    </div>
     <table class="btn btn-success" id="numeroCuenta"></table>

    </div>

@endsection