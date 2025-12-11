
/*----------------------------------
-------PROPIEDADES PRIVADAS----------
-----------------------------------*/
console.log("-------GET Y SET----------")

class Curso{
    constructor(nom, dificultad){
        this.nombre = nom;
        this._dificultad = dificultad;
        this.lecciones = [];
    }

    get dificultad(){
        console.log("GETTER");
        return this._dificultad;
    }

    set dificultad(nuevaDificultad){
        console.log("SETTER");
        if (nuevaDificultad >= 1 && nuevaDificultad <= 3){
            this._dificultad = nuevaDificultad;
        }else{
            console.log ("La dificultad NO es correcta");
        } 
    }
    agregarLeccion(tema){
        this.lecciones.push(tema);
    }
    eliminarLeccion(){
        this.lecciones.pop();
    }
    
}
const cursoJS = new Curso("JavaScript", 2);
console.log(cursoJS.dificultad);
cursoJS.dificultad = 21;
console.log(cursoJS.dificultad);


//Uso de # --> variante 1: con constructor
console.log("-------#----------")
class Cliente {
    #nombre;
    #saldo;
    constructor(nombre, saldo){
        this.#nombre = nombre;
        this.#saldo = saldo;
    }
    
    mostrarInformacion(){
        return `Cliente: ${this.#nombre}, tu saldo es de ${this.#saldo}`;
    }

    setSaldo(nuevoSaldo){
        if (!isNaN(nuevoSaldo)){
            this.#saldo = nuevoSaldo;
        }
    }

    getSaldo(){
        return this.#saldo;
    }

}

const cliente1 = new Cliente ("Natalia", 50000);
//console.log(cliente1.#nombre); ERROR!!
console.log(cliente1.mostrarInformacion());
cliente1.setSaldo(15000);
console.log(cliente1.getSaldo());



//Uso de # --> variante 2: sin constructor
console.log("-------#----------")
class Empresa {
    #nombre;
    #saldo;
      
    mostrarInformacion(){
        return `Empresa: ${this.#nombre}, tu saldo es de ${this.#saldo}`;
    }

    setSaldo(nuevoSaldo){
        if (!isNaN(nuevoSaldo)){
            this.#saldo = nuevoSaldo;
        }
    }

    getSaldo(){
        return this.#saldo;
    }

    setNombre(nuevoNombre){
        this.#nombre = nuevoNombre;
    }

    getNombre(){
        return this.#nombre;
    }
}

const empresa1 = new Empresa();
//console.log(cliente1.#nombre); ERROR!!
empresa1.setNombre("AUTOS SPEED")
empresa1.setSaldo(350000);
console.log(empresa1.getNombre());
console.log(empresa1.getSaldo());
console.log(empresa1.mostrarInformacion());








