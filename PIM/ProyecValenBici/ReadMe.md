# Memoria Técnica — Proyecto: Disponibilidad Valenbisi
**Asignatura:** Diseño de Interfaces Web (DIW)  
**Autora:** Lucía Ferrandis


## 1. Introducción
El presente proyecto tiene por objetivo desarrollar un prototipo de aplicación web que permita consultar, en tiempo real, la disponibilidad de bicicletas y anclajes del sistema Valenbisi (Valencia). Este trabajo se enmarca en la promoción de la movilidad sostenible: fomentar el uso de la bicicleta compartida reduce emisiones, congestión y promueve hábitos de vida saludables. El prototipo sirve como ejercicio práctico para consolidar habilidades de consumo de APIs, diseño de interfaces, cálculo geoespacial y organización de proyectos.

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
Estructura de carpetas:

/proyecto-valenbisi
/css
estilos.css
/js
app.js
controlador.js
vista.js
index.html
README.md
memoria.md

markdown
Copiar código

**Justificación MVC simplificado:**  
- Separar la lógica (controlador) de la representación (vista) facilita la mantenibilidad y la prueba de componentes. `app.js` actúa como orquestador: inicializa, solicita permisos de geolocalización y sincroniza controlador y vista.

**Descripción de ficheros:**
- `index.html`: estructura principal (contenedor mapa, tabla y controles).
- `/css/estilos.css`: estilos responsivos y reglas visuales.
- `/js/app.js`: inicialización; controla el flujo global.
- `/js/controlador.js`: llamadas a la API, procesamiento de datos, cálculo de distancias, filtrado.
- `/js/vista.js`: renderizado del mapa, marcadores y tabla.
- `README.md` / `memoria.md`: documentación y guía de uso.

## 4. Explicación detallada del código
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