import {Controlador} from './controlador.js';
import {Vista} from './vista.js';


const iniciarAplicacion = async () => {
    const vista = new Vista({mapId: 'mapa'});
    const controlador = new Controlador({vista});


    const rango = document.getElementById('num-estaciones');
    const rangoVal = document.getElementById('num-estaciones-val');
    const btnRef = document.getElementById('btn-refrescar');


    rango.addEventListener('input', () => {
    rangoVal.textContent = rango.value;
    controlador.setMaxEstaciones(Number(rango.value));
    });


    btnRef.addEventListener('click', () => controlador.refrescar());


    await controlador.iniciarAplicacion();
};

window.addEventListener('DOMContentLoaded', iniciarAplicacion);