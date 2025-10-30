function palabras(){

    
    let palabras = [];
    let palabra;
    palabra = prompt("Dime palabras aleatorias");

    while (palabra !== null && palabra.trim() !== "") {

        palabras.push(palabra);

        for (let i = 0; i <= palabras.length; i++){
            let palab = palabras[i];

        }

        alert(palabras);
    }

    
}