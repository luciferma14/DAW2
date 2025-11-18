
/***************************************
 ******PROPIEDADES Y MÉTODOS ***********
 ***************************************/


//***************PROPIEDADES**************//

//MAX_VALUE - MIN_VALUE 
//POSITIVE_INFINITY - NEGATIVE_INFINITY 
//NaN 
console.log("PROPIEDADES NUMBER");

console.log(`El máximo nº representable en JS es: ${Number.MAX_VALUE}`);
console.log(`El mínimo nº representable en JS es: ${Number.MIN_VALUE}`);
console.log(`Para representar infinitos positivos en JS es: ${Number.POSITIVE_INFINITY}`);
console.log(`Para representar infinitos negativos en JS es: ${Number.NEGATIVE_INFINITY}`);
console.log(`Para representar los Not a Number en JS es: ${Number.NaN}`);



//*****************METODOS****************//
console.log("METODOS GENÉRICOS")
const edad = 18;
const edad2 = "18";
console.log(`La primera constante es de tipo: ${typeof(edad)} y la segunda es: ${typeof(edad2)}`);
//valueOf() --> nos da el valor primitivo de un objeto.
const n1 = 123;
const n2 = new Number(456);
console.log(n1.valueOf());
console.log(n2.valueOf());


console.log("METODOS NUMBER");
console.log("***Number***");
//Number --> nos da el valor numérico de una variable
console.log(Number(true)); 
console.log(Number(false)); 
console.log(Number("25")); 
console.log(Number("Natalia")); 

const cad1 = "175.36";
const cad11 = Number (cad1);
console.log(`La variable cad1 es de tipo: ${typeof(cad1)} y cad11 es: ${typeof(cad11)}`);
console.log (cad1, cad11);

const cad2 = "1255HOLA";
const cad3 = Number(cad2);
console.log(typeof(cad2));
console.log(typeof(cad3)); 
console.log(cad3);

console.log("***parseInt***");
//parseInt --> convierte cadena a nº entero. Permite cambios de base a binario
const cad4 = "12HOLA";
const n3 = parseInt(cad4);//NOS PERMITE CAMBIAR DE TIPO UNA CADENA a NUMBER 
console.log(n3);
console.log(typeof(n3));
console.log(parseInt("20.5")); 
console.log(parseInt("20 5")); 
console.log(parseInt("20hola")); 
console.log(parseInt(" hola 5")); 

console.log("***parseFloat***");
//parseFloat --> convierte cadena a nº real. 
const cad7 = "12.25hola";
const n4 = parseFloat(cad7);//NOS PERMITE CAMBIAR DE TIPO UNA CADENA a NUMBER 
console.log(n4);
console.log(typeof(n4));
console.log(parseFloat("20.5"));
console.log(parseFloat("20.25 5.78")); 
console.log(parseFloat("20.36hola")); 
console.log(parseFloat(" hola.24 5.1")); 

const cad8 = "2223.256";
let n5 = parseFloat(cad8);
console.log(n5, typeof(n5));
    n5 = parseFloat(cad8).toFixed(2); // = n5.toFixed(2)
console.log(n5, typeof(n5));

console.log("***toFixed***");
const numero = 65.9653;

//toFixed() --> Fija los decimales según el parámetro. REDONDEA!
console.log(`El número ${numero}...
Sin decimales es: ${numero.toFixed(0)}
Con dos decimales es: ${numero.toFixed(2)}
Con siete decimales es: ${numero.toFixed(7)}`);
console.log(`El número ${numero} es de tipo ${typeof(numero)}`);
//OJO!! si se asigna un valor con tofixed(), DEVUELVE UN STRING!!! 
const numero2 = numero.toFixed(3);
console.log(`El número ${numero2} ahora es de tipo ${typeof(numero2)}`);//string

