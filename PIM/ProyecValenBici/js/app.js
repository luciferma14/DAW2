import { obtenerEstaciones } from './controlador.js';
import { mostrarEstaciones } from './vista.js';

window.addEventListener('DOMContentLoaded', async () => {
  const estaciones = await obtenerEstaciones();
  mostrarEstaciones(estaciones);
});
