function modelDelete(evt, url) {
    var sendUrl = url +"/"+ evt.value

	Swal.fire({
			title: '¿Estás seguro?',
		    text: "Ya no podras revertir esta acción!!",
		    icon: 'warning',
		    cancelButtonText: 'Cancelar',
		    showCancelButton: true,
		    confirmButtonColor: '#3085d6',
		    cancelButtonColor: '#d33',
		    confirmButtonText: 'Si, de acuerdo!'
	}).then((result) => {
		if (result.value) {
			var req = new XMLHttpRequest();
       		req.open('GET', sendUrl , true);
       		req.onreadystatechange = function (aEvt) {
       			if(req.status == 200){
	              	Swal.fire(
		                'Eliminado!',
		                'El archivo ha sido eliminado',
		                'success'
			            ).then((result) => {
				            if (result.value) {
			                  location.reload()
			                }else{
			                   location.reload()
			                }
			              })
				}else{
				    Swal.fire({
					    icon: 'error',
					    title: 'Oops...',
					    text: 'Ah ocurrido un error! Intente más tarde o llame al administrador'
					})
				}
        	};
        	req.send(null);
		}
	})
}