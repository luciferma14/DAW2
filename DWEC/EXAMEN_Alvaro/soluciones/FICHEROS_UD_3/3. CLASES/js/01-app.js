/*------------------------------------------
--------------CLASES y MÉTODOS--------------
--------------------------------------------*/
//class declaration
console.log("----class declaration-----");
class Person{
    constructor(nom,ape,anyos){
        this.nombre = nom;
        this.apellido = ape;
        this.edad = anyos; 
    }
    //métodos
    nomComp(){
        return(`${this.nombre} ${this.apellido}`);
    }
    mayorEdad(){
        if (this.edad >= 18){
            console.log(`${this.nomComp()} es mayor de edad`);
            return true;
        }else{
            console.log(`${this.nomComp()} aún NO es mayor de edad`)
            return false;
        }
    }
    //método static --> propio de la clase y no de los objetos
    static bienvenida(){
        return `Bienvenido/a!!!!!`;
    }
    //sobreescribimos el método toString() de la clase padre (Object)
    toString(){
        return (this.nomComp());
    }
    
}

const persona1 = new Person ("Rodolfo", "Moriente", 35);
console.log(persona1);
console.log(persona1.nomComp());
console.log(persona1.mayorEdad());
alert(persona1);

//class expression
console.log("----class expression-----");
const Person2 = class{
    constructor(nom,ape,anyos){
        this.nombre = nom;
        this.apellido = ape;
        this.edad = anyos; 
    }
    nomComp(){
        return(`${this.nombre} ${this.apellido}`);
    }
    mayorEdad(){
        if (this.edad >= 18){
            return `${this.nomComp()} es mayor de edad`;
        }else{return `${this.nomComp()} aún NO es mayor de edad`};
    }
    
}

const persona2 = new Person2("Pepe", "Ximénez", 35);
console.log(persona2);
console.log(persona2.nomComp());
console.log(persona2.mayorEdad());


/*-----------------------------------------------
---------METODOS Y PROPIEDADES STATIC-------------
------------------------------------------------*/
console.log("----métodos estáticos-----");
//llamamos al método static de Person
console.log(Person.bienvenida());
//console.log(persona1.bienvenida()); ERROR!!!

class Rectangulo {

    static contadorRectangulos = 0;

    constructor(x,y){
        this.x = x;
        this.y = y;
        Rectangulo.contadorRectangulos++;
        console.log(`Se incrementa contador: ${Rectangulo.contadorRectangulos}`);
    }
    static area (a,b){
        return a*b;
    }
    static perimetro (a,b){
        return (a*2) + (b*2);
    }
}

const rectang1 = new Rectangulo(2,3);
//invocamos los métodos de forma habitual...
//console.log (rectang1.area(2,3)); ERROR!!
//console.log (rectang1.perimetro(2,3)); ERROR!!
console.log(rectang1);
console.log (Rectangulo.area(2,3)); //6
console.log (Rectangulo.perimetro(2,3));//10
console.log (Rectangulo.area(rectang1.x,rectang1.y)); //6
console.log (Rectangulo.perimetro(rectang1.x,rectang1.y));//10

//PROPIEDADES ESTÁTICAS
console.log("----------------propiedades estáticas-------------")
console.log(Rectangulo.contadorRectangulos);
 
 

