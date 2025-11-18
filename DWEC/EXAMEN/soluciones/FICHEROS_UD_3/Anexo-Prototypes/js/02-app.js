/***************************************
*********CREACIÓN PROTOTYPE***************
******************************************/
//Partimos de estos objetos
function Cliente(nombre, saldo) {
    this.nombre = nombre;
    this.saldo = saldo;
}
const juan = new Cliente("Juan Montero Salas", 10000);
console.log(juan);


//Creamos función con prototype 
Cliente.prototype.tipoCliente = function(){
    let tipo;
    if (this.saldo >= 50000){
        tipo = "Platinum";
    }else if (this.saldo >= 10000){
        tipo = "Gold";
    }else{
        tipo = "Normal"
    }
    return tipo;
}
console.log(juan.tipoCliente());

//Creamos función con prototype que apunta a la función del proto anterior
Cliente.prototype.infoCte = function() {
    return(`Nombre: ${this.nombre}, saldo: ${this.saldo}, 
    tipo cliente: ${this.tipoCliente()}`)
}
Cliente.prototype.infoCte2 = () => {
    return(`Nombre: ${juan.nombre}, saldo: ${juan.saldo}, 
    tipo cliente: ${juan.tipoCliente()}`)
}
console.log(juan.infoCte());
console.log(juan.infoCte2());

//Creamos función con prototype que recibe parámetros
Cliente.prototype.retiraSaldo = function(importe){
    this.saldo -= importe;
}
console.log(juan);
juan.retiraSaldo(200);
console.log(juan);

//CREAR PROPIEDADES CON PROTOTYPE
Cliente.prototype.activo;
juan.activo = true;
console.log(juan);


/***************************************
*********HERENCIA DE PROTOTYPE**********
****************************************/

//Creamos otro objeto que heredará de Cliente --> usamos call
function Empresa(nombre, saldo, categoria){
    Cliente.call(this, nombre, saldo);
    this.categoria = categoria;
}

//Heredamos también las funciones
//Empresa.prototype = Object.create(Cliente.prototype);
//Empresa.prototype.constructor = Cliente;

const empresa1 = new Empresa("ACADEMIA OPOS", 15000,"docencia", false);
console.log(empresa1);
console.log(empresa1.tipoCliente());
console.log(empresa1.infoCte());



