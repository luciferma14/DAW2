let cont = 0;
const numero = document.getElementById("numero");
const sumar = document.getElementById("sumar");
const restar = document.getElementById("restar");
const reset = document.getElementById("reset");

function actualizarCont(){
    numero.innerText = cont;
}

sumar.addEventListener("click", function(){
    cont++
    actualizarCont();
});

restar.addEventListener("click", function(){
    if(cont > 0){
        cont--
        actualizarCont();
    }
});

reset.addEventListener("click", function(){
    cont = 0;   
    actualizarCont();
});