/***************************************
 ******DECLARACIÓN DE Numbers***********
 ***************************************/

//Directamente poniendo el valor
const num1 = 30;
const num2 = 30.56;
const num3 = .125;
const num4 = -20.5;
console.log(num1, num2, num3, num4);

//Notación científica para num grandes
const grosorPeloHumano = 2e-4;
let fortuna = 7.5e+8;
console.log ("El grosor medio de un cabello humano equivale a " + grosorPeloHumano + "mm");
console.log ("La fortuna del acusado asciende a " + fortuna + "€");

//Constructor predeterminado (Number)
const num5 = Number(-36.95);
console.log(num5);

//Constructor de objetos
const num6 = new Number(100);
console.log(num6);


/***************************************
 ******Números Infinity y NaN***********
 ***************************************/
console.log("***********Infinity / -Infinity**************")
const num7 = Infinity;
const num8 = 2;
const num9 = -5;

console.log(`Cualquier número más infinito es: ${num7 + 256.36}`); 
console.log("Cualquier número positivo dividido entre 0 es: " + (num8/0)); //Infinity
console.log("Cualquier número negativo dividido entre 0 es: " + (num9/0)); //-Infinity

console.log("***********NaN**************")
console.log(`Una cadena no numérica operando con números es: ${"Hola"/5}`);
console.log(`Infinity - Infinity es: ${Infinity - Infinity}`);
console.log(`0/0 es: ${0/0}`);
