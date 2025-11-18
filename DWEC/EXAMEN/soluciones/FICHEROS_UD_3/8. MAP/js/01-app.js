/*------------------------------------------
-----------DECLARACIÓN Y SINTAXIS-----------
--------------------------------------------*/
//Declarar e instanciar SETS
let andalucia = new Map();
andalucia.set(4,"Almería");
andalucia.set(11,"Cádiz");
andalucia.set(14,"Córdoba");
andalucia.set(29,"Málaga");
andalucia.set(41,"Sevilla");
andalucia.set(18,"Granada");
andalucia.set(21,"Huelva").set(18,"Jaén");

console.log(andalucia);
console.log(typeof andalucia);//object
console.log(andalucia instanceof Map);//true

//sobreescribir valores
const cartaPapaNoel = new Map();
cartaPapaNoel.set('ropa', 'vestido').set('calzado', 'botas').set('coche','Tesla');
console.log(cartaPapaNoel);
cartaPapaNoel.set('coche','BMW');
console.log(cartaPapaNoel);

/*------------------------------------------
------------------MAPAS---------------------
--------------------------------------------*/


//Arrays para crear mapas
const notas = new Map([["baja",3.5],["media",7.5],["alta",9]]);
notas.set(["raspados",5]);//undefined
notas.set("raspado",5);
console.log(notas);

//(size) para saber cuantos elementos hay
console.log(notas.size);//5

//get()--> obtener elementos
console.log(notas.get("baja"));
console.log(andalucia.get(18));

//delete() --> borrar elementos
console.log("------------borrar------------")
let comunVal = new Map();
comunVal.set(1,"Castellón").set(2,"Valencia").set(3,"Alicante");
comunVal.set(4,"Murcia");
console.log(comunVal);
comunVal.delete(4);
console.log(comunVal);
comunVal.set(4,undefined);
console.log(comunVal);
comunVal.delete(4);
console.log(comunVal);

//clear --> vacia el map
comunVal.clear();
console.log(comunVal.size);//0

//has()--> buscar elementos
console.log(notas.has("alta"));//true
console.log(notas.has("notable"));//false

//keys() --> nos da las claves
//values() --> nos da los valores
let calificaciones = new Map();
calificaciones.set(0,"Suspenso").set(1,"Suspenso").set(2,"Suspenso").set(3,"Suspenso").set(4,"Suspenso")
calificaciones.set(5,"Suficiente").set(6,"Bien");
calificaciones.set(7,"Notable").set(8,"Notable");
calificaciones.set(9,"Sobresaliente").set(10,"Sobresaliente");
let claves = calificaciones.keys();
console.log(claves);
let valores = calificaciones.values();
console.log(valores);
for (let i of claves){
    console.log(i);
}
for (let i of valores){
    console.log(i)
}


//Spread: convertir mapas en arrays

let calificacionesArray = [...calificaciones];
console.log(calificacionesArray);
console.log(calificacionesArray.length);
console.log(typeof calificacionesArray);//object
console.log(calificacionesArray instanceof Array);//true


/***********************************************
***********RECORRER MAPAS**********************
************************************************/
for (let i of notas){
    console.log(i);
}


//Desestructuramos el array
for (let [clave,valor] of calificaciones){
    console.log(`Clave: ${clave} <--> Valor ${valor}`);
}


