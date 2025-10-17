
function iguales(event){
    
    event.preventDefault();
    let cadena1 = document.getElementById("cadena1").value;
    let cadena2 = document.getElementById("cadena2").value;

    if(cadena1.trim() === cadena2.trim()){
        return document.getElementById("resultado1").textContent = "Los textos " + "'" + cadena1 +  "'" + " y " + "'" + cadena2 + "'" + " son iguales";

    }else{
        return document.getElementById("resultado1").textContent = "Los textos " + "'" + cadena1 +  "'" + " y " + "'" + cadena2 + "'" + " no son iguales";
    }

}