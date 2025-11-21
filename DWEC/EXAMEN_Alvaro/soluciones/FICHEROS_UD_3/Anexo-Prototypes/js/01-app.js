/********RECORDATORIO*******************
*********CREACIÓN OBJETOS***************
******************************************/
//Object literal
const cliente = {
    nombre: "Natalia Escrivá Núñez",
    importePte: 325
}
console.log(cliente);

//Object constructor
function Cliente(nombre, importePte) {
    this.nombre = nombre;
    this.importePte = importePte;
}
const alberto = new Cliente("Alberto Peña Cano", 0);
console.log(alberto);


