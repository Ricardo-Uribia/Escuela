@extends('layouts.mails')

@section('contenido')
	<h4 class="col-md-12 text-left" style=" 
    		max-width: 100%;
    		margin-top: 5px;
    		margin-bottom: 5px;
    		text-align: left !important;
  			margin-left: 2%;
  			margin-right: 2%;
  			color: #000;
  			text-decoration: none;
  			font-size: 1.5rem;">
  				<b style="font-weight: bolder;">Folio:</b> {{$folio_alumno}} 
  			</h4>		    
		    <h4 class="col-md-12 text-left" style=" 
    		max-width: 100%;
    		margin-top: 5px;
    		margin-bottom: 5px;
    		text-align: left !important;
  			margin-left: 2%;
  			color: #000;
  			margin-right: 2%;
  			font-size: 1.5rem;">
					<b style="font-weight: bolder;">Alumno:</b> {{$nombres." ".$paterno." ".$materno}} 
			</h4>
	    <h4 class="col-md-12 text-left" style=" 
  		max-width: 100%;
  		text-align: left !important;
  		margin-top: 5px;
  		margin-bottom: 5px;
			margin-left: 2%;
			color: #000;
			margin-right: 2%;
			font-size: 1.5rem;">
				<b style="font-weight: bolder; display: inline-block;">Link:</b>     
        <a href="{{url('/pub/tok_ficha').'/'.$_token_acceso}}" target="_blank" style="color: #007bff !important; border: 0; display: inline-block;">
            <br>
          <button>
            Ir a ficha de registro
          </button>
        </a>    
			</h4>	    		    
	    	    
	    	<h4 class="col-md-12 text-left " style="
    		max-width: 100%;
    		margin-top: 6%;
    		margin-bottom: 5px;
    		text-align: left !important;
  			margin-left: 2%;
  			margin-right: 2%; 
  			font-size: 1.5rem; text-decoration: none;">
  				<b style="font-weight: bolder;">Nota:</b>
		   		<span class="text-danger col-md-10 " style="
		   		color: #dc3545 !important;
			    max-width: 83.333333%;">
		   			Si sus datos no son correctos por favor no haga mal uso de estos y contactese con el administrador al siguiente correo:</span> <span class="text-primary" style="color: #007bff !important; text-decoration: none;">controlescolar.utponiente@gmail.com o directamente en control escolar.
		   		</span>	    		   
	    	</h4>
	

@endsection