 @extends('layouts.admin')

@section('menuTabs')
@push('editEmpleado')
<script type="text/javascript">
    $(document).ready(function(){

     function cargarpais(){
                $('#estado_id6 option:eq(<?= $emple->estado_id; ?>)').prop('selected', true);   
    
    }

cargarpais();
     var valorEstado = $("#estado_id6").val();

    $.get("../../towns/" + valorEstado + "", function(response, state){
        //console.log(response);
        $("#town6").empty();
        for ( i = 0; i<response.length; i++) {
            $("#town6").append("<option value='"+ response[i].id +"' > "  + response[i].nombre + "</option>");

        }
    });
   
    });
$("#estado_id6").change(function (event) {
    $.get("../../towns/" + event.target.value + "", function(response, state){
        //console.log(response);
        $("#town6").empty();
        for ( i = 0; i<response.length; i++) {
            $("#town6").append("<option value='"+ response[i].id +"' > "  + response[i].nombre + "</option>");
        }
    });
});
</script>
@endpush
 


        <div class="row">
            <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading ">
                            <center><h4> Editar Pre-Registro</h4></center> 
                        </div>
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
        </div>

<div class="tab-content">
    <div class="col-md-12 contenedor-datos">
        <div role="tabpanel">
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#basicos" aria-controls="basicos" data-toggle="tab" role="tab">Datos Básicos</a></li>
            <li role="presentation"><a href="#academicos" aria-controls="academicos" data-toggle="tab" role="tab">Datos Laborales</a></li>
            <li role="presentation"><a href="#estudios" aria-controls="estudios" data-toggle="tab" role="tab">Estudios & Otros</a></li>
             <!--<li role="presentation"><a href="#salud" aria-controls="salud" data-toggle="tab" role="tab">Datos de Salud y Seguridad</a></li>-->
          </ul>

            <form action="{{url('/')}}/act/empleado/{{$emple->id}}" method="POST" enctype="multipart/form-data">
  {{ csrf_field() }}
               <input type="hidden" name="tipo" value="6">
                <div class="tab-content">       
                    <div role="tabpanel" class="tab-pane active"  id="basicos">
                        <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="col-md-12">
                            
                        </div>
                        <div id="mio" class="input-group">
                        <span class="input-group-addon"><STRONG>Identidad</STRONG></span>  
                        </div><br> 

                         <div class="col-md-4">
                                <div class="form-group">
                                    <label for="foto">Foto</label>
                                    <input type="file"  name="fotoEmpleado" class="form-control" value="{{old('foto')}}" >
                                </div>
                            </div>

                        <div class="col-md-6">
                            <div class="form-group was-validated">
                                <label for="nombre">Nombres</label>
                                <input type="text" name="nombre" class="form-control" value="{{$emple->NombreEmpleado }}" function wordlimit($string, $length = 18,) onkeyup="javascript:this.value=this.value.toUpperCase();" >
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="txtParterno">Apellido Paterno</label>
                                    <input type="txtParterno" name="txtPaterno" class="form-control" value="{{$emple->txtPaterno}}"  function wordlimit($string, $length = 18,) onkeyup="javascript:this.value=this.value.toUpperCase();" >
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="txtMaterno">Apellido Materno</label>
                                    <input type="text" name="txtMaterno" class="form-control" value="{{$emple->txtMaterno}}" function wordlimit($string, $length = 18,) onkeyup="javascript:this.value=this.value.toUpperCase();">
                                </div>
                            </div>
                                                        
                            
                            
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group {{$errors->has('estadoz') ? 'has-error' : ''}}">   
                                    <label for="estadoz" >estadoz</label>
                                        <select name="estadoz" values="select" class="form-control selectpicker" data-live-search="true">
                 @if($emple->estadoz == 'Aguascalientes')
                    <option  value="">Estados</option>
                     <option value="Aguascaliente" selected>Aguascalientes</option>}
                     <option value="Baja California" >Baja California</option>
                    <option value="Baja California Sur">Baja California Sur</option>
                    <option value="Campeche">Campeche</option>
                    <option value="Coahuila">Coahuila</option>
                    <option value="Colima">Colima</option>
                    <option value="Chiapas">Chiapas</option>
                    <option value="Chihuahua">Chihuahua</option>
                    <option value="Distrito Federal">Distrito Federal</option>
                    <option value="Durangod">Durango</option>
                    <option value="Guanajuato">Guanajuato</option>
                    <option value="Guerrero">Guerrero</option>
                    <option value="Hidalgo">Hidalgo</option>
                    <option value="Jalisco">Jalisco</option>
                    <option value="México">México</option>
                     <option value="Michoacán">Michoacán</option>
                     <option value="Morelos">Morelos</option>
                    <option value="Nayarit" >Nayarit</option>
                    <option value="Nuevo León">Nuevo León</option>
                    <option value="Oaxaca">Oaxaca</option>
                    <option value="Puebla">Puebla</option></option>
                    <option value="Querétaro">Querétaro</option>
                    <option value="Quintana Roo">Quintana Roo</option>
                    <option value="San Luis Potosí">San Luis Potosí</option>
                    <option value="Sinaloa">Sinaloa</option>
                    <option value="Sonora">Sonora</option>
                    <option value="Tabasco">Tabasco</option>
                    <option value="Tamaulipas">Tamaulipas</option>
                    <option value="Tlaxcala">Tlaxcala</option>
                    <option value="Veracruz">Veracruz</option>
                    <option value="Yucatán">Yucatán</option>
                    <option value="Zacatecas">Zacatecas</option>
                    <option value="Extranjero">Nacido Extranjero</option>
        @elseif($emple->estadoz == 'Baja California')
        <option  value="">Estados</option>
                     <option value="Aguascaliente" >Aguascalientes</option>}
                     <option value="Baja California" selected>Baja California</option>
                    <option value="Baja California Sur">Baja California Sur</option>
                    <option value="Campeche">Campeche</option>
                    <option value="Coahuila">Coahuila</option>
                    <option value="Colima">Colima</option>
                    <option value="Chiapas">Chiapas</option>
                    <option value="Chihuahua">Chihuahua</option>
                    <option value="Distrito Federal">Distrito Federal</option>
                    <option value="Durangod">Durango</option>
                    <option value="Guanajuato">Guanajuato</option>
                    <option value="Guerrero">Guerrero</option>
                    <option value="Hidalgo">Hidalgo</option>
                    <option value="Jalisco">Jalisco</option>
                    <option value="México">México</option>
                     <option value="Michoacán">Michoacán</option>
                     <option value="Morelos">Morelos</option>
                    <option value="Nayarit" >Nayarit</option>
                    <option value="Nuevo León">Nuevo León</option>
                    <option value="Oaxaca">Oaxaca</option>
                    <option value="Puebla">Puebla</option></option>
                    <option value="Querétaro">Querétaro</option>
                    <option value="Quintana Roo">Quintana Roo</option>
                    <option value="San Luis Potosí">San Luis Potosí</option>
                    <option value="Sinaloa">Sinaloa</option>
                    <option value="Sonora">Sonora</option>
                    <option value="Tabasco">Tabasco</option>
                    <option value="Tamaulipas">Tamaulipas</option>
                    <option value="Tlaxcala">Tlaxcala</option>
                    <option value="Veracruz">Veracruz</option>
                    <option value="Yucatán">Yucatán</option>
                    <option value="Zacatecas">Zacatecas</option>
                    <option value="Extranjero">Nacido Extranjero</option>
        @elseif($emple->estadoz == 'Baja California Sur')
                    <option  value="">Estados</option>
                     <option value="Aguascaliente" >Aguascalientes</option>}
                     <option value="Baja California" >Baja California</option>
                    <option value="Baja California Sur" selected>Baja California Sur</option>
                    <option value="Campeche">Campeche</option>
                    <option value="Coahuila">Coahuila</option>
                    <option value="Colima">Colima</option>
                    <option value="Chiapas">Chiapas</option>
                    <option value="Chihuahua">Chihuahua</option>
                    <option value="Distrito Federal">Distrito Federal</option>
                    <option value="Durangod">Durango</option>
                    <option value="Guanajuato">Guanajuato</option>
                    <option value="Guerrero">Guerrero</option>
                    <option value="Hidalgo">Hidalgo</option>
                    <option value="Jalisco">Jalisco</option>
                    <option value="México">México</option>
                     <option value="Michoacán">Michoacán</option>
                     <option value="Morelos">Morelos</option>
                    <option value="Nayarit" >Nayarit</option>
                    <option value="Nuevo León">Nuevo León</option>
                    <option value="Oaxaca">Oaxaca</option>
                    <option value="Puebla">Puebla</option>
                    <option value="Querétaro">Querétaro</option>
                    <option value="Quintana Roo">Quintana Roo</option>
                    <option value="San Luis Potosí">San Luis Potosí</option>
                    <option value="Sinaloa">Sinaloa</option>
                    <option value="Sonora">Sonora</option>
                    <option value="Tabasco">Tabasco</option>
                    <option value="Tamaulipas">Tamaulipas</option>
                    <option value="Tlaxcala">Tlaxcala</option>
                    <option value="Veracruz">Veracruz</option>
                    <option value="Yucatán">Yucatán</option>
                    <option value="Zacatecas">Zacatecas</option>
                    <option value="Extranjero">Nacido Extranjero</option>
        @elseif($emple->estadoz == 'Campeche')
                    <option  value="">Estados</option>
                     <option value="Aguascaliente" >Aguascalientes</option>}
                     <option value="Baja California" >Baja California</option>
                    <option value="Baja California Sur">Baja California Sur</option>
                    <option value="Campeche" selected>Campeche</option>
                    <option value="Coahuila">Coahuila</option>
                    <option value="Colima">Colima</option>
                    <option value="Chiapas">Chiapas</option>
                    <option value="Chihuahua">Chihuahua</option>
                    <option value="Distrito Federal">Distrito Federal</option>
                    <option value="Durangod">Durango</option>
                    <option value="Guanajuato">Guanajuato</option>
                    <option value="Guerrero">Guerrero</option>
                    <option value="Hidalgo">Hidalgo</option>
                    <option value="Jalisco">Jalisco</option>
                    <option value="México">México</option>
                     <option value="Michoacán">Michoacán</option>
                     <option value="Morelos">Morelos</option>
                    <option value="Nayarit" >Nayarit</option>
                    <option value="Nuevo León">Nuevo León</option>
                    <option value="Oaxaca">Oaxaca</option>
                    <option value="Puebla">Puebla</option>
                    <option value="Querétaro">Querétaro</option>
                    <option value="Quintana Roo">Quintana Roo</option>
                    <option value="San Luis Potosí">San Luis Potosí</option>
                    <option value="Sinaloa">Sinaloa</option>
                    <option value="Sonora">Sonora</option>
                    <option value="Tabasco">Tabasco</option>
                    <option value="Tamaulipas">Tamaulipas</option>
                    <option value="Tlaxcala">Tlaxcala</option>
                    <option value="Veracruz">Veracruz</option>
                    <option value="Yucatán">Yucatán</option>
                    <option value="Zacatecas">Zacatecas</option>
                    <option value="Extranjero">Nacido Extranjero</option>
        @elseif($emple->estadoz == 'Coahuila')
                    <option  value="">Estados</option>
                     <option value="Aguascaliente" >Aguascalientes</option>}
                     <option value="Baja California" >Baja California</option>
                    <option value="Baja California Sur">Baja California Sur</option>
                    <option value="Campeche">Campeche</option>
                    <option value="Coahuila" selected>Coahuila</option>
                    <option value="Colima">Colima</option>
                    <option value="Chiapas">Chiapas</option>
                    <option value="Chihuahua">Chihuahua</option>
                    <option value="Distrito Federal">Distrito Federal</option>
                    <option value="Durangod">Durango</option>
                    <option value="Guanajuato">Guanajuato</option>
                    <option value="Guerrero">Guerrero</option>
                    <option value="Hidalgo">Hidalgo</option>
                    <option value="Jalisco">Jalisco</option>
                    <option value="México">México</option>
                     <option value="Michoacán">Michoacán</option>
                     <option value="Morelos">Morelos</option>
                    <option value="Nayarit" >Nayarit</option>
                    <option value="Nuevo León">Nuevo León</option>
                    <option value="Oaxaca">Oaxaca</option>
                    <option value="Puebla">Puebla</option>
                    <option value="Querétaro">Querétaro</option>
                    <option value="Quintana Roo">Quintana Roo</option>
                    <option value="San Luis Potosí">San Luis Potosí</option>
                    <option value="Sinaloa">Sinaloa</option>
                    <option value="Sonora">Sonora</option>
                    <option value="Tabasco">Tabasco</option>
                    <option value="Tamaulipas">Tamaulipas</option>
                    <option value="Tlaxcala">Tlaxcala</option>
                    <option value="Veracruz">Veracruz</option>
                    <option value="Yucatán">Yucatán</option>
                    <option value="Zacatecas">Zacatecas</option>
                    <option value="Extranjero">Nacido Extranjero</option>
        @elseif($emple->estadoz == 'Colima')
                    <option  value="">Estados</option>
                     <option value="Aguascaliente" >Aguascalientes</option>}
                     <option value="Baja California" >Baja California</option>
                    <option value="Baja California Sur">Baja California Sur</option>
                    <option value="Campeche">Campeche</option>
                    <option value="Coahuila">Coahuila</option>
                    <option value="Colima" selcted>Colima</option>
                    <option value="Chiapas">Chiapas</option>
                    <option value="Chihuahua">Chihuahua</option>
                    <option value="Distrito Federal">Distrito Federal</option>
                    <option value="Durangod">Durango</option>
                    <option value="Guanajuato">Guanajuato</option>
                    <option value="Guerrero">Guerrero</option>
                    <option value="Hidalgo">Hidalgo</option>
                    <option value="Jalisco">Jalisco</option>
                    <option value="México">México</option>
                     <option value="Michoacán">Michoacán</option>
                     <option value="Morelos">Morelos</option>
                    <option value="Nayarit" >Nayarit</option>
                    <option value="Nuevo León">Nuevo León</option>
                    <option value="Oaxaca">Oaxaca</option>
                    <option value="Puebla">Puebla</option>
                    <option value="Querétaro">Querétaro</option>
                    <option value="Quintana Roo">Quintana Roo</option>
                    <option value="San Luis Potosí">San Luis Potosí</option>
                    <option value="Sinaloa">Sinaloa</option>
                    <option value="Sonora">Sonora</option>
                    <option value="Tabasco">Tabasco</option>
                    <option value="Tamaulipas">Tamaulipas</option>
                    <option value="Tlaxcala">Tlaxcala</option>
                    <option value="Veracruz">Veracruz</option>
                    <option value="Yucatán">Yucatán</option>
                    <option value="Zacatecas">Zacatecas</option>
                    <option value="Extranjero">Nacido Extranjero</option>
        @elseif($emple->estadoz == 'Chiapas')
                    <option  value="">Estados</option>
                     <option value="Aguascaliente" >Aguascalientes</option>}
                     <option value="Baja California" >Baja California</option>
                    <option value="Baja California Sur">Baja California Sur</option>
                    <option value="Campeche">Campeche</option>
                    <option value="Coahuila">Coahuila</option>
                    <option value="Colima">Colima</option>
                    <option value="Chiapas" selected>Chiapas</option>
                    <option value="Chihuahua">Chihuahua</option>
                    <option value="Distrito Federal">Distrito Federal</option>
                    <option value="Durangod">Durango</option>
                    <option value="Guanajuato">Guanajuato</option>
                    <option value="Guerrero">Guerrero</option>
                    <option value="Hidalgo">Hidalgo</option>
                    <option value="Jalisco">Jalisco</option>
                    <option value="México">México</option>
                     <option value="Michoacán">Michoacán</option>
                     <option value="Morelos">Morelos</option>
                    <option value="Nayarit" >Nayarit</option>
                    <option value="Nuevo León">Nuevo León</option>
                    <option value="Oaxaca">Oaxaca</option>
                    <option value="Puebla">Puebla</option>
                    <option value="Querétaro">Querétaro</option>
                    <option value="Quintana Roo">Quintana Roo</option>
                    <option value="San Luis Potosí">San Luis Potosí</option>
                    <option value="Sinaloa">Sinaloa</option>
                    <option value="Sonora">Sonora</option>
                    <option value="Tabasco">Tabasco</option>
                    <option value="Tamaulipas">Tamaulipas</option>
                    <option value="Tlaxcala">Tlaxcala</option>
                    <option value="Veracruz">Veracruz</option>
                    <option value="Yucatán">Yucatán</option>
                    <option value="Zacatecas">Zacatecas</option>
                    <option value="Extranjero">Nacido Extranjero</option>
        @elseif($emple->estadoz == 'Chihuahua')
                    <option  value="">Estados</option>
                     <option value="Aguascaliente" >Aguascalientes</option>}
                     <option value="Baja California" >Baja California</option>
                    <option value="Baja California Sur">Baja California Sur</option>
                    <option value="Campeche">Campeche</option>
                    <option value="Coahuila">Coahuila</option>
                    <option value="Colima">Colima</option>
                    <option value="Chiapas">Chiapas</option>
                    <option value="Chihuahua" selected>Chihuahua</option>
                    <option value="Distrito Federal">Distrito Federal</option>
                    <option value="Durangod">Durango</option>
                    <option value="Guanajuato">Guanajuato</option>
                    <option value="Guerrero">Guerrero</option>
                    <option value="Hidalgo">Hidalgo</option>
                    <option value="Jalisco">Jalisco</option>
                    <option value="México">México</option>
                     <option value="Michoacán">Michoacán</option>
                     <option value="Morelos">Morelos</option>
                    <option value="Nayarit" >Nayarit</option>
                    <option value="Nuevo León">Nuevo León</option>
                    <option value="Oaxaca">Oaxaca</option>
                    <option value="Puebla">Puebla</option>
                    <option value="Querétaro">Querétaro</option>
                    <option value="Quintana Roo">Quintana Roo</option>
                    <option value="San Luis Potosí">San Luis Potosí</option>
                    <option value="Sinaloa">Sinaloa</option>
                    <option value="Sonora">Sonora</option>
                    <option value="Tabasco">Tabasco</option>
                    <option value="Tamaulipas">Tamaulipas</option>
                    <option value="Tlaxcala">Tlaxcala</option>
                    <option value="Veracruz">Veracruz</option>
                    <option value="Yucatán">Yucatán</option>
                    <option value="Zacatecas">Zacatecas</option>
                    <option value="Extranjero">Nacido Extranjero</option>
        @elseif($emple->estadoz == 'Distrito Federal')
                    <option  value="">Estados</option>
                     <option value="Aguascaliente" >Aguascalientes</option>}
                     <option value="Baja California" >Baja California</option>
                    <option value="Baja California Sur">Baja California Sur</option>
                    <option value="Campeche">Campeche</option>
                    <option value="Coahuila">Coahuila</option>
                    <option value="Colima">Colima</option>
                    <option value="Chiapas">Chiapas</option>
                    <option value="Chihuahua">Chihuahua</option>
                    <option value="Distrito Federal" selected>Distrito Federal</option>
                    <option value="Durangod">Durango</option>
                    <option value="Guanajuato">Guanajuato</option>
                    <option value="Guerrero">Guerrero</option>
                    <option value="Hidalgo">Hidalgo</option>
                    <option value="Jalisco">Jalisco</option>
                    <option value="México">México</option>
                     <option value="Michoacán">Michoacán</option>
                     <option value="Morelos">Morelos</option>
                    <option value="Nayarit" >Nayarit</option>
                    <option value="Nuevo León">Nuevo León</option>
                    <option value="Oaxaca">Oaxaca</option>
                    <option value="Puebla">Puebla</option>
                    <option value="Querétaro">Querétaro</option>
                    <option value="Quintana Roo">Quintana Roo</option>
                    <option value="San Luis Potosí">San Luis Potosí</option>
                    <option value="Sinaloa">Sinaloa</option>
                    <option value="Sonora">Sonora</option>
                    <option value="Tabasco">Tabasco</option>
                    <option value="Tamaulipas">Tamaulipas</option>
                    <option value="Tlaxcala">Tlaxcala</option>
                    <option value="Veracruz">Veracruz</option>
                    <option value="Yucatán">Yucatán</option>
                    <option value="Zacatecas">Zacatecas</option>
                    <option value="Extranjero">Nacido Extranjero</option>
        @elseif($emple->estadoz == 'Durango')
        <option  value="">Estados</option>
                     <option value="Aguascaliente" >Aguascalientes</option>}
                     <option value="Baja California" >Baja California</option>
                    <option value="Baja California Sur">Baja California Sur</option>
                    <option value="Campeche">Campeche</option>
                    <option value="Coahuila">Coahuila</option>
                    <option value="Colima">Colima</option>
                    <option value="Chiapas">Chiapas</option>
                    <option value="Chihuahua">Chihuahua</option>
                    <option value="Distrito Federal">Distrito Federal</option>
                    <option value="Durangod" selected>Durango</option>
                    <option value="Guanajuato">Guanajuato</option>
                    <option value="Guerrero">Guerrero</option>
                    <option value="Hidalgo">Hidalgo</option>
                    <option value="Jalisco">Jalisco</option>
                    <option value="México">México</option>
                     <option value="Michoacán">Michoacán</option>
                     <option value="Morelos">Morelos</option>
                    <option value="Nayarit" >Nayarit</option>
                    <option value="Nuevo León">Nuevo León</option>
                    <option value="Oaxaca">Oaxaca</option>
                    <option value="Puebla">Puebla</option>
                    <option value="Querétaro">Querétaro</option>
                    <option value="Quintana Roo">Quintana Roo</option>
                    <option value="San Luis Potosí">San Luis Potosí</option>
                    <option value="Sinaloa">Sinaloa</option>
                    <option value="Sonora">Sonora</option>
                    <option value="Tabasco">Tabasco</option>
                    <option value="Tamaulipas">Tamaulipas</option>
                    <option value="Tlaxcala">Tlaxcala</option>
                    <option value="Veracruz">Veracruz</option>
                    <option value="Yucatán">Yucatán</option>
                    <option value="Zacatecas">Zacatecas</option>
                    <option value="Extranjero">Nacido Extranjero</option>
        @elseif($emple->estadoz == 'Guanajuato')
                    <option  value="">Estados</option>
                     <option value="Aguascaliente" >Aguascalientes</option>}
                     <option value="Baja California" >Baja California</option>
                    <option value="Baja California Sur">Baja California Sur</option>
                    <option value="Campeche">Campeche</option>
                    <option value="Coahuila">Coahuila</option>
                    <option value="Colima">Colima</option>
                    <option value="Chiapas">Chiapas</option>
                    <option value="Chihuahua">Chihuahua</option>
                    <option value="Distrito Federal">Distrito Federal</option>
                    <option value="Durangod">Durango</option>
                    <option value="Guanajuato" selected>Guanajuato</option>
                    <option value="Guerrero">Guerrero</option>
                    <option value="Hidalgo">Hidalgo</option>
                    <option value="Jalisco">Jalisco</option>
                    <option value="México">México</option>
                     <option value="Michoacán">Michoacán</option>
                     <option value="Morelos">Morelos</option>
                    <option value="Nayarit" >Nayarit</option>
                    <option value="Nuevo León">Nuevo León</option>
                    <option value="Oaxaca">Oaxaca</option>
                    <option value="Puebla">Puebla</option>
                    <option value="Querétaro">Querétaro</option>
                    <option value="Quintana Roo">Quintana Roo</option>
                    <option value="San Luis Potosí">San Luis Potosí</option>
                    <option value="Sinaloa">Sinaloa</option>
                    <option value="Sonora">Sonora</option>
                    <option value="Tabasco">Tabasco</option>
                    <option value="Tamaulipas">Tamaulipas</option>
                    <option value="Tlaxcala">Tlaxcala</option>
                    <option value="Veracruz">Veracruz</option>
                    <option value="Yucatán">Yucatán</option>
                    <option value="Zacatecas">Zacatecas</option>
                    <option value="Extranjero">Nacido Extranjero</option>
        @elseif($emple->estadoz == 'Guerrero')
                    <option  value="">Estados</option>
                     <option value="Aguascaliente" >Aguascalientes</option>}
                     <option value="Baja California" >Baja California</option>
                    <option value="Baja California Sur">Baja California Sur</option>
                    <option value="Campeche">Campeche</option>
                    <option value="Coahuila">Coahuila</option>
                    <option value="Colima">Colima</option>
                    <option value="Chiapas">Chiapas</option>
                    <option value="Chihuahua">Chihuahua</option>
                    <option value="Distrito Federal">Distrito Federal</option>
                    <option value="Durangod">Durango</option>
                    <option value="Guanajuato">Guanajuato</option>
                    <option value="Guerrero" selected>Guerrero</option>
                    <option value="Hidalgo">Hidalgo</option>
                    <option value="Jalisco">Jalisco</option>
                    <option value="México">México</option>
                     <option value="Michoacán">Michoacán</option>
                     <option value="Morelos">Morelos</option>
                    <option value="Nayarit" >Nayarit</option>
                    <option value="Nuevo León">Nuevo León</option>
                    <option value="Oaxaca">Oaxaca</option>
                    <option value="Puebla">Puebla</option>
                    <option value="Querétaro">Querétaro</option>
                    <option value="Quintana Roo">Quintana Roo</option>
                    <option value="San Luis Potosí">San Luis Potosí</option>
                    <option value="Sinaloa">Sinaloa</option>
                    <option value="Sonora">Sonora</option>
                    <option value="Tabasco">Tabasco</option>
                    <option value="Tamaulipas">Tamaulipas</option>
                    <option value="Tlaxcala">Tlaxcala</option>
                    <option value="Veracruz">Veracruz</option>
                    <option value="Yucatán">Yucatán</option>
                    <option value="Zacatecas">Zacatecas</option>
                    <option value="Extranjero">Nacido Extranjero</option>
        @elseif($emple->estadoz == 'Hidalgo')
                    <option  value="">Estados</option>
                     <option value="Aguascaliente" >Aguascalientes</option>}
                     <option value="Baja California" >Baja California</option>
                    <option value="Baja California Sur">Baja California Sur</option>
                    <option value="Campeche">Campeche</option>
                    <option value="Coahuila">Coahuila</option>
                    <option value="Colima">Colima</option>
                    <option value="Chiapas">Chiapas</option>
                    <option value="Chihuahua">Chihuahua</option>
                    <option value="Distrito Federal">Distrito Federal</option>
                    <option value="Durangod">Durango</option>
                    <option value="Guanajuato">Guanajuato</option>
                    <option value="Guerrero">Guerrero</option>
                    <option value="Hidalgo" selected>Hidalgo</option>
                    <option value="Jalisco">Jalisco</option>
                    <option value="México">México</option>
                     <option value="Michoacán">Michoacán</option>
                     <option value="Morelos">Morelos</option>
                    <option value="Nayarit" >Nayarit</option>
                    <option value="Nuevo León">Nuevo León</option>
                    <option value="Oaxaca">Oaxaca</option>
                    <option value="Puebla">Puebla</option>
                    <option value="Querétaro">Querétaro</option>
                    <option value="Quintana Roo">Quintana Roo</option>
                    <option value="San Luis Potosí">San Luis Potosí</option>
                    <option value="Sinaloa">Sinaloa</option>
                    <option value="Sonora">Sonora</option>
                    <option value="Tabasco">Tabasco</option>
                    <option value="Tamaulipas">Tamaulipas</option>
                    <option value="Tlaxcala">Tlaxcala</option>
                    <option value="Veracruz">Veracruz</option>
                    <option value="Yucatán">Yucatán</option>
                    <option value="Zacatecas">Zacatecas</option>
                    <option value="Extranjero">Nacido Extranjero</option>
        @elseif($emple->estadoz == 'Jalisco')
                    <option  value="">Estados</option>
                     <option value="Aguascaliente" >Aguascalientes</option>}
                     <option value="Baja California" >Baja California</option>
                    <option value="Baja California Sur">Baja California Sur</option>
                    <option value="Campeche">Campeche</option>
                    <option value="Coahuila">Coahuila</option>
                    <option value="Colima">Colima</option>
                    <option value="Chiapas">Chiapas</option>
                    <option value="Chihuahua">Chihuahua</option>
                    <option value="Distrito Federal">Distrito Federal</option>
                    <option value="Durangod">Durango</option>
                    <option value="Guanajuato">Guanajuato</option>
                    <option value="Guerrero">Guerrero</option>
                    <option value="Hidalgo">Hidalgo</option>
                    <option value="Jalisco" selected>Jalisco</option>
                    <option value="México">México</option>
                     <option value="Michoacán">Michoacán</option>
                     <option value="Morelos">Morelos</option>
                    <option value="Nayarit" >Nayarit</option>
                    <option value="Nuevo León">Nuevo León</option>
                    <option value="Oaxaca">Oaxaca</option>
                    <option value="Puebla">Puebla</option>
                    <option value="Querétaro">Querétaro</option>
                    <option value="Quintana Roo">Quintana Roo</option>
                    <option value="San Luis Potosí">San Luis Potosí</option>
                    <option value="Sinaloa">Sinaloa</option>
                    <option value="Sonora">Sonora</option>
                    <option value="Tabasco">Tabasco</option>
                    <option value="Tamaulipas">Tamaulipas</option>
                    <option value="Tlaxcala">Tlaxcala</option>
                    <option value="Veracruz">Veracruz</option>
                    <option value="Yucatán">Yucatán</option>
                    <option value="Zacatecas">Zacatecas</option>
                    <option value="Extranjero">Nacido Extranjero</option>
        @elseif($emple->estadoz == 'México')
                    <option  value="">Estados</option>
                     <option value="Aguascaliente" >Aguascalientes</option>}
                     <option value="Baja California" >Baja California</option>
                    <option value="Baja California Sur">Baja California Sur</option>
                    <option value="Campeche">Campeche</option>
                    <option value="Coahuila">Coahuila</option>
                    <option value="Colima">Colima</option>
                    <option value="Chiapas">Chiapas</option>
                    <option value="Chihuahua">Chihuahua</option>
                    <option value="Distrito Federal">Distrito Federal</option>
                    <option value="Durangod">Durango</option>
                    <option value="Guanajuato">Guanajuato</option>
                    <option value="Guerrero">Guerrero</option>
                    <option value="Hidalgo">Hidalgo</option>
                    <option value="Jalisco">Jalisco</option>
                    <option value="México" selected>México</option>
                     <option value="Michoacán">Michoacán</option>
                     <option value="Morelos">Morelos</option>
                    <option value="Nayarit" >Nayarit</option>
                    <option value="Nuevo León">Nuevo León</option>
                    <option value="Oaxaca">Oaxaca</option>
                    <option value="Puebla">Puebla</option>
                    <option value="Querétaro">Querétaro</option>
                    <option value="Quintana Roo">Quintana Roo</option>
                    <option value="San Luis Potosí">San Luis Potosí</option>
                    <option value="Sinaloa">Sinaloa</option>
                    <option value="Sonora">Sonora</option>
                    <option value="Tabasco">Tabasco</option>
                    <option value="Tamaulipas">Tamaulipas</option>
                    <option value="Tlaxcala">Tlaxcala</option>
                    <option value="Veracruz">Veracruz</option>
                    <option value="Yucatán">Yucatán</option>
                    <option value="Zacatecas">Zacatecas</option>
                    <option value="Extranjero">Nacido Extranjero</option>
        @elseif($emple->estadoz == 'Michoacán')
                    <option  value="">Estados</option>
                     <option value="Aguascaliente" >Aguascalientes</option>}
                     <option value="Baja California" >Baja California</option>
                    <option value="Baja California Sur">Baja California Sur</option>
                    <option value="Campeche">Campeche</option>
                    <option value="Coahuila">Coahuila</option>
                    <option value="Colima">Colima</option>
                    <option value="Chiapas">Chiapas</option>
                    <option value="Chihuahua">Chihuahua</option>
                    <option value="Distrito Federal">Distrito Federal</option>
                    <option value="Durangod">Durango</option>
                    <option value="Guanajuato">Guanajuato</option>
                    <option value="Guerrero">Guerrero</option>
                    <option value="Hidalgo">Hidalgo</option>
                    <option value="Jalisco">Jalisco</option>
                    <option value="México">México</option>
                     <option value="Michoacán" selected>Michoacán</option>
                     <option value="Morelos">Morelos</option>
                    <option value="Nayarit" >Nayarit</option>
                    <option value="Nuevo León">Nuevo León</option>
                    <option value="Oaxaca">Oaxaca</option>
                    <option value="Puebla">Puebla</option>
                    <option value="Querétaro">Querétaro</option>
                    <option value="Quintana Roo">Quintana Roo</option>
                    <option value="San Luis Potosí">San Luis Potosí</option>
                    <option value="Sinaloa">Sinaloa</option>
                    <option value="Sonora">Sonora</option>
                    <option value="Tabasco">Tabasco</option>
                    <option value="Tamaulipas">Tamaulipas</option>
                    <option value="Tlaxcala">Tlaxcala</option>
                    <option value="Veracruz">Veracruz</option>
                    <option value="Yucatán">Yucatán</option>
                    <option value="Zacatecas">Zacatecas</option>
                    <option value="Extranjero">Nacido Extranjero</option>
        @elseif($emple->estadoz == 'Morelos')
                    <option  value="">Estados</option>
                     <option value="Aguascaliente" >Aguascalientes</option>}
                     <option value="Baja California" >Baja California</option>
                    <option value="Baja California Sur">Baja California Sur</option>
                    <option value="Campeche">Campeche</option>
                    <option value="Coahuila">Coahuila</option>
                    <option value="Colima">Colima</option>
                    <option value="Chiapas">Chiapas</option>
                    <option value="Chihuahua">Chihuahua</option>
                    <option value="Distrito Federal">Distrito Federal</option>
                    <option value="Durangod">Durango</option>
                    <option value="Guanajuato">Guanajuato</option>
                    <option value="Guerrero">Guerrero</option>
                    <option value="Hidalgo">Hidalgo</option>
                    <option value="Jalisco">Jalisco</option>
                    <option value="México">México</option>
                     <option value="Michoacán">Michoacán</option>
                     <option value="Morelos" selected>Morelos</option>
                    <option value="Nayarit" >Nayarit</option>
                    <option value="Nuevo León">Nuevo León</option>
                    <option value="Oaxaca">Oaxaca</option>
                    <option value="Puebla">Puebla</option>
                    <option value="Querétaro">Querétaro</option>
                    <option value="Quintana Roo">Quintana Roo</option>
                    <option value="San Luis Potosí">San Luis Potosí</option>
                    <option value="Sinaloa">Sinaloa</option>
                    <option value="Sonora">Sonora</option>
                    <option value="Tabasco">Tabasco</option>
                    <option value="Tamaulipas">Tamaulipas</option>
                    <option value="Tlaxcala">Tlaxcala</option>
                    <option value="Veracruz">Veracruz</option>
                    <option value="Yucatán">Yucatán</option>
                    <option value="Zacatecas">Zacatecas</option>
                    <option value="Extranjero">Nacido Extranjero</option>
        @elseif($emple->estadoz == 'Nayarit')
                    <option  value="">Estados</option>
                     <option value="Aguascaliente" >Aguascalientes</option>}
                     <option value="Baja California" >Baja California</option>
                    <option value="Baja California Sur">Baja California Sur</option>
                    <option value="Campeche">Campeche</option>
                    <option value="Coahuila">Coahuila</option>
                    <option value="Colima">Colima</option>
                    <option value="Chiapas">Chiapas</option>
                    <option value="Chihuahua">Chihuahua</option>
                    <option value="Distrito Federal">Distrito Federal</option>
                    <option value="Durangod">Durango</option>
                    <option value="Guanajuato">Guanajuato</option>
                    <option value="Guerrero">Guerrero</option>
                    <option value="Hidalgo">Hidalgo</option>
                    <option value="Jalisco">Jalisco</option>
                    <option value="México">México</option>
                     <option value="Michoacán">Michoacán</option>
                     <option value="Morelos">Morelos</option>
                    <option value="Nayarit" selected>Nayarit</option>
                    <option value="Nuevo León">Nuevo León</option>
                    <option value="Oaxaca">Oaxaca</option>
                    <option value="Puebla">Puebla</option>
                    <option value="Querétaro">Querétaro</option>
                    <option value="Quintana Roo">Quintana Roo</option>
                    <option value="San Luis Potosí">San Luis Potosí</option>
                    <option value="Sinaloa">Sinaloa</option>
                    <option value="Sonora">Sonora</option>
                    <option value="Tabasco">Tabasco</option>
                    <option value="Tamaulipas">Tamaulipas</option>
                    <option value="Tlaxcala">Tlaxcala</option>
                    <option value="Veracruz">Veracruz</option>
                    <option value="Yucatán">Yucatán</option>
                    <option value="Zacatecas">Zacatecas</option>
                    <option value="Extranjero">Nacido Extranjero</option>
        @elseif($emple->estadoz == 'Nuevo León')
                    <option  value="">Estados</option>
                     <option value="Aguascaliente" >Aguascalientes</option>}
                     <option value="Baja California" >Baja California</option>
                    <option value="Baja California Sur">Baja California Sur</option>
                    <option value="Campeche">Campeche</option>
                    <option value="Coahuila">Coahuila</option>
                    <option value="Colima">Colima</option>
                    <option value="Chiapas">Chiapas</option>
                    <option value="Chihuahua">Chihuahua</option>
                    <option value="Distrito Federal">Distrito Federal</option>
                    <option value="Durangod">Durango</option>
                    <option value="Guanajuato">Guanajuato</option>
                    <option value="Guerrero">Guerrero</option>
                    <option value="Hidalgo">Hidalgo</option>
                    <option value="Jalisco">Jalisco</option>
                    <option value="México">México</option>
                     <option value="Michoacán">Michoacán</option>
                     <option value="Morelos">Morelos</option>
                    <option value="Nayarit" >Nayarit</option>
                    <option value="Nuevo León" selected>Nuevo León</option>
                    <option value="Oaxaca">Oaxaca</option>
                    <option value="Puebla">Puebla</option>
                    <option value="Querétaro">Querétaro</option>
                    <option value="Quintana Roo">Quintana Roo</option>
                    <option value="San Luis Potosí">San Luis Potosí</option>
                    <option value="Sinaloa">Sinaloa</option>
                    <option value="Sonora">Sonora</option>
                    <option value="Tabasco">Tabasco</option>
                    <option value="Tamaulipas">Tamaulipas</option>
                    <option value="Tlaxcala">Tlaxcala</option>
                    <option value="Veracruz">Veracruz</option>
                    <option value="Yucatán">Yucatán</option>
                    <option value="Zacatecas">Zacatecas</option>
                    <option value="Extranjero">Nacido Extranjero</option>
        @elseif($emple->estadoz == 'Oaxaca')
                    <option  value="">Estados</option>
                     <option value="Aguascaliente" >Aguascalientes</option>}
                     <option value="Baja California" >Baja California</option>
                    <option value="Baja California Sur">Baja California Sur</option>
                    <option value="Campeche">Campeche</option>
                    <option value="Coahuila">Coahuila</option>
                    <option value="Colima">Colima</option>
                    <option value="Chiapas">Chiapas</option>
                    <option value="Chihuahua">Chihuahua</option>
                    <option value="Distrito Federal">Distrito Federal</option>
                    <option value="Durangod">Durango</option>
                    <option value="Guanajuato">Guanajuato</option>
                    <option value="Guerrero">Guerrero</option>
                    <option value="Hidalgo">Hidalgo</option>
                    <option value="Jalisco">Jalisco</option>
                    <option value="México">México</option>
                     <option value="Michoacán">Michoacán</option>
                     <option value="Morelos">Morelos</option>
                    <option value="Nayarit" >Nayarit</option>
                    <option value="Nuevo León">Nuevo León</option>
                    <option value="Oaxaca" selected>Oaxaca</option>
                    <option value="Puebla">Puebla</option>
                    <option value="Querétaro">Querétaro</option>
                    <option value="Quintana Roo">Quintana Roo</option>
                    <option value="San Luis Potosí">San Luis Potosí</option>
                    <option value="Sinaloa">Sinaloa</option>
                    <option value="Sonora">Sonora</option>
                    <option value="Tabasco">Tabasco</option>
                    <option value="Tamaulipas">Tamaulipas</option>
                    <option value="Tlaxcala">Tlaxcala</option>
                    <option value="Veracruz">Veracruz</option>
                    <option value="Yucatán">Yucatán</option>
                    <option value="Zacatecas">Zacatecas</option>
                    <option value="Extranjero">Nacido Extranjero</option>
        @elseif($emple->estadoz == 'Puebla')
                    <option  value="">Estados</option>
                     <option value="Aguascaliente" >Aguascalientes</option>}
                     <option value="Baja California" >Baja California</option>
                    <option value="Baja California Sur">Baja California Sur</option>
                    <option value="Campeche">Campeche</option>
                    <option value="Coahuila">Coahuila</option>
                    <option value="Colima">Colima</option>
                    <option value="Chiapas">Chiapas</option>
                    <option value="Chihuahua">Chihuahua</option>
                    <option value="Distrito Federal">Distrito Federal</option>
                    <option value="Durangod">Durango</option>
                    <option value="Guanajuato">Guanajuato</option>
                    <option value="Guerrero">Guerrero</option>
                    <option value="Hidalgo">Hidalgo</option>
                    <option value="Jalisco">Jalisco</option>
                    <option value="México">México</option>
                     <option value="Michoacán">Michoacán</option>
                     <option value="Morelos">Morelos</option>
                    <option value="Nayarit" >Nayarit</option>
                    <option value="Nuevo León">Nuevo León</option>
                    <option value="Oaxaca">Oaxaca</option>
                    <option value="Puebla" selected>Puebla</option>
                    <option value="Querétaro">Querétaro</option>
                    <option value="Quintana Roo">Quintana Roo</option>
                    <option value="San Luis Potosí">San Luis Potosí</option>
                    <option value="Sinaloa">Sinaloa</option>
                    <option value="Sonora">Sonora</option>
                    <option value="Tabasco">Tabasco</option>
                    <option value="Tamaulipas">Tamaulipas</option>
                    <option value="Tlaxcala">Tlaxcala</option>
                    <option value="Veracruz">Veracruz</option>
                    <option value="Yucatán">Yucatán</option>
                    <option value="Zacatecas">Zacatecas</option>
                    <option value="Extranjero">Nacido Extranjero</option>
        @elseif($emple->estadoz == 'Queretaro')
                    <option  value="">Estados</option>
                     <option value="Aguascaliente" >Aguascalientes</option>}
                     <option value="Baja California" >Baja California</option>
                    <option value="Baja California Sur">Baja California Sur</option>
                    <option value="Campeche">Campeche</option>
                    <option value="Coahuila">Coahuila</option>
                    <option value="Colima">Colima</option>
                    <option value="Chiapas">Chiapas</option>
                    <option value="Chihuahua">Chihuahua</option>
                    <option value="Distrito Federal">Distrito Federal</option>
                    <option value="Durangod">Durango</option>
                    <option value="Guanajuato">Guanajuato</option>
                    <option value="Guerrero">Guerrero</option>
                    <option value="Hidalgo">Hidalgo</option>
                    <option value="Jalisco">Jalisco</option>
                    <option value="México">México</option>
                     <option value="Michoacán">Michoacán</option>
                     <option value="Morelos">Morelos</option>
                    <option value="Nayarit" >Nayarit</option>
                    <option value="Nuevo León">Nuevo León</option>
                    <option value="Oaxaca">Oaxaca</option>
                    <option value="Puebla">Puebla</option>
                    <option value="Querétaro" selected>Querétaro</option>
                    <option value="Quintana Roo">Quintana Roo</option>
                    <option value="San Luis Potosí">San Luis Potosí</option>
                    <option value="Sinaloa">Sinaloa</option>
                    <option value="Sonora">Sonora</option>
                    <option value="Tabasco">Tabasco</option>
                    <option value="Tamaulipas">Tamaulipas</option>
                    <option value="Tlaxcala">Tlaxcala</option>
                    <option value="Veracruz">Veracruz</option>
                    <option value="Yucatán">Yucatán</option>
                    <option value="Zacatecas">Zacatecas</option>
                    <option value="Extranjero">Nacido Extranjero</option>
        @elseif($emple->estadoz == 'Quintana Roo')
                    <option  value="">Estados</option>
                     <option value="Aguascaliente" >Aguascalientes</option>}
                     <option value="Baja California" >Baja California</option>
                    <option value="Baja California Sur">Baja California Sur</option>
                    <option value="Campeche">Campeche</option>
                    <option value="Coahuila">Coahuila</option>
                    <option value="Colima">Colima</option>
                    <option value="Chiapas">Chiapas</option>
                    <option value="Chihuahua">Chihuahua</option>
                    <option value="Distrito Federal">Distrito Federal</option>
                    <option value="Durangod">Durango</option>
                    <option value="Guanajuato">Guanajuato</option>
                    <option value="Guerrero">Guerrero</option>
                    <option value="Hidalgo">Hidalgo</option>
                    <option value="Jalisco">Jalisco</option>
                    <option value="México">México</option>
                     <option value="Michoacán">Michoacán</option>
                     <option value="Morelos">Morelos</option>
                    <option value="Nayarit" >Nayarit</option>
                    <option value="Nuevo León">Nuevo León</option>
                    <option value="Oaxaca">Oaxaca</option>
                    <option value="Puebla">Puebla</option>
                    <option value="Querétaro">Querétaro</option>
                    <option value="Quintana Roo" selected>Quintana Roo</option>
                    <option value="San Luis Potosí">San Luis Potosí</option>
                    <option value="Sinaloa">Sinaloa</option>
                    <option value="Sonora">Sonora</option>
                    <option value="Tabasco">Tabasco</option>
                    <option value="Tamaulipas">Tamaulipas</option>
                    <option value="Tlaxcala">Tlaxcala</option>
                    <option value="Veracruz">Veracruz</option>
                    <option value="Yucatán">Yucatán</option>
                    <option value="Zacatecas">Zacatecas</option>
                    <option value="Extranjero">Nacido Extranjero</option>
        @elseif($emple->estadoz == 'San Luis Potosi')
                    <option  value="">Estados</option>
                     <option value="Aguascaliente" >Aguascalientes</option>}
                     <option value="Baja California" >Baja California</option>
                    <option value="Baja California Sur">Baja California Sur</option>
                    <option value="Campeche">Campeche</option>
                    <option value="Coahuila">Coahuila</option>
                    <option value="Colima">Colima</option>
                    <option value="Chiapas">Chiapas</option>
                    <option value="Chihuahua">Chihuahua</option>
                    <option value="Distrito Federal">Distrito Federal</option>
                    <option value="Durangod">Durango</option>
                    <option value="Guanajuato">Guanajuato</option>
                    <option value="Guerrero">Guerrero</option>
                    <option value="Hidalgo">Hidalgo</option>
                    <option value="Jalisco">Jalisco</option>
                    <option value="México">México</option>
                     <option value="Michoacán">Michoacán</option>
                     <option value="Morelos">Morelos</option>
                    <option value="Nayarit" >Nayarit</option>
                    <option value="Nuevo León">Nuevo León</option>
                    <option value="Oaxaca">Oaxaca</option>
                    <option value="Puebla">Puebla</option>
                    <option value="Querétaro">Querétaro</option>
                    <option value="Quintana Roo">Quintana Roo</option>
                    <option value="San Luis Potosí" selected>San Luis Potosí</option>
                    <option value="Sinaloa">Sinaloa</option>
                    <option value="Sonora">Sonora</option>
                    <option value="Tabasco">Tabasco</option>
                    <option value="Tamaulipas">Tamaulipas</option>
                    <option value="Tlaxcala">Tlaxcala</option>
                    <option value="Veracruz">Veracruz</option>
                    <option value="Yucatán">Yucatán</option>
                    <option value="Zacatecas">Zacatecas</option>
                    <option value="Extranjero">Nacido Extranjero</option>
        @elseif($emple->estadoz == 'Sinaloa')
                    <option  value="">Estados</option>
                     <option value="Aguascaliente" >Aguascalientes</option>}
                     <option value="Baja California" >Baja California</option>
                    <option value="Baja California Sur">Baja California Sur</option>
                    <option value="Campeche">Campeche</option>
                    <option value="Coahuila">Coahuila</option>
                    <option value="Colima">Colima</option>
                    <option value="Chiapas">Chiapas</option>
                    <option value="Chihuahua">Chihuahua</option>
                    <option value="Distrito Federal">Distrito Federal</option>
                    <option value="Durangod">Durango</option>
                    <option value="Guanajuato">Guanajuato</option>
                    <option value="Guerrero">Guerrero</option>
                    <option value="Hidalgo">Hidalgo</option>
                    <option value="Jalisco">Jalisco</option>
                    <option value="México">México</option>
                     <option value="Michoacán">Michoacán</option>
                     <option value="Morelos">Morelos</option>
                    <option value="Nayarit" >Nayarit</option>
                    <option value="Nuevo León">Nuevo León</option>
                    <option value="Oaxaca">Oaxaca</option>
                    <option value="Puebla">Puebla</option>
                    <option value="Querétaro">Querétaro</option>
                    <option value="Quintana Roo">Quintana Roo</option>
                    <option value="San Luis Potosí">San Luis Potosí</option>
                    <option value="Sinaloa" selected>Sinaloa</option>
                    <option value="Sonora">Sonora</option>
                    <option value="Tabasco">Tabasco</option>
                    <option value="Tamaulipas">Tamaulipas</option>
                    <option value="Tlaxcala">Tlaxcala</option>
                    <option value="Veracruz">Veracruz</option>
                    <option value="Yucatán">Yucatán</option>
                    <option value="Zacatecas">Zacatecas</option>
                    <option value="Extranjero">Nacido Extranjero</option>
        @elseif($emple->estadoz == 'Sonora')
                    <option  value="">Estados</option>
                     <option value="Aguascaliente" >Aguascalientes</option>}
                     <option value="Baja California" >Baja California</option>
                    <option value="Baja California Sur">Baja California Sur</option>
                    <option value="Campeche">Campeche</option>
                    <option value="Coahuila">Coahuila</option>
                    <option value="Colima">Colima</option>
                    <option value="Chiapas">Chiapas</option>
                    <option value="Chihuahua">Chihuahua</option>
                    <option value="Distrito Federal">Distrito Federal</option>
                    <option value="Durangod">Durango</option>
                    <option value="Guanajuato">Guanajuato</option>
                    <option value="Guerrero">Guerrero</option>
                    <option value="Hidalgo">Hidalgo</option>
                    <option value="Jalisco">Jalisco</option>
                    <option value="México">México</option>
                     <option value="Michoacán">Michoacán</option>
                     <option value="Morelos">Morelos</option>
                    <option value="Nayarit" >Nayarit</option>
                    <option value="Nuevo León">Nuevo León</option>
                    <option value="Oaxaca">Oaxaca</option>
                    <option value="Puebla">Puebla</option>
                    <option value="Querétaro">Querétaro</option>
                    <option value="Quintana Roo">Quintana Roo</option>
                    <option value="San Luis Potosí">San Luis Potosí</option>
                    <option value="Sinaloa" selected>Sinaloa</option>
                    <option value="Sonora">Sonora</option>
                    <option value="Tabasco">Tabasco</option>
                    <option value="Tamaulipas">Tamaulipas</option>
                    <option value="Tlaxcala">Tlaxcala</option>
                    <option value="Veracruz">Veracruz</option>
                    <option value="Yucatán">Yucatán</option>
                    <option value="Zacatecas">Zacatecas</option>
                    <option value="Extranjero">Nacido Extranjero</option>
        @elseif($emple->estadoz == 'Tabasco')
                    <option  value="">Estados</option>
                     <option value="Aguascaliente" >Aguascalientes</option>}
                     <option value="Baja California" >Baja California</option>
                    <option value="Baja California Sur">Baja California Sur</option>
                    <option value="Campeche">Campeche</option>
                    <option value="Coahuila">Coahuila</option>
                    <option value="Colima">Colima</option>
                    <option value="Chiapas">Chiapas</option>
                    <option value="Chihuahua">Chihuahua</option>
                    <option value="Distrito Federal">Distrito Federal</option>
                    <option value="Durangod">Durango</option>
                    <option value="Guanajuato">Guanajuato</option>
                    <option value="Guerrero">Guerrero</option>
                    <option value="Hidalgo">Hidalgo</option>
                    <option value="Jalisco">Jalisco</option>
                    <option value="México">México</option>
                     <option value="Michoacán">Michoacán</option>
                     <option value="Morelos">Morelos</option>
                    <option value="Nayarit" >Nayarit</option>
                    <option value="Nuevo León">Nuevo León</option>
                    <option value="Oaxaca">Oaxaca</option>
                    <option value="Puebla">Puebla</option>
                    <option value="Querétaro">Querétaro</option>
                    <option value="Quintana Roo">Quintana Roo</option>
                    <option value="San Luis Potosí">San Luis Potosí</option>
                    <option value="Sinaloa">Sinaloa</option>
                    <option value="Sonora">Sonora</option>
                    <option value="Tabasco" selected>Tabasco</option>
                    <option value="Tamaulipas">Tamaulipas</option>
                    <option value="Tlaxcala">Tlaxcala</option>
                    <option value="Veracruz">Veracruz</option>
                    <option value="Yucatán">Yucatán</option>
                    <option value="Zacatecas">Zacatecas</option>
                    <option value="Extranjero">Nacido Extranjero</option>
        @elseif($emple->estadoz == 'Tamaulipas')
                    <option  value="">Estados</option>
                     <option value="Aguascaliente" >Aguascalientes</option>}
                     <option value="Baja California" >Baja California</option>
                    <option value="Baja California Sur">Baja California Sur</option>
                    <option value="Campeche">Campeche</option>
                    <option value="Coahuila">Coahuila</option>
                    <option value="Colima">Colima</option>
                    <option value="Chiapas">Chiapas</option>
                    <option value="Chihuahua">Chihuahua</option>
                    <option value="Distrito Federal">Distrito Federal</option>
                    <option value="Durangod">Durango</option>
                    <option value="Guanajuato">Guanajuato</option>
                    <option value="Guerrero">Guerrero</option>
                    <option value="Hidalgo">Hidalgo</option>
                    <option value="Jalisco">Jalisco</option>
                    <option value="México">México</option>
                     <option value="Michoacán">Michoacán</option>
                     <option value="Morelos">Morelos</option>
                    <option value="Nayarit" >Nayarit</option>
                    <option value="Nuevo León">Nuevo León</option>
                    <option value="Oaxaca">Oaxaca</option>
                    <option value="Puebla">Puebla</option>
                    <option value="Querétaro">Querétaro</option>
                    <option value="Quintana Roo">Quintana Roo</option>
                    <option value="San Luis Potosí">San Luis Potosí</option>
                    <option value="Sinaloa">Sinaloa</option>
                    <option value="Sonora">Sonora</option>
                    <option value="Tabasco">Tabasco</option>
                    <option value="Tamaulipas" selected>Tamaulipas</option>
                    <option value="Tlaxcala">Tlaxcala</option>
                    <option value="Veracruz">Veracruz</option>
                    <option value="Yucatán">Yucatán</option>
                    <option value="Zacatecas">Zacatecas</option>
                    <option value="Extranjero">Nacido Extranjero</option>
        @elseif($emple->estadoz == 'Tlaxcala')
                    <option  value="">Estados</option>
                     <option value="Aguascaliente" >Aguascalientes</option>}
                     <option value="Baja California" >Baja California</option>
                    <option value="Baja California Sur">Baja California Sur</option>
                    <option value="Campeche">Campeche</option>
                    <option value="Coahuila">Coahuila</option>
                    <option value="Colima">Colima</option>
                    <option value="Chiapas">Chiapas</option>
                    <option value="Chihuahua">Chihuahua</option>
                    <option value="Distrito Federal">Distrito Federal</option>
                    <option value="Durangod">Durango</option>
                    <option value="Guanajuato">Guanajuato</option>
                    <option value="Guerrero">Guerrero</option>
                    <option value="Hidalgo">Hidalgo</option>
                    <option value="Jalisco">Jalisco</option>
                    <option value="México">México</option>
                     <option value="Michoacán">Michoacán</option>
                     <option value="Morelos">Morelos</option>
                    <option value="Nayarit" >Nayarit</option>
                    <option value="Nuevo León">Nuevo León</option>
                    <option value="Oaxaca">Oaxaca</option>
                    <option value="Puebla">Puebla</option>
                    <option value="Querétaro">Querétaro</option>
                    <option value="Quintana Roo">Quintana Roo</option>
                    <option value="San Luis Potosí">San Luis Potosí</option>
                    <option value="Sinaloa">Sinaloa</option>
                    <option value="Sonora">Sonora</option>
                    <option value="Tabasco">Tabasco</option>
                    <option value="Tamaulipas">Tamaulipas</option>
                    <option value="Tlaxcala" selected>Tlaxcala</option>
                    <option value="Veracruz">Veracruz</option>
                    <option value="Yucatán">Yucatán</option>
                    <option value="Zacatecas">Zacatecas</option>
                    <option value="Extranjero">Nacido Extranjero</option>
        @elseif($emple->estadoz == 'Veracruz')
                    <option  value="">Estados</option>
                     <option value="Aguascaliente" >Aguascalientes</option>}
                     <option value="Baja California" >Baja California</option>
                    <option value="Baja California Sur">Baja California Sur</option>
                    <option value="Campeche">Campeche</option>
                    <option value="Coahuila">Coahuila</option>
                    <option value="Colima">Colima</option>
                    <option value="Chiapas">Chiapas</option>
                    <option value="Chihuahua">Chihuahua</option>
                    <option value="Distrito Federal">Distrito Federal</option>
                    <option value="Durangod">Durango</option>
                    <option value="Guanajuato">Guanajuato</option>
                    <option value="Guerrero">Guerrero</option>
                    <option value="Hidalgo">Hidalgo</option>
                    <option value="Jalisco">Jalisco</option>
                    <option value="México">México</option>
                     <option value="Michoacán">Michoacán</option>
                     <option value="Morelos">Morelos</option>
                    <option value="Nayarit" >Nayarit</option>
                    <option value="Nuevo León">Nuevo León</option>
                    <option value="Oaxaca">Oaxaca</option>
                    <option value="Puebla">Puebla</option>
                    <option value="Querétaro">Querétaro</option>
                    <option value="Quintana Roo">Quintana Roo</option>
                    <option value="San Luis Potosí">San Luis Potosí</option>
                    <option value="Sinaloa">Sinaloa</option>
                    <option value="Sonora">Sonora</option>
                    <option value="Tabasco">Tabasco</option>
                    <option value="Tamaulipas">Tamaulipas</option>
                    <option value="Tlaxcala">Tlaxcala</option>
                    <option value="Veracruz" selected>Veracruz</option>
                    <option value="Yucatán">Yucatán</option>
                    <option value="Zacatecas">Zacatecas</option>
                    <option value="Extranjero">Nacido Extranjero</option>
        @elseif($emple->estadoz == 'Yucatan')
                    <option  value="">Estados</option>
                     <option value="Aguascaliente" >Aguascalientes</option>}
                     <option value="Baja California" >Baja California</option>
                    <option value="Baja California Sur">Baja California Sur</option>
                    <option value="Campeche">Campeche</option>
                    <option value="Coahuila">Coahuila</option>
                    <option value="Colima">Colima</option>
                    <option value="Chiapas">Chiapas</option>
                    <option value="Chihuahua">Chihuahua</option>
                    <option value="Distrito Federal">Distrito Federal</option>
                    <option value="Durangod">Durango</option>
                    <option value="Guanajuato">Guanajuato</option>
                    <option value="Guerrero">Guerrero</option>
                    <option value="Hidalgo">Hidalgo</option>
                    <option value="Jalisco">Jalisco</option>
                    <option value="México">México</option>
                     <option value="Michoacán">Michoacán</option>
                     <option value="Morelos">Morelos</option>
                    <option value="Nayarit" >Nayarit</option>
                    <option value="Nuevo León">Nuevo León</option>
                    <option value="Oaxaca">Oaxaca</option>
                    <option value="Puebla">Puebla</option>
                    <option value="Querétaro">Querétaro</option>
                    <option value="Quintana Roo">Quintana Roo</option>
                    <option value="San Luis Potosí">San Luis Potosí</option>
                    <option value="Sinaloa">Sinaloa</option>
                    <option value="Sonora">Sonora</option>
                    <option value="Tabasco">Tabasco</option>
                    <option value="Tamaulipas">Tamaulipas</option>
                    <option value="Tlaxcala">Tlaxcala</option>
                    <option value="Veracruz">Veracruz</option>
                    <option value="Yucatán" selected>Yucatán</option>
                    <option value="Zacatecas">Zacatecas</option>
                    <option value="Extranjero">Nacido Extranjero</option>
        @elseif($emple->estadoz == 'Zacatecas')
                    <option  value="">Estados</option>
                     <option value="Aguascaliente" >Aguascalientes</option>}
                     <option value="Baja California" >Baja California</option>
                    <option value="Baja California Sur">Baja California Sur</option>
                    <option value="Campeche">Campeche</option>
                    <option value="Coahuila">Coahuila</option>
                    <option value="Colima">Colima</option>
                    <option value="Chiapas">Chiapas</option>
                    <option value="Chihuahua">Chihuahua</option>
                    <option value="Distrito Federal">Distrito Federal</option>
                    <option value="Durangod">Durango</option>
                    <option value="Guanajuato">Guanajuato</option>
                    <option value="Guerrero">Guerrero</option>
                    <option value="Hidalgo">Hidalgo</option>
                    <option value="Jalisco">Jalisco</option>
                    <option value="México">México</option>
                     <option value="Michoacán">Michoacán</option>
                     <option value="Morelos">Morelos</option>
                    <option value="Nayarit" >Nayarit</option>
                    <option value="Nuevo León">Nuevo León</option>
                    <option value="Oaxaca">Oaxaca</option>
                    <option value="Puebla">Puebla</option>
                    <option value="Querétaro">Querétaro</option>
                    <option value="Quintana Roo">Quintana Roo</option>
                    <option value="San Luis Potosí">San Luis Potosí</option>
                    <option value="Sinaloa">Sinaloa</option>
                    <option value="Sonora">Sonora</option>
                    <option value="Tabasco">Tabasco</option>
                    <option value="Tamaulipas">Tamaulipas</option>
                    <option value="Tlaxcala">Tlaxcala</option>
                    <option value="Veracruz">Veracruz</option>
                    <option value="Yucatán">Yucatán</option>
                    <option value="Zacatecas" selected>Zacatecas</option>
                    <option value="Extranjero">Nacido Extranjero</option>
                @else
                    <option  value="">Estados</option>
                     <option value="Aguascaliente" >Aguascalientes</option>}
                     <option value="Baja California" >Baja California</option>
                    <option value="Baja California Sur">Baja California Sur</option>
                    <option value="Campeche">Campeche</option>
                    <option value="Coahuila">Coahuila</option>
                    <option value="Colima">Colima</option>
                    <option value="Chiapas">Chiapas</option>
                    <option value="Chihuahua">Chihuahua</option>
                    <option value="Distrito Federal">Distrito Federal</option>
                    <option value="Durangod">Durango</option>
                    <option value="Guanajuato">Guanajuato</option>
                    <option value="Guerrero">Guerrero</option>
                    <option value="Hidalgo">Hidalgo</option>
                    <option value="Jalisco">Jalisco</option>
                    <option value="México">México</option>
                     <option value="Michoacán">Michoacán</option>
                     <option value="Morelos">Morelos</option>
                    <option value="Nayarit" >Nayarit</option>
                    <option value="Nuevo León">Nuevo León</option>
                    <option value="Oaxaca">Oaxaca</option>
                    <option value="Puebla">Puebla</option>
                    <option value="Querétaro">Querétaro</option>
                    <option value="Quintana Roo">Quintana Roo</option>
                    <option value="San Luis Potosí">San Luis Potosí</option>
                    <option value="Sinaloa">Sinaloa</option>
                    <option value="Sonora">Sonora</option>
                    <option value="Tabasco">Tabasco</option>
                    <option value="Tamaulipas">Tamaulipas</option>
                    <option value="Tlaxcala">Tlaxcala</option>
                    <option value="Veracruz">Veracruz</option>
                    <option value="Yucatán">Yucatán</option>
                    <option value="Zacatecas">Zacatecas</option>
                    <option value="Extranjero" selected>Nacido Extranjero</option>
                    <option value="" selected>Selecciona un estado:</option>
                @endif
                                    </select>  
                                    </div>
                                </div>  

                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="municipio">Municipio</label>
                                        <input type="text"  name="municipio" class="form-control" value="{{$emple->municipio}}"  >
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="ciudad">Ciudad</label>
                                        <input type="text" name="ciudad" class="form-control" value="{{$emple->ciudad}}">  
                                    </div>
                                </div> 
            
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group {{$errors->has('fechaNacimiento') ? 'has-error' : ''}}">
                                        <label for="fechaNacimiento">Fecha de Nacimiento</label>
                                        <input type="date" name="fechaNacimiento" class="form-control" value="{{$emple->fechaNacimiento or ''}}">
                                    </div>
                                </div>

                             <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label for="genero">Genero</label>
                                    <select name="genero"   class="form-control selectpicker" data-live-search="true">

                                        @if($emple->genero == 'M')
                                        
                                        <option value="M" selected>Masculino</option>
                                        <option value="F">Femenino</option>
                                        @else
                                        <option value="">Seleciona</option>
                                        <option value="M" >Masculino</option>
                                        <option value="F" selected>Femenino</option>
                                        <option value="" select>Seleciona</option>
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label for="claveCiudadana">Curp</label>
                                    <input type="text" class="form-control" placeholder="Curp..." name="claveCiudadana" value="{{$emple->claveCiudadana}}" function wordlimit($string, $length = 18,) onkeyup="javascript:this.value=this.value.toUpperCase();">  
                                 </div>
                            </div>

                             <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="estadoCivil">Estado Civil</label>
                                        <select name="estadoCivil" value="" class="form-control" >
                                        @if($emple->estadoCivil == 'S')
                                            <option value="">Seleciona</option>
                                            <option value="S" selected>Soltero(a)</option>
                                            <option value="C">Casado(a)</option>
                                            <option value="U">Unión Libre</option>
                                            <option value="D">Divorciado(a)</option>
                                            <option value="V">Viudo(a)</option>
                                        @elseif($emple->estadoCivil == 'C')
                                            <option value="">Seleciona</option>
                                            <option value="S">Soltero(a)</option>
                                            <option value="C" selected>Casado(a)</option>
                                            <option value="U">Unión Libre</option>
                                            <option value="D">Divorciado(a)</option>
                                            <option value="V">Viudo(a)</option>
                                        @elseif($emple->estadoCivil == 'U')
                                            <option value="">Seleciona</option>
                                            <option value="S">Soltero(a)</option>
                                            <option value="C" >Casado(a)</option>
                                            <option value="U" selected>Unión Libre</option>
                                            <option value="D">Divorciado(a)</option>
                                            <option value="V">Viudo(a)</option>
                                        @elseif($emple->estadoCivil == 'D')
                                            <option value="">Seleciona</option>
                                            <option value="S">Soltero(a)</option>
                                            <option value="C" >Casado(a)</option>
                                            <option value="U" >Unión Libre</option>
                                            <option value="D" selected>Divorciado(a)</option>
                                            <option value="V">Viudo(a)</option>
                                        @else
                                            <option value="">Seleciona</option>
                                            <option value="S">Soltero(a)</option>
                                            <option value="C" >Casado(a)</option>
                                            <option value="U" >Unión Libre</option>
                                            <option value="D" >Divorciado(a)</option>
                                            <option value="V" selected>Viudo(a)</option>
                                        @endif
                                        </select>     
                                    </div>
                                </div>

                                <div class="col-md-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><STRONG>Domicilio y Localización:</STRONG></span>  
                                </div>
                            </div>
                                <br>

                                <div class="col-md-12">
                                    <div class="form-group {{$errors->has('domicilio') ? 'has-error' : ''}}"">
                                        <label for="domicilio">Domicilio</label>
                                        <input type="text" name="domicilio"  value="{{$emple->domicilio or ''}}" class="form-control">
                                     </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group {{$errors->has('estadoActual') ? 'has-error' : ''}}">   
                                    <label for="estadoActual" >estadoActual</label>
                                        <select name="estadoActual" values="select" class="form-control selectpicker" data-live-search="true">
                 @if($emple->estadoActual == 'Aguascalientes')
                    <option  value="">Estados</option>
                     <option value="Aguascaliente" selected>Aguascalientes</option>}
                     <option value="Baja California" >Baja California</option>
                    <option value="Baja California Sur">Baja California Sur</option>
                    <option value="Campeche">Campeche</option>
                    <option value="Coahuila">Coahuila</option>
                    <option value="Colima">Colima</option>
                    <option value="Chiapas">Chiapas</option>
                    <option value="Chihuahua">Chihuahua</option>
                    <option value="Distrito Federal">Distrito Federal</option>
                    <option value="Durangod">Durango</option>
                    <option value="Guanajuato">Guanajuato</option>
                    <option value="Guerrero">Guerrero</option>
                    <option value="Hidalgo">Hidalgo</option>
                    <option value="Jalisco">Jalisco</option>
                    <option value="México">México</option>
                     <option value="Michoacán">Michoacán</option>
                     <option value="Morelos">Morelos</option>
                    <option value="Nayarit" >Nayarit</option>
                    <option value="Nuevo León">Nuevo León</option>
                    <option value="Oaxaca">Oaxaca</option>
                    <option value="Puebla">Puebla</option></option>
                    <option value="Querétaro">Querétaro</option>
                    <option value="Quintana Roo">Quintana Roo</option>
                    <option value="San Luis Potosí">San Luis Potosí</option>
                    <option value="Sinaloa">Sinaloa</option>
                    <option value="Sonora">Sonora</option>
                    <option value="Tabasco">Tabasco</option>
                    <option value="Tamaulipas">Tamaulipas</option>
                    <option value="Tlaxcala">Tlaxcala</option>
                    <option value="Veracruz">Veracruz</option>
                    <option value="Yucatán">Yucatán</option>
                    <option value="Zacatecas">Zacatecas</option>
                    <option value="Extranjero">Nacido Extranjero</option>
        @elseif($emple->estadoActual == 'Baja California')
        <option  value="">Estados</option>
                     <option value="Aguascaliente" >Aguascalientes</option>}
                     <option value="Baja California" selected>Baja California</option>
                    <option value="Baja California Sur">Baja California Sur</option>
                    <option value="Campeche">Campeche</option>
                    <option value="Coahuila">Coahuila</option>
                    <option value="Colima">Colima</option>
                    <option value="Chiapas">Chiapas</option>
                    <option value="Chihuahua">Chihuahua</option>
                    <option value="Distrito Federal">Distrito Federal</option>
                    <option value="Durangod">Durango</option>
                    <option value="Guanajuato">Guanajuato</option>
                    <option value="Guerrero">Guerrero</option>
                    <option value="Hidalgo">Hidalgo</option>
                    <option value="Jalisco">Jalisco</option>
                    <option value="México">México</option>
                     <option value="Michoacán">Michoacán</option>
                     <option value="Morelos">Morelos</option>
                    <option value="Nayarit" >Nayarit</option>
                    <option value="Nuevo León">Nuevo León</option>
                    <option value="Oaxaca">Oaxaca</option>
                    <option value="Puebla">Puebla</option></option>
                    <option value="Querétaro">Querétaro</option>
                    <option value="Quintana Roo">Quintana Roo</option>
                    <option value="San Luis Potosí">San Luis Potosí</option>
                    <option value="Sinaloa">Sinaloa</option>
                    <option value="Sonora">Sonora</option>
                    <option value="Tabasco">Tabasco</option>
                    <option value="Tamaulipas">Tamaulipas</option>
                    <option value="Tlaxcala">Tlaxcala</option>
                    <option value="Veracruz">Veracruz</option>
                    <option value="Yucatán">Yucatán</option>
                    <option value="Zacatecas">Zacatecas</option>
                    <option value="Extranjero">Nacido Extranjero</option>
        @elseif($emple->estadoActual == 'Baja California Sur')
                    <option  value="">Estados</option>
                     <option value="Aguascaliente" >Aguascalientes</option>}
                     <option value="Baja California" >Baja California</option>
                    <option value="Baja California Sur" selected>Baja California Sur</option>
                    <option value="Campeche">Campeche</option>
                    <option value="Coahuila">Coahuila</option>
                    <option value="Colima">Colima</option>
                    <option value="Chiapas">Chiapas</option>
                    <option value="Chihuahua">Chihuahua</option>
                    <option value="Distrito Federal">Distrito Federal</option>
                    <option value="Durangod">Durango</option>
                    <option value="Guanajuato">Guanajuato</option>
                    <option value="Guerrero">Guerrero</option>
                    <option value="Hidalgo">Hidalgo</option>
                    <option value="Jalisco">Jalisco</option>
                    <option value="México">México</option>
                     <option value="Michoacán">Michoacán</option>
                     <option value="Morelos">Morelos</option>
                    <option value="Nayarit" >Nayarit</option>
                    <option value="Nuevo León">Nuevo León</option>
                    <option value="Oaxaca">Oaxaca</option>
                    <option value="Puebla">Puebla</option>
                    <option value="Querétaro">Querétaro</option>
                    <option value="Quintana Roo">Quintana Roo</option>
                    <option value="San Luis Potosí">San Luis Potosí</option>
                    <option value="Sinaloa">Sinaloa</option>
                    <option value="Sonora">Sonora</option>
                    <option value="Tabasco">Tabasco</option>
                    <option value="Tamaulipas">Tamaulipas</option>
                    <option value="Tlaxcala">Tlaxcala</option>
                    <option value="Veracruz">Veracruz</option>
                    <option value="Yucatán">Yucatán</option>
                    <option value="Zacatecas">Zacatecas</option>
                    <option value="Extranjero">Nacido Extranjero</option>
        @elseif($emple->estadoActual == 'Campeche')
                    <option  value="">Estados</option>
                     <option value="Aguascaliente" >Aguascalientes</option>}
                     <option value="Baja California" >Baja California</option>
                    <option value="Baja California Sur">Baja California Sur</option>
                    <option value="Campeche" selected>Campeche</option>
                    <option value="Coahuila">Coahuila</option>
                    <option value="Colima">Colima</option>
                    <option value="Chiapas">Chiapas</option>
                    <option value="Chihuahua">Chihuahua</option>
                    <option value="Distrito Federal">Distrito Federal</option>
                    <option value="Durangod">Durango</option>
                    <option value="Guanajuato">Guanajuato</option>
                    <option value="Guerrero">Guerrero</option>
                    <option value="Hidalgo">Hidalgo</option>
                    <option value="Jalisco">Jalisco</option>
                    <option value="México">México</option>
                     <option value="Michoacán">Michoacán</option>
                     <option value="Morelos">Morelos</option>
                    <option value="Nayarit" >Nayarit</option>
                    <option value="Nuevo León">Nuevo León</option>
                    <option value="Oaxaca">Oaxaca</option>
                    <option value="Puebla">Puebla</option>
                    <option value="Querétaro">Querétaro</option>
                    <option value="Quintana Roo">Quintana Roo</option>
                    <option value="San Luis Potosí">San Luis Potosí</option>
                    <option value="Sinaloa">Sinaloa</option>
                    <option value="Sonora">Sonora</option>
                    <option value="Tabasco">Tabasco</option>
                    <option value="Tamaulipas">Tamaulipas</option>
                    <option value="Tlaxcala">Tlaxcala</option>
                    <option value="Veracruz">Veracruz</option>
                    <option value="Yucatán">Yucatán</option>
                    <option value="Zacatecas">Zacatecas</option>
                    <option value="Extranjero">Nacido Extranjero</option>
        @elseif($emple->estadoActual == 'Coahuila')
                    <option  value="">Estados</option>
                     <option value="Aguascaliente" >Aguascalientes</option>}
                     <option value="Baja California" >Baja California</option>
                    <option value="Baja California Sur">Baja California Sur</option>
                    <option value="Campeche">Campeche</option>
                    <option value="Coahuila" selected>Coahuila</option>
                    <option value="Colima">Colima</option>
                    <option value="Chiapas">Chiapas</option>
                    <option value="Chihuahua">Chihuahua</option>
                    <option value="Distrito Federal">Distrito Federal</option>
                    <option value="Durangod">Durango</option>
                    <option value="Guanajuato">Guanajuato</option>
                    <option value="Guerrero">Guerrero</option>
                    <option value="Hidalgo">Hidalgo</option>
                    <option value="Jalisco">Jalisco</option>
                    <option value="México">México</option>
                     <option value="Michoacán">Michoacán</option>
                     <option value="Morelos">Morelos</option>
                    <option value="Nayarit" >Nayarit</option>
                    <option value="Nuevo León">Nuevo León</option>
                    <option value="Oaxaca">Oaxaca</option>
                    <option value="Puebla">Puebla</option>
                    <option value="Querétaro">Querétaro</option>
                    <option value="Quintana Roo">Quintana Roo</option>
                    <option value="San Luis Potosí">San Luis Potosí</option>
                    <option value="Sinaloa">Sinaloa</option>
                    <option value="Sonora">Sonora</option>
                    <option value="Tabasco">Tabasco</option>
                    <option value="Tamaulipas">Tamaulipas</option>
                    <option value="Tlaxcala">Tlaxcala</option>
                    <option value="Veracruz">Veracruz</option>
                    <option value="Yucatán">Yucatán</option>
                    <option value="Zacatecas">Zacatecas</option>
                    <option value="Extranjero">Nacido Extranjero</option>
        @elseif($emple->estadoActual == 'Colima')
                    <option  value="">Estados</option>
                     <option value="Aguascaliente" >Aguascalientes</option>}
                     <option value="Baja California" >Baja California</option>
                    <option value="Baja California Sur">Baja California Sur</option>
                    <option value="Campeche">Campeche</option>
                    <option value="Coahuila">Coahuila</option>
                    <option value="Colima" selcted>Colima</option>
                    <option value="Chiapas">Chiapas</option>
                    <option value="Chihuahua">Chihuahua</option>
                    <option value="Distrito Federal">Distrito Federal</option>
                    <option value="Durangod">Durango</option>
                    <option value="Guanajuato">Guanajuato</option>
                    <option value="Guerrero">Guerrero</option>
                    <option value="Hidalgo">Hidalgo</option>
                    <option value="Jalisco">Jalisco</option>
                    <option value="México">México</option>
                     <option value="Michoacán">Michoacán</option>
                     <option value="Morelos">Morelos</option>
                    <option value="Nayarit" >Nayarit</option>
                    <option value="Nuevo León">Nuevo León</option>
                    <option value="Oaxaca">Oaxaca</option>
                    <option value="Puebla">Puebla</option>
                    <option value="Querétaro">Querétaro</option>
                    <option value="Quintana Roo">Quintana Roo</option>
                    <option value="San Luis Potosí">San Luis Potosí</option>
                    <option value="Sinaloa">Sinaloa</option>
                    <option value="Sonora">Sonora</option>
                    <option value="Tabasco">Tabasco</option>
                    <option value="Tamaulipas">Tamaulipas</option>
                    <option value="Tlaxcala">Tlaxcala</option>
                    <option value="Veracruz">Veracruz</option>
                    <option value="Yucatán">Yucatán</option>
                    <option value="Zacatecas">Zacatecas</option>
                    <option value="Extranjero">Nacido Extranjero</option>
        @elseif($emple->estadoActual == 'Chiapas')
                    <option  value="">Estados</option>
                     <option value="Aguascaliente" >Aguascalientes</option>}
                     <option value="Baja California" >Baja California</option>
                    <option value="Baja California Sur">Baja California Sur</option>
                    <option value="Campeche">Campeche</option>
                    <option value="Coahuila">Coahuila</option>
                    <option value="Colima">Colima</option>
                    <option value="Chiapas" selected>Chiapas</option>
                    <option value="Chihuahua">Chihuahua</option>
                    <option value="Distrito Federal">Distrito Federal</option>
                    <option value="Durangod">Durango</option>
                    <option value="Guanajuato">Guanajuato</option>
                    <option value="Guerrero">Guerrero</option>
                    <option value="Hidalgo">Hidalgo</option>
                    <option value="Jalisco">Jalisco</option>
                    <option value="México">México</option>
                     <option value="Michoacán">Michoacán</option>
                     <option value="Morelos">Morelos</option>
                    <option value="Nayarit" >Nayarit</option>
                    <option value="Nuevo León">Nuevo León</option>
                    <option value="Oaxaca">Oaxaca</option>
                    <option value="Puebla">Puebla</option>
                    <option value="Querétaro">Querétaro</option>
                    <option value="Quintana Roo">Quintana Roo</option>
                    <option value="San Luis Potosí">San Luis Potosí</option>
                    <option value="Sinaloa">Sinaloa</option>
                    <option value="Sonora">Sonora</option>
                    <option value="Tabasco">Tabasco</option>
                    <option value="Tamaulipas">Tamaulipas</option>
                    <option value="Tlaxcala">Tlaxcala</option>
                    <option value="Veracruz">Veracruz</option>
                    <option value="Yucatán">Yucatán</option>
                    <option value="Zacatecas">Zacatecas</option>
                    <option value="Extranjero">Nacido Extranjero</option>
        @elseif($emple->estadoActual == 'Chihuahua')
                    <option  value="">Estados</option>
                     <option value="Aguascaliente" >Aguascalientes</option>}
                     <option value="Baja California" >Baja California</option>
                    <option value="Baja California Sur">Baja California Sur</option>
                    <option value="Campeche">Campeche</option>
                    <option value="Coahuila">Coahuila</option>
                    <option value="Colima">Colima</option>
                    <option value="Chiapas">Chiapas</option>
                    <option value="Chihuahua" selected>Chihuahua</option>
                    <option value="Distrito Federal">Distrito Federal</option>
                    <option value="Durangod">Durango</option>
                    <option value="Guanajuato">Guanajuato</option>
                    <option value="Guerrero">Guerrero</option>
                    <option value="Hidalgo">Hidalgo</option>
                    <option value="Jalisco">Jalisco</option>
                    <option value="México">México</option>
                     <option value="Michoacán">Michoacán</option>
                     <option value="Morelos">Morelos</option>
                    <option value="Nayarit" >Nayarit</option>
                    <option value="Nuevo León">Nuevo León</option>
                    <option value="Oaxaca">Oaxaca</option>
                    <option value="Puebla">Puebla</option>
                    <option value="Querétaro">Querétaro</option>
                    <option value="Quintana Roo">Quintana Roo</option>
                    <option value="San Luis Potosí">San Luis Potosí</option>
                    <option value="Sinaloa">Sinaloa</option>
                    <option value="Sonora">Sonora</option>
                    <option value="Tabasco">Tabasco</option>
                    <option value="Tamaulipas">Tamaulipas</option>
                    <option value="Tlaxcala">Tlaxcala</option>
                    <option value="Veracruz">Veracruz</option>
                    <option value="Yucatán">Yucatán</option>
                    <option value="Zacatecas">Zacatecas</option>
                    <option value="Extranjero">Nacido Extranjero</option>
        @elseif($emple->estadoActual == 'Distrito Federal')
                    <option  value="">Estados</option>
                     <option value="Aguascaliente" >Aguascalientes</option>}
                     <option value="Baja California" >Baja California</option>
                    <option value="Baja California Sur">Baja California Sur</option>
                    <option value="Campeche">Campeche</option>
                    <option value="Coahuila">Coahuila</option>
                    <option value="Colima">Colima</option>
                    <option value="Chiapas">Chiapas</option>
                    <option value="Chihuahua">Chihuahua</option>
                    <option value="Distrito Federal" selected>Distrito Federal</option>
                    <option value="Durangod">Durango</option>
                    <option value="Guanajuato">Guanajuato</option>
                    <option value="Guerrero">Guerrero</option>
                    <option value="Hidalgo">Hidalgo</option>
                    <option value="Jalisco">Jalisco</option>
                    <option value="México">México</option>
                     <option value="Michoacán">Michoacán</option>
                     <option value="Morelos">Morelos</option>
                    <option value="Nayarit" >Nayarit</option>
                    <option value="Nuevo León">Nuevo León</option>
                    <option value="Oaxaca">Oaxaca</option>
                    <option value="Puebla">Puebla</option>
                    <option value="Querétaro">Querétaro</option>
                    <option value="Quintana Roo">Quintana Roo</option>
                    <option value="San Luis Potosí">San Luis Potosí</option>
                    <option value="Sinaloa">Sinaloa</option>
                    <option value="Sonora">Sonora</option>
                    <option value="Tabasco">Tabasco</option>
                    <option value="Tamaulipas">Tamaulipas</option>
                    <option value="Tlaxcala">Tlaxcala</option>
                    <option value="Veracruz">Veracruz</option>
                    <option value="Yucatán">Yucatán</option>
                    <option value="Zacatecas">Zacatecas</option>
                    <option value="Extranjero">Nacido Extranjero</option>
        @elseif($emple->estadoActual == 'Durango')
        <option  value="">Estados</option>
                     <option value="Aguascaliente" >Aguascalientes</option>}
                     <option value="Baja California" >Baja California</option>
                    <option value="Baja California Sur">Baja California Sur</option>
                    <option value="Campeche">Campeche</option>
                    <option value="Coahuila">Coahuila</option>
                    <option value="Colima">Colima</option>
                    <option value="Chiapas">Chiapas</option>
                    <option value="Chihuahua">Chihuahua</option>
                    <option value="Distrito Federal">Distrito Federal</option>
                    <option value="Durangod" selected>Durango</option>
                    <option value="Guanajuato">Guanajuato</option>
                    <option value="Guerrero">Guerrero</option>
                    <option value="Hidalgo">Hidalgo</option>
                    <option value="Jalisco">Jalisco</option>
                    <option value="México">México</option>
                     <option value="Michoacán">Michoacán</option>
                     <option value="Morelos">Morelos</option>
                    <option value="Nayarit" >Nayarit</option>
                    <option value="Nuevo León">Nuevo León</option>
                    <option value="Oaxaca">Oaxaca</option>
                    <option value="Puebla">Puebla</option>
                    <option value="Querétaro">Querétaro</option>
                    <option value="Quintana Roo">Quintana Roo</option>
                    <option value="San Luis Potosí">San Luis Potosí</option>
                    <option value="Sinaloa">Sinaloa</option>
                    <option value="Sonora">Sonora</option>
                    <option value="Tabasco">Tabasco</option>
                    <option value="Tamaulipas">Tamaulipas</option>
                    <option value="Tlaxcala">Tlaxcala</option>
                    <option value="Veracruz">Veracruz</option>
                    <option value="Yucatán">Yucatán</option>
                    <option value="Zacatecas">Zacatecas</option>
                    <option value="Extranjero">Nacido Extranjero</option>
        @elseif($emple->estadoActual == 'Guanajuato')
                    <option  value="">Estados</option>
                     <option value="Aguascaliente" >Aguascalientes</option>}
                     <option value="Baja California" >Baja California</option>
                    <option value="Baja California Sur">Baja California Sur</option>
                    <option value="Campeche">Campeche</option>
                    <option value="Coahuila">Coahuila</option>
                    <option value="Colima">Colima</option>
                    <option value="Chiapas">Chiapas</option>
                    <option value="Chihuahua">Chihuahua</option>
                    <option value="Distrito Federal">Distrito Federal</option>
                    <option value="Durangod">Durango</option>
                    <option value="Guanajuato" selected>Guanajuato</option>
                    <option value="Guerrero">Guerrero</option>
                    <option value="Hidalgo">Hidalgo</option>
                    <option value="Jalisco">Jalisco</option>
                    <option value="México">México</option>
                     <option value="Michoacán">Michoacán</option>
                     <option value="Morelos">Morelos</option>
                    <option value="Nayarit" >Nayarit</option>
                    <option value="Nuevo León">Nuevo León</option>
                    <option value="Oaxaca">Oaxaca</option>
                    <option value="Puebla">Puebla</option>
                    <option value="Querétaro">Querétaro</option>
                    <option value="Quintana Roo">Quintana Roo</option>
                    <option value="San Luis Potosí">San Luis Potosí</option>
                    <option value="Sinaloa">Sinaloa</option>
                    <option value="Sonora">Sonora</option>
                    <option value="Tabasco">Tabasco</option>
                    <option value="Tamaulipas">Tamaulipas</option>
                    <option value="Tlaxcala">Tlaxcala</option>
                    <option value="Veracruz">Veracruz</option>
                    <option value="Yucatán">Yucatán</option>
                    <option value="Zacatecas">Zacatecas</option>
                    <option value="Extranjero">Nacido Extranjero</option>
        @elseif($emple->estadoActual == 'Guerrero')
                    <option  value="">Estados</option>
                     <option value="Aguascaliente" >Aguascalientes</option>}
                     <option value="Baja California" >Baja California</option>
                    <option value="Baja California Sur">Baja California Sur</option>
                    <option value="Campeche">Campeche</option>
                    <option value="Coahuila">Coahuila</option>
                    <option value="Colima">Colima</option>
                    <option value="Chiapas">Chiapas</option>
                    <option value="Chihuahua">Chihuahua</option>
                    <option value="Distrito Federal">Distrito Federal</option>
                    <option value="Durangod">Durango</option>
                    <option value="Guanajuato">Guanajuato</option>
                    <option value="Guerrero" selected>Guerrero</option>
                    <option value="Hidalgo">Hidalgo</option>
                    <option value="Jalisco">Jalisco</option>
                    <option value="México">México</option>
                     <option value="Michoacán">Michoacán</option>
                     <option value="Morelos">Morelos</option>
                    <option value="Nayarit" >Nayarit</option>
                    <option value="Nuevo León">Nuevo León</option>
                    <option value="Oaxaca">Oaxaca</option>
                    <option value="Puebla">Puebla</option>
                    <option value="Querétaro">Querétaro</option>
                    <option value="Quintana Roo">Quintana Roo</option>
                    <option value="San Luis Potosí">San Luis Potosí</option>
                    <option value="Sinaloa">Sinaloa</option>
                    <option value="Sonora">Sonora</option>
                    <option value="Tabasco">Tabasco</option>
                    <option value="Tamaulipas">Tamaulipas</option>
                    <option value="Tlaxcala">Tlaxcala</option>
                    <option value="Veracruz">Veracruz</option>
                    <option value="Yucatán">Yucatán</option>
                    <option value="Zacatecas">Zacatecas</option>
                    <option value="Extranjero">Nacido Extranjero</option>
        @elseif($emple->estadoActual == 'Hidalgo')
                    <option  value="">Estados</option>
                     <option value="Aguascaliente" >Aguascalientes</option>}
                     <option value="Baja California" >Baja California</option>
                    <option value="Baja California Sur">Baja California Sur</option>
                    <option value="Campeche">Campeche</option>
                    <option value="Coahuila">Coahuila</option>
                    <option value="Colima">Colima</option>
                    <option value="Chiapas">Chiapas</option>
                    <option value="Chihuahua">Chihuahua</option>
                    <option value="Distrito Federal">Distrito Federal</option>
                    <option value="Durangod">Durango</option>
                    <option value="Guanajuato">Guanajuato</option>
                    <option value="Guerrero">Guerrero</option>
                    <option value="Hidalgo" selected>Hidalgo</option>
                    <option value="Jalisco">Jalisco</option>
                    <option value="México">México</option>
                     <option value="Michoacán">Michoacán</option>
                     <option value="Morelos">Morelos</option>
                    <option value="Nayarit" >Nayarit</option>
                    <option value="Nuevo León">Nuevo León</option>
                    <option value="Oaxaca">Oaxaca</option>
                    <option value="Puebla">Puebla</option>
                    <option value="Querétaro">Querétaro</option>
                    <option value="Quintana Roo">Quintana Roo</option>
                    <option value="San Luis Potosí">San Luis Potosí</option>
                    <option value="Sinaloa">Sinaloa</option>
                    <option value="Sonora">Sonora</option>
                    <option value="Tabasco">Tabasco</option>
                    <option value="Tamaulipas">Tamaulipas</option>
                    <option value="Tlaxcala">Tlaxcala</option>
                    <option value="Veracruz">Veracruz</option>
                    <option value="Yucatán">Yucatán</option>
                    <option value="Zacatecas">Zacatecas</option>
                    <option value="Extranjero">Nacido Extranjero</option>
        @elseif($emple->estadoActual == 'Jalisco')
                    <option  value="">Estados</option>
                     <option value="Aguascaliente" >Aguascalientes</option>}
                     <option value="Baja California" >Baja California</option>
                    <option value="Baja California Sur">Baja California Sur</option>
                    <option value="Campeche">Campeche</option>
                    <option value="Coahuila">Coahuila</option>
                    <option value="Colima">Colima</option>
                    <option value="Chiapas">Chiapas</option>
                    <option value="Chihuahua">Chihuahua</option>
                    <option value="Distrito Federal">Distrito Federal</option>
                    <option value="Durangod">Durango</option>
                    <option value="Guanajuato">Guanajuato</option>
                    <option value="Guerrero">Guerrero</option>
                    <option value="Hidalgo">Hidalgo</option>
                    <option value="Jalisco" selected>Jalisco</option>
                    <option value="México">México</option>
                     <option value="Michoacán">Michoacán</option>
                     <option value="Morelos">Morelos</option>
                    <option value="Nayarit" >Nayarit</option>
                    <option value="Nuevo León">Nuevo León</option>
                    <option value="Oaxaca">Oaxaca</option>
                    <option value="Puebla">Puebla</option>
                    <option value="Querétaro">Querétaro</option>
                    <option value="Quintana Roo">Quintana Roo</option>
                    <option value="San Luis Potosí">San Luis Potosí</option>
                    <option value="Sinaloa">Sinaloa</option>
                    <option value="Sonora">Sonora</option>
                    <option value="Tabasco">Tabasco</option>
                    <option value="Tamaulipas">Tamaulipas</option>
                    <option value="Tlaxcala">Tlaxcala</option>
                    <option value="Veracruz">Veracruz</option>
                    <option value="Yucatán">Yucatán</option>
                    <option value="Zacatecas">Zacatecas</option>
                    <option value="Extranjero">Nacido Extranjero</option>
        @elseif($emple->estadoActual == 'México')
                    <option  value="">Estados</option>
                     <option value="Aguascaliente" >Aguascalientes</option>}
                     <option value="Baja California" >Baja California</option>
                    <option value="Baja California Sur">Baja California Sur</option>
                    <option value="Campeche">Campeche</option>
                    <option value="Coahuila">Coahuila</option>
                    <option value="Colima">Colima</option>
                    <option value="Chiapas">Chiapas</option>
                    <option value="Chihuahua">Chihuahua</option>
                    <option value="Distrito Federal">Distrito Federal</option>
                    <option value="Durangod">Durango</option>
                    <option value="Guanajuato">Guanajuato</option>
                    <option value="Guerrero">Guerrero</option>
                    <option value="Hidalgo">Hidalgo</option>
                    <option value="Jalisco">Jalisco</option>
                    <option value="México" selected>México</option>
                     <option value="Michoacán">Michoacán</option>
                     <option value="Morelos">Morelos</option>
                    <option value="Nayarit" >Nayarit</option>
                    <option value="Nuevo León">Nuevo León</option>
                    <option value="Oaxaca">Oaxaca</option>
                    <option value="Puebla">Puebla</option>
                    <option value="Querétaro">Querétaro</option>
                    <option value="Quintana Roo">Quintana Roo</option>
                    <option value="San Luis Potosí">San Luis Potosí</option>
                    <option value="Sinaloa">Sinaloa</option>
                    <option value="Sonora">Sonora</option>
                    <option value="Tabasco">Tabasco</option>
                    <option value="Tamaulipas">Tamaulipas</option>
                    <option value="Tlaxcala">Tlaxcala</option>
                    <option value="Veracruz">Veracruz</option>
                    <option value="Yucatán">Yucatán</option>
                    <option value="Zacatecas">Zacatecas</option>
                    <option value="Extranjero">Nacido Extranjero</option>
        @elseif($emple->estadoActual == 'Michoacán')
                    <option  value="">Estados</option>
                     <option value="Aguascaliente" >Aguascalientes</option>}
                     <option value="Baja California" >Baja California</option>
                    <option value="Baja California Sur">Baja California Sur</option>
                    <option value="Campeche">Campeche</option>
                    <option value="Coahuila">Coahuila</option>
                    <option value="Colima">Colima</option>
                    <option value="Chiapas">Chiapas</option>
                    <option value="Chihuahua">Chihuahua</option>
                    <option value="Distrito Federal">Distrito Federal</option>
                    <option value="Durangod">Durango</option>
                    <option value="Guanajuato">Guanajuato</option>
                    <option value="Guerrero">Guerrero</option>
                    <option value="Hidalgo">Hidalgo</option>
                    <option value="Jalisco">Jalisco</option>
                    <option value="México">México</option>
                     <option value="Michoacán" selected>Michoacán</option>
                     <option value="Morelos">Morelos</option>
                    <option value="Nayarit" >Nayarit</option>
                    <option value="Nuevo León">Nuevo León</option>
                    <option value="Oaxaca">Oaxaca</option>
                    <option value="Puebla">Puebla</option>
                    <option value="Querétaro">Querétaro</option>
                    <option value="Quintana Roo">Quintana Roo</option>
                    <option value="San Luis Potosí">San Luis Potosí</option>
                    <option value="Sinaloa">Sinaloa</option>
                    <option value="Sonora">Sonora</option>
                    <option value="Tabasco">Tabasco</option>
                    <option value="Tamaulipas">Tamaulipas</option>
                    <option value="Tlaxcala">Tlaxcala</option>
                    <option value="Veracruz">Veracruz</option>
                    <option value="Yucatán">Yucatán</option>
                    <option value="Zacatecas">Zacatecas</option>
                    <option value="Extranjero">Nacido Extranjero</option>
        @elseif($emple->estadoActual == 'Morelos')
                    <option  value="">Estados</option>
                     <option value="Aguascaliente" >Aguascalientes</option>}
                     <option value="Baja California" >Baja California</option>
                    <option value="Baja California Sur">Baja California Sur</option>
                    <option value="Campeche">Campeche</option>
                    <option value="Coahuila">Coahuila</option>
                    <option value="Colima">Colima</option>
                    <option value="Chiapas">Chiapas</option>
                    <option value="Chihuahua">Chihuahua</option>
                    <option value="Distrito Federal">Distrito Federal</option>
                    <option value="Durangod">Durango</option>
                    <option value="Guanajuato">Guanajuato</option>
                    <option value="Guerrero">Guerrero</option>
                    <option value="Hidalgo">Hidalgo</option>
                    <option value="Jalisco">Jalisco</option>
                    <option value="México">México</option>
                     <option value="Michoacán">Michoacán</option>
                     <option value="Morelos" selected>Morelos</option>
                    <option value="Nayarit" >Nayarit</option>
                    <option value="Nuevo León">Nuevo León</option>
                    <option value="Oaxaca">Oaxaca</option>
                    <option value="Puebla">Puebla</option>
                    <option value="Querétaro">Querétaro</option>
                    <option value="Quintana Roo">Quintana Roo</option>
                    <option value="San Luis Potosí">San Luis Potosí</option>
                    <option value="Sinaloa">Sinaloa</option>
                    <option value="Sonora">Sonora</option>
                    <option value="Tabasco">Tabasco</option>
                    <option value="Tamaulipas">Tamaulipas</option>
                    <option value="Tlaxcala">Tlaxcala</option>
                    <option value="Veracruz">Veracruz</option>
                    <option value="Yucatán">Yucatán</option>
                    <option value="Zacatecas">Zacatecas</option>
                    <option value="Extranjero">Nacido Extranjero</option>
        @elseif($emple->estadoActual == 'Nayarit')
                    <option  value="">Estados</option>
                     <option value="Aguascaliente" >Aguascalientes</option>}
                     <option value="Baja California" >Baja California</option>
                    <option value="Baja California Sur">Baja California Sur</option>
                    <option value="Campeche">Campeche</option>
                    <option value="Coahuila">Coahuila</option>
                    <option value="Colima">Colima</option>
                    <option value="Chiapas">Chiapas</option>
                    <option value="Chihuahua">Chihuahua</option>
                    <option value="Distrito Federal">Distrito Federal</option>
                    <option value="Durangod">Durango</option>
                    <option value="Guanajuato">Guanajuato</option>
                    <option value="Guerrero">Guerrero</option>
                    <option value="Hidalgo">Hidalgo</option>
                    <option value="Jalisco">Jalisco</option>
                    <option value="México">México</option>
                     <option value="Michoacán">Michoacán</option>
                     <option value="Morelos">Morelos</option>
                    <option value="Nayarit" selected>Nayarit</option>
                    <option value="Nuevo León">Nuevo León</option>
                    <option value="Oaxaca">Oaxaca</option>
                    <option value="Puebla">Puebla</option>
                    <option value="Querétaro">Querétaro</option>
                    <option value="Quintana Roo">Quintana Roo</option>
                    <option value="San Luis Potosí">San Luis Potosí</option>
                    <option value="Sinaloa">Sinaloa</option>
                    <option value="Sonora">Sonora</option>
                    <option value="Tabasco">Tabasco</option>
                    <option value="Tamaulipas">Tamaulipas</option>
                    <option value="Tlaxcala">Tlaxcala</option>
                    <option value="Veracruz">Veracruz</option>
                    <option value="Yucatán">Yucatán</option>
                    <option value="Zacatecas">Zacatecas</option>
                    <option value="Extranjero">Nacido Extranjero</option>
        @elseif($emple->estadoActual == 'Nuevo León')
                    <option  value="">Estados</option>
                     <option value="Aguascaliente" >Aguascalientes</option>}
                     <option value="Baja California" >Baja California</option>
                    <option value="Baja California Sur">Baja California Sur</option>
                    <option value="Campeche">Campeche</option>
                    <option value="Coahuila">Coahuila</option>
                    <option value="Colima">Colima</option>
                    <option value="Chiapas">Chiapas</option>
                    <option value="Chihuahua">Chihuahua</option>
                    <option value="Distrito Federal">Distrito Federal</option>
                    <option value="Durangod">Durango</option>
                    <option value="Guanajuato">Guanajuato</option>
                    <option value="Guerrero">Guerrero</option>
                    <option value="Hidalgo">Hidalgo</option>
                    <option value="Jalisco">Jalisco</option>
                    <option value="México">México</option>
                     <option value="Michoacán">Michoacán</option>
                     <option value="Morelos">Morelos</option>
                    <option value="Nayarit" >Nayarit</option>
                    <option value="Nuevo León" selected>Nuevo León</option>
                    <option value="Oaxaca">Oaxaca</option>
                    <option value="Puebla">Puebla</option>
                    <option value="Querétaro">Querétaro</option>
                    <option value="Quintana Roo">Quintana Roo</option>
                    <option value="San Luis Potosí">San Luis Potosí</option>
                    <option value="Sinaloa">Sinaloa</option>
                    <option value="Sonora">Sonora</option>
                    <option value="Tabasco">Tabasco</option>
                    <option value="Tamaulipas">Tamaulipas</option>
                    <option value="Tlaxcala">Tlaxcala</option>
                    <option value="Veracruz">Veracruz</option>
                    <option value="Yucatán">Yucatán</option>
                    <option value="Zacatecas">Zacatecas</option>
                    <option value="Extranjero">Nacido Extranjero</option>
        @elseif($emple->estadoActual == 'Oaxaca')
                    <option  value="">Estados</option>
                     <option value="Aguascaliente" >Aguascalientes</option>}
                     <option value="Baja California" >Baja California</option>
                    <option value="Baja California Sur">Baja California Sur</option>
                    <option value="Campeche">Campeche</option>
                    <option value="Coahuila">Coahuila</option>
                    <option value="Colima">Colima</option>
                    <option value="Chiapas">Chiapas</option>
                    <option value="Chihuahua">Chihuahua</option>
                    <option value="Distrito Federal">Distrito Federal</option>
                    <option value="Durangod">Durango</option>
                    <option value="Guanajuato">Guanajuato</option>
                    <option value="Guerrero">Guerrero</option>
                    <option value="Hidalgo">Hidalgo</option>
                    <option value="Jalisco">Jalisco</option>
                    <option value="México">México</option>
                     <option value="Michoacán">Michoacán</option>
                     <option value="Morelos">Morelos</option>
                    <option value="Nayarit" >Nayarit</option>
                    <option value="Nuevo León">Nuevo León</option>
                    <option value="Oaxaca" selected>Oaxaca</option>
                    <option value="Puebla">Puebla</option>
                    <option value="Querétaro">Querétaro</option>
                    <option value="Quintana Roo">Quintana Roo</option>
                    <option value="San Luis Potosí">San Luis Potosí</option>
                    <option value="Sinaloa">Sinaloa</option>
                    <option value="Sonora">Sonora</option>
                    <option value="Tabasco">Tabasco</option>
                    <option value="Tamaulipas">Tamaulipas</option>
                    <option value="Tlaxcala">Tlaxcala</option>
                    <option value="Veracruz">Veracruz</option>
                    <option value="Yucatán">Yucatán</option>
                    <option value="Zacatecas">Zacatecas</option>
                    <option value="Extranjero">Nacido Extranjero</option>
        @elseif($emple->estadoActual == 'Puebla')
                    <option  value="">Estados</option>
                     <option value="Aguascaliente" >Aguascalientes</option>}
                     <option value="Baja California" >Baja California</option>
                    <option value="Baja California Sur">Baja California Sur</option>
                    <option value="Campeche">Campeche</option>
                    <option value="Coahuila">Coahuila</option>
                    <option value="Colima">Colima</option>
                    <option value="Chiapas">Chiapas</option>
                    <option value="Chihuahua">Chihuahua</option>
                    <option value="Distrito Federal">Distrito Federal</option>
                    <option value="Durangod">Durango</option>
                    <option value="Guanajuato">Guanajuato</option>
                    <option value="Guerrero">Guerrero</option>
                    <option value="Hidalgo">Hidalgo</option>
                    <option value="Jalisco">Jalisco</option>
                    <option value="México">México</option>
                     <option value="Michoacán">Michoacán</option>
                     <option value="Morelos">Morelos</option>
                    <option value="Nayarit" >Nayarit</option>
                    <option value="Nuevo León">Nuevo León</option>
                    <option value="Oaxaca">Oaxaca</option>
                    <option value="Puebla" selected>Puebla</option>
                    <option value="Querétaro">Querétaro</option>
                    <option value="Quintana Roo">Quintana Roo</option>
                    <option value="San Luis Potosí">San Luis Potosí</option>
                    <option value="Sinaloa">Sinaloa</option>
                    <option value="Sonora">Sonora</option>
                    <option value="Tabasco">Tabasco</option>
                    <option value="Tamaulipas">Tamaulipas</option>
                    <option value="Tlaxcala">Tlaxcala</option>
                    <option value="Veracruz">Veracruz</option>
                    <option value="Yucatán">Yucatán</option>
                    <option value="Zacatecas">Zacatecas</option>
                    <option value="Extranjero">Nacido Extranjero</option>
        @elseif($emple->estadoActual == 'Queretaro')
                    <option  value="">Estados</option>
                     <option value="Aguascaliente" >Aguascalientes</option>}
                     <option value="Baja California" >Baja California</option>
                    <option value="Baja California Sur">Baja California Sur</option>
                    <option value="Campeche">Campeche</option>
                    <option value="Coahuila">Coahuila</option>
                    <option value="Colima">Colima</option>
                    <option value="Chiapas">Chiapas</option>
                    <option value="Chihuahua">Chihuahua</option>
                    <option value="Distrito Federal">Distrito Federal</option>
                    <option value="Durangod">Durango</option>
                    <option value="Guanajuato">Guanajuato</option>
                    <option value="Guerrero">Guerrero</option>
                    <option value="Hidalgo">Hidalgo</option>
                    <option value="Jalisco">Jalisco</option>
                    <option value="México">México</option>
                     <option value="Michoacán">Michoacán</option>
                     <option value="Morelos">Morelos</option>
                    <option value="Nayarit" >Nayarit</option>
                    <option value="Nuevo León">Nuevo León</option>
                    <option value="Oaxaca">Oaxaca</option>
                    <option value="Puebla">Puebla</option>
                    <option value="Querétaro" selected>Querétaro</option>
                    <option value="Quintana Roo">Quintana Roo</option>
                    <option value="San Luis Potosí">San Luis Potosí</option>
                    <option value="Sinaloa">Sinaloa</option>
                    <option value="Sonora">Sonora</option>
                    <option value="Tabasco">Tabasco</option>
                    <option value="Tamaulipas">Tamaulipas</option>
                    <option value="Tlaxcala">Tlaxcala</option>
                    <option value="Veracruz">Veracruz</option>
                    <option value="Yucatán">Yucatán</option>
                    <option value="Zacatecas">Zacatecas</option>
                    <option value="Extranjero">Nacido Extranjero</option>
        @elseif($emple->estadoActual == 'Quintana Roo')
                    <option  value="">Estados</option>
                     <option value="Aguascaliente" >Aguascalientes</option>}
                     <option value="Baja California" >Baja California</option>
                    <option value="Baja California Sur">Baja California Sur</option>
                    <option value="Campeche">Campeche</option>
                    <option value="Coahuila">Coahuila</option>
                    <option value="Colima">Colima</option>
                    <option value="Chiapas">Chiapas</option>
                    <option value="Chihuahua">Chihuahua</option>
                    <option value="Distrito Federal">Distrito Federal</option>
                    <option value="Durangod">Durango</option>
                    <option value="Guanajuato">Guanajuato</option>
                    <option value="Guerrero">Guerrero</option>
                    <option value="Hidalgo">Hidalgo</option>
                    <option value="Jalisco">Jalisco</option>
                    <option value="México">México</option>
                     <option value="Michoacán">Michoacán</option>
                     <option value="Morelos">Morelos</option>
                    <option value="Nayarit" >Nayarit</option>
                    <option value="Nuevo León">Nuevo León</option>
                    <option value="Oaxaca">Oaxaca</option>
                    <option value="Puebla">Puebla</option>
                    <option value="Querétaro">Querétaro</option>
                    <option value="Quintana Roo" selected>Quintana Roo</option>
                    <option value="San Luis Potosí">San Luis Potosí</option>
                    <option value="Sinaloa">Sinaloa</option>
                    <option value="Sonora">Sonora</option>
                    <option value="Tabasco">Tabasco</option>
                    <option value="Tamaulipas">Tamaulipas</option>
                    <option value="Tlaxcala">Tlaxcala</option>
                    <option value="Veracruz">Veracruz</option>
                    <option value="Yucatán">Yucatán</option>
                    <option value="Zacatecas">Zacatecas</option>
                    <option value="Extranjero">Nacido Extranjero</option>
        @elseif($emple->estadoActual == 'San Luis Potosi')
                    <option  value="">Estados</option>
                     <option value="Aguascaliente" >Aguascalientes</option>}
                     <option value="Baja California" >Baja California</option>
                    <option value="Baja California Sur">Baja California Sur</option>
                    <option value="Campeche">Campeche</option>
                    <option value="Coahuila">Coahuila</option>
                    <option value="Colima">Colima</option>
                    <option value="Chiapas">Chiapas</option>
                    <option value="Chihuahua">Chihuahua</option>
                    <option value="Distrito Federal">Distrito Federal</option>
                    <option value="Durangod">Durango</option>
                    <option value="Guanajuato">Guanajuato</option>
                    <option value="Guerrero">Guerrero</option>
                    <option value="Hidalgo">Hidalgo</option>
                    <option value="Jalisco">Jalisco</option>
                    <option value="México">México</option>
                     <option value="Michoacán">Michoacán</option>
                     <option value="Morelos">Morelos</option>
                    <option value="Nayarit" >Nayarit</option>
                    <option value="Nuevo León">Nuevo León</option>
                    <option value="Oaxaca">Oaxaca</option>
                    <option value="Puebla">Puebla</option>
                    <option value="Querétaro">Querétaro</option>
                    <option value="Quintana Roo">Quintana Roo</option>
                    <option value="San Luis Potosí" selected>San Luis Potosí</option>
                    <option value="Sinaloa">Sinaloa</option>
                    <option value="Sonora">Sonora</option>
                    <option value="Tabasco">Tabasco</option>
                    <option value="Tamaulipas">Tamaulipas</option>
                    <option value="Tlaxcala">Tlaxcala</option>
                    <option value="Veracruz">Veracruz</option>
                    <option value="Yucatán">Yucatán</option>
                    <option value="Zacatecas">Zacatecas</option>
                    <option value="Extranjero">Nacido Extranjero</option>
        @elseif($emple->estadoActual == 'Sinaloa')
                    <option  value="">Estados</option>
                     <option value="Aguascaliente" >Aguascalientes</option>}
                     <option value="Baja California" >Baja California</option>
                    <option value="Baja California Sur">Baja California Sur</option>
                    <option value="Campeche">Campeche</option>
                    <option value="Coahuila">Coahuila</option>
                    <option value="Colima">Colima</option>
                    <option value="Chiapas">Chiapas</option>
                    <option value="Chihuahua">Chihuahua</option>
                    <option value="Distrito Federal">Distrito Federal</option>
                    <option value="Durangod">Durango</option>
                    <option value="Guanajuato">Guanajuato</option>
                    <option value="Guerrero">Guerrero</option>
                    <option value="Hidalgo">Hidalgo</option>
                    <option value="Jalisco">Jalisco</option>
                    <option value="México">México</option>
                     <option value="Michoacán">Michoacán</option>
                     <option value="Morelos">Morelos</option>
                    <option value="Nayarit" >Nayarit</option>
                    <option value="Nuevo León">Nuevo León</option>
                    <option value="Oaxaca">Oaxaca</option>
                    <option value="Puebla">Puebla</option>
                    <option value="Querétaro">Querétaro</option>
                    <option value="Quintana Roo">Quintana Roo</option>
                    <option value="San Luis Potosí">San Luis Potosí</option>
                    <option value="Sinaloa" selected>Sinaloa</option>
                    <option value="Sonora">Sonora</option>
                    <option value="Tabasco">Tabasco</option>
                    <option value="Tamaulipas">Tamaulipas</option>
                    <option value="Tlaxcala">Tlaxcala</option>
                    <option value="Veracruz">Veracruz</option>
                    <option value="Yucatán">Yucatán</option>
                    <option value="Zacatecas">Zacatecas</option>
                    <option value="Extranjero">Nacido Extranjero</option>
        @elseif($emple->estadoActual == 'Sonora')
                    <option  value="">Estados</option>
                     <option value="Aguascaliente" >Aguascalientes</option>}
                     <option value="Baja California" >Baja California</option>
                    <option value="Baja California Sur">Baja California Sur</option>
                    <option value="Campeche">Campeche</option>
                    <option value="Coahuila">Coahuila</option>
                    <option value="Colima">Colima</option>
                    <option value="Chiapas">Chiapas</option>
                    <option value="Chihuahua">Chihuahua</option>
                    <option value="Distrito Federal">Distrito Federal</option>
                    <option value="Durangod">Durango</option>
                    <option value="Guanajuato">Guanajuato</option>
                    <option value="Guerrero">Guerrero</option>
                    <option value="Hidalgo">Hidalgo</option>
                    <option value="Jalisco">Jalisco</option>
                    <option value="México">México</option>
                     <option value="Michoacán">Michoacán</option>
                     <option value="Morelos">Morelos</option>
                    <option value="Nayarit" >Nayarit</option>
                    <option value="Nuevo León">Nuevo León</option>
                    <option value="Oaxaca">Oaxaca</option>
                    <option value="Puebla">Puebla</option>
                    <option value="Querétaro">Querétaro</option>
                    <option value="Quintana Roo">Quintana Roo</option>
                    <option value="San Luis Potosí">San Luis Potosí</option>
                    <option value="Sinaloa" selected>Sinaloa</option>
                    <option value="Sonora">Sonora</option>
                    <option value="Tabasco">Tabasco</option>
                    <option value="Tamaulipas">Tamaulipas</option>
                    <option value="Tlaxcala">Tlaxcala</option>
                    <option value="Veracruz">Veracruz</option>
                    <option value="Yucatán">Yucatán</option>
                    <option value="Zacatecas">Zacatecas</option>
                    <option value="Extranjero">Nacido Extranjero</option>
        @elseif($emple->estadoActual == 'Tabasco')
                    <option  value="">Estados</option>
                     <option value="Aguascaliente" >Aguascalientes</option>}
                     <option value="Baja California" >Baja California</option>
                    <option value="Baja California Sur">Baja California Sur</option>
                    <option value="Campeche">Campeche</option>
                    <option value="Coahuila">Coahuila</option>
                    <option value="Colima">Colima</option>
                    <option value="Chiapas">Chiapas</option>
                    <option value="Chihuahua">Chihuahua</option>
                    <option value="Distrito Federal">Distrito Federal</option>
                    <option value="Durangod">Durango</option>
                    <option value="Guanajuato">Guanajuato</option>
                    <option value="Guerrero">Guerrero</option>
                    <option value="Hidalgo">Hidalgo</option>
                    <option value="Jalisco">Jalisco</option>
                    <option value="México">México</option>
                     <option value="Michoacán">Michoacán</option>
                     <option value="Morelos">Morelos</option>
                    <option value="Nayarit" >Nayarit</option>
                    <option value="Nuevo León">Nuevo León</option>
                    <option value="Oaxaca">Oaxaca</option>
                    <option value="Puebla">Puebla</option>
                    <option value="Querétaro">Querétaro</option>
                    <option value="Quintana Roo">Quintana Roo</option>
                    <option value="San Luis Potosí">San Luis Potosí</option>
                    <option value="Sinaloa">Sinaloa</option>
                    <option value="Sonora">Sonora</option>
                    <option value="Tabasco" selected>Tabasco</option>
                    <option value="Tamaulipas">Tamaulipas</option>
                    <option value="Tlaxcala">Tlaxcala</option>
                    <option value="Veracruz">Veracruz</option>
                    <option value="Yucatán">Yucatán</option>
                    <option value="Zacatecas">Zacatecas</option>
                    <option value="Extranjero">Nacido Extranjero</option>
        @elseif($emple->estadoActual == 'Tamaulipas')
                    <option  value="">Estados</option>
                     <option value="Aguascaliente" >Aguascalientes</option>}
                     <option value="Baja California" >Baja California</option>
                    <option value="Baja California Sur">Baja California Sur</option>
                    <option value="Campeche">Campeche</option>
                    <option value="Coahuila">Coahuila</option>
                    <option value="Colima">Colima</option>
                    <option value="Chiapas">Chiapas</option>
                    <option value="Chihuahua">Chihuahua</option>
                    <option value="Distrito Federal">Distrito Federal</option>
                    <option value="Durangod">Durango</option>
                    <option value="Guanajuato">Guanajuato</option>
                    <option value="Guerrero">Guerrero</option>
                    <option value="Hidalgo">Hidalgo</option>
                    <option value="Jalisco">Jalisco</option>
                    <option value="México">México</option>
                     <option value="Michoacán">Michoacán</option>
                     <option value="Morelos">Morelos</option>
                    <option value="Nayarit" >Nayarit</option>
                    <option value="Nuevo León">Nuevo León</option>
                    <option value="Oaxaca">Oaxaca</option>
                    <option value="Puebla">Puebla</option>
                    <option value="Querétaro">Querétaro</option>
                    <option value="Quintana Roo">Quintana Roo</option>
                    <option value="San Luis Potosí">San Luis Potosí</option>
                    <option value="Sinaloa">Sinaloa</option>
                    <option value="Sonora">Sonora</option>
                    <option value="Tabasco">Tabasco</option>
                    <option value="Tamaulipas" selected>Tamaulipas</option>
                    <option value="Tlaxcala">Tlaxcala</option>
                    <option value="Veracruz">Veracruz</option>
                    <option value="Yucatán">Yucatán</option>
                    <option value="Zacatecas">Zacatecas</option>
                    <option value="Extranjero">Nacido Extranjero</option>
        @elseif($emple->estadoActual == 'Tlaxcala')
                    <option  value="">Estados</option>
                     <option value="Aguascaliente" >Aguascalientes</option>}
                     <option value="Baja California" >Baja California</option>
                    <option value="Baja California Sur">Baja California Sur</option>
                    <option value="Campeche">Campeche</option>
                    <option value="Coahuila">Coahuila</option>
                    <option value="Colima">Colima</option>
                    <option value="Chiapas">Chiapas</option>
                    <option value="Chihuahua">Chihuahua</option>
                    <option value="Distrito Federal">Distrito Federal</option>
                    <option value="Durangod">Durango</option>
                    <option value="Guanajuato">Guanajuato</option>
                    <option value="Guerrero">Guerrero</option>
                    <option value="Hidalgo">Hidalgo</option>
                    <option value="Jalisco">Jalisco</option>
                    <option value="México">México</option>
                     <option value="Michoacán">Michoacán</option>
                     <option value="Morelos">Morelos</option>
                    <option value="Nayarit" >Nayarit</option>
                    <option value="Nuevo León">Nuevo León</option>
                    <option value="Oaxaca">Oaxaca</option>
                    <option value="Puebla">Puebla</option>
                    <option value="Querétaro">Querétaro</option>
                    <option value="Quintana Roo">Quintana Roo</option>
                    <option value="San Luis Potosí">San Luis Potosí</option>
                    <option value="Sinaloa">Sinaloa</option>
                    <option value="Sonora">Sonora</option>
                    <option value="Tabasco">Tabasco</option>
                    <option value="Tamaulipas">Tamaulipas</option>
                    <option value="Tlaxcala" selected>Tlaxcala</option>
                    <option value="Veracruz">Veracruz</option>
                    <option value="Yucatán">Yucatán</option>
                    <option value="Zacatecas">Zacatecas</option>
                    <option value="Extranjero">Nacido Extranjero</option>
        @elseif($emple->estadoActual == 'Veracruz')
                    <option  value="">Estados</option>
                     <option value="Aguascaliente" >Aguascalientes</option>}
                     <option value="Baja California" >Baja California</option>
                    <option value="Baja California Sur">Baja California Sur</option>
                    <option value="Campeche">Campeche</option>
                    <option value="Coahuila">Coahuila</option>
                    <option value="Colima">Colima</option>
                    <option value="Chiapas">Chiapas</option>
                    <option value="Chihuahua">Chihuahua</option>
                    <option value="Distrito Federal">Distrito Federal</option>
                    <option value="Durangod">Durango</option>
                    <option value="Guanajuato">Guanajuato</option>
                    <option value="Guerrero">Guerrero</option>
                    <option value="Hidalgo">Hidalgo</option>
                    <option value="Jalisco">Jalisco</option>
                    <option value="México">México</option>
                     <option value="Michoacán">Michoacán</option>
                     <option value="Morelos">Morelos</option>
                    <option value="Nayarit" >Nayarit</option>
                    <option value="Nuevo León">Nuevo León</option>
                    <option value="Oaxaca">Oaxaca</option>
                    <option value="Puebla">Puebla</option>
                    <option value="Querétaro">Querétaro</option>
                    <option value="Quintana Roo">Quintana Roo</option>
                    <option value="San Luis Potosí">San Luis Potosí</option>
                    <option value="Sinaloa">Sinaloa</option>
                    <option value="Sonora">Sonora</option>
                    <option value="Tabasco">Tabasco</option>
                    <option value="Tamaulipas">Tamaulipas</option>
                    <option value="Tlaxcala">Tlaxcala</option>
                    <option value="Veracruz" selected>Veracruz</option>
                    <option value="Yucatán">Yucatán</option>
                    <option value="Zacatecas">Zacatecas</option>
                    <option value="Extranjero">Nacido Extranjero</option>
        @elseif($emple->estadoActual == 'Yucatan')
                    <option  value="">Estados</option>
                     <option value="Aguascaliente" >Aguascalientes</option>}
                     <option value="Baja California" >Baja California</option>
                    <option value="Baja California Sur">Baja California Sur</option>
                    <option value="Campeche">Campeche</option>
                    <option value="Coahuila">Coahuila</option>
                    <option value="Colima">Colima</option>
                    <option value="Chiapas">Chiapas</option>
                    <option value="Chihuahua">Chihuahua</option>
                    <option value="Distrito Federal">Distrito Federal</option>
                    <option value="Durangod">Durango</option>
                    <option value="Guanajuato">Guanajuato</option>
                    <option value="Guerrero">Guerrero</option>
                    <option value="Hidalgo">Hidalgo</option>
                    <option value="Jalisco">Jalisco</option>
                    <option value="México">México</option>
                     <option value="Michoacán">Michoacán</option>
                     <option value="Morelos">Morelos</option>
                    <option value="Nayarit" >Nayarit</option>
                    <option value="Nuevo León">Nuevo León</option>
                    <option value="Oaxaca">Oaxaca</option>
                    <option value="Puebla">Puebla</option>
                    <option value="Querétaro">Querétaro</option>
                    <option value="Quintana Roo">Quintana Roo</option>
                    <option value="San Luis Potosí">San Luis Potosí</option>
                    <option value="Sinaloa">Sinaloa</option>
                    <option value="Sonora">Sonora</option>
                    <option value="Tabasco">Tabasco</option>
                    <option value="Tamaulipas">Tamaulipas</option>
                    <option value="Tlaxcala">Tlaxcala</option>
                    <option value="Veracruz">Veracruz</option>
                    <option value="Yucatán" selected>Yucatán</option>
                    <option value="Zacatecas">Zacatecas</option>
                    <option value="Extranjero">Nacido Extranjero</option>
        @elseif($emple->estadoActual == 'Zacatecas')
                    <option  value="">Estados</option>
                     <option value="Aguascaliente" >Aguascalientes</option>}
                     <option value="Baja California" >Baja California</option>
                    <option value="Baja California Sur">Baja California Sur</option>
                    <option value="Campeche">Campeche</option>
                    <option value="Coahuila">Coahuila</option>
                    <option value="Colima">Colima</option>
                    <option value="Chiapas">Chiapas</option>
                    <option value="Chihuahua">Chihuahua</option>
                    <option value="Distrito Federal">Distrito Federal</option>
                    <option value="Durangod">Durango</option>
                    <option value="Guanajuato">Guanajuato</option>
                    <option value="Guerrero">Guerrero</option>
                    <option value="Hidalgo">Hidalgo</option>
                    <option value="Jalisco">Jalisco</option>
                    <option value="México">México</option>
                     <option value="Michoacán">Michoacán</option>
                     <option value="Morelos">Morelos</option>
                    <option value="Nayarit" >Nayarit</option>
                    <option value="Nuevo León">Nuevo León</option>
                    <option value="Oaxaca">Oaxaca</option>
                    <option value="Puebla">Puebla</option>
                    <option value="Querétaro">Querétaro</option>
                    <option value="Quintana Roo">Quintana Roo</option>
                    <option value="San Luis Potosí">San Luis Potosí</option>
                    <option value="Sinaloa">Sinaloa</option>
                    <option value="Sonora">Sonora</option>
                    <option value="Tabasco">Tabasco</option>
                    <option value="Tamaulipas">Tamaulipas</option>
                    <option value="Tlaxcala">Tlaxcala</option>
                    <option value="Veracruz">Veracruz</option>
                    <option value="Yucatán">Yucatán</option>
                    <option value="Zacatecas" selected>Zacatecas</option>
                    <option value="Extranjero">Nacido Extranjero</option>
                @else
                    <option  value="">Estados</option>
                     <option value="Aguascaliente" >Aguascalientes</option>}
                     <option value="Baja California" >Baja California</option>
                    <option value="Baja California Sur">Baja California Sur</option>
                    <option value="Campeche">Campeche</option>
                    <option value="Coahuila">Coahuila</option>
                    <option value="Colima">Colima</option>
                    <option value="Chiapas">Chiapas</option>
                    <option value="Chihuahua">Chihuahua</option>
                    <option value="Distrito Federal">Distrito Federal</option>
                    <option value="Durangod">Durango</option>
                    <option value="Guanajuato">Guanajuato</option>
                    <option value="Guerrero">Guerrero</option>
                    <option value="Hidalgo">Hidalgo</option>
                    <option value="Jalisco">Jalisco</option>
                    <option value="México">México</option>
                     <option value="Michoacán">Michoacán</option>
                     <option value="Morelos">Morelos</option>
                    <option value="Nayarit" >Nayarit</option>
                    <option value="Nuevo León">Nuevo León</option>
                    <option value="Oaxaca">Oaxaca</option>
                    <option value="Puebla">Puebla</option>
                    <option value="Querétaro">Querétaro</option>
                    <option value="Quintana Roo">Quintana Roo</option>
                    <option value="San Luis Potosí">San Luis Potosí</option>
                    <option value="Sinaloa">Sinaloa</option>
                    <option value="Sonora">Sonora</option>
                    <option value="Tabasco">Tabasco</option>
                    <option value="Tamaulipas">Tamaulipas</option>
                    <option value="Tlaxcala">Tlaxcala</option>
                    <option value="Veracruz">Veracruz</option>
                    <option value="Yucatán">Yucatán</option>
                    <option value="Zacatecas">Zacatecas</option>
                    <option value="Extranjero" selected>Nacido Extranjero</option>
                    <option value="" selected>Selecciona un estado:</option>
                @endif
                                                </select>  
                                    </div>
                                </div> 

                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="muniActual">Municipio</label>
                                        <input type="text"  name="muniActual" class="form-control" value="{{$emple->muniActual}}"  >
                                    </div>
                                </div>

                            
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="ciudadActual">Ciudad</label>
                                        <input type="text" name="ciudadActual" class="form-control" value="{{$emple->ciudadActual}}">  
                                    </div>
                                </div> 
                                

                               

                               <!-- <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label for="telefono">Télefono</label>
                                    <input type="number" class="form-control" placeholder="Télefono" name="telefono" value="{{$emple->telefono}}">
                                </div>
                            </div>-->
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label for="celular">Celular</label>
                                    <input type="number" class="form-control" placeholder="Celular" name="celular" value="{{$emple->celular}}">
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email"  name="email" class="form-control" value="{{$emple->email}}" placeholder="Email...">
                                    </div>
                                </div>

                                <!--<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        <label for="facebook">Facebook</label>
                                        <input type="facebook"  name="facebook" class="form-control" value="{{$emple->facebook}}" placeholder="facebook...">
                                    </div>
                                </div>-->

                                <div class="col-md-12">
                                <div class="input-group">
                                <span class="input-group-addon"><STRONG> Salud:</STRONG></span>  
                            </div>
                        </div><br>

                            <!--<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label for="numeroSeguroSocial">No de Seguro</label>
                                    <input type="numer" class="form-control" placeholder="No de Seguro.." value="{{$emple->numeroSeguroSocial}}" name="numeroSeguroSocial" >
                                 </div>
                            </div>-->

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="notas">Notas (descripción)</label>
                                     <input type="textarea" name="notasDescripcion"  rows="3" class="form-control" value="{{$emple->notasDescripcion}}">
                                 </div>
                            </div>

                        </div>
                    </div>     
                </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="academicos">
                        
                                      <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                       
                            <div class="col-md-12">
                                <div id="sidebar">
                                    <div class="input-group">
                                <span class="input-group-addon"><STRONG>DATOS LABORALES</STRONG></span>  
                            </div><br> 

                           <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label for="NumEmpleado">No. Empleado</label>
                                    <input type="text" name="NumEmpleado"  placeholder="No. Empleado..." class="form-control" value="{{$emple->NumEmpleado}}" >
                                 </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label for="sueldo">Sueldo</label>
                                    <input type="text" class="form-control" placeholder="Sueldo..." name="sueldo" value="{{$emple->sueldo}}">
                                </div>
                            </div>


                                </div>
                            </div>

                            <div class="input-group">
                                <span class="input-group-addon"><STRONG>Ingreso Laboral:</STRONG></span>  
                            </div><br>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label for="StatusActual">Status Actual</label>
                                    <select class="form-control selectpicker" type="select" data-live-search="true" name="StatusActual" value="">
                                        <option value="">Seleciona</option>
                                        <option value="Activo">Activo</option>
                                        <option value="Baja">Baja</option>
                                    </select>     
                                </div>
                            </div>
                            
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label for="fecha_Ingreso">Ingreso</label>
                                    <input type="date" name="fecha_Ingreso" class="form-control" value="{{$emple->fecha_Ingreso}}" >
                                 </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label for="fecha_Baja">Baja</label>
                                    <input type="date" name="fecha_Baja"  placeholder="Baja..." class="form-control" value="{{$emple->fecha_Baja}}" >
                                 </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label for="departamento"> Área o Departamento</label>
                                    <input type="text" class="form-control" placeholder="Departamento.." name="departamento" value="{{$emple->departamento}}">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label for="cargo">Cargo</label>
                                    <input type="text" class="form-control" placeholder="Cargo.." name="cargo" value="{{$emple->cargo}}">
                                </div>
                            </div>

                             <div class="col-lg-4 col-md-4 col-sm- col-xs-12">
                                <div class="form-group">
                                    <label for="contrato">Contrato</label>
                                    <select class="form-control selectpicker" type="select" data-live-search="true" name="contrato" value="">
                                        <option value="">Seleciona</option>
                                        <option value="Temporal">Temporal</option>
                                        <option value="Base">Base</option>
                                    </select>     
                                </div>
                            </div>

                           
                             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><STRONG>Empleo Anterior</STRONG></span>  
                            </div><br>
                            </div>
                            
                           <div class="col-lg-4 col-md-4 col-sm- col-xs-12">
                                <div class="form-group">
                                    <label for="departamentoAnterior">Área o Departamento (anterior)</label>
                                    <input type="text" class="form-control" placeholder="Contrato.." name="departamentoAnterior" value="{{$emple->departamentoAnterior}}">
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm- col-xs-12">
                                <div class="form-group">
                                    <label for="cargoAnterior">Cargo (anterior)</label>
                                    <input type="cargoAnterior" class="form-control"  name="cargoAnterior" value="{{$emple->cargoAnterior}}">
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm- col-xs-12">
                                <div class="form-group">
                                    <label for="empresaAnterior">Empresa(anterior)</label>
                                    <input type="empresaAnterior" class="form-control"  name="empresaAnterior" value="{{$emple->empresaAnterior}}">
                                </div>
                            </div>
                           

                            

                </div>
             
            </div>
                     
                    </div>
                    <div role="tabpanel" class="tab-pane" id="estudios">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                       
                            <div class="col-md-12">
                                <div id="sidebar">
                                    <legend>Datos de Estudios</legend> 
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label for="institucionEstudios">Institución de Estudios</label>
                                    <input type="text" class="form-control" placeholder="Institución de Estudios" name="institucionEstudios" value="{{$emple->institucionEstudios}}">
                                 </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label for="nivelEstudios">Nivel de Estudios</label>
                                    <input type="text" class="form-control" placeholder="Nivel de Estudios..." name="nivelEstudios" value="{{$emple->nivelEstudios}}">
                                 </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label for="titulado">Titulado</label>
                                    <input type="text" class="form-control" name="titulado" value="{{$emple->titulado}}">
                                 </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="cedulaProfecional">Cédula Profecional</label>
                                    <input type="text" class="form-control" name="cedulaProfecional" value="{{$emple->cedulaProfecional}}">
                                 </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="especialidad">Especialidad</label>
                                    <input type="especialidad" class="form-control" name="especialidad" value="{{$emple->especialidad}}">
                                 </div>
                            </div>



                             <div class="input-group">
                                <span class="input-group-addon"><STRONG>Otros Estudios</STRONG></span>  
                            </div><br>

                            <div>
    <fieldset class="fields2">
    <dl>
        <dt><label>¿Estudio Maestria?</label></dt>
        <dd>
            <input type="radio" name="trab" onclick="toggle3(this)" value="SI"> No <br>
            <input type="radio" name="trab" onclick="toggle3(this)" value="NO" > Si <br>
            
        </dd>
    </dl>
</fieldset>
 
<div id="cinco" style="display:none">
    
<div class="input-group">
                                 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="nombreMaestria">Maestria</label>
                                    <input type="text" class="form-control" placeholder="Maestria..." name="nombreMaestria"  value="{{$emple->nombreMaestria}}">
                                 </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">educativa
                                    <label for="institucionMaestria">Institucion de </label>
                                    <input type="text" class="form-control" placeholder="inst.de la maestria..." name="institucionMaestria"  value="{{$emple->institucionMaestria}}">
                                 </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="tituloMaestria">¿Titulo?</label>
                                    <input type="text" class="form-control" placeholder="Titulo del Maestria..." name="tituloMaestria"  value="{{$emple->tituloMaestria}}">
                                    <input type="file"  name="file" value="{{old('foto')}}">
                                 </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="cedulaMaestria">Cédula</label>
                                    <input type="text" class="form-control" placeholder="Cédula de maestria..." name="cedulaMaestria"  value="{{$emple->cedulaMaestria}}">
                                    <input type="file"  name="file" value="{{old('foto')}}">
                                 </div>
                            </div><br>
                            <br>

</div>
 
</div>

</div>

<div>
    <fieldset class="fields2">
    <dl>
        <dt><label>¿Doctorado?</label></dt>
        <dd>
            <input type="radio" name="tipo_status" onclick="toggle4(this)" value="7"> No <br>
            <input type="radio" name="tipo_status" onclick="toggle4(this)" value="8" > Si <br>
            
        </dd>
    </dl>
</fieldset>
 
<div id="siete" style="display:none">
    
<div class="input-group">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="nombreDoctorado">Doctorado en:</label>
                        <input type="text" class="form-control" placeholder="Inst.del Doctorado..."  name="nombreDoctorado" value="{{$emple->nombreDoctorado}}">
                        </div>
                     </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label for="institucionDoctorado">Institucion de Educativa</label>
                            <input type="text" class="form-control" placeholder="Titulo Doctorado..."  name="institucionDoctorado" value="{{$emple->institucionDoctorado}}">
                        </div>
                    </div>
                         <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                             <div class="form-group">
                                 <label for="tituloDoctorado">Titulado </label>
                                 <input type="text" class="form-control" placeholder="titulado Doctorado..."  name="tituloDoctorado" value="{{$emple->tituloDoctorado}}">
                                 <input type="file"  name="file" value="{{old('foto')}}">
                        </div>
                     </div> 
                     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                             <div class="form-group">
                                 <label for="cedulaDoctorado">Cedula </label>
                                 <input type="text" class="form-control" placeholder="cedula Doctorado..."  name="cedulaDoctorado" value="{{$emple->cedulaDoctorado}}">
                                 <input type="file"  name="file" value="{{old('foto')}}">
                        </div>
                     </div><br>  

