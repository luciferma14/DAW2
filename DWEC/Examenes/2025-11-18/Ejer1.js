// Creamos las variables
let nombre = prompt("Introduce el nombre del personaje:");
let nivel = parseInt(prompt("Indique el nivel:"));
let clasePersonaje = prompt("Indique de que clase es (Mago/Guerrero):");
let validoMago = false;
let validoGuerrero = false;

// Creamos la funcion comprobarRequisitos();
function comprobarRequisitos(){

// Comprobamos si el nombre está vacio o nulo
    function noEstaVacio(nombre) {
        return nombre !== "" && nombre !== null && nombre !== undefined;
    }

// Comprobamos si el nivel es un número entero
    function esEntero(nivel) {
        return Number.isInteger(Number(nivel));
    }
    
// Validamos si la clase de los personajes son las correctas
    function validaClase(clasePersonaje){
        if(clasePersonaje === "Mago"){
            return validoMago = true;
            
        }else if(clasePersonaje === "Guerrero"){
            return validoGuerrero = true;
        }else{
            alert("Esa clase de personaje no existe");
            return;
        }
    }

// Validamos si el nivel correspondiente de las clases son los correctos
    function validarNivel(validoMago, validoGuerrero, nivel){
        if(validoMago = true && nivel > 35){
            alert("Acceso concedido");
            return;
        }else if(validoGuerrero = true && nivel > 40){
            alert("Acceso concedido");
            return;
        }else{
            alert("Acceso denegado, el nivel es demasiado bajo");
            return;
        }
    }

// Llamamos a las funciones con los parametros que necesitan
    noEstaVacio(nombre);
    esEntero(nivel);
    validaClase(clasePersonaje);
    validarNivel(validoMago,validoGuerrero,nivel);
}

// Llamamos a la función principal
comprobarRequisitos();