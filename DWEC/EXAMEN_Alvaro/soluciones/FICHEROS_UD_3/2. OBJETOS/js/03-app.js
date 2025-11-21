/*-----------------------------------------
--------- OBJETOS DENTRO DE OBJETOS--------
------------------------------------------*/

const producto = {
    articulo:"Ratón inalámbrico",
    precio: 35,
    disponible: true,
    informacion : {
        peso: "30 gramos",
        rgba: true,
        fabricacion: {
            pais: "China",
            anyo: 2022
        }         
    }
}
console.log(producto);

//Accedemos a los valores
console.log(producto.articulo);
console.log(producto.informacion);
console.log(producto.informacion.peso);
console.log(producto.informacion.fabricacion);
console.log(producto.informacion.fabricacion.pais);

/*----DESTRUCTURING DE OBJETOS ANIDADOS-----*/
const {articulo, informacion, informacion:{peso, fabricacion},informacion: {fabricacion:{pais}}} = producto;
console.log(articulo);
console.log(informacion);
console.log(peso);
console.log(fabricacion);
console.log(pais); 
