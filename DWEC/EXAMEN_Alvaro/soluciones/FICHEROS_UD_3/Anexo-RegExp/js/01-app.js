/*------------------------------------------
-----------DECLARACIÓN Y SINTAXIS-----------
--------------------------------------------*/

//Declarar e instanciar RegExp
let exprNIF = /[KLXYZ0-9][0-9]{7}[A-Z]/;
//notación más formal
let exprNIF_2 = new RegExp('[KLXYZ0-9][0-9]{7}[A-Z]');

const expr1 = /javascript/g;
const expr2 = new RegExp('javascript','g');


/*------------------------------------------
----------------METODOS REGEXP---------------
--------------------------------------------*/
let string = "Estamos aprendiendo JavaScript, las RegExp en JavaScript";
let regExp1 = /JavaScript/g; 


console.log("---------search-----------");
console.log(string.search(regExp1));//20


console.log("---------replace-----------");
console.log(string.replace(regExp1,"JS"));


console.log("---------test-----------");
string = "Estamos aprendiendo JavaScript, las RegExp en JavaScript";
regExp1 = /javascript/i; 
console.log(regExp1.test(string)); 


console.log("---------exec-----------");
string = "Estamos aprendiendo JavaScript, las RegExp en JavaScript";
console.log(regExp1.exec(string)); 

const expresion = /(.+texto)(.+prueba)/;
const texto = "Este es un texto de prueba";

const text1 = 'Has sacado una nota alta, enhorabuena!'
const expReg = /nota (?=(baja|media|alta))/;
console.log(expresion.exec(texto));
console.log(expReg.exec(text1));



console.log("---------match-----------");
string = "Estamos aprendiendo JavaScript, las RegExp en JavaScript";
regExp1 = /a/g; 
console.log(string.match(regExp1));


console.log(text1.match(expReg));




