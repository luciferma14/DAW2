export class Controlador {
  constructor({ vista }) {
    this.vista = vista;
    this.apiBase = 'https://valencia.opendatasoft.com/api/explore/v2.1/catalog/datasets/valenbisi-disponibilitat-valenbisi-dsiponibilidad/records';
    this.maxEstaciones = Number(document.getElementById('num-estaciones').value) || 10;
    this.estaciones = [];
  }

  setMaxEstaciones(n) {
    this.maxEstaciones = n;
    this.mostrarCercanas();
  }

  async iniciarAplicacion() {
    try {
      await this.obtenerUbicacionUsuario();
      await this.cargarDatos();
      this.mostrarCercanas();
    } catch (err) {
      console.error('Error al iniciar', err);
      this.vista.mostrarError('No se pudo inicializar la aplicación.');
    }
  }

  async refrescar() {
    await this.cargarDatos();
    this.mostrarCercanas();
  }

  async cargarDatos() {
    this.estaciones = [];
    try {
      const total = 300;
      for (let offset = 0; offset < total; offset += 100) {
        const url = `${this.apiBase}?order_by=number&limit=100&offset=${offset}`;
        const res = await fetch(url);
        if (!res.ok) throw new Error('Error al cargar datos');
        const data = await res.json();
        if (!data.results) continue;

        const batch = data.results.map(st => ({
          id: st.number,
          direccion: st.address || 'Sin dirección',
          bicicletas: st.available ?? 0,
          anclajes_libres: st.free ?? 0,
          total: st.total ?? (st.available + st.free),
          actualizado: st.updated_at || 'Desconocido',
          lat: st.geo_point_2d?.lat || 0,
          lon: st.geo_point_2d?.lon || 0
        }));

        this.estaciones.push(...batch);
      }
    } catch (e) {
      console.error('Error cargando API:', e);
      this.vista.mostrarError('Error al obtener datos de la API de Valenbisi');
    }
  }

  async obtenerUbicacionUsuario() {
    return new Promise(resolve => {
      if (!navigator.geolocation) {
        this.vista.mostrarError('Geolocalización no soportada');
        this.vista.setUsuario([39.4699, -0.3763]); // centro de Valencia
        return resolve();
      }
      navigator.geolocation.getCurrentPosition(
        pos => {
          const { latitude, longitude } = pos.coords;
          this.vista.setUsuario([latitude, longitude]);
          resolve();
        },
        err => {
          console.warn('Sin geolocalización, usando Valencia centro.');
          this.vista.setUsuario([39.4699, -0.3763]);
          resolve();
        }
      );
    });
  }

  mostrarCercanas() {
    if (!this.vista.usuario || this.estaciones.length === 0) return;

    const estacionesConDist = this.estaciones
      .filter(e => e.lat && e.lon)
      .map(e => ({
        ...e,
        distancia: this._distanciaEnMetros(
          this.vista.usuario[0],
          this.vista.usuario[1],
          e.lat,
          e.lon
        )
      }));

    estacionesConDist.sort((a, b) => a.distancia - b.distancia);
    const seleccion = estacionesConDist.slice(0, this.maxEstaciones);
    this.vista.mostrarEstaciones(seleccion);
  }

  _distanciaEnMetros(lat1, lon1, lat2, lon2) {
    const R = 6371e3;
    const φ1 = (lat1 * Math.PI) / 180;
    const φ2 = (lat2 * Math.PI) / 180;
    const Δφ = ((lat2 - lat1) * Math.PI) / 180;
    const Δλ = ((lon2 - lon1) * Math.PI) / 180;
    const a =
      Math.sin(Δφ / 2) ** 2 +
      Math.cos(φ1) * Math.cos(φ2) * Math.sin(Δλ / 2) ** 2;
    const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
    return Math.round(R * c);
  }
}
