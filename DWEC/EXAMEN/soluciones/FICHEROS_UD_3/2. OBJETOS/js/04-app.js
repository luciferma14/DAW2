/*--------------------------------------------
---------METODOS DE LOS OBJETOS---------------
---------------------------------------------*/
const modulo = {
    nombre: "DWES",
    horasSem: 7,
    ciclo:"DAW",
    curso: 2
};
console.log(modulo.nombre);
modulo.nombre = "DWEC";
console.log(modulo.nombre);

/*-----Object.freeze()-------*/
console.log("-------Object.freeze()------");
//Hace que no puedas modificar el objeto
//Object.freeze(modulo);
//intentamos editar propiedad
modulo.nombre = "DIW";
console.log(modulo.nombre);
//intentamos borrar propiedad
delete modulo.curso;
console.log(modulo);
//intentamos añadir propiedad
modulo.turno = "tarde";
console.log(modulo);

/*-----Object.isFrozen()-------*/
console.log("-------Object.isFrozen()------");
//Indica si un objeto está congelado o no
console.log(Object.isFrozen(modulo));//true

/*-----Object.seal()-------*/
console.log("-------Object.seal()------");
//Sella el objeto: se pueden modificar propiedades, pero NO añadir ni borrar
const perro = {
    nombre: "Fly",
    raza: "Pitbull",
    anyos: 2,
}

Object.seal(perro);
perro.anyos = 5;
perro.leGusta = "Jugar con pelota";
delete perro.raza;
console.log(perro);

/*-----Object.isSealed()-------*/
console.log("-------Object.isSealed()------");
//Indica si un objeto está sellado o no
console.log(Object.isSealed(perro));//true
console.log(Object.isSealed(modulo));//true

/*-----Object.assign()-------*/
console.log("-------Object.assign()------");
//Permite unir dos objetos
const objetosUnidos = Object.assign(modulo, perro);
console.log(objetosUnidos);

/*-----Spread Operator o Rest Operator-------*/
console.log("-------Spread Operator------");
//Permite unir dos objetos
const objetosUnidos2 = {...perro, ...modulo};
console.log(objetosUnidos2);

/*---------------Object.keys()-------------*/
console.log("-------Object.keys()------");
//Permite ver las propiedades del objeto
function JuegoMesa (nombre, numJugadores, edadMin, pvp){
    this.nombre = nombre ;
    this.numJugadores = numJugadores;
    this.edadMin = edadMin;
    this.pvp = pvp;
}
const juego1 = new JuegoMesa("Batalla de Genios", 2, 6, 25); 
console.log(Object.keys(juego1));

/*---------------Object.values()-------------*/
console.log("-------Object.values()------");
//Permite ver los valores de las propiedades del objeto
console.log(Object.values(juego1));

/*---------------Object.entries()-------------*/
console.log("-------Object.entries()------");
//Array con las propiedades y sus valores
console.log(Object.entries(juego1));
