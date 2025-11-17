# Memoria Técnica — Proyecto: Disponibilidad Valenbisi
**Asignatura:** Proyecto Interdisciplinar  
**Autora:** Lucía Ferrandis


## 1. Introducción
Este proyecto tiene por objetivo desarrollar un prototipo de aplicación web que permita consultar, en tiempo real, la disponibilidad de bicicletas y anclajes del sistema Valenbisi. 

## 2. Objetivos
**General:** Crear una aplicación web funcional que obtenga datos en tiempo real de la API pública de Valenbisi, localice al usuario y muestre las estaciones más cercanas con su disponibilidad.  

**Específicos:**
- Conectar con la API pública usando `fetch`.
- Localizar al usuario mediante la API de geolocalización del navegador.
- Calcular la distancia entre el usuario y cada estación.
- Visualizar datos en una tabla y en un mapa interactivo con Leaflet.
- Permitir filtrar el número de estaciones visibles.
- Mantener una arquitectura limpia (MVC simplificado) y documentación.

## 3. Arquitectura del proyecto
**Estructura de carpetas:**

- /ProyectoValenbisi
- /css
  - estilos.css
- /js 
  - app.js
  - controlador.js
  - vista.js
- index.html
- ReadMe.md

**Justificación MVC simplificado:**  
- Separar la lógica (controlador) de la representación (vista) facilita la mantenibilidad y la prueba de componentes. `app.js` actúa como orquestador: inicializa, solicita permisos de geolocalización y sincroniza controlador y vista.

**Descripción de ficheros:**
- `index.html`: estructura principal (contenedor mapa, tabla y controles).
- `/css/estilos.css`: estilos responsivos y reglas visuales.
- `/js/app.js`: inicialización; controla el flujo global.
- `/js/controlador.js`: llamadas a la API, procesamiento de datos, cálculo de distancias, filtrado.
- `/js/vista.js`: renderizado del mapa, marcadores y tabla.
- `README.md` / `memoria.md`: documentación y guía de uso.

## 4. Explicación del código
A continuación se describen las funciones y fragmentos clave (ejemplos comentados).

### 4.1 `controlador.js`
- `obtenerDatosValenbisi()`: realiza `fetch` a la API pública y normaliza la respuesta.

```js
// Ejemplo simplificado
async function obtenerDatosValenbisi() {
  const URL = "https://data.valencia.es/api/explore/v2.1/catalog/datasets/valenbisi-estacions/records?limit=200";
  const res = await fetch(URL);
  const json = await res.json();
  // normalizar: extraer lat, lon, nº estación, dirección, bicis, anclajes
  return json.results.map(r => {
    const fields = r.record.fields;
    return {
      id: fields.id,
      direccion: fields.address,
      lat: fields.geom.coordinates[1],
      lon: fields.geom.coordinates[0],
      bicis: fields.bicis_disponibles,
      anclajes_libres: fields.anclajes_libres,
      total_anclajes: fields.total_anclajes
    };
  });
}
```
### 4.2 Cálculo de distancias

Para obtener las estaciones más cercanas se calcula la distancia entre la posición del usuario y cada estación usando la fórmula de Haversine.
```js
function calcularDistancia(lat1, lon1, lat2, lon2) {
  const R = 6371; // radio terrestre en km
  const dLat = (lat2 - lat1) * Math.PI / 180;
  const dLon = (lon2 - lon1) * Math.PI / 180;

  const a =
    Math.sin(dLat / 2) ** 2 +
    Math.cos(lat1 * Math.PI / 180) *
    Math.cos(lat2 * Math.PI / 180) *
    Math.sin(dLon / 2) ** 2;

  return R * (2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a)));
}
```

Esta función permite ordenar estaciones por proximidad y filtrar cuántas se muestran.

### 4.3 vista.js

Encargado del renderizado tanto del mapa como de la tabla:

`initMapa()`: inicializa un mapa Leaflet centrado en Valencia.

`mostrarMarcadores(estaciones)`: coloca pines con información detallada dentro de popups.

`renderTabla(estaciones)`: genera dinámicamente la tabla HTML con las estaciones filtradas.

