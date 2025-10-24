
function iguales(){

    do{
        let cadena1 = prompt("Primera cadena:");
        let cadena2 = prompt("Segunda cadena:");

        if(cadena1.trim() === cadena2.trim()){
            alert("Los textos " + "'" + cadena1 +  "'" + " y " + "'" + cadena2 + "'" + " son iguales");

        }else{
            alert("Los textos " + "'" + cadena1 +  "'" + " y " + "'" + cadena2 + "'" + " no son iguales");
        }

    }while(confirm("Quieres comparar más cadenas??"));
}