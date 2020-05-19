
var counter_toggle_class = 0;

function toggleClass(element, first_class, second_class){
  counter_toggle_class += 1;            
  if (counter_toggle_class == 1) {
    element.classList.remove(first_class);
    element.classList.add(second_class);
  }else{
    element.classList.add(first_class);
    element.classList.remove(second_class);
    counter_toggle_class =0;
  }
}

function toggleNotShow(element, value){    
    if (value != "") {            
        let not_show= JSON.parse(value);
        if (not_show) {
            element.setAttribute("hidden", "hidden");
        }else{
            element.removeAttribute("hidden");
        }
    }else{                
        element.setAttribute("hidden", "hidden");                
    }
}


function toggleShow(element, value) {
    if (value != "") {                
        let show= JSON.parse(value);
        if (show) {
            element.removeAttribute("hidden");
        }else{
            element.setAttribute("hidden", "hidden");
        }
    }else{                
        element.setAttribute("hidden", "hidden");                
    }
}


function toggleDisable(element, value) {    
    if (value != "") {        
        document.getElementById(element).removeAttribute("disabled");        
    }else{                
        document.getElementById(element).setAttribute("disabled", "disabled");                
    }
}

function toggleNotDisable(element, value) {
    if (value == "") {                                
        element.setAttribute("disabled", "disabled");                
    }else{                
        element.removeAttribute("disabled");        
    }
}



function blockBtn(element, block){            
  if (block) {                    
      element.setAttribute("disabled", "disabled");
  }else{                            
      element.removeAttribute("disabled");
  }
}

function truncNumber (x, posiciones = 0) {
  let s = x.toString();
  let l = s.length;
  let decimalLength = s.indexOf('.') + 1
  if (l - decimalLength <= posiciones){
    return x;
  }
  // Parte decimal del número
  let isNeg  = x < 0;
  let decimal =  x % 1;
  let entera  = isNeg ? Math.ceil(x) : Math.floor(x);
  // Parte decimal como número entero
  // Ejemplo: parte decimal = 0.77
  // decimalFormated = 0.77 * (10^posiciones)
  // si posiciones es 2 ==> 0.77 * 100
  // si posiciones es 3 ==> 0.77 * 1000
  let decimalFormated = Math.floor(
    Math.abs(decimal) * Math.pow(10, posiciones)
  );
  // Sustraemos del número original la parte decimal
  // y le sumamos la parte decimal que hemos formateado
  let finalNum = entera + 
    ((decimalFormated / Math.pow(10, posiciones))*(isNeg ? -1 : 1));
  
  return finalNum;
}