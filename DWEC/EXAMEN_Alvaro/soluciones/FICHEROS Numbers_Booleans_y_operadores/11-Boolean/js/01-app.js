/**************************************
 *******DECLARACIÓN DE BOOLEANOS*******
 ***************************************/
const bool1 = true;
const bool2 = false;
const bool3 = "true";
console.log(`La variable bool1 es de tipo ${typeof(bool1)}`);
console.log(`La variable bool2 es de tipo ${typeof(bool2)}`);
console.log(`La variable bool3 es de tipo ${typeof(bool3)}`);

//declaración con constructor
const bool4  = new Boolean(false);
console.log(`La variable bool4 es de tipo ${typeof(bool4)}`);


/**************************************
 **********FUNCION BOOLEAN************
 ***************************************/
//asignaciones de booleanos
const x = 3, y = 8, w = true, z = (x > y);
//Uso de la función Boolean
console.log (Boolean(z));//false
console.log (Boolean(w));//true
console.log (Boolean(1));//true
console.log (Boolean(0));//false
console.log (Boolean("cadena"));//true
console.log (Boolean(""));//false
console.log (Boolean(NaN));//false
console.log (Boolean(undefined));//false
console.log (Boolean(Infinity));//true
console.log (Boolean(null));//false

