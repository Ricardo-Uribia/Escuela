@extends('layouts.admin')
@section('principal')
<!DOCTYPE html>
<html>
<head>
<style>

h1 {
	font-family:normal normal 700 20px/1.4em avenir-lt-w01_35-light1475496,sans-serif;
 	text-align: center;
  	text-transform: uppercase;
  	color: #1F2F55;
}
}
h2 {
	font-family:normal normal 700 20px/1.4em avenir-lt-w01_35-light1475496,sans-serif;
 	text-align: center;
  	text-transform: uppercase;
  	color:black;
}
h3 {
	font-family:normal normal 700 20px/1.4em avenir-lt-w01_35-light1475496,sans-serif;
	font-weight: bold;
	font-size:20px;
 	text-align: left;
  	color: black;
}

.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
.button1 {
  background-color: white; 
  color: black; 
  border: 2px solid #008CBA;
}
.button:hover {

 background-color: #9fd5d1;
}


</style>
</head>
<body>

<div>
  <h1> Bienvenido al:</h1>
  <h1> Sistema de Informacion Institucional de la UTP (SII-UTP) </h1>
  <h2> Aquí podrás consultar y modificar, tus datos de registro, adjuntar tus documentos; reinscribirte y registrarte a los eventos de la Universidad; así como realizar la evaluación docente cuatrimestral.</h2>
</div>
<br>
<section>

	<h3>Consultar:</h3>
	<br>	
	<div class="row">

		<div class="col-sm-3"><button class="button button1" ><i class="fa fa-database fa-2x fa-lg" ></i>  Mis datos</button></div>
		<div class="col-sm-3"><button class="button button1" ><i class="fa fa-folder fa-2x fa-lg"></i>  Mis documentos</button></div>
		<div class="col-sm-3"><button class="button button1" ><i class="fa fa-money fa-2x fa-lg" ></i>  Estado de cuenta</button></div>
		<div class="col-sm-3" ><button class="button button1" ><i class="fa fa-pencil-square-o fa-2x fa-lg" ></i>  Calificaciones</button></div>
		<br>
	</div>
		<br>
		<div class="row">
		<div class="col-sm-3"><button class="button button1" ><i class="fa fa-calendar fa-2x fa-lg"></i>  Eventos</button></div>
	</div>

	<br>

	<h3>Realizar:</h3>
	<br>
	<!div class="row">
		<div class="col-sm-3"><button class="button button1" ><i class="fa fa-pencil-square-o fa-2x fa-lg"></i>Inscripción / Reinscripción</button></div>
		<a href="{{ url('/presentacion') }}""><div class="col-sm-3"><button class="button button1" ><i class="fa fa-pencil-square-o fa-2x fa-lg" ></i> Evaluación Docente</button></div></a>
			<a href="#""><div class="col-sm-3"><button class="button button1" ><i class="fa fa-pencil-square-o fa-2x fa-lg" ></i> Registro a Villas</button></div></a>
	</div>
</section>

</body>
</html>

@endsection
