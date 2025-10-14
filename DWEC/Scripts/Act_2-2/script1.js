


function iguales(event){
    do {
        event.preventDefault();
        let cadena1 = document.getElementById("cadena1").value;
        let cadena2 = document.getElementById("cadena2").value;
        let seguir = false;

        if(cadena1.trim() === cadena2.trim()){
            document.getElementById("resultado").textContent = "Los textos " + "'" + cadena1 +  "'" + " y " + "'" + cadena2 + "'" + " son iguales";

        }else{
            document.getElementById("resultado").textContent = "Los textos " + "'" + cadena1 +  "'" + " y " + "'" + cadena2 + "'" + " no son iguales";
        }
    } while(!seguir)
}