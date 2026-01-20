// Selectores del formulario
const marca = document.querySelector('#marca');
const anyo = document.querySelector('#anyo');
const pMinimo = document.querySelector('#minimo');
const pMaximo = document.querySelector('#maximo');
const puertas = document.querySelector('#puertas');
const color = document.querySelector('#color');
const transmision = document.querySelector('#transmision');

// Contenedor de resultados
const listaCoches = document.getElementById('resultado');

// Objeto que almacena los datos de búsqueda
const datosBusqueda = {
    marca: '',
    anyo: '',
    pMinimo: '',
    pMaximo: '',
    puertas: '',
    color: '',
    transmision: ''
};
// Mostrar todos los coches al cargar la página
document.addEventListener('DOMContentLoaded', () => {
    mostrarCoches(coches);
});

// Llenar selector de años (10 últimos años desde el actual)
const max = new Date().getFullYear();
const min = max - 10;

for (let i = max; i >= min; i--) {
    const opcion = document.createElement('option');
    opcion.value = i;
    opcion.textContent = i;
    anyo.appendChild(opcion);
}

// Eventos de los selectores
marca.addEventListener('change', e => {
    datosBusqueda.marca = e.target.value;
    filtrarCoche();
});

anyo.addEventListener('change', e => {
    datosBusqueda.anyo = e.target.value;
    filtrarCoche();
});

pMinimo.addEventListener('change', e => {
    datosBusqueda.pMinimo = e.target.value;
    filtrarCoche();
});

pMaximo.addEventListener('change', e => {
    datosBusqueda.pMaximo = e.target.value;
    filtrarCoche();
});

puertas.addEventListener('change', e => {
    datosBusqueda.puertas = e.target.value;
    filtrarCoche();
});

transmision.addEventListener('change', e => {
    datosBusqueda.transmision = e.target.value;
    filtrarCoche();
});

color.addEventListener('change', e => {
    datosBusqueda.color = e.target.value;
    filtrarCoche();
});


function filtrarCoche() {
    const resultado = coches
        .filter(filtrarMarca)
        .filter(filtrarAnyo)
        .filter(filtrarMinimo)
        .filter(filtrarMaximo)
        .filter(filtrarPuertas)
        .filter(filtrarTransmision)
        .filter(filtrarColor);

    if (resultado.length) {
        mostrarCoches(resultado);
    } else {
        noResultado();
    }
}

// Filtro marca
function filtrarMarca(coche) {
    const { marca } = datosBusqueda;
    if (marca) {
        return coche.marca === marca;
    }
    return coche;
}

// Filtro año
function filtrarAnyo(coche) {
    const { anyo } = datosBusqueda;
    if (anyo) {
        return coche.anyo === parseInt(anyo);
    }
    return coche;
}

// Filtro precio mínimo
function filtrarMinimo(coche) {
    const { pMinimo } = datosBusqueda;
    if (pMinimo) {
        return coche.precio >= parseInt(pMinimo);
    }
    return coche;
}

// Filtro precio máximo
function filtrarMaximo(coche) {
    const { pMaximo } = datosBusqueda;
    if (pMaximo) {
        return coche.precio <= parseInt(pMaximo);
    }
    return coche;
}

// Filtro puertas
function filtrarPuertas(coche) {
    const { puertas } = datosBusqueda;
    if (puertas) {
        return coche.puertas === parseInt(puertas);
    }
    return coche;
}

// Filtro transmisión
function filtrarTransmision(coche) {
    const { transmision } = datosBusqueda;
    if (transmision) {
        return coche.transmision === transmision;
    }
    return coche;
}

// Filtro color
function filtrarColor(coche) {
    const { color } = datosBusqueda;
    if (color) {
        return coche.color === color;
    }
    return coche;
}

// Muestra los coches en el HTML
function mostrarCoches(coches) {
    listaCoches.innerHTML = '';

    coches.forEach(coche => {
        const div = document.createElement('div');
        div.classList.add('coche');
        div.innerHTML = `
            <p>
                ${coche.marca} ${coche.modelo} -
                Año: ${coche.anyo} -
                ${coche.precio}€ -
                ${coche.puertas} Puertas -
                Color: ${coche.color} -
                ${coche.transmision}
            </p>
        `;
        listaCoches.appendChild(div);
    });
}

// Muestra mensaje de no resultados
function noResultado() {
    listaCoches.innerHTML = '';

    const div = document.createElement('div');
    div.classList.add('alerta', 'error');
    div.textContent = 'No hay resultados, pruebe otras opciones';

    listaCoches.appendChild(div);
}
