/***************************************
 ******CONCATENAR STRINGS***********
 ***************************************/

 //a través del operador +
 const nombre = "Natalia",
       apell1 = "Escrivá",
       apell2 = "Núñez";

 const nomComp = 'Mi nombre es ' + nombre + ' '+ apell1 + ' ' + apell2;
 console.log(nomComp);

  
 //a través del método concat
 let nomComp2 = "Me llamo "
 console.log(nomComp2.concat(nombre).concat(apell1).concat(apell2));

/***************************************
 **********TEMPLATE STRINGS*************
 ***************************************/
 const curso = "2 DAW";
 const tecnicos = "DWEC, DWES, DIW, DAW";
 const comunes = 'EiE e Inglés';
 let modulos = "";
     //modulos += "En " + curso + " cursamos estos módulos:  \n";
     modulos += `En ${curso} cursamos estos módulos:  \n`;
     modulos += ` ${tecnicos} como módulos técnicos `;
     //modulos += 'y ' + comunes +  ' como genéricos';
     modulos += `y ${comunes} como genéricos`;
 console.log(modulos);

 let modulos2 = "";
 modulos2 = modulos2.concat(`En ${curso} se estudia ${tecnicos} y ${comunes}`);
 console.log(modulos2);

 /***************************************
 *********SECUENCIAS DE ESCAPE***********
 ***************************************/
const nomCompleto = "Natalia Escrivá Núñez";
console.log("\n******SECUENCIAS DE ESCAPE*********");
console.log ("Mi nombre es:\n" + nomCompleto);
console.log ("NomTrabajador\tDIA\tHora Entrada\tHora Salida");
console.log ("Mi nombre es:\rNatalia\rEscrivá\rNúñez");
console.log ("Hoy es:\f24\fdiciembre\fNochebuena");
console.log ("Y entonces dijo: \"Buena suerte\"");
console.log ('Y entonces dijo: \'Buena suerte\'');
console.log ('Bienvenidos a: \\2º DAW\\');