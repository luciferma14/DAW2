
console.log("--------------HERENCIA-------------");
/*-----------------------------------------------------
-------------SUBCLASES O HERENCIA--------------------
--------------------------------------------------------*/

class Alumn extends Person {
    constructor (nombre, apellido, edad, nia, ciclo, curso){
        super(nombre, apellido, edad);//llama al constructor de la clase padre
        this.nia = nia;
        this.cicle = ciclo;
        this.course = curso;
    }   
    infoInsti(){
        return `El alumno ${this.nomComp()}, de ${this.edad} años, con nia ${this.nia}
        está cursando ${this.cicle}, ${this.course} curso`;
    }
    
    puedeSalir(){
        if (super.mayorEdad()){
            return `El alumno ${super.nomComp()} puede salir del instituto`;
        }else{
            return `El alumno ${super.nomComp()} NO puede salir del instituto`;
        }
    }
    //creamos un método con el mismo nombre de la clase padre
    //usará el de la clase hija
    static bienvenida(){
        return `Bienvenido/a al Serra Perenxisa!!!!!`;
    }
    //sobreescribimos el método toString() de la clase Object
    toString(){
        return `${this.apellido}, ${this.nombre}. NIA: ${this.nia}`
    }
    
}

const alumno1 = new Alumn("Pedro","López",25,"123456","DAW",2);
console.log(alumno1);
console.log(alumno1.nomComp());
alumno1.mayorEdad();
console.log(alumno1.infoInsti());
console.log(alumno1.puedeSalir());
console.log(Person.bienvenida());
console.log(Alumn.bienvenida());

console.log("-------Método toString()---------");
//-----Método toString()----------
alert(alumno1);
alert(alumno1.toString());
console.log(alumno1);
console.log(alumno1.toString());

