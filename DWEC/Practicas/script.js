
const num1 = 5;
const num2 = 7;
let num3 = 9;
let suma = num1 + num2 + num3;
let pasa = false;

if (suma > 10) pasa = true;

document.getElementById("num1Display").innerHTML = num1;
document.getElementById("num2Display").innerHTML = num2;
document.getElementById("num3Display").innerHTML = num3;
document.getElementById("resultDisplay").innerHTML = suma;
document.getElementById("isOverTen").innerHTML = pasa;