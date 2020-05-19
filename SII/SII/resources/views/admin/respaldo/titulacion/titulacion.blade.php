@extends('layouts.admin')
@section('contenido')
	
	<div class="container">
    <div class="row">
        <div class="panel-group" id="accordion">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            Titulación
                        </h4>
                        <h6>{{$alumnos->name}} + especialidad</h6>
                    </div>
         		</div>
         	</div>
         	<div class="col-sm-3 col-md-3">
                    <div id="collapseOne" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <table class="table">
                            	<tr>
                            		<td>
                            			<center>
	                            			<img src="" style="width: 100px; height: 100px;">
	                            			<p style="color:green;">Avance del Proceso</p>
                            			</center>
                            		</td>
                            	</tr>
                                <tr>
                                    <td>
                                        <span class=""></span><p style="color:green;">1. Etapas Previas</p>
                                         @if(count($empresaAlumno))
                                        <p style="color: green;">Iniciada</p>
                                        @else
                                        <p style="color: red;">No Iniciada</p>
                                        @endif
                                        <input type="button" class="btn btn-warning valor" id="etapa1" value="Ver">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class=""></span><p style="color:green;">2. Ficha de Titulación</p>
                                        <p style="color: red;">No Iniciada</p>                  
                                        <input type="button" class="btn btn-warning valor" id="etapa2" value="Crear">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class=""></span><p style="color:green;">3. Registro del Titulo</p>
                                        <p style="color:red; ">No Iniciada</p> 
                                        <input type="button" class="btn btn-warning valor" id="etapa3" value="Iniciar">
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-sm-9 col-md-9">
                	<!--
						Espacio donde se cambiara con el ajax
                	-->
                        <div id="products">
                            <h5>Módulo de Titulación</h5>
                            <h4>Bienvenido + usuario del sistema</h4>
                        </div>


                </div>
            </div>
        </div>
    </div>
               
<style type="text/css">
  .btn{
        width:80px;
        height:30px;
       }
</style>
@push('titulacion')
<script>

$(function() {
 $(document).on('click', 'input[type="button"]', function(event) {
    let id = this.id;
    console.log("Se presionó el Boton con Id :"+ id)

    '<?php $cantidad=$alumnos->id?>'

 var status = 0;
    switch(id){
        case "etapa1":
            $('#products').load('<?php echo url('utp/titulacion/etapa1/'.$cantidad.'');?>').fadeIn("slow");
            status = 1;
        break;
        case "etapa2":
            $('#products').load('<?php echo url('utp/titulacion/etapa2/5');?>').fadeIn("slow");
            status = 2;
        break;
        case "etapa3":
            $('#products').load('<?php echo url('utp/titulacion/etapa3/5');?>').fadeIn("slow");
            status = 3;
        break;


    }
  });
});
</script>
@endpush
@endsection