
let sueldoActual;
let edad;
let hijos;
let sueldoNuevo;

function procesar(event){
    event.preventDefault();  // Para que el script no recarge la página

    sueldoActual = document.getElementById("sActual").value;
    edad = document.getElementById("edUsu").value;
    hijos = document.getElementById("hijosUsu").value;


    if (sueldoActual < 1000 && edad < 30 && hijos > 0){
        
        sueldoNuevo = 1200;

        document.getElementById("resultado").textContent = "Tu sueldo nuevo es: " + sueldoNuevo;
    }

    if (sueldoActual < 1000 && edad < 30 && hijos == 0){

        sueldoNuevo = (+sueldoActual * 0.05) + +sueldoActual;

        document.getElementById("resultado").textContent = "Tu sueldo nuevo es: " + sueldoNuevo;
    }

    if ((edad >= 30 && edad <= 45) && sueldoActual < 1250 && hijos == 2){

        sueldoNuevo = (+sueldoActual * 0.10) + +sueldoActual;
        
        document.getElementById("resultado").textContent = "Tu sueldo nuevo es: " + sueldoNuevo;
    }

    if ((edad >= 30 && edad <= 45) && sueldoActual < 1250 && hijos >= 3){

        sueldoNuevo = (+sueldoActual * 0.15) + +sueldoActual;
        
        document.getElementById("resultado").textContent = "Tu sueldo nuevo es: " + sueldoNuevo;
    }

    if (edad > 45 && sueldoActual < 2000){

        sueldoNuevo = (+sueldoActual * 0.15) + +sueldoActual;
        
        document.getElementById("resultado").textContent = "Tu sueldo nuevo es: " + sueldoNuevo;
    }
}


