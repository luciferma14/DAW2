
/**************************************
 *********FORZAR CONVERSIONES********
*************************************/

//Forzar conversiones --> Number
let x = 5; y = "2.25";
console.log (x + y); // 52.25
console.log (Number(x) + Number(y)); // 7.25
console.log(typeof (y));//String

//Forzar conversiones --> String
//Recordar toString()
let w = 8; z = 1;
console.log (w + z); // 9
console.log (String(w) + String(z)); // 81
console.log(typeof (w));//Number

//Forzar conversiones --> ParseInt
console.log (parseInt("1001",2)); //El 2 es la base --> Da 9
console.log (parseInt("2987jhjklhjh2211")); // Si está en base 10, no 
    //hace falta el segundo parámetro --> Da 2987 
console.log (parseInt("10.25veces")); // 10 pq convierte a entero

//Forzar conversiones --> ParseFloat
console.log (parseFloat("10.25veces")); // 10.25
















