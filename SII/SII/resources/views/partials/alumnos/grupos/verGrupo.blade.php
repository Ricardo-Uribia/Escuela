@extends('layouts.admin')
@section('principal')

<!--@push('alumnos')
<script>
$(document).ready(function(){

  $("#msg").hide();
  //alert("working");

  $("#btn").click(function(){
    $("#msg").show();
    var alumno_id = $("#alumno_id").val()
    var grupo_id = $("#grupo_id").val()
    var Status = $("#status").val();
    var Genero = $("#genero").val();
    var Matricula = $("#matricula").val();
    var token = $("#token").val();
   
    $.ajax({
      type: "post",
      data: "alumno_id=" + alumno_id + "&grupo_id=" + grupo_id + "&_token=" + token + "&Status=" + Status + "&Genero=" + Genero
      + "&Matricula=" + Matricula,
      url: "<?php echo url('/agregar/alumno') ?>",
      success:function(data){
        $("#msg").fadeOut(8000);
        if(data){
            window.location.replace("../../lista/alumnos/grupos/" + grupo_id);
        }
      }
    });
  });

   var auto_refresh = setInterval(
     function(){
      $('#alumn_grupo').load('<?php echo url('agregar/alumno');?>').fadeIn("slow");
     },10000);
 });
</script>
@endpush  -->

<div id="page-wrapper">

<div class="col-md-12">



	<h1>Alumnos del Grupo</h1>

<br>
  </div>
  <form action="{{url ('/')}}/utp/alumno/{{$grupo->id}}" method="GET" >
      
 
<div class="form-group">
	<div class="input-group">
		<input type="text" class="form-control" placeholder="Buscar Alumno..." value="" name="searchText">
		<span class="input-group-btn">
			<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
		</span>
	</div>
</div>


 </form>
  <br><br>

  <div class="col-md-12">
                        <div id="sidebar">
                            <div class="well">


<div class="table-responsive">
 <p id="msg" class="alert alert-success">Alumno Registrado con Éxito</p>
    <table class="table table-striped">
      <thead>
        <tr>
          <td>Matrícula</td>
          <td>Nombre del Alumno</td>
          <td>Genero</td>
          <td>Status</td>
        
          <td></td>
        </tr>
        
        
      </thead>
    
    <tbody>
          @foreach($alumnogrupo as $alg)
                            <tr>
                              <td>{{$alg->Matricula}}</td>
                              <td>{{$alg->Nombres}}</td>
                              <td>{{$alg->Codigo_Grupo}}</td>
                              <td>{{$alg->Genero}}</td>
                              <td>{{$alg->Status}}</td>
                          @endforeach
    </tbody>

	
      </table>
      
      	<button type="submit" id="btn" class="btn btn-success pull-right"> Agregar </button>
   
  </div>
  


</div>
</div>
  <br><br>
  

  
</div>
@push('alumnosgruposDataTable')
<script>

    $(document).ready(function(){
             
        var lang_spain = {
        "sProcessing":     "Procesando...",
        "sLengthMenu":     "Mostrar _MENU_ registros",
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ning煤n dato disponible en esta tabla",
        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sSearch":         "Buscar:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst":    "Primero",
            "sLast":     "脷ltimo",
            "sNext":     "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
  }
    $('#alumnosgruposDataTable').DataTable({
       "language": lang_spain


    });
            });



    
</script>

@endpush



	
</div>
</div>

	@endsection