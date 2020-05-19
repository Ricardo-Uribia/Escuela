class Edad {


    static calcular(trigger_input, invisible_input, visible_input){

      var this_trigger_input   = document.getElementById(trigger_input);
      var this_invisible_input = document.getElementById(invisible_input); 
      var this_visible_input   = null;

      if (visible_input != null) {
        this_visible_input = document.getElementById(visible_input);
      }

      this_trigger_input.addEventListener('blur', function(envent){
          let date = event.target.value;
          let edad = getEdad(date);
          this_invisible_input.value = edad ;
          
          if (this_visible_input != null) {
            let sufijo=(isNaN(edad))?"":" años";
            this_visible_input.value = edad+sufijo;
          }

      });      


      function getEdad(date){
        if(validate(date)==true)
        {
          // Si la fecha es correcta, calculamos la edad
          let values=date.split("-");
          let dia = values[2];
          let mes = values[1];
          let anio = values[0];

          // cogemos los valores actuales
          let fecha_hoy = new Date();
          let ahora_anio = fecha_hoy.getYear();
          let ahora_mes = fecha_hoy.getMonth()+1;
          let ahora_dia = fecha_hoy.getDate();

          // realizamos el calculo
          let edad = (ahora_anio + 1900) - anio;
          if ( ahora_mes < mes ){
              edad--;
          }
          if ((mes == ahora_mes) && (ahora_dia < dia)){
              edad--;
          }
          if (edad > 1900){
              edad -= 1900;
          }

          // calculamos los meses
          let meses=0;
          if(ahora_mes>mes)
              meses=ahora_mes-mes;
          if(ahora_mes<mes)
              meses=12-(mes-ahora_mes);
          if(ahora_mes==mes && dia>ahora_dia)
              meses=11;

          // calculamos los dias
          let dias=0;
          if(ahora_dia>dia)
              dias=ahora_dia-dia;
          if(ahora_dia<dia)
          {
              let ultimoDiaMes=new Date(ahora_anio, ahora_mes, 0);
              dias=ultimoDiaMes.getDate()-(dia-ahora_dia);
          }        
          return edad;    
        }else{
          alert("Fecha de nacimiento incorrecto, porfavor ingreselo correctamente");
          return "INCORRECTO !";
        }
      }

       
      function validate(fecha)
      {
        let patron=new RegExp("^(19|20)+([0-9]{2})([-])([0-9]{1,2})([-])([0-9]{1,2})$");
        let estrucctura_valida= false;

        if(fecha.search(patron)==0)
        {
          let values=fecha.split("-");
          estrucctura_valida = hasDates(values[2],values[1],values[0]);      
        }
        return estrucctura_valida;
      } 



      function hasDates(day,month,year)
      {
        var dteDate;    
        month=month-1;
        dteDate=new Date(year,month,day);    
        //Devuelva true o false..
        return ((day==dteDate.getDate()) && (month==dteDate.getMonth()) && (year==dteDate.getFullYear()));
      }

  }




}