console.log("***toPrecision***");
//toPrecision() --> nos da una CADENA con el nº según las cifras del parámetro. REDONDEA!
console.log(`El número ${numero}...
Con 2 dígitos: ${numero.toPrecision(2)}
Con 4 dígitos es: ${numero.toPrecision(4)}
Con 7 dígitos es: ${numero.toPrecision(7)}`);
console.log(`El número ${numero} es de tipo ${typeof(numero)}`);

const numero3 = numero.toPrecision(3);
console.log(`El número ${numero3} ahora es de tipo ${typeof(numero3)}`);//string

console.log("***toExponential***");
//toExponential() --> nos da una CADENA con el nº redondeado a
//notación científica
const numeroX = 987654321;
console.log(`El número ${numeroX} equivale a ${numeroX.toExponential()}`);
console.log(`El número ${numeroX} equivale a ${numeroX.toExponential(3)}`);
console.log(`El número ${numeroX} es de tipo ${typeof(numeroX)}`);

const numeroY = numeroX.toExponential(5);
console.log(`El número ${numeroY} ahora es de tipo ${typeof(numeroY)}`);//string


console.log("***isInteger***");

//isInteger() --> true si numero entero
const number1 = "15";
const number2 = 1500;
const number3 = -33;
const number4 = 33.5;
console.log(`"${number1}" es un entero??: ${Number.isInteger(number1)}`);
console.log(`${number2} es un entero??: ${Number.isInteger(number2)}`);
console.log(`${number3} es un entero??: ${Number.isInteger(number3)}`);
console.log(`${number4} es un entero??: ${Number.isInteger(number4)}`);

console.log("***isNaN***");
//Number.isNaN()--> comprueba si CONTIENE NaN
let cad9 = "NaN";
console.log(`La cadena "NaN" contiene NaN?? ${Number.isNaN("NaN")}`);//false
console.log(`La cadena "NaN" no es un número?? ${isNaN("NaN")}`);//true
cad9 = Number(cad9);
console.log(`Pasamos "NaN" a Number. Contiene NaN?? ${Number.isNaN(cad9)}`);//true
console.log(`La cadena "NaN" no es un número?? ${isNaN(cad9)}`);//true
console.log("********")
console.log(`${"12hola12"} no es nº: ${isNaN("12hola12")}`);//true
console.log(`${"12hola12"} contiene NaN ${Number.isNaN("12hola12")}`);//false
console.log(`${"12hola12"} contiene NaN: ${Number.isNaN(Number("12hola12"))}`);//true
console.log(`${"12hola12"} no es nº: ${isNaN(parseInt("12hola12"))}`);//false
console.log(`${"12hola12"} contiene NaN: ${Number.isNaN(parseInt("12hola12"))}`);//false
console.log("********")
console.log(`undefined no es un número?? ${Number.isNaN(undefined)}`);//false
console.log(`undefined no es un número?? ${isNaN(undefined)}`);//true
console.log("********")
console.log(`La cadena "natalia" no es un número?? ${Number.isNaN("natalia")}`);//false 
console.log(`La cadena "natalia" no es un número?? ${isNaN("natalia")}`);//true
console.log("********")
console.log(`El objeto vacío no es un número?? ${Number.isNaN()}`);//false
console.log(`El objeto vacío no es un número?? ${isNaN()}`);//true
console.log("********")
console.log(`15 no es un número?? ${Number.isNaN(15)}`);//false
console.log(`15 no es un número?? ${isNaN(15)}`);//false

console.log("***AMPLIACIÓN!!***");

//Number.isSafeInteger() --> True o false si el nº está dentro de los 53 bits que 
//garantizan que no se pierde precisiónç
console.log(`¿Es seguro el entero 999999: ${Number.isSafeInteger(999999)}`);
console.log(`¿Es seguro el entero -999999:: ${Number.isSafeInteger(-999999)}`);
console.log(`El mayor entero seguro es:  ${Number.MAX_SAFE_INTEGER}`);
console.log(`El menor entero seguro es:  ${Number.MIN_SAFE_INTEGER}`);

//isFinite() --> True o false si el nº es finito
console.log(`¿Es finito 999999: ${Number.isFinite(999999)}`);//true



