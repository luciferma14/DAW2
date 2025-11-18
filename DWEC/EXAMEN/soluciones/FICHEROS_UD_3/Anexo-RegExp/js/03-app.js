

/*
console.log("*****************************");
// ^ --> que comience por...
expresion = /^c/;
console.log(expresion.test("casa"));//true
console.log(expresion.test("arco"));//false

// $ --> que termine por...
expresion = /a$/;
console.log(expresion.test("casa"));//true
console.log(expresion.test("arco"));//false

// . --> comodín de cualquier caracter (solo uno)
expresion = /a.e/;
console.log(expresion.test("casero"));//true
console.log(expresion.test("aereo"));//false
console.log(expresion.test("rastrero"));//false

// * --> comodín de cualquier caracter (n caracteres)
expresion = /a.*e/;
console.log(expresion.test("casero"));//true
console.log(expresion.test("aerostático"));//true
console.log(expresion.test("rastrero"));//true

// [] --> caracteres opcionales
expresion = /[aeiou]$/;
console.log(expresion.test("CASERA"));//false
console.log(expresion.test("aerostático"));//true
console.log(expresion.test("labrador"));//false

expresion = /^[a-z]/;
console.log(expresion.test("Roberto"));//false
console.log(expresion.test("ojos"));//true
console.log(expresion.test("árbol"));//false

expresion = /^[a-záàéèíóòú]/;
console.log(expresion.test("Roberto"));//false
console.log(expresion.test("ojos"));//true
console.log(expresion.test("árbol"));//true

console.log("**************************");

expresion = /^[^a]/;//que NO empiece por a
console.log(expresion.test("Roberta"));//true
console.log(expresion.test("azul"));//false

expresion = /^[^a-z]/;// que NO empiece por min
console.log(expresion.test("Roberto"));//true
console.log(expresion.test("ojos"));//false

console.log("*********************");
expresion = /[^a]/;
console.log(expresion.test("aaaaa"));//false
console.log(expresion.test("ojos"));//true
expresion = /[^pa]/;
console.log("papaNoel".search(expresion));//4
expresion = /[^2468]/;
console.log("2468698".search(expresion));//5
expresion = /[^1-9]/;
console.log(expresion.test("natalia"));//true
console.log(expresion.test("321"));//false

console.log("*********************");
// | --> se elige una opción de entre varias
expresion = /norte|sur|este|oeste/i;
console.log(expresion.test("Vivo al norte de España"));//true
console.log(expresion.test("Galicia, comunidad al NordOeste del país"));//true
console.log(expresion.test("Vivo en Valencia"));//false

// () --> Agrupar caracteres
expresion = /(hola|adiós) (amigo|amiga|papá|mamá)/i;
console.log(expresion.test("Mamá, hola"));//false
console.log(expresion.test("Adiós amiga mía!"));//true

console.log("*********************");
// + --> La expresión de su izq. se repetirá 1 ó más veces
expresion = /[0-9].+OK/;
console.log(expresion.test("5OK"));//false
console.log(expresion.test("5xOK"));//true
console.log(expresion.test("5xxxOK"));//true

console.log("*********************");

// * --> La expresión de su izq. se repetirá 0 ó más veces
expresion = /[0-9].*OK/;
console.log(expresion.test("5OK"));//true
console.log(expresion.test("5xOK"));//true

console.log("*********************");

// ? --> La expresión de su izq. se repetirá 0 ó 1 vez
expresion = /[0-9].? OK/;
console.log(expresion.test("5OK"));//true
console.log(expresion.test("5xOK"));//true
console.log(expresion.test("5xxxOK"));//false

console.log("*********************");

// {n} --> La expresión de su izq. se repetirá mínimo n veces
expresion = /[0-9]{3}.[aeiou]{1}/;
console.log(expresion.test("5+a"));//false
console.log(expresion.test("123#aeiii"));//true
console.log(expresion.test("12645"));//false

console.log("*********************");

// {n} --> La expresión de su izq. se repetirá n veces
//OJO! No hay corchetes...
expresion = /abc{2}d/;
console.log(expresion.test("abccd"));//true
console.log(expresion.test("abccccccd"));//false
console.log(expresion.test("abcd"));//false
console.log(expresion.test("abd"));//false


expresion = /^[0-9]{5}$/;
console.log(expresion.test("46020"));//true
console.log(expresion.test("4602012"));//false


console.log("*********************");
// {m,n} --> La expresión de su izq. se repetirá de m a n veces
expresion = /(^[a-z]{2,5})[0-9]{3}/;
console.log(expresion.test("a366"));//false
console.log(expresion.test("aaaeaa366"));//false
console.log(expresion.test("abc123"));//true
console.log(expresion.test("aeiou31"));//false
// {m,n} --> La expresión de su izq. se repetirá de m a n veces
//OJO! NO hay corchetes
expresion = /abc{2,4}d/;
console.log(expresion.test("abccd"));//true
console.log(expresion.test("abcccd"));//true
console.log(expresion.test("abcccccd"));//false
console.log(expresion.test("abcd"));//false

console.log("*********************");
// \d
expresion = /\d{2}\/\d{2}\/\d{4}/;
console.log(expresion.test("24/12/2022"));//true
console.log(expresion.test("222/22/55"));//false

console.log("*********************");
// \s y \S
expresion = /\w\s\w/;
console.log(expresion.test("MinombreesNatalia"));//false
console.log(expresion.test("Mi nombre es Natalia"));//true

// b
exp1Letra = /\b\w\b/g;
expMediana = /\b\w{1,4}\b/g;
expLarga = /\b\w{8,}\b/g;
let cadena = "HOla, me llamo Ana y soy estudiante, $%_&&";
console.log(cadena.match(exp1Letra));
console.log(cadena.match(expMediana));
console.log(cadena.match(expLarga));

console.log("*********************");
*/
/*********************************************
****************LOOKAROUND********************
**********************************************/
/*
// x(?=y)
expresion = /nota (?=(baja|media|alta))/;
console.log(expresion.test("La nota alta"));//true
console.log(expresion.test("La nota es alta"));//false
console.log(expresion.test("La baja nota "));//false

// x(?!y)
expresion = /nota (?!(baja|media|alta))/;
console.log(expresion.test("La nota alta"));//false
console.log(expresion.test("La nota es alta"));//true
console.log(expresion.test("La baja nota "));//true

//(?<=y)x
expresion = /(?<=(baja|media|alta)) nota/;
console.log(expresion.test("La nota alta"));//false
console.log(expresion.test("La nota es alta"));//false
console.log(expresion.test("La baja nota "));//true

//(?<!y)x
expresion = /(?<!(baja|media|alta)) nota/;
console.log(expresion.test("La nota alta"));//true
console.log(expresion.test("La nota es alta"));//true
console.log(expresion.test("La baja nota "));//false
*/

/*********************************************
****************MÉTODOS********************
**********************************************/
/*
//exec
expresion = /\w+/;
let texto = "Este es un texto de prueba";
let result = expresion.exec(texto);
console.log(result);

expresion = /(.+texto)(.+prueba)/;
 texto = "Este es un texto de prueba";
result = expresion.exec(texto);
console.log(result);
*/
