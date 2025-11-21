/*------------------------------------------
-----------DECLARACIÓN Y SINTAXIS-----------
--------------------------------------------*/

//Declarar e instanciar SETS
//const miSet = new Set(2,4,6,8);
//console.log(miSet);//da error

//inicializar a partir de un array
const miSet2 = new Set ([2,4,6,8,2,4,6]);
console.log(miSet2);
console.log(typeof miSet2);//object
console.log(miSet2 instanceof Set);//true

//inicializar a partir de un array II
let muebles = ["silla", "mesa", "sillón"];
let muebles2 = new Set(muebles);
console.log (muebles2);

//inicializar a partir de un array III
let datos = [6,2,3.5,2,2,2,9];
console.log(datos);
console.log(datos instanceof Array);//true
let datos2 = new Set(datos);
console.log(datos2);
console.log(typeof datos2);//object
console.log(datos instanceof Set);//false --> lo considera Array

//incializar el conjunto con un texto
let letras = new Set("dfjasdfjasdfasdf", "FFFFF");
console.log(letras);


/*------------------------------------------
------------------MÉTODOS-------------------
--------------------------------------------*/

//------ADD---------
let lista = new Set();
lista.add(8);
lista.add(3.5);
lista.add(3.5);
lista.add(5);
lista.add(8).add(1).add(5);
console.log(lista);
console.log(typeof lista);//object
console.log(lista instanceof Set);//true

let prueba = new Set();
prueba.add(Math.random());
prueba.add(8);
prueba.add(Math.random());
prueba.add("natalia");
console.log(prueba);

letras.add("Natalia");
console.log(letras); //añade el string entero, no lo itera.

//Añadimos objetos a un set
const artic1 = {
    prenda: 'Camisa',
    pvp: '60€'
}

const artic2 = {
    prenda: 'Corbata',
    pvp: '25€'
}

console.log("---------------")
const carritoSet = new Set();
carritoSet.add(artic1).add(artic2);
console.log(carritoSet);


//------HAS---------
console.log("------has-------")
console.log(letras.has('Natalia'))//true

let notas = new Set([8.25,9,1.75,6.45,10,9.35,5,9]);
console.log(notas);
console.log(`Se encuenta en notas la nota "8.25"?? ${notas.has(8.25)}`);
console.log(`Se encuenta en notas la nota "4"?? ${notas.has(4)}`);

//------DELETE---------
//Eliminar elementos
console.log("--------delete---------")
console.log(lista);
if (lista.delete(8)){
    console.log(`Se ha eliminado el elemento "8" con éxito`);
}
console.log(lista);


//------CLEAR---------
//Eliminar TODOS los elementos del conjunto
console.log(lista);
console.log("Vamos a eliminar el contenido de 'lista'...");
lista.clear();
console.log(lista);


//***************PROPIEDAD size**************//
let pares = new Set();
pares.add(8).add(2).add(4);
console.log(pares);
console.log(pares.size);

/***************Operador sPREAD**************/
console.log("----------------")
let num = new Set([5,8,6,6,6,3,36,22,5,,2,]);
console.log(num);
let numArray = [...num];
console.log(numArray);
console.log(numArray instanceof Array);


/***********************************************
***********RECORRER SETS**********************
************************************************/
console.log("-------for of---------")
for (let i of num){
    console.log(i);
}


console.log("-------forEach---------")
num.forEach(i => console.log(i));

carritoSet.forEach(i => console.log(i));






