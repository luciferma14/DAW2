function setFunction(){
    
    let conj;

    do{
        conj = prompt("Quieres trabajar con letras ('L') o con números ('N')");

        switch(conj.toUpperCase()){
            case "L": 
                    const letras = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
                    const set1 = new Set();
                    const set2 = new Set();
            
                    for (let i = 0; i <= 10; i++){
                        const posRandom = Math.floor(Math.random() * letras.length);
                        let letra = letras[posRandom];
                        set1.add(letra);
                    }
                    for (let i = 0; i <= 10; i++){
                        const posRandom = Math.floor(Math.random() * letras.length);
                        let letra = letras[posRandom];
                        set2.add(letra);
                    }
                    console.log(set1);
                    console.log(set2);

                    const unionLetras = new Set([...set1, ...set2]);

                    console.log("La unión de los conjuntos es:")
                    console.log(unionLetras);

                    const interseccionLetras = new Set();

                    for (const elemento of set1){
                        if (set2.has(elemento)){
                            interseccionLetras.add(elemento);
                        }
                    }

                    console.log("Los elementos comunes de los conjuntos son:");
                    console.log(interseccionLetras);

                    const diferenciaLetras = new Set();

                    for (const elemento of set1){
                        if (!set2.has(elemento)){
                            diferenciaLetras.add(elemento);
                        }
                    }

                    console.log("Los elementos del primero que no están en el segundos son:");
                    console.log(diferenciaLetras);

                break;
            case "N":
                    const set3 = new Set();
                    const set4 = new Set();

                    while (set3.size < 10) {
                        const num = Math.floor(Math.random() * 21); // del 0 al 20
                        set3.add(num);
                    }

                    while (set4.size < 10) {
                        const num = Math.floor(Math.random() * 21);
                        set4.add(num);
                    }
                    console.log(set3);
                    console.log(set4);

                    const unionNum = new Set([...set3, ...set4]);

                    console.log("La unión de los conjuntos es:")
                    console.log(unionNum);

                    const interseccionNum = new Set();

                    for (const elemento of set3){
                        if (set4.has(elemento)){
                            interseccionNum.add(elemento);
                        }
                    }

                    console.log("Los elementos comunes de los conjuntos son:");
                    console.log(interseccionNum);

                    const diferenciaNum = new Set();

                    for (const elemento of set3){
                        if (!set4.has(elemento)){
                            diferenciaNum.add(elemento);
                        }
                    }

                    console.log("Los elementos del primero que no están en el segundos son:");
                    console.log(diferenciaNum);
                break;
            
            default: alert("El programa no hará nada");
        }
    }while(conj.toUpperCase() !== "L" && conj.toUpperCase() !== "N");
}