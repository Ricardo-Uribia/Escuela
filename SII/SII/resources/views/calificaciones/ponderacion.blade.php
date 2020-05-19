@extends('layouts.admin')

@section('principal')

<!-- <link rel="stylesheet" type="text/css" href="{{asset('css_academico/calificacion.css')}}">
 -->
<div id="page-wrapper"><br>
 
<div class="well">
<legend>Configuración De Parciales</legend> 
</div>

<form role="form-signin" class="form-horizontal" id="f1" name="f1" method="POST" action="{{ url('/actualizar/ponderacion')}}" > 
 @csrf
 <div class="row">
 	<div class="col-sm-6">
 		<label for="profesor">Seleccione un Profesor</label>
 	</div>
 	<div class="col-sm-6">
 		<label for="asignatura">Seleccione una asignatura</label>
 	</div>	
 </div>
 <div class="row">
<div  class="col-sm-6">	
	<select class="form-control" name="profesor" required="" id="profesor">
		<option value="">Seleccione un profesor</option>
		@foreach($profesoresgrupos as $profesorgrupo)
		<option value="{{$profesorgrupo->id}}">{{$profesorgrupo->Profesores->Empleados->NombreEmpleado.' '.$profesorgrupo->Profesores->Empleados->txtPaterno.' '.$profesorgrupo->Profesores->Empleados->txtMaterno}}</option>
		@endforeach
	</select>
</div>

<div class="col-sm-6">		
	<select class="form-control" name="asignatura22" required="" id="asignatura22">
		<option value="">Seleccione una Asignatura</option>
	</select>
</div>
</div>
<div>
	<h2>CARGA DE PORCENTAJES</h2>
</div> 
<table class="table table-bordered">
<thead>
  <tr>
    <th>Primer Parcial</th>
    <th>Segundo Parcial</th> 
    <th>Tercer Parcial</th>
    <th>TOTAL</th>
  </tr>
 </thead>
 <tbody>
  <tr>
    <td><input id="p1" type="text" onkeyup="Sumar()" class="form-control" name="p1" required></td>
    <td><input id="p2" type="text" onkeyup="Sumar()" class="form-control" name="p2" required></td>
    <td><input id="p3" type="text" onkeyup="Sumar()" class="form-control" name="p3" required></td>
    <td><input id="p4" type="text" class="form-control" name="p4" value="" required></td>
  </tr>
 </tbody>
</table>
<div class="pull-right">
<button onclick="Suma()" id="btn1" type="submit" class="btn btn-success">Guardar</button>
</div>
  </form>
</div>

 <script type="text/javascript">
 	function Sumar(){
 		a=parseInt(document.f1.p1.value);
 		b=parseInt(document.f1.p2.value);
 		c=parseInt(document.f1.p3.value);

 		d=a+b+c;
 		document.f1.p4.value=d;

 		if(d==10){
 			document.f1.p4.value=d;
 			document.getElementById('p4').style.borderColor='#3DE21B';
 			document.getElementById('p4').style.color = '#3DE21B';
 			alert("Suma correcta");
 		}
 		else if(d<10){
 			document.f1.p4.value=d;
 			document.getElementById('p4').style.borderColor='#F0260F';
 			document.getElementById('p4').style.color = '#F0260F';
 			alert("Valores Incorrectos");
 		}
 		else if(d>10){
 			document.f1.p4.value=d;
 			document.getElementById('p4').style.borderColor='#F0260F';
 			document.getElementById('p4').style.color = '#F0260F';
 			alert("Valores Incorrectos");
 		}
 	}
 </script>


@endsection