
function multi(event){
    event.preventDefault();
    
    let numMulti = document.getElementById("numMulti").value;
    let doble;
    let cont;

    for (let i = 1; i = Infinity; i++){
        doble = pow(numMulti, i);
        cont++;
        document.getElementById("resultado1").textContent = numMulti + " x " + doble + " es: " + doble;
    }

    document.getElementById("resultado1").textContent = "El número de operaciones necesarias ha/n sido " +  cont;
}