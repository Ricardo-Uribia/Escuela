<!DOCTYPE html>
<html>
<head><meta charset="gb18030">
    <title>PRUEBA CONFIRMACION DE IDENTIDAD</title>
   
</head>
<body> 
	<br> 
						  
	<div class="card-body" style="
	  -ms-flex: 1 1 auto;
	  flex: 1 1 auto;
	  min-height: 1px;
	  padding: 1.25rem;"	>
		<img src="{{asset('CODE_DATA/public/img/internal_statics/BANNER_CORREOS.jpg')}}" class="card-img-top" style="
		margin-bottom: 0.75rem; 				    				    
	  	height: 160px;  
			width: 100%;
		border-top-left-radius: calc(0.25rem - 1px);
			border-top-right-radius: calc(0.25rem - 1px);" alt="..">

	    <h4 class="card-title text-center" style="
	    		margin-bottom: 0.75rem; 
	    		margin-top: 5px;
	    		text-align: center !important;
	    		font-size: 1.5rem;
	    		color: #000;
	    		font-size: 1.5rem;"><b style="font-weight: bolder;">Universidad Tecnológica del Poniente</b>
	    </h4>			    				    					
		
		<br>					
	    <div class="row card-text" style="
	      display: -ms-flexbox;
		  display: flex;
		  -ms-flex-wrap: wrap;
		  flex-wrap: wrap;
		  margin-right: -15px;
		  margin-left: -15px;
		  width: 100%;
		  last-child:margin-bottom: 0;">

			<h4 class="col-md-12 text-left" style=" 			
    		max-width: 100%; 
    		text-align: left !important;
    		margin-top: 5px;
    		margin-bottom: 5px;
  			margin-left: 2%;
  			margin-right: 2%;
  			color: #000;
  			font-size: 1.5rem;">
  				<b style="font-weight: bolder;">Asunto:</b> Confirmación de identidad para visualizar ficha de registro
  			</h4>    	
		    
		    @yield('contenido')

	    	<div class="card-footer bg-light text-right" style="
				    padding: 0.75rem 1.25rem;
		  			background-color: rgba(0, 0, 0, 0.03);
		  			border-top: 1px solid rgba(0, 0, 0, 0.125);
		  			width: 100%;		
		  			color: #000;
		  			text-align: right;">
					Sistema Integral de Información de la Universidad Tecnológica del Poniente
			</div>
		</div>

	    <br>
	    <br>
	</div>
			
			
  
</body>
</html>