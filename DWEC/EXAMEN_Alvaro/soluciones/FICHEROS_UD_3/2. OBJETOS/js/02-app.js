
/*--------------------------------------------
---------PROPIEDADES DE OBJETOS---------------
---------------------------------------------*/

const alumno1 = {
    nombre: "Natalia Escrivá",
    ciclo:"DAW",
    curso: 2
};

/*********ACCESO A LAS PROPIEDADES*********/
console.log("*****ACCESO A LAS PROPIEDADES******");
//1.objeto.propiedad
console.log(alumno1.nombre);

//2. objeto["propiedad"]
console.log(alumno1["ciclo"]);

//3. objeto[expresión]
let expresion = "curso"; //el valor será el de la propiedad
console.log(alumno1[expresion]);


/*********AÑADIR PROPIEDADES*********/

//objeto.nueva_propiedad
alumno1.nia = "XXXXX";
console.log(alumno1.nia);

/*********EDITAR PROPIEDADES*********/
//objeto.propiedad = nuevo_valor
alumno1.nia = 12345678;
console.log(alumno1["nia"]);

/*********BORRAR PROPIEDADES*********/
//delete objeto.propiedad
delete alumno1.curso;
console.log(alumno1);


/*--------------------------------------------
---------DESTRUCTURING DE OBJETOS-------------
---------------------------------------------*/
//Forma habitual
const n = alumno1.nombre;
console.log(n);

//A través del destructuring
//Extraer varios valores de un objeto.
//Si no existe la propiedad, crea la variable pero undefined
let {nombre, nia, ciclo, curso} = alumno1;
console.log(nombre);
console.log(nia);
console.log(ciclo);
console.log(curso);





