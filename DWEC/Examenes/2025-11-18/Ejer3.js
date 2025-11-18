class Personaje {
    static contadorPersonajes = 0;

// Constructor de la clase Personaje
    constructor(nombre, clase, vida) {
        Personaje.contadorPersonajes++;
        this._idPersonaje = Personaje.contadorPersonajes;
        this._nombre = nombre;
        this._clase = clase;
        this._vida = vida;
    }

// Creamos los Getters y Setters
    get idPersonaje() {
        return this._idPersonaje;
    }

    get Nombre() {
        return this._nombre;
    }

    set Nombre(nombre) {
        this._nombre = nombre;
    }

    get Vida() {
        return this._vida;
    }

    set Vida(vida) {
        this._vida = vida;
    }

// Creamos el toString de la clase Personaje
    toString() {
        return `ID Personaje: ${this._idPersonaje} | Nombre: ${this._nombre} | Clase: ${this._clase} | Vida: ${this._vida}`;
    }
}

// Creamos la clase Guerrero que extiende la clase Personaje
class Guerrero extends Personaje {
    static contadorGuerreros = 0;

    constructor(nombre, clase, vida, fuerza) {
        super(nombre, clase, vida);
        Guerrero.contadorGuerreros++;
        this._idGuerrero = Guerrero.contadorGuerreros;
        this._fuerza = fuerza;
    }

// Creamos los Getters y Setters

    get IdGuerrero() {
        return this._idGuerrero;
    }

    get Fuerza() {
        return this._fuerza;
    }

    set Fuerza(fuerza) {
        this._fuerza = fuerza;
    }

// Creamos el toString de la clase Guerrero
    toString() {
        return `${super.toString()} | Fuerza: ${this._fuerza}`;
    }
}

const p1 = new Personaje("Elara", "Mago", 90);
const p2 = new Personaje("Lúthien", "Arquero", 75); 
const g1 = new Guerrero("Balthus","Guerrero", 120, 85);
const g2 = new Guerrero("Kael", "Guerrero", 110, 95);

console.log("--- 2 Personajes (Base) ---");
// Muestra por consola los personajes creados con la clase base personaje
console.log(p1.toString());
console.log(p2.toString());
// Muestra por consola los guerreros creados con la clase hija guerrero
console.log("--- 2 Guerreros (Hija) ---");
console.log(g1.toString());
console.log(g2.toString());