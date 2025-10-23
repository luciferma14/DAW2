export async function obtenerEstaciones() {
    const total = 300;
    let estaciones = [];
  
    for (let offset = 0; offset < total; offset += 100) {
      const url = `https://valencia.opendatasoft.com/api/explore/v2.1/catalog/datasets/valenbisi-disponibilitat-valenbisi-dsiponibilidad/records?order_by=number&limit=100&offset=${offset}`;
      const response = await fetch(url);
      const data = await response.json();
      estaciones = estaciones.concat(data.results);
    }
  
    return estaciones;
  }
  