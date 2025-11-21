class Personaje {
    static contadorPersonajes = 0;

    constructor(nombre, clase, vida) {
        Personaje.contadorPersonajes++;
        this._idPersonaje = Personaje.contadorPersonajes;

        this._nombre = nombre;
        this._clase = clase;
        this._vida = vida;
    }

    get idPersonaje() {
        return this._idPersonaje;
    }

    get nombre() {
        return this._nombre;
    }
    set nombre(v) {
        this._nombre = v;
    }

    get vida() {
        return this._vida;
    }
    set vida(v) {
        this._vida = v;
    }

    toString() {
        return `ID Personaje: ${this._idPersonaje} | Nombre: ${this._nombre} | Clase: ${this._clase} | Vida: ${this._vida}`;
    }
}

class Guerrero extends Personaje {
    static contadorGuerreros = 0;

    constructor(nombre, clase, vida, fuerza) {
        super(nombre, clase, vida);
        Guerrero.contadorGuerreros++;
        this._idGuerrero = Guerrero.contadorGuerreros;
        this._fuerza = fuerza;
    }

    get idGuerrero() {
        return this._idGuerrero;
    }

    get fuerza() {
        return this._fuerza;
    }
    set fuerza(v) {
        this._fuerza = v;
    }

    toString() {
        return `${super.toString()} | ID Guerrero: ${this._idGuerrero} | Fuerza: ${this._fuerza}`;
    }
}

// Crear personajes
const p1 = new Personaje("Elara", "Mago", 90);
const p2 = new Personaje("Lúthien", "Arquero", 75);
const g1 = new Guerrero("Balthus", "Guerrero", 120, 85);
const g2 = new Guerrero("Kael", "Guerrero", 110, 95);

console.log("------Ejercicio 3------")
console.log("--- 2 Personajes (Base) ---");
console.log(p1.toString());
console.log(p2.toString());

console.log("--- 2 Guerreros (Hija) ---");
console.log(g1.toString());
console.log(g2.toString());