</div>

</div>

</div>

<div>
                        <fieldset class="fields3">
                            <dl>
                            <dt><label>¿Estudio Post Doctorado?</label></dt>
                            <dd>
                            <input type="radio" name="tipo_attach" onclick="toggle(this)" value="a"> No<br>
                            <input type="radio" name="tipo_attach" onclick="toggle(this)" value="b" > Si<br>
                              
                            </dd>
                            </dl>
                            </fieldset>
 
                            <div id="uno" style="display:none">

                             <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="nombrePostDoctorado">PostDoctorado en:</label>
                                    <input type="text" class="form-control" placeholder="PostDoctorado..." name="nombrePostDoctorado"  value="{{$emple->nombrePostDoctorado}}">
                                 </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="institucionPostDoctorado">Institucion de Educativa</label>
                                    <input type="text" class="form-control" placeholder="PostDoctorado..." name="institucionPostDoctorado"  value="{{$emple->institucionPostDoctorado}}">
                                 </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="tituloPostDoctorado">Titulo</label>
                                    <input type="text" class="form-control" placeholder="Titulo del PostDoctorado..." name="tituloPostDoctorado"  value="{{$emple->tituloPostDoctorado}}">
                                    <input type="file"  name="file" value="{{old('foto')}}">
                                 </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="cedulaPostDoctorado">Cédula</label>
                                    <input type="text" class="form-control" placeholder="Cédula del PostDoctorado..." name="cedulaPostDoctorado"  value="{{$emple->cedulaPostDoctorado}}">
                                    <input type="file"  name="file" value="{{old('foto')}}">
                                 </div>
                            </div><br>
                            </div>
                        </div>
                      </div>
                    </div><br>
                    <br>
                </div>
            </div>
        </div>
     </div>
 </div>
                <div class="form-group">
                    <button type="submit" class="btn  btn-success  btn-block">
                        Guardar
                    </button>  
                </div>
         </form>
        </div>
    </div>
</div>

        <!-- /#page-wrapper -->
@endsection




