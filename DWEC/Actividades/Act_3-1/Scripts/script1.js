function numIntervalo(){

    let mini = parseInt(prompt("Dime el valor mínimo"));
    let maxi = parseInt(prompt("Dime el valor máximo"));

    if (isNaN(mini) || isNaN(maxi) || (mini > maxi) || (maxi < mini)){
        alert("Valores erróneos");
    }

    let intervalo = {

        minimo: mini,
        maximo: maxi,

        get relleno() {

            let relle = [];
            for (let i = this.minimo; i <= this.maximo; i++){
                relle.push(i);
            }

            return relle;
        },

        set alea(num){
            this.minimo = Math.min(...num);
            this.maximo = Math.max(...num);
        }

    }

    let nuevos = [];
    for (let i = 0; i < 5; i++) {
        nuevos.push(Math.floor(Math.random() * 100) + 1);
    }

    console.log("Según su intervalo:");
    console.log("Array: ", intervalo.relleno);
    console.log("Mínimo: ", intervalo.minimo);
    console.log("Máximo: ", intervalo.maximo);

    console.log("Con números aleatorios:");
    console.log("Array: " , intervalo.alea = nuevos);
    console.log("Mínimo: ", intervalo.minimo);
    console.log("Máximo: ", intervalo.maximo);
}