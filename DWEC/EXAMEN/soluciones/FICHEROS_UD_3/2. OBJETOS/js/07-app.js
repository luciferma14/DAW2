/*------------------------------------
------RECORRER UN OBJETO--------------
------------------------------------*/
console.log("----Recorrer Objeto: For..In-----");
function recorreProp(objeto){
    for (let propiedad in objeto){
        console.log(`${propiedad}: ${objeto[propiedad]}`);
    }
}
recorreProp(trabajador);

//ES7: Iterador propio de objetos
console.log("----Recorrer Objeto: For..Of-----");
for (let [prop, valor] of Object.entries(alumno1)){
    console.log(`${prop} --> ${valor}`);
}

