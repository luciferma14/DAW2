"use strict";
/***************************************
 *****SCOPE O AMBITO DE LAS VARIABLES*******
 ***************************************/
console.log("-----SCOPE------");
//x, w e y son globales
var x = 3;
let y = 5;
var w = 9;

var nombre = "Javier Polit";

function ambVar(){
    var x = 15; //local
    let z = 55; //local
    var w = 25;
    console.log ("x vale: " + x + ". El ámbito es local."); // 15, valor local 
    console.log ("y vale: " + y + ". El ámbino es global."); // 5, valor global
    console.log (z); // 55, local 
    console.log ("nombre vale: " + nombre + ". Vista desde el ámbito local"); 
    console.log ("w vale: " + w + ". El ámbino ahora es local"); //25, valor local
}

console.log ("w vale: " + w + ". Antes de llamar a la función, el ámbino es global."); 
// 9, global

ambVar();

/*Estas ejecuciones mostrarán las globales,
no tienen acceso a las variables locales*/
console.log (nombre);
console.log(x); //3
console.log (y);//5
console.log ("w vale: " + w); //vale 9, valor variable global
//console.log (z); //da error, pq es local
