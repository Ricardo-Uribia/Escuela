<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>		
		.row{
			width: 100%;
		}
		.box-content{
			margin-top: -15px;
			border-width: 1px;
			border-style: solid;
			padding-top: 10px;
			padding-bottom: 10px;
			font-size: 12px;			
			font-family: sans-serif;				
			width: 100%;
		}
		.box-content-light{
			padding-top: 10px;
			padding-bottom: 10px;
			font-size: 12px;
			font-family: sans-serif;
			width: 100%;
		}
		.margin-top-bottom-0{
			margin-top: 0px;
			margin-bottom: 0px;
		}
		.margin-bottom-0{
			margin-bottom: 0px;
		}
		.inline-block{
			display: inline-block;
		}
		.text-red{
			color: red;
		}
		.text-bold{
			font-weight: bold;
		}
		.text-body-title{
			text-decoration: underline;
			font-weight: bold;
			padding-left: 15px;
			padding-right: 15px;

		}
		.text-body-description{
			margin-top: 0px;
			margin-bottom: 0px;
			padding-left: 15px;
			padding-right: 15px;
		}
		.padding-top-parent{
			padding-top: -5px;
		}
		.image-fluid{
			width: 150px; 
			height: auto;
		}
		
	</style>
</head>
<body>

	<div class="row">
	    <center>
	    	<figure class="margin-bottom-0">
	    		<img class="image-fluid" src="{{asset('/CODE_DATA/public/img/internal_statics/logo-pdf-utp.jpeg')}}">
	    		<figcaption><b>UNIVERSIDAD TECNOLOGICA DEL PONIENTE</b></figcaption>				
	    	</figure>	
	    	<p class="margin-top-bottom-0">@yield('sub_title')</p>			
	    	
    	</center>    	    
	    <p class="margin-top-bottom-0 inline-block"><b>FOLIO:</b></p><h2 class="text-red margin-top-bottom-0 inline-block" style="padding-top: 10px">@yield('head_folio_matricula')</h2>
	</div>
	<br>
	<div class="row" >			
		<div class="box-content">
			@yield('contenido_box_dark')
		</div>
				
		<div class="box-content-light">
			@yield('contenido_box_light')			
		</div>							
	</div>	

</body>
</html>