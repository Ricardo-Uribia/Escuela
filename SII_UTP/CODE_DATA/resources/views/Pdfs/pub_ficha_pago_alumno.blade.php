@extends('layouts.pdfs')
@section('sub_title')
	FICHA DE PAGO DE EXAMEN
@endsection
@section('head_folio_matricula')
	{{$alumno_folio}}
@endsection
@section('contenido_box_dark')

	<p class="text-body-title">DATOS DE IDENTIFICACIÓN</p>
	<ul>
		<li class="text-body-description"><b>NOMBRE:</b> {{$paterno." ".$materno." ".$nombres}}</li>
		<li class="text-body-description"><b>CURP:</b> {{$curp}}</li>
	</ul>
	<p class="text-body-title">DATOS DE LA CARRERA</p>
	<ul>
		<li class="text-body-description"><b>NIVEL:</b> TÉCNICO SUPERIOR UNIVERSITARIO</li>
		<li class="text-body-description"><b>CARRERA:</b> {{$carrera}}</li>
		<li class="text-body-description"><b>FECHA DE REGISTRO:</b> {{$fecha_registro_formated}}</li>
	</ul>
	<p class="text-body-title">DATOS DE CONTACTO</p>
	<ul>
		<li class="text-body-description"><b>DIRECCÓN:</b> {{$domicilio.", ".$municipio}}</li>
		<li class="text-body-description"><b>TELÉFONO / CEL:</b> {{$telefono}} / {{$celular}}</li>
		<li class="text-body-description"><b>CORREO ELECTRÓNICO</b> {{$email}}</li>
	</ul>		

@endsection
@section('contenido_box_light')	

    <p class="text"><B>PASO No.2</B></p>
    <p class="text">PARA CONTINUAR TU REGISTRO, AHORA DEBERÁS REALIZAR EL PAGO DEL EXANI II. PUEDES HACERLO EN CUALQUIERA DE ESTAS DOS MODALIDADES:</p>
    
    	<ul>
		<li class="text-body-description"><class="text-blue">PAGO EN LÍNEA DESDE LA APLICACIÓN DE BANCO AZTECA (DEBES TENER CUENTA EN ESTE BANCO)</li>
		<li class="text-body-description"><class="text-blue">ACUDE A LA SUCURSAL DE BANCO AZTECA MÁS CERCANA A TU DOMICILIO</li>
	
	    </ul>


	<p class="text-body-title">DATOS BANCARIOS PARA REALIZAR EL PAGO</p>	
	<ul>
		<li class="text-body-description"><b class="text-blue">Institución bancaria: </b> Banco Azteca (cualquier sucursal) </li>
		<li class="text-body-description"><b class="text-blue">No. de Convenio DAZ: </b> 10360</li>
		<li class="text-body-description"><b class="text-blue">No. de cuenta: </b> 01720133009860</li>
		<li class="text-body-description"><b class="text-blue">CLABE Interbancaria: </b> 127180450000103606</li>
		<li class="text-body-description"><b class="text-blue">Nombre del sustentante: </b> {{$paterno." ".$materno." ".$nombres}}</li>
		<li class="text-body-description"><b class="text-blue">Folio del sustentante: </b> {{"UTP".$alumno_folio}}</li>
		<li class="text-body-description"><b class="text-blue">Cantidad a pagar: </b> $300.00 (Son: Trescientos pesos 00/100 M.N.)</li>
	</ul>
	
	<p class="text">DESPUÈS DE REALIZAR EL PAGO, ESCANEA EL RECIBO BANCARIO O TÓMALE UNA FOTOGRAFÍA BIEN CENTRADA Y EN LA QUE LOS DATOS DE ÉSTE SE VEAN CLARAMENTE, E INGRESA NUEVAMENTE AL SISTEMA PARA SUBIR ESTE DOCUMENTO</p>
    <p class="text">www.registro.utponiente.edu.mx</p>
<br>
<hr>
<br>
<p class="text-body-description"><b>NOTA:<br>Este documento es exclusivamente de carácter informativo.<br>En ningún momento será considerado como comprobante de pago.</b> </p>
@endsection								