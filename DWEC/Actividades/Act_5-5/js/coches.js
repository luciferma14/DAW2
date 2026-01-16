const marca =  document.querySelector('#marca');
const anyo =  document.querySelector('#anyo');
const pMinimo=  document.querySelector('#minimo');
const pMaximo = document.querySelector('#maximo')
const puertas =  document.querySelector('#puertas');
const color =  document.querySelector('#color');
const transmision =  document.querySelector('#transmision');
const listaCoches = document.getElementById('resultado');


const datosBusqueda = {
    marca: '',
    anyo: '',
    pMinimo: '',
    pMaximo: '',
    puertas: '',
    color: '',
    transmision: ''
}

document.addEventListener('DOMContentLoaded', function() {

    coches.forEach(coche => {
        const divCoche = document.createElement('div');
        divCoche.classList.add('coche');
        divCoche.innerHTML = `<p>${coche.marca} ${coche.modelo} - Año: ${coche.anyo} - ${coche.precio}€ - ${coche.puertas} Puertas - Color: ${coche.color} - ${coche.transmision}</p>`;
        
        listaCoches.appendChild(divCoche);
    });
});

for (let i = 2015; i <= 2025; i++) {
    const opcion = document.createElement('option');
    opcion.value = i;
    opcion.textContent = i;
    anyo.appendChild(opcion);
}


function noResultado(){
    const divCoche = document.createElement('div');
    divCoche.innerHTML = '<p class="error">No hay resultados, pruebe otras opciones</p>'
}

function filtrarCoche() {
    // Usamos High Order Functions: filter
    const resultado = coches
    .filter(filtrarMarca)
    .filter(filtrarAnyo)
    .filter(filtrarMinimo)
    .filter(filtrarMaximo)
    .filter(filtrarPuertas)
    .filter(filtrarTransmision)
    .filter(filtrarColor);
    // Una vez filtrado, mostramos los resultados
    if (resultado.length) {
        mostrarCoches(resultado);
    } else {
        noResultado(); // Función para mostrar el error de "No hay resultados"
    }
} 

// Filtro de Marca
function filtrarMarca(coche) {
    const { marca } = datosBusqueda;
    if (marca) {
    return coche.marca === marca;
    }
    return coche; // Si no hay marca seleccionada, dejamos pasar el coche
}
// Filtro de Año
function filtrarAnyo(coche) {
    const { anyo } = datosBusqueda;
    if (anyo) {
    // IMPORTANTE: Convertimos a Number porque el valor del select es String
    return coche.anyo === parseInt(anyo);
    }
    return coche;
} 
// Evento para el selector de marca
marca.addEventListener('change', (e) => {
    // Guardamos el valor seleccionado en nuestro objeto global
    datosBusqueda.marca = e.target.value;
    // IMPORTANTE: Cada vez que el usuario cambie algo,
    // debemos volver a filtrar para actualizar los resultados
    filtrarCoche();
});
// Evento para el selector de año
anyo.addEventListener('change', (e) => {
    datosBusqueda.anyo = e.target.value;

    filtrarCoche(); // *Paso 5
});
// Repetir para el resto de selectores... 