/**************************************
 *******OPERADORES RELACIONALES*******
*************************************/

//creación de variables numéricas
const a = 5, b = 2;


//AND: b lógico
console.log(a == 5 && b == 2); //true
console.log((a == 5) && (b == 8)); //false
//Operador lógico y relacional
const edad = 17;
const conducir = (edad >= 18 && carnet == true);
console.log (conducir); //false

//OR: o lógico
console.log(a == 5 || b == 2); //true
console.log((a == 5) || (b == 8)); //true
console.log((a == 8) || (b == 3)); //false

//NOT: no lógico
console.log(!(a == 5 && b == 2)); //false
console.log( a == 5 && !(b == 2)); //false
console.log((!(a == 3) && (b == 2))); //true


//Operador ternario (condicional)
//CONDICIÓN ? RESUL_TRUE : RESUL_FALSE
const edad2 = 16;
const puedeVotar = (edad2 < 18) ? "No puede votar" : "Puede votar";
console.log (puedeVotar); 
