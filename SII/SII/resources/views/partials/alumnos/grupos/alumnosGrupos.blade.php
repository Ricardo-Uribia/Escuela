@extends('layouts.admin')
@section('principal')

@push('alumnos')
<script>
$(document).ready(function(){

  $("#msg").hide();
  //alert("working");



  var auto_refresh = setInterval(
    function(){
      $('#alumn_grupo').load('<?php echo url('agregar/alumno');?>').fadeIn("slow");
    },10000);
});
</script>
@endpush

<div id="page-wrapper">

<div class="col-md-12">



	<h1>Alumnos del Grupo</h1>

<br>
  </div>
  
  <form action="{{url ('/')}}/utp/alumno/{{$grupo->id}}" method="GET" >
      
 



 </form>

  <br><br>

  <div class="col-md-12">
                

  <div class="table-responsive">

  <table class="table">
      <!--<td colspan="5" align="right"><b>Total:</b> </td>-->
      <thead>
          <td>Matrícula</td>
          <td>Matrícula</td>
          <td>Nombre del Alumno</td>
          <td>Genero</td>
          <td>Status</td>
        
          <td></td>
        </tr>
        
        
      </thead>
    


	
      </table>
      
      <p id="msg" class="alert alert-success"></p>
      
      <div class="content"
                             style="height:400px; overflow-y:scroll; overflow-x:hidden">

                                <div id="alumn_grupo">
                                  <img src="{{asset('img/loading.gif')}}"
                                  style="width:30%;text-align:center">
                                </div>

                            </div>
      
   
  </div>
</div>

	
</div>
</div>

	@endsection