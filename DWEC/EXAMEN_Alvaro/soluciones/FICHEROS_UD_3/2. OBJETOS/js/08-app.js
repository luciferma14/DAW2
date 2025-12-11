/*------------------------------------
--------------GET y SET--------------
------------------------------------*/
let vecino = {
    nombre: "Pedro",
    apellidos: "González López",
    edad: 35,
    mayorEdad: true,
    email: "pedro22@gmail.com",
    domicilio: "San Cristóbal, 23, bajo",
    propietario: true,
    pagaIBI: function(){
        return ((this.propietario) ? `El vecino: ${this.nombre} ${this.apellidos}
        debe pagar la cuota de IBI del inmueble sito en ${this.domicilio}` : `El vecino: 
        ${this.nombre} ${this.apellidos} NO le corresponde el pago del IBI de la vivienda
        sita en ${this.domicilio}`)
    },
    get nomCompleto(){
        return (`${this.nombre} ${this.apellidos}`); 
    },
    set mayoriaEdad(anyos){
       (anyos >= 18) ? this.mayorEdad = true : this.mayorEdad = false;
       this.edad = anyos; 
    }
   
}

console.log(vecino.nomCompleto);
console.log(vecino.pagaIBI());
console.log(vecino);
vecino.mayoriaEdad = 16;
console.log(vecino);







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

//invocamos el método carnetJove
