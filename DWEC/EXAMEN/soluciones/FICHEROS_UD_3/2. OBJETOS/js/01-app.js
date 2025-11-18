/*-------------------------------------------------
---------------DECLARACIÓN DE OBJETOS---------------
--------------------------------------------------*/

/*1.--------- OBJECT LITERAL -----------*/
console.log("******Object Literal********* ");
const trabajador = {
    //propiedades objeto trabajador
    nombre: "Natalia", 
    apellidos:"Escrivá Núñez", 
    departamento: "informática",
    antigAnyos : 6,
    tutoria : true,
};
console.log(trabajador);


//Podemos hacer lo mismo por separado...
const alumno = {};
alumno.nombre = "Natalia";
alumno.modulos = ["DWEC","DWES","DIW","DAW"];
console.log(alumno);



/*2.-------- CONSTRUCTORES INTEGRADOS: new -------*/
let nom = new String(); //No usar
let miNombre = "Natalia Escrivá"; //Sí usar

let num = new Number(); //No usar
let numero = 3.1416; //Sí usar

let bool = new Boolean(); //No usar
let booleano = true; //Sí usar

let masc = new Array(); //No usar
let mascotas = []; // Sí usar

let exp = new RegExp(); //No usar
let expReg = /<expresion regular>/;//Sí usar

let func = new Function(); //No usar
let suma = function(){}; //Sí usar

let fecha = new Date(); //SI usar

console.log("-----cONSTRUCTOR INTEGRADO------")

const trabajador1 = new Object();
//propiedades objeto trabajador1
trabajador1.nombre = "Natalia";
trabajador1.apellido = "Escrivá";
trabajador1.antiguedadAnos = 3;
console.log(trabajador1);



/*3.---------OBJECT CONSTRUCTOR----------------*/
console.log("-------OBJECT CONSTRUCTOR---------");
//FUNCTION --> THIS
function Persona (nom, ape, anyos, prof){
    this.nombre = nom;
    this.apellido = ape;
    this.edad = anyos;
    this.profesion = prof;
}
//vamos a crear o instanciar un objeto tipo persona
const ana = new Persona ("Ana","López",45,"cirujana");
const pedro = new Persona ("Pedro","Ximénez",36,"vinicultor");

console.log(ana);

