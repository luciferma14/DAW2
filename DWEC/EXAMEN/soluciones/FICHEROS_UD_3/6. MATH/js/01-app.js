/*------------------------------------------
------------------MATH---------------------
--------------------------------------------*/

//Declarar e instanciar MATH
const numAleat = Math.random();
console.log(numAleat);


/***********************************************
******************CONSTANTES*********************
************************************************/

//Calcular la circunferencia de un círculo --> 2*PI*radio
function Circulo(r){
    this.radio = r;
    
    this.calcCircunfer = function(){
        return 2*Math.PI*this.radio;
    }  

}
let miCirculo = new Circulo(10);
console.log(miCirculo.calcCircunfer());
//62.83185307179586


/***********************************************
******************MÉTODOS*********************
************************************************/

//random--> num aleatorio 
console.log(Math.random());
//entre 0 y 10 --> no llega al 10
console.log(Math.random()*10);
//entre 5 y 10-->Math.random()*(max-min+1)+min
//si no queremos que llegue al max quitamos +1
console.log(Math.random()*(10-5+1)+5);
//sin decimales
console.log(Math.round(Math.random()*11));

console.log("---- MAX,MIN ---- ROUND ----------");


const a = 5.2, b = 6.7, c = 8.5;

//max y min
console.log(Math.max(a,b,c));//8.5
console.log(Math.min(a,b,c));//5.2

//round --> redondea al entero más cercano
console.log(Math.round(a));//5
console.log(Math.round(b));//7
console.log(Math.round(c));//9

console.log("------ CEIL -- FLOOR --------------");

//ceil(redondea al alza) y floor(redondea a la baja)
console.log(Math.floor(a));//5
console.log(Math.ceil(a));//6
console.log(Math.floor(b));//6
console.log(Math.ceil(b));//7
console.log(Math.floor(c));//8
console.log(Math.ceil(c));//9

console.log("------ TRUNC --------------");

//trunc --> trunca
console.log(Math.trunc(a));//5
console.log(Math.trunc(b));//6
console.log(Math.trunc(c));//8

console.log("-------- POW --------------");
//pow --> potencia
console.log(Math.pow(a,2));//27.04

console.log("-------- SQRT y CBRT ----------");
//sqrt --> raíz cuadrada
//cbrt --> raíz cúbica
console.log(Math.sqrt(121));//11
console.log(Math.cbrt(27));//3

console.log("-------- ABS --------------");
//abs --> valor absoluto
console.log(Math.abs(-25));//25

console.log("-------- SIGN --------------");
//sign --> indica el signo del num (-1, 0 ó 1)
console.log(Math.sign(a));//1
console.log(Math.sign(0));//0
console.log(Math.sign(-0));//-0
console.log(Math.sign(-25));//-1
console.log(Math.sign(NaN));//NaN
