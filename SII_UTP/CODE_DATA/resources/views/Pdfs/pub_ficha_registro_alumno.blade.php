@extends('layouts.pdfs')
@section('sub_title')	
	REGISTRO DE ALUMNOS
@endsection
@section('head_folio_matricula')
	{{$alumno_folio}}
@endsection
@section('contenido_box_dark')
	<p class="text-body-title">DATOS DE IDENTIFICACIÓN</p>
	<ul>
		<li class="text-body-description"><b>NOMBRE:</b> {{$paterno." ".$materno." ".$nombres}} </li>
		<li class="text-body-description"><b>CURP:</b>{{$curp}}</li>
	</ul>
	<p class="text-body-title">DATOS DE LA CARRERA</p>
	<ul>
		<li class="text-body-description"><b>NIVEL:</b> TÉCNICO SUPERIOR UNIVERSITARIO</li>
		<li class="text-body-description"><b>CARRERA:</b> {{$carrera}} </li>
		<li class="text-body-description"><b>FECHA DE REGISTRO:</b> {{$fecha_registro_formated}}</li>
	</ul>
	<p class="text-body-title">DATOS DE CONTACTO</p>
	<ul>
		<li class="text-body-description"><b>DIRECCÓN:</b> {{$domicilio.", ".$municipio}}</li>
		<li class="text-body-description"><b>TELÉFONO / CEL:</b> {{$celular}} <b>     EMAIL: </b>{{$email}}</li>
	</ul>	
	
	 <p class="text-body-description"><b>DOCUMENTACIÓN REGISTRADA: </b></p>
    <p class="text-body-description">
		<ol>
            @foreach($documentos as $documento)
    	        <li>{{$documento->nombre}}</li>
    	    @endforeach
        </ol>
    </p>
@endsection
@section('contenido_box_light')				
	<p class="text-body-description"><b>DATOS DEL EXAMEN</b></p>	
	<ul class="text-body-description">
    
    	<li class="text-body-description"><b>FECHA: </b>Sábado 20 de junio de 2020  <b>     HORA: </b>10:00 am (Presentarse una hora antes para el registro)</li>
    	<li class="text-body-description"><b>LUGAR: </b>Universidad Tecnológica del Poniente</li>
    	
    </ul>
    <br>
    <p class="text-body-description"><b>INDISPENSABLE PRESENTARSE EL DÌA DEL EXAMEN CON LOS SIGUIENTES DOCUMENTOS: </b></p>
    <ul class="text-body-description">
    	<ol>
    		<li>Pase de ingreso al EXANI II</li>
    		<li>El presente registro</li>
    		<li>La ficha de pago y una identificación oficial con fotografia</li>
    	</ol>
    </ul>
   
	<p class="text-body-description">
		<b class="text-red">NOTA: </b>Si algún documento ingresado al sistema no es correcto, perderá su derecho de ingreso al EXAN II.
	</p>
	<br>
	<h9 class="text-body-description" style="text-align: justify-all;">
		<b class="text-red">Aviso de privacidad: </b>Los datos personales recabados en nuestros formatos serán protegidos, incorporados y tratados en el Sistema de Gestión Escolar (GES) de la Universidad Tecnológica del Poniente,
		con fundamento en lo dispuesto en los artículos 6º, fracciones II y III de la Constitución Política de los Estados Unidos Mexicanos; y Artículo 23 de la Ley Federal de Transparencia y Acceso a la Información Pública Gubernamental.
		Los datos personales tendrán la finalidad de: a) Establecer comunicación con el usuario como respuesta a una petición o comentario realizado; b) Elaborar informes estadísticos y c) dar seguimiento a los avances institucionales,
		los cuales son transmitidos únicamente con la Dirección General de Profesiones (DGP) y con la Coordinación General de Universidades Tecnológicas y Politécnicas (CGUTyP); así como las diferentes dependencias del Gobierno del Estado de Yucatán.
		El titular de la información podrá ejercer sus derechos ARCO (acceso, rectificación, cancelación u oposición) de divulgación de sus datos personales y sensibles, solicitándolo de manera escrita al responsable institucional de los mismos.
		Como medida adicional, todos los trámites que el titular deba realizar ante la UTP, podrán ser realizados por un familiar en primer grado (padres, hijos o hermanos), con carta poder simple y copia fotostática de la identificación oficial de ambos y de dos testigos.
		Los cónyuges, además de lo anterior, deberán presentar copia del acta de matrimonio. Otras personas, deberán presentar poder notarial y copia fotostática de identificación oficial de ambos.
		La Universidad Tecnológica del Poniente es la responsable de este Sistema de Datos Personales. Lo anterior se informa en cumplimiento de los Artículos 27 y 28 de la Ley Federal de Protección de Datos Personales en Posesión de Sujetos Obligados,
		publicados el 26 de enero de 2017. El aviso de privacidad integral podrá consultarlo en: https://utpyucatan.wixsite.com/control-escolar/aviso-de-privacidad.
	</h9>
	<p align="right"> 
    F-UTP-DCE-02/Rev.07
 </p>
@endsection								