
function multi(event){
    event.preventDefault();
    
    let numMulti = parseFloat(document.getElementById("numMulti").value);

    if(numMulti === 0 || numMulti === 1 || numMulti === -1){
        document.getElementById("resultado1").innerHTML = "Ese valor no esta permitido";
        return;
    }

    let cont = 0;
    let valor = numMulti;

    while(valor < Infinity){
        let anterior = valor;
        valor = valor * numMulti;
        cont++;
        
        document.getElementById("resultado1").innerHTML = numMulti + " x " + anterior + " = " + valor 
        + "<br> Se ha multiplicado por si mismo " + cont + " veces";
    }
}