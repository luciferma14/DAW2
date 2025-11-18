//***************PROPIEDADES**************//

//length --> nos da el tamaño del string
const text1 = "Supercalifragilisticoespialidoso";
console.log(`La longitud de "${text1}" es: ${text1.length}`); 

//*****************METODOS****************//

//PARA TODOS LOS TIPOS DE DATOS
//tipeof() --> Nos dice el tipo de dato
const text = "Ejemplo de cadena de texto";
console.log(`"${text}" es de tipo: ${typeof(text)}`);
console.log(text.valueOf());

//BUSQUEDA
//indexOf() --> nos da la 1ª posición de un carácter de la cadena 
console.log(`En "${text1}", 
la primera r está en la posición:  ${text1.indexOf("r")} `);
console.log(`En "${text1}", 
la segunda r está en la posición:  ${text1.indexOf("r", 15)} `);
console.log(`En "${text1}", 
la letra "w" está en la posición:  ${text1.indexOf("w")} `);
//lastIndexOf() --> nos da la última posición de un carácter de la cadena 
console.log(`En "${text1}", 
la última r está en la posición:  ${text1.lastIndexOf("r")} `);

//includes() --> devuelve true si la cadena incluye el parámetro
console.log(`En "${text1}", 
se encuentra el texto: 'oso' --> ${text1.includes("oso")} `);
console.log(`¿En "${text1}", 
podemos encontrar?: 
super: ${text1.includes("super")},
fragil: ${text1.includes("fragil")} y
espia: ${text1.includes("espia")}`);

//charAt() --> nos da el carácter según la posición 
console.log(`El décimo carácter del texto "${text1}" es: ${text1.charAt(9)}`);
//charCodeAt()--> nos da el código Unicode según la posición
console.log(`La posición del décimo carácter del texto "${text1}" según Unicode es:
 ${text1.charCodeAt(9)}`);
let caracter = "h";
console.log(caracter.charCodeAt(caracter));//104

 //String.fromCharCode() --> devuelve un string con los códigos Unicode
 console.log(String.fromCharCode(65,66,67,100,101,102));

 
//search() --> nos da la posición de una cadena o expresión regular en otra cadena
console.log(`En "${text1}", 
encontramos 3 palabras escondidas: 
Super, en la posición: ${text1.search("Super")},
fragil, en la posición: ${text1.search("fragil")} 
y espia, en la posición: ${text1.search("espia")}`);


//MAY Y MIN
 let text2 = text1.toUpperCase();
 console.log(`El texto ${text1} se ha convertido en...
 ${text2}`);

 console.log(`"${text2}" ahora en minúsculas: 
 ${text1.toLowerCase()}`);

 //EMPIEZA / TERMINA
 //startsWith()--> devuelve true si la cadena empieza con el parámetro
 //endsWith()--> devuelve true si la cadena termina con el parámetro
 console.log(`¿"${text1}", 
 empieza por "Super"?: ${text1.startsWith("Super")},
 ¿y si quitamos los 5 últimos caracteres acaba en "espia"?: ${text1.endsWith("espia", 26)}`);


 //EXTRAER / MODIFICAR
 //replace()--> busca y reemplaza texto
 console.log(`Sustituye  "oso" por "Super":
 ${text1.replace("oso","Super")} `);

//trim()--> elimina espacios en blanco a dcha e izq
let text3 = "     Natalia Escrivá     ";
console.log(`Eliminamos del texto --${text3}--, 
los espacios a derecha e izquierda: --${text3.trim()}--}`);
//trimStart()--> elimina espacios en blanco del inicio de la cadena
console.log(`Eliminamos del texto --${text3}--, 
los espacios de la izquierda: --${text3.trimStart()}--}`);
//trimEnd()--> elimina espacios en blanco del final de la cadena
console.log(`Eliminamos del texto --${text3}--, 
los espacios de la derecha: --${text3.trimEnd()}--}`);

//slice()--> extrae los caracteres desde inicio hasta fin
console.log(`Eliminamos de "${text1}" caracteres por delante y por detrás:
 ${text1.slice(5,15)} `);
 console.log(`Eliminamos de "${text1}" caracteres por delante y por detrás:
 ${text1.slice(5,-15)} `);
//substring()--> igual que slice sin negativos
console.log(`Eliminamos de "${text1}" caracteres por delante y por detrás:
 ${text1.substring(5,15)} `);

//split()--> divide el texto en un array de textos
console.log(`Dividimos "${text1}":
 ${text1.split("a")} `);
 console.log(`Dividimos "${text1}":
 ${text1.split("a",2)} `);

 //repeat()--> repite la cadena el nº de veces del parámetro
 console.log(`Repite "${text1}" 2 veces: 
 ${text1.repeat(2)} `);
 let texto = "REBAJAS!! ".repeat(3);
 console.log(texto)

 //COMPARAR STRINGS
 console.log("localCompare()");
 //localCompare()--> compara dos strings
 const palabra1 = "Oso";
 const palabra2 = "Ñu";
 console.log(palabra1.localeCompare(palabra2));
 const palabra3 = "Oso";
 console.log(palabra1.localeCompare(palabra3));

 //CONVERTIR A STRING
 //toString --> Convierte a String
 const num = 500;
 console.log(`${num.toString()}, ${typeof(num)}`);
 const numStr = num.toString();
 console.log(`Asignando valor con toString(), se ha convertido en ${typeof(numStr)}`);

 
