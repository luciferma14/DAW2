/**************************************
 *******OPERADORES RELACIONALES*******
*************************************/

console.log("\n******OPERADORES RELACIONALES******");
console.log("Analizamos 5 mayor que 1: " + (5 > 1) );
console.log("Analizamos '15' menor que 7: " + ('15' < 7) );
console.log('Analizamos "33.33" mayor o igual a 50: ' + ("33.33" >= 50) );
console.log('Analizamos x menor o igual a z: ' + (x <= z) );
console.log('Analizamos x igual a y: ' + (x == y) );
console.log("Comparamos cadena con booleano: " + (true == "true")); 
console.log("Comparamos número (1 o 0) con booleano: " + (true == 1)); //true
console.log("Comparamos cadena (1 o 0) con booleano: " + ("0" == false)); //true
console.log("Comparamos undefined y null: " + (undefined == null)); //true
console.log("Analizamos x distinto de y: " + (x != y));

//Operadores de comparación con strings
console.log("perro" == "perra"); // false
console.log("true" == true);//false
console.log("perro" > "perra"); // true
console.log("Perro" > "perra"); // false 


//Comparaciones estrictas
console.log(`Comparación estricta de una cadena y un número: ${"8" === 8}`); //false
console.log(`Comparación estricta de dos valores numéricos: ${7+1 === 8}`); //true
console.log("Comparación estricta undefined y null: " + (undefined === null)); //false
console.log(`Verificamos la desigualdad estricta entre una cadena y un número: ${"8" !== 8}`); //true)