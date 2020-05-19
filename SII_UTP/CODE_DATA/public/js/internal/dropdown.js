

////////////////////////////////////////DATOS DE CARGA AL INGRESAR A LA VISTA//////////////////////////////////////////////
	
	$(document).ready(function(){
		var idValue = $("#verListaDe").val();

		if (idValue=="1") {
			/////////////////////TODOS LOS EMPLEADOS//////////////////////////		
		    var screen = $('#loading-screen');
		    configureLoadingScreen(screen);

         	$.get('../listaEmpleado/general/1')
            .done(function(result){
                $.ajax({
		          	url:'../listaEmpleado/general/1',
		          	type:'get',
		          	dataType:'json',
		          	data: {
          			},
        			success:function(data){
			          	$('#contenido').html('');
			           	$.each(data, function(idx, opt) {

			           		

			           		if (opt.tipo == '2') {

			           			$('#contenido').append("<tr><td><center><img style='width: 100px; height: 100px'  class='img-thumbnail' src="+opt.foto+"></img></center></td>"
					    		+"<td>" +opt.NombreEmpleado+" "+opt.txtPaterno+" "+opt.txtMaterno+ "</td>"
					    		+"<td>Profesor</td>"
					    		+"<td>"+opt.cedulaProfecional+"</td>"
					    		+"<td>"+opt.especialidad+"</td>"
					    		+"<td>"+opt.nivelEstudios+"</td>"
					    		+"<td><a href='../edit/profesor/" +opt.id+ "'<button class='btn btn-info'>Editar</button></a>"
					    		+" "+"<a href='../delete/profe/" +opt.id+ "'<button class='btn btn-danger'>Eliminar</button></a></td></tr>");

			           		}else if(opt.tipo == '6'){

			           			$('#contenido').append("<tr><td><center><img style='width: 100px; height: 100px'  class='img-thumbnail' src="+opt.foto+"></img></center></td>"
					    		+"<td>" +opt.NombreEmpleado+" "+opt.txtPaterno+" "+opt.txtMaterno+ "</td>"
					    		+"<td>Empleado</td>"
					    		+"<td>"+opt.cedulaProfecional+"</td>"
					    		+"<td>"+opt.especialidad+"</td>"
					    		+"<td>"+opt.nivelEstudios+"</td>"
					    		+"<td><a href='../edit/empleado/" +opt.id+ "'<button class='btn btn-info'>Editar</button></a>"
					    		+" "+"<a href='../delete/empleado/" +opt.id+ "'<button class='btn btn-danger'>Eliminar</button></a></td></tr>");

			           		}          
			   			
					    	     		
				        });
        			}
				});
            })
            .fail(function(error){
                console.error(error);
            })
  
			function configureLoadingScreen(screen){
		    	$(document)
		        .ajaxStart(function () {
		            screen.fadeIn();
		        })
		        .ajaxStop(function () {
		            screen.fadeOut();
		        });
			}

		} else if(idValue == "2"){
			///////////SOLO EMPELADOS ADMINISTRATIVOS////////////
			var screen = $('#loading-screen');
		    configureLoadingScreen(screen);

         	$.get('../listaEmpleado/administrativos/2')
            .done(function(result){
                $.ajax({
		          	url:'../listaEmpleado/administrativos/2',
		          	type:'get',
		          	dataType:'json',
		          	data: {
          			},
        			success:function(data){

			          	$('#contenido').html('');
			           	$.each(data, function(idx, opt) {           
			   			
					    	$('#contenido').append("<tr><td><center><img style='width: 100px; height: 100px'  class='img-thumbnail' src='"+opt.foto+"'></img></center></td>"
					    		+"<td>" +opt.NombreEmpleado+" "+opt.txtPaterno+" "+opt.txtMaterno+ "</td>"
					    		+"<td>Administrativos</td>"
					    		+"<td>"+opt.cedulaProfecional+"</td>"
					    		+"<td>"+opt.especialidad+"</td>"
					    		+"<td>"+opt.nivelEstudios+"</td>"
					    		+"<td><a href='../edit/empleado/" +opt.id+ "'<button class='btn btn-info'>Editar</button></a>"
					    		+" "+"<a href='../delete/empleado/" +opt.id+ "'<button class='btn btn-danger'>Eliminar</button></a></td></tr>"); 
				           
				          
				        });
        			}
				});
            })
            .fail(function(error){
                console.error(error);
            })
  
			function configureLoadingScreen(screen){
		    	$(document)
		        .ajaxStart(function () {
		            screen.fadeIn();
		        })
		        .ajaxStop(function () {
		            screen.fadeOut();
		        });
			}
			//
		}else if (idValue=="3") {
			
			//////////SOLO PROFESORES///////////////
		    var screen = $('#loading-screen');
		    configureLoadingScreen(screen);

    
        	$.get('../listaEmpleado/profesores/3')
            .done(function(result){
                 $.ajax({
		          	url:'../listaEmpleado/profesores/3',
		          	type:'get',
		          	dataType:'json',
		          	data: {
		            
		          	},
        			success:function(data){
          				$('#contenido').empty();
	           				$.each(data, function(idx, opt) {           
				    		$('#contenido').append("<tr><td><center><img style='width: 100px; height: 100px'  class='img-thumbnail' src='"+opt.foto+"'></img></center></td>"
				    		+"<td>" +opt.NombreEmpleado+" "+opt.txtPaterno+" "+opt.txtMaterno+ "</td>"
				    		+"<td>Profesor</td>"
				    		+"<td>"+opt.cedulaProfecional+"</td>"
				    		+"<td>"+opt.especialidad+"</td>"
				    		+"<td>"+opt.nivelEstudios+"</td>"
				    		+"<td><a href='../edit/profesor/" +opt.id+ "'<button class='btn btn-info'>Editar</button></a>"
				    		+" "+"<a href='../delete/profe/" +opt.id+ "'<button class='btn btn-danger'>Eliminar</button></a></td></tr>"); 
		        			});
        			}
				});
            })
            .fail(function(error){
                console.error(error);
            })

			function configureLoadingScreen(screen){
    			$(document)
        		.ajaxStart(function () {
            		screen.fadeIn();
        		})
       	 		.ajaxStop(function () {
            		screen.fadeOut();
        		});
			}
		}

	});

