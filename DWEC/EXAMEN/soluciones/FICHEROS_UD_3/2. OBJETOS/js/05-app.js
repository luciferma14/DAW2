/*--------------------------------------
----------PALABRA RESERVADA THIS--------
---------------------------------------*/

//creamos variables globales
const prod = "cama",
      tipo = "dormitorio",
      material = "metal",
      pvp = 500,
      stock = 1000;
 
//creamos nuestro objeto      
const mueble = {
    prod : "mesa",
    tipo : "comedor",
    material: "madera",
    pvp: 350,
    stock: 202,
    //método propio del objeto
    mostrarInfo: function(){
        return (`El mueble: ${this.prod}, es de la categoría ${this.tipo}. Está hecho de ${this.material},
        tiene un precio de ${this.pvp}€ y hay ${this.stock} unidades en stock`);
    }    
}
//llamada al método del objeto
console.log(mueble.mostrarInfo());

/*--------------------------------------
---FORMAS DE CREAR METODOS DE OBJETOS---
---------------------------------------*/
//En la propia declaración del objeto (object literal) (arriba)

//En la propia declaración del objeto (object constructor)
function Ciudadano (nomCompleto, NIF, direc, CP, edad){
    //propiedades
    this.nombre = nomCompleto;
    this.NIF = NIF;
    this.domicilio = direc;
    this.CP = CP;
    this.edad = edad;
    //métodos
    this.carnetJove = function(){
       console.log((this.edad >= 12 && this.edad <=35) ? `Al ciudadano: ${this.nombre} 
        se le puede expedir el Carnet Jove` : `Al ciudadano: ${this.nombre} 
        NO se le puede expedir el Carnet Jove`);
    }    
}
//vamos a crear o instanciar un objeto tipo persona
const ciudadano1 = new Ciudadano ("Marta Barranco Soler","11111111A","c/Pelayo, 3",46020, 45);
const ciudadano2 = new Ciudadano ("Daniel García Pérez","22222222B","c/Asturias, 32",46015, 15);
ciudadano1.carnetJove();
ciudadano2.carnetJove();

//Tras haber declarado el objeto (object literal y constructor integrado)
//objeto alumno creado en 01-app.js
alumno.info = function(){
    return `${alumno.nombre} --> ${alumno.modulos}`
}
console.log(alumno.info());

//A parte de la declaración del objeto 
mueble.hacerPedido = function(){
    if (this.stock < 10){
        console.log(`PEDIDO PENDIENTE DE ${this.prod} de ${this.tipo} de ${this.material},
        solo quedan ${this.stock} en stock`);
    }else{
        console.log(`De momento NO debemos pedir ${this.prod} de ${this.tipo} de ${this.material}`);
    }
}
mueble.hacerPedido();

