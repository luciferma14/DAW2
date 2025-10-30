class Persona {
    static contadorPersonas = 0;

    constructor(nombre, apellido, edad) {
        this._idPersona = ++Persona.contadorPersonas;
        this._nombre = nombre;
        this._apellido = apellido;
        this._edad = edad;
    }

    getIdPersona() {
        return this._idPersona;
    }

    getNombre() {
        return this._nombre;
    }

    setNombre(nombre) {
        this._nombre = nombre;
    }

    getApellido() {
        return this._apellido;
    }

    setApellido(apellido) {
        this._apellido = apellido;
    }

    getEdad() {
        return this._edad;
    }

    setEdad(edad) {
        this._edad = edad;
    }

    toString() {
        return `${this.getIdPersona()}: ${this._nombre} ${this._apellido}, ${this._edad} años`;
    }
}

class Empleado extends Persona {
    static contadorEmpleados = 0;

    constructor(nombre, apellido, edad, sueldo) {
        super(nombre, apellido, edad);
        this._idEmpleado = ++Empleado.contadorEmpleados;
        this._sueldo = sueldo;
    }

    getIdEmpleado() {
        return this._idEmpleado;
    }

    getSueldo() {
        return this._sueldo;
    }

    setSueldo(sueldo) {
        this._sueldo = sueldo;
    }

    toString() {
        return `${super.toString()}\n\tEmpleado/a ${this._idEmpleado}: ${this._sueldo}€`;
    }
}

class Cliente extends Persona {
    static contadorClientes = 0;

    constructor(nombre, apellido, edad, fechaRegistro) {
        super(nombre, apellido, edad);
        this._idCliente = ++Cliente.contadorClientes;
        this._fechaRegistro = fechaRegistro;
    }

    getIdCliente() {
        return this._idCliente;
    }

    getFechaRegistro() {
        return this._fechaRegistro;
    }

    setFechaRegistro(fecha) {
        this._fechaRegistro = fecha;
    }

    toString() {
        return `${super.toString()}\n\tCliente/a: ${this._idCliente} Fecha alta: ${this._fechaRegistro}`;
    }
}

const persona1 = new Persona("Carmen", "García", 65);
const persona2 = new Persona("Carlos", "Pérez", 25);

console.log(persona1.toString());
console.log(persona2.toString());

const empleado1 = new Empleado("Laura", "González", 28, 1500);
console.log(empleado1.toString());

console.log("\nprobando setter");
const empleado2 = new Empleado("Pietro", "Sánchez", 32, 1200);
console.log(empleado2.toString());

const cliente1 = new Cliente("Rodrigo", "Márquez", 50, new Date(2024, 8, 25).toDateString());
console.log(cliente1.toString());

const cliente2 = new Cliente("Pietro", "Sánchez", 32, new Date(2024, 8, 25).toDateString());
console.log(cliente2.toString());