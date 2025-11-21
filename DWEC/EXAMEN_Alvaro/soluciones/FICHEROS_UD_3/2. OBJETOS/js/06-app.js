
/*************OPERADOR instanceof*************/
/**********PROPIEDAD constructor.name*********/

console.log("--edad--");
const edad = 15;
console.log(typeof edad);//Number
console.log(edad instanceof Number);//false
console.log(edad instanceof Object);//false
console.log(edad.constructor.name);//Number

console.log("--anyo--");
const anyo = new Number();
console.log(typeof anyo);//Object
console.log(anyo instanceof Number);//true
console.log(anyo instanceof Object);//true
console.log(anyo.constructor.name);//Number

console.log("--título--");
const titulo = "Matrix";
console.log(typeof titulo);//String
console.log(titulo instanceof String);//false
console.log(titulo instanceof Object);//false
console.log(titulo.constructor.name);//String

console.log("--mensaje--");
const mensaje = new String();
console.log(typeof mensaje);//Object
console.log(mensaje instanceof String);//true
console.log(mensaje instanceof Object);//true
console.log(mensaje.constructor.name);//String

console.log("--afirm--");
const afirm = true;
console.log(typeof afirm);//Boolean
console.log(afirm instanceof Boolean);//false
console.log(afirm instanceof Object);//false
console.log(afirm.constructor.name);//Boolean

console.log("--negac--");
const negac = new Boolean();
console.log(typeof negac);//Object
console.log(negac instanceof Boolean);//true
console.log(negac instanceof Object);//true
console.log(negac.constructor.name);//Boolean

console.log("--Susana--");
const susana = new Persona();
console.log(typeof susana);//Object
console.log(susana instanceof Persona);//true
console.log(susana instanceof Object);//true
console.log(susana.constructor.name);//Persona

console.log("--Pablo--");
//const pablo = new alumno;
//console.log(pablo instanceof alumno);//error
//TypeError: alumno is not a constructor

console.log("--cosas--");
const cosas = new Array();
console.log(typeof cosas);//Object
console.log(cosas instanceof Array); //true
console.log(cosas instanceof Object);//true
console.log(cosas.constructor.name);//Array

console.log("--cosas2--");
const cosas2 = ["casa", "silla", "mesa"];
console.log(typeof cosas2);//Object
console.log(cosas2 instanceof Array);//true
console.log(cosas2 instanceof Object);//true
console.log(cosas2.constructor.name);//Array







