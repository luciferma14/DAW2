
/***********************************************
*****************WeakMaps*************
************************************************/
//solo admite objetos
const producto = {
    idProducto: 10,
    origen: 'China'
}

const weakmap = new WeakMap();

weakmap.set(producto, 'Monitor')

console.log(weakmap)
console.log(weakmap.has(producto)); //true
console.log(weakmap.get(producto)); //Monitor

//no se puede saber su tamaño, no se puede iterar sobre él