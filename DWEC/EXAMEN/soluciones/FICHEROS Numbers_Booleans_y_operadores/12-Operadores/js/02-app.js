
/**************************************
 *******OPERADORES DE ASIGNACIÓN********
*************************************/
console.log("\n*****OPERADORES DE ASIGNACIÓN******");
//POST incremento --> incremento después de operar
console.log (x); // 5
console.log (x++*2); //10
console.log(x);//6
x = x++ * 2;
console.log ("POST increm --> x vale: " + x);//12

//Podemos usar el operador DELANTE de la variable
//Pre INCREMENTO
console.log(w); //5
console.log(++w); //6
console.log("Pre Incremento --> w vale: " + w);//6

// Post DECREMENTO
console.log(x); //12
console.log(x--); //12
console.log("Post Decremento --> x vale: " + x);//11

// Pre DECREMENTO
console.log(x); 
console.log(--x); 
console.log("Pre Decremento --> x vale: " + x);


console.log("\n******OPERADORES ARITMÉTICOS Y DE ASIGNACIÓN******")
//+=
let z = 20;
console.log (z+=5); // z vale 25. Es equivalente a z = z+5;
//-=
console.log (z-=5); // z vale 20. Es equivalente a z = z-5;
//*=
console.log (z*=2); // z vale 40. Es equivalente a z = z*2;
///=
console.log (z/=2); // z vale 20. Es equivalente a z = z/2;
//%=
console.log (z%=3); // z vale 2. Es equivalente a z = z%3;
//**=
console.log (z**=5); // z vale 32. Es equivalente a z = z**5;


