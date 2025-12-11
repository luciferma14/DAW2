
/***************************************
 ******CAMBIOS DE BASE ENTRE NºS *******
 ***************************************/

console.log("********* Números en distintas bases *************");
//Representación de distintas bases y Cambios de base

const base8 = 0o136; //Prefijo 0o
const base2 = 0b1001; //Prefijo 0b
const base16 = 0xABC; //Prefijo 0x
console.log (`El número expresado en octal es: ${base8}`);
console.log (`El número expresado en binario es: ${base2}`);
console.log (`El número expresado en hexadecimal es: ${base16}`);

console.log("********* Cambio de base: de decimal a otras bases *************");
const base10 = 136.5;
console.log (`El número ${base10} corresponde al número decimal: ${base10.toString()}`);
console.log (`El número ${base10} corresponde al número binario: ${base10.toString(2)}`);
console.log (`El número ${base10} corresponde al número en base 9: ${base10.toString(9)}`);
console.log (`El número ${base10} corresponde al número octal: ${base10.toString(8)}`);
console.log (`El número ${base10} corresponde al número hexadecimal: ${base10.toString(16)}`);
//console.log (`El número ${base10} corresponde al número binario: ${base10.toString(40)}`); DA ERROR!!

console.log("********* Cambio de base: de otras bases a decimal *************");
console.log(`El número "BC8" en hexadecimal es:      ${parseInt("BC8",16)} en base 10`);
console.log(`El número "5710" en octal es:           ${parseInt(5710,8)} en base 10`);
console.log(`El número "101111001000" en binario es: ${parseInt(101111001000,2)} en base 10`);
console.log(`El número "161.44" en base 9 es: ${parseInt(161.44,9)} en base 10`);