/////////////////////////////////////////////DATOS EMPLEADOS ADMINISTRATIVOS///////////////////////////////////////////////////


$(document).ready(function(){
	    var screen = $('#loading-screen');
	    configureLoadingScreen(screen);

    		$('#emp').on('click', function(){
         		$.get('../listaEmpleado/administrativos/2')
             	.done(function(result){
                	$.ajax({
			          	url:'../listaEmpleado/administrativos/2',
			          	type:'get',
			          	dataType:'json',
			          	data: {
			            
			          	},
        				success:function(data){
          					$('#contenido').html('');
           					$.each(data, function(idx, opt) {           
   			
					    	$('#contenido').append("<tr><td><center><img style='width: 100px; height: 100px'  class='img-thumbnail' src='"+opt.foto+"'></img></center></td>"
					    		+"<td>" +opt.NombreEmpleado+" "+opt.txtPaterno+" "+opt.txtMaterno+ "</td>"
					    		+"<td>Administrativos</td>"
					    		+"<td>"+opt.cedulaProfecional+"</td>"
					    		+"<td>"+opt.especialidad+"</td>"
					    		+"<td>"+opt.nivelEstudios+"</td>"
					    		+"<td><a href='../edit/empleado/" +opt.id+ "'<button class='btn btn-info'>Editar</button></a>"
					    		+" "+"<a href='../delete/empleado/" +opt.id+ "'<button class='btn btn-danger'>Eliminar</button></a></td></tr>"); 
				           
				          
				        	});
        				}
					});
             	})
             	.fail(function(error){
                 	console.error(error);
             	})
    		})
	});

	function configureLoadingScreen(screen){
    	$(document)
        .ajaxStart(function () {
            screen.fadeIn();
        })
        .ajaxStop(function () {
            screen.fadeOut();
        });
	}
	