Ejemplo de renderizado:
```js
function renderTabla(estaciones) {
  const tbody = document.querySelector("#tabla-estaciones tbody");
  tbody.innerHTML = "";

  estaciones.forEach(est => {
    const fila = document.createElement("tr");
    fila.innerHTML = `
      <td>${est.id}</td>
      <td>${est.direccion}</td>
      <td>${est.bicis}</td>
      <td>${est.anclajes_libres}</td>
      <td>${est.distancia.toFixed(2)} km</td>
    `;
    tbody.appendChild(fila);
  });
}
```
### 4.4 app.js

- Actúa como punto de entrada:

- Solicita geolocalización al usuario.

- Llama al controlador para obtener datos de Valenbisi.

- Calcula distancias y ordena estaciones.

- Envía los datos finales a la vista para representarlos.

- Controla el evento del selector “mostrar X estaciones”.

Ejemplo del flujo principal:

```js
async function iniciarApp() {
  const ubicacion = await obtenerUbicacion();
  const estaciones = await obtenerDatosValenbisi();

  estaciones.forEach(est => {
    est.distancia = calcularDistancia(
      ubicacion.lat, ubicacion.lon, est.lat, est.lon
    );
  });

  const ordenadas = estaciones.sort((a, b) => a.distancia - b.distancia);
  vista.mostrarMarcadores(ordenadas);
  vista.renderTabla(ordenadas);
}
```
## 5. Interacción entre módulos

La comunicación entre las distintas partes del proyecto sigue una secuencia muy clara. Cada módulo cumple un papel específico y colabora con los demás para construir el resultado final.

`index.html` es el punto de partida. Contiene la estructura básica de la página y los elementos donde después se insertará la información: el mapa, la tabla y los controles.

Cuando la página se carga, entra en juego `app.js`, que es el responsable de poner todo en marcha. Desde aquí se solicita la ubicación del usuario, se inicializa el mapa y se llama al controlador para obtener los datos necesarios.

El siguiente paso recae en `controlador.js`, que se encarga de contactar con la API pública de Valenbisi, recoger los datos y tratarlos: organización, cálculo de distancias, ordenación y cualquier transformación necesaria antes de mostrarse.

Una vez los datos están preparados, pasan a `vista.js`, cuyo trabajo es actualizar la interfaz visual. Este archivo coloca los marcadores en el mapa, completa la tabla con las estaciones más cercanas y refresca cualquier elemento que dependa de la información recibida.

Finalmente, el usuario ve el mapa actualizado y la tabla filtrada según su posición y sus preferencias. Esta separación de tareas facilita entender el proyecto y permite modificar cada pieza por separado sin afectar al resto.

## 6. Mejoras futuras

Este proyecto tiene un gran potencial de ampliación. Algunas mejoras que se podrían implementar son:

**Predicciones de disponibilidad**

- Usar históricos de datos para calcular cuántas bicis habrá en una estación dentro de 10/20/30 minutos.

- Mostrar tendencias: estaciones que tienden a llenarse o vaciarse a determinadas horas.

**Integración con aplicaciones móviles**

- Crear una versión en React Native o Flutter que consuma esta misma API.

- Sistema de notificaciones: “La estación que sueles usar está casi vacía”.

**Personalización del usuario**

- Guardar estaciones favoritas en localStorage.

- Mostrar rutas recomendadas según distancia o disponibilidad.

- Filtros avanzados (estaciones con más bicis, estaciones con más anclajes, etc.).

**Mejoras en el mapa**

- Agrupación automática de marcadores (cluster).

- Colores según disponibilidad (verde, amarillo, rojo).

- Actualización automática cada 30–60 segundos.

**Optimización del rendimiento**

- Caché local para evitar llamadas repetidas a la API.

- Uso de Web Workers para cálculos de distancia sin bloquear la interfaz.

## 7. Conclusiones

Este proyecto me ha permitido comprender y aplicar conceptos reales de desarrollo web moderno: consumo de APIs, geolocalización, mapas interactivos y organización del código.

**Dificultades encontradas:**

- Interpretar y normalizar correctamente los datos de la API de Valencia.

- Manejar errores de geolocalización del navegador.

- Sincronizar correctamente los tiempos de carga entre mapa, vista y datos.

- Asegurar una interfaz clara y funcional en dispositivos pequeños.

A pesar de ello, el resultado es un prototipo completamente funcional, ampliable y con una base sólida para evolucionar hacia una aplicación real de movilidad sostenible.