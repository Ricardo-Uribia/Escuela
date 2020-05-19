<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-evento-titulacion">

{{Form::Open(array('url'=>array('utp/registrar/evento/servicioSocial')))}}
				{{Form::token()}}
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" 
				aria-label="Close">
                     <span aria-hidden="true">×</span>
                </button>
                <h6 class="modal-title">Agregar Seguimiento Etapa Previa</h6>
			</div>

			<div class="modal-body">
			<h4 style=" color: blue">Servicio Social</h4>

				<div >
            		<div class="form-group">
		            	<STRONG>Proceso de Titulación para la Carrera o Nivel</STRONG>
		            	<p>Carrera del alumno</p>
           			 </div>
            	</div>
            	<div class="row">
	            	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
	            		 <div class="form-group">
			            	<label for="Institución">Institución donde se desarrolla</label>
		                        <select class="form-control" id="Institución" name="empresa">
		                        	<option value="">Selecciona</option>
		                        	@foreach($empresa as $empre)
		                       		<option value="{{$empre->id}}">{{$empre->name}}</option>
		                       		@endforeach	
		                        </select>
	            		</div>
	            	</div>
            	</div>
            	<h4 style="margin-left: 5%; color: green">Datos del Supervisor durante el proceso</h4>
            	<input type="hidden" name="idAlumno" value="{{$idAlumno->id}}">
            	<input type="hidden" name="carrera" value="Carrera Alumno">
            	<div class="row">
            		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
	            		 <div class="form-group">
			            	<label for="TipoSupervisor">Tipo Supervisor</label>
		                    <select class="form-control" id="TipoSupervisor" name="tipoSupervisor">
		                    	<option value="">Selecciona</option>
		                    	<option value="1">Interno</option>
		                    	<option value="2">Externo</option>
		                    </select>
	            		</div>
	            	</div>
	            	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="OpcionSupervisor">
	            		 <div class="form-group">
			            	<label for="supervisor">Supervisor</label>
		                    <select class="form-control" id="supervisor" name="SupervisorInterno">
		                    	<option>Selecciona</option>
		                    </select>
	            		</div>
	            	</div>
	            	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="nombreSuperExte">
	            		 <div class="form-group">
			            	<label for="supervisor">Supervisor</label>
		                    <input type="text" class="form-control" name="SupervisorExterno">
	            		</div>
	            	</div>
            	</div>
            	<h4 style="margin-left: 5%; color: green">Duración del Servicio Social</h4>
            	<div class="row">
	            	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
	            		 <div class="form-group">
			            	<label for="Inicio">Inicio</label>
		                    <input type="date" id="Inicio"  class="form-control" name="Inicio">
	            		</div>
	            	</div>
	            	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
	            		 <div class="form-group">
			            	<label for="Conclusión">Conclusión</label>
		                    <input type="date"  id="Conclusión"  class="form-control" name="Conclusion">
	            		</div>
	            	</div>
            	</div>
            	<div class="row">
            		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 ">
	            		 <div class="form-group">
			            	<label for="recOfi">Reconocimiento Oficial</label>
		                    <input type="date" id="recOfi"  class="form-control" name="recOfi">
	            		</div>
	            	</div>
	            	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 ">
	            		<span class="label label-danger">Nota:</span><p>Solo para el caso de que el proceso haya sido concluido y oficialmente aceptado</p>
	            	</div>
	           	</div>
			</div>
			<div class="modal-footer">
				<center>				
					<button type="submit" class="btn btn-primary"  style="width: 150px;height: 40px;"><i class="fa fa-save"></i> Registrar</button>
					<button type="submit" class="btn btn-danger" style="width: 150px;height: 40px;" data-dismiss="modal"><i class="fa fa-ban" ></i> Cancelar</button>
				</center>
			</div>
			
		</div>
	</div>
	{{Form::Close()}}
</div>

<script>
	$("#OpcionSupervisor").hide();
	$("#nombreSuperExte").hide();

    $("#TipoSupervisor").change(function (event) {

    	$("#nombreSuperExte").hide();
    	var idValue = event.target.value;

	    if (idValue == "1") {
	  	    	
	    	$("#OpcionSupervisor").show();
	        $.get("../../asesor/titulacion/" + event.target.value + "", function(response, state){
	        //console.log(response);
	        $("#supervisor").empty();
	        for ( i = 0; i<response.length; i++) {
	            $("#supervisor").append("<option value='"+ response[i].nombre +"' > "  + response[i].nombre + "</option>");
	        }
	    });



    	} else if (idValue == "2") {

	      	$("#OpcionSupervisor").hide();
	       	$("#nombreSuperExte").show();
	       
    	}else{

    		$("#OpcionSupervisor").hide();
			$("#nombreSuperExte").hide();
    	}      
});
</script>