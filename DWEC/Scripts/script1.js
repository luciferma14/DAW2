
let sueldoActual;
let edad;
let hijos;
let sueldoNuevo;

function procesar(event){
    event.preventDefault();  // Para que el script no recarge la página

    sueldoActual = document.getElementById("sActual").value;
    edad = document.getElementById("edUsu").value;
    hijos = document.getElementById("hijosUsu").value;


    if(sueldoActual > 0 &&  edad < 30 && hijos == "si"){
        
        sueldoNuevo = 1200;

        document.getElementById("resultado").textContent = "Tu sueldo nuevo es: " + sueldoNuevo;
    
    }

    document.getElementById("resultado").textContent = "Tu sueldo nuevo es: " + sueldoActual;


    // switch(sueldoActual){
    //     case edad < 30 && hijos == true: sueldoNuevo == 1200;

    //     document.getElementById("resultado").textContent = "Tu sueldo actual es: " + sueldoNuevo;
    
    // }

}