/////////////////////////////////////////////////DATOS TODOS LOS EMPLEADOS//////////////////////////////////////////////////
	$(document).ready(function(){
	    var screen = $('#loading-screen');
	    configureLoadingScreen(screen);

    		$('#all').on('click', function(){
         		$.get('../listaEmpleado/general/1')
             	.done(function(result){
                	$.ajax({
			          	url:'../listaEmpleado/general/1',
			          	type:'get',
			          	dataType:'json',
			          	data: {
			            
			          	},
        				success:function(data){
          					$('#contenido').html('');
           					$.each(data, function(idx, opt) {           
   			
					    		if (opt.tipo == '2') {

			           			$('#contenido').append("<tr><td><center><img style='width: 100px; height: 100px'  class='img-thumbnail' src='"+opt.foto+"'></img></center></td>"
					    		+"<td>" +opt.NombreEmpleado+" "+opt.txtPaterno+" "+opt.txtMaterno+ "</td>"
					    		+"<td>Profesor</td>"
					    		+"<td>"+opt.cedulaProfecional+"</td>"
					    		+"<td>"+opt.especialidad+"</td>"
					    		+"<td>"+opt.nivelEstudios+"</td>"
					    		+"<td><a href='../edit/profesor/" +opt.id+ "'<button class='btn btn-info'>Editar</button></a>"
					    		+" "+"<a href='../delete/profe/" +opt.id+ "'<button class='btn btn-danger'>Eliminar</button></a></td></tr>");

			           		}else if(opt.tipo == '6'){

			           			$('#contenido').append("<tr><td><center><img style='width: 100px; height: 100px'  class='img-thumbnail' src='"+opt.foto+"'></img></center></td>"
					    		+"<td>" +opt.NombreEmpleado+" "+opt.txtPaterno+" "+opt.txtMaterno+ "</td>"
					    		+"<td>Empleado</td>"
					    		+"<td>"+opt.cedulaProfecional+"</td>"
					    		+"<td>"+opt.especialidad+"</td>"
					    		+"<td>"+opt.nivelEstudios+"</td>"
					    		+"<td><a href='../edit/empleado/" +opt.id+ "'<button class='btn btn-info'>Editar</button></a>"
					    		+" "+"<a href='../delete/empleado/" +opt.id+ "'<button class='btn btn-danger'>Eliminar</button></a></td></tr>");

			           		}
				        	});
        				}
					});
             	})
             	.fail(function(error){
                 	console.error(error);
             	})
    		})
	});

	function configureLoadingScreen(screen){
    	$(document)
        .ajaxStart(function () {
            screen.fadeIn();
        })
        .ajaxStop(function () {
            screen.fadeOut();
        });
	}


	

//////////////////////////////////////////DATOS PROFESORES///////////////////////////////////////////////////////////

	$(document).ready(function(){
	    var screen = $('#loading-screen');
	    configureLoadingScreen(screen);

    	$('#prof').on('click', function(){
        	$.get('../listaEmpleado/profesores/3')
            .done(function(result){
                 $.ajax({
		          	url:'../listaEmpleado/profesores/3',
		          	type:'get',
		          	dataType:'json',
		          	data: {
		            
		          	},
		        	success:function(data){
          				$('#contenido').empty();
           				$.each(data, function(idx, opt) {           
   			
					    	$('#contenido').append("<tr><td><center><img style='width: 100px; height: 100px'  class='img-thumbnail' src='"+opt.foto+"'></img></center></td>"
					    		+"<td>" +opt.NombreEmpleado+" "+opt.txtPaterno+" "+opt.txtMaterno+ "</td>"
					    		+"<td>Profesor</td>"
					    		+"<td>"+opt.cedulaProfecional+"</td>"
					    		+"<td>"+opt.especialidad+"</td>"
					    		+"<td>"+opt.nivelEstudios+"</td>"
					    		+"<td><a href='../edit/profesor/" +opt.id+ "'<button class='btn btn-info'>Editar</button></a>"
					    		+" "+"<a href='../delete/profe/" +opt.id+ "'<button class='btn btn-danger'>Eliminar</button></a></td></tr>"); 
				           
				          
				        	});
        			}
				});
            })
            .fail(function(error){
                console.error(error);
            })
    	})
	});

	function configureLoadingScreen(screen){
    	$(document)
        .ajaxStart(function () {
            screen.fadeIn();
        })
        .ajaxStop(function () {
            screen.fadeOut();
        });
	}


	







$("#buscarCiclo").change(function (event) {
	
	alert('nkjnjk');                    
});