const marca =  document.querySelector('#marca');
const anyo =  document.querySelector('#anyo');
const pMinimo=  document.querySelector('#minimo');
const pMaximo = document.querySelector('#maximo')
const puertas =  document.querySelector('#puertas');
const color =  document.querySelector('#color');
const transmision =  document.querySelector('#transmision');

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

    const listaCoches = document.getElementById('resultado');

    // Recorre el array 'coches' (del archivo db.js)
    coches.forEach(coche => {
        // Crea un elemento para cada coche
        const divCoche = document.createElement('div');
        divCoche.classList.add('coche'); // Opcional: para estilos
        divCoche.innerHTML = `
            <h2>${coche.marca} ${coche.modelo}</h2>
            <p>Año: ${coche.anyo}</p>
        `;
        // Añade el coche a la lista en el HTML
        listaCoches.appendChild(divCoche);
    });
});